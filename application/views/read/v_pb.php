<style>
  #map{
    width: 1000px;
    height: 400px;
  }
</style>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyBR0f-Xl0CXtIkAIhT_WztEwmGc3GAEqfc",
    authDomain: "simadesa-98da1.firebaseapp.com",
    databaseURL: "https://simadesa-98da1.firebaseio.com",
    projectId: "simadesa-98da1",
    storageBucket: "simadesa-98da1.appspot.com",
    messagingSenderId: "542710138221",
    appId: "1:542710138221:web:e1b181d28f888db0108664"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Panic Button Monitoring</h1>
		</div>

    <div class="section-body">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">

              </div> -->
              <div class="card-body">
                  <div id="map"></div>
              </div>
            </div>
          </div>
      </div>
    </div>            
    <script>
      function initMap() {

        var infoWindow = new google.maps.InfoWindow;
        var bounds = new google.maps.LatLngBounds(); 
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: {lat: -6.885500, lng: 107.615407},
          mapTypeId: google.maps.MapTypeId.HYBRID
        });

        var rootRef  = firebase.database().ref().child("users");

        rootRef.on("child_added",snap => {

          var nama = snap.child("nama").val();
          var lat = snap.child("lat").val();
          var lon = snap.child("lon").val();

          addMarker(lat, lon, nama);

        })

        

      function addMarker(lat, lng, info) {
          var lokasi = new google.maps.LatLng(lat, lng);
          bounds.extend(lokasi);
          var marker = new google.maps.Marker({
              map: map,
              animation: google.maps.Animation.DROP,
              position: lokasi
          });       
          map.fitBounds(bounds);
          bindInfoWindow(marker, map, infoWindow, info);
        }

        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpALWzkNO7VH_pCSX30bt43_7h3sIeqQI&libraries=places&callback=initMap" async defer></script>

		<div class="section-body">
			<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

              </div>
              <div class="card-body">

              </div>
            </div>
          </div>
        </div>
		</div>
	</section>
</div>





