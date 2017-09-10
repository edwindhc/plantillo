<?php

Route::get('/', 'ImgurController@welcome');

Route::auth();
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('edit/profile', 'HomeController@editProfile');
Route::post('update/profile', 'HomeController@updateProfile');

Route::get('home', 'HomeController@home');
Route::get('home/'.strtolower(trans('codercv.comment')), 'HomeController@homeComment');
Route::get('home/'.strtolower(trans('codercv.like')), 'HomeController@likePost');
Route::get('home/'.strtolower(trans('codercv.love')), 'HomeController@lovePost');
Route::get('home/'.strtolower(trans('codercv.sad')), 'HomeController@sadStory');
Route::get('home/'.strtolower(trans('codercv.dislike')), 'HomeController@dislikeStory');

Route::post('store/'.env('URL_NAME', 'post'), 'HomeController@storePost');
Route::get(env('URL_NAME', 'post').'/{id}/{title}', 'ImgurController@getPost');
Route::post('vote/{id}/{flow}', 'HomeController@voting');
Route::post(env('URL_NAME', 'post').'/share/{id}', 'HomeController@sharePost');
Route::post(env('URL_NAME', 'post').'/unpublish/{id}', 'HomeController@unpublishPost');
Route::get(env('CATEGORY', 'category').'/{id}/{title}', 'ImgurController@category');

Route::post('comment/'.env('URL_NAME', 'post').'/{id}', 'HomeController@postComment');
Route::post('reply/comment', 'HomeController@replyComment');
Route::get('get/reply/{id}', 'ImgurController@fetchReply');
Route::get('reply/report/{id}', 'HomeController@reportReply');
Route::get('delete/reply/{id}', 'HomeController@deleteReply');
Route::post('delete/reply/{id}', 'HomeController@deleteReply');
Route::post('report/'.env('URL_NAME', 'post').'/{id}', 'HomeController@reportPost');

Route::post('mark/report/ok/{id}', 'HomeController@actReport');
Route::post('mark/report/reply/ok/{id}', 'HomeController@fixReplyReport');
Route::post('report/comment/{id}', 'HomeController@reportComment');
Route::post('report/comment/ok/{id}', 'HomeController@commentOk');

Route::get('upload', 'ImgurController@uploadIndex');
Route::post('upload/files', 'ImgurController@uploadFiles');
Route::get('delete/'.env('URL_NAME', 'post').'/{deleteUrl}', 'ImgurController@deleteUrl');
Route::post('delete/comment/{id}', 'HomeController@deleteComment');

Route::post('update/'.env('URL_NAME', 'post').'/{id}', 'ImgurController@updatePost');
Route::post('update/image/{id}', 'ImgurController@updateImage');
Route::get('fetch/'.env('URL_NAME'), 'ImgurController@fetchPost');

Route::resource('setting','SettingController');
Route::resource('attachment','AttachmentController');
Route::resource('category','CategoryController');
Route::resource('comment','CommentController');
Route::resource('post','PostController');
Route::resource('voter','VoterController');
Route::resource('widget','WidgetController');
Route::resource('reply','ReplyController');

Route::get('user/list', 'HomeController@userList');
Route::post('ban/user/{id}', 'HomeController@banUser');
Route::post('unban/user/{id}', 'HomeController@unBanUser');

Route::post('delete/user/{id}', 'HomeController@delUser');
Route::get('admin/post/reports', 'HomeController@adminPostReport');
Route::get('admin/reply/reports', 'HomeController@adminReplyReport');
Route::get('admin/comment/reports', 'HomeController@adminCommentReport');

Route::get('feed/'.env('URL_NAME', 'post'), 'CodercvController@feedPost');
Route::get('sitemap/'.env('URL_NAME', 'post'), 'CodercvController@sitemap');
Route::get('sitemap/'.env('CATEGORY', 'category'), 'CodercvController@category');
Route::get('sitemap.xml', 'CodercvController@sitemapxml');
Route::get('sitemap', 'CodercvController@sitemapindex');

Route::get('delete/cache', function() {
	if(Auth::user() && Auth::user()->role_id == 1) {
		\Illuminate\Support\Facades\Cache::flush();
		return trans('codercv.successfully_completed');
	} else {
		abort(404);
	}
//	This website uses cookies to manage authentication, navigation, and other functions. By using our website, you agree that we can place these types of cookies on your device. View e-Privacy Directive Documents

});
Route::get('delete/cache/{item_name}', function($item_name) {
	if(Auth::user() && Auth::user()->role_id == 1) {
		\Illuminate\Support\Facades\Cache::forget($item_name);
		return trans('codercv.successfully_completed');
	} else {
		abort(404);
	}
});