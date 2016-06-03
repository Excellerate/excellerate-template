jQuery(document).ready(function(){

  // Activate mobile menu
  jQuery("#mobileMenuTrigger").click(function(){
      jQuery('.ui.sidebar').sidebar('toggle');
  });

  // Accordian
  jQuery('.ui.accordion').accordion();

  // Video
  jQuery('.ui.embed').embed();

});