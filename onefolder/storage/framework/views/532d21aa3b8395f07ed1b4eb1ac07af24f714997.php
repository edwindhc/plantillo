<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container-fluid">
		<div class="col-sm-3">
            <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="panel-title">Attachments</h4></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped grid-view-tbl">

							<thead>
							<tr class="header-row">
								<?php echo \Nvd\Crud\Html::sortableTh('id','attachment.index','Id'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('imgname','attachment.index','Imgname'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('image','attachment.index','Image'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('title','attachment.index','Title'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('description','attachment.index','Description'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('user_id','attachment.index','User Id'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('post_id','attachment.index','Post Id'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('status','attachment.index','Status'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('position','attachment.index','Position'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('created_at','attachment.index','Created At'); ?>

								<?php echo \Nvd\Crud\Html::sortableTh('updated_at','attachment.index','Updated At'); ?>

								<th></th>
							</tr>
							<tr class="search-row">
								<form class="search-form">
									<td><input type="text" class="form-control" name="id" value="<?php echo e(Request::input("id")); ?>"></td>
									<td><input type="text" class="form-control" name="imgname" value="<?php echo e(Request::input("imgname")); ?>"></td>
									<td><input type="text" class="form-control" name="image" value="<?php echo e(Request::input("image")); ?>"></td>
									<td><input type="text" class="form-control" name="title" value="<?php echo e(Request::input("title")); ?>"></td>
									<td><input type="text" class="form-control" name="description" value="<?php echo e(Request::input("description")); ?>"></td>
									<td><input type="text" class="form-control" name="user_id" value="<?php echo e(Request::input("user_id")); ?>"></td>
									<td><input type="text" class="form-control" name="post_id" value="<?php echo e(Request::input("post_id")); ?>"></td>
									<td><input type="text" class="form-control" name="status" value="<?php echo e(Request::input("status")); ?>"></td>
									<td><input type="text" class="form-control" name="position" value="<?php echo e(Request::input("position")); ?>"></td>
									<td><input type="text" class="form-control" name="created_at" value="<?php echo e(Request::input("created_at")); ?>"></td>
									<td><input type="text" class="form-control" name="updated_at" value="<?php echo e(Request::input("updated_at")); ?>"></td>
									<td style="min-width: 6em;"><?php echo $__env->make('vendor.crud.single-page-templates.common.search-btn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
								</form>
							</tr>
							</thead>

							<tbody>
							<?php $__empty_1 = true; foreach( $records as $record ): $__empty_1 = false; ?>
								<tr>
									<td>
										<?php echo e($record->id); ?>

									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="imgname"
							  data-value="<?php echo e($record->imgname); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->imgname); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="image"
							  data-value="<?php echo e($record->image); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->image); ?></span>
										<a class="popup-link" href="<?php echo url($record->image); ?>"><img src="<?php echo url($record->image); ?>" alt="Attachments" width="64px" height="64px"></a>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="title"
							  data-value="<?php echo e($record->title); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->title); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="textarea"
							  data-name="description"
							  data-value="<?php echo e($record->description); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->description); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="<?php echo e($record->user_id); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->user_id); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="post_id"
							  data-value="<?php echo e($record->post_id); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->post_id); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="status"
							  data-value="<?php echo e($record->status); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->status); ?></span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="position"
							  data-value="<?php echo e($record->position); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/attachment/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->position); ?></span>
									</td>
									<td>
										<?php echo e($record->created_at); ?>

									</td>
									<td>
										<?php echo e($record->updated_at); ?>

									</td>
                                    <td class="actions-cell">
                                        <form class="form-inline" action="/attachment/<?php echo e($record->id); ?>" method="POST">
                                            <a href="<?php echo env('URL_NAME', 'post'); ?>/<?php echo e($record->id); ?>/<?php echo str_slug($settings->name); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;

                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button style="outline: none;background: transparent;border: none;"
                                                    onclick="return confirm('Are You Sure?')"
                                                    type="submit" class="fa fa-trash text-danger"></button>
                                        </form>
                                    </td>
								</tr>
							<?php endforeach; if ($__empty_1): ?>
								<?php echo $__env->make('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endif; ?>
							</tbody>

						</table>
						<?php echo $__env->make('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
    jQuery('.popup-link').magnificPopup({
        type:'image'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.crud.single-page-templates.common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>