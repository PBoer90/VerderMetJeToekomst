var Slide = {
    date : new Date,

    getContent : function (slide){
        $.get('slides/'+slide+'.html?'+this.date.getTime(), function(data){
            $('#'+slide).find('.container-fluid').html(data);
            loadSlideButtons();
        });
    },

    getSectorChoice : function(){
        $.get('data/branches.json', function(data){
            var htmlString = '<div class="form-control-wrapper">';
            htmlString += '<select class="form-control white dropdown sector-data-'+adapter.education+'" id="sector-dropdown" placeholder="Sector">';

            if(isSet(adapter.sector)){
                htmlString += '<option selected="selected" disabled="disabled">Klik hier voor je sector</option>';
            }

            for(var i = 0; i < data.length; i++){
                htmlString += '<option value="'+stringFix(data[i])+'">';
                htmlString += data[i];
                htmlString += '</option>';
            }
            htmlString += '</select>';
            $('.sector-container').html(htmlString);

            adapter.btnListener();
        });
    }
};
