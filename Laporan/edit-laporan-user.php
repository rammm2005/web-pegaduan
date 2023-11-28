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
  <title>Perubahan Laporan</title>
  <link rel="icon" type="image/png" href="../User-asset/Asset/img/logo-icon.png" sizes="16x16">

  <link rel="stylesheet" href="../User-asset/Asset/css/navbar.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/form.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/animate.min.css">
  <link rel="stylesheet" href="../User-asset/Asset/css/aos.css">
  <link rel="stylesheet" href="edit.css">
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
    <h1>Edit Laporan Anda disni</h1>
    <h3>Silahkan lakukan perbaikan jika data yang anda masukan kurang baik !.</h3>
  </div>

  <section class="main-content" height="100vh !important">
    <h1 class="heading" style="margin-bottom:1.5em;">Edit Pengaduan <?= $data['nama']?></h1>

  <?php
include '../User-asset/include/koneksi.php';

    $id = $_GET['id'];
    $show = mysqli_query($con,"SELECT * FROM viewpengaduan WHERE nik=$id");
    while($data = mysqli_fetch_array($show)){?>


<div class="formSection readOnly" >

      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan'] ?>">
        <label>Nik</label>
        <input type="text" value="<?= $data['nik'] ?>" name="nik" id="nik" class="input" disabled="true" readonly
          style="cursor:not-allowed;">

       
        <label>Tanggal Kejadian</label>
        <input type="date" value="<?= $data['tgl_pengaduan'] ?>" id="date" class="input" name="tgl_pengaduan" disabled="true">
        <label>Laporan Pengaduan</label>
        <textarea name="isi_laporan" id="isi" cols="30" rows="10" class="input"
          disabled="true"><?= $data['isi_laporan'] ?> </textarea>
          <input type="hidden" value="<?= $data['status'] ?>" id="nama" class="input" name="status" disabled="true">
        <label>Laporan Foto</label>
          <!-- <input type="file"  id="foto" class="input" name="foto" disabled="true" required> -->
          <div class="form-group">
            <div class="file-upload">
              <button class="btn-upload ">
                <span class="text-browse">Browse..</span>
                <span class="text-file-name">No file selected</span>
              </button>
              <i class="fa fa-camera i-pic-upload"></i>
              <i class="i-deselect"></i>
              <input type="file" class="form-control d-none input" disabled="true" required name="foto" id="foto">
            </div>
          </div>
          
          <br>
        <img src="../admin-Page/upload/<?= $data['foto'] ?>" alt="" width="100px">
        <button type="button" class="editButton">Edit</button>
        <div class="actionButtons">
          <a href="#" class="cancelButton">Cancel</a>
          <button class="saveButton" type="submit" name="update">Save</button>
        </div>
      </form>
  </div>






  <?php
}
?>
</section>

<?php
     include '../User-asset/include/koneksi.php';

if(isset($_POST['update'])){
  $id_pengaduan = $_POST['id_pengaduan'];
  $tgl_pengaduan = $_POST['tgl_pengaduan'];
  $isi_laporan = $_POST['isi_laporan'];
  $isi_laporan = filter_var($isi_laporan, FILTER_SANITIZE_STRING);

  $nik = $_POST['nik'];
  $status = $_POST['status'];
  $foto = $_FILES['foto'];
  $foto_nama = $_FILES['foto']['name'];
 $foto_size = $_FILES['foto']['size'];
 $foto_tmp_name = $_FILES['foto']['tmp_name'];


  if(isset($foto)){
      if($foto_size > 4044070){
          echo '
          <script>
          swal({
            title: "Warning!",
            text: "Foto Melebihi format yang di tentukan (5MB)!",
            icon: "warning",
            button:"OK",
          });
          
          </script>
            ';

  }else{
    move_uploaded_file( $foto_tmp_name,'../admin-Page/upload/'.$foto_nama);
      $update = mysqli_query($con, 'UPDATE pengaduan SET tgl_pengaduan="'.$tgl_pengaduan.'", isi_laporan="'.$isi_laporan.'" , nik="'.$nik.'" ,status="'.$status.'"  ,foto="'.$foto_nama.'" WHERE id_pengaduan="'.$id_pengaduan.'"');
      
      echo '
      <script>
      swal({
        title: "Success!",
        text: "Data pengaduan Berhasil Di Update!",
        icon: "success",
        button:"Okey",
        
      });
      window.location="edit-laporan-user.php?&id='.$_SESSION['nik'].'";
      </script>
        ';
  }
}

}


?>



  <?php
    include '../User-asset/include/footer.php'
?>





  <script src="../User-asset/Asset/js/jquery-3.6.3.js"></script>
  <script src="../sign-in/js/jquery.validate.min.js"></script>
  <script src="script.js"></script>
  <script src="upload-sc.js"></script>



  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
  <script>
    $(function () {
     
      $("form[name='submit']").validate({
        rules: {
         
          nik: "required",
          isi_laporan: {
            required: true,
            minlength: 60,
          },
          tgl_pengaduan: "required",
          foto: {
            required: true,
          
            accept: "jpg , png , svg , web , jpeg"
          }
        },
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