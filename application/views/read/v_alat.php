<link href="<?=base_url()?>src/swt/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Alat</h1>
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
                        <th>Key Alat</th>
                        <th>Status</th>                   
                        <th>Aksi</th>                   
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($alat as $row){ ?>                              
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['key_alat']?></td>
                        <td><?=$row['status']?></td>
                        <td>
                          <a href="#" class="open_modals" id='<?=$row['id_alat']?>'>
                            <button class="btn btn-icon btn-sm btn-primary">
                                  <i class="far fa-edit"></i>
                             </button>
                          </a>
                          <a href="<?=base_url('data_alat/hapus/'.$row['id_alat']);?>" class="delete-link">
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

  <!-- Add Alat Data Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Data Alat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=base_url('data_alat/simpan')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="key_alat">Key Alat</label>
                    <input type="text" class="form-control" name="key_alat" id="key_alat" placeholder="Masukan Key" required autofocus>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="status">ٍStatus</label>
                    <?php 
                        $options = array(
                            'Aktif' => 'Aktif',
                            'Tidak Aktif' => 'Tidak Aktif'
                        );

                        $attr = array(
                            'class' => 'form-control',
                            'id' => 'status'
                        );
            
                        echo form_dropdown('status', $options, 'not_active', $attr);
                    ?>
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
    </div>
<!-- Modal Detail -->
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
        url: "<?=base_url('data_alat/edit')?>",
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
