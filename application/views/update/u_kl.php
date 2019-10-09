<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Ubah Kategori Layanan</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('kategori_layanan/ubah')?>" method="POST" autocomplete="off">
        <input type="hidden" name="id_kategori" value="<?=$d['id_kategori'] ?>">
        <div class="modal-body">
            <div class="form-row">               
                <div class="form-group col-md-12">
                    <label for="nama">Nama Layanan</label>
                    <input type="text" class="form-control" value="<?=$d['nama_layanan'] ?>" name="nama_layanan" id="nama_layanan" placeholder="Masukan Nama Layanan.." required autofocus>
                </div>
                <div class="form-group col-md-12">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="4" placeholder="Masukan Alamat" class="form-control"><?=$d['keterangan'] ?></textarea>
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