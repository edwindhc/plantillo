@extends('layouts.app')

@section('header')
    <title>{!! trans('codercv.login') !!} - {!! $settings->title !!}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('codercv.login') !!}</div>
                <div class="panel-body">

                    <p class="text-center"><a class="btn facebook" href="{!! url('redirect/facebook') !!}"> <i class="fa fa-facebook"></i> {!! trans('codercv.login_with_facebook') !!}</a></p>
                    <p class="text-center"><a class="btn google" href="{!! url('redirect/google') !!}"> <i class="fa fa-google-plus"></i> {!! trans('codercv.login_with_google') !!}</a></p>
                    <p class="text-center"><a class="btn twitter" href="{!! url('redirect/twitter') !!}"> <i class="fa fa-twitter"></i> {!! trans('codercv.login_with_twitter') !!} &nbsp;&nbsp;&nbsp;</a></p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{!! trans('codercv.email') !!}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{!! trans('codercv.password') !!}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <span class="custom">
                                            <input type="checkbox" autocomplete="off" name="remember">
                                            <span class="glyphicon glyphicon-unchecked"></span>
                                            <span class="glyphicon glyphicon-check"></span></span>
                                        {!! trans('codercv.reset_password') !!}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {!! trans('codercv.login') !!}
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('codercv.forgot_password') !!}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
