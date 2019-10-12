<link href="<?=base_url()?>src/swt/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kategori Layanan Desa</h1>
		</div>

		<div class="section-body">
			<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i>Tambah
                    </button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <thead>                                 
                      <tr>
                        <th>No.</th>
                        <th>Nama Layanan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($layanan as $row){ ?>                              
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['nama_layanan']?></td>
                        <td><?=$row['keterangan']?></td>
                        <td>
                          <a href="#" class="open_modals" id='<?=$row['id_kategori']?>'>
                            <button class="btn btn-icon btn-sm btn-primary">
                                  <i class="far fa-edit"></i>
                             </button>
                          </a>
                          <a href="<?=base_url('kategori_layanan/hapus/'.$row['id_kategori']);?>" class="delete-link">
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

  <!-- Add Siswa Data Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Kategori Layanan Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=base_url('kategori_layanan/simpan')?>" method="POST" autocomplete="off">
          <div class="modal-body">
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label for="nama">Nama Layanan</label>
                      <input type="text" class="form-control" name="nama_layanan" id="nama" placeholder="Masukan Nama Layanan.." required autofocus>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
                  </div>
              </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
      $.ajax({
        url: "<?=base_url('kategori_layanan/edit')?>",
        type: "GET",
        data : {id: m,},
        success: function (ajaxData){
          $("#ModalEdit").html(ajaxData);
          $("#ModalEdit").modal('show',{backdrop: 'true'});
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
