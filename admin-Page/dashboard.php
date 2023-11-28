
<?php

session_start();
if(!isset($_SESSION['sesion']) && $_SESSION['sesion']!='petugas'){
header("location:login.php");


}else{


?>  


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Admin Pengaduan Masyarakat</title>

    <!-- Custom fonts for this template-->
    <link href="Asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="Asset/img/kominfo.jpg" type="image/x-icon" />


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

         <!-- Format Telphone  -->
  <link rel="stylesheet" href="Asset/PLUGINS/css/intlTelInput.css">
       <link rel="stylesheet" href="Asset/PLUGINS/css/demo.css"> 
    <!-- Custom styles for this template-->
    <link href="Asset/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="Asset/css/common.css" rel="stylesheet"> -->

    <link href="Asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom File Inputs -->
    <link rel="stylesheet" type="text/css" href="Asset/CustomFileInputs/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="Asset/CustomFileInputs/css/component.css" />



    <!-- File Input Setup -->
   
         <link href="Asset/file-input/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="Asset/file-input/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css"/>
    
      <link rel="stylesheet" href="Asset/bootstrap-select/css/bootstrap-select.css">

    


</head>

<body id="page-top">

    


<?php
      include("koneksi.php");
      include("function.php");
      menu();

      
     

      if(isset($_GET['caripetugas'])){
        include("petugas.php");
      } else if(isset($_GET['carimasyarakat'])){
        include("masyarakat.php");
      } else if(isset($_GET['page'])){
        $page=$_GET['page'];
        if($page=='pengaduan'){
          include("pengaduan.php");
        }else if($page=='pengaduantambah'){
          include("pengaduan_tambah.php");
        }else if($page=='pengaduanedit'){
          include("pengaduan_edit.php");
        }else if($page=='pengaduanhapus'){
          include("pengaduan_hapus.php");
          }else if($page=='petugas'){
            include("petugas.php");
          }else if($page=='petugashapus'){
            include("petugas_hapus.php");
        }else if($page=='petugastambah'){
            include("petugas_tambah.php");
        }else if($page=='petugasedit'){
            include("petugas_edit.php");
        }else if($page=='masyarakat'){
            include("masyarakat.php");
          }else if($page=='masyarakatedit'){
            include("masyarakat_edit.php");
          }else if($page=='masyarakathapus'){
            include("masyarakat_hapus.php");
          }else if($page=='masyarakattambah'){
            include("masyarakat_tambah.php");
          }else if($page=='tanggapan'){
            include("tanggapan.php");
          }else if($page=='tanggapanedit'){
            include("tanggapan_edit.php");
          }else if($page=='tanggapanhapus'){
            include("tanggapan_hapus.php");
          }else if($page=='tanggapantambah'){
            include("tanggapan_tambah.php");
          }else if($page=='tanggapanshow'){
            include("tanggapan_show.php");
          }else if($page=='profile'){
            include("profile.php");
          }else if($page=='report'){
            include("report.php");
          }else if($page=='pengaduan_show'){
            include("pengaduan_show.php");

            
    }else if($page=='logout'){
      include("logout.php");
    }
      }else{
        beranda();
      }
 
      footer();
    ?>




</body>






    <script src="Asset/vendor/jquery/jquery.min.js"></script>
    <!-- Bundle JQUERY Select and the Other -->
    <script src="Asset/vendor/jquery/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  
  <script src="Asset/file-input/js/plugins/filetype.min.js" type="text/javascript"></script>

    <script src="Asset/file-input/js/fileinput.js" type="text/javascript"></script>
    <script src="Asset/file-input/themes/fa5/theme.js" type="text/javascript"></script>
    <script src="Asset/file-input/themes/explorer-fa5/theme.js" type="text/javascript"></script>
    <script src="Asset/file-input/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="Asset/bootstrap-select/js/bootstrap-select.js"></script>


  <script>

    
     $("#file-1").fileinput({
        theme: 'fa5',
        uploadUrl: '#', 
        initialPreviewAsData: true,
        allowedFileExtensions: ['jpg', 'png', 'gif' , 'mp4' ,'jpeg' ,'web'],
        overwriteInitial: false,
        maxFileSize: 40000,
        maxFilesNum: 500,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
  </script>
    


    <script src="Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core pluAsset/gin JavaScript-->
    <script src="Asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Telphone Plugins JS -->
<script src="Asset/PLUGINS/js/intlTelInput.js"></script>
<script src="Asset/PLUGINS/js/utils.js"></script>
       <!-- SerachBox JS -->
<script src="Asset/js/show-pass.js"></script>

<!-- Custom InputFile Data JS -->
<script src="Asset/CustomFileInputs/js/custom-file-input.js"></script>





<script>
    $("#telp").intlTelInput({
      utilsScript: "Asset/PLUGINS/js/utils.js"
    });  
</script>

    <!-- Page level custom scripts -->
  <script src="Asset/js/demo/datatables-demo.js"></script>
    <!-- Custom sAsset/cripts for all pages-->
    <script src="Asset/js/sb-admin-2.min.js"></script>

    <!-- Page levAsset/el plugins -->
    <script src="Asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="Asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level plugins -->

      <script src="Asset/vendor/chart.js/Chart.js"></script>

      <script src="Asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="Asset/js/demo/chart-area-demo.js"></script>
    <script src="Asset/js/demo/chart-pie-demo.js"></script>
    <!-- <script src="Asset/js/demo/chart-bar-demo.js"></script> -->
      


</html>


<?php
}
?>