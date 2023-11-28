<?php

include '../koneksi.php';

if(isset($_POST['update'])){
    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];
    
    
        $update = mysqli_query($koneksi, 'UPDATE pengaduan SET status="'.$status.'" WHERE id_pengaduan="'.$id_pengaduan.'"');
        if($update){
        echo'

        <script type="text/javascript">
        swal({
            title: "Success!",
            text: "Data Status Berhasil di ubah!",
            icon: "success",
            button:"Okey",
            
          });
        window.location.href="dashboard.php?page=pengaduan";
        </script>

';
        }
}
                    ?>