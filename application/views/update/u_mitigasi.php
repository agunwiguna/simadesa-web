<style>
  #map{
    width: 1000px;
    height: 400px;
  }
</style>
  <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="<?=base_url('mitigasi')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Ubah Lokasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?=base_url('dashboard')?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?=base_url('mitigasi')?>">Mitigasi Bencana</a></div>
                    <div class="breadcrumb-item">Ubah Lokasi</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Lokasi</h4>
                        </div>
                        <div class="card-body">
                            <div id="map"></div>
                        <br/>
                        <?php foreach ($konten as $row) {?>  
                        <form action="<?=base_url('mitigasi/ubah')?>" method="post" autocomplete="off">
                        <input type="hidden" name="id_mitigasi" value="<?=$row['id_mitigasi']?>">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lokasi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="nama_lokasi" value="<?=$row['nama_lokasi']?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lattitude</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" value="<?=$row['lat']?>" name="lat" id="lat" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Longitude</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="lng" value="<?=$row['lng']?>" id="lng" class="form-control" required>
                            </div>
                        </div> 
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="keterangan" required><?=$row['keterangan']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        <?php }  ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
    <script src="<?=base_url()?>src/back/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?=base_url()?>src/back/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpALWzkNO7VH_pCSX30bt43_7h3sIeqQI&sensor=false" type="text/javascript"></script>
<script type="text/javascript">
    document.getElementById('reset').onclick= function()
    {
        var field1= document.getElementById('lng');
        var field2= document.getElementById('lat');
        field1.value= field1.defaultValue;
        field2.value= field2.defaultValue;
    };
</script>    
<script type="text/javascript">
    function updateMarkerPosition(latLng) 
    {
      document.getElementById('lat').value = [latLng.lat()];
      document.getElementById('lng').value = [latLng.lng()];
    }

    var myOptions = 
    {
      zoom: 19,
      scaleControl: true,
      center:  new google.maps.LatLng(-6.757878, 108.058457),
      mapTypeId: google.maps.MapTypeId.HYBRID
    };
 
    var map = new google.maps.Map(document.getElementById("map"),myOptions);

    var marker1 = new google.maps.Marker({
        position : new google.maps.LatLng(-6.757878, 108.058457),
        title : 'lokasi',
        map : map,
        draggable : true
    });
 
    //updateMarkerPosition(latLng);

    google.maps.event.addListener(marker1, 'drag', function() {
    updateMarkerPosition(marker1.getPosition());
    });
</script>  

   