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
                                    <th class="col-xs-2 bg-success bold white text-center">Name</th>
                                    <th class="col-xs-2 bg-success bold white text-center">Email</th>
                                    <th class="col-xs-2 bg-success bold white text-center">Themes</th>
                                    <th class="col-xs-2 bg-success bold white text-center">Avatar</th>
                                    <th class="col-xs-2 bg-success bold white text-center">Joined</th>
                                    <th class="col-xs-2 bg-success bold white text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userList as $user)
                                    <tr>
                                        <td>{!! $user->name !!} <br> <b>UserID : </b> {!! $user->id !!} </td>
                                        <td>{!! $user->email !!}</td>
                                        <td><b>Theme: </b> {!! $user->themes !!} <br> <b>Joined :</b> {!! '<b>Joined</b> '.$user->created_at !!}</td>
                                        <td><img src="{!! url($user->avatar)!!}" alt=""></td>
                                        <td>

                                        </td>
                                        <td>
                                            @if($user->role_id != 9)
                                            <a href="javascript:void(0)" data-href="{!! url('ban/user/'.$user->id) !!}" data-confirm="yes" data-confirmation="{!! trans('codercv.confirmation_ask') !!}" class="btn btn-info ajaxified"><i class="fa fa-eye-slash"></i> Ban</a>
                                            @else
                                                <a href="javascript:void(0)" data-href="{!! url('unban/user/'.$user->id) !!}" data-confirm="yes" data-confirmation="{!! trans('codercv.confirmation_ask') !!}" class="btn btn-warning ajaxified"><i class="fa fa-eye"></i> Un-Ban</a>
                                            @endif
                                                <br>
                                            <a href="javascript:void(0)" class="ajaxified btn btn-danger" data-href="{!! url('delete/user/'.$user->id) !!}" data-confirm="yes" data-confirmation="{!! trans('codercv.confirmation_ask') !!}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer text-success">
                        <b>Note:</b> Ban will not delete user content. Delete will delete all user content.
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