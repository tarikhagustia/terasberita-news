var $ = jQuery.noConflict();

$(document).ready(function($) {
	/* ---------------------------------------------------------------------- */
	/*	Sliders - [Flexslider]
	/* ---------------------------------------------------------------------- */
  	try {
		$('.flexslider').flexslider({
			animation: "fade",
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Input & Textarea Placeholder
	/*-------------------------------------------------*/
	$('input[type="text"], textarea').focus(function(){
		$(this).removeClass('error');
		if ($(this).val().toLowerCase() == $(this).attr('data-value').toLowerCase())
			$(this).val('');
	}).blur( function(){ 
		if ($(this).val() == '')
			$(this).val($(this).attr('data-value'));
	});

	/*-------------------------------------------------*/
	/* =  Dropdown Menu - Superfish
	/*-------------------------------------------------*/
	try {
		$('ul.sf-menu').superfish({
			delay: 400,
			autoArrows: false,
			speed: 'fast',
			animation: {opacity:'show', height:'show'}
		});
	} catch (err){

	}

	/*-------------------------------------------------*/
	/* =  Mobile Menu
	/*-------------------------------------------------*/
	// Create the dropdown base
    $("<select />").appendTo(".navigation");
    
    // Create default option "Go to..."
    $("<option />", {
    	"selected": "selected",
    	"value"   : "",
    	"text"    : "Go to..."
    }).appendTo(".navigation select");
    
    // Populate dropdown with menu items
    $(".sf-menu a").each(function() {
    	var el = $(this);
    	if(el.next().is('ul.sub-menu')){
    		$("<optgroup />", {
	    	    "label"    : el.text()
	    	}).appendTo(".navigation select");
    	} else {
    		$("<option />", {
	    	    "value"   : el.attr("href"),
	    	    "text"    : el.text()
	    	}).appendTo(".navigation select");
    	}
    });

    $(".navigation select").change(function() {
      window.location = $(this).find("option:selected").val();
    });

	/*-------------------------------------------------*/
	/* =  Fancybox Images
	/*-------------------------------------------------*/
	try {
		$(".gallery a").fancybox({
			nextEffect	: 'fade',
			prevEffect	: 'fade',
			openEffect	: 'fade',
	    	closeEffect	: 'fade',
	          helpers: {
	              title : {
	                  type : 'float'
	              }
	          }
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Fancybox Videos
	/*-------------------------------------------------*/
	try {
		$('.video .post-image a').fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '75%',
			height		: '75%',
			type 		: 'iframe',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'fade',
			closeEffect	: 'fade'
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/
	$('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });

    /*-------------------------------------------------*/
	/* =  Tabs Widget - { Popular, Recent and Comments }
	/*-------------------------------------------------*/
	$('.tab-links li a').live('click', function(e){
		e.preventDefault();
		if (!$(this).parent('li').hasClass('active')){
			var link = $(this).attr('href');

			$(this).parents('ul').children('li').removeClass('active');
			$(this).parent().addClass('active');

			$('.tabs-widget > div').hide();

			$(link).fadeIn();
		}
	});

    /* ---------------------------------------------------------------------- */
	/*	Comment Tree
	/* ---------------------------------------------------------------------- */
	try {
		$('#content ul.children > li, ol#comments > li').each(function(){
			if($(this).find(' > ul.children').length == 0){
				$(this).addClass('last-child');
			}
		});

		$("#content ul.children").each(function() {
			if($(this).find(' > li').length > 1) {
				$(this).addClass('border');
			}
		});

		$('ul.children.border').each(function(){
			$(this).append('<span class="border-left"></span>');

			var _height = 0;

			for(var i = 0; i < $(this).find(' > li').length - 1; i++){
				_height = _height + parseInt($(this).find(' > li').eq(i).height()) + parseInt($(this).find(' > li').eq(i).css('margin-bottom'));
			}

			_height = _height + 29;

			$(this).find('span.border-left').css({'height': _height + 'px'});
		});
	} catch(err) {

	}

	$(window).bind('resize', function(){
		try {
			$('ul.children.border').each(function(){
				var _height = 0;

				for(var i = 0; i < $(this).find(' > li').length - 1; i++){
					_height = _height + parseInt($(this).find(' > li').eq(i).height()) + parseInt($(this).find(' > li').eq(i).css('margin-bottom'));
				}

				_height = _height + 29;

				$(this).find('span.border-left').css({'height': _height + 'px'});
			});
		} catch(err) {

		}
	});

    /* ---------------------------------------------------------------------- */
	/*	Contact Map
	/* ---------------------------------------------------------------------- */
	var contact = {"lat":"42.672421", "lon":"21.16453899999999"}; //Change a map coordinate here!

	try {
		$('#map').gmap3({
		    action: 'addMarker',
		    latLng: [contact.lat, contact.lon],
		    map:{
		    	center: [contact.lat, contact.lon],
		    	zoom: 14
		   		},
		    },
		    {action: 'setOptions', args:[{scrollwheel:true}]}
		);
	} catch(err) {

	}
	
	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- */
	$('#submit').on('click', function(e){
		e.preventDefault();

		$this = $(this);
		
		$.ajax({
			type: "POST",
			url: 'contact.php',
			dataType: 'json',
			cache: false,
			data: $('#contact').serialize(),
			success: function(data) {
				if(data.info != 'error'){
					$this.parents('form').find('input[type=text],textarea,select').filter(':visible').val('');
					$('#msg').hide().removeClass('success').removeClass('error').addClass('success').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
				} else {
					$('#msg').hide().removeClass('success').removeClass('error').addClass('error').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
				}
			}
		});
	});
});

/*-------------------------------------------------*/
/* =  Masonry Effect
/*-------------------------------------------------*/
$(window).load(function(){
	try {
		$('#sidebar').masonry({
			singleMode: true,
			itemSelector: '.widget',
			columnWidth: 295,
			gutterWidth: 20
		});
	} catch(err) {

	}
});