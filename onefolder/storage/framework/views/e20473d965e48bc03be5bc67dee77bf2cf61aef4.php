<?php
/* @var $records */
?>
<?php if(count($records)): ?>
    <?php echo $records->appends(Request::query())->render(); ?>

<?php endif; ?>