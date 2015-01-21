var currentSlide = 'choice-welcome';
var Carousel = $('.carousel');
var carouselNavigation = $('#slide-navigation');
var slides = setSlides();

/**
 * Init Carousel
 */
Carousel.carousel({
    interval: 0, //We don't want an automatic changing carousel
    keyboard: false
});

/**
 * Slide listener
 */
$('#mainCarousel').on('slide.bs.carousel', function (slideEvent) {
    currentSlide = $(slideEvent.relatedTarget).attr('id');
    if(currentSlide == 'choice-welcome'){
        carouselNavigation.addClass('disappear');
    }else{
        if(carouselNavigation.hasClass('disappear'))
            carouselNavigation.removeClass('disappear');

        carouselNavigation.addClass('appear');
    }
});

/**
 * Set slide numbers with names from html
 * @returns object
 */
function setSlides(){
    var obj = {};
    $('.carousel-inner .item').each(function(slideNumber, element){
        obj[$(element).attr('id')] = slideNumber;
    });
    return obj;
}

/**
 * Got to a slide by number or id/name
 * @param x int|string
 */
function goToSlide(x){
    if(isInt(x)){
        Carousel.carousel(x);
    }else{
        Carousel.carousel(slides[x]);
    }
}

/**
 * Go back a slide
 * @TODO go to prev slide instead of first
 *
 */
carouselNavigation.click(function(){
    goToSlide('choice-welcome');
});

