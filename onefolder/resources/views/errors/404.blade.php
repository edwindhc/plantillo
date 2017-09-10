@extends('layouts.app')

@section('header')
    <title>{!! strip_tags(trans('codercv.404_not_found')) !!}</title>
    <style>
        body { overflow: hidden;background:url('{!! url('files/404.gif') !!}') no-repeat center center fixed;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; }
        img { width:100%;height:100vh !important; }
    </style>
@endsection

@section('content')
    <h2 class="text-center">{!! trans('codercv.404_not_found') !!}</h2>
@endsection

@section('footer')
@endsection
