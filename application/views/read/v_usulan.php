<link href="<?=base_url()?>src/swt/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Usulan Warga</h1>
		</div>

		<div class="section-body">
			<div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">

              </div> -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <thead>                                 
                      <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>                   
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Verifikasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($usulan as $row){ ?>                              
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['nik']?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['status']?></td>
                        <td>
                          <?php if ($row['status']=='Menunggu') {?>
                            <a href="<?=base_url('usulan/verifikasi/'.$row['id_usulan']);?>">
                              <button class="btn btn-icon btn-sm btn-primary">
                                  <i class="fas fa-check"></i> Selesai
                              </button>
                            </a>
                          <?php } else {?>
                              <button class="btn btn-icon btn-sm btn-primary disabled">
                                  <i class="fas fa-check"></i> Selesai
                              </button>
                          <?php } ?>
                        </td>
                        <td>
                        	<a href="#" class="open_modal" id='<?=$row['id_usulan']?>'>
	                        	<button class="btn btn-icon btn-sm btn-warning">
	                                <i class="far fa-eye"></i>
	                            </button>
                        	</a>
                            <a href="<?=base_url('usulan/hapus/'.$row['id_usulan']);?>" class="delete-link">
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
				url: "<?=base_url('usulan/detail')?>",
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
