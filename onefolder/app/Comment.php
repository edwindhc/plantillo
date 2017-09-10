<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Comment::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('message') and $query->where('message','like','%'.\Request::input('message').'%');
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('report') and $query->where('report',\Request::input('report'));
        \Request::input('posts_id') and $query->where('posts_id',\Request::input('posts_id'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'message' => 'string|max:255',
            'user_id' => 'integer',
            'report' => '',
            'posts_id' => 'integer',
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

    public function post() {
        return $this->belongsTo('\App\Post', 'posts_id', 'id');
    }

}
