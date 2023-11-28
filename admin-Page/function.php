<?php

function menu()
{
    ?>


    <?php

    include("koneksi.php");

    $tampil = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='" . $_SESSION['id_petugas'] . "'");
    $data = mysqli_fetch_array($tampil);
    ?>




    <!-- ***** Preloader End ***** -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon ">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="Asset/img/kominfo.jpg" alt="Dashboard" class="img-profile rounded-circle" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup>M</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Collapse Menu -->
            <?php
            if ($data['level'] == 'admin') { ?>
                <!-- Nav Item - Dashboard -->

                <li <?php if (!isset($_GET['page'])) {
                    echo 'class="nav-item active"';
                } ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Level1
                </div>


                <!-- Nav Item - Pages Collapse Menu -->
                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'petugas') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugastambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugasedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugashapus') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=petugas">
                        <i class="fa fa-user-secret"></i>
                        <span>Petugas</span></a>
                </li>

                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'tanggapan') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapantambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanhapus') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanshow') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=tanggapan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Tanggapan</span></a>
                </li>



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Level2
                </div>


                <!-- Nav Item - Charts -->
                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'masyarakat') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'masyarakattambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'masyarakatedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'masyarakathapus') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link " href="dashboard.php?page=masyarakat">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Masyarakat</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'pengaduan') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'pengaduantambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'pengaduanedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'pengaduanhapus') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=pengaduan">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pengaduan</span></a>
                </li>

                <?php
            } else { ?>

                <li <?php if (!isset($_GET['page'])) {
                    echo 'class="nav-item active"';
                } ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Level1
                </div>


                <!-- Nav Item - Pages Collapse Menu -->
                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'petugas') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugastambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugasedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'petugashapus') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=petugas">
                        <i class="fa fa-user-secret"></i>

                        <span>Petugas</span></a>
                </li>

                <li <?php
                if (isset($_GET['page']) && $_GET['page'] == 'tanggapan') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapantambah') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanedit') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanhapus') {
                    echo 'class="nav-item active"';
                } else if (isset($_GET['page']) && $_GET['page'] == 'tanggapanshow') {
                    echo 'class="nav-item active"';

                }
                ?> class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=tanggapan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Tanggapan</span></a>
                </li>


                <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="Asset/img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="Asset/img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="Asset/img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2  d-lg-inline text-gray-600 small"
                                    style="color:black !important; font-weight:bold;">
                                    <?php echo $data['nama_petugas'] ?>
                                </span><span class="mr-2  d-lg-inline text-gray-600 small">( Role
                                    <?php echo $data['level'] ?> )
                                </span>
                                <td style="text-align:center; vertical-align:middle;">
                                    <?php if ($data['foto_petugas'] != '') { ?>
                                        <img src="Admin-img/<?= $data['foto_petugas']; ?>" class="img-profile rounded-circle"
                                            style="max-widht:15em;" width="200" alt="Foto petugas">
                                    <?php } else { ?>
                                        <img src="Asset/img/default.png" class="img-profile rounded-circle" width="150"
                                            style="align-items:center;" alt="No Foto Uploaded">
                                    <?php } ?>
                                </td>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a <?php if (isset($_GET['page']) && $_GET['page'] == 'profile') {
                                    echo 'class="dropdown-item active"';
                                } ?> class="dropdown-item"
                                    href="dashboard.php?page=profile&id=<?php echo $_SESSION['id_petugas'] ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a <?php if (isset($_GET['page']) && $_GET['page'] == 'resetpassword') {
                                    echo 'class="dropdown-item active"';
                                } ?> class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Reset Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <?php
}



function beranda()
{
    ?>


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Masyarakat Account</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
                                                include 'koneksi.php';

                                                $show = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                                                $data = mysqli_fetch_array($show);

                                                $itemCount = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `masyarakat`"));
                                                echo '' . $itemCount . '';

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah (Pengaduan)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">


                                                <?php
                                                include 'koneksi.php';

                                                $show = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                                                $data = mysqli_fetch_array($show);

                                                $itemCount = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `pengaduan`"));
                                                echo '' . $itemCount . '';

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                            include 'koneksi.php';
                                            $show = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='" . $_SESSION['id_petugas'] . "'");

                                            $data = mysqli_fetch_array($show);
                                            if ($data['level'] == 'petugas') { ?>


                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Role Petugas
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            } else { ?>

                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Role Admin
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pengaduan Reject</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
                                                include 'koneksi.php';

                                                $show = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status = 'tolak'");
                                                $data = mysqli_fetch_array($show);
                                                if ($data['status'] == 'tolak') {
                                                    $itemCount = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE status='" . $data['status'] . "'"));
                                                    echo '' . $itemCount . '';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Task Pengaduan Overview </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="Asset/vendor/chart.js/Chart.js"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var ctx = document.getElementById("myBarChart");

                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'action/chart-fetch-bar.php', true);
                            xhr.onload = function () {
                                if (xhr.status >= 200 && xhr.status < 300) {
                                    var responseData = JSON.parse(xhr.responseText);

                                    var statuses = ['tolak', 'belum proses', 'proses', 'selesai'];

                                    var dates = Object.keys(responseData[statuses[0]] || {});

                                    var datasets = statuses.map(status => ({
                                        label: status,
                                        data: dates.map(date => responseData[status][date] || 0),
                                        backgroundColor: "#4e73df",
                                        hoverBackgroundColor: "#2e59d9",
                                        borderColor: "#4e73df",
                                    }));

                                    var bar = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: dates,
                                            datasets: datasets
                                        },
                                        options: {
                                            scales: {
                                                x: {
                                                    type: 'category',
                                                    labels: dates,
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                } else {
                                    console.error('Failed to fetch data');
                                }
                            };
                            xhr.send();
                        });
                    </script>




                </div>
            </div>




        </div>
    </div>
    <!-- /.container-fluid -->




    <?php
}





function footer()
{
    ?>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; RamaDev 20223</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Leave this site all your session will end !</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancel</button>
                    <a class="btn btn-primary" href="logout.php"> <i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>