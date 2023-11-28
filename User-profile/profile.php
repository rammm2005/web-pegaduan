
<?php
include '../User-asset/include/koneksi.php';

session_start();
if(!isset($_SESSION['nik']) && $_SESSION['nik']!='masyarakat'){
header("location:../sign-in/login.php");
}else{



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="../User-asset/Asset/img/logo-icon.png" sizes="16x16">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
<script src="../admin-Page/Asset/sweetalert/sweetalert.min.js"></script>


    <title>Profile</title>
</head>

<body>

<?php
include '../User-asset/include/koneksi.php';

$id  = $_GET['id'];
$query = mysqli_query($con,"SELECT * FROM masyarakat WHERE nik=$id");
$data = mysqli_fetch_array($query);
?>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 300px; background-image: url(img/placeholder.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?= $data['nama']?></h1>
            <p class="text-white mt-0 mb-5">Ini merupakan profile page kamu , harap lengkapi data yang tidak valid dan hanya bisa di akses oleh anda saja ! . Privacy Aman Di Kami</p>
          </div>
          <div class="col-md-12">
        <a href="../home.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../User-asset/Asset/img/user-profile.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">

              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">
                        
                      <?php
                            include '../User-asset/include/koneksi.php';
                              $itemCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `pengaduan` WHERE nik='". $_SESSION['nik']."'"));
                              echo''.$itemCount.'';
                              
                ?>
                      </span>
                      <span class="description">Laporan</span>
                    </div>
                    <div>
                      <span class="heading">
                      <?php
                            include '../User-asset/include/koneksi.php';
                            

                              $itemCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `pengaduan` WHERE  status='".$_SESSION['nik']."'"));
                              echo''.$itemCount.' <i class="fa fa-check" style="color:green; font-size:small;"></i>';
                              
                ?>
                      </span>
                      <span class="description">Done</span>
                    </div>
                    <div>
                      <span class="heading"> <?php
                            include '../User-asset/include/koneksi.php';
                            

                              $itemCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `masyarakat` WHERE  nik='".$_SESSION['nik']."'"));
                              echo''.$itemCount.'';
                              
                ?></span>
                      <span class="description">Account</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                 <?= $data['username'] ?><span class="font-weight-light"></span>
                </h3>

                <p class="text-gray mt-0 mb-5">Login pada : <?= $_SESSION = date("d-m-Y") ?></p>
              <a href="update-pass.php?&id=<?= $data['nik'] ?>" class="text-muted mb-4 bold"  onclick="return confirm('Anda akan memasuki Secret site?');">Change Password ? , Click Here !</a>
               

            
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><?= $data['nama'] ?> account</h3>
                </div>
                <div class="col-4 text-right">
                  <button type="reset" class="btn btn-sm btn-primary" onClick="reset()"><i class="fa fa-circle"></i> Reset</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="" id="myForm">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nik</label>
                        <input type="text" readonly style="cursor:not-allowed;" id="input-username" required class="form-control form-control-alternative" name="nik" placeholder="Username" value="<?= $data['nik'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Nama Lengkap</label>
                        <input type="text" id="input-email" class="form-control form-control-alternative" required name="username" value="<?= $data['username'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Nama Panggilan</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" required placeholder="First name" name="nama" value="<?= $data['nama']?>">
                      </div>
                    </div>
                    
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-pass">Telphone</label>
                        <input id="input-pass" class="form-control form-control-alternative" placeholder="Phone Number" required name="telp"  value="<?= $data['telp'] ?>" type="password">
                      </div>
                    </div>
                  </div>
                    
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
            <button type="submit" name="update" class="btn btn-info"><i class="fa fa-wrench"></i> Update profile</button>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
include '../User-asset/include/koneksi.php';

  if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    // $password = password_hash(mysqli_real_escape_string($con,$_POST['password']), PASSWORD_BCRYPT, ['cost' => 10]);
    $telp = $_POST['telp'];

    $update = mysqli_query($con, 'UPDATE masyarakat SET nama="'.$nama.'", username="'.$username.'" ,telp="'.$telp.'" WHERE nik="'.$nik.'"');
    if ($update){
        echo '
        <script>
        swal({
          title: "Success!",
          text: "Data masyarakat Berhasil Di Update!",
          icon: "success",
          button:"Okey",
          
        });
        window.location="profile.php?&id='.$data['nik'].'";
        </script>
          ';
    }
  }
?>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Made with <a href="#" target="_blank">Rama Dev</a> by Creative Tim</p>
        </div>
      </div>
    </div>
  </footer>

  
<script>  
 function reset(){  
   document.getElementById("myForm").reset();  
 }   
</script>  


</body>
</html>


<?php

}
?>