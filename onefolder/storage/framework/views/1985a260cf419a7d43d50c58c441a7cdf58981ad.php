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
                asdasdsad
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(url('/upload')); ?>"><?php echo trans('codercv.upload'); ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo trans('codercv.login'); ?></a></li>
                    <li><a href="<?php echo e(url('/register')); ?>"><?php echo trans('codercv.register'); ?></a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="<?php echo url('user/'.Auth::user()->id.'/'.str_slug(Auth::user()->name)); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo e(Auth::user()->name); ?> <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
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