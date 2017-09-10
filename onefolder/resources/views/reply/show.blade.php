@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Reply: {{$reply->message}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$reply->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Message</h4>
            <h5>{{$reply->message}}</h5>
        </li>
        <li class="list-group-item">
            <h4>User Id</h4>
            <h5>{{$reply->user_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Report</h4>
            <h5>{{$reply->report}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Comment Id</h4>
            <h5>{{$reply->comment_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$reply->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$reply->updated_at}}</h5>
        </li>
        
    </ul>

@endsection