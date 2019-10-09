<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script> 
<!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="<?=base_url('info')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tulis Info Desa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?=base_url('dashboard')?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?=base_url('info')?>">Info Desa</a></div>
                    <div class="breadcrumb-item">Tulis Info Desa</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tulis Info</h4>
                        </div>
                        <div class="card-body">
                        <form action="<?=base_url('info/simpan')?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                        </div> 
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea id="summernote" name="deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Upload Foto</label>
                                    <input type="file" name="image" id="image-upload" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
    <script src="<?=base_url()?>src/back/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?=base_url()?>src/back/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="<?=base_url()?>src/back/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?=base_url()?>src/back/assets/js/page/features-post-create.js"></script>
     <script type="text/javascript">
        $(document).ready(function(){

            $('#summernote').summernote({
                tabsize: 2,
                height: 300,
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImage(target[0].src);
                    }
                }
            });
 
            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('info/upload')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#summernote').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
 
            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('info/deletes')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 
        });
         
    </script> 