<?php
    $id     = $_GET['id'];
    $show = mysqli_query($koneksi, "SELECT * FROM viewpengaduan WHERE id_pengaduan='$id'");
    $query   = mysqli_fetch_array($show);
?>

<style type="text/css" media="print">
      /* masukan sintak CSS disini */
    .navbar-nav{
        display: none !important;
    }
    nav{
        display:none !important;
    }
   

    footer{
        display:none !important;
    }
    .btn-danger{
        display:none !important;
    }
    .btn-primary{
        display:none !important;

    }
    .fa{
        color:white !important;
    }
    .btn{
        color:white !important;

    }
    .bold{
        font-size:2.3em !important;
        font-weight:bold;

        font-family:arial;
    }
    .text-tgl{
        font-size:1.1em;
    }
    .line{
        font-size:10em !important;
        font-weight:bold !important;
        color:black !important;
        border:4px solid black;
    }
    .isi{
        font-size:1.2em;
        color:black;
        font-weight:550;    
    }
    .text-right{
        text-align:right;
        margin:0;
    }
    .fa-info{
        color:blue !important;
    }
    .fa-spinner{
        color:blue !important;
    }
    .fa-times{
        color:red !important;
    }
    .fa-check-circle{
        color:green !important;
    }
    .isi-laporan{
        font-size:1.4em;
        font-family:;
        line-height:2em;
        color:black;
        font-weight:570;

    }
    
</style>

<style type="text/css">
    .navbar-nav{
        display:none !important;
    }
    nav{
        display:none !important;
    }
    
</style>

<div class="text-center">
    <h3 class="bold">Laporan Surat Pengaduan</h3>
    <span class="text-tgl">Bali / <?php  $nice = $query['tgl_pengaduan'];
                            $date_new = date("Y", strtotime($nice));
                            echo "".$date_new.""; ?></span>
</div>
<hr class="line">
<br>
<p class="isi text-right">Status Pengaduan :  
        <?php
         if($query['status'] == '0') { 
            echo ' <i class="fa fa-info" style="color:blue; font-weight:bold; font-size:1.1em !important;"></i> Belum Di Proses';
      } else if($query['status'] == 'proses') {
            echo '<i class="fa fa-spinner" style="color:blue; font-weight:bold; font-size:1.1em !important;"></i> Sedang Di Proses';
      }else if($query['status'] == 'tolak'){
            echo '<i class="fa fa-times" style="color:red; font-weight:bold; font-size:1.1em !important;"></i> Di tolak';

      }else{
        echo '<i class="fa fa-check-circle" style="color:green; font-weight:bold; font-size:1.1em !important;"></i>  Selesai';
      }
        ?>

</p>

<br>
<br>

<p class="isi">Nomor :  <?php echo $query['id_pengaduan']?>/PG/X/<?php  $nice = $query['tgl_pengaduan'];
                            $date_new = date("Y", strtotime($nice));
                            echo "".$date_new.""; ?></p>

<br>
<br>
<br>

<p class="isi">Yth.Petugas/Admin Pengaduan Masyarakat</p>
<hr>
<p class="isi">Di Bali</p>
<hr>
<div class="isi">Hal : Laporan dari <?php echo $query['nik'] ?></div>
<hr>
<hr>
<p class="isi">Dengan Hormat ,</p>
<hr>
<p class="isi">Saya yang Mengisi Laporan di bawah ini :</p>
<hr>
<p class="isi">NIK KTP        : <?php echo $query['nik'] ?></p>

<hr>
<p class="isi">Nama Lengkap   : <?php echo $query['username'] ?></p>
<hr>
<p class="isi">Nama Panggilan : <?php echo $query['nama'] ?></p>
<hr>
<p class="isi">No.Telphone    : <?php echo $query['telp'] ?></p>
<br>
<p class="isi-laporan"><?php echo $query['isi_laporan'] ?></p>
<br>
<p class="isi">
Provinsi Bali :
<?php
                            $nice = $query['tgl_pengaduan'];
                            $date_new = date("d F, Y (l)", strtotime($nice));
                            echo "".$date_new."";
                            ?>
</p>

<br>
<p class="isi">Hormat saya,</p>
<hr>
<p class="isi"><?php echo $query['nama'] ?> (Pelapor)</p>




<script>
    window.print();
    window.close();
</script>



