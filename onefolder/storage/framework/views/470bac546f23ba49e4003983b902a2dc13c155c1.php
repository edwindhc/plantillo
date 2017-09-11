<?php $__env->startSection('header'); ?>
    <title><?php echo trans('codercv.register'); ?> - <?php echo $settings->title; ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo trans('codercv.register'); ?></div>
                <div class="panel-body">

                    <p class="text-center"><a class="btn facebook" href="<?php echo url('redirect/facebook'); ?>"> <i class="fa fa-facebook"></i> <?php echo trans('codercv.login_with_facebook'); ?></a></p>
                    <p class="text-center"><a class="btn google" href="<?php echo url('redirect/google'); ?>"> <i class="fa fa-google-plus"></i> <?php echo trans('codercv.login_with_google'); ?></a></p>
                    <p class="text-center"><a class="btn twitter" href="<?php echo url('redirect/twitter'); ?>"> <i class="fa fa-twitter"></i> <?php echo trans('codercv.login_with_twitter'); ?> &nbsp;&nbsp;&nbsp;</a></p>
                    <?php if($settings->disable_form_registration == 2): ?>
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label"><?php echo trans('codercv.name'); ?></label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label"><?php echo trans('codercv.email'); ?></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-4 control-label"><?php echo trans('codercv.password'); ?></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <label for="password-confirm" class="col-md-4 control-label"><?php echo trans('codercv.confirm_password'); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> <?php echo trans('codercv.register'); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>