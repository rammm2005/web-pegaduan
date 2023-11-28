<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
$data = mysqli_fetch_array($tampil);
?>

<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-2">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="card-header">
                        <h3 style="margin-left:2em;">Edit Petugas</h3>
                    </div>

                    <div class="row" style="margin-left:2em;">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_petugas" value="<?php echo $id ?>">

                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama <span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama_petugas" id="nama" type="text"
                                                placeholder="Nama " required maxLength="35"
                                                value="<?php echo $data['nama_petugas'] ?>" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nik">Username <span style="color:red;">*</span></label>
                                            <input class="form-control" name="username" id="nik" type="text"
                                                value="<?php echo $data['username'] ?>" placeholder="Usernmae " required
                                                maxLength="16" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password">Password<span
                                                        style="color:red;">*</span></label>
                                                <input type="password" name="password"
                                                    value="<?php echo $data['password'] ?>" id="password" class="form-control"
                                                    data-toggle="password">
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="telp" class="col-md-12">Telphone <span
                                                        style="color:red;">*</span></label>
                                                <input class="form-control" name="telp"
                                                    value="<?php echo $data['telp'] ?>" id="telp" type="text" placeholder=""
                                                    maxLength="13" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="level" class="col-md-12">Level <span
                                                        style="color:red;">*</span></label>
                                                <select class="selectpicker form-control" id="level" name="level"
                                                    data-live-search="true" title="Select Isi Pengaduan"
                                                    data-hide-disabled="true">
                                                    <option value="#" disabled>-- Pilih level --</option>
                                                    <option value="admin" name="level"
                                                        <?php if ($data['level'] == 'admin') {echo 'selected';} ?>> Level
                                                        Admin
                                                    </option>
                                                    <option value="petugas" name="level"
                                                        <?php if ($data['level'] == 'petugas') {echo 'selected';} ?>> Level
                                                        Petugas
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="file-7">Foto <span style="color:red;">*</span></label>
                                        <div class="file-loading">
                                            <input id="file-1" class="file" type="file" value="Admin-img/<?php echo $data['foto_petugas']; ?>" name="foto_petugas" multiple
                                                data-preview-file-type="any" data-upload-url="#" data-theme="fa5">
                                            <div id="errorBlock" class="help-block"></div>
                                        </div>
                                        
                                    </div>

                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button type="submit" name="ubah" class="btn btn-success" required>
                                                <i class="fa fa-save"></i> Submit
                                            </button>
                                            <button type="button" onclick="window.history.back()"
                                                class="btn btn-danger">
                                                <i class="fa fa-arrow-left"></i> Kembali
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['ubah'])) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    if (isset($_FILES['foto_petugas'])) {
        $foto_petugas = $_FILES['foto_petugas'];
        $foto_petugas_nama = $_FILES['foto_petugas']['name'];
        $foto_petugas_size = $_FILES['foto_petugas']['size'];
        $foto_petugas_tmp_name = $_FILES['foto_petugas']['tmp_name'];

        if ($foto_petugas_size > 4044070) {
            echo '
                <script>
                swal({
                  title: "Warning!",
                  text: "Foto Melebihi format yang di tentukan (5MB)!",
                  icon: "warning",
                  button:"OK",
                });
                </script>
                  ';
        } else {
            move_uploaded_file($foto_petugas_tmp_name, 'Admin-img/' . $foto_petugas_nama);

            $ubah = mysqli_query($koneksi, 'UPDATE petugas SET nama_petugas="' . $nama_petugas . '", username="' . $username . '", password="' . $password . '" , telp="' . $telp . '" , level="' . $level . '" , foto_petugas="' . $foto_petugas_nama . '" WHERE id_petugas="' . $id_petugas . '"');
            echo '
              <script>
              swal({
                title: "Success!",
                text: "Data Petugas Berhasil Di Update!",
                icon: "success",
                button:"Okey",
              });
              window.location="dashboard.php?page=petugas";
              </script>
                ';
        }
    }
}
?>
