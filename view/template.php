<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../public/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../public/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../public/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../public/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../public/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../public/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../public/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../public/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../public/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../public/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../public/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../public/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../public/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../public/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="../public/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="../public/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="../public/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="../public/css/examples.css" rel="stylesheet">
    <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
    <link href="../public/css/ads.css" rel="stylesheet">
    <script src="../public/js/config.js"></script>
    <script src="../public/js/color-modes.js"></script>
    <link href="../public/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>

    <!-- menu -->
    <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
        <?php require 'menu.php'; ?>
    </div>

    <div class="wrapper d-flex flex-column min-vh-100">
        <header class="header header-sticky p-0 mb-4">
            <div class="container-fluid border-bottom px-4">
                <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
                    <svg class="icon icon-lg">
                        <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                <ul class="header-nav d-none d-lg-flex">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                </ul>
                <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                            </svg></a></li>
                </ul>
                <ul class="header-nav">
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                            <svg class="icon icon-lg theme-icon-active">
                                <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
                                    </svg>Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="../public/assets/img/avatars/8.jpg" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                                </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                                </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                            <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                                <div class="fw-semibold">Settings</div>
                            </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg> Lock Account</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="../public/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container-fluid px-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><span>Dashboard</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row mb-4">
                    <div class="col-xl-5 col-xxl-4 mb-4 mb-xl-0">
                        <script id="_carbonads_js" async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CEAICKJY&amp;placement=coreuiio"></script>
                    </div>
                    <div class="col-xl-7 col-xxl-8"><a class="banner-coreui-pro" href="https://coreui.io/product/bootstrap-dashboard-template/?theme=default">
                            <svg class="banner-coreui-pro-logo d-xl-none d-xxl-block" width="100" height="100" alt="CoreUI Logo">
                                <use xlink:href="assets/brand/coreui.svg#signet"></use>
                            </svg>
                            <h4 class="fw-bolder">Elevate Your Design with CoreUI PRO!</h4>
                            <p>Unlock a world of possibilities: More themes, enhanced components (Date Picker, Multi Select, and more), and priority support.</p>
                        </a></div>
                </div>

            </div>
        </div>
        <footer class="footer px-4">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> © 2024 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="../public/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../public/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="../public/vendors/chart.js/js/chart.umd.js"></script>
    <script src="../public/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../public/vendors/@coreui/utils/js/index.js"></script>
    <script src="../public/js/main.js"></script>
    <script src="../public/js/index.js"></script>
    <script>
    </script>

</body>

</html>