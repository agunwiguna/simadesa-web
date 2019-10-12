<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Detail UMKM Desa</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <center>
                <?php foreach($content as $d){?> 
                <img src="http://app.desa-babakanasem.id/image/<?=$d['image'];?>" class="rounded" id="gambar" alt="Image" style="width: 150px;height: 150px;">
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
                            <td width="100px">Alamat</td>
                            <td width="50px">:</td>
                            <td><?=$d['alamat'] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="100px">Usaha</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_usaha'] ?></td>
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