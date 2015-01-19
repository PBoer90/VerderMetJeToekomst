
var currentSlide = 'choice-welcome';
var Carousel = $('.carousel');
var carouselNavigation = $('#slide-navigation');

//Init Carousel
Carousel.carousel({
    interval: 0, //We don't want an automatic changing carousel
    keyboard: false
});

//Slide listener
$('#mainCarousel').on('slide.bs.carousel', function (slideEvent) {
    console.log(slideEvent);
    currentSlide = $(slideEvent.relatedTarget).attr('id');
    if(currentSlide == 'choice-welcome'){
        carouselNavigation.addClass('disappear');
    }else{
        if(carouselNavigation.hasClass('disappear'))
            carouselNavigation.removeClass('disappear');

        carouselNavigation.addClass('appear');
    }
});

//Go back
$('#slide-navigation').click(function(){
    Carousel.carousel(0);
});

