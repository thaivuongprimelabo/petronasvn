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
						<h3 class="box-title">Thông tin cập nhật</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Tên tài khoản</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}" placeholder="Tên tài khoản">
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label>Ảnh đại diện <small>{{ trans("auth.text_image_small", ["type" => trans("auth.file_image_type"), "limit_upload" => Utils::formatMemory($config['upload_avatar_maximum_upload']), "size" => $config['upload_avatar_image_size']]) }}</small></label>
							<div>
                                @php
                                    $avatar = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                    if($data !== null) {
                                        $avatar = $data->avatar;
                                    }
                                @endphp
								<input type="file" class="form-control upload-simple" name="upload_avatar" data-preview-control="preview_upload_avatar" data-limit-upload="{{ $config['upload_avatar_maximum_upload'] }}">
								<div class="preview_area" style="width:80px;position:relative">
									<span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
									<img id="preview_upload_avatar" src="{{ $avatar }}" class="img-thumbnail" style="margin-top:10px;min-width: 120px; ">
								</div>
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label>E-mail<small> (Tối đã 150 ký tự)</small></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<input type="email" class="form-control" name="email" id="email" value="{{ $data['email'] }}" placeholder="E-mail" maxlength="150">
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label>Mật khẩu<small> (Tối đã 40 ký tự)</small></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<input type="password" class="form-control" name="password" id="password" value="" placeholder="Mật khẩu" maxlength="40">
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label>Xác nhận mật khẩu</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<input type="password" class="form-control" name="conf_password" id="conf_password" value="" placeholder="Xác nhận mật khẩu">
							</div>
							<span class="help-block"></span>
						</div>
						<!-- <div class="form-group">
							<label>Quyền hạn</label>
							<div>
								<select class="form-control" name="role_id" id="role_id">
									<option value="">--- Chọn quyền hạn ---</option>
									<option value="1" selected="">Quản trị hệ thống</option>
									<option value="2">Quản trị viên</option>
									<option value="3">Thành viên</option>
								</select>
							</div>
							<span class="help-block"></span>
						</div> -->
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