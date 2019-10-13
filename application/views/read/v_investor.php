<link href="<?=base_url()?>src/swt/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Investor Desa</h1>
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
                        <th>Nama Investor</th>
                        <th>Kontak</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($investor as $row){ ?>                              
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['nama_investor']?></td>
                        <td><?=$row['kontak']?></td>
                        <td>
                          <a href="#" class="open_modal" id='<?=$row['id_investor']?>'>
                            <button class="btn btn-icon btn-sm btn-warning">
                                  <i class="far fa-eye"></i>
                              </button>
                          </a>
                          <a href="#" class="open_modals" id='<?=$row['id_investor']?>'>
                            <button class="btn btn-icon btn-sm btn-primary">
                                  <i class="far fa-edit"></i>
                             </button>
                          </a>
                          <a href="<?=base_url('investor/hapus/'.$row['id_investor']);?>" class="delete-link">
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
            <h5 class="modal-title">Tambah Investor Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=base_url('investor/simpan')?>" method="POST" autocomplete="off">
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama Investor</label>
                    <input type="text" class="form-control" name="nama_investor" id="nama" placeholder="Masukan Nama Investor.." required autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama">Kontak</label>
                    <input type="number" min="0" class="form-control" name="kontak" id="kontak" placeholder="Masukan Kontak Investor.." required autofocus>
                </div>
                <div class="form-group col-md-12">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" placeholder="Masukan Keterangan" class="form-control" style="height:90px;"></textarea>
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
        url: "<?=base_url('investor/detail')?>",
        type: "GET",
        data : {id: m,},
        success: function (ajaxData){
          $("#ModalDetail").html(ajaxData);
          $("#ModalDetail").modal('show',{backdrop: 'true'});
        }
      });
    });
  });
   $(document).ready(function () {
    $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
      $.ajax({
        url: "<?=base_url('investor/edit')?>",
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

