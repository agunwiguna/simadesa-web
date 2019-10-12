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


    <audio id="myAudio">
        <source src="<?php echo base_url('src/') ;?>alert.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>            

		<div class="section-body">
			<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-condensed flip-content" id="example">
                    <thead class="flip-content">
                        <tr>
                            <td>No</td>
                            <td>Nama Penghuni</td>
                            <td>Lokasi</td>
                            <td>Status</td>
                            <td>Tangani</td>
                            
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>No</td>
                            <td>Nama Penghuni</td>
                            <td>Lokasi</td>
                            <td>Status</td>
                            <td>Tangani</td>
                            
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
		</div>
	</section>
</div>

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

      var map, markers = [], bounds;
      var rootRef  = firebase.database().ref().child("peringatan");
      var x = document.getElementById("myAudio"); 

      function initMap() {
        bounds = new google.maps.LatLngBounds(); 
        
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: {lat: -6.885500, lng: 107.615407},
          mapTypeId: google.maps.MapTypeId.HYBRID
        });

        rootRef.on("child_added", listenAdd);
        rootRef.on("child_changed", listenChange);
        rootRef.on("value", showData);

    }

    function listenAdd(snap) {
      var data = snap.val();
                    
      if(data.status == "Belum Ditangani"){
          x.play();
          var latlng = new google.maps.LatLng(parseFloat(data.lat), parseFloat(data.lng));
          
          var infowindowContent = 'Nama:' + data.nama+ '<br />';
          infowindowContent += 'Alamat :' + data.alamat ;
           

          bounds.extend(latlng);

          var marker = new google.maps.Marker({
              position: latlng,
                  map: map,
                  animation: google.maps.Animation.DROP
              });
              
          openInfo(marker, infowindowContent);

          markers.push(marker);

          map.fitBounds(bounds);
      }else{
        $('#myModal2').modal('hide');
        x.pause();
      }
    }

    function listenChange(snap) {
      reset_map(snap);
    }

    function showData(data) {
        var _table = document.getElementById('myTable');
        var _tambah = '';
        var no = 1;

        data.forEach(function(child){
            if (child.val().status == "Belum Ditangani") {
                var statu = "<td style='background-color:red; color:white'>" + child.val().status + "</td>"
                var tangani = "<td><a href='#' class='btn btn-danger' onclick='editKec(\"" +child.key+ "\")'  data-toggle='modal' data-target='#myModal2'>Tanggap</a></td>"
            } else {
                var statu = "<td style='background-color:green;color:white'>" + child.val().status + "</td>"
                var tangani = "<td>-</td>"
            }

            _tambah += "<tr>" 
                            +"<td>" + no + "</td>" 
                            +"<td>" + child.val().nama + "</td>"
                            +"<td>" + child.val().alamat + "</td>"  
                            + statu 
                            +tangani
                           
                        +"</tr>";
            no++;
        })
        _table.innerHTML=_tambah;
        // $('#example').DataTable();  
    }

    function editKec(id) {
       
      $("#id_d").val(id)
          
    }

    function actionKec() {
        var id = $("#id_d").val()
        rootRef.child(id).update({
            status : "Sudah Ditangani"
        })
        x.pause(); 
    }


    function reset_map(snap) {
      for(i in markers){
        markers[i].setVisible(false);
      }

      markers =[];
      map.setCenter(new google.maps.LatLng(-6.885500, 107.615407));
      map.setZoom(19);
      listenAdd(snap);
    }

    function openInfo(mark, infowindowContent){
            
        var infoWindow = new google.maps.InfoWindow({
            content: infowindowContent, 
            maxwidth : 400
        });
        
        google.maps.event.addListener(mark, 'click', function() {
            infoWindow.open(map, mark);
        })
    }

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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpALWzkNO7VH_pCSX30bt43_7h3sIeqQI&libraries=places&callback=initMap" async defer></script>





