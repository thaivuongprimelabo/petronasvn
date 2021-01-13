@extends('layouts.petronasvn.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data" novalidate="novalidate">
				{{ csrf_field() }}
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active" data-tab="tab_form_1"><a href="#tab_form_1" data-toggle="tab" aria-expanded="true"> Thông tin bài viết</a></li>
						<li class="" data-tab="tab_form_2"><a href="#tab_form_2" data-toggle="tab" aria-expanded="false"> SEO</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_form_1">
							<div class="form-group">
								<label>Tựa đề<small> (Tối đã 120 ký tự)</small></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
									<input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}" placeholder="Tựa đề" maxlength="120">
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Hình ảnh <small>{{ trans("auth.text_image_small", ["type" => trans("auth.file_image_type"), "limit_upload" => Utils::formatMemory($config['upload_photo_maximum_upload']), "size" => $config['upload_photo_image_size']]) }}</small></label>
								<div>
									@include("auth.petronasvn.common.single_upload", ["key" => "upload_photo"])
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Mô tả ngắn<small> (Tối đã 300 ký tự)</small></label>
								<div>
									<textarea class="form-control" rows="6" name="description" placeholder="Mô tả ngắn" maxlength="300">{{ $data['description'] }}</textarea>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Nội dung</label>
								<div>
									<textarea name="content" id="content" class="fckeditor" data-height="400" data-editor="full" placeholder="Nội dung">{{ $data['content'] }}</textarea>
								</div>
								<span class="help-block"></span>
							</div>
							<!-- <div class="form-group">
								<label>Nhóm</label>
								<div>
									<select class="form-control" name="post_group_id" id="post_group_id">
										<option value="">--- Không thuộc nhóm nào ---</option>
										<option value="1">Tin khuyến mãi</option>
										<option value="3">Tin tuyển dụng</option>
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
						<div class="tab-pane" id="tab_form_2">
							@include('auth.petronasvn.common.seo')
						</div>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-default" onclick="window.location='http://petronas.local/auth/posts'"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
						<button type="button" id="save" class="btn btn-primary" data-id="" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Lưu"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
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