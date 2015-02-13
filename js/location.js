/**
 * Created by koen on 2/13/15.
 */

var htmlLocation = {

    /**
     * Check if geolocation is supported
     * @returns {boolean}
     */
    isAvailable : function(){
        if("geolocation" in navigator)
            return true;
        return false;
    },

    getLatLong : function(){
        if(!this.isAvailable())
            return false;

        navigator.geolocation.getCurrentPosition(function(position) {
            console.log('latitude : '+position.coords.latitude);
            console.log('longitude : '+position.coords.longitude)
        });
    },

    getPositionString : function(){
        if(!this.isAvailable())
            return false;

        navigator.geolocation.getCurrentPosition(function(position){
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

            $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?language=nl&latlng='+latitude+','+longitude, function(data){
                for(var i = 0; i < data['results'].length; i++){
                    if(data['results'][i]['address_components'].length == 3){
                        $('#location').val(data['results'][i]['formatted_address']);
                    }
                }
            });
        });
    }
};