@extends('layouts.app')

@section('header')
    <title>{!! trans('codercv.register') !!} - {!! $settings->title !!}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('codercv.register') !!}</div>
                <div class="panel-body">

                    <p class="text-center"><a class="btn facebook" href="{!! url('redirect/facebook') !!}"> <i class="fa fa-facebook"></i> {!! trans('codercv.login_with_facebook') !!}</a></p>
                    <p class="text-center"><a class="btn google" href="{!! url('redirect/google') !!}"> <i class="fa fa-google-plus"></i> {!! trans('codercv.login_with_google') !!}</a></p>
                    <p class="text-center"><a class="btn twitter" href="{!! url('redirect/twitter') !!}"> <i class="fa fa-twitter"></i> {!! trans('codercv.login_with_twitter') !!} &nbsp;&nbsp;&nbsp;</a></p>
                    @if($settings->disable_form_registration == 2)
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{!! trans('codercv.name') !!}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">{!! trans('codercv.confirm_password') !!}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> {!! trans('codercv.register') !!}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
