@extends('vendor.crud.single-page-templates.common.app')

@section('content')
    @include('layouts.nav')
	<div class="container-fluid">
		<div class="col-sm-3">
            @include('layouts.sidebar')
        </div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="panel-title">Attachments</h4></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped grid-view-tbl">

							<thead>
							<tr class="header-row">
								{!!\Nvd\Crud\Html::sortableTh('id','attachment.index','Id')!!}
								{!!\Nvd\Crud\Html::sortableTh('imgname','attachment.index','Imgname')!!}
								{!!\Nvd\Crud\Html::sortableTh('image','attachment.index','Image')!!}
								{!!\Nvd\Crud\Html::sortableTh('title','attachment.index','Title')!!}
								{!!\Nvd\Crud\Html::sortableTh('description','attachment.index','Description')!!}
								{!!\Nvd\Crud\Html::sortableTh('user_id','attachment.index','User Id')!!}
								{!!\Nvd\Crud\Html::sortableTh('post_id','attachment.index','Post Id')!!}
								{!!\Nvd\Crud\Html::sortableTh('status','attachment.index','Status')!!}
								{!!\Nvd\Crud\Html::sortableTh('position','attachment.index','Position')!!}
								{!!\Nvd\Crud\Html::sortableTh('created_at','attachment.index','Created At')!!}
								{!!\Nvd\Crud\Html::sortableTh('updated_at','attachment.index','Updated At')!!}
								<th></th>
							</tr>
							<tr class="search-row">
								<form class="search-form">
									<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
									<td><input type="text" class="form-control" name="imgname" value="{{Request::input("imgname")}}"></td>
									<td><input type="text" class="form-control" name="image" value="{{Request::input("image")}}"></td>
									<td><input type="text" class="form-control" name="title" value="{{Request::input("title")}}"></td>
									<td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
									<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
									<td><input type="text" class="form-control" name="post_id" value="{{Request::input("post_id")}}"></td>
									<td><input type="text" class="form-control" name="status" value="{{Request::input("status")}}"></td>
									<td><input type="text" class="form-control" name="position" value="{{Request::input("position")}}"></td>
									<td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
									<td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
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
							  data-name="imgname"
							  data-value="{{ $record->imgname }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->imgname }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="image"
							  data-value="{{ $record->image }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->image }}</span>
										<a class="popup-link" href="{!! url($record->image) !!}"><img src="{!! url($record->image) !!}" alt="Attachments" width="64px" height="64px"></a>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="title"
							  data-value="{{ $record->title }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->title }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="textarea"
							  data-name="description"
							  data-value="{{ $record->description }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->description }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->user_id }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="post_id"
							  data-value="{{ $record->post_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->post_id }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="status"
							  data-value="{{ $record->status }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->status }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="position"
							  data-value="{{ $record->position }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/attachment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->position }}</span>
									</td>
									<td>
										{{ $record->created_at }}
									</td>
									<td>
										{{ $record->updated_at }}
									</td>
                                    <td class="actions-cell">
                                        <form class="form-inline" action="/attachment/{{$record->id}}" method="POST">
                                            <a href="{!! env('URL_NAME', 'post') !!}/{{$record->id}}/{!! str_slug($settings->name) !!}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button style="outline: none;background: transparent;border: none;"
                                                    onclick="return confirm('Are You Sure?')"
                                                    type="submit" class="fa fa-trash text-danger"></button>
                                        </form>
                                    </td>
								</tr>
							@empty
								@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
							@endforelse
							</tbody>

						</table>
						@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )
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
@endsection