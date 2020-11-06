jQuery(function($){

	$('html').removeClass('no-js'); 




	// OUTDATED MSIE NOTIFICATION
	if ( $.browser.msie && $.browser.version >= 8 && $.browser.version <= 10 ) {
		$('body').prepend('<div class="old_browsers"><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie"><i class="fa fa-warning"></i><b>You are using an outdated version of Internet Explorer.</b><span>For a faster, safer browsing experience</span><span class="btn">upgrade now</span> </a></div>');
	};




	// PRELOADER
	$(window).load(function() {
		$('#page_preloader').addClass('off');

		setTimeout( function() { 
			$('#page_preloader').hide()
		}, 600 );
	});




	// IOS HOVER
	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
		$('a').on("touchstart", function() {});
	};




	// PLACEHOLDER JS 
	$('[placeholder]').each(function(){
	  if ($(this).val() === '') {
		var hint = $(this).attr('placeholder');
		$(this).val(hint).addClass('hint');
	  }
	});

	$('[placeholder]').focus(function() {
	  if ($(this).val() === $(this).attr('placeholder')) {
		$(this).val('').removeClass('hint');
	  }
	}).blur(function() {
	  if ($(this).val() === '') {
		$(this).val($(this).attr('placeholder')).addClass('hint');
	  }
	});                    




	// FORM VALIDATION MINI
	$.fn.formValidation=function(){this.find("input, textarea").after('<p class="alert-form-info"></p>'),this.on("submit",function(t){if($(this).find("input, textarea").each(function(){""==$(this).val()&&($(this).addClass("alert-form").next().html("Field can&#39;t be blank").slideDown(),$(this).on("focus",function(){$(this).removeClass("alert-form").next().slideUp()}),t.preventDefault())}),$(this).find("input[type=email]").length){var e=$(this).find("input[type=email]");e.val().length>0&&(e.val().length<6||-1==e.val().indexOf("@")||-1==e.val().indexOf("."))&&(e.addClass("alert-form").next().html("Incorrect email").slideDown(),e.on("focus",function(){$(this).removeClass("alert-form").next().slideUp()}),t.preventDefault())}if(2==$(this).find("input[type=password]").length){var n=$(this).find("input[type=password]:eq(0)"),i=$(this).find("input[type=password]:eq(1)");n.val()!=i.val()&&(i.addClass("alert-form").next().html("Passwords do not match").slideDown(),i.on("focus",function(){i.removeClass("alert-form").next().slideUp()}),t.preventDefault())}})};


   

	// FORM STYLES   
	$('.address_table form, .customer_address form').addClass('form-horizontal');




	// CUSTOM SELECTS 
	$('.header_currency select, #navigation select').styler();
	$('.jq-selectbox__trigger').append('<i class="icon material-icons-arrow_drop_down"></i>');




	// MEGAMENU DESKTOP 
	$('.sf-menu').superfish({
		animation: {height: 'show'},
		speed: 'fast'
	});

	var path = window.location.pathname.split('/');
	path = path[path.length-1];
	if (path !== undefined) {
	  $("ul.sf-menu > li").children("a[href$='" + path + "']").parents('li').children('a').addClass('active');
	};

	var path2 = window.location.pathname;
	if (path2 == '/' || path == undefined) {
	  $("ul.sf-menu > li").children("a[href$='" + path2 + "']").parents('li').children('a').addClass('active');
	};




	// MEGAMENU MOBILE 
	$(document).ready(function(){
		$(".megamenu_mobile h2").click(function(){
			$(".level_1").slideToggle("slow");
			$(this).toggleClass("active");
		});

		$(".level_1_trigger").click(function(){
			$(this).parent().parent().find(".level_2").slideToggle("slow");
			$(this).toggleClass("active");
			return false;
		});

		$(".level_2_trigger").click(function(){
			$(this).parent().parent().find(".level_3").slideToggle("slow");
			$(this).toggleClass("active");
			return false;
		});

		$('.megamenu_mobile h2').on('click touchstart', function(e){
			e.stopPropagation();
		});

		$(document).on('click', function(){
			$(".level_1").slideUp("slow");
			$(".megamenu_mobile").find("h2").removeClass("active");
		});
	});




	// SEARCH FORMS
	$('.search_form').on('submit', function(e) {
		var searchQuery = $(this).find('input').val().replace(/ /g, '+');
		var placeHolder = $(this).find('input').attr('placeholder').replace(/ /g, '+');

		if ( !(searchQuery.length && searchQuery != placeHolder) ) {
			e.preventDefault();
			e.stopPropagation();
		};
	});



	// MAIN PRODUCT LISTING IMAGE CHANGE
	imgChange = function (){
		if ( device.desktop() ) {
			$(document).on({
			    mouseenter: function(){
			        $(this).find(".img__2").stop().animate({"opacity": 1});
			    },
			    mouseleave: function(){
			        $(this).find(".img__2").stop().animate({"opacity": 0});
			    }
			}, '.img_change');
		};
	};
	$(window).load( imgChange );




	// BACK TO TOP BUTTON 
	$(document).ready(function(){
		$(document.body).append('<a id="back_top" href="#"></a>');
		$('#back_top').hide();

		$(window).scroll(function(){
			if ( $(this).scrollTop() > 300 ) {
				$('#back_top').fadeIn("slow");
			}
			else {
				$('#back_top').fadeOut("slow");
			};
		});

		$('#back_top').on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({scrollTop : 0},800);
			$('#back_top').fadeOut("slow").stop();
		});
	});




	// PRODUCT QUANTITY FORM MINI, USED ON:
	// 1. PRODUCT PAGE
	// 2. PRODUCT QUICK VIEW
	// 3. CART PAGE
	$(document).on("focusout",".quantity_input",function(){var t=$(this).val();$(this).val(isNaN(parseFloat(t))&&!isFinite(t)||0==parseInt(t)||""==t?1:parseInt(t)<0?parseInt(t)-2*parseInt(t):parseInt(t))}),$(document).on("click",".quantity_up",function(){var t=$(this).parent().find(".quantity_input");t.val(!isNaN(parseFloat(t.val()))&&isFinite(t.val())?parseInt(t.val())+1:1)}),$(document).on("click",".quantity_down",function(){var t=$(this).parent().find(".quantity_input");t.val(!isNaN(parseFloat(t.val()))&&isFinite(t.val())&&t.val()>1?parseInt(t.val())-1:1)});




	// STICK MENU
	$.fn.tmStickUp = function() { 
		var _this = $(this),
			_window = $(window),
			_document = $(document),
			thisOffsetTop = 0,
			thisOuterHeight = 0,
			documentScroll = 0,
			pseudoBlock;

		init();

		function init() {
			thisOffsetTop = parseInt( _this.offset().top );
			thisOuterHeight = parseInt( _this.outerHeight(true) );

			$('<div class="pseudo_sticky_block"></div>').insertAfter(_this);
			pseudoBlock = $('.pseudo_sticky_block');
			pseudoBlock.css({ 'position' : 'relative' });
			addEventsFunction();
		};

		function addEventsFunction() {

			_document.on('scroll', function() {

				thisOffsetTopCheck = parseInt( pseudoBlock.offset().top );

				if ( thisOffsetTopCheck < thisOffsetTop ) {
					thisOffsetTop = thisOffsetTopCheck;
				};

				documentScroll = parseInt( _window.scrollTop() );

				if ( $(window).width() > 991 && (thisOffsetTop < documentScroll) ) {
					_this.addClass('megamenu_stuck').css({ position: 'fixed' });
					pseudoBlock.css({ 'height' : thisOuterHeight });
				}
				else {
					_this.removeClass('megamenu_stuck').css({ position : 'relative' });
					pseudoBlock.css({ 'height' : 0 });
				};

			}).trigger('scroll');
		};
	};

	$(window).on('load', function() {
		$('#megamenu').tmStickUp();
      
		var collection_listing_item_item_4_1 = $(".collection_listing_item.item_4_1"), 
			product_collection_item3_1 = $(".product_collection.item3_1");

		if(collection_listing_item_item_4_1.length > 0){
			collection_listing_item_item_4_1.last().addClass("last");
		}
		if(product_collection_item3_1.length > 0){
			product_collection_item3_1.last().addClass("last");
		}
	});

	var menuWidgetText = $(".sidebar .sidebar_widget:first-child .widget_header").text();
	$('#megamenu .widget_header').html(menuWidgetText);

	// EQUALHEIGHTS
	/*parsed HTML*/
	$(function(){
		$(".maxheight").each(function(){
			$(this).contents().wrapAll("<div class='box_inner'></div>");
		})
		$(".maxheight1").each(function(){
			$(this).contents().wrapAll("<div class='box_inner'></div>");
		})

	})
	/*add event*/
	$(window).bind("resize", height_handler).bind("load", height_handler)
	function height_handler(){
		if($(window).width()>767){
			$(".maxheight").equalHeights();
		}else{
			$(".maxheight").css({'min-height':'0'});
		}
		if($(window).width()>767){
			$(".maxheight1").equalHeights();
		}else{
			$(".maxheight1").css({'min-height':'0'});
		}
	}
	/*glob function*/
	(function($){
		$.fn.equalHeights=function(minHeight,maxHeight){
			tallest=(minHeight)?minHeight:0;
			this.each(function(){
				if($(">.box_inner", this).outerHeight()>tallest){
					tallest=$(">.box_inner", this).outerHeight()
				}
			});
			if((maxHeight)&&tallest>maxHeight) tallest=maxHeight;
			return this.each(function(){$(this).css("min-height", tallest)})
		}
	})(jQuery)

});