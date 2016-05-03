<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=id" type="text/javascript"></script>
<script type="text/javascript">

    var map;
    var geocoder;


    <?php  if(!empty($activity)): ?>
    function update() {
        geocoder      = new google.maps.Geocoder();
        var lat       = "<?php echo $activity[0]['activity_lat']; ?>";
        var lng       = "<?php echo $activity[0]['activity_long']; ?>";
        var myLatLong = new google.maps.LatLng(lat, lng);
            // 
            geocoder.geocode( {'latLng': myLatLong}, 
                function(results, status) {
                    var add           = results[0].formatted_address;
                    var contentString = add;
                    var myMap         = {
                        zoom:16,
                        center:myLatLong,
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                    };

                    map    = new google.maps.Map(document.getElementById('map_canvas'), myMap);
                    marker = new google.maps.Marker({
                        map : map,
                        draggable : true
                    })
                    marker.setPosition(myLatLong);
                    map.setCenter(myLatLong);

                    infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    infowindow.open(map, marker);
                    document.getElementById('googleAddress').value = add;
                }
                );
}
google.maps.event.addDomListener(window, 'load', update); 

<?php endif; ?>

/* ---------------------------------------------------------------------------------*/

function initialize() {            
    var input        = document.getElementById('googleAddress');
    var autocomplete = new google.maps.places.Autocomplete(input);

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place           = autocomplete.getPlace();
        var contentString   = place.formatted_address;
        var city            = place.name;
        var lat             = place.geometry.location.lat();
        var lng             = place.geometry.location.lng();
        var myLatLong       = new google.maps.LatLng(lat, lng);
        var myMap           = {
            zoom:16,
            center:myLatLong,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        map    = new google.maps.Map(document.getElementById('map_canvas'), myMap);
        marker = new google.maps.Marker({
            map       : map,
            title     : contentString,
            draggable : true
        })
        marker.setPosition(myLatLong);
        map.setCenter(myLatLong);

        infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        google.maps.event.addListener(marker, 'click', function(){
         infowindow.open(map, marker);
     });

        document.getElementById('city').value = city;
        document.getElementById('lat').value  = lat;
        document.getElementById('long').value = lng;
    });
}

google.maps.event.addDomListener(window, 'load', initialize); 

</script>
<!-- date time picker -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css';?>">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css';?>">

<style type="text/css">
    #image_current {
        height: auto; 
        width: auto; 
        max-width: 690px; 
        max-height: 400px;
    }
</style>