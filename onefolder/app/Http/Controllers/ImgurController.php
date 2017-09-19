<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Reply;
use App\Setting;
use App\User;
use App\Voter;
use App\Widget;
use Auth;
use App\Attachment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Mews\Purifier\Facades\Purifier;
use Vinkla\Hashids\Facades\Hashids;

class ImgurController extends Controller
{

	public function __construct() {
		if(env('GUEST_UPLOAD') != 1) {
			$this->middleware('auth')->only('uploadIndex', 'uploadFiles', 'updatePost', 'updateImage');
		}
	}

	public function welcome() {
		$widgets = Widget::where('status',1)->where('page', 1)->where(function($query) {
			$query->where('location', 1)->orWhere('location', 2);
		})->orderby('position', 'asc')->get();
		return view('welcome', compact('widgets'));
	}

	public function fetchPost() {
		$data = Input::all();
		if(isset($data[trans('codercv.sort')]) && $data[trans('codercv.sort')] == strtolower(trans('codercv.like'))) {
			if(isset($data['category'])) {
				$voter = Voter::where('cat_id', $data['category'])->select('post_id', DB::raw('sum(vote_up) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			} else {
				$voter = Voter::select('post_id', DB::raw('sum(vote_up) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			}
			$voteId = array();
			foreach($voter as $vv) {
				$voteId[] = $vv->post_id;
			}
			$posts = Post::whereIn('id', $voteId)->where(function ($query) {
				$query->where('report', 1)->orWhere('report', 3);
			})->where('status', 1)->select('id', 'title', 'description')->get();

			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			$toIndexPost = array();
			$content = '';

			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['extension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				// $toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension);
				$toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/' . $filename . '.' . $extension);
			}

			foreach($voteId as $v) {
				$content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($toIndexPost[$v][2]))).'" data-original-title="'.e(strip_tags($toIndexPost[$v][1])).'"><a href="'.url(env('URL_NAME', 'post').'/'.$toIndexPost[$v][0].'/'.str_slug($toIndexPost[$v][1])).'"><img src="'.url($toIndexPost[$v][3]).'" alt="'.e(strip_tags($toIndexPost[$v][1])).'" class="img-thumbnail img-responsive"></a></div>';
			}

			$nextPage = !is_null($voter->nextPageUrl()) ? $voter->nextPageUrl() : 'end';

		} elseif(isset($data[trans('codercv.sort')]) && $data[trans('codercv.sort')] == strtolower(trans('codercv.love'))) {
			if(isset($data['category'])) {
				$voter = Voter::where('cat_id', $data['category'])->select('post_id', DB::raw('sum(heart) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			} else {
				$voter = Voter::select('post_id', DB::raw('sum(heart) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			}
			$voteId = array();
			foreach($voter as $vv) {
				$voteId[] = $vv->post_id;
			}
			$posts = Post::whereIn('id', $voteId)->where(function ($query) {
				$query->where('report', 1)->orWhere('report', 3);
			})->where('status', 1)->select('id', 'title', 'description')->get();

			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			$toIndexPost = array();
			$content = '';

			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['extension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				// $toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension);
				$toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/' . $filename . '.' . $extension);
			}

			foreach($voteId as $v) {
				$content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($toIndexPost[$v][2]))).'" data-original-title="'.e(strip_tags($toIndexPost[$v][1])).'"><a href="'.url(env('URL_NAME', 'post').'/'.$toIndexPost[$v][0].'/'.str_slug($toIndexPost[$v][1])).'"><img src="'.url($toIndexPost[$v][3]).'" alt="'.e(strip_tags($toIndexPost[$v][1])).'" class="img-thumbnail img-responsive"></a></div>';
			}

			$nextPage = !is_null($voter->nextPageUrl()) ? $voter->nextPageUrl() : 'end';

		} elseif(isset($data[trans('codercv.sort')]) && $data[trans('codercv.sort')] == strtolower(trans('codercv.sad'))) {
			if(isset($data['category'])) {
				$voter = Voter::where('cat_id', $data['category'])->select('post_id', DB::raw('sum(broken) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			} else {
				$voter = Voter::select('post_id', DB::raw('sum(broken) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			}
			$voteId = array();
			foreach($voter as $vv) {
				$voteId[] = $vv->post_id;
			}
			$posts = Post::whereIn('id', $voteId)->where(function ($query) {
				$query->where('report', 1)->orWhere('report', 3);
			})->where('status', 1)->select('id', 'title', 'description')->get();

			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			$toIndexPost = array();
			$content = '';

			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['exthay es donde esta el detalle, mañana en la oficina puedo sacar un ratoension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				// $toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension);
				$toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/' . $filename . '.' . $extension);
			}

			foreach($voteId as $v) {
				$content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($toIndexPost[$v][2]))).'" data-original-title="'.e(strip_tags($toIndexPost[$v][1])).'"><a href="'.url(env('URL_NAME', 'post').'/'.$toIndexPost[$v][0].'/'.str_slug($toIndexPost[$v][1])).'"><img src="'.url($toIndexPost[$v][3]).'" alt="'.e(strip_tags($toIndexPost[$v][1])).'" class="img-thumbnail img-responsive"></a></div>';
			}

			$nextPage = !is_null($voter->nextPageUrl()) ? $voter->nextPageUrl() : 'end';

		} elseif(isset($data[trans('codercv.sort')]) && $data[trans('codercv.sort')] == strtolower(trans('codercv.dislike'))) {
			if(isset($data['category'])) {
				$voter = Voter::where('cat_id', $data['category'])->select('post_id', DB::raw('sum(vote_down) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			} else {
				$voter = Voter::select('post_id', DB::raw('sum(vote_down) as voteup'))->orderby('voteup', 'desc')->groupby('post_id')->Paginate(12);
			}
			$voteId = array();
			foreach($voter as $vv) {
				$voteId[] = $vv->post_id;
			}
			$posts = Post::whereIn('id', $voteId)->where(function ($query) {
				$query->where('report', 1)->orWhere('report', 3);
			})->where('status', 1)->select('id', 'title', 'description')->get();

			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			$toIndexPost = array();
			$content = '';

			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['extension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				$toIndexPost[$post->id] = array($post->id, $post->title, $post->description, 'files/' . $filename . '.' . $extension);
			}

			foreach($voteId as $v) {
				$content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($toIndexPost[$v][2]))).'" data-original-title="'.e(strip_tags($toIndexPost[$v][1])).'"><a href="'.url(env('URL_NAME', 'post').'/'.$toIndexPost[$v][0].'/'.str_slug($toIndexPost[$v][1])).'"><img src="'.url($toIndexPost[$v][3]).'" alt="'.e(strip_tags($toIndexPost[$v][1])).'" class="img-thumbnail img-responsive"></a></div>';
			}

			$nextPage = !is_null($voter->nextPageUrl()) ? $voter->nextPageUrl() : 'end';

		}  elseif(isset($data[trans('codercv.sort')]) && $data[trans('codercv.sort')] == strtolower(trans('codercv.popularity'))) {
			if(isset($data['category'])) {
				$posts = Post::where(function ($query) {
					$query->where('report', 1)->orWhere('report', 3);
				})->where('cat_id', $data['category'])->orderby('views', 'desc')->where('status', 1)->select('id', 'title', 'description')->Paginate(12);
			} else {
				$posts = Post::where(function ($query) {
					$query->where('report', 1)->orWhere('report', 3);
				})->where('status', 1)->orderby('views', 'desc')->select('id', 'title', 'description')->Paginate(12);
			}

			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			//Post aqui
			$content = '';
			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['extension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				// $content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($post->description))).'" data-original-title="'.e(strip_tags($post->title)).'"><a href="'.url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)).'"><img src="'.url('files/thumbnail/'.$filename.'_200x200_thumbnail.'.$extension).'" alt="'.e(strip_tags($post->title)).'" class="img-responsive"></a></div>';
				$content .= '<div class="col-xs-6 col-sm-4 col-md-2 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($post->description))).'" data-original-title="'.e(strip_tags($post->title)).'"><a href="'.url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)).'"><img src="'.url('files/'.$filename.'.'.$extension).'" alt="'.e(strip_tags($post->title)).'" class="img-responsive"></a></div>';
			}
			$nextPage = !is_null($posts->nextPageUrl()) ? $posts->nextPageUrl() : 'end';

		} else {
			if(isset($data['category'])) {
				$posts = Post::where(function ($query) {
					$query->where('report', 1)->orWhere('report', 3);
				})->where('cat_id', $data['category'])->where('status', 1)->select('id', 'title', 'description')->orderby('created_at', 'desc')->Paginate(12);
			} else {
				$posts = Post::where(function ($query) {
					$query->where('report', 1)->orWhere('report', 3);
				})->where('status', 1)->orderby('created_at', 'desc')->select('id', 'title', 'description')->Paginate(12);
			}
			//Post aqui
			$attach = array();
			foreach($posts as $post) {
				$attach[] = $post->id;
			}
			$attachment = Attachment::whereIn('post_id', $attach)->distinct()->get(['image', 'post_id']);
			unset($attach);
			foreach($attachment as $att) {
				$attach[$att->post_id] = $att->image;
			}
			$content = '';
			foreach($posts as $post) {
				$imgParts = pathinfo($attach[$post->id]);
				$filename = $imgParts['filename'];
				$extension = $imgParts['extension'];
				if (!file_exists('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension)) {
					$img = \Intervention\Image\Facades\Image::make($attach[$post->id])->resize(180, 180);
					$img->save('files/thumbnail/' . $filename . '_200x200_thumbnail.' . $extension, 60);
				}
				// $content .= '<div style="margin:10px 0px;" class="col-xs-6 col-sm-4 col-md-4 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($post->description))).'" data-original-title="'.e(strip_tags($post->title)).'"><a href="'.url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)).'"><img src="'.url('files/thumbnail/'.$filename.'_200x200_thumbnail.'.$extension).'" alt="'.e(strip_tags($post->title)).'" style="border-radius:8px" class="img-responsive"></a></div>';

				// $content .= '<article class="white-panel"><div style="margin:10px 0px;" class="col-xs-6 col-sm-4 col-md-4 post-content" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="'.e(str_limit(strip_tags($post->description))).'" data-original-title="'.e(strip_tags($post->title)).'"><a href="'.url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)).'"><img src="'.url('files/'.$filename.'.'.$extension).'" alt="'.e(strip_tags($post->title)).'" style="border-radius:8px" class="img-responsive"></a></div></article>';
				$content .= '<article class="white-panel"><a href="'.url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)).'"><img class="pinBootImg" src="'.url('files/'.$filename.'.'.$extension).'" alt=""></a></article>';
			}
			$nextPage = !is_null($posts->nextPageUrl()) ? $posts->nextPageUrl() : 'end';
		}

		$toSend = array('nextPage' => $nextPage, 'content' => $content);

		if(isset($data['userAgent']) && $data['userAgent'] == 'CoderCV 1.0.1 - Moz - NonCli-Browser') {
			return Response::json(json_encode($toSend), 200);
		} else {
			$htmlForCrawler = $content;
			$htmlForCrawler .= $posts->links();
			return $htmlForCrawler;
		}
	}

	public function uploadIndex() {
		$widgets = Widget::where('status',1)->where('page', 4)->where(function($query) {
			$query->where('location', 1)->orWhere('location', 2);
		})->orderby('position', 'asc')->get();
		Session::regenerateToken();
		return view('home', compact('widgets'));
	}

	public function uploadFiles() {
		$maxSize = env('FILE_SIZE', 5120);
		$data = Input::all();
		$destinationPath = 'files';
		$success = true;
		$error = '';
		foreach($data['file'] as $file) {
			$rules = [
				"file" => "image|mimes:jpg,png,gif,jpeg|max:{$maxSize}"
			];
			$validator = Validator::make(['file' => $file], $rules);
			Log::info($validator->fails());
			if ($validator->fails()) {

				return Response::make($validator->errors()->first(), 400);
			}
		}
		foreach($data['file'] as $file) {
			$extension = $file->getClientOriginalExtension();
			if(!Session::has('same_post') || Session::get('same_post') != $data['_token']) {
				$post = new Post();
				if(Auth::check()) {
					$post->user_id = Auth::user()->id;
				}
				$post->status = 2;
				$post->report = 1;
				$post->save();
				$delete_url = Hashids::encode($post->id);
				$post->delete_url = $delete_url;
				$post->save();
				Session::set('post_id', $post->id);
				Session::set('delete_url_post', $delete_url);
			}
			Session::set('same_post', $data['_token']);
			$attachment = new Attachment();
			if(Auth::check()) {
				$attachment->user_id  = Auth::user()->id;
			}
			$attachment->status = 2;
			$attachment->save();
			$hashId = Hashids::encode($attachment->id);
			$filename = $hashId.'.'.strip_tags($extension);
			Log::info($filename);
			try {
				$uploadSuccess = $file->move($destinationPath, $filename);
				if($uploadSuccess) {
					if(env('ENABLE_WATERMARK') == 1) {
						Log::info('1');
						$img = \Intervention\Image\Facades\Image::make('files/' . $filename);
						$img->insert(env('WATERMARK_SOURCE'), env('WATERMARK_POSITION'), env('WATERMARK_X_OFFSET'), env('WATERMARK_Y_OFFSET'));
						$img->save('files/'.$filename);
					}
					$attachment->imgname = $hashId;
					$attachment->image = $destinationPath.'/'.$filename;
					$post_id = Session::get('post_id');
					$getPost = Post::where('id', $post_id)->first();
					if(is_null($getPost)) {
						$post = new Post();
						if(Auth::check()) {
							$post->user_id = Auth::user()->id;
						}
						$post->report = 1;
						$post->status = 2;
						$post->save();
						Session::set('post_id', $post->id);
						$post_id = $post->id;
					}
					$attachment->post_id = $post_id;
					$attachment->save();
				} else {
					$attachment->delete();
					$success = false;
				}
			} catch(\Exception $e) {
				$error = $e->getMessage();
				$success = false;
			}
		}
		if($success) {
			$send = json_encode(['success' => 200, 'post_id' => Session::get('post_id')]);
			return Response::json($send);
		} else {
			if(Session::has('post_id')) {
				$finFirst = Attachment::where('post_id', Session::get('post_id'))->orWhere('post_id', NULL)->get();
				foreach($finFirst as $ff) {
					@unlink($ff->image);
				}
				Attachment::where('post_id', Session::get('post_id'))->orWhere('post_id', NULL)->delete();
				Post::where('id', Session::get('post_id'))->delete();
			}
			return Response::json($error, 400);
		}
	}

	public function getPost($id, $title) {
		$widgets = Widget::where('status',1)->where('page', 3)->where(function($query) {
			$query->where('location', 1)->orWhere('location', 2)->orWhere('location', 3)->orWhere('location', 4)->orWhere('location', 5)->orWhere('location', 6);
		})->orderby('position', 'asc')->get();
		if(Cache::has('post_'.$id)) {
			$post = Cache::get('post_'.$id);
		} else {
			$post = Post::where('id', $id)->with('user')->with('category')->with('voters')->get();
			if (is_null($post) || !isset($post[0])) {
				Flash::error(trans('codercv.not_found'));
				abort(404);
			}
			if ($post[0]->report == 2 && ((Auth::user() && Auth::user()->role_id != 1) || (Session::has('post_id') && Session::get('post_id') != $post[0]->id))) {
				Flash::error(trans('codercv.report_message'));
				abort(403);
			}
			Cache::put('post_'.$id, $post, 10);
		}
		if(is_numeric($post[0]->cat_id)) {
			if(Cache::has('related_cache_'.$post[0]->cat_id)) {
				$fetchRelated = Cache::get('related_cache_'.$post[0]->cat_id);
				$related = Cache::get('related_attach_'.$post[0]->cat_id);
			} else {
				$fetchRelated = Post::where('cat_id', $post[0]->cat_id)->where('status', 1)->where(function ($query) { $query->where('report', 1); $query->orWhere('report', 3); })->orderby('created_at', 'desc')->take(10)->get(['id', 'title']);
				$related = array();
				if (!is_null($fetchRelated)) {
					foreach ($fetchRelated as $fpost) { if (!in_array($fpost->id, $related)) { $related[] = $fpost->id; } }
					Cache::put('related_cache_' . $post[0]->cat_id, $fetchRelated, 10);
					$fetchAttach = Attachment::whereIn('post_id', $related)->distinct()->get(['image', 'post_id']);
					unset($related);
					$related = array();
					foreach ($fetchAttach as $faf) {
						$related[$faf->post_id] = $faf->image;
					}
					Cache::put('related_attach_' . $post[0]->cat_id, $related, 10);
				}
			}

		} else {
			if(Cache::has('related_cache')) {
				$fetchRelated = Cache::get('related_cache');
				$related = Cache::get('related_attach');
			} else {
				$fetchRelated = Post::where('created_at', 'desc')->where(function($query){ $query->where('report', 1);$query->orWhere('report', 3); })->take(10)->get(['id', 'title']);
				$related = array();
				if(!is_null($fetchRelated)) {
					foreach ($fetchRelated as $fpost) {
						if(!in_array($fpost->id, $related)) {
							$related[] = $fpost->id;
						}
					}
					Cache::put('related_cache', $fetchRelated, 10);
					$fetchAttach = Attachment::whereIn('post_id', $related)->distinct()->get(['image', 'post_id']);
					unset($related);
					$related = array();
					foreach($fetchAttach as $faf) {
						$related[$faf->post_id] = $faf->image;
					}
					Cache::put('related_attach', $related, 10);
				}
			}
		}
		if(!Session::has('views_count') || (Session::has('view_count') && !isset(Session::get('view_count')[$id]))) {
			$post[0]->views = $post[0]->views + 1;
			$post[0]->save();
			Session::set('views_count', [$id => '1']);
		}
		if(Cache::has('post_attachment_'.$id)) {
			$attachment = Cache::get('post_attachment_'.$id);
		} else {
			$attachment = Attachment::where('post_id', $id)->orderby('position', 'asc')->get();
			Cache::put('post_attachment_'.$id, $attachment, 10);
		}
		$comments = Comment::where('posts_id', $id)->get();
		$comUser = array();
		$replyList = array();
		if(!$comments->isEmpty()) {
			$teco = array();
			foreach ($comments as $com) {
				if (!in_array($com->user_id, $comUser)) {
					$comUser[] = $com->user_id;
				}
				$teco[] = $com->id;
			}
			$userList = User::whereIn('id', $comUser)->get(['id', 'name']);
			unset($comUser);
			foreach ($userList as $ul) {
				$comUser[$ul->id] = $ul->name;
			}
			$checkReply = Reply::select(DB::raw('count(id) as tcount'), 'comment_id')->whereIn('comment_id', $teco)->groupby('comment_id')->get();
			foreach($checkReply as $crc) {
				$replyList[$crc->comment_id] = $crc->tcount;
			}
		}
		$nextRow = Post::where('id', '>', $id)->where(function($query){
			$query->where('report', 1);$query->orWhere('report', 3);
		})->where('status', 1)->orderby('id')->select('id','title')->first();
		$prevRow = Post::where('id', '<', $id)->where(function($query){
			$query->where('report', 1);$query->orWhere('report', 3);
		})->where('status', 1)->orderby('id', 'desc')->select('id','title')->first();

		return view('post', compact('post', 'attachment', 'comments', 'comUser', 'fetchRelated', 'related', 'widgets', 'replyList', 'nextRow', 'prevRow'));
	}

	public function deleteUrl($deleteUrl) {
		$findPost = Post::where('delete_url', $deleteUrl)->first();
		if(is_null($findPost)) {
			$checkIf = Post::where('id', $deleteUrl)->first();
			if(!is_null($checkIf)) {
				if((Auth::user() && $checkIf->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $checkIf->id) || (Auth::user() && Auth::user()->role_id == 1)) {
					$deleteAttachment = Attachment::where('post_id', $checkIf->id)->get();
					foreach($deleteAttachment as $fa) {
						@unlink($fa->image);
						Attachment::where('post_id', $checkIf->id)->delete();
					}
					$checkIf->delete();
					Flash::error(trans('codercv.successfully_completed'));
					return redirect('/');
				} else {
					Flash::error(trans('codercv.permission_denied'));
					return redirect('/');
				}
			} else {
				Flash::error(trans('codercv.not_found'));
				return redirect('/');
			}
		} else {
			$deleteAttachment = Attachment::where('post_id', $findPost->id)->get();
			foreach($deleteAttachment as $fa) {
				@unlink($fa->image);
				Attachment::where('post_id', $findPost->id)->delete();
			}
			$findPost->delete();
			Flash::error(trans('codercv.successfully_completed'));
			return redirect('/');
		}
	}

	public function updatePost(Request $request, $id) {
		$post = Post::where('id', $id)->first();
		if(is_null($post)) {
			Flash::error(trans('codercv.not_found'));
			abort(404);
		}
		if(((Auth::user() && $post->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $id) || (Auth::user() && Auth::user()->role_id == 1)) && in_array($request->input('name'), ['title', 'description', 'cat_id'])) {

			if($request->input('name') === 'title' && strlen($request->input('value')) < 5 ) {
				return trans('codercv.share_limit');
			}
			if($request->input('name') === 'cat_id') {
				$checkCategoryExists = Category::where('id', $request['value'])->first();
				if(is_null($checkCategoryExists)) {
					return trans('codercv.invalid');
				}
			}
			if($request->input('name') == 'description') {
				$settinCheck = Setting::find(1);
				if(Auth::user() && Auth::user()->role_id == 1) {
					if($settinCheck->allow_html_admin == 1) {
						$post->{$request['name']} = Purifier::clean($request->input('value'));
					} else {
						$post->{$request['name']} = strip_tags($request->input('value'));
					}
				} else {
					if($settinCheck->allow_html == 1) {
						$post->{$request['name']} = Purifier::clean($request->input('value'));
					} else {
						$post->{$request['name']} = strip_tags($request->input('value'));
					}
				}
			} else {
				$post->{$request['name']} = strip_tags($request->input('value'));
			}
			$post->save();
			Cache::forget('post_'.$id);
			Cache::forget('post_attachment_'.$id);
			return trans('codercv.record_updated');
		} else {
			return trans('codercv.permission_denied');
		}
	}

	public function updateImage(Request $request, $id) {
		$attachment = Attachment::find($id);
		if(((Auth::user() && $attachment->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $attachment->post_id) || (Auth::user() && Auth::user()->role_id == 1)) && in_array($request->input('name'), ['title', 'description'])) {

			if($request->input('name') == 'description') {
				$settinCheck = Setting::find(1);
				if(Auth::user() && Auth::user()->role_id == 1) {
					if($settinCheck->allow_html_admin == 1) {
						$attachment->{$request['name']} = Purifier::clean($request->input('value'));
					} else {
						$attachment->{$request['name']} = strip_tags($request->input('value'));
					}
				} else {
					if($settinCheck->allow_html == 1) {
						$attachment->{$request['name']} = Purifier::clean($request->input('value'));
					} else {
						$attachment->{$request['name']} = strip_tags($request->input('value'));
					}
				}
			} else {
				$attachment->{$request['name']} = strip_tags($request->input('value'));
			}

			$attachment->save();
			Cache::forget('post_'.$attachment->post_id);
			Cache::forget('post_attachment_'.$attachment->post_id);
			return trans('codercv.record_updated');
		} else {
			return trans('codercv.permission_denied');
		}
	}

	public function category($id, $title) {
		$widgets = Widget::where('status',1)->where('page', 2)->where(function($query) {
			$query->where('location', 1)->orWhere('location', 2);
		})->orderby('position', 'asc')->get();
		$categoryPost = Category::where('id', $id)->first();
		if(is_null($categoryPost)) {
			Flash::error('codercv.not_found');
			abort(404);
		}
		return view('category', compact('categoryPost', 'widgets'));
	}

	public function fetchReply($id) {
		$fetchReply = Reply::where('comment_id', $id)->get();
		$userList = array();
		foreach($fetchReply as $fr) {
			$userList[] = $fr->user_id;
		}
		$userName = User::whereIn('id', $userList)->get(['id', 'name']);
		$uInfo = array();
		foreach($userName as $u) {
			$uInfo[$u->id] = $u->name;
		}
		$makeCommentHTML = '';
		foreach($fetchReply as $cr) {
			if($cr->report == 2) {
				$makeCommentHTML .= '<div class="media"><div class="media-left"><i class="fa fa-reply fa-3x"></i></div><div class="media-body"><div class="media-heading">'.e($uInfo[$cr->user_id]).' - '.\Carbon\Carbon::createFromTimestamp(strtotime($cr->created_at))->diffForHumans().' - <span class="dropdown"><span data-toggle="dropdown">&nbsp; <b class="fa fa-bell-o"></b><b class="caret"></b></span>  <ul class="dropdown-menu" aria-labelledby="dLabel"><li><a href="'.url('reply/report/'.$cr->id).'"><i class="fa fa-flag-o"></i> '.trans('codercv.report').'</a>';
				if(Auth::user() && (Auth::user()->id == $cr->user_id || Auth::user()->role_id == 1)) {
					$makeCommentHTML .= ' - <a href="' . url('delete/reply/' . $cr->id) . '"><i class="fa fa-trash-o"></i> ' . trans('codercv.delete') . '</a>';
				}
				$makeCommentHTML.= '</li></ul></span></div><p class="text-italic">'.trans('codercv.awaiting_moderation').'</p></div></div>';
			} else {
				$makeCommentHTML .= '<div class="media"><div class="media-left"><i class="fa fa-reply fa-3x"></i></div><div class="media-body"><div class="media-heading">'.e($uInfo[$cr->user_id]).' - '.\Carbon\Carbon::createFromTimestamp(strtotime($cr->created_at))->diffForHumans().' - <span class="dropdown"><span data-toggle="dropdown">&nbsp; <b class="fa fa-bell-o"></b><b class="caret"></b></span>  <ul class="dropdown-menu" aria-labelledby="dLabel"><li><a href="'.url('reply/report/'.$cr->id).'"><i class="fa fa-flag-o"></i> '.trans('codercv.report').'</a>';
				if(Auth::user() && (Auth::user()->id == $cr->user_id || Auth::user()->role_id == 1)) {
					$makeCommentHTML .= ' - <a href="' . url('delete/reply/' . $cr->id) . '"><i class="fa fa-trash-o"></i> ' . trans('codercv.delete') . '</a>';
				}
				$makeCommentHTML.= '</li></ul></span></div><p>'.e($cr->message).'</p></div></div>';
			}
		}

		return $makeCommentHTML;
	}

}
