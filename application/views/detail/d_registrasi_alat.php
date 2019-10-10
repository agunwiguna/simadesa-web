<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Registrasi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
             <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>                       
                            <td width="100px">NIK</td>
                            <td width="50px">:</td>
                            <td><?=$d['nik'] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Jenis Kelamin</td>
                            <td width="50px">:</td>
                            <td><?=$d['jk'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Pekerjaan</td>
                            <td width="50px">:</td>
                            <td><?=$d['pekerjaan'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontak'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Key Alat</td>
                            <td width="50px">:</td>
                            <td><?=$d['key_alat'] ?></td>
                        </tr>
                        <tr>
                            <td width="100px">Status Alat</td>
                            <td width="50px">:</td>
                            <td><?=$d['status'] ?></td>
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