<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Usulan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
             <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>                    
                            <td width="50px">NIK</td>
                            <td width="50px">:</td>
                            <td><?=$d['nik'] ?></td>
                        </tr>
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
                        </tr>
                        <tr>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontak'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Tanggal</td>
                            <td width="50px">:</td>
                            <td><?=$d['created_at'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Status</td>
                            <td width="50px">:</td>
                            <td><?=$d['status'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Usulan</td>
                            <td width="50px">:</td>
                            <td><?=$d['usulan'] ?></td>
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