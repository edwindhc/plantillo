@extends('layouts.app')

@section('header')
    <title>{!! Auth::user()->name !!} - {!! $settings->name !!}</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Navigation</h4></div>
                    <div>
                        <div class="list-group mbn-10">
                            <a class="list-group-item" href="{!! url('home') !!}"><i class="fa fa-home"></i> {!! trans('codercv.home') !!}</a>
                            <a class="list-group-item" href="{!! url('home/'.strtolower(trans('codercv.comment'))) !!}"><i class="fa fa-comment"></i> {!! trans('codercv.comment') !!}</a>
                            <a class="list-group-item" href="{!! url('home/'.strtolower(trans('codercv.like'))) !!}"><i class="fa fa-thumbs-o-up"></i> {!! trans('codercv.like').' '.ucfirst(env('URL_NAME', 'post')) !!}</a>
                            <a class="list-group-item" href="{!! url('home/'.strtolower(trans('codercv.love'))) !!}"><i class="fa fa-heart-o"></i> {!! trans('codercv.love').' '.ucfirst(env('URL_NAME', 'post')) !!}</a>
                            <a class="list-group-item" href="{!! url('home/'.strtolower(trans('codercv.sad'))) !!}"><i class="fa fa-frown-o"></i> {!! trans('codercv.sad').' '.ucfirst(env('URL_NAME', 'post')) !!}</a>
                            <a class="list-group-item" href="{!! url('home/'.strtolower(trans('codercv.dislike'))) !!}"><i class="fa fa-thumbs-o-down"></i> {!! trans('codercv.dislike').' '.ucfirst(env('URL_NAME', 'post')) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{!! ucfirst(trans('codercv.comment')) !!}</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover table-condensed table-striped  dt-responsive">
                                <thead>
                                <tr>
                                    <th class="col-xs-3 bg-success bold white text-center">{!! trans('codercv.title') !!}</th>
                                    <th class="col-xs-3 bg-success bold white text-center">{!! trans('codercv.comment') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.report') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.datetime') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{!! $post->title !!}</td>
                                        <td>{!! $other[$post->id][0] !!}</td>
                                        <td>
                                            @if($other[$post->id][3]) {!! trans('codercv.no_report') !!} @elseif($other[$post->id][3] == 2) {!! trans('codercv.reported') !!} @elseif($post->report == 3) {!! trans('codercv.report_clear') !!} @endif
                                        </td>
                                        <td>
                                            {!! '<b>'.trans('codercv.created').'</b> '.$other[$post->id][2] !!}
                                        </td>
                                        <td>
                                            @if(strlen($post->title) > 2)
                                                <a target="_blank" class="btn btn-info" href="{!! url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title).'#comment-'.$other[$post->id][1]) !!}"><i class="fa fa-eye"></i> {!! trans('codercv.view_post') !!}</a>
                                            @else
                                                <a target="_blank" class="btn btn-info" href="{!! url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($settings->title).'#comment-'.$other[$post->id][1]) !!}"><i class="fa fa-eye"></i> {!! trans('codercv.view_post') !!}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
    <script>
        jQuery('table').dataTable( {
            responsive: true,
            paging: true,
            "pagingType": "full_numbers"
        });
    </script>
@endsection