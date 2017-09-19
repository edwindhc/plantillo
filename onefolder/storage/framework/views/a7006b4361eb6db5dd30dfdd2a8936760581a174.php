

<?php $__env->startSection('header'); ?>
    <title><?php echo strip_tags(trans('codercv.404_not_found')); ?></title>
    <style>
        body { overflow: hidden;background:url('<?php echo url('files/404.gif'); ?>') no-repeat center center fixed;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; }
        img { width:100%;height:100vh !important; }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-center"><?php echo trans('codercv.404_not_found'); ?></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>