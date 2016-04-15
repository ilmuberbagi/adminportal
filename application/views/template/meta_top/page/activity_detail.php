<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('googleAddress');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('long').value = place.geometry.location.lng();
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
