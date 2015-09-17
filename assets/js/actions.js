jQuery(document).ready(function(){

    // Activate mobile menu
    $("#mobileMenuTrigger").click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    // Accordian
    $('.ui.accordion').accordion();

    // Video
    $('.ui.embed').embed();

});