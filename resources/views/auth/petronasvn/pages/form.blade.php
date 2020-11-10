@extends('layouts.petronasvn.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data" novalidate="novalidate">
				<input type="hidden" name="_token" value="bOWrKQlSchMhjx11u9qFm1oa4ptA7n7sjGKvKSXI">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Thông tin cập nhật</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Tên trang</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}" placeholder="Tên trang" disabled="true">
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