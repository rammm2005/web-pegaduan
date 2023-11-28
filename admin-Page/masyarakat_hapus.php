<?php
  $id		= $_GET['id'];
  $tampil	= mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik='$id'");
  $data		= mysqli_fetch_array($tampil);
?>
<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="alert alert-light" role="alert">
  <h2 align="center">Hapus Data masyarakat</h2>
  <form method="POST">
    <div class="form-group">
      <div class="alert alert-danger" role="alert">
      <h6>Yakin Akan Menghapus Data masyarakat <b><?php echo $data['nama'] ?></b> dengan nik <b><?php echo $data['nik'] ?> dan No.Tlp : <?php echo $data['telp'] ?></b></b> ?</h6>
      <input type="hidden" name="nik" value="<?php echo $id ?>" required class="form-control">
      <button type="submit" name="hapus" class="btn btn-primary btn-sm"> <i class="fa fa-trash"></i> Delete</button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger btn-sm">
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
    $nik  = $_POST['nik'];
   
    $hapus = mysqli_query($koneksi, 'DELETE FROM masyarakat WHERE nik="'.$nik.'"');
    if ($hapus){
      echo '
      <script>
      swal({
        title: "Success!",
        text: "Data masyarakat Berhasil Di Hapus!",
        icon: "success",
        button:"Okey",
        
      });
      window.location="dashboard.php?page=masyarakat";
      </script>
        ';
      }
    }
?>