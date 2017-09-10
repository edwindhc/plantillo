@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Comment: {{$comment->message}}</h2>

    <form action="/comment/{{$comment->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('message','text')->model($comment)->show() !!}

        {!! \Nvd\Crud\Form::input('user_id','text')->model($comment)->show() !!}

        {!! \Nvd\Crud\Form::input('report','text')->model($comment)->show() !!}

        {!! \Nvd\Crud\Form::input('posts_id','text')->model($comment)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection