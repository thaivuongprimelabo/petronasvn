@extends('layouts.petronasvn')
@section('content')
<!-- MAIN CONTENT -->
<div id="main" role="main">
    <div id="product_listing_preloader" class="loader_off">
        <div class="global_loader"></div>
    </div>
    <div class="container">
        <div class="row">
            <section class="main_content  col-sm-9 col-sm-push-3">
                @include('petronasvn.common.breadcrumb', [
                    'page2' => ['name' => 'Liên hệ']
                ])
                <div id="contact_page">
                <h1 class="page_heading">Contact us</h1>
                    <!--  GOOGLE MAP -->
                    <div id="google_map"></div>

                    <div id="contact_form" accept-charset="UTF-8" class="contact-form">
                        <p id="success_alert" class="alert alert-success hidden"><strong>Success!</strong> {{ trans('messages.SEND_CONTACT_SUCCESS') }}</p>
                        <p id="error_alert" class="alert alert-danger hidden"><strong>Error!</strong> {{ trans('messages.SEND_MAIL_ERROR') }}</p>
                        {{ csrf_field() }}
                        <div id="contactFormWrapper">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="contactFormName">Họ tên:</label>
                                    <input type="text" class="form-control hint" id="contactFormName" name="name" placeholder=""><p class="alert-form-info"></p>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="contactFormEmail">Email:</label>
                                    <input type="email" class="form-control hint" id="contactFormEmail" name="email" placeholder=""><p class="alert-form-info"></p>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="contactFormTelephone">Số điện thoại:</label>
                                    <input type="tel" class="form-control hint" id="contactFormTelephone" name="phone" placeholder=""><p class="alert-form-info"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="contactFormMessage">Tựa đề:</label>
                                    <textarea class="form-control hint" rows="5" cols="75" id="contactFormSubject" name="subject" placeholder=""></textarea><p class="alert-form-info"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="contactFormMessage">Nội dung:</label>
                                    <textarea class="form-control hint" rows="5" cols="75" id="contactFormMessage" name="content" placeholder=""></textarea><p class="alert-form-info"></p>
                                </div>
                            </div>

                            <div class="btn-toolbar form-group">
                                <input type="button" id="contactFormSubmit" value="Gửi" class="btn btn-alt"><p class="alert-form-info"></p>
                                <input type="reset" id="contactFormClear" value="Hủy" class="btn btn-info"><p class="alert-form-info"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('petronasvn.common.sidebar')
        </div>
    </div>
</div>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhhaXZ1b25nOTAiLCJhIjoiY2toZm1zb2loMDE1ZTJybm55YjEyMWo5NiJ9.iT8zcG5kAjOcY-Z6zDyRLQ';
    var map = new mapboxgl.Map({
        container: 'google_map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [12.550343, 55.665957],
        zoom: 8
    });

    var marker = new mapboxgl.Marker()
    .setLngLat([10.746004406195185, 106.63090253902928])
    .setPopup(
        new mapboxgl.Popup({ offset: 25 }) // add popups
        .setHTML('<strong>{{ $config['web_name'] }}</strong><br />Địa chỉ: {{ $config['web_address'] }}<br />Hotline: {{ $config['web_hotline'] }}')
        .setMaxWidth("300px")
    )
    .addTo(map);

    jQuery(function($) {

        $('#contactFormSubmit').click(function() {
            let _this = this;
            let data = {
                name    : $('#contactFormName').val(),
                email   : $('#contactFormEmail').val(),
                phone   : $('#contactFormTelephone').val(),
                content : $('#contactFormMessage').val(),
                subject : $('#contactFormSubject').val(),
            }
            
            $.ajax({
                url: '{{ route('contact') }}',
                type: 'post',
                async : true,
                data: data,
                beforeSend: function() {
                    $('#contactFormSubmit').prop('disabled', true);
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    $('#success_alert').addClass('hidden');
                    $('#error_alert').addClass('hidden');
                    if(res) {
                        $('#success_alert').removeClass('hidden');
                    } else {
                        $('#error_alert').removeClass('hidden');
                    }
                    $('#contactFormSubmit').prop('disabled', false);
                }
            })
        })

        $('#contactFormClear').click(function() {
            $('input[type="text"]').val('');
            $('input[type="email"]').val('');
            $('input[type="tel"]').val('');
            $('textarea').val('');
            $('#success_alert').addClass('hidden');
            $('#error_alert').addClass('hidden');
        });
    });

</script>
@endsection