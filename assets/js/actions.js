jQuery(document).ready(function(){

  // Activate mobile menu
  jQuery('#sidebar').sidebar({dimPage:false});
  jQuery("#sidebarButton").click(function(){
    jQuery('#sidebar').sidebar('toggle');  
  });

  // Accordian
  jQuery('.ui.accordion').accordion();

  // Video
  jQuery('.ui.embed').embed();

});