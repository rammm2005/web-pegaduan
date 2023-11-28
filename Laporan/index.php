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
  <title>Pengaduan Masyarakat</title>
  <link rel="icon" type="image/png" href="../User-asset/Asset/img/logo-icon.png" sizes="16x16">

  <link rel="stylesheet" href="../User-asset/Asset/css/navbar.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/form.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/animate.min.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/aos.css">
  <link rel="stylesheet" href="upload-img.css">
  <!-- 
  <link rel="stylesheet" href="User-asset/Asset/css/bootstrap-select.css">
  <link rel="stylesheet" href="User-asset/Asset/css/bootstrap.css"> -->



  <!-- <link rel="stylesheet" href="admin-Page/Asset/bootstrap-select/css/bootstrap-select.css"> -->

  <!-- <link rel="stylesheet" href="admin-Page/Asset/bootstrap-select/css/bootstrap-select.css.map"> -->









  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
  <script src="../admin-Page/Asset/sweetalert/sweetalert.min.js"></script>


</head>

<body>
  <span class="loader" id="loading"></span>






  <?php
include '../User-asset/include/header.php';
?>



  <div class="main-text" data-aos="fade-left">
    <h1>Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
    <h3>Sampaikan laporan Anda langsung kepada instansi
      pemerintah berwenang</h3>
  </div>



  <div class="main-content">



    <div class="card-form-container">
      <div class="card-form" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-left-head">Sampaikan Pengaduan Anda</h1>
        <h2 class="info">Simak Cara melakukan Pengaduan yang baik dan benar <button id="open">?</button> </h2>



        <form method="POST" action="#" enctype="multipart/form-data" name="submit">
          <input type="text" placeholder="Nik *" readonly value="<?= $data['nik'] ?>" required id="nik" required
            name="nik" style="cursor:not-allowed;">



          <textarea id="isi_laporan" cols="10" class="form-control" placeholder="Pengaduan dan Laporan Anda*"
            name="isi_laporan" rows="10" required></textarea>
          <input type="date" id="tgl_pengaduan" name="tgl_pengaduan" value="" placeholder="Tanggala Kejadian" required>
          <hr style="border:1px solid hsl(0, 4%, 82%); margin-bottom: 2em; ">
          <!-- <input type="file" id="foto" required name="foto"> -->
          <div class="form-group">
            <div class="file-upload">
              <button class="btn-upload">
                <span class="text-browse">Browse..</span>
                <span class="text-file-name">No file selected</span>
              </button>
              <i class="fa fa-camera i-pic-upload"></i>
              <i class="i-deselect"></i>
              <input type="file" class="form-control d-none" required name="foto" id="foto">
            </div>
          </div>
          <hr style="border:1px solid hsl(0, 4%, 82%); margin-bottom: 2em; margin-top:2em;">

            <input type="hidden" id="status" name="status" required value="0">
            <!-- <input type="text" id="expiration-date"  placeholder="NIK *" name="nik" required> -->



            <div class="form-group">
              <button type="submit" name="tambah_pengaduan" class="btn-primary">
                <div class="fa fa-arrow-right"></div> Submit
              </button>
              <button type="reset" class="btn-reset" id="reset"> <i class="fa fa-arrows-rotate"></i> Reset</button>
            </div>
        </form>
      </div>
    </div>
    <?php

if(isset($_POST['tambah_pengaduan'])) {

    $nik  = $_POST['nik'];
    $isi_laporan = $_POST['isi_laporan'];
    $isi_laporan = filter_var($isi_laporan, FILTER_SANITIZE_STRING);


    $tgl_pengaduan   = $_POST['tgl_pengaduan'];
    $status  = $_POST['status'];
    $foto = $_FILES['foto'];
    $foto_nama = $_FILES['foto']['name'];
//    $foto = filter_var($foto, FILTER_SANITIZE_STRING);
   $foto_size = $_FILES['foto']['size'];
   $foto_tmp_name = $_FILES['foto']['tmp_name'];

    //cek nik

    //validasi
    if($nik == '' || $isi_laporan == '' || $tgl_pengaduan == '' || $status == '' || $foto == '') {
 
         // }
echo'
<script>
swal({
  title: "Success!",
  text: "Form Tidak boleh kosong !",
  icon: "warning",
  button:"GO",
});
window.location.href="dashboard.php";
</script>
';

 
   
 
    } else if($foto_size > 9044090){
 
      $message[] = 'Foto melebihi format yang di tentukan (5mb MAX) !';
 
    } else {
        move_uploaded_file( $foto_tmp_name,'../admin-Page/upload/'.$foto_nama);
        
       $sql = $con->prepare("INSERT INTO pengaduan(nik, isi_laporan, status, tgl_pengaduan,foto) VALUES(?, ?, ?, ?,? )");
       $sql->bind_param('sssss', $nik, $isi_laporan, $status, $tgl_pengaduan,$foto_nama);
       $sql->execute();
           // }
echo'
<script>
swal({
  title: "Success!",
  text: "Berhasil membuat pengaduan !",
  icon: "success",
  button:"GO",
});
</script>
';


 
    }
 
 }

?>

  </div>


  </div>


  <?php
    $show = mysqli_query($con, "SELECT * FROM pengaduan WHERE nik='". $_SESSION['nik']."' LIMIT 1");
    $data = mysqli_fetch_array($show);

if($show -> num_rows > 0){?>
  <div class="edit-pengaduan">
    <a href="edit-laporan-user.php?&id=<?= $_SESSION['nik']?>"> <img
        src="../User-asset/Asset/img/edit-pengaduan-icon.png" alt=""> </a>
  </div>
  <?php
}else{?>
  <div class="edit-pengaduan" style="display:none !important;">

  </div>


  <?php

}
?>




  <section class="footer" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="footer-onkir">
      <div class="back-onkir">
        <img src="../User-asset/Asset/img/edit-new-icon-22.png" alt="">
        <div class="progres"></div>
        <div class="text-footer">
          <h3>Pengisian Pengaduan</h3>
          <p>Proses pertama adalah pengisian pengaduan atau laporan diatas*</p>
        </div>
      </div>
      <div class="back-onkir">
        <img src="../User-asset/Asset/img/58-582730_right-arrow-jump-to-arrow-icon-hd-png.png" alt="">

        <div class="text-footer">
          <h3>Verifikasi Laporan </h3>
          <p>Pihak berwenang akan memverifikasi laporan anda sesua dengan ketentuan yang berlaku.</p>
        </div>
      </div>
      <div class="back-onkir">
        <img src="../User-asset/Asset/img/158476-bubble-chat-icon-free-hd-image.png" alt="">

        <div class="text-footer">
          <h3>Tindak Lanjut</h3>
          <p>Proses akan di lakukan minimal 3 hari seteelah laporan anda di terima dan di verifikasi dengan benar.</p>
        </div>
      </div>
      <div class="back-onkir">
        <img src="../User-asset/Asset/img/tanggapan.jpg" alt="">
        <div class="text-footer">
          <h3>Pemberian Tanggapan</h3>
          <p>Pememberian tanggapan akan di lakukan dan anda juga dapat memberikan tanggapan terhadap laporan.</p>
        </div>
      </div>
      <div class="back-onkir">
        <img src="../User-asset/Asset/img/done.png" alt="">
        <div class="text-footer">
          <h3>Selesai </h3>
          <p>Laporan akan terus di lanjutkan hingga laporan anda di nyatakan (Selesai).</p>
        </div>
      </div>
    </div>
  </section>


  <div class="count-pengaduan" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="item-pengaduan">
      <h3>Jumlah Laporan Pengaduan Saat Ini</h3>
      <?php
     include '../User-asset/include/koneksi.php';


      $show = mysqli_query($con,"SELECT * FROM pengaduan");
      $data = mysqli_fetch_array($show);
    
      $itemCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `pengaduan`"));
      echo'<p id="counter">'.$itemCount.'</p>';

      ?>
    </div>
  </div>




  <?php
    include '../User-asset/include/footer.php'
?>





  <script src="../User-asset/Asset/js/jquery-3.6.3.js"></script>


<script src="upload-sc.js"></script>
  <script src="../sign-in/js/jquery.validate.min.js"></script>



<script>
  
$('#counter').each(function() {

  $(this).prop('counter', 0).animate({

    counter: $(this).text()

  }, {

    duration: 4000,

    easing: 'swing',

    step: function(now) {

      $(this).text(Math.ceil(now));
    }
  });
});
</script>
  <!-- <script>
    var auto_refresh = setInterval(
      function () {
        $('#counter');
      },
      1000
    );
  </script> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
  <script>
    // Wait for the DOM to be ready
    $(function () {
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("form[name='submit']").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          nik: "required",
          isi_laporan: {
            required: true,
            minlength: 60,
          },
          tgl_pengaduan: "required",
          foto: {
            required: true,
            // Specify that email should be valitgld
            // by the built-in "email" rule
            accept: "jpg , png , svg , web , jpeg"
          }
        },
        // Specify validation error messages
        messages: {
          nik: "NIK tidak boleh kosong harus disi",
          isi_laporan: {
            required: "Laporan Tidak boleh di kosongkan",
            minlength: "minlength Laporan (60 Character)"
          },
          tgl_pengaduan: "Tanggal pengaduan tidak boleh kosong",
          foto: {
            required: "Foto Tidak Boleh kosong",
            accept: "Only Support (JPG , PNG , SVG , WEB , JPEG)"
          }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
          form.submit();
        }
      });
    });
  </script>



  <!-- SCRIPT -->
  <script>
    window.onload = function () {
      document.getElementById("loading").style.display = "none";
    }
  </script>




  <script src="../User-asset/Asset/js/script.js"></script>

  <script src="../User-asset/Asset/js/aos.js"></script>

  <script>
    AOS.init();
  </script>
</body>

</html>


<?php
}

?>