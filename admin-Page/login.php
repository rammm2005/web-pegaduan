<?php

session_start();
if(isset($_SESSION['sesion']) && $_SESSION['sesion']=='petugas'){
header("location:dashboard.php");
}else{
    include('koneksi.php');
?>



  







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Admin</title>

    <!-- Custom fonts for this template-->

    <link href="Asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="Asset/img/kominfo.jpg" type="image/x-icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" maxLength="35" required aria-describedby="emailHelp"
                                                placeholder="Enter Username Admin...">
                                        </div>
                                        <p></p>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" maxLength="35" required placeholder="Password Secreat Admin">
                                        </div>
                                        <p></p>
                                        <div class="form-group ">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="rememberme" id="customCheck">
                                                <label class="custom-control-label" name="rememberme" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <p></p>
                                        <button class="btn btn-primary btn-user btn-block" name="submit" type="submit">
                                            <i class="fa fas-bold fa-lock"></i>  Login
                                        </button>
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <span class="small" >Dont Have Any Account?</span>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="ditarama985@gmail.com">Contact Our Email!  <i class="fa fa-envelope" style="color:black;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="Asset/vendor/jquery/jquery.min.js"></script>
    <script src="Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core pluAsset/gin JavaScript-->
    <script src="Asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom sAsset/cripts for all pages-->
    <script src="Asset/js/sb-admin-2.min.js"></script>

<script src="Asset/sweetalert/sweetalert.min.js"></script>





<?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='". $username."' AND password='".$password."' LIMIT 1");
    $data = mysqli_fetch_array($login);


if($login->num_rows > 0){
    $_SESSION['sesion'] = 'petugas';
    $_SESSION['id_petugas'] = $data['id_petugas'];
	
   
    // if(isset($_POST['rememberme'])){
	// 	setcookie($username = $_POST['username'],time() + (60*60*24));
	// 	setcookie($password = $_POST['password'],time() + (60*60*24));
    // }
echo'
    <script>
    swal({
      title: "Success!",
      text: "Berhasil masuk ke Halaman Admin !",
      icon: "success",
      button:"GO",
    });
    window.location.href="dashboard.php";
    </script>
	';


}else{
    echo' <script>
    swal({
      title: "Sorry!",
      text: "Invalid Password atau Username !",
      icon: "warning",
      button:"OK",
    });
    </script>
    ';

         }
    }
    ?>
        </body>

</html>
    <?php
}
    ?>

