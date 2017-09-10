<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="col-sm-3">
		<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading"> <h4 class="panel-title">Posts</h4> </div>
			<div class="panel-body">
				<table class="table table-striped grid-view-tbl">
					<thead>
					<tr class="header-row">
						<?php echo \Nvd\Crud\Html::sortableTh('id','post.index','Id'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('title','post.index','Title'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('description','post.index','Description'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('user_id','post.index','User Id'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('status','post.index','Status'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('cat_id','post.index','Cat Id'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('report','post.index','Report'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('admin_post','post.index','Admin Post'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('created_at','post.index','Created At'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('updated_at','post.index','Updated At'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('delete_url','post.index','Delete Url'); ?>

						<?php echo \Nvd\Crud\Html::sortableTh('views','post.index','Views'); ?>

						<th></th>
					</tr>
					<tr class="search-row">
						<form class="search-form">
							<td><input type="text" class="form-control" name="id" value="<?php echo e(Request::input("id")); ?>"></td>
							<td><input type="text" class="form-control" name="title" value="<?php echo e(Request::input("title")); ?>"></td>
							<td><input type="text" class="form-control" name="description" value="<?php echo e(Request::input("description")); ?>"></td>
							<td><input type="text" class="form-control" name="user_id" value="<?php echo e(Request::input("user_id")); ?>"></td>
							<td><input type="text" class="form-control" name="status" value="<?php echo e(Request::input("status")); ?>"></td>
							<td><input type="text" class="form-control" name="cat_id" value="<?php echo e(Request::input("cat_id")); ?>"></td>
							<td><input type="text" class="form-control" name="report" value="<?php echo e(Request::input("report")); ?>"></td>
							<td><input type="text" class="form-control" name="admin_post" value="<?php echo e(Request::input("admin_post")); ?>"></td>
							<td><input type="text" class="form-control" name="created_at" value="<?php echo e(Request::input("created_at")); ?>"></td>
							<td><input type="text" class="form-control" name="updated_at" value="<?php echo e(Request::input("updated_at")); ?>"></td>
							<td><input type="text" class="form-control" name="delete_url" value="<?php echo e(Request::input("delete_url")); ?>"></td>
							<td><input type="text" class="form-control" name="views" value="<?php echo e(Request::input("views")); ?>"></td>
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
							  data-name="title"
							  data-value="<?php echo e($record->title); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->title); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="description"
							  data-value="<?php echo e($record->description); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->description); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="<?php echo e($record->user_id); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->user_id); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="status"
							  data-value="<?php echo e($record->status); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->status); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="number"
							  data-name="cat_id"
							  data-value="<?php echo e($record->cat_id); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->cat_id); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="report"
							  data-value="<?php echo e($record->report); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->report); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="admin_post"
							  data-value="<?php echo e($record->admin_post); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->admin_post); ?></span>
							</td>
							<td>
								<?php echo e($record->created_at); ?>

							</td>
							<td>
								<?php echo e($record->updated_at); ?>

							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="delete_url"
							  data-value="<?php echo e($record->delete_url); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->delete_url); ?></span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="views"
							  data-value="<?php echo e($record->views); ?>"
							  data-pk="<?php echo e($record->{$record->getKeyName()}); ?>"
							  data-url="/post/<?php echo e($record->{$record->getKeyName()}); ?>"
						><?php echo e($record->views); ?></span>
							</td>
                            <td class="actions-cell">
                                    <a href="<?php echo env('URL_NAME'); ?>/<?php echo e($record->id); ?>/<?php echo str_slug($settings->name); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo url('delete/'.env('URL_NAME', 'post').'/'.$record->id); ?>" onclick="return confirm('<?php echo trans('codercv.confirmation_ask'); ?>')"><i class="fa text-danger fa-trash"></i></a>
                            </td>
						</tr>
					<?php endforeach; if ($__empty_1): ?>
						<?php echo $__env->make('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 13], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php echo $__env->make('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		</div>
	</div>
<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.crud.single-page-templates.common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>