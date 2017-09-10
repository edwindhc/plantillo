@extends('vendor.crud.single-page-templates.common.app')

@section('content')
    @include('layouts.nav')
    <div class="col-sm-3">
        @include('layouts.sidebar')
    </div>
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Settings</h4></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped grid-view-tbl">
                        <tbody>
                        @forelse ( $records as $record )
                            <tr>
                                <td>Title</td>
                                <td>
						<span class="editable"
                              data-type="text"
                              data-name="title"
                              data-value="{{ $record->title }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->title }}</span>
                                </td>
                                </tr>
                            <tr>
                                <td>Name</td>
                                <td>
						<span class="editable"
                              data-type="text"
                              data-name="name"
                              data-value="{{ $record->name }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
						<span class="editable"
                              data-type="text"
                              data-name="description"
                              data-value="{{ $record->description }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->description }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Header</td>
                                <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="header"
                              data-value="{{ $record->header }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->header }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Footer</td>
                                <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="footer"
                              data-value="{{ $record->footer }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->footer }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Under Maintenance</td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="is_maintenance"
                              data-value="{{ $record->is_maintenance }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->is_maintenance }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Maintenance Message</td>
                                <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="maintenance"
                              data-value="{{ $record->maintenance }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->maintenance }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Disable Form Registration</td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="disable_form_registration"
                              data-value="{{ $record->disable_form_registration }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->disable_form_registration }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Default Themes</td>
                                <td>
						<span class="themeSelect"
                              data-type="select"
                              data-name="themes"
                              data-value="{{ $record->themes }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->themes }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Allow user to use their own theme preference ?</td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="user_theme"
                              data-value="{{ $record->user_theme }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->user_theme }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Allow HTML editor for User <br><small>Don't worry, we have covered the security part of it. :)</small></td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="wysiwyg_user"
                              data-value="{{ $record->wysiwyg_user }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->wysiwyg_user }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Allow HTML Editor for Admin</td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="wysiwyg_admin"
                              data-value="{{ $record->wysiwyg_admin }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->wysiwyg_admin }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Allow HTML content or user. <small>You may prefer to disable html editor but still allow html tags, than go for this. <b>Note:</b> if you have disable HTML content and enabled HTML Editor, HTML content will be converted to normal text string.</small></td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="allow_html"
                              data-value="{{ $record->allow_html }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->allow_html }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Allow HTML content for admin</td>
                                <td>
						<span class="selectable"
                              data-type="select"
                              data-name="allow_html_admin"
                              data-value="{{ $record->allow_html_admin }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->allow_html_admin }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Comment Type</td>
                                <td>
						<span class="commentable"
                              data-type="select"
                              data-name="comments"
                              data-value="{{ $record->comments }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->comments }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Provide Disqus Comment Universal code.</td>
                                <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="disqus_code"
                              data-value="{{ $record->disqus_code }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->disqus_code }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Provide Facebook Comment Plugin code.</td>
                                <td>
						<span class="editable"
                              data-type="textarea"
                              data-name="fb_embed"
                              data-value="{{ $record->fb_embed }}"
                              data-pk="{{ $record->{$record->getKeyName()} }}"
                              data-url="/setting/{{ $record->{$record->getKeyName()} }}"
                        >{{ $record->fb_embed }}</span>
                                </td>
                            </tr>
                        @empty
                            If you are reading this - that probably means, you are in deep shit. Add settings manually or contact the seller.
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
	jQuery(".editable").editable({ajaxOptions:{method:'PUT'}});
    jQuery(".selectable").editable({
        ajaxOptions:{method:'PUT'},
        validate: function(value) {
            if(jQuery.trim(value) == '') return 'This field is required';
        },
        source : [ {value : 1 , text : "Yes" },{value : 2 , text : "No" } ]
    });
    jQuery(".commentable").editable({
        ajaxOptions:{method:'PUT'},
        validate: function(value) {
            if(jQuery.trim(value) == '') return 'This field is required';
        },
        source : [ {value : 1 , text : "In-built Comment System" },{value : 2 , text : "Facebook Comment Plugin" },{value : 3 , text : "Disqus Comment Plugin" } ]
    });
    jQuery(".themeSelect").editable({
        ajaxOptions:{method:'PUT'},
        validate: function(value) {
            if(jQuery.trim(value) == '') return 'This field is required';
        },
        source : [ {value : 1 , text : "White Gray" },{value : 2 , text : "White Sky" },{value : 3 , text : "Black &amp; White" },{value : 4 , text : "Default" },{value : 5 , text : "Blue Black" },{value : 6 , text : "Blue White" },{value : 7 , text : "News Shine" },{value : 8 , text : "White 3D" },{value : 9 , text : "Material White" },{value : 10 , text : "Old School" },{value : 11 , text : "Green Yard" },{value : 12 , text : "Simple Red" },{value : 13 , text : "Carbon Grump" },{value : 14 , text : "Applepie" },{value : 15 , text : "Blue Hill" },{value : 16 , text : "Ubuntu" },{value : 17 , text : "Light Black" } ]
    });
</script>
@endsection