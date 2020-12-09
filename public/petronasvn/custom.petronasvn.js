jQuery(function($) {

    let _this = $(this);

    $.fn.addToCart = function (data) {
        $.ajax({
            url: addCart,
            type: 'post',
            async : true,
            data: data,
            beforeSend: function() {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                $('body').append('<div id="cart_added"><h4>Đã thêm vào giỏ hàng</h4><div class="cart_added__row"><div class="cart_added__1" id="cart_added__img"><img src="' + data.image + '" alt="" /></div><div class="cart_added__2"><span id="cart_added__name" class="product_name"></span><p id="cart_added__quantity">Quantity: <span>' + data.qty + '</span></p><a class="btn" href="/gio-hang">Go to cart</a><a class="btn btn-alt" id="cart_added__close" href="javascript:void(0)" onclick="$(\'.fancybox-close\').trigger(\'click\')">Continue shopping</a></div></div></div>');
                $.fancybox.open( $('#cart_added'),
                    {
                        'openSpeed': 500,
                        'closeSpeed': 300,
                        'afterClose': function() {
                            $('#cart_added').remove();
                        }
                    }
                );
                _this.loadCart();
                _this.refreshCount();
            }
        });

    };

    $.fn.updateCart = function (data) {
        $.ajax({
            url: updateCart,
            type: 'post',
            async : true,
            data: data,
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
            url: removeCart,
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

    $.fn.removeItem = function (id) {
        $.ajax({
            url: removeItem,
            type: 'post',
            async : true,
            data: {
                id: id
            },
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