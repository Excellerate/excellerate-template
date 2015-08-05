jQuery(document).ready(function(){

    // Activate mobile menu
    $("#mobileMenuTrigger").click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    // Video
    $('.ui.embed').embed();

});