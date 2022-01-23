<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>CRM Services | Aster - Multipurpose CRM Dashboard </title>
        <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/favicon.ico') ?>"/>
        <link href="<?= base_url('/assets/css/loader.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?= base_url('/assets/js/loader.js') ?>"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('/assets/css/plugins.css') ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="<?= base_url('/assets/js/libs/jquery-3.1.1.min.js') ?>"></script>
        <script src="<?= base_url('/bootstrap/js/popper.min.js') ?>"></script>
        <script src="<?= base_url('/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
        <script src="<?= base_url('/assets/js/app.js') ?>"></script>
        <script src="<?= base_url('/plugins/flatpickr/flatpickr.js') ?>"></script>
        <link href="<?= base_url('/plugins/noUiSlider/nouislider.min.css') ?>" rel="stylesheet" type="text/css">

        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="<?= base_url('/assets/css/scrollspyNav.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('/plugins/flatpickr/custom-flatpickr.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('/plugins/noUiSlider/custom-nouiSlider.css') ?>" rel="stylesheet" type="text/css">
        
        <!--  END CUSTOM STYLE FILE  -->

        <link rel="stylesheet" type="text/css" href="<?= base_url('/plugins/editors/quill/quill.snow.css') ?>"> 
        <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/elements/alert.css') ?>">


        <script>
            $(document).ready(function () {
                App.init();
            });
        </script>
        <script src="<?= base_url('/assets/js/custom.js') ?>"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="<?= base_url('/plugins/apex/apexcharts.min.js') ?>"></script>
        <script src="<?= base_url('/assets/js/dashboard/dash_1.js') ?>"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="<?= base_url('/plugins/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('/assets/css/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
        <style class="dark-theme">
            #chart-2 path {
                stroke: #0e1726;
            }
        </style>

        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    </head>
    <body class="alt-menu sidebar-noneoverflow">
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div></div></div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        <div class="header-container">
            <header class="header navbar navbar-expand-sm">

                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

                <div class="nav-logo align-self-center">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img alt="logo" src="<?= base_url('/assets/img/crm.png') ?>"> 
                        <span class="navbar-brand-name">Aster CRM</span></a>
                </div>

                <ul class="navbar-item topbar-navigation">

                    <!--  BEGIN TOPBAR  -->
                    <div class="topbar-nav header navbar" role="banner">
                        <nav id="topbar">
                            <ul class="navbar-nav theme-brand flex-row  text-center">
                                <li class="nav-item theme-logo">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url('/assets/img/logo90.png') ?>" class="navbar-logo" alt="logo">
                                    </a>
                                </li>
                                <li class="nav-item theme-text">
                                    <a href="<?= base_url() ?>" class="nav-link"> Aster CRM </a>
                                </li>
                            </ul>

                            <?= $_SESSION['usermenu']; ?>
                        </nav>
                    </div>
                    <!--  END TOPBAR  -->

                </ul>

                <ul class="navbar-item flex-row ml-auto">

                </ul>

                <ul class="navbar-item flex-row nav-dropdowns">


                    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <img src="<?= base_url('/assets/img/user.png') ?>" class="img-fluid" alt="admin-profile">
                            </div>
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="user-profile-section">
                                <div class="media mx-auto">
                                    <div class="media-body">
                                        <h5><?= $_SESSION["email"] ?></h5>
                                        <p><?= $_SESSION["role"] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <a href="<?= base_url('/logout') ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                                </a>
                            </div>
                        </div>

                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->


        <?= $this->renderSection('content') ?>


        <!-- END MAIN CONTAINER -->



    </body>
</html>