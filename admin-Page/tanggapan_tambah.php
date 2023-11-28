<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="alert alert-light" role="alert">
    <div class="card">
        <div class="card-header">
            <h4 style="font-weight:600;">Form Tambah Data Tanggapan</h4>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body col-md-12">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Tanggapan<span style="color:red;">*</span></label>
                    <textarea name="tanggapan" height="100px" id="tanggapan" cols="20" rows="9" class="form-control"
                        placeholder="Masukan Isi Tanggapan anda"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Tanggal Tanggapan <span style="color:red;">*</span></label>
                        <input type="date" name="tgl_tanggapan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Tanggal Tanggapan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Nama Petugas <span style="color:red;">*</span></label>
                        <select class="selectpicker form-control" id="exampleFormControlSelect1" name="id_petugas"
                            data-live-search="true" title="Select Petugas" data-hide-disabled="true">
                            <option value="#" disabled>-- Pilih Petugas --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM petugas");
                            while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                            <option value="<?php echo $data['id_petugas'] ?>"> <?php echo $data['nama_petugas'] ?> |
                                <?php echo $data['telp'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="number" class="col-md-12">Isi Laporan <span style="color:red;">*</span></label>
                        <select class="selectpicker form-control" id="number" name="id_pengaduan" data-live-search="true"
                            title="Select Isi Pengaduan" data-hide-disabled="true">
                            <option value="#" disabled>-- Pilih Pengaduan --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status != 'tolak'");
                            while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                            <option value="<?php echo $data['id_pengaduan'] ?>"><?php echo $data['isi_laporan'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" onclick="window.history.back()" class="btn btn-danger"><i
                        class="fa fa-arrow-left"></i> Batal</button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    $id_petugas = $_POST['id_petugas'];
    $id_pengaduan = $_POST['id_pengaduan'];

    if ($tgl_tanggapan == '' || $tanggapan == '' || $id_petugas == '' || $id_pengaduan == '') {
        echo '
        <script>
        swal({
          title: "Warning!",
          text: "Tolong Isi Semua Form Dengan Benar !",
          icon: "info",
          button:"Ok",
        });
        </script>
        ';
    } else {
        $stmt = $koneksi->prepare('INSERT INTO tanggapan(tgl_tanggapan, tanggapan, id_petugas, id_pengaduan) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $tgl_tanggapan, $tanggapan, $id_petugas, $id_pengaduan);
        $stmt->execute();
        $stmt->close();

        if (!$stmt) {
            echo 'Error: ' . mysqli_error($koneksi);
        } else {
            echo '
            <script>
            swal({
              title: "Success!",
              text: "Data tanggapan Berhasil Di Tambahkan!",
              icon: "success",
              button:"Okey",
            });
            window.location="dashboard.php?page=tanggapan";
            </script>
            ';
        }
    }
}
?>
