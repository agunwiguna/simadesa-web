<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Ubah Perangkat Desa</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('perangkat_desa/ubah')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$d['id'] ?>">
        <div class="modal-body">
            <div class="form-row">               
                <div class="form-group col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" value="<?=$d['nama'] ?>" name="nama" id="nama" placeholder="Masukan Nama.." required autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" value="<?=$d['jabatan'] ?>" name="jabatan" id="jabatan" placeholder="Masukan Jabatan.." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="kontak">Kontak</label>
                    <input type="number" class="form-control" value="<?=$d['kontak'] ?>" name="kontak" id="kontak" placeholder="Masukan Kontak.." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?=$d['alamat'] ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto">
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