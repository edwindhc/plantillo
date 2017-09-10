@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Widget: {{$widget->title}}</h2>

    <form action="/widget/{{$widget->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('title','text')->model($widget)->show() !!}

        {!! \Nvd\Crud\Form::textarea( 'content' )->model($widget)->show() !!}

        {!! \Nvd\Crud\Form::input('position','text')->model($widget)->show() !!}

        {!! \Nvd\Crud\Form::input('page','text')->model($widget)->show() !!}

        {!! \Nvd\Crud\Form::input('location','text')->model($widget)->show() !!}

        {!! \Nvd\Crud\Form::input('status','text')->model($widget)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection