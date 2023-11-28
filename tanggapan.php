<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="User-asset/Asset/img/logo-icon.png" sizes="16x16">
  <link rel="stylesheet" href="User-asset/Asset/css/navbar.css">
  <link rel="stylesheet" href="User-asset/Asset/css/form.css">
  <link rel="stylesheet" href="User-asset/Asset/css/animate.min.css">
  <link rel="stylesheet" href="User-asset/Asset/css/aos.css">
  <link rel="stylesheet" href="User-asset/Asset/css/slider.css">
  <link rel="stylesheet" href="User-asset/Asset/css/swiper.min.css">


  <!-- FONT AWSOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
  <title>Tanggapan | Pengaduan</title>
</head>

<body>


  <?php
  include 'User-asset/include/koneksi.php';

  $id = $_GET['id'];
  $query = mysqli_query($con, "SELECT * FROM tanggapan JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_tanggapan=$id");

  while ($data = mysqli_fetch_array($query)) {
    ?>

    <section class="content">
      <a href="home.php" class="btn-back"> <i class="fa fa-arrow-left"></i> Kembali</a>
      <div class="inside">
        <div class="inside-content">
          <div class="img-show">
            <img src="admin-Page/upload/<?= $data['foto']; ?>" alt="<?= $data['foto'] ?>">
          </div>
          <div class="pengaduan-isi">

            <img src="User-asset/Asset/img/user-profile.jpg" alt="Foto User">
            <div class="tgl-pengaduan">
              <?php

              $date = $data['tgl_pengaduan'];
              $date_new = date("d F, Y (l)", strtotime($date));
              echo "<p>" . $date_new . "</p>";


              ?>
            </div>
            <textarea readonly name="" id=""><?= $data['isi_laporan'] ?></textarea>


          </div>
          <div class="laporan-isi">
            <?php
            if ($data['foto_petugas'] != '') { ?>

              <img src="admin-Page/Admin-img/<?= $data['foto_petugas'] ?>" alt="<?= $data['foto_petugas'] ?>">

              <?php
            } else { ?>

              <img src="User-asset/Asset/img/admin-noprofile.jpg" alt="Foto Petugas">

              <?php
            }
            ?>
            <div class="tgl-pengaduan">
              <?php

              $date = $data['tgl_tanggapan'];
              $date_new = date("d F, Y (l)", strtotime($date));
              echo "<p>" . $date_new . "</p>";


              ?>
            </div>
            <textarea name="" readonly id=""><?= $data['tanggapan'] ?></textarea>

          </div>

        </div>
      </div>


    </section>



    <?php
    include 'User-asset/include/footer-2.php';
    ?>


  </body>

  </html>

  <?php
  }
  ?>