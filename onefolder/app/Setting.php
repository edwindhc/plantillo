<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Setting::query();

        // search results based on user input
        \Request::input('title') and $query->where('title','like','%'.\Request::input('title').'%');
        \Request::input('name') and $query->where('name','like','%'.\Request::input('name').'%');
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('header') and $query->where('header','like','%'.\Request::input('header').'%');
        \Request::input('footer') and $query->where('footer','like','%'.\Request::input('footer').'%');
        \Request::input('is_maintenance') and $query->where('is_maintenance',\Request::input('is_maintenance'));
        \Request::input('maintenance') and $query->where('maintenance','like','%'.\Request::input('maintenance').'%');
        \Request::input('disable_form_registration') and $query->where('disable_form_registration',\Request::input('disable_form_registration'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('themes') and $query->where('themes',\Request::input('themes'));
        \Request::input('user_theme') and $query->where('user_theme',\Request::input('user_theme'));
        \Request::input('home_layout') and $query->where('home_layout','like','%'.\Request::input('home_layout').'%');
        \Request::input('wysiwyg_user') and $query->where('wysiwyg_user',\Request::input('wysiwyg_user'));
        \Request::input('wysiwyg_admin') and $query->where('wysiwyg_admin',\Request::input('wysiwyg_admin'));
        \Request::input('allow_html') and $query->where('allow_html',\Request::input('allow_html'));
        \Request::input('allow_html_admin') and $query->where('allow_html_admin',\Request::input('allow_html_admin'));
        \Request::input('comments') and $query->where('comments',\Request::input('comments'));
        \Request::input('disqus_code') and $query->where('disqus_code','like','%'.\Request::input('disqus_code').'%');
        \Request::input('fb_embed') and $query->where('fb_embed','like','%'.\Request::input('fb_embed').'%');
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'title' => 'string|max:120',
            'name' => 'string|max:50',
            'description' => 'string|max:255',
            'header' => 'string',
            'footer' => 'string',
            'is_maintenance' => '',
            'maintenance' => 'string',
            'disable_form_registration' => '',
            'themes' => 'integer',
            'user_theme' => '',
            'home_layout' => 'string|max:250',
            'wysiwyg_user' => '',
            'wysiwyg_admin' => '',
            'allow_html' => '',
            'allow_html_admin' => '',
            'comments' => '',
            'disqus_code' => 'string',
            'fb_embed' => 'string',
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
