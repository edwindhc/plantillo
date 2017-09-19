<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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
<link rel="stylesheet" href="<?php echo url('css/develop.css'); ?>">
    <?php echo $__env->yieldContent('header'); ?>
    <?php echo $settings->header; ?>

</head>
<body id="app-layout">
    <noscript><div class="alert alert-danger">Javascript is required to run the page.</div></noscript>
    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="update"></div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only"><?php echo trans('codercv.toggle_navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>" title="<?php echo strip_tags($settings->title); ?>">
                    <img style="width: 30px;" src="<?php echo url('/files/P.png'); ?>" alt="<?php echo strip_tags($settings->title); ?>">
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
                <li><a href="<?php echo e(url('/upload')); ?>"><?php echo trans('codercv.upload'); ?></a></li>
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>"><?php echo trans('codercv.login'); ?></a></li>
                        <li><a href="<?php echo e(url('/register')); ?>"><?php echo trans('codercv.register'); ?></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo e(Auth::user()->name); ?> <span class="caret"></span> </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php if(Auth::user() && Auth::user()->role_id == 1): ?>
                                    <li><a href="<?php echo url('setting'); ?>"><i class="fa fa-cog"></i> Admin Panel</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo url('home'); ?>"><i class="fa fa-home"></i> <?php echo trans('codercv.dashboard'); ?></a></li>
                                <li><a href="<?php echo url('edit/profile'); ?>"><i class="fa fa-user"></i> <?php echo trans('codercv.edit_profile'); ?></a></li>
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i><?php echo trans('codercv.logout'); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="fixed-opacity"></div>
    <?php if($settings->is_maintenance == 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1 ))): ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $settings->maintenance; ?>

                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if(Auth::user() && Auth::user()->role_id == 9): ?>
            <div class="alert alert-danger text-center"><i class="fa fa-thumbs-o-down"></i> You are Banned</div>
        <?php else: ?>
            <?php echo $__env->yieldContent('content'); ?>
        <?php endif; ?>
    <?php endif; ?>

    <div class="footer">
        <p class="text-center"><?php echo trans('codercv.copyright').' <a href="'.url('/').'">'.$settings->name.'</a>  '.date('Y').'. '.trans('codercv.rights_reserved'); ?></p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="<?php echo url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo url('js/scripts.js'); ?>"></script>
    <script src="<?php echo url('js/pinterest.js'); ?>"></script>
    <?php echo $__env->yieldContent('footer'); ?>
    <?php echo $settings->footer; ?>

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
