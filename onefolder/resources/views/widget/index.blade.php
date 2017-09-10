@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	@include('layouts.nav')
	<div class="container-fluid">
		<div class="col-sm-3">@include('layouts.sidebar')</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="panel-title">Widgets</h4></div>
				<div class="panel-body">
					<div class="table-responsive">
						@include('widget.create')
						<table class="table table-striped grid-view-tbl">

							<thead>
							<tr class="header-row">
								{!!\Nvd\Crud\Html::sortableTh('id','widget.index','Id')!!}
								{!!\Nvd\Crud\Html::sortableTh('title','widget.index','Title')!!}
								{!!\Nvd\Crud\Html::sortableTh('content','widget.index','Content')!!}
								{!!\Nvd\Crud\Html::sortableTh('position','widget.index','Position')!!}
								{!!\Nvd\Crud\Html::sortableTh('page','widget.index','Page')!!}
								{!!\Nvd\Crud\Html::sortableTh('location','widget.index','Location')!!}
								{!!\Nvd\Crud\Html::sortableTh('status','widget.index','Status')!!}
								{!!\Nvd\Crud\Html::sortableTh('created_at','widget.index','Created At')!!}
								{!!\Nvd\Crud\Html::sortableTh('updated_at','widget.index','Updated At')!!}
								<th></th>
							</tr>
							<tr class="search-row">
								<form class="search-form">
									<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
									<td><input type="text" class="form-control" name="title" value="{{Request::input("title")}}"></td>
									<td><input type="text" class="form-control" name="content" value="{{Request::input("content")}}"></td>
									<td><input type="text" class="form-control" name="position" value="{{Request::input("position")}}"></td>
									<td><input type="text" class="form-control" name="page" value="{{Request::input("page")}}"></td>
									<td><input type="text" class="form-control" name="location" value="{{Request::input("location")}}"></td>
									<td><input type="text" class="form-control" name="status" value="{{Request::input("status")}}"></td>
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
							  data-name="title"
							  data-value="{{ $record->title }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->title }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="textarea"
							  data-name="content"
							  data-value="{{ $record->content }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->content }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="number"
							  data-name="position"
							  data-value="{{ $record->position }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->position }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="page"
							  data-value="{{ $record->page }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->page }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="location"
							  data-value="{{ $record->location }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->location }}</span>
									</td>
									<td>
						<span class="editable"
							  data-type="text"
							  data-name="status"
							  data-value="{{ $record->status }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/widget/{{ $record->{$record->getKeyName()} }}"
						>{{ $record->status }}</span>
									</td>
									<td>
										{{ $record->created_at }}
									</td>
									<td>
										{{ $record->updated_at }}
									</td>
									@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'widget', 'record' => $record ] )
								</tr>
							@empty
								@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 10])
							@endforelse
							</tbody>

						</table>
						@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )
					</div>
				</div>
			</div>
            <div class="panel panel-info">
                <div class="panel-heading">Position-Page-Location FAQ</div>
                <div class="panel-body">
                    <div class="panel-group" id="accordionFaq" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnet" aria-expanded="true" aria-controls="collapseOnet">Location</a>
                                </h4>
                            </div>
                            <div id="collapseOnet" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    There are 2 Location value "<b>1</b>" & "<b>2</b>" - Each represents "top" and "bottom" of the content.
                                    <br><br>
                                    For an instances, if you want to add any HTML content or any content to top of any page, you will need to provide <b>location</b> value as <b>1</b> and if you want to add any content at footer of page, you will need to provide <b>location</b> value as <b>2</b>.
                                    <br>
                                    <b class="text-danger">Note:</b> <b>1</b> & <b>2</b> does not apply for post page, as post page has 6 position to add widget.
                                    Below are position value for post page :-
                                    <ol>
                                        <li> - Full width top of page</li>
                                        <li> - Top of Content div (where main content is displayed excluding sidebar)</li>
                                        <li> - Full width bottom of page</li>
                                        <li> - Top of Sidebar div.</li>
                                        <li> - Below Sharing sidebar div and above related post.</li>
                                        <li> - Bottom of Sidebar post.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Page
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Currently, Script provides 4 location to inject your widget :-
                                    <ol>
                                        <li>Home page - Top and Footer - Page with Value 1</li>
                                        <li>Category Page -  Top and Footer - Page with Value 2</li>
                                        <li>Post page 6 location - Page with Value 3</li>
                                        <li>Upload Page - Top and Footer - Page with Value 4</li>
                                    </ol>
                                    <br>
                                    a). That means, if you need to add any content on top of home page. You will provide :- Value <b>1</b> to <b>Page</b> input field, and provide <b>1</b> as location.
                                    <br>
                                    b). If you need to add any content on sidebar bottom of post page, you will need to provide :- Value <b>6</b> to Location, and <b>Page</b> value as  <b>3</b>.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Position
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    If in case you want to add 2 element at same location same page. You can provide position value on which to appear top or first. For an example :-
                                    <br>
                                    If you want to provide 3 content to top of home page, than you can set position as 1,2,3 on the basis of content you want to show.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection