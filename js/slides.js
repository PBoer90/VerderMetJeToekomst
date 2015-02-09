var Slide = {

    getContent : function (slide){
        $.get('slides/'+slide+'.html', function(data){
            $('#'+slide).find('.container-fluid').html(data);
            loadSlideButtons();
        });
    }
};
