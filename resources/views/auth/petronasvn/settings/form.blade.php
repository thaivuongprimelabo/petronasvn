@extends('layouts.petronasvn.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data" novalidate="novalidate">
            <input type="hidden" name="_token" value="bOWrKQlSchMhjx11u9qFm1oa4ptA7n7sjGKvKSXI">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active" data-tab="web_info"><a href="#web_info" data-toggle="tab" aria-expanded="true"> Thông tin cơ bản</a></li>
                  <li class="" data-tab="upload_setting"><a href="#upload_setting" data-toggle="tab" aria-expanded="false"> Kích thước / dung lượng tập tin</a></li>
                  <li class="" data-tab="payment_method"><a href="#payment_method" data-toggle="tab" aria-expanded="true"> Phương thức thanh toán</a></li>
                  <li class="" data-tab="social"><a href="#social" data-toggle="tab" aria-expanded="true"> Các mạng xã hội</a></li>
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
                        <label>Web logo (Tập tin *.jpg, *.jpeg, *.gif, *.png.Tối đa 500 KB. Kích thước :size)</label>
                        <div>
                           <input type="file" class="form-control upload-simple" name="upload_web_logo" data-preview-control="preview_upload_web_logo" data-limit-upload="512000">
                           <div class="preview_area" style="width:320px;position:relative">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <a href="javascript:void(0)" class="remove-img-simple" style="position:absolute; top:20px; right:10px"><i class="fa fa-trash" style="font-size:18px;"></i></a>
                              <img id="preview_upload_web_logo" src="http://petronas.local/upload/web_logo/320x80/1604908269_wA6J9DKhqc.jpg" class="img-thumbnail" style="margin-top:10px;width:320px;height:80px">
                              <input type="hidden" class="filename_hidden" name="web_logo_hidden" value="web_logo/320x80/1604908269_wA6J9DKhqc.jpg">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web ico (Tập tin *.jpg, *.jpeg, *.gif, *.png.Tối đa 300 KB. Kích thước :size)</label>
                        <div>
                           <input type="file" class="form-control upload-simple" name="upload_web_ico" data-preview-control="preview_upload_web_ico" data-limit-upload="307200">
                           <div class="preview_area" style="width:40px;position:relative">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <a href="javascript:void(0)" class="remove-img-simple" style="position:absolute; top:20px; right:10px"><i class="fa fa-trash" style="font-size:18px;"></i></a>
                              <img id="preview_upload_web_ico" src="http://petronas.local/upload/web_ico/16x16/1555996705_37284682_220805122090027_1971890846475223040_n.png" class="img-thumbnail" style="margin-top:10px;width:40px;height:40px">
                              <input type="hidden" class="filename_hidden" name="web_ico_hidden" value="web_ico/16x16/1555996705_37284682_220805122090027_1971890846475223040_n.png">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web banner (Tập tin *.jpg, *.jpeg, *.gif, *.png.Tối đa 500 KB. Kích thước :size)</label>
                        <div>
                           <input type="file" class="form-control upload-simple" name="upload_web_banner" data-preview-control="preview_upload_web_banner" data-limit-upload="512000">
                           <div class="preview_area" style="width:526px;position:relative">
                              <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
                              <a href="javascript:void(0)" class="remove-img-simple" style="position:absolute; top:20px; right:10px"><i class="fa fa-trash" style="font-size:18px;"></i></a>
                              <img id="preview_upload_web_banner" src="http://petronas.local/upload/web_banner/1604906692_rvMKnItK7F.jpg" class="img-thumbnail" style="margin-top:10px;width:526px;height:232px">
                              <input type="hidden" class="filename_hidden" name="web_banner_hidden" value="web_banner/1604906692_rvMKnItK7F.jpg">
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Web mail<small> (Tối đã 200 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_email" id="web_email" value="{{ $data['web_email'] }}" placeholder="Web mail" maxlength="200">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Địa chỉ</label>
                        <div class="input-group">
                            @php
                                $web_address = $data['web_address'];
                            @endphp
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_address[]" value="26/9 Xóm Đất, phường 8, quận 11, TP.HCM" placeholder="Địa chỉ">
                           <input type="text" class="form-control" name="web_address[]" value="108/4 Võ Duy Ninh, phường 22, quận Bình Thạnh" placeholder="Địa chỉ">
                        </div>
                        <button type="button" class="btn btn-danger add-info mt-1"><i class="fa fa-plus"></i> Thêm</button><span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Giờ làm việc</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_working_time" id="web_working_time" value="{{ $data['web_working_time'] }}" placeholder="Giờ làm việc">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Hotline mua hàng và tư vấn kĩ thuật:<small> (Tối đã 40 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_hotline[]" value="03979.269.78" placeholder="Hotline mua hàng và tư vấn kĩ thuật:" maxlength="40">
                        </div>
                        <button type="button" class="btn btn-danger add-info mt-1"><i class="fa fa-plus"></i> Thêm</button><span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Hotline CSKH:<small> (Tối đã 40 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="web_hotline_cskh[]" value="093.993.1110 (Mr. Nhật)" placeholder="Hotline CSKH:" maxlength="40">
                        </div>
                        <button type="button" class="btn btn-danger add-info mt-1"><i class="fa fa-plus"></i> Thêm</button><span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Miễn phí vận chuyển</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="freeship" id="freeship" value="Miễn phí vận chuyển đối với hóa đơn trên 2 triệu" placeholder="Miễn phí vận chuyển">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Nhập số tiền (miễn phí vận chuyển)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="number" class="form-control textbox_currency" name="freeship_money" id="freeship_money" value="2000000" placeholder="Nhập số tiền (miễn phí vận chuyển)">
                        </div>
                        <span id="format_currency" class="format_currency"><strong><small>Định dạng tiền tệ: <i>2.000.000₫</i></small></strong></span><span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Footer text</label>
                        <div>
                           <textarea name="footer_text" id="footer_text" class="fckeditor" data-height="200" data-editor="small" placeholder="Footer text" style="visibility: hidden; display: none;">&lt;p&gt;© Copyright 2019&lt;/p&gt;</textarea>
                           <div id="cke_footer_text" class="cke_1 cke cke_reset cke_chrome cke_editor_footer_text cke_ltr cke_browser_webkit" dir="ltr" lang="vi" role="application" aria-labelledby="cke_footer_text_arialbl">
                              <span id="cke_footer_text_arialbl" class="cke_voice_label">Bộ soạn thảo văn bản có định dạng, footer_text</span>
                              <div class="cke_inner cke_reset" role="presentation">
                                 <span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_16" class="cke_voice_label">Thanh công cụ</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_16" onmousedown="return false;"><span id="cke_17" class="cke_toolbar cke_toolbar_last" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_18" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Đậm')" title="Đậm (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-describedby="cke_18_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onclick="CKEDITOR.tools.callFunction(4,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_18_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Đậm</span><span id="cke_18_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_19" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Nghiêng')" title="Nghiêng (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-describedby="cke_19_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(5,event);" onfocus="return CKEDITOR.tools.callFunction(6,event);" onclick="CKEDITOR.tools.callFunction(7,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_19_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Nghiêng</span><span id="cke_19_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_20" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách có thứ tự')" title="Chèn/Xoá Danh sách có thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-describedby="cke_20_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1440px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Chèn/Xoá Danh sách có thứ tự</span><span id="cke_20_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_21" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách không thứ tự')" title="Chèn/Xoá Danh sách không thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_21_label" aria-describedby="cke_21_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1392px;background-size:auto;">&nbsp;</span><span id="cke_21_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Chèn/Xoá Danh sách không thứ tự</span><span id="cke_21_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_22" class="cke_button cke_button__link cke_button_off" href="javascript:void('Chèn/Sửa liên kết')" title="Chèn/Sửa liên kết (Ctrl+L)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-describedby="cke_22_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Chèn/Sửa liên kết</span><span id="cke_22_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+L</span></a><a id="cke_23" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Xoá liên kết')" title="Xoá liên kết" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-describedby="cke_23_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Xoá liên kết</span><span id="cke_23_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_24" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Canh trái')" title="Canh trái" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-describedby="cke_24_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Canh trái</span><span id="cke_24_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_25" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Canh giữa')" title="Canh giữa" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-describedby="cke_25_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_25_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Canh giữa</span><span id="cke_25_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_26" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Canh phải')" title="Canh phải" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-describedby="cke_26_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Canh phải</span><span id="cke_26_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_27" class="cke_button cke_button__smiley cke_button_off" href="javascript:void('Hình biểu lộ cảm xúc (mặt cười)')" title="Hình biểu lộ cảm xúc (mặt cười)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" aria-describedby="cke_27_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(29,event);" onfocus="return CKEDITOR.tools.callFunction(30,event);" onclick="CKEDITOR.tools.callFunction(31,this);return false;"><span class="cke_button_icon cke_button__smiley_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1944px;background-size:auto;">&nbsp;</span><span id="cke_27_label" class="cke_button_label cke_button__smiley_label" aria-hidden="false">Hình biểu lộ cảm xúc (mặt cười)</span><span id="cke_27_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_28" class="cke_button cke_button__specialchar cke_button_off" href="javascript:void('Chèn ký tự đặc biệt')" title="Chèn ký tự đặc biệt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-describedby="cke_28_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(32,event);" onfocus="return CKEDITOR.tools.callFunction(33,event);" onclick="CKEDITOR.tools.callFunction(34,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -2064px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Chèn ký tự đặc biệt</span><span id="cke_28_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span>
                                 <div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_33" class="cke_voice_label">Nhấn ALT + 0 để được giúp đỡ</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 100%; height: 100%;" title="Bộ soạn thảo văn bản có định dạng, footer_text" aria-describedby="cke_33" tabindex="0" allowtransparency="true"></iframe></div>
                                 <span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Kéo rê để thay đổi kích cỡ" onmousedown="CKEDITOR.tools.callFunction(1, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Nhãn thành phần</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><span class="cke_path_empty">&nbsp;</span></span></span>
                              </div>
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>URL Extension<small> (Tối đã 15 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="url_ext" id="url_ext" value=".html" placeholder="URL Extension" maxlength="15">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>From email<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="mail_from" id="mail_from" value="thaivuong1503@gmail.com" placeholder="From email" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>From name<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="mail_name" id="mail_name" value="Xe Ôm Shop" placeholder="From name" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <div class="checkbox">
                           <label>
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" name="off" value="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                              &nbsp;&nbsp;&nbsp;Tắt hệ thống
                           </label>
                        </div>
                        <span class="help-block"></span>
                     </div>
                  </div>
                  <div class="tab-pane" id="upload_setting">
                     <div class="form-group">
                        <label>Maximum upload file (Banner) KB</label>
                        <div>
                           <select class="form-control" name="upload_banner_maximum_upload" id="upload_banner_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576" selected="">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Nhà cung cấp) KB</label>
                        <div>
                           <select class="form-control" name="upload_logo_maximum_upload" id="upload_logo_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400" selected="">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Sản phẩm) KB</label>
                        <div>
                           <select class="form-control" name="upload_image_maximum_upload" id="upload_image_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576" selected="">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Bài viết) KB</label>
                        <div>
                           <select class="form-control" name="upload_photo_maximum_upload" id="upload_photo_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200" selected="">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Web logo) KB</label>
                        <div>
                           <select class="form-control" name="upload_web_logo_maximum_upload" id="upload_web_logo_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000" selected="">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Web ico) KB</label>
                        <div>
                           <select class="form-control" name="upload_web_ico_maximum_upload" id="upload_web_ico_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200" selected="">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Ảnh đại diện) KB</label>
                        <div>
                           <select class="form-control" name="upload_avatar_maximum_upload" id="upload_avatar_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400" selected="">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Maximum upload file (Web banner) KB</label>
                        <div>
                           <select class="form-control" name="upload_web_banner_maximum_upload" id="upload_web_banner_maximum_upload">
                              <option value="51200">50 KB</option>
                              <option value="102400">100 KB</option>
                              <option value="204800">200 KB</option>
                              <option value="307200">300 KB</option>
                              <option value="512000" selected="">500 KB</option>
                              <option value="1048576">1.0 MB</option>
                           </select>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Kích thước banner (dài x rộng)</label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="upload_banner_image_size" id="upload_banner_image_size" value="870x466" placeholder="Kích thước banner (dài x rộng)">
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
                           <input type="text" class="form-control" name="upload_web_logo_image_size" id="upload_web_logo_image_size" value="320x80" placeholder="Kích thước web logo (dài x rộng)">
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
                     </div>
                  </div>
                  <div class="tab-pane " id="payment_method">
                     <div class="form-group">
                        <label>Thanh toán khi giao hàng (COD)</label>
                        <div>
                           <textarea name="cash_info" id="cash_info" class="fckeditor" data-height="200" data-editor="small" placeholder="Thanh toán khi giao hàng (COD)" style="visibility: hidden; display: none;">&lt;p&gt;Nhận tiền khi giao hàng&lt;/p&gt;</textarea>
                           <div id="cke_cash_info" class="cke_2 cke cke_reset cke_chrome cke_editor_cash_info cke_ltr cke_browser_webkit" dir="ltr" lang="vi" role="application" aria-labelledby="cke_cash_info_arialbl">
                              <span id="cke_cash_info_arialbl" class="cke_voice_label">Bộ soạn thảo văn bản có định dạng, cash_info</span>
                              <div class="cke_inner cke_reset" role="presentation">
                                 <span id="cke_2_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_40" class="cke_voice_label">Thanh công cụ</span><span id="cke_2_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_40" onmousedown="return false;"><span id="cke_41" class="cke_toolbar cke_toolbar_last" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_42" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Đậm')" title="Đậm (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_42_label" aria-describedby="cke_42_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(40,event);" onfocus="return CKEDITOR.tools.callFunction(41,event);" onclick="CKEDITOR.tools.callFunction(42,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_42_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Đậm</span><span id="cke_42_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_43" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Nghiêng')" title="Nghiêng (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-describedby="cke_43_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(43,event);" onfocus="return CKEDITOR.tools.callFunction(44,event);" onclick="CKEDITOR.tools.callFunction(45,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_43_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Nghiêng</span><span id="cke_43_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_44" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách có thứ tự')" title="Chèn/Xoá Danh sách có thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_44_label" aria-describedby="cke_44_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(46,event);" onfocus="return CKEDITOR.tools.callFunction(47,event);" onclick="CKEDITOR.tools.callFunction(48,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1440px;background-size:auto;">&nbsp;</span><span id="cke_44_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Chèn/Xoá Danh sách có thứ tự</span><span id="cke_44_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_45" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách không thứ tự')" title="Chèn/Xoá Danh sách không thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_45_label" aria-describedby="cke_45_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(49,event);" onfocus="return CKEDITOR.tools.callFunction(50,event);" onclick="CKEDITOR.tools.callFunction(51,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1392px;background-size:auto;">&nbsp;</span><span id="cke_45_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Chèn/Xoá Danh sách không thứ tự</span><span id="cke_45_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_46" class="cke_button cke_button__link cke_button_off" href="javascript:void('Chèn/Sửa liên kết')" title="Chèn/Sửa liên kết (Ctrl+L)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_46_label" aria-describedby="cke_46_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(52,event);" onfocus="return CKEDITOR.tools.callFunction(53,event);" onclick="CKEDITOR.tools.callFunction(54,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_46_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Chèn/Sửa liên kết</span><span id="cke_46_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+L</span></a><a id="cke_47" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Xoá liên kết')" title="Xoá liên kết" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_47_label" aria-describedby="cke_47_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(55,event);" onfocus="return CKEDITOR.tools.callFunction(56,event);" onclick="CKEDITOR.tools.callFunction(57,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_47_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Xoá liên kết</span><span id="cke_47_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_48" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Canh trái')" title="Canh trái" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_48_label" aria-describedby="cke_48_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(58,event);" onfocus="return CKEDITOR.tools.callFunction(59,event);" onclick="CKEDITOR.tools.callFunction(60,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_48_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Canh trái</span><span id="cke_48_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_49" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Canh giữa')" title="Canh giữa" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_49_label" aria-describedby="cke_49_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(61,event);" onfocus="return CKEDITOR.tools.callFunction(62,event);" onclick="CKEDITOR.tools.callFunction(63,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_49_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Canh giữa</span><span id="cke_49_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_50" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Canh phải')" title="Canh phải" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_50_label" aria-describedby="cke_50_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(64,event);" onfocus="return CKEDITOR.tools.callFunction(65,event);" onclick="CKEDITOR.tools.callFunction(66,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_50_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Canh phải</span><span id="cke_50_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_51" class="cke_button cke_button__smiley cke_button_off" href="javascript:void('Hình biểu lộ cảm xúc (mặt cười)')" title="Hình biểu lộ cảm xúc (mặt cười)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_51_label" aria-describedby="cke_51_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(67,event);" onfocus="return CKEDITOR.tools.callFunction(68,event);" onclick="CKEDITOR.tools.callFunction(69,this);return false;"><span class="cke_button_icon cke_button__smiley_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1944px;background-size:auto;">&nbsp;</span><span id="cke_51_label" class="cke_button_label cke_button__smiley_label" aria-hidden="false">Hình biểu lộ cảm xúc (mặt cười)</span><span id="cke_51_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_52" class="cke_button cke_button__specialchar cke_button_off" href="javascript:void('Chèn ký tự đặc biệt')" title="Chèn ký tự đặc biệt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_52_label" aria-describedby="cke_52_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(70,event);" onfocus="return CKEDITOR.tools.callFunction(71,event);" onclick="CKEDITOR.tools.callFunction(72,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -2064px;background-size:auto;">&nbsp;</span><span id="cke_52_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Chèn ký tự đặc biệt</span><span id="cke_52_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span>
                                 <div id="cke_2_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_56" class="cke_voice_label">Nhấn ALT + 0 để được giúp đỡ</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" title="Bộ soạn thảo văn bản có định dạng, cash_info" aria-describedby="cke_56" tabindex="0" allowtransparency="true" style="width: 100%; height: 100%;"></iframe></div>
                                 <span id="cke_2_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_2_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Kéo rê để thay đổi kích cỡ" onmousedown="CKEDITOR.tools.callFunction(39, event)">◢</span><span id="cke_2_path_label" class="cke_voice_label">Nhãn thành phần</span><span id="cke_2_path" class="cke_path" role="group" aria-labelledby="cke_2_path_label"><span class="cke_path_empty">&nbsp;</span></span></span>
                              </div>
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Chuyển khoản ngân hàng</label>
                        <div>
                           <textarea name="bank_info" id="bank_info" class="fckeditor" data-height="200" data-editor="small" placeholder="Chuyển khoản ngân hàng" style="visibility: hidden; display: none;"></textarea>
                           <div id="cke_bank_info" class="cke_3 cke cke_reset cke_chrome cke_editor_bank_info cke_ltr cke_browser_webkit" dir="ltr" lang="vi" role="application" aria-labelledby="cke_bank_info_arialbl">
                              <span id="cke_bank_info_arialbl" class="cke_voice_label">Bộ soạn thảo văn bản có định dạng, bank_info</span>
                              <div class="cke_inner cke_reset" role="presentation">
                                 <span id="cke_3_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_63" class="cke_voice_label">Thanh công cụ</span><span id="cke_3_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_63" onmousedown="return false;"><span id="cke_64" class="cke_toolbar cke_toolbar_last" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_65" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Đậm')" title="Đậm (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_65_label" aria-describedby="cke_65_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(78,event);" onfocus="return CKEDITOR.tools.callFunction(79,event);" onclick="CKEDITOR.tools.callFunction(80,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_65_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Đậm</span><span id="cke_65_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_66" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Nghiêng')" title="Nghiêng (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_66_label" aria-describedby="cke_66_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(81,event);" onfocus="return CKEDITOR.tools.callFunction(82,event);" onclick="CKEDITOR.tools.callFunction(83,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_66_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Nghiêng</span><span id="cke_66_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_67" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách có thứ tự')" title="Chèn/Xoá Danh sách có thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_67_label" aria-describedby="cke_67_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(84,event);" onfocus="return CKEDITOR.tools.callFunction(85,event);" onclick="CKEDITOR.tools.callFunction(86,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1440px;background-size:auto;">&nbsp;</span><span id="cke_67_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Chèn/Xoá Danh sách có thứ tự</span><span id="cke_67_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_68" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Chèn/Xoá Danh sách không thứ tự')" title="Chèn/Xoá Danh sách không thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_68_label" aria-describedby="cke_68_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(87,event);" onfocus="return CKEDITOR.tools.callFunction(88,event);" onclick="CKEDITOR.tools.callFunction(89,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1392px;background-size:auto;">&nbsp;</span><span id="cke_68_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Chèn/Xoá Danh sách không thứ tự</span><span id="cke_68_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_69" class="cke_button cke_button__link cke_button_off" href="javascript:void('Chèn/Sửa liên kết')" title="Chèn/Sửa liên kết (Ctrl+L)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_69_label" aria-describedby="cke_69_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(90,event);" onfocus="return CKEDITOR.tools.callFunction(91,event);" onclick="CKEDITOR.tools.callFunction(92,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_69_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Chèn/Sửa liên kết</span><span id="cke_69_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+L</span></a><a id="cke_70" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Xoá liên kết')" title="Xoá liên kết" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_70_label" aria-describedby="cke_70_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(93,event);" onfocus="return CKEDITOR.tools.callFunction(94,event);" onclick="CKEDITOR.tools.callFunction(95,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_70_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Xoá liên kết</span><span id="cke_70_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_71" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Canh trái')" title="Canh trái" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_71_label" aria-describedby="cke_71_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(96,event);" onfocus="return CKEDITOR.tools.callFunction(97,event);" onclick="CKEDITOR.tools.callFunction(98,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_71_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Canh trái</span><span id="cke_71_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_72" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Canh giữa')" title="Canh giữa" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_72_label" aria-describedby="cke_72_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(99,event);" onfocus="return CKEDITOR.tools.callFunction(100,event);" onclick="CKEDITOR.tools.callFunction(101,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_72_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Canh giữa</span><span id="cke_72_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_73" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Canh phải')" title="Canh phải" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_73_label" aria-describedby="cke_73_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(102,event);" onfocus="return CKEDITOR.tools.callFunction(103,event);" onclick="CKEDITOR.tools.callFunction(104,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_73_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Canh phải</span><span id="cke_73_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_74" class="cke_button cke_button__smiley cke_button_off" href="javascript:void('Hình biểu lộ cảm xúc (mặt cười)')" title="Hình biểu lộ cảm xúc (mặt cười)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_74_label" aria-describedby="cke_74_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(105,event);" onfocus="return CKEDITOR.tools.callFunction(106,event);" onclick="CKEDITOR.tools.callFunction(107,this);return false;"><span class="cke_button_icon cke_button__smiley_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -1944px;background-size:auto;">&nbsp;</span><span id="cke_74_label" class="cke_button_label cke_button__smiley_label" aria-hidden="false">Hình biểu lộ cảm xúc (mặt cười)</span><span id="cke_74_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_75" class="cke_button cke_button__specialchar cke_button_off" href="javascript:void('Chèn ký tự đặc biệt')" title="Chèn ký tự đặc biệt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_75_label" aria-describedby="cke_75_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(108,event);" onfocus="return CKEDITOR.tools.callFunction(109,event);" onclick="CKEDITOR.tools.callFunction(110,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url('http://petronas.local/admin/bower_components/ckeditor/plugins/icons.png?t=HBDF');background-position:0 -2064px;background-size:auto;">&nbsp;</span><span id="cke_75_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Chèn ký tự đặc biệt</span><span id="cke_75_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span>
                                 <div id="cke_3_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_79" class="cke_voice_label">Nhấn ALT + 0 để được giúp đỡ</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" title="Bộ soạn thảo văn bản có định dạng, bank_info" aria-describedby="cke_79" tabindex="0" allowtransparency="true" style="width: 100%; height: 100%;"></iframe></div>
                                 <span id="cke_3_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_3_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Kéo rê để thay đổi kích cỡ" onmousedown="CKEDITOR.tools.callFunction(77, event)">◢</span><span id="cke_3_path_label" class="cke_voice_label">Nhãn thành phần</span><span id="cke_3_path" class="cke_path" role="group" aria-labelledby="cke_3_path_label"><span class="cke_path_empty">&nbsp;</span></span></span>
                              </div>
                           </div>
                        </div>
                        <span class="help-block"></span>
                     </div>
                  </div>
                  <div class="tab-pane " id="social">
                     <div class="form-group">
                        <label>Facebook page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="facebook_fanpage" id="facebook_fanpage" value="https://www.facebook.com/xeomshop" placeholder="Facebook page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Youtube channel<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="youtube_channel" id="youtube_channel" value="https://www.youtube.com/channel/UCOmPonLpBUqLkVCnxGWiR8g" placeholder="Youtube channel" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Zalo page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="zalo_page" id="zalo_page" value="https://chat.zalo.me" placeholder="Zalo page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                     <div class="form-group">
                        <label>Shopee page<small> (Tối đã 150 ký tự)</small></label>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                           <input type="text" class="form-control" name="shopee_page" id="shopee_page" value="https://shopee.vn/xeomshop" placeholder="Shopee page" maxlength="150">
                        </div>
                        <span class="help-block"></span>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <button type="button" id="save" class="btn btn-primary" data-id="1" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Lưu"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
                  <button type="submit" name="clear_data" class="btn btn-danger" value="1"><i class="fa fa-refresh" aria-hidden="true"></i> Xóa toàn bộ dữ liệu</button>
                  <button type="submit" name="clear_config_cache" class="btn btn-danger" value="1"><i class="fa fa-refresh" aria-hidden="true"></i> Xóa cache</button>
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