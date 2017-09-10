<!DOCTYPE html>
<html>
<head>
    <title><?php echo $settings->title; ?></title>
    <?php echo Feed::link(url('feed/'.env('URL_NAME', 'post')), 'rss', 'Feed: News', 'en'); ?>

    <?php if($settings->user_theme == 1): ?>
        <?php if(Auth::check() && in_array(Auth::user()->themes, range(1, 17))): ?>
            <link rel="stylesheet" href="<?php echo url('css/'.Auth::user()->themes.'.css'); ?>">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo url('css/'.$settings->themes.'.css'); ?>">
        <?php endif; ?>
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo url('css/'.$settings->themes.'.css'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo url('css/style.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <link rel="stylesheet" href="<?php echo url('css/magnific-popup.css'); ?>">
    <script src="<?php echo url('js/jquery.magnific-popup.min.js'); ?>"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>
<body>
<div>
    <div class="content">
        <?php echo $__env->yieldContent("content"); ?>
    </div>
</div>
<script src="<?php echo url('js/scripts.js'); ?>"></script>
</body>
</html>