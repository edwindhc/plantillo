<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class CodercvController extends Controller
{
    public function feedPost() {
	    $feedPost = \Illuminate\Support\Facades\App::make('feed');
	    $feedPost->setCache(60, 'feedPostKey');

	    if(!$feedPost->isCached()) {
		    $posts = Post::where('status', 1)->where(function($query){$query->where('report', 1);$query->orwhere('report',3);})->select('id', 'title', 'description', 'created_at', 'updated_at')->orderby('created_at', 'desc')->take(100)->get();
		    $feedPost ->title = env('FEED_TITLE', 'Site Feed title');
		    $feedPost ->description = env('FEED_DESC', 'Size Feed description.');
		    $feedPost ->logo = url(env('FEED_LOGO', 'img/codercv.png'));
		    $feedPost ->link = url('feed/post');
		    $feedPost ->setDateFormat('carbon'); // 'datetime', 'timestamp' or 'carbon'
		    $feedPost ->pubdate = $posts[0]->created_at; // date of latest news
		    $feedPost ->lang = 'en';
		    $feedPost ->setShortening(true); // true or false
		    $feedPost ->setTextLimit(env('DESC_LIMIT', 50)); // maximum length of description text
		    foreach($posts as $post) {
			    $feedPost->add($post->title, 'Author', url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)), $post->created_at, $post->description, $post->description);
		    }
	    }
	    return $feedPost->render('rss');
    }

	public function sitemap() {
		$sitemap_posts = App::make("sitemap");
		$sitemap_posts->setCache('codercv.sitemap-posts', 60);
		$posts = Post::where('status', 1)->where(function($query){$query->where('report', 1);$query->orwhere('report',3);})->select('id', 'title', 'updated_at')->orderby('created_at', 'desc')->get();
		foreach ($posts as $post)  {
			$sitemap_posts->add( url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)), $post->updated_at, 0.8, 'hourly');
		}
		return $sitemap_posts->render('xml');
	}

	public function category() {
		$sitemap_cats = App::make("sitemap");
		$sitemap_cats->setCache('codercv.sitemap-category', 60);
		$cats = Category::select('id', 'name', 'updated_at')->orderby('created_at', 'desc')->get();
		foreach ($cats as $cat)  {
			$sitemap_cats->add( url(env('CATEGORY', 'category').'/'.$cat->id.'/'.str_slug($cat->name)), $cat->updated_at, 0.8, 'hourly');
		}
		return $sitemap_cats->render('xml');
	}

	public function sitemapindex() {
		$sitemap = App::make("sitemap");
		$sitemap->setCache('laravel.sitemap-index', 60);

		$sitemap->addSitemap(url('sitemap/'.env('URL_NAME', 'post')));
		$sitemap->addSitemap(url('sitemap/'.env('CATEGORY', 'category')));

		return $sitemap->store('sitemapindex', 'sitemap');
	}

	public function sitemapxml() {
		$sitemap_posts = App::make("sitemap");
		$sitemap_posts->setCache('codercv.sitemap-posts', 60);
		$posts = Post::where('status', 1)->where(function($query){$query->where('report', 1);$query->orwhere('report',3);})->select('id', 'title', 'updated_at')->orderby('created_at', 'desc')->get();
		foreach ($posts as $post)  {
			$sitemap_posts->add( url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)), $post->updated_at, 0.8, 'hourly');
		}
		return $sitemap_posts->render('xml');
	}
}
