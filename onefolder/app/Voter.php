<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Voter::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('post_id') and $query->where('post_id',\Request::input('post_id'));
        \Request::input('vote_up') and $query->where('vote_up',\Request::input('vote_up'));
        \Request::input('vote_down') and $query->where('vote_down',\Request::input('vote_down'));
        \Request::input('heart') and $query->where('heart',\Request::input('heart'));
        \Request::input('broken') and $query->where('broken',\Request::input('broken'));
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('comment_id') and $query->where('comment_id',\Request::input('comment_id'));
        \Request::input('cat_id') and $query->where('cat_id',\Request::input('cat_id'));
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
            'post_id' => '',
            'vote_up' => '',
            'vote_down' => '',
            'heart' => '',
            'broken' => '',
            'user_id' => 'integer',
            'comment_id' => '',
            'cat_id' => 'integer',
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

}
