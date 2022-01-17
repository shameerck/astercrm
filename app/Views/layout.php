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
    <link href="<?= base_url('/plugins/bootstrap-range-Slider/bootstrap-slider.css') ?>" rel="stylesheet" type="text/css">
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

                            <ul class="list-unstyled menu-categories" id="topAccordion">

                                <li class="menu single-menu">
                                    <a href="<?= base_url('/dashboard') ?>" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>

                                            <span>Dashboard</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>

                                </li>
                                
                                <li class="menu single-menu">
                        <a href="#dashboard" data-toggle="collapse" class="dropdown-toggle autodroprown">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Beneficiaries</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                            <li class="active">
                                <a href="<?= base_url('/orders') ?>"> Orders </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/beneficiaries') ?>"> Beneficiaries </a>
                            </li>
                            <li>
                                <a href="<?= base_url('/customers') ?>"> Customers </a>
                            </li>
                        </ul>
                    </li>
                                
                                
                                
                                
                                <li class="menu single-menu">
                                    <a href="<?= base_url('/visits') ?>" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                            <span>Visits</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>

                                </li>


                                <li class="menu single-menu">
                                    <a href="<?= base_url('/notifications') ?>" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>

                                            <span>Notifications</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>

                                </li>

<li class="menu single-menu">
                                    <a href="<?= base_url('/settings') ?>" class="dropdown-toggle">
                                        <div class="">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>

                                            <span>Settings</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>

                                </li>


                            </ul>
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
                                        <h5><?= $email ?></h5>
                                        <p>Admin</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <a href="logout">
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