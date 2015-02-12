var Slide = {
    date : new Date,

    getContent : function (slide){
        $.get('slides/'+slide+'.html?'+this.date.getTime(), function(data){
            $('#'+slide).find('.container-fluid').html(data);
            loadSlideButtons();
        });
    },

    getSectorChoice : function(){

        loadSlideButtons();
        $.get('dummy/branches.json', function(data){
            var htmlString = '<select class="form-control white dropdown sector-data-'+adapter.education+'" id="sector-dropdown" placeholder="Sector">';
            for(var i = 0; i < data.length; i++){
                htmlString += '<option value="'+stringFix(data[i])+'">'+data[i]+'</option>';
            }
            $('.sector-container').html(htmlString);
        });
    }
};
