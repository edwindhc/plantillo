@extends('vendor.crud.single-page-templates.common.app')

@section('content')
    @include('layouts.nav')
	<div class="container-fluid">
		<div class="col-sm-3">@include('layouts.sidebar')</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="panel-title">Category</h4></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        @include('category.create')
                        <table class="table table-striped grid-view-tbl">
                            <thead>
                            <tr class="header-row">
                                {!!\Nvd\Crud\Html::sortableTh('id','category.index','Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('name','category.index','Name')!!}
                                {!!\Nvd\Crud\Html::sortableTh('description','category.index','Description')!!}
                                {!!\Nvd\Crud\Html::sortableTh('created_at','category.index','Created At')!!}
                                {!!\Nvd\Crud\Html::sortableTh('updated_at','category.index','Updated At')!!}
                                <th></th>
                            </tr>
                            <tr class="search-row">
                                <form class="search-form">
                                    <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                    <td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
                                    <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
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
                              data-name="name"
                              data-value="{{ $record->name }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/category/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->name }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="description"
                              data-value="{{ $record->description }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/category/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->description }}</span>
                                    </td>
                                    <td>
                                        {{ $record->created_at }}
                                    </td>
                                    <td>
                                        {{ $record->updated_at }}
                                    </td>
                                    <td class="actions-cell">
                                        <form class="form-inline" action="/category/{{$record->id}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button style="outline: none;background: transparent;border: none;"
                                                    onclick="return confirm('Are You Sure?')"
                                                    type="submit" class="fa fa-trash text-danger"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 6])
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
</script>
@endsection