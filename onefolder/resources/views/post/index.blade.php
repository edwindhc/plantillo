@extends('vendor.crud.single-page-templates.common.app')

@section('content')
	@include('layouts.nav')
	<div class="col-sm-3">
		@include('layouts.sidebar')
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading"> <h4 class="panel-title">Posts</h4> </div>
			<div class="panel-body">
				<table class="table table-striped grid-view-tbl">
					<thead>
					<tr class="header-row">
						{!!\Nvd\Crud\Html::sortableTh('id','post.index','Id')!!}
						{!!\Nvd\Crud\Html::sortableTh('title','post.index','Title')!!}
						{!!\Nvd\Crud\Html::sortableTh('description','post.index','Description')!!}
						{!!\Nvd\Crud\Html::sortableTh('user_id','post.index','User Id')!!}
						{!!\Nvd\Crud\Html::sortableTh('status','post.index','Status')!!}
						{!!\Nvd\Crud\Html::sortableTh('cat_id','post.index','Cat Id')!!}
						{!!\Nvd\Crud\Html::sortableTh('report','post.index','Report')!!}
						{!!\Nvd\Crud\Html::sortableTh('admin_post','post.index','Admin Post')!!}
						{!!\Nvd\Crud\Html::sortableTh('created_at','post.index','Created At')!!}
						{!!\Nvd\Crud\Html::sortableTh('updated_at','post.index','Updated At')!!}
						{!!\Nvd\Crud\Html::sortableTh('delete_url','post.index','Delete Url')!!}
						{!!\Nvd\Crud\Html::sortableTh('views','post.index','Views')!!}
						<th></th>
					</tr>
					<tr class="search-row">
						<form class="search-form">
							<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
							<td><input type="text" class="form-control" name="title" value="{{Request::input("title")}}"></td>
							<td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
							<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
							<td><input type="text" class="form-control" name="status" value="{{Request::input("status")}}"></td>
							<td><input type="text" class="form-control" name="cat_id" value="{{Request::input("cat_id")}}"></td>
							<td><input type="text" class="form-control" name="report" value="{{Request::input("report")}}"></td>
							<td><input type="text" class="form-control" name="admin_post" value="{{Request::input("admin_post")}}"></td>
							<td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
							<td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
							<td><input type="text" class="form-control" name="delete_url" value="{{Request::input("delete_url")}}"></td>
							<td><input type="text" class="form-control" name="views" value="{{Request::input("views")}}"></td>
							<td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
						</form>
					</tr>
					</thead>
					<tbody>
					@forelse ( $records as $record )
						<tr>
							<td>
								{{ $record->id }}
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="title"
							  data-value="{{ $record->title }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->title }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="description"
							  data-value="{{ $record->description }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->description }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->user_id }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="status"
							  data-value="{{ $record->status }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->status }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="number"
							  data-name="cat_id"
							  data-value="{{ $record->cat_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->cat_id }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="report"
							  data-value="{{ $record->report }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->report }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="admin_post"
							  data-value="{{ $record->admin_post }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->admin_post }}</span>
							</td>
							<td>
								{{ $record->created_at }}
							</td>
							<td>
								{{ $record->updated_at }}
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="delete_url"
							  data-value="{{ $record->delete_url }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->delete_url }}</span>
							</td>
							<td>
						<span class="editable"
							  data-type="text"
							  data-name="views"
							  data-value="{{ $record->views }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/post/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->views }}</span>
							</td>
                            <td class="actions-cell">
                                    <a href="{!! env('URL_NAME') !!}/{{$record->id}}/{!! str_slug($settings->name) !!}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="{!! url('delete/'.env('URL_NAME', 'post').'/'.$record->id) !!}" onclick="return confirm('{!! trans('codercv.confirmation_ask') !!}')"><i class="fa text-danger fa-trash"></i></a>
                            </td>
						</tr>
					@empty
						@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 13])
					@endforelse
					</tbody>
				</table>
				@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )
			</div>
		</div>
	</div>
<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection