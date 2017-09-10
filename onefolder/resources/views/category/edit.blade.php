@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Category: {{$category->name}}</h2>

    <form action="/category/{{$category->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($category)->show() !!}

        {!! \Nvd\Crud\Form::textarea( 'description' )->model($category)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection