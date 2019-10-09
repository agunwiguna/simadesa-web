<link href="<?=base_url()?>src/swt/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<style>
  #map{
    width: 1000px;
    height: 400px;
  }
</style>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Mitigasi Bencana</h1>
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


          <?php foreach($mitigasi as $data){
                  
              $nama = $data['nama_lokasi'];
              $lat = $data['lat'];
              $lon = $data['lng'];
              $ket = $data['keterangan'];

              echo ("addMarker($lat, $lon, 'Nama : $nama<br/>Keterangan : $ket');\n");                                  
          } ?>

      function addMarker(lat, lng, info) {
          var lokasi = new google.maps.LatLng(lat, lng);
          bounds.extend(lokasi);
          var marker = new google.maps.Marker({
              map: map,
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
                <a href="<?=base_url('mitigasi/tambah')?>">
                    <button class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i>Tambah Lokasi
                    </button>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <thead>                                 
                      <tr>
                        <th>No.</th>
                        <th>Nama Lokasi</th>
                        <th>Lattitude</th>                   
                        <th>Longitude</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($mitigasi as $row){ ?>                              
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['nama_lokasi']?></td>
                        <td><?=$row['lat']?></td>
                        <td><?=$row['lng']?></td>
                        <td><?=$row['keterangan']?></td>
                        <td>
                        	<a href="<?=base_url('mitigasi/edit/'.$row['id_mitigasi']);?>">
                            <button class="btn btn-icon btn-sm btn-primary">
                                  <i class="far fa-edit"></i>
                             </button>
                          </a>
                          <a href="<?=base_url('mitigasi/hapus/'.$row['id_mitigasi']);?>" class="delete-link">
	                            <button class="btn btn-icon btn-sm btn-danger">
	                                <i class="fas fa-trash-alt"></i>
	                            </button>
                            </a>
                        </td>
                      </tr>
                    <?php } ?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
	</section>

	<!-- Modal Detail -->
    <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>
</div>
<script src="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.js"></script>
<script src="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?=base_url()?>src/back/assets/js/page/modules-datatables.js"></script>
<script src="<?=base_url()?>src/swt/sweetalert.min.js"></script>
<script>
  $('#example').dataTable({
  
      "autoWidth": false,
      "deferRender": true,
  
      "drawCallback": function() {
          $('.orderNumber').on('click', function () {
              var orderNum = $(this).text();
              console.log(orderNum);
          });
      }
  });
</script>

<script>
	$(document).ready(function () {
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
			$.ajax({
				url: "<?=base_url('penduduk/detail')?>",
				type: "GET",
				data : {id: m,},
				success: function (ajaxData){
					$("#ModalDetail").html(ajaxData);
					$("#ModalDetail").modal('show',{backdrop: 'true'});
				}
			});
		});
	});
  jQuery(document).ready(function($){
    $('.delete-link').on('click',function(){
      var getLink = $(this).attr('href');
      swal({
        title: "Apa kamu yakin?",
        text: "Setelah di hapus, data akan hilang permanen!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Hapus!",
        cancelButtonText: "Batal !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = getLink;
        } else {
          swal("Batal", "Data Batal di Hapus :)", "error");
        }
      });
      return false;
    });
  });
</script>

<script>
  
    //swal tambah berhasil
    <?php if($this->session->userdata('proses')){ ?>
      swal("Berhasil!", "Data Berhasil Tersimpan!", "success")
      <?php
      $this->session->unset_userdata('proses');
    } ?>

    //swal tambah hapus
    <?php if($this->session->userdata('proses_hapus')){ ?>
      swal("Berhasil!", "Data Berhasil Terhapus!", "success")
      <?php
      $this->session->unset_userdata('proses_hapus');
    } ?>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Gagal!", "Data Gagal Tersimpan!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>

</script>
