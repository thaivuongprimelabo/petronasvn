@extends('layouts.petronasvn.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Đăng ký banner</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Banner (Tập tin *.jpg, *.jpeg, *.gif, *.png. Tối đa {{ Utils::formatMemory($config['upload_banner_maximum_upload']) }})</label>
                            <div>
                                @php
                                    $banner = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                    if($data !== null) {
                                        $banner = $data->banner;
                                    }
                                @endphp
                                <input type="file" class="form-control upload-simple" name="upload_banner" data-preview-control="preview_upload_banner" data-limit-upload="{{ $config['upload_banner_maximum_upload'] }}">
                                <div class="preview_area" style="width:450px;position:relative">
                                    <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                                    <img id="preview_upload_banner" src="{{ $banner }}" class="img-thumbnail" style="margin-top:10px;max-width:450px;">
                                    <input type="hidden" class="filename_hidden" name="banner_hidden" value="">
                                </div>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" class="form-control" name="link" id="link" value="{{ $data['link'] }}" placeholder="Đường dẫn">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#selectPostModal"><i class="fa fa-link fa-fw"></i> URL bài viết</button>
                                </div>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    @if(!isset($data['status']) || (isset($data['status']) && $data['status'] == Status::ACTIVE))
                                    <input type="checkbox" checked="checked" name="status" value="1" />
                                    @else
                                    <input type="checkbox" name="status" value="1" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;{{ trans('auth.status.active') }}
                                </label>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group"><label></label><input type="hidden" id="select_type" name="select_type" value="use_image"><span class="help-block"></span></div>
                    </div>
                    <div class="box-footer">
                        @include('auth.petronasvn.common.group_button')
                    </div>
                </div>
			</form>
		</div>
	</div>
</section>
@endsection
@section('script')
<script type="text/javascript">
	var validateObject = JSON.parse('{!! FormGenerate::makeValidation($name, $rules, $data) !!}');
    var validatorEventSetting = $("#submit_form").validate({
        ignore: '',
    	onfocusout: false,
    	success: function(label, element) {
        	var jelm = $(element);
        	var parent = jelm.parent().parent();
        	parent.removeClass('has-error');
        	parent.find('.help-block').empty();
    	},
    	rules: validateObject.rules,
    	messages: validateObject.messages,
    	errorPlacement: function(error, element) {
    		customErrorValidate(error, element);
	  	},
    	submitHanlder: function(form) {
    	    form.submit();
    	}
    });
</script>
@endsection