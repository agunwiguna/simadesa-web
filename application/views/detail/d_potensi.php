<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Detail Potensi Desa</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <center>
                <?php foreach($content as $d){?> 
                <img src="<?php echo base_url()?>src/potensi/<?=$d['image'];?>" class="rounded" id="gambar" alt="Image" style="width: 150px;height: 150px;">
                <?php } ?> 
            </center>
            <br/>
             <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>                       
                            <td width="100px">Nama Potensi</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_potensi'] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="100px">Jenis Potensi</td>
                            <td width="50px">:</td>
                            <td><?=$d['jenis_potensi'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Deskripsi</td>
                            <td width="50px">:</td>
                            <td><?=$d['deskripsi'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>