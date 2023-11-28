<?php

if(isset($_POST['tambah_pengaduan'])) {

    $nik  = $_POST['nik'];
    $isi_laporan = $_POST['isi_laporan'];
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
 
       echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';
 
   
 
    } else if($foto_size > 9044090){
 
       echo '<script type="text/javascript">alert("Foto melebihi format");window.history.go(-1);</script>';
 
    } else {
        move_uploaded_file( $foto_tmp_name,'admin-Page/upload/'.$foto_nama);
        
       $sql = $con->prepare("INSERT INTO pengaduan(nik, isi_laporan, status, tgl_pengaduan,foto) VALUES(?, ?, ?, ?,? )");
       $sql->bind_param('sssss', $nik, $isi_laporan, $status, $tgl_pengaduan,$foto_nama);
       $sql->execute();
        echo '
        <script>alert("Berhasil tambah data !");window.history.go(-1);window.location="../../index.php"</script>
        
        ';
 
    }
 
 }

?>