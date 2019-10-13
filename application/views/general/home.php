<section id="about" class="content">
    <div class="container">
        <div class="row grid-divider">
            <div class="col-md-6">
                <h2 class="title-main mb-4">TENTANG KAMI</h4>
                <p class="desc-main text-justify">Desa Babakan Asem termasuk salah satu desa yang berada di Kecamatan Conggeang. Posisinya berada di sebelah tenggara Kecamatan Conggeang dan berbatasan langsung dengan Kecamatan Tomo dan Kecamatan Ujungjaya. Desa Babakan Asem memiliki status sebagai pedesaan dengan klasifikasi desa swakarsa. Desa Babakan Asem pada awalnya termasuk wilayah Desa Bongkok dan Desa Conggeang seperti Kampung Babakan Asem, Naringgul, Cisalak (Jolok) dan Cikaro (Taman) itu termasuk ke dalam wilayah hukum Desa Bongkok kemudian Kampung Combong (Neglasari), Peueung, Kendal dan Tagog (Banasbanten). Nama Desa Babakan Asem sendiri berasal dari satu kampung atau babakan dan ada pohon asem yang besar, maka diberi nama Desa Babakan Asem. Babakan Asem juga merupakan singkatan dari Bareng Bakti Negara Anu Sempurna. Sementara moto Desa Babakan Asem adalah "Ayem Tengtrem Kerta Raharja".</p>
            </div>
            <div class="col-md-6">
                <div class="bg-about-img" style="background-image: url('<?= base_url('src/general/img/main-bg.png') ?>')"></div>
            </div>
        </div>
    </div>
</section>
<section id="vision_mission" class="content">
    <div class="container">
        <div class="row grid-divider">
            <div class="col-md-6">
                <h2 class="sub-title text-center">VISI</h4>
                <p class="text-center">Berdasarkan kondisi Desa Babakan Asem Kecamatan Conggeang Kabupaten Sumedang saat ini, tantangan yang dihadapi dalam 5 (lima) tahun mendatang dengan memperhitungkan modal dasar yang dimiliki oleh Desa Babakan Asem dan amanat pembangunan yang tercantum dalam Pembukaan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, Visi dalam RPJM Nasional dan RPJMD Provinsi Jawa Barat maka visi pembangunan desa Babakan Asem tahun 2012-2017 adalah : “Desa Babakan Asem yang Cerdas, Berbudaya serta Sejahtera”.</p>
            </div>
            <div class="col-md-6">
                <h2 class="sub-title text-center">MISI</h4>
                <p class="text-center">Visi pembangunan Desa Babakan Asem ke depan diharapkan mampu mewujudkan kebutuhan dan amanat masyarakat dengan tetap mengacu pada maksud otonomi daerah dalam UU Nomor 32 Tahun 2004 tentang Pemerintahan Daerah yaitu daerah yang mempunyai kemandirian, daya saing dan mampu memberikan pelayanan publik dalam rangka pencapaian tujuan nasional. Visi pembangunan harus dapat diukur untuk mengetahui tingkat berbudaya dan kesejahteraan yang ingin dicapai. “Cerdas” mengandung masyarakat desa Babakan Asem untuk tingkat pendidikan sudah mulai naik dengan rata-rata minimal SLTP. “Berbudaya” mengandung maksud masyarakat yang berakhlak mulia, bermoral, beretika, berbudaya dan beradab serta mandiri berdasarkan falsafah Pancasila. “Kesejahteraan” terdiri dari dan mengandung maksud Kemajuan Desa, keadalian dan kemakmuran.</p>
            </div>
        </div>
    </div>
</section>
<?php if(!empty($perangkatDesa)) : ?>
<section id="structure" class="content">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="sub-title text-center">STRUKTUR INSTANSI</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($perangkatDesa as $perangkatDesaMany) : ?>
            <div class="col-6 col-md-3 mb-3">
                <div class="bg-avatar">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="bg-structure-img" style="background-image: url('<?= base_url('src/perangkat_desa/'.$perangkatDesaMany['foto']) ?>')"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="sub-title text-center"><?= $perangkatDesaMany['jabatan'] ?></h5>
                            <p class="text-center"><?= $perangkatDesaMany['nama'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty($infoBerita)) : ?>
<section id="news" class="content">
    <div class="container">
        <div class="row mb-4 grid-divider">
            <div class="col-12">
                <h1 class="text-center sub-title">BERITA</h1>
            </div>
        </div>
        <div class="row grid-divider">
            <div class="col-md-6">
                <a class="text-decoration-none" href="#">
                    <div class="bg-news-featured">
                        <div class="row">
                            <div class="col-12">
                                <div class="bg-news-img" style="background-image: url('<?= base_url('src/info_desa/'.$infoHotBerita['image']) ?>')"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="bg-news-caption">
                                    <h4 class="sub-title"><?= $infoHotBerita['judul'] ?></h4>
                                    <span class="date-news"><?= $infoHotBerita['created_at'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="bg-news-small-featured">
                    <div class="row">
                        <?php foreach ($infoBerita as $infoBeritaMany) : ?>
                        <div class="col-12">
                            <a class="text-decoration-none" href="#">
                                <div class="bg-news-small-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bg-news-small-img" style="background-image: url('<?= base_url('src/info_desa/'.$infoBeritaMany['image']) ?>')"></div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="sub-title"><?= $infoBeritaMany['judul'] ?></h4>
                                            <span class="date-news"><?= $infoBeritaMany['created_at'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif ?>