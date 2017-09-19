<?php $__env->startSection('header'); ?>
    <title><?php echo trans('codercv.login'); ?> - <?php echo $settings->title; ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo trans('codercv.login'); ?></div>
                <div class="panel-body">

                    <p class="text-center"><a class="btn facebook" href="<?php echo url('redirect/facebook'); ?>"> <i class="fa fa-facebook"></i> <?php echo trans('codercv.login_with_facebook'); ?></a></p>
                    <p class="text-center"><a class="btn google" href="<?php echo url('redirect/google'); ?>"> <i class="fa fa-google-plus"></i> <?php echo trans('codercv.login_with_google'); ?></a></p>
                    <p class="text-center"><a class="btn twitter" href="<?php echo url('redirect/twitter'); ?>"> <i class="fa fa-twitter"></i> <?php echo trans('codercv.login_with_twitter'); ?> &nbsp;&nbsp;&nbsp;</a></p>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>


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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <span class="custom">
                                            <input type="checkbox" autocomplete="off" name="remember">
                                            <span class="glyphicon glyphicon-unchecked"></span>
                                            <span class="glyphicon glyphicon-check"></span></span>
                                        <?php echo trans('codercv.reset_password'); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> <?php echo trans('codercv.login'); ?>

                                </button>
                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>"><?php echo trans('codercv.forgot_password'); ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>