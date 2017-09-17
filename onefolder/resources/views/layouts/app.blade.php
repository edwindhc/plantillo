<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! Feed::link(url('feed/'.env('URL_NAME', 'post')), 'rss', 'Feed: News', 'en') !!}
    @if($settings->user_theme == 1)
        @if(Auth::check() && in_array(Auth::user()->themes, range(1, 17)))
<link rel="stylesheet" href="{!! url('css/'.Auth::user()->themes.'.css') !!}">
        @else
<link rel="stylesheet" href="{!! url('css/'.$settings->themes.'.css') !!}">
        @endif
    @else
<link rel="stylesheet" href="{!! url('css/'.$settings->themes.'.css') !!}">
    @endif
<link rel="stylesheet" href="{!! url('css/style.css') !!}">
<link rel="stylesheet" href="{!! url('css/develop.css') !!}">
    @yield('header')
    {!! $settings->header !!}
</head>
<body id="app-layout">
    <noscript><div class="alert alert-danger">Javascript is required to run the page.</div></noscript>
    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include('flash::message')
    <div id="update"></div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">{!! trans('codercv.toggle_navigation') !!}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" title="{!! strip_tags($settings->title) !!}">
                    <img style="width: 30px;" src="{!! url('/files/P.png') !!}" alt="{!! strip_tags($settings->title) !!}">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                <li>
                    <div class="icon-addon addon-md" style="margin-top:12px">
                        <input type="text" placeholder="Buscar" class="form-control" id="Buscar">
                        <label for="Buscar" class="glyphicon glyphicon-search" rel="tooltip" title="Buscar"></label>
                </div>
                </li>



                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/upload') }}">{!! trans('codercv.upload') !!}</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{!! trans('codercv.login') !!}</a></li>
                        <li><a href="{{ url('/register') }}">{!! trans('codercv.register') !!}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user() && Auth::user()->role_id == 1)
                                    <li><a href="{!! url('setting') !!}"><i class="fa fa-cog"></i> Admin Panel</a></li>
                                @endif
                                <li><a href="{!! url('home') !!}"><i class="fa fa-home"></i> {!! trans('codercv.dashboard') !!}</a></li>
                                <li><a href="{!! url('edit/profile') !!}"><i class="fa fa-user"></i> {!! trans('codercv.edit_profile') !!}</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{!! trans('codercv.logout') !!}</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="fixed-opacity"></div>
    @if($settings->is_maintenance == 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1 )))
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $settings->maintenance !!}
                </div>
            </div>
        </div>
    @else
        @if(Auth::user() && Auth::user()->role_id == 9)
            <div class="alert alert-danger text-center"><i class="fa fa-thumbs-o-down"></i> You are Banned</div>
        @else
            @yield('content')
        @endif
    @endif

    <div class="footer">
        <p class="text-center">{!! trans('codercv.copyright').' <a href="'.url('/').'">'.$settings->name.'</a>  '.date('Y').'. '.trans('codercv.rights_reserved') !!}</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{!! url('js/bootstrap.min.js') !!}"></script>
    <script src="{!! url('js/scripts.js') !!}"></script>
    @yield('footer')
    {!! $settings->footer !!}
</body>
</html>

<script>
    $(document).ready(function(){
  $('#Buscar').on('focus', function() {

        if($('.fixed-opacity').css("display") == "none")
        {
           $('.fixed-opacity').show(100);
          }

  });

 $('#Buscar').on('blur', function() {
       if($('.fixed-opacity').css("display") == "block")
       {
           $('.fixed-opacity').hide(100);

       }
 });
});
</script>
