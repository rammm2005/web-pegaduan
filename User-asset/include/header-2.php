<?php  

include 'User-asset/include/koneksi.php';
 
  session_start();

  if(isset($_SESSION['nik'])){
     $nik = $_SESSION['nik'];
  }else{
     $nik = '';
  };

  
?>



<header>
  <div class="menu">
    <span class="bar"></span>
  </div>
  <nav>
    <div class="nav-container">
      <div class="logo">
      <a href="home.php"> <img src="User-asset/Asset/img/logo-kemendagri.png" alt="kemendagri"></a> 
      </div>
      <ul>
        <li><a href="about-laporan.php">Tentang Laporan !</a></li>
        <li><a href="Laporan/index.php">Statistik</a></li>
        <?php
        $tampil = mysqli_query($con , "SELECT * FROM masyarakat WHERE nik='".$nik."'");
        $data = mysqli_fetch_array($tampil);
if($data != ''){?>
  <li><a href="User-profile/profile.php?&id=<?= $_SESSION['nik']?>"> <i class="fa fa-user-secret"></i> <?= $data['nama'] ?></a></li>
  <li><a href="User-asset/include/logout.php"><img src="User-asset/Asset/img/sign-out.png" alt="" width="30"></a></li>
  <?php
}else{?>
      <li><a href="sign-in/login.php" class="btn-loging"> <i class="fa fa-user-secret"></i> Daftar</a></li>


<?php
}
?>

  </ul>
    </div>
  </nav>
 
</header>


