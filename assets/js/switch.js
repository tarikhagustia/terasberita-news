(function ($j) {

  switch_style = {

    onReady: function () {      
      this.switch_style_click();
    },
    
    switch_style_click: function(){
    	$(".styleswitch").click(function(){
    		var id = $(this).attr("id");  		
    		$("#switch_style").attr("href", "css/colors/" + id + ".css");    		
			$("#default-logo").attr("src", "images/logo-black.png"); 
			$("#retina-logo").attr("src", "images/logo-black-retina.png"); 			
    	});
	    	$("#turquoise").click(function(){
			$("#default-logo").attr("src", "images/logo.png");   
			$("#retina-logo").attr("src", "images/logo-retina.png"); 			
});			
    },
  };

  $j().ready(function () {
	  switch_style.onReady();
  });

})(jQuery);