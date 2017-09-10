<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Attachment::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('imgname') and $query->where('imgname','like','%'.\Request::input('imgname').'%');
        \Request::input('image') and $query->where('image','like','%'.\Request::input('image').'%');
        \Request::input('title') and $query->where('title','like','%'.\Request::input('title').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('post_id') and $query->where('post_id',\Request::input('post_id'));
        \Request::input('status') and $query->where('status',\Request::input('status'));
        \Request::input('position') and $query->where('position',\Request::input('position'));
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
            'imgname' => 'string|max:20',
            'image' => 'string|max:255',
            'title' => 'string|max:120',
            'description' => 'string',
            'user_id' => 'integer',
            'post_id' => 'integer',
            'status' => '',
            'position' => 'integer',
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

}
