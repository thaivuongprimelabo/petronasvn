@extends('layouts.petronasvn.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data['id'] }}" />
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin đăng ký</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}" placeholder="Tên loại sản phẩm">
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Logo(Tập tin *.jpg, *.jpeg, *.gif, *.png. Tối đa {{ Utils::formatMemory($config['upload_logo_maximum_upload']) }})</label>
                            <div>
                                @php
                                    $logo = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                    if($data !== null) {
                                        $logo = $data->getLogo();
                                    }
                                @endphp
                                <input type="file" class="form-control upload-simple" name="upload_logo" data-preview-control="preview_upload_logo" data-limit-upload="{{ $config['upload_logo_maximum_upload'] }}">
                                <div class="preview_area" style="max-width:200px;position:relative">
                                    <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                                    <img id="preview_upload_logo" src="{{ $logo }}" class="img-thumbnail" style="margin-top:10px; max-width: 200px">
                                    <input type="hidden" class="filename_hidden" name="logo_hidden" value="">
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