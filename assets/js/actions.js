jQuery(document).ready(function(){

  // Activate mobile menu
  jQuery("#sidebarButton").click(function(){
      jQuery('#sidebar').sidebar({dimPage:false}).sidebar('toggle');
  });

  

  // Accordian
  jQuery('.ui.accordion').accordion();

  // Video
  jQuery('.ui.embed').embed();

});