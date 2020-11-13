jQuery(function($) {

    let _this = $(this);

    $.fn.addToCart = function (params) {
        $.ajax({
            url: addCart,
            type: 'post',
            async : true,
            data: params.data,
            beforeSend: function() {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                console.log(res);
                _this.loadCart();
                _this.refreshCount();
            }
        });
    };

    $.fn.updateCart = function (params) {
        $.ajax({
            url: addCart,
            type: 'post',
            async : true,
            data: params.data,
            beforeSend: function() {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                console.log(res);
                _this.loadCart();
                _this.refreshCount();
            }
        });
    };

    $.fn.loadCart = function () {
        $.ajax({
            url: loadCart,
            type: 'post',
            async : true,
            data: {},
            beforeSend: function() {
                $('#page_preloader').removeClass('off');
                $('#page_preloader').show();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                $('#cart_body').html(res.html);
                $('#total_price').html(res.total_price);
                if(res.total === 0) {
                    $('#cart_update').prop('disabled', true);
                    $('#cart_clear').prop('disabled', true);
                    $('#checkout').prop('disabled', true);
                }
                $('#page_preloader').addClass('off');
                $('#page_preloader').hide();
            }
        });
    };

    $.fn.refreshCount = function () {
        $.ajax({
            url: loadCart,
            type: 'post',
            async : true,
            data: {},
            beforeSend: function() {
                
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                $('#cart_items').html(res.total);
            }
        });
    };

    $.fn.removeCart = function (params) {
        $.ajax({
            url: params.url,
            type: 'post',
            async : true,
            data: {},
            beforeSend: function() {
                
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                _this.loadCart();
                _this.refreshCount();
            }
        });
    };
});