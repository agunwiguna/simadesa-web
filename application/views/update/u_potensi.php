<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Ubah Potensi Desa</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('potensi/update')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="id_potensi" value="<?=$d['id_potensi'] ?>">
        <div class="modal-body">
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_potensi">Nama Potensi</label>
                    <input type="text" class="form-control" name="nama_potensi" id="nama_potensi" placeholder="Masukan Nama.." value="<?=$d['nama_potensi'] ?>" required autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="jenis_potensi">Jenis Potensi</label>
                    <select id="jenis_potensi" name="jenis_potensi" class="form-control">
                        <option value="Pertanian">Pertanian</option>
                        <option value="Peternakan">Peternakan</option>
                        <option value="Perikanan">Perikanan</option>
                        <option value="Perkebunan">Perkebunan</option>
                        <option value="Wisata">Wisata</option>
                        <option value="Lainya">Lainya</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Masukan deskripsi" class="form-control"><?=$d['deskripsi'] ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="image">Foto</label>
                    <input type="file" name="image" class="form-control" id="image">
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