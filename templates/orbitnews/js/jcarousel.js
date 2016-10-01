jQuery(document).ready(function(){

	var carousel_container = jQuery('.carousel-container');
	
	function carousel_init(){
		carousel_container.each(function(){
			var carousel = jQuery(this);
			var carousel_holder = carousel.children('.carousel-item-holder');
			var carousel_item = carousel.find('.carousel-item');
			
			carousel_item.css('float', 'left');
			
			var child_size;
			if( carousel_item.filter(':first').hasClass('three') ){
				carousel_holder.attr('data-num', 4);
				child_size = carousel.parents('.row').width() / 4;
			}else if( carousel_item.filter(':first').hasClass('four') ){
				carousel_holder.attr('data-num', 3);
				child_size = carousel.parents('.row').width() / 3;
			}else if( carousel_item.filter(':first').hasClass('six') ){
				carousel_holder.attr('data-num', 2);
				child_size = carousel.parents('.row').width() / 2;
			}
			
			if( jQuery(window).width() <= '767' ){
				carousel_holder.attr('data-num', 1);
				child_size = carousel_item.width() + 15; //carousel.parents('.row').width();
			}

			child_size += 9;
			
			carousel_item.width( child_size );
			
			carousel_holder.attr('data-width', child_size);
			carousel_holder.attr('data-max', carousel_item.length);
			carousel_holder.width( carousel_item.length * child_size );
			
			var cur_index = parseInt(carousel_holder.attr('data-index'));
			carousel_holder.css({ 'margin-left': -(cur_index * child_size + 12.5) });
		});
	}
	
	// bind the navigation
	var carousel_nav = carousel_container.children('.carousel-navigation');
	carousel_nav.children('.carousel-prev').click(function(){
		var carousel_holder = jQuery(this).parent('.carousel-navigation').siblings('.carousel-item-holder');
		var cur_index = parseInt(carousel_holder.attr('data-index'));
		
		if( cur_index > 0 ){ cur_index--;  }
		
		carousel_holder.attr('data-index', cur_index);
		carousel_holder.animate({ 'margin-left': -(cur_index * parseInt(carousel_holder.attr('data-width')) + 12.5) });
	});
	carousel_nav.children('.carousel-next').click(function(){
		var carousel_holder = jQuery(this).parent('.carousel-navigation').siblings('.carousel-item-holder');
		var cur_index = parseInt(carousel_holder.attr('data-index'));
		
		if( cur_index + parseInt(carousel_holder.attr('data-num')) < parseInt(carousel_holder.attr('data-max')) ){
			cur_index++;
		}
		
		carousel_holder.attr('data-index', cur_index);
		carousel_holder.animate({ 'margin-left': -(cur_index * parseInt(carousel_holder.attr('data-width')) + 12.5) });
	});
	
	carousel_init();
	
	//Auto animate
	//var infiniteLoop = setInterval(function(){
	//	carousel_nav.children('.carousel-next').trigger('click');
	//}, 1000);	
	
	jQuery(window).resize(function(){
		carousel_init();
	});
	
});