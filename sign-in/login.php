<?php

include '../User-asset/include/koneksi.php';

session_start();

if(isset($_SESSION['nik'])){
   $nik = $_SESSION['nik'];
   header('location:../Laporan/index.php');
   // header('location:../home.php');

}else{
   $nik = '';
}

if(isset($_POST['register'])){

   $nik = $_POST['nik'];
   $nama = $_POST['nama'];
   $username = $_POST['username'];
   $telp = $_POST['telp'];
   // $password = md5($_POST['password']);
   $password = password_hash(mysqli_real_escape_string($con,$_POST['password']), PASSWORD_BCRYPT, ['cost' => 10]);

   // $cpassword = $_POST['cpassword'];
   // $cpassword = password_hash(mysqli_real_escape_string($con,$_POST['cpassword']), PASSWORD_BCRYPT, ['cost' => 10]);

   // $hashed_password = password_hash($cpassword , PASSWORD_DEFAULT);

   // var_dump($hashed_password);
   // exit();

   if($nik == null || $nama == null || $username == null || $telp == null || $password == null ){
      $message[] = 'Semua form harus di isi !';

   }else{

   $get_nik = $con->prepare("SELECT * FROM masyarakat WHERE nik = ?");
   $get_nik->bind_param('s', $nik);
   $get_nik->execute();
   $get_nik->store_result();
   $numb = $get_nik->num_rows();


   if($numb > 0){
      $message[] = 'Nik Sudah Terdaftar & Invalid !';

   }else{
      // if($password != $cpassword){
      //    $message[] = 'confirm password not matched !';
      // }else{
         $sql = $con->prepare("INSERT INTO masyarakat(nik, nama,username ,password,telp) VALUES(?, ?, ?, ? ,?)");
         $sql->bind_param('sssss', $nik ,$nama, $username,$password, $telp);
         $sql->execute();
            $message[] = ' Berhasil Register , Silahkan Login !';
  
            // header('location:../Laporan/index.php');
         }
      }
   }


   if(isset($_POST['login'])){
      
    $nik = $_POST['nik'];
    $pass = mysqli_real_escape_string($con , $_POST['password']);

    if ($nik == null || $pass == null) {

      $message[] = 'nik / Password tidak boleh kosong !';

   } else {
    $sql = $con->prepare("SELECT * FROM masyarakat WHERE nik = ?")or die($con->error);
    $sql->bind_param('s' , $nik);
    $sql->execute();
    $sql->store_result();
    $count = $sql->num_rows();
    $sql->bind_result($nik,$nama,$username,$password,$telp);
    $sql->fetch();


   //  var_dump($password);
   //  exit();
 
    if($count > 0){
      // var_dump($password , $pass);
      // exit();

      if (password_verify($pass,$password)){

          $_SESSION['nik']   = $nik;
         $_SESSION['user']  = $nama;

         header('location:../Laporan/index.php?&id="'.$_SESSION['nik'].'"');
         $message[] = 'Selamat , Login berhasil di lakukan !';


        } else {
         $message[] = 'Password Anda Salah !';
       
         }

      } else {

        $message[] = 'Nik tidak di kenali !';

      }

    }

   }
   

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/app.css" />
   <!-- <link rel="stylesheet" href="css/style.css" /> -->

  <link rel="icon" type="image/png" href="../User-asset/Asset/img/logo-icon.png" sizes="16x16">

   <title>Sign in & Sign up Form</title>
</head>

<body>

   <div class="container">
      <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
<div class="wraper-message">
         
         <span>'.$message.'</span>
         <i onclick="this.parentElement.remove();">&times;</i>
         </div>
      </div>
      ';
   }
}

?>

      <div class="forms-container">
         <div class="signin-signup">
            <form action="#" method="post" class="sign-in-form">
               <h2 class="title">Sign in</h2>
               <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" id="nik" class="form-control" name="nik" maxLength="16" placeholder="Nik Terdaftar" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="password"  class="form-control" name="password"  placeholder="Password" />
               </div>
               <input type="submit" name="login" value="Login" class="btn solid" />
               <p class="social-text">Or Sign in with social platforms</p>
               <div class="social-media">
                  <a href="#" class="social-icon">
                     <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="social-icon">
                     <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="social-icon">
                     <i class="fab fa-google"></i>
                  </a>
                  <a href="#" class="social-icon">
                     <i class="fab fa-linkedin-in"></i>
                  </a>
               </div>
            </form>
            <form action="#" method="post" name="register" class="sign-up-form">
               <h2 class="title">Sign up</h2>
               <div class="input-field">
                  <i class="fas fa-key"></i>
                  <input type="text" id="nik" name="nik"  class="form-control"  maxLength="16" required placeholder="Nik" />
               </div>
               <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" id="nama" name="nama"  class="form-control" maxLength="35" required placeholder="name" />
               </div>
               <div class="input-field">
                  <i class="fas fa-user-secret"></i>
                  <input type="text" name="username" id="username"  class="form-control"  maxLength="25" required placeholder="Username" />
               </div>
               <div class="input-field">
                  <i class="fas fa-phone"></i>
                  <input type="tel" name="telp" id="telp" required  class="form-control"  maxLength="14" placeholder="Telphone" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="password" name="password"  class="form-control" required placeholder="Password" />
               </div>
               <!-- <div class="input-field">
                  <i class="fas fa-unlock"></i>
                  <input type="password" id="cpassword" name="cpassword"  class="form-control" required placeholder="Repeat Password" />
               </div> -->
               <input type="submit" name="register" class="btn" value="Sign up" />
              
            </form>
         </div>
      </div>

      <div class="panels-container">
         <div class="panel left-panel">
            <div class="content">
               <h3>New here ?</h3>
               <p>
                 Register akun kalian disini dan bisa melakukan pengaduan dan hak istimewa lainnya ke website ini !
               </p>
               <button class="btn transparent" id="sign-up-btn">
                  Sign up
               </button>
            </div>
            <img src="img/log.svg" class="image" alt="" />
         </div>
         <div class="panel right-panel">
            <div class="content">
               <h3>One of us ?</h3>
               <p>
                  Sudah memiliki akun ? Login dan lakukan pengaduan dengan ketentuan tertentu !
               </p>
               <button class="btn transparent" id="sign-in-btn">
                  Sign in
               </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
         </div>
      </div>
   </div>

   <script src="js/app.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery.validate.min.js"></script>

   <script src="js/main.js"></script>
</body>

</html>