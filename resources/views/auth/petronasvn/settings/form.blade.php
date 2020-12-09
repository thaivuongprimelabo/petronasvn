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
                  <li class="active" data-tab="web_info"><a href="#web_info" data-toggle="tab" aria-expanded="true"> Thông tin cơ bản</a></li>
                  <li class="" data-tab="social"><a href="#social" data-toggle="tab" aria-expanded="true"> Các mạng xã hội</a></li>
                  @if(Auth::user()->role_id == Common::SUPER_ADMIN)
                  <li class="" data-tab="upload_setting"><a href="#upload_setting" data-toggle="tab" aria-expanded="true"> Upload Settings</a></li>
                  @endif
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="web_info">
                     <div class="form-group">
                        <label>Web name<small> (Tối đã 200 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_title" id="web_title" value="{{ $data['web_title'] }}" placeholder="Web name" maxlength="200">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web Description</label>
                        <div>
                           <textarea class="form-control" rows="6" name="web_description" placeholder="Web Description">{{ $data['web_description'] }}</textarea>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web Keywords</label>
                        <div>
                           <textarea class="form-control" rows="6" name="web_keywords" placeholder="Web Keywords">{{ $data['web_keywords'] }}</textarea>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web logo (Tập tin *.jpg, *.jpeg, *.gif, *.png.Tối đa {{ Utils::formatMemory($data['upload_web_logo_maximum_upload']) }})</label>
                        <div>
                           @php
                              $web_logo = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                 if($data !== null) {
                                    $web_logo = Utils::getImageLink($data['web_logo']);
                                 }
                           @endphp
                           <input type="file" class="form-control upload-simple" name="upload_web_logo" data-preview-control="preview_upload_web_logo" data-limit-upload="{{ $data['upload_web_logo_maximum_upload'] }}">
                           <div class="preview_area">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <img id="preview_upload_web_logo" src="{{ $web_logo }}" class="img-thumbnail" style="margin-top:10px;max-width:272px;">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web ico (Tập tin *.jpg, *.jpeg, *.gif, *.png. Tối đa {{ Utils::formatMemory($data['upload_web_ico_maximum_upload']) }})</label>
                        <div>
                           @php
                              $web_ico = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                 if($data !== null) {
                                       $web_ico = Utils::getImageLink($data['web_ico']);
                                 }
                           @endphp
                           <input type="file" class="form-control upload-simple" name="upload_web_ico" data-preview-control="preview_upload_web_ico" data-limit-upload="{{ $data['upload_web_ico_maximum_upload'] }}">
                           <div class="preview_area">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <img id="preview_upload_web_ico" src="{{ $web_ico }}" class="img-thumbnail" style="margin-top:10px;max-width:80px;">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web banner (Tập tin *.jpg, *.jpeg, *.gif, *.png. Tối đa {{ Utils::formatMemory($data['upload_web_banner_maximum_upload']) }})</label>
                        <div>
                           @php
                              $web_banner = Utils::getImageLink(Common::NO_IMAGE_FOUND);
                                 if($data !== null) {
                                    $web_banner = Utils::getImageLink($data['web_banner']);
                                 }
                           @endphp
                           <input type="file" class="form-control upload-simple" name="upload_web_banner" data-preview-control="preview_upload_web_banner" data-limit-upload="{{ $data['upload_web_banner_maximum_upload'] }}">
                           <div class="preview_area">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <img id="preview_upload_web_banner" src="{{ $web_banner }}" class="img-thumbnail" style="margin-top:10px;max-width:526px;">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>

                     <div class="form-group">
                        <label>Liên hệ</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              <input type="text" class="form-control" name="web_address" value="{{ $data['web_address'] }}" placeholder="Địa chỉ"  />
                              <input type="text" class="form-control" name="web_hotline" value="{{ $data['web_hotline'] }}" placeholder="Số điện thoại" />
                              <input type="text" class="form-control" name="web_email" value="{{ $data['web_email'] }}" placeholder="E-mail"  />
                              <input type="text" class="form-control" name="web_working_time" value="{{ $data['web_working_time'] }}" placeholder="Giờ làm việc" />
                        </div>
                        <span class="help-block"></span>
                     </div>

                     <div class="form-group">
                        <label>Thông tin tài khoản ngân hàng</label>
                        <div>
                           <textarea name="bank_info" id="description" class="fckeditor" data-height="200" data-editor="small" placeholder="Mô tả">{{ $data['bank_info'] }}</textarea>
                        </div>
                        <span class="help-block"></span>
                     </div>

                     <div class="form-group">
                        <div class="checkbox">
                           <label>
                              <input type="checkbox" name="system_off" value="1" />
                              &nbsp;&nbsp;&nbsp;Tắt hệ thống
                           </label>
                        </div>
                        <span class="help-block"></span>
                     </div>
                  </div>
                  <div class="tab-pane " id="social">
                     <div class="form-group">
                        <label>Facebook page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="facebook_fanpage" id="facebook_fanpage" value="{{ $data['facebook_fanpage'] }}" placeholder="Facebook page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Youtube channel<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="youtube_channel" id="youtube_channel" value="{{ $data['youtube_channel'] }}" placeholder="Youtube channel" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Zalo page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="zalo_page" id="zalo_page" value="{{ $data['zalo_page'] }}" placeholder="Zalo page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Shopee page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="shopee_page" id="shopee_page" value="{{ $data['shopee_page'] }} placeholder="Shopee page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                  </div>
                  <div class="tab-pane" id="upload_setting">
                     @php
                        $list = [];
                        $uploadLimits = Common::UPLOAD_SIZE_LIMIT;
                        foreach($uploadLimits as $limit) {
                           $list[$limit] = Utils::formatMemory($limit);
                        }
                     @endphp
                     <div class="form-group">
                        <label>Web logo</label>
                        <div>
                           <select class="form-control" name="upload_web_logo_maximum_upload" id="upload_web_logo_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_web_logo_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web ico</label>
                        <div>
                           <select class="form-control" name="upload_web_ico_maximum_upload" id="upload_web_ico_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_web_ico_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web banner</label>
                        <div>
                           <select class="form-control" name="upload_web_banner_maximum_upload" id="upload_web_banner_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_web_banner_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Hình banner</label>
                        <div>
                           <select class="form-control" name="upload_banner_maximum_upload" id="upload_banner_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_banner_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Logo nhà cung cấp</label>
                        <div>
                           <select class="form-control" name="upload_logo_maximum_upload" id="upload_logo_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_logo_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Hình ảnh sản phẩm</label>
                        <div>
                           <select class="form-control" name="upload_image_maximum_upload" id="upload_image_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_image_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Hình bài viết</label>
                        <div>
                           <select class="form-control" name="upload_photo_maximum_upload" id="upload_photo_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_photo_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div>
                           <select class="form-control" name="upload_avatar_maximum_upload" id="upload_avatar_maximum_upload">
                              @foreach($list as $value=>$option)
                              <option value="{{ $value }}" @if($data['upload_avatar_maximum_upload'] == $value) selected @endif>{{ $option }}</option>
                              @endforeach
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <!-- <div class="form-group">
                        <label>Kích thước banner (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_banner_image_size" id="upload_banner_image_size" value="847x292" placeholder="Kích thước banner (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước logo nhà cung cấp (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_logo_image_size" id="upload_logo_image_size" value="165x80" placeholder="Kích thước logo nhà cung cấp (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước hình sản phẩm (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_image_image_size" id="upload_image_image_size" value="220x180,55x55" placeholder="Kích thước hình sản phẩm (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước hình bài viết (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_photo_image_size" id="upload_photo_image_size" value="358x201" placeholder="Kích thước hình bài viết (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước web logo (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_web_logo_image_size" id="upload_web_logo_image_size" value="150x150" placeholder="Kích thước web logo (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước web icon (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_web_ico_image_size" id="upload_web_ico_image_size" value="16x16" placeholder="Kích thước web icon (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước ảnh đại diện (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_avatar_image_size" id="upload_avatar_image_size" value="80x80" placeholder="Kích thước ảnh đại diện (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước web banner (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_web_banner_image_size" id="upload_web_banner_image_size" value="526x232" placeholder="Kích thước web banner (dài x rộng)">
                        </div>
                        <span class="help-block"></span>
                     </div> -->
                  </div>
               </div>
               <div class="box-footer">
                  <button type="button" id="save" class="btn btn-primary" data-id="1" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Lưu"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
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