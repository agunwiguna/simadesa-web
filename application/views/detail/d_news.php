<div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Info Desa</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php foreach($content as $data){?>
            <h5 class="modal-title"><?php echo $data['judul'];?></h1>
            <hr>
            <center>
              <p><img src="<?php echo base_url()?>src/info_desa/<?=$data['image'];?>" class="img-responsive gallery-style" id="gambar" alt="Image" style="width: 500px;height: 300px;"></p>
            </center>
            <!-- Paragraphs -->
            <p style="text-align:justify;"><?php echo $data['deskripsi'];?></p>
            <hr>          
          <?php } ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>