@extends('vendor.crud.single-page-templates.common.app')

@section('content')
	@include('layouts.nav')
	<div class="container-fluid">
		<div class="col-sm-3">@include('layouts.sidebar')</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">Comments</div>
				<div class="panel-body">
					<table class="table table-striped grid-view-tbl">

						<thead>
						<tr class="header-row">
							{!!\Nvd\Crud\Html::sortableTh('id','comment.index','Id')!!}
							{!!\Nvd\Crud\Html::sortableTh('message','comment.index','Message')!!}
							{!!\Nvd\Crud\Html::sortableTh('user_id','comment.index','User Id')!!}
							{!!\Nvd\Crud\Html::sortableTh('report','comment.index','Report')!!}
							{!!\Nvd\Crud\Html::sortableTh('posts_id','comment.index','Posts Id')!!}
							{!!\Nvd\Crud\Html::sortableTh('created_at','comment.index','Created At')!!}
							{!!\Nvd\Crud\Html::sortableTh('updated_at','comment.index','Updated At')!!}
							<th></th>
						</tr>
						<tr class="search-row">
							<form class="search-form">
								<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
								<td><input type="text" class="form-control" name="message" value="{{Request::input("message")}}"></td>
								<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
								<td><input type="text" class="form-control" name="report" value="{{Request::input("report")}}"></td>
								<td><input type="text" class="form-control" name="posts_id" value="{{Request::input("posts_id")}}"></td>
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
							  data-name="message"
							  data-value="{{ $record->message }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/comment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->message }}</span>
								</td>
								<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/comment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->user_id }}</span>
								</td>
								<td>
						<span class="editable"
							  data-type="text"
							  data-name="report"
							  data-value="{{ $record->report }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/comment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->report }}</span>
								</td>
								<td>
						<span class="editable"
							  data-type="number"
							  data-name="posts_id"
							  data-value="{{ $record->posts_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/comment/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->posts_id }}</span>
								</td>
								<td>
									{{ $record->created_at }}
								</td>
								<td>
									{{ $record->updated_at }}
								</td>
								<td class="actions-cell">
									<form class="form-inline" action="/comment/{{$record->id}}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button style="outline: none;background: transparent;border: none;"
												onclick="return confirm('Are You Sure?')"
												type="submit" class="fa fa-trash text-danger"></button>
									</form>
								</td>
							</tr>
						@empty
							@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 8])
						@endforelse
						</tbody>

					</table>

					@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )
				</div>
			</div>
		</div>
	</div>

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection