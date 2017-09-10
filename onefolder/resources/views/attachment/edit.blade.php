@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Attachment: {{$attachment->imgname}}</h2>

    <form action="/attachment/{{$attachment->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('imgname','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('image','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('title','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::textarea( 'description' )->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('user_id','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('post_id','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('status','text')->model($attachment)->show() !!}

        {!! \Nvd\Crud\Form::input('position','text')->model($attachment)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection