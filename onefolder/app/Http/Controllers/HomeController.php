<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Comment;
use App\Post;
use App\Reply;
use App\User;
use App\Voter;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Vinkla\Hashids\Facades\Hashids;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function voting($id, $flow) {
        if(in_array($flow, array('vote_up', 'vote_down', 'heart', 'broken'))) {
	        $post = Post::where('id', $id)->first();
	        if(is_null($post)) {
		        return trans('codercv.permission_denied');
	        } else {
		        $VotedAlready = Voter::where('user_id', Auth::user()->id)->where('post_id', $id)->first();
		        if(!is_null($VotedAlready)) {
			        $VotedAlready->vote_up = NULL;
			        $VotedAlready->heart = NULL;
			        $VotedAlready->broken = NULL;
			        $VotedAlready->vote_down = NULL;
			        $VotedAlready->{$flow} = 1;
			        $VotedAlready->save();
		        } else {
			        $newVote = new Voter();
			        $newVote->vote_up = NULL;
			        $newVote->heart = NULL;
			        $newVote->broken = NULL;
			        $newVote->vote_down = NULL;
			        $newVote->user_id = Auth::user()->id;
			        $newVote->post_id = $id;
			        $newVote->cat_id = $post->cat_id;
			        $newVote->{$flow} = 1;
			        $newVote->save();
		        }
		        Cache::forget('post_'.$id);
		        Cache::forget('post_attachment_'.$id);
		        $fetchStats = $VoteInfor = Voter::where('post_id', $id)->select(DB::raw('sum(vote_up) as postlike, sum(heart) as heart, sum(broken) as sad, sum(vote_down) as dislike'))->first();
		        $stats = array('success' => 200);
		        array_push($stats, $fetchStats->toArray());
		        $message = array('message' => trans('codercv.record_updated'));
		        array_push($stats, $message);
		        return Response::json(json_encode($stats));
	        }
        } else {
            return trans('codercv.permission_denied');
        }
    }

	public function sharePost($id) {
		$post = Post::where('id', $id)->first();
		if(strlen($post->title) < 5) {
			return trans('codercv.share_limit');
		}
		if(is_null($post->cat_id)) {
			return trans('codercv.select_category');
		}
		if($post->user_id == Auth::user()->id) {
			$post->status = 1;
			$post->save();
			return trans('codercv.successfully_completed');
		} else {
			return trans('codercv.permission_denied');
		}
	}

	public function unpublishPost($id) {
		$post = Post::where('id', $id)->first();
		if($post->user_id == Auth::user()->id) {
			$post->status = 2;
			$post->save();
			return trans('codercv.successfully_completed');
		} else {
			return trans('codercv.permission_denied');
		}
	}

	public function actReport($id) {
		if(Auth::user()->role_id == 1) {
			$post = Post::where('id', $id)->update(['report' => 3]);
			Cache::forget('post_'.$id);
			return trans('codercv.successfully_completed');
		}
	}

	public function fixReplyReport($id) {
		if(Auth::user()->role_id == 1) {
			$post = Reply::where('id', $id)->update(['report' => 3]);
			return trans('codercv.successfully_completed');
		}
	}

	public function reportPost($id) {
		$post = Post::where('id', $id)->where('report', '!=', 2)->first();
		if(!is_null($post)) {
			if($post->report == 3) {
				return trans('codercv.report_no_more');
			} else {
				$post->report = 2;
				$post->save();
				return trans('codercv.report_submit');
			}
		} else {
			return trans('codercv.already_reported');
		}
	}

	public function postComment($id) {
		$data = Input::all();
		if(strlen($data['message']) <= 3) {
			return trans('codercv.min_character_comment');
		}
		$checkPostExist = Post::where('id', $id)->first();
		if(!is_null($checkPostExist)) {
			$comment = new Comment();
			$comment->message = strip_tags($data['message']);
			$comment->user_id = Auth::user()->id;
			$comment->posts_id = $id;
			$comment->save();
			return strip_tags($data['message']);
		} else {
			return trans('codercv.invalid');
		}
	}

	public function deleteComment($id) {
		if(Auth::user()->role_id == 1) {
			$checkComment = Comment::where('id', $id)->first();
		} else {
			$checkComment = Comment::where('id', $id)->where('user_id', Auth::user()->id)->first();
		}
		if(!is_null($checkComment)) {
			$checkComment->delete();
			return trans('codercv.successfully_completed');
		} else {
			return trans('codercv.permission_denied');
		}
	}

	public function reportComment($id) {
		$findComment = Comment::where('id', $id)->first();
		if($findComment->report == 3) {
			return trans('codercv.report_no_more');
		} elseif($findComment->report == 2) {
			return trans('codercv.report_message');
		} else {
			Comment::where('id', $id)->update(['report' => 2]);
			return trans('codercv.report_submit');
		}
	}

	public function commentOk($id) {
		if(Auth::user()->role_id == 1) {
			$post = Comment::where('id', $id)->update(['report' => 3]);
			return trans('codercv.successfully_completed');
		}
	}

	public function editProfile() {
		return view('edit-profile');
	}

	public function updateProfile() {
		$data = Input::all();
		$rules = [
			'name'  => 'required|min:5',
			'email' => 'required|email',
			'avatar'    => 'image|max:200',
			'themes'    => 'numeric|min:1|max:17'
		];
		$validator = Validator::make($data ,$rules);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}
		$user = User::find(Auth::user()->id);
		$user->name = $data['name'];
		if(is_null(User::where('email', $data['email'])->where('id', '!=', Auth::user()->id)->first())){
			$user->email = $data['email'];
		}
		if(Input::hasFile('avatar')) {
			$extension = Input::file('avatar')->getClientOriginalExtension();
			$hashId = Hashids::encode(Auth::user()->id);
			$filename = $hashId.'_avatar.'.strip_tags($extension);
			try {
				$uploadSuccess = Input::file('avatar')->move('files/', $filename);
				if($uploadSuccess) {
					$user->avatar = 'files/'.$filename;
				} else {
					Flash::input('Could not upload Image Contact Admin');
					return Redirect::back()->withInput();
				}
			} catch(\Exception $e) {
				$error = $e->getMessage();dd($error);
			}
		}
		$user->themes = $data['themes'];
		$user->save();
		Flash::success(trans('codercv.successfully_completed'));
		return redirect()->back();
	}

	public function home() {
		$posts = Post::where('user_id', Auth::user()->id)->get();
		return view('dashboard', compact('posts'));
	}

	public function homeComment() {
		$comment = Comment::where('user_id', Auth::user()->id)->select('posts_id', 'id', 'message', 'created_at', 'report')->get();
		$p = array();
		$other = array();
		foreach($comment as $vo) {
			$p[$vo->id] = $vo->posts_id;
			$other[$vo->posts_id] = array($vo->message, $vo->id, $vo->created_at, $vo->report);
		}
		$posts = Post::where('user_id', Auth::user()->id)->whereIn('id', $p)->get(['id', 'title']);
		return view('comment', compact('posts', 'other'));
	}

	public function likePost() {
		$voter = Voter::where('user_id', Auth::user()->id)->where('vote_up', 1)->select('post_id')->get();
		$p = array();
		foreach($voter as $vo) {
			$p[] = $vo->post_id;
		}
		$posts = Post::where('user_id', Auth::user()->id)->whereIn('id', $p)->get();
		return view('dashboard', compact('posts'));
	}

	public function lovePost() {
		$voter = Voter::where('user_id', Auth::user()->id)->where('heart', 1)->select('post_id')->get();
		$p = array();
		foreach($voter as $vo) {
			$p[] = $vo->post_id;
		}
		$posts = Post::where('user_id', Auth::user()->id)->whereIn('id', $p)->get();
		return view('dashboard', compact('posts'));
	}

	public function sadStory() {
		$voter = Voter::where('user_id', Auth::user()->id)->where('broken', 1)->select('post_id')->get();
		$p = array();
		foreach($voter as $vo) {
			$p[] = $vo->post_id;
		}
		$posts = Post::where('user_id', Auth::user()->id)->whereIn('id', $p)->get();
		return view('dashboard', compact('posts'));
	}

	public function dislikeStory() {
		$voter = Voter::where('user_id', Auth::user()->id)->where('vote_down', 1)->select('post_id')->get();
		$p = array();
		foreach($voter as $vo) {
			$p[] = $vo->post_id;
		}
		$posts = Post::where('user_id', Auth::user()->id)->whereIn('id', $p)->get();
		return view('dashboard', compact('posts'));
	}

	public function replyComment() {
		$rules = [
			'comment_id'    => 'required|exists:comments,id',
			'reply_comment' => 'required|min:5|max:250'
		];
		$data = Input::all();
		$validator = Validator::make($data, $rules);
		if($validator->fails()) {
			return Response::json($validator->errors()->first(), 400);
		}
		$reply = new Reply();
		$reply->comment_id = $data['comment_id'];
		$reply->message = strip_tags($data['reply_comment']);
		$reply->user_id = Auth::user()->id;
		$reply->report = 1;
		$reply->save();
		return htmlentities($data['reply_comment']);
	}

	public function reportReply($id) {
		$findComment = Reply::where('id', $id)->first();
		if($findComment->report == 3) {
			Flash::error(trans('codercv.report_no_more'));
			return redirect()->back();
		} elseif($findComment->report == 2) {
			Flash::error(trans('codercv.report_message'));
			return redirect()->back();
		} else {
			Reply::where('id', $id)->update(['report' => 2]);
			Flash::success(trans('codercv.report_submit'));
			return redirect()->back();
		}
	}

	public function deleteReply($id) {
		if(Auth::user()->role_id == 1) {
			$checkComment = Reply::where('id', $id)->first();
		} else {
			$checkComment = Reply::where('id', $id)->where('user_id', Auth::user()->id)->first();
		}
		if(!is_null($checkComment)) {
			$checkComment->delete();
			Flash::success(trans('codercv.successfully_completed'));
			return redirect()->back();
		} else {
			Flash::error(trans('codercv.permission_denied'));
			return redirect()->back();
		}
	}

	public function adminPostReport() {
		if(Auth::user()->role_id == 1) {
			$posts = Post::where('report', 2)->get();
			return view('report', compact('posts'));
		} else {
			return redirect('login');
		}
	}

	public function adminReplyReport() {
		if(Auth::user()->role_id == 1) {
			$posts = Reply::where('report', 2)->get();
			return view('reply-report', compact('posts'));
		} else {
			return redirect('login');
		}
	}

	public function adminCommentReport() {
		if(Auth::user()->role_id == 1) {
			$posts = Comment::where('report', 2)->get();
			return view('comment-report', compact('posts'));
		} else {
			return redirect('login');
		}
	}

	public function userList() {
		if(Auth::user()->role_id == 1) {
			$userList = User::all();
			return view('user-list', compact('userList'));
		}
	}

	public function banUser($id) {
		if(Auth::user()->role_id == 1 && $id != 1) {
			User::where('id', $id)->update(['role_id' => 9]);
			return Response::json('User has been banned successfully! Refresh the page to see event.', 200);
		}
	}

	public function unBanUser($id) {
		if(Auth::user()->role_id == 1 && $id != 1) {
			User::where('id', $id)->update(['role_id' => 3]);
			return Response::json('User has been Un-banned successfully! Refresh the page to see event.', 200);
		}
	}

	public function delUser($id) {
		if(Auth::user()->role_id == 1 && $id != 1) {
			// Delete all attachments
			Attachment::where('user_id', $id)->delete();
			Post::where('user_id', $id)->delete();
			Comment::where('user_id', $id)->delete();
			Reply::where('user_id', $id)->delete();
			Voter::where('user_id', $id)->delete();
			User::where('id', $id)->delete();
			return Response::json('User and its all traces in post,comments,attachments are all erased', 200);
		}
	}
}
