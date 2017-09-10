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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    @include('layouts.sidebar')
                </div>
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{!! ucfirst(trans('codercv.report')) !!}</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover table-condensed table-striped  dt-responsive">
                                <thead>
                                <tr>
                                    <th class="col-xs-3 bg-success bold white text-center">{!! trans('codercv.title') !!}</th>
                                    <th class="col-xs-3 bg-success bold white text-center">{!! trans('codercv.description') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.status') !!} / {!! trans('codercv.report') !!} / {!! trans('codercv.views') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.datetime') !!}</th>
                                    <th class="col-xs-2 bg-success bold white text-center">{!! trans('codercv.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{!! $post->title !!}</td>
                                        <td>{!! $post->description !!}</td>
                                        <td>
                                            {!! $post->status == 1 ? trans('codercv.publish') : trans('codercv.unpublish') !!}
                                            /<br>
                                            @if($post->report == 1) {!! trans('codercv.no_report') !!} @elseif($post->report == 2) {!! trans('codercv.reported') !!} @elseif($post->report == 3) {!! trans('codercv.report_clear') !!} @endif
                                            /<br>
                                            {!! $post->views !!}
                                        </td>
                                        <td>
                                            {!! '<b>'.trans('codercv.created').'</b> '.$post->created_at.'<br>  <br> <b>'.trans('codercv.modified').'</b> '.$post->updated_at !!}
                                        </td>
                                        <td>
                                            @if(strlen($post->title) > 3)
                                                <a href="{!! url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($settings->name)) !!}" class="btn btn-info">{!! trans('codercv.view_post') !!}</a>
                                            @else
                                                <a href="{!! url(env('URL_NAME', 'post').'/'.$post->id.'/'.str_slug($post->title)) !!}" class="btn btn-info">{!! trans('codercv.view_post') !!}</a>
                                            @endif
                                            <a href="javascript:void(0)" data-href="{!! url('mark/report/ok/'.$post->id) !!}" data-confirm="yes" data-confirmation="{!! trans('codercv.confirmation_ask') !!}" class="btn btn-success ajaxified">{!! trans('codercv.mark_as_ok') !!}<i class="fa fa-check"></i></a> or <a href="{!! url('delete/'.env('URL_NAME', 'post').'/'.$post->id) !!}" onclick="return confirm('{!! trans('codercv.confirmation_ask') !!}')" class="btn btn-danger"><i class="fa fa-trash"></i> {!! trans('codercv.delete') !!} ?</a>
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