/**
 * Setup
 */
var slideHistory = [];
var currentSlide = 'choice-welcome';
var Carousel = $('.carousel');
var carouselNavigation = $('#slide-navigation');
var icon = carouselNavigation.find('i');
var slides = setSlides();
var goingBack = false;

/**
 * Init Carousel
 */
Carousel.carousel({
    interval: 0, //We don't want an automatic changing carousel
    keyboard: false //Only interact with navigation we allow
});

/**
 * Slide listener
 */
$('#mainCarousel').on('slide.bs.carousel', function (slideEvent) {
    var lastSlide = currentSlide;
    currentSlide = $(slideEvent.relatedTarget).attr('id');

    if(goingBack) {
        goingBack = false;
        for (var i=slideHistory.length-1; i>=0; i--) {
            if (slideHistory[i] === lastSlide) {
                slideHistory.splice(i, 1);
            }
        }
    }else {
        slideHistory.push(currentSlide);
    }

    if(currentSlide == 'choice-welcome'){
        slideHistory.length = 0;
        carouselNavigation.addClass('disappear');
        icon.addClass('half-rotate');
    }else{
        if(currentSlide == 'choice-company')
            console.log($('.dropdown').remove());

        Slide.getContent(currentSlide);
        if(carouselNavigation.hasClass('disappear'))
            carouselNavigation.removeClass('disappear');

        if(icon.hasClass('half-rotate'))
            icon.removeClass('half-rotate');

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
    //console.log('going to slide '+x);
    if(isInt(x)){
        Carousel.carousel(x);
    }else{
        console.log(slides[x]);
        Carousel.carousel(slides[x]);
    }
}

/**
 * Go back a slide from the current slide
 * If we don't have any history we need to go to the welcome slide
 */
carouselNavigation.click(function(){
    goingBack = true;
    if(slideHistory.length < 2)
        goToSlide('choice-welcome');
    else
        if(currentSlide == slideHistory[slideHistory.length -2])
            goToSlide('choice-welcome');
        else
            goToSlide(slideHistory[slideHistory.length -2]);
});

/**
 * Load the slide buttons into the document
 * and make sure we can slide to a new slider after
 * an ajax request, we also reinitialise the material script
 */
function loadSlideButtons(){
    $('.btn-slide').click(function(){
        goToSlide($(this).attr('data-slider'));
    });
    adapter.btnListener();

    $.material.init();

}
