@extends('layouts.app')

@section('header')
    <title>{!! $settings->title !!} - {!! $settings->name !!}</title>
    <meta name="description" content="{{{ $settings->description }}} ">
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{!! $settings->title !!}"/>
    <meta property="og:description" content="{{{ $settings->description }}}"/>
    <meta property="og:url" content="{!! url('/') !!}"/>
    <meta property="og:site_name" content="{!! $settings->title !!}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="{{{ $settings->title }}} "/>
    <meta name="twitter:title" content="{!! $settings->title !!}"/>
    <meta name="twitter:domain" content="{!! url('/') !!}"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 center-block">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('codercv.edit_profile') !!}</div>
                    <div class="panel body p-2">
                        {!! Form::open(['url' => url('update/profile'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="name" class="control-label">{!! trans('codercv.name') !!}</label>
                            {!! Form::text('name', Auth::user()->name , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">{!! trans('codercv.email') !!}</label>
                            {!! Form::text('email', Auth::user()->email, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">{!! trans('codercv.avatar') !!}</label>
                            {!! Form::file('avatar', NULL, ['class' => 'form-control']) !!}
                        </div>
                        @if($settings->user_theme == 1)
                        <div class="form-group">
                            <label for="email" class="control-label">{!! trans('codercv.themes') !!}</label>
                            {!! Form::select('themes', array(4 => 'Default', 1 => 'White Gray', 2 => 'White Sky', 3 => 'Black & White', 5 => 'Blue Black', 6 => 'Blue White', 7 => 'News Shine', 8 => 'White 3D' , 9 => 'Material White', 10 => 'Old School' , 11 => 'Green Yard', 12 => 'Simple Red', 13 => 'Carbon Grump', 14 => 'Applepie', 15 => 'Blue Hill', 16 => 'Ubuntu' , 17 => 'Light Black'), Auth::user()->themes, ['class' => 'form-control']) !!}
                        </div>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-success pull-right"><i class="fa fa-check"></i> {!! trans('codercv.update') !!}</button>
                            </div>
                            <br>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection