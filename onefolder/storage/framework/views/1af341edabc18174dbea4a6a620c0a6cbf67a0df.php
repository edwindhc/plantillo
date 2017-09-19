<?php $__env->startSection('header'); ?>
    <title><?php echo $categoryPost->name; ?> - <?php echo $settings->title; ?></title>
    <meta name="description" content="<?php echo $categoryPost->description; ?> ">
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo $categoryPost->name.' - '.$settings->title; ?>"/>
    <meta property="og:description" content="<?php echo $categoryPost->description; ?>"/>
    <meta property="og:url" content="<?php echo url('/'); ?>"/>
    <meta property="og:site_name" content="<?php echo $categoryPost->name.' - '.$settings->title; ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="<?php echo $categoryPost->name.' - '.$settings->title; ?> "/>
    <meta name="twitter:title" content="<?php echo $categoryPost->name.' - '.$settings->title; ?>"/>
    <meta name="twitter:domain" content="<?php echo url('/'); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 2): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 center-block post-block">
            <h4 class="text-center welcome-head">
                <?php echo trans('codercv.the_most'); ?>

                <span class="dropdown topLink">
                    <span data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $categoryPost->name; ?></span>
                    <ul class="dropdown-menu">
                        <li><a class="storyType" data-story="viral" href="<?php echo url('/'); ?>"><?php echo trans('codercv.viral'); ?></a></li>
                        <?php foreach($categories as $cat): ?>
                            <li><a class="storyFrom" href="<?php echo url(env('CATEGORY', 'category').'/'.$cat->id.'/'.str_slug($cat->name)); ?>"><?php echo $cat->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </span>
                <?php echo trans('codercv.images_on').' '.$settings->name.'. '.trans('codercv.sorted_by'); ?>

                <span class="dropdown topLink">
                    <span data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php if(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.like'))): ?>
                            <i class="fa fa-thumbs-o-up like"></i> <?php echo trans('codercv.like'); ?>

                        <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.love'))): ?>
                            <i class="fa fa-heart-o heart"></i> <?php echo trans('codercv.love'); ?>

                        <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.sad'))): ?>
                            <i class="fa fa-frown-o broken"></i> <?php echo trans('codercv.sad'); ?>

                        <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.dislike'))): ?>
                            <i class="fa fa-thumbs-o-down dislike"></i> <?php echo trans('codercv.dislike'); ?>

                        <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.popularity'))): ?>
                            <i class="fa fa-star popular"></i> <?php echo trans('codercv.popularity'); ?>

                        <?php else: ?>
                            <i class="fa fa-bolt latest"></i> <?php echo trans('codercv.latest'); ?>

                        <?php endif; ?>
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/'); ?>"><i class="fa fa-bolt dislike"></i> <?php echo trans('codercv.latest'); ?></a></li>
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.popularity'))); ?>"><i class="fa fa-star dislike"></i> <?php echo trans('codercv.popularity'); ?></a></li>
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.like'))); ?>"><i class="fa fa-thumbs-o-up like"></i> <?php echo ucfirst(trans('codercv.most')).' '.trans('codercv.like'); ?></a></li>
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.love'))); ?>"><i class="fa fa-heart-o heart"></i> <?php echo ucfirst(trans('codercv.most')).' '.trans('codercv.love'); ?></a></li>
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.sad'))); ?>"><i class="fa fa-frown-o broken"></i> <?php echo ucfirst(trans('codercv.most')).' '.trans('codercv.sad'); ?></a></li>
                        <li><a href="<?php echo url(env('CATEGORY', 'category').'/'.$categoryPost->id.'/'.$categoryPost->name.'/?'.trans('codercv.sort').'='.strtolower(trans('codercv.dislike'))); ?>"><i class="fa fa-thumbs-o-down dislike"></i> <?php echo ucfirst(trans('codercv.most')).' '.trans('codercv.dislike'); ?></a></li>
                    </ul>
                </span>
            </h4>
            <p class="text-center muted"><?php echo $categoryPost->description; ?></p>
            <div class="panel panel-default">
                <div class="panel-body contentInfinite" data-href="<?php echo url('fetch/'.env('URL_NAME', 'post')); ?>"></div>
            </div>
        </div>
    </div>
</div>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 2): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('div#update').html('<div class="alert text-success message fa-lg text-center"><i class="fa fa-spin fa-spinner"></i> <?php echo trans('codercv.loading'); ?></div>');
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
                            <?php if(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.like'))): ?>
                                data: 'category=<?php echo $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.like')); ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.love'))): ?>
                                data: 'category=<?php echo $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.love')); ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.sad'))): ?>
                                data: 'category=<?php echo $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.sad')); ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.dislike'))): ?>
                                data: 'category=<?php echo $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.dislike')); ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php elseif(isset($_GET[trans('codercv.sort')]) && $_GET[trans('codercv.sort')] == strtolower(trans('codercv.popularity'))): ?>
                                data: 'category=<?php echo $categoryPost->id.'&'.trans('codercv.sort').'='.strtolower(trans('codercv.popularity')); ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php else: ?>
                                data: 'category=<?php echo $categoryPost->id; ?>&userAgent='+encodeURIComponent('CoderCV 1.0.1 - Moz - NonCli-Browser'),
                            <?php endif; ?>
                                beforeSend: function() {
                                    jQuery('div#update').html('<div class="alert text-success message fa-lg text-center"><i class="fa fa-spin fa-spinner"></i> <?php echo trans('codercv.loading'); ?></div>');
                                },
                                success: function(data) {
                                    if(JSON.parse(data).content.length > 1) {
                                        jQuery('.contentInfinite').append(JSON.parse(data).content);
                                    } else {
                                        jQuery('.contentInfinite').append('<div class="alert alert-danger"><?php echo trans('codercv.not_found'); ?></div>');
                                    }
                                    if(JSON.parse(data).nextPage == 'end') {
                                        jQuery('.contentInfinite').attr('data-href', '');
                                    } else {
                                        jQuery('.contentInfinite').attr('data-href', JSON.parse(data).nextPage);
                                        window.history.pushState('', '<?php echo $settings->title; ?>', '?'+JSON.parse(data).nextPage.split('?')[1]);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>