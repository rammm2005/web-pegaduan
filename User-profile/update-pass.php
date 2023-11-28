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
    <title>Update Password</title>
</head>

<body>

    <?php

if (isset($_POST['update_pass'])) {

   $get = $con->prepare("SELECT password FROM masyarakat WHERE nik = ?");
   $get->bind_param('i', $_SESSION['nik']);
   $get->execute();
   $get->store_result();
   if ($get->num_rows() > 0) {

      $get->bind_result($password);
      $get->fetch();

      $pass1 = mysqli_real_escape_string($con, $_POST['lama']);
      $pass2 = password_hash(mysqli_real_escape_string($con,$_POST['baru']), PASSWORD_BCRYPT, ['cost' => 10]);

      if(password_verify($pass1, $password)) {

         $get = $con->prepare("UPDATE masyarakat SET password = ? WHERE nik = ?");
         $get->bind_param('si', $pass2, $_SESSION['nik']);
         $get->execute();

         echo '<script type="text/javascript">window.location.replace("../User-asset/include/logout.php");</script>';

      } else {

         echo '<script type="text/javascript">alert("Akses Illegal");window.location.replace("../User-asset/include/logout.php");</script>';

      }

   } else {

      echo '<script type="text/javascript">alert("Akses Illegal");window.location.replace("../User-asset/include/logout.php");</script>';

   }

}
?>


    <div class="main-content">
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
            style="min-height: 300px; background-image: url(img/placeholder.jpg); background-size: cover; background-position: center;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello <?= $_SESSION['nik']?></h1>
                        <p class="text-white mt-0 mb-5">Update Password bisa di gunakan oleh kamu saja agar menambah
                            keamanan Akun Anda . Privacy Aman Di Kami</p>
                    </div>
                    <div class="col-md-12">
                        <a href="profile.php?&id=<?= $_SESSION['nik'] ?>" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i> Kembali</a>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Password Update</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="reset" class="btn btn-sm btn-primary" onClick="reset()"><i
                                    class="fa fa-circle"></i> Reset</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post" id="myForm">
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Password Lama</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-alternative"
                                                name="lama" placeholder="Password Lama" required="Password" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Password Baru</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-alternative"
                                                name="baru" placeholder="Password Baru" required="Password" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-3">
                                            <p class="help-text" style="color:#666464;">
                                                Anda harus login ulang saat password berhasil diupdate
                                            </p>
                                            <button type="submit" name="update_pass" class="btn btn-info"
                                                value="Update Password">
                                                Update Password
                                            </button>
                                            <!-- <button type="reset" class="btn btn-reset">
                                                Reset
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>





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