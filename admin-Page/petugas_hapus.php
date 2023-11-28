<?php
  $id		= $_GET['id'];
  $tampil	= mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
  $data		= mysqli_fetch_array($tampil);
?>

<script src="Asset/sweetalert/sweetalert.min.js"></script>


<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data petugas</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h5>Yakin Akan Menghapus Data petugas <b><?php echo $data['username'] ?>  & <?php echo $data['telp'] ?> ?</b></h5>
                <input type="hidden" name="id_petugas" value="<?php echo $id ?>" required class="form-control">
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
    $id_petugas  = $_POST['id_petugas'];
   
    $hapus = mysqli_query($koneksi, 'DELETE FROM petugas WHERE id_petugas="'.$id_petugas.'"');
    if ($hapus){
      echo '
      <script>
      swal({
        title: "Success!",
        text: "Data Petugas Berhasil Di Hapus!",
        icon: "success",
        button:"Okey",
        
      });
      window.location="dashboard.php?page=petugas";
      </script>
        ';
      }
    }
?>