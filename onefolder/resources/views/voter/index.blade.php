@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	@include('layouts.nav')
    <div class="container-fluid">
        <div class="col-sm-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title">Vote Stats</h4></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped grid-view-tbl">

                            <thead>
                            <tr class="header-row">
                                {!!\Nvd\Crud\Html::sortableTh('id','voter.index','Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('post_id','voter.index','Post Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('vote_up','voter.index','Vote Up')!!}
                                {!!\Nvd\Crud\Html::sortableTh('vote_down','voter.index','Vote Down')!!}
                                {!!\Nvd\Crud\Html::sortableTh('heart','voter.index','Heart')!!}
                                {!!\Nvd\Crud\Html::sortableTh('broken','voter.index','Broken')!!}
                                {!!\Nvd\Crud\Html::sortableTh('user_id','voter.index','User Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('comment_id','voter.index','Comment Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('cat_id','voter.index','Cat Id')!!}
                                {!!\Nvd\Crud\Html::sortableTh('created_at','voter.index','Created At')!!}
                                {!!\Nvd\Crud\Html::sortableTh('updated_at','voter.index','Updated At')!!}
                            </tr>
                            <tr class="search-row">
                                <form class="search-form">
                                    <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                    <td><input type="text" class="form-control" name="post_id" value="{{Request::input("post_id")}}"></td>
                                    <td><input type="text" class="form-control" name="vote_up" value="{{Request::input("vote_up")}}"></td>
                                    <td><input type="text" class="form-control" name="vote_down" value="{{Request::input("vote_down")}}"></td>
                                    <td><input type="text" class="form-control" name="heart" value="{{Request::input("heart")}}"></td>
                                    <td><input type="text" class="form-control" name="broken" value="{{Request::input("broken")}}"></td>
                                    <td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
                                    <td><input type="text" class="form-control" name="comment_id" value="{{Request::input("comment_id")}}"></td>
                                    <td><input type="text" class="form-control" name="cat_id" value="{{Request::input("cat_id")}}"></td>
                                    <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                                    <td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
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
                              data-name="post_id"
                              data-value="{{ $record->post_id }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->post_id }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="text"
                              data-name="vote_up"
                              data-value="{{ $record->vote_up }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->vote_up }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="text"
                              data-name="vote_down"
                              data-value="{{ $record->vote_down }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->vote_down }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="text"
                              data-name="heart"
                              data-value="{{ $record->heart }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->heart }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="text"
                              data-name="broken"
                              data-value="{{ $record->broken }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->broken }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="number"
                              data-name="user_id"
                              data-value="{{ $record->user_id }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->user_id }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="text"
                              data-name="comment_id"
                              data-value="{{ $record->comment_id }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->comment_id }}</span>
                                    </td>
                                    <td>
						<span class="editable"
                              data-type="number"
                              data-name="cat_id"
                              data-value="{{ $record->cat_id }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/voter/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->cat_id }}</span>
                                    </td>
                                    <td>
                                        {{ $record->created_at }}
                                    </td>
                                    <td>
                                        {{ $record->updated_at }}
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
</script>
@endsection