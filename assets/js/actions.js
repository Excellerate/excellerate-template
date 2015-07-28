jQuery(document).ready(function(){

    // Activate mobile menu
    $("#mobileMenuTrigger").click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    // Activate the front page slider
    $('#slickSlider').slick({
        autoplay: true,
        dots: true
    });

    // Video
    $('.ui.embed').embed();

});