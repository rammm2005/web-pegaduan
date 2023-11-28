<?php

include 'koneksi.php';


	$id     = $_GET['id'];
	$show = mysqli_query($koneksi, "SELECT * FROM viewtanggapan WHERE id_tanggapan='$id'");
	$query   = mysqli_fetch_array($show);

?>
<link href="Asset/css/sb-admin-2.min.css" rel="stylesheet">


<style type="text/css" media="print">
      /* masukan sintak CSS disini */
    .navbar-nav{
        display: none !important;
    }
    nav{
        display:none !important;
    }
    .form-control{
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 3px solid #e3e6f0;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    hr{
        border: 1.9px solid #e3e6f0;
    }
    footer{
        display:none !important;
    }
    
</style>
<div class="container-fluid">
    <div class="card shadow mb-2 py-4">
        <div class="text-center py-4">
            <?php if($query['foto'] != ''){ ?>
            <img src="upload/<?= $query['foto']; ?>" class="img-box" style="max-widht:15em;" width="400"
                alt="Foto Bukti pengaduan">
            <?php } else{?>
                <i class="fa fa-solid fa-file-word" style="font-size:19em;"></i>
            <?php }?>
        </div>

    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body shadow mb-2">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Petugas / Admin</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $query['username']  ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $query['nama_petugas']  ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Telphone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php echo $query['telp']  ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Role</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0" style="color:white;">
                            <?php 
                            if($query['level'] == 'admin'){
                            echo'<button class="btn btn-primary" style="color:white; cursor:not-allowed;"> 
                            <img src="Asset/img/user.png" alt="" class="img-profile rounded-circle" width="20" srcset="">
                            Admin</button>';
                            }else{
                            echo'<button class="btn btn-success" style="color:white; cursor:not-allowed;"><i class="fa fa-user-shield"></i> Petugas</button>';

                            }
                            
                            ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggal Pengaduan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php  $nice = $query['tgl_pengaduan'];
                        $date_new = date("d F, Y (l) ( s-m-h) ", strtotime($nice));
                        echo "".$date_new.""; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Laporan Pengaduan</p>
                    </div>
                    <div class="col-sm-9">
                    <textarea name="isi_laporan" height="100px" readonly id="isi_laporan"  cols="30" rows="10" class="form-control"   placeholder="Masukan Isi Laporan anda " style="cursor:not-allowed;"> <?php
                                    echo $query['isi_laporan'];
                                    ?></textarea>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggal Tanggapan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?php  $nice = $query['tgl_tanggapan'];
                        $date_new = date("d F, Y (l) ( s-m-h)", strtotime($nice));
                        echo "".$date_new.""; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggapan</p>
                    </div>
                    <div class="col-sm-9">
                    <textarea name="tanggapan" height="100px" readonly id="isi_laporan"  cols="30" rows="10" class="form-control"  style="cursor:not-allowed;"  placeholder="Masukan Isi Laporan anda "> <?php
                                    echo $query['tanggapan'];
                                    ?></textarea>
                    </div>
                </div>



            </div>
        </div>

</div>


</div>
<script>
    window.print();
</script>


