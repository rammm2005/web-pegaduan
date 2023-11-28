<?php
  $id		= $_GET['id'];
  $tampil	= mysqli_query($koneksi, "SELECT * FROM viewpengaduan WHERE id_pengaduan='$id'");
  $data		= mysqli_fetch_array($tampil);
?>
<script src="Asset/sweetalert/sweetalert.min.js"></script>


<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data pengaduan</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h4>Yakin Akan Menghapus Data Pengaduan <b><?php echo $data['username'] ?> ?</h4>
                <input type="hidden" name="id_pengaduan" value="<?php echo $id ?>" required class="form-control">
                <button type="submit" name="hapus" class="btn btn-primary"> <i class="fa fa-trash"></i>Delete</button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </button>
            </div>
        </div>
    </form>
</div>
</div>
    

<?php
  if(isset($_POST['hapus'])){
    $id_pengaduan  = $_POST['id_pengaduan'];
   
    $hapus = mysqli_query($koneksi, 'DELETE FROM pengaduan WHERE id_pengaduan="'.$id_pengaduan.'"');
    if ($hapus){
      echo '
      <script>
      swal({
        title: "Success!",
        text: "Data pengaduan Berhasil Di Hapus!",
        icon: "success",
        button:"Okey",
        
      });
      window.location="dashboard.php?page=pengaduan";
      </script>
        ';
      }
    }
?>