<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Widget::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('title') and $query->where('title','like','%'.\Request::input('title').'%');
        \Request::input('content') and $query->where('content','like','%'.\Request::input('content').'%');
        \Request::input('position') and $query->where('position',\Request::input('position'));
        \Request::input('page') and $query->where('page',\Request::input('page'));
        \Request::input('location') and $query->where('location',\Request::input('location'));
        \Request::input('status') and $query->where('status',\Request::input('status'));
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
            'title' => 'string|max:250',
            'content' => 'string',
            'position' => 'integer',
            'page' => '',
            'location' => '',
            'status' => '',
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
