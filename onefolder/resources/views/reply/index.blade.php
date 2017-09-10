@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	<h2>Replies</h2>

	@include('reply.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','reply.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('message','reply.index','Message')!!}
			{!!\Nvd\Crud\Html::sortableTh('user_id','reply.index','User Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('report','reply.index','Report')!!}
			{!!\Nvd\Crud\Html::sortableTh('comment_id','reply.index','Comment Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','reply.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','reply.index','Updated At')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="message" value="{{Request::input("message")}}"></td>
				<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
				<td><input type="text" class="form-control" name="report" value="{{Request::input("report")}}"></td>
				<td><input type="text" class="form-control" name="comment_id" value="{{Request::input("comment_id")}}"></td>
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
							  data-url="/reply/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->message }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/reply/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->user_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="report"
							  data-value="{{ $record->report }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/reply/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->report }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="comment_id"
							  data-value="{{ $record->comment_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/reply/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->comment_id }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'reply', 'record' => $record ] )
		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 8])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection