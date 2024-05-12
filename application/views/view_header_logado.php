<!DOCTYPE html>
<html style="font-size: 16px;" lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elo Startup - <?php echo $title ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" media="screen">
    <link rel="stylesheet" href="<?php echo base_url($css) ?>" media="screen">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Script -->
    <script class="u-script" type="text/javascript" src="<?php echo base_url("assets/js/script.js") ?>" defer=""></script>
    <!-- Fonts -->
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
</head>

<header class="u-clearfix u-custom-color-3 u-header u-sticky u-sticky-3daa u-header" id="sec-74b9">
    <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-align-right u-menu u-menu-one-level u-offcanvas u-menu-1">
            <div class="menu-collapse u-custom-font" style="font-size: 1rem; font-family: Poppins;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                    </svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <rect y="1" width="16" height="2"></rect>
                            <rect y="7" width="16" height="2"></rect>
                            <rect y="13" width="16" height="2"></rect>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-custom-font u-nav u-spacing-20 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-5-light-3 u-text-body-alt-color u-text-hover-grey-15" href="<?php echo base_url() ?>" style="padding: 18px 28px;">Home</a>
                    </li>
                    <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-5-light-3 u-text-body-alt-color u-text-hover-grey-15" href="<?php echo base_url("/desafios") ?>" style="padding: 18px 28px;">Desafios</a>
                    </li>
                    <li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-5-light-3 u-text-body-alt-color u-text-hover-grey-15" href="<?php echo base_url("/perfil") ?>" style="padding: 18px 28px;">Perfil</a>
                    </li>
                    <li class="u-nav-item"><button class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-5-light-3 u-text-body-alt-color u-text-hover-grey-15" onclick="deslogar()" style="padding: 18px 28px;">Deslogar</button>
                    </li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="<?php echo base_url("/desafios") ?>">Desafios</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="<?php echo base_url("/perfil") ?>">Perfil</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" onclick="deslogar()">Deslogar</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <a href="<?php echo base_url() ?>" class="u-align-left u-image u-logo u-image-1" data-image-width="824" data-image-height="369" title="Home">
            <img src="<?php echo base_url("/assets/images/Capturar31.PNG") ?>" class="u-logo-image u-logo-image-1">
        </a>
    </div>
</header>
<script src="<?php echo base_url('assets/js/header.js')?>"></script>