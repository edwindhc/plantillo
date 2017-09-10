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
                @if(file_exists($settings->name))
                    <img src="{!! url($settings->name) !!}" alt="{!! strip_tags($settings->title) !!}">
                @else
                    {!! $settings->name !!}
                @endif
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/upload') }}">{!! trans('codercv.upload') !!}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{!! trans('codercv.login') !!}</a></li>
                    <li><a href="{{ url('/register') }}">{!! trans('codercv.register') !!}</a></li>
                @else
                    <li class="dropdown">
                        <a href="{!! url('user/'.Auth::user()->id.'/'.str_slug(Auth::user()->name)) !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
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