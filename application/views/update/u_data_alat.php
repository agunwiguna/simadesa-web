<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data Alat</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('data_alat/ubah')?>" method="POST" autocomplete="off">
        <input type="hidden" name="id_alat" value="<?=$d['id_alat'] ?>">
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="key_alat">Key Alat</label>
                    <input type="text" class="form-control" name="key_alat" id="key_alat" value="<?=$d['key_alat']?>" placeholder="Masukan Key" required autofocus>
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
            
                        echo form_dropdown('status', $options, $d['status'], $attr);
                    ?>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        <?php } ?> 
        
      </div>
    </div>
  </div>