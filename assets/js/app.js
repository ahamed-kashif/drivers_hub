$(".jumbotron").css({ height: $(window).height() + "px" });

$(window).on("resize", function() {
    $(".jumbotron").css({ height: $(window).height() + "px" });
});
$(document).ready(function() {

    $('.color-choose input').on('click', function() {
        var headphonesColor = $(this).attr('data-image');

        $('.active').removeClass('active');
        $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
        $(this).addClass('active');
    });

});