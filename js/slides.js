var Slides = {
    getContent : function (slide){
        $.get('slides/'+slide+'.html', function(test){
            $('#'+slide).find('.container-fluid').html(test);
        });
    }
};