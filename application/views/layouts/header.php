<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=$title;?> &mdash; Simadesa</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>src/back/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>src/back/assets/css/components.css">
 <!--  <link rel="stylesheet" href="<?=base_url()?>src/back/assets/modules/summernote/summernote-bs4.css"> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
       
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>src/back/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama');?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
           <!--    <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Simadesa</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SD</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
                <a class="nav-link" href="<?=base_url('dashboard')?>">
                  <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
              </li> 
              <li class="menu-header">Master</li>
              <li class="<?=isset($active_menu_penduduk)?$active_menu_penduduk:'' ?>">
                <a class="nav-link" href="<?=base_url('penduduk')?>">
                  <i class="fas fa-users"></i><span>Data Penduduk</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_perangkat)?$active_menu_perangkat:'' ?>">
                <a class="nav-link" href="<?=base_url('perangkat_desa')?>">
                  <i class="fas fa-user-tie"></i><span>Perangkat Desa</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_info)?$active_menu_info:'' ?>">
                <a class="nav-link" href="<?=base_url('info')?>">
                  <i class="far fa-newspaper"></i><span>Info Desa</span>
                </a>
              </li>

              <!-- Layanan Desa -->
              <li class="menu-header">Layanan Desa</li>
              <li class="<?=isset($active_menu_kl)?$active_menu_kl:'' ?>">
                <a class="nav-link" href="<?=base_url('kategori_layanan')?>">
                  <i class="far fa-file-alt"></i><span>Kategori Layanan</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_ld)?$active_menu_ld:'' ?>">
                <a class="nav-link" href="<?=base_url('layanan')?>">
                  <i class="fas fa-file-alt"></i><span>Layanan Desa</span>
                </a>
              </li>

               <!-- Potensi Desa -->
              <li class="menu-header">Potensi Desa</li>
              <li class="<?=isset($active_menu_inv)?$active_menu_inv:'' ?>">
                <a class="nav-link" href="<?=base_url('investor')?>">
                  <i class="fas fa-comments-dollar"></i><span>Investor Desa</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_mitigasi)?$active_menu_mitigasi:'' ?>">
                <a class="nav-link" href="<?=base_url('mitigasi')?>">
                  <i class="fas fa-shield-alt"></i><span>Mitigasi Bencana</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_umkm)?$active_menu_umkm:'' ?>">
                <a class="nav-link" href="<?=base_url('umkm')?>">
                  <i class="fas fa-store"></i><span>Perekonomian Desa</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_potensi)?$active_menu_potensi:'' ?>">
                <a class="nav-link" href="<?=base_url('potensi')?>">
                  <i class="fas fa-map"></i><span>Potensi Desa</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_usulan)?$active_menu_usulan:'' ?>">
                <a class="nav-link" href="<?=base_url('usulan')?>">
                  <i class="fas fa-user-edit"></i><span>Usulan Warga</span>
                </a>
              </li>

              <li class="menu-header">Panic Button</li>
              <li class="<?=isset($active_menu_alat)?$active_menu_alat:'' ?>">
                <a class="nav-link" href="<?=base_url('data_alat')?>">
                  <i class="fas fa-tools"></i><span>Data Alat</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_registrasi)?$active_menu_registrasi:'' ?>">
                <a class="nav-link" href="<?=base_url('registrasi_alat')?>">
                  <i class="fas fa-toolbox"></i><span>Registrasi Alat</span>
                </a>
              </li>
              <li class="<?=isset($active_menu_news)?$active_menu_news:'' ?>">
                <a class="nav-link" href="<?=base_url('berita')?>">
                  <i class="fas fa-desktop"></i><span>Monitoring Warga</span>
                </a>
              </li>


            </ul>
        </aside>
      </div>

     
      
