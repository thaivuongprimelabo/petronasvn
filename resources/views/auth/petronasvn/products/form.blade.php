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
						<li class="active" data-tab="tab_form_1"><a href="#tab_form_1" data-toggle="tab" aria-expanded="true"> Thông tin sản phẩm</a></li>
						<!-- <li class="" data-tab="tab_form_2"><a href="#tab_form_2" data-toggle="tab" aria-expanded="true"> Các phụ kiện đi kèm</a></li> -->
						<li class="" data-tab="tab_form_3"><a href="#tab_form_3" data-toggle="tab" aria-expanded="true"> SEO</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_form_1">
							<div class="form-group">
								<label>Tên sản phẩm<small> (Tối đã 120 ký tự)</small></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
									<input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}" placeholder="Tên sản phẩm" maxlength="120">
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Giá bán<small> (Tối đã 100 ký tự)</small></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
									<input type="number" class="form-control textbox_currency" name="price" id="price" value="{{ $data['price'] }}" placeholder="Giá bán" maxlength="100">
								</div>
								<span id="format_currency" class="format_currency"><strong><small>Định dạng tiền tệ: <i></i></small></strong></span><span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Tỷ lệ giảm giá (%)<small> (Tối đã 3 ký tự)</small></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
									<input type="number" class="form-control textbox_discount" name="discount" id="discount" value="{{ isset($data['discount']) ? $data['discount'] : 0 }}" placeholder="Tỷ lệ giảm giá (%)" maxlength="3">
								</div>
								<span id="format_discount" class="format_discount"><strong><small>Giá sau khi giảm: <i></i></small></strong></span><span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Loại sản phẩm</label>
								<div>
									<select class="form-control" name="category_id" id="category_id">
										<option value="">---</option>
										@foreach($root_categories as $id=>$cate_name)
                                        <option value="{{ $id }}" @if($data['category_id'] == $id) selected @endif>{{ $cate_name }}</option>
                                        @endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Nhà cung cấp</label>
								<div>
									<select class="form-control" name="vendor_id" id="vendor_id">
										<option value="">---</option>
										@foreach($vendors as $id=>$vendor_name)
                                        <option value="{{ $id }}" @if($data['vendor_id'] == $id) selected @endif>{{ $vendor_name }}</option>
                                        @endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Hình sản phẩm <small>{{ trans("auth.text_image_small", ["type" => trans("auth.file_image_type"), "limit_upload" => Utils::formatMemory($config['upload_image_maximum_upload']), "size" => "---"]) }}</small></label>
								<div>
									<button type="button" id="upload_button" data-name="upload_image[]" data-preview-control="preview_list" data-limit-upload="{{ $config['upload_image_maximum_upload'] }}" class="btn btn-primary">
									<i class="fa fa-image"></i> Tải hình sản phẩm
									</button>
									<div id="preview_list" class="preview_area">
										<span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                                        @php
                                            $imageProducts = [];
                                            if($data !== null) {
                                                $imageProducts = $data->getImageDetails();
                                            }
                                        @endphp

                                        @if(count($imageProducts))
                                            @foreach($imageProducts as $image)
                                                <div class="img-wrapper" data-filename="{{ $image->id }}" style="display:inline-block; position:relative">
                                                    @if($image->is_main)
                                                        <i class="fa fa-check" aria-hidden="true" style="position:absolute; top:15px; left:15px; font-size:24px; color:#31a231"></i>
                                                    @endif
                                                    <a href="javascript:void(0)" class="remove-img" style="position:absolute; top:15px; right:15px" data-id="{{ $image->id }}"><i class="fa fa-trash" style="font-size:24px;"></i></a>
                                                    <img src="{{ $image->getImageLink() }}" class="img-thumbnail" style="max-width:110px; max-height:150px;margin-top:10px; margin-right:5px">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
									<input type="hidden" id="is_main" name="is_main" value="">
									<input type="hidden" id="file_selected">
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Mô tả<small> (Tối đã 300 ký tự)</small></label>
								<div>
									<textarea name="description" id="description" class="fckeditor" data-height="200" data-editor="small" placeholder="Mô tả">{{ $data['description'] }}</textarea>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label>Thông tin chi tiết</label>
								<div>
									<textarea name="summary" id="summary" class="fckeditor" data-height="400" data-editor="full" placeholder="Thông tin chi tiết">{{ $data['summary'] }}</textarea>
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
										&nbsp;&nbsp;&nbsp;Đang hoạt động
									</label>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
                                        @if(!isset($data['avail_flg']) || (isset($data['avail_flg']) && $data['avail_flg'] == ProductStatus::AVAILABLE))
                                        <input type="checkbox" checked="checked" name="avail_flg" value="1" />
                                        @else
                                        <input type="checkbox" name="avail_flg" value="1" />
                                        @endif
										&nbsp;&nbsp;&nbsp;Còn hàng
									</label>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
                                        @if(!isset($data['is_new']) || (isset($data['is_new']) && $data['is_new'] == Status::IS_NEW))
                                        <input type="checkbox" checked="checked" name="is_new" value="1" />
                                        @else
                                        <input type="checkbox" name="is_new" value="1" />
                                        @endif
										&nbsp;&nbsp;&nbsp;Sản phẩm mới
									</label>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
                                        @if(!isset($data['is_popular']) || (isset($data['is_popular']) && $data['is_popular'] == Status::IS_POPULAR))
                                        <input type="checkbox" checked="checked" name="is_popular" value="1" />
                                        @else
                                        <input type="checkbox" name="is_popular" value="1" />
                                        @endif
										&nbsp;&nbsp;&nbsp;Sản phẩm được quan tâm
									</label>
								</div>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
                                        @if(!isset($data['is_best_selling']) || (isset($data['is_best_selling']) && $data['is_best_selling'] == Status::IS_BEST_SELLING))
                                        <input type="checkbox" checked="checked" name="is_best_selling" value="1" />
                                        @else
                                        <input type="checkbox" name="is_best_selling" value="1" />
                                        @endif
										&nbsp;&nbsp;&nbsp;Sản phẩm bán chạy
									</label>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<!-- <div class="tab-pane " id="tab_form_2">
							<div class="btn-group mb-1">
								<button id="add_new_service" type="button" class="btn btn-sm btn-success" title="Add new services"><i class="fa fa-plus"></i> Đăng ký thông tin</button>
							</div>
							<div id="services" class="form-group">
							</div>
						</div> -->
						<div class="tab-pane " id="tab_form_3">
							@include('auth.petronasvn.common.seo')
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