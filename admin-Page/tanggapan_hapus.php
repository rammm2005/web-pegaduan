<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_tanggapan='$id'");
$data = mysqli_fetch_array($tampil);
?>
<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="alert alert-light" role="alert">
			<h4 align="center">Hapus Data Tanggapan</h4>
			<form method="POST">
				<div class="form-group">

					<h6>Yakin Akan Menghapus Data Tanggapan <b>
							<?php echo $data['id_tanggapan'] ?>
						</b> ?</h6>
					<input type="hidden" name="id_tanggapan" value="<?php echo $id ?>" required class="form-control">
					<button type="submit" name="hapus" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus
					</button>
					<a href="dashboard.php?page=tanggapan" class="btn btn-warning"> <i class="fa fa-arrow-left"></i>
						Batal</a>

				</div>
			</form>
		</div>
	</div>
</div>
</div>


<?php
if (isset($_POST['hapus'])) {
	$id_tanggapan = $_POST['id_tanggapan'];

	$ubah = mysqli_query($koneksi, 'DELETE FROM tanggapan WHERE id_tanggapan="' . $id_tanggapan . '"');
	if ($ubah) {
		echo '
				<script>
				<script>
				swal({
				  title: "Success!",
				  text: "Data tanggapan Berhasil Di Hapus!",
				  icon: "success",
				  button:"Okey",
				  
				});
					window.location="dashboard.php?page=tanggapan"; 
				</script>
			';
	}
}
?>