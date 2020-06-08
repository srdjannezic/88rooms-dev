<?php
//Utility::dump($this->address);
if (!empty($this->address)) {
    ?>
    <script>
        var IsGoogleMapLoaded=false;
        var geocoder; 
        var map;
        function loadScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize_map";
            document.body.appendChild(script);
        }
                        
        $(function(){
            
                            
            if(window.location.hash == "#map"){
                if(IsGoogleMapLoaded == false){
                    loadScript();
                }else{
                    $("#map_canvas").fadeIn();
                }
            }
            $("a[href='#map']").click(function(){    
                if(IsGoogleMapLoaded == false){
                    loadScript();
                }else{
                    $("#map_canvas").fadeIn();
                }
                        
            })
                            
        })
                        
        //window.onload = loadScript;
                         
        function initialize_map() {
            geocoder = new google.maps.Geocoder();
            var address = '<?php echo $this->address; ?>';
                            
                            
            var myOptions = {
                zoom: 14,            
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
                            
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    //   alert("Geocode was not successful for the following reason: " + status);
                }
            });  
            
            google.maps.event.addListener(map, 'idle', function () {
                     
                if (!IsGoogleMapLoaded) {
                     
                    IsGoogleMapLoaded = true;
                     
                }
                     
            });
        }
                        
    </script>

    <div id="map_canvas" style="width: 100%; height: 480px;"></div>
    <?php
} else {

    $this->getController()->renderPartial('//generic/emptyRelationTab/none');
}
?>