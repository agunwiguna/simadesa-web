<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url('src/general/img/favicon.ico') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/edb6b6f0af.js" crossorigin="anonymous"></script>
    <!-- Roboto Font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Overide CSS -->
    <link rel="stylesheet" href="<?= base_url('src/general/css/style.css') ?>">
    <title><?= $title ?> | Babakan Asem</title>

</head>

<body id="page-top">
    <section id="#main" class="main-content h-100">
        <div class="bg-parent-primary">
            <div class="bg-primary-img" style="background-image: url('<?= base_url('src/general/img/main-bg.png') ?>')"></div>
        </div>
        <div class="container">
            <div class="auth-nav row container">
                <div class="col-12">
                    <div class="float-right">
                        <div class="py-2"><a href="#" class="btn btn-primary btn-sm btn-main"><i class="fas fa-sign-in-alt"></i> Masuk</a></div>
                    </div>
                </div>
            </div>
            <div class="row h-100 align-items-center main-row">
                <div class="col-12">
                    <nav class="navbar navbar-dark navbar-expand-md main-nav text-center text-md-left justify-content-center">
                        <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target=".dual-nav">
                            <span class="navbar-toggler-icon" style="background-image: url('<?= base_url('src/general/img/logo-white.png') ?>')!important;"></span>
                        </button>
                        <div class="navbar-collapse collapse dual-nav order-2 order-md-1 justify-content-end first-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#page-top">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">TENTANG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#structure">STRUKTUR</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#page-top" class="navbar-brand mx-auto order-0 order-md-2 p-5 d-none d-sm-block">
                            <div class="bg-main-logo">
                                <img class="main-logo" src="<?= base_url('src/general/img/logo-white.png') ?>" alt="">
                            </div>
                        </a>
                        <div class="navbar-collapse collapse dual-nav order-3 order-md-3 second-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#service">LAYANAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#news">BERITA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">KONTAK</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-main sticky-top stick-nav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <div class="navbar-img">
                    <img src="<?= base_url('src/general/img/logo-2-white.png') ?>" height="50"
                        class="d-inline-block align-top" alt="">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#page-top">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">TENTANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#structure">STRUKTUR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">LAYANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">KONTAK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-primary btn-sticky-main" href="<?= site_url('login') ?>"><i class="fas fa-sign-in-alt"></i> MASUK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>