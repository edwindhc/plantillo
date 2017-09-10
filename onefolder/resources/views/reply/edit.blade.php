@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Reply: {{$reply->message}}</h2>

    <form action="/reply/{{$reply->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('message','text')->model($reply)->show() !!}

        {!! \Nvd\Crud\Form::input('user_id','text')->model($reply)->show() !!}

        {!! \Nvd\Crud\Form::input('report','text')->model($reply)->show() !!}

        {!! \Nvd\Crud\Form::input('comment_id','text')->model($reply)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection