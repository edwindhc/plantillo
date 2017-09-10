<?php
namespace App\Http\Controllers;

use App\Attachment;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    public $viewDir = "attachment";

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $records = Attachment::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, Attachment::validationRules());

        Attachment::create($request->all());

        return redirect('/attachment');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Attachment $attachment)
    {
        return $this->view("show",['attachment' => $attachment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Attachment $attachment)
    {
        return $this->view( "edit", ['attachment' => $attachment] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Attachment::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $attachment->update($data);
            return "Record updated";
        }

        $this->validate($request, Attachment::validationRules());

        $attachment->update($request->all());

        return redirect('/attachment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Attachment $attachment)
    {
	    $checkOtherImage = Attachment::where('post_id', $attachment->post_id)->where('id', '!=', $attachment->id)->first();
	    if(is_null($checkOtherImage)) {
		    Post::where('id', $attachment->post_id)->delete();
		    $getComment = Comment::where('posts_id', $attachment->post_id)->select('id')->get();
		    if(!is_null($getComment)) {
			    $commentId = array();
			    foreach ($getComment as $gc) {
				    $commentId[] = $gc->id;
			    }
			    Comment::where('posts_id', $attachment->post_id)->delete();
			    Reply::whereIn('comment_id', $commentId)->delete();
		    }
		    Voter::where('post_id', $attachment->post_id)->delete();
	    }
        $attachment->delete();
        return redirect('/attachment');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
