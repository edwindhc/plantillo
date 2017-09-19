<?php $__env->startSection('header'); ?>
    <title><?php echo $settings->title; ?> - <?php echo $settings->name; ?></title>
    <meta name="description" content="<?php echo e($settings->description); ?> ">
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo $settings->title; ?>"/>
    <meta property="og:description" content="<?php echo e($settings->description); ?>"/>
    <meta property="og:url" content="<?php echo url('/'); ?>"/>
    <meta property="og:site_name" content="<?php echo $settings->title; ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="<?php echo e($settings->title); ?> "/>
    <meta name="twitter:title" content="<?php echo $settings->title; ?>"/>
    <meta name="twitter:domain" content="<?php echo url('/'); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 center-block">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo trans('codercv.edit_profile'); ?></div>
                    <div class="panel body p-2">
                        <?php echo Form::open(['url' => url('update/profile'), 'method' => 'post', 'enctype' => 'multipart/form-data']); ?>

                        <div class="form-group">
                            <label for="name" class="control-label"><?php echo trans('codercv.name'); ?></label>
                            <?php echo Form::text('name', Auth::user()->name , ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label"><?php echo trans('codercv.email'); ?></label>
                            <?php echo Form::text('email', Auth::user()->email, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label"><?php echo trans('codercv.avatar'); ?></label>
                            <?php echo Form::file('avatar', NULL, ['class' => 'form-control']); ?>

                        </div>
                        <?php if($settings->user_theme == 1): ?>
                        <div class="form-group">
                            <label for="email" class="control-label"><?php echo trans('codercv.themes'); ?></label>
                            <?php echo Form::select('themes', array(4 => 'Default', 1 => 'White Gray', 2 => 'White Sky', 3 => 'Black & White', 5 => 'Blue Black', 6 => 'Blue White', 7 => 'News Shine', 8 => 'White 3D' , 9 => 'Material White', 10 => 'Old School' , 11 => 'Green Yard', 12 => 'Simple Red', 13 => 'Carbon Grump', 14 => 'Applepie', 15 => 'Blue Hill', 16 => 'Ubuntu' , 17 => 'Light Black'), Auth::user()->themes, ['class' => 'form-control']); ?>

                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <button class="btn btn-success pull-right"><i class="fa fa-check"></i> <?php echo trans('codercv.update'); ?></button>
                            </div>
                            <br>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>