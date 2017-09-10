<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Post::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('title') and $query->where('title','like','%'.\Request::input('title').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('status') and $query->where('status',\Request::input('status'));
        \Request::input('cat_id') and $query->where('cat_id',\Request::input('cat_id'));
        \Request::input('report') and $query->where('report',\Request::input('report'));
        \Request::input('admin_post') and $query->where('admin_post',\Request::input('admin_post'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        \Request::input('delete_url') and $query->where('delete_url','like','%'.\Request::input('delete_url').'%');
        \Request::input('views') and $query->where('views',\Request::input('views'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'title' => 'string|max:120',
            'description' => 'string|max:255',
            'user_id' => 'integer',
            'status' => '',
            'cat_id' => 'integer',
            'report' => '',
            'admin_post' => '',
            'delete_url' => 'string|max:250',
            'views' => '',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

	public function user() {
		return $this->belongsTo('\App\User', 'user_id', 'id');
	}

	public function voters() {
		return $this->hasOne('\App\Voter', 'post_id', 'id');
	}

	public function category() {
		return $this->belongsTo('\App\Category', 'cat_id', 'id');
	}

}
