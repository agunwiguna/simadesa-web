<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Detail Perangkat Desa</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <center>
                <?php foreach($content as $d){?> 
                <img src="<?php echo base_url()?>src/perangkat_desa/<?=$d['foto'];?>" class="rounded" id="gambar" alt="Image" style="width: 150px;height: 150px;">
                <?php } ?> 
            </center>
            <br/>
             <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>                       
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama'] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="100px">Jabatan</td>
                            <td width="50px">:</td>
                            <td><?=$d['jabatan'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Alamat</td>
                            <td width="50px">:</td>
                            <td><?=$d['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontak'] ?></td>
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