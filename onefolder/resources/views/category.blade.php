@extends('layouts.app')

@section('header')
    <title>{!! $categoryPost->name !!} - {!! $settings->title !!}</title>
    <meta name="description" content="{!! $categoryPost->description !!} ">
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{!! $categoryPost->name.' - '.$settings->title !!}"/>
    <meta property="og:description" content="{!! $categoryPost->description !!}"/>
    <meta property="og:url" content="{!! url('/') !!}"/>
    <meta property="og:site_name" content="{!! $categoryPost->name.' - '.$settings->title !!}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="{!! $categoryPost->name.' - '.$settings->title !!} "/>
    <meta name="twitter:title" content="{!! $categoryPost->name.' - '.$settings->title !!}"/>
    <meta name="twitter:domain" content="{!! url('/') !!}"/>
@endsection

@section('content')
    @foreach($widgets as $widget)
        @if($widget->location == 2)
            {!! $widget->content !!}
        @endif
    @endforeach
<div class="container">
    <div class="row">
        <div class="col-md-12 center-block post-block">
            <h4 class="text-center welcome-head">
                {!! trans('codercv.the_most') !!}
                <span class="dropdown topLink">
                    <span data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! $categoryPost->name !!}</span>
                    <ul class="dropdown-menu">
                        <li><a class="storyType" data-story="viral" href="{!! url('/') !!}">{!! trans('codercv.viral') !!}</a></li>
                        @foreach($categories as $cat)
                            <li><a class="storyFrom" href="{!! url(env('CATEGORY', 'category').'/'.$cat->id.'/'.str_slug($cat->name)) !!}">{!! $cat->name !!}</a></li>
                        @endforeach
                    </ul>
                </span>
                {!! trans('codercv.images_on').' '.$settings->name.'. '.trans('codercv.sorted_by') !!}
                <span class="dropdown topLink">
                    <span data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.like')))
                            <i class="fa fa-thumbs-o-up like"></i> {!! trans('codercv.like') !!}
                        @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.love')))
                            <i class="fa fa-heart-o heart"></i> {!! trans('codercv.love') !!}
                        @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.sad')))
                            <i class="fa fa-frown-o broken"></i> {!! trans('codercv.sad') !!}
                        @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.dislike')))
                            <i class="fa fa-thumbs-o-down dislike"></i> {!! trans('codercv.dislike') !!}
                        @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.popularity')))
                            <i class="fa fa-star popular"></i> {!! trans('codercv.popularity') !!}
                        @else
                            <i class="fa fa-bolt latest"></i> {!! trans('codercv.latest') !!}
                        @endif
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/') !!}"><i class="fa fa-bolt dislike"></i> {!! trans('codercv.latest') !!}</a></li>
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.popularity'))) !!}"><i class="fa fa-star dislike"></i> {!! trans('codercv.popularity') !!}</a></li>
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.like'))) !!}"><i class="fa fa-thumbs-o-up like"></i> {!! ucfirst(trans('codercv.most')).' '.trans('codercv.like') !!}</a></li>
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.love'))) !!}"><i class="fa fa-heart-o heart"></i> {!! ucfirst(trans('codercv.most')).' '.trans('codercv.love') !!}</a></li>
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.sad'))) !!}"><i class="fa fa-frown-o broken"></i> {!! ucfirst(trans('codercv.most')).' '.trans('codercv.sad') !!}</a></li>
                        <li><a href="{!! url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.dislike'))) !!}"><i class="fa fa-thumbs-o-down dislike"></i> {!! ucfirst(trans('codercv.most')).' '.trans('codercv.dislike') !!}</a></li>
                    </ul>
                </span>
            </h4>
            <p class="text-center muted">{!! $categoryPost->description !!}</p>
            <div class="panel panel-default">
                <div class="panel-body contentInfinite" data-href="{!! url('fetch/'.env('URL_NAME', 'post')) !!}"></div>
            </div>
        </div>
    </div>
</div>
    @foreach($widgets as $widget)
        @if($widget->location == 2)
            {!! $widget->content !!}
        @endif
    @endforeach
@endsection

@section('footer')
    <script>
        jQuery(document).ready(function() {
            jQuery('div#update').html('<div class="alert text-success message fa-lg text-center"><i class="fa fa-spin fa-spinner"></i> {!! trans('codercv.loading') !!}</div>');
            jQuery(window).scroll(function() {
                var page = jQuery('.contentInfinite').attr('data-href');
                infiniteScroll(page);
            });
            function infiniteScroll(page) {
                if(page.length > 3) {
                    clearTimeout( jQuery.data( this, "infinitePageCheck" ) );
                    jQuery.data( this, "infinitePageCheck", setTimeout(function() {
                        var scroll_position_for_posts_load = jQuery(window).height() + $(window).scrollTop() + 100;
                        if(scroll_position_for_posts_load >= jQuery(document).height()) {
                            jQuery.ajax({
                                url: page,
                                type: 'get',
                            @if(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.like')))
                                data: 'category={!! $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.like')) !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.love')))
                                data: 'category={!! $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.love')) !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.sad')))
                                data: 'category={!! $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.sad')) !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.dislike')))
                                data: 'category={!! $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.dislike')) !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.popularity')))
                                data: 'category={!! $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.popularity')) !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @else
                                data: 'category={!! $categoryPost->id !!}&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            @endif
                                beforeSend: function() {
                                    jQuery('div#update').html('<div class="alert text-success message fa-lg text-center"><i class="fa fa-spin fa-spinner"></i> {!! trans('codercv.loading') !!}</div>');
                                },
                                success: function(data) {
                                    if(JSON.parse(data).content.length > 1) {
                                        jQuery('.contentInfinite').append(JSON.parse(data).content);
                                    } else {
                                        jQuery('.contentInfinite').append('<div class="alert alert-danger">{!! trans('codercv.not_found') !!}</div>');
                                    }
                                    if(JSON.parse(data).nextPage == 'end') {
                                        jQuery('.contentInfinite').attr('data-href', '');
                                    } else {
                                        jQuery('.contentInfinite').attr('data-href', JSON.parse(data).nextPage);
                                        window.history.pushState('', '{!! $settings->title !!}', '?'+JSON.parse(data).nextPage.split('?')[1]);
                                    }
                                    jQuery('div.post-content').popover({
                                        trigger: 'hover',placement: 'bottom'
                                    });
                                    jQuery('div#update div.message').delay(600).fadeOut('slow');
                                },
                                error: function(e) {
                                    jQuery('div#update').html('<div class="alert alert-success message text-center"><i class="fa fa-spin fa-spinner"></i>'+e+'</div>');
                                    jQuery('div#update div.message').delay(1000).fadeOut('slow');
                                }
                            });
                        }
                    }, 350))
                }
            }
            function checkPost() {
                if(jQuery('.contentInfinite').height() + 30 <= jQuery(window).height()) {
                    var page = jQuery('.contentInfinite').attr('data-href');
                    infiniteScroll(page);
                }
            }
            setInterval(checkPost, 1000);
        });
    </script>
@endsection