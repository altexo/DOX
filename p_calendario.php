 <html>
     <body>
      <p>Blah</p>
      <div id="map_canvas" style="width:425px; height:550px"></div> 
      <p>Blah</p>

      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
      <script type="text/javascript"> 

        var map;
        var markers = [];

        initialize();

        function initialize() {
          var myOptions = {
            zoom: 10,
            center: new google.maps.LatLng(100.090, -100.536),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

          addMarker(new google.maps.LatLng(100.0747, -100.6274), "Alien");
          addMarker(new google.maps.LatLng(100.0758, -100.6254), "Zombie");
          addMarker(new google.maps.LatLng(100.0721, -100-6292), "Vampire");

        }

        function addMarker(latlng, myTitle) {
          markers.push(new google.maps.Marker({
            position: latlng, 
            map: map,
            title: myTitle,
            icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
          }));    
        }

      </script> 
    </body>
  </html>
