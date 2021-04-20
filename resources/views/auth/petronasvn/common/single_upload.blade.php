@php
    $demension = $config[$key . '_image_size'];
    $split = explode('x', $demension);
    $image = Utils::getImageLink(Common::NO_IMAGE_FOUND);
    if($data !== null) {
        $column = str_replace('upload_', '', $key);
        $image = $data->$column;
    }
@endphp
<input type="file" class="form-control upload-simple" name="{{ $key }}" data-preview-control="preview_{{ $key }}" data-limit-upload="{{ $config[$key . '_maximum_upload'] }}">
<div class="preview_area" style="position:relative">
    <span class="spinner_preview" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i>Uploading...</span>
    <img id="preview_{{ $key }}" src="{{ $image }}" class="img-thumbnail" style="margin-top:10px; max-width: {{ $split[0] }}px; ">
</div>