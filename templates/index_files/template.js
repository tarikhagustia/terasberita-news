$(document).ready(function() {
  $('.a_link').click(function(event){
    link_target = $(this).attr('title');
    try { 
      _gaq.push(['_trackEvent', 'channelbox iklanbaris', 'Outbound Links', link_target]); 
    } catch(err){}
    
    setTimeout(function() {}, 100);
    
  });

});
