<?php

$id = $_GET['id'];
$tampil	= mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik=$id");
$data		= mysqli_fetch_array($tampil);
?>

<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-2">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="card-header">
                        <h3 style="margin-left:2em;">Edit masyarakat</h3>
                    </div>

                    <div class="row" style="margin-left:2em;">
                        <div class="col-md-11">
                            <form action="" method="post">

                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama <span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama" value="<?php echo $data['nama'] ?>"
                                                id="nama" type="text" placeholder="Masukan Nama Pelapor "
                                                maxLength="35" />
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="nik">Nik <span style="color:red; ">*</span></label>
                                            <input class="form-control" readonly name="nik" id="nik" style="cursor:not-allowed; "
                                                value="<?php echo $id ?>" type="text" placeholder="Masukan Nik"
                                                maxLength="16" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username <span style="color:red;">*</span></label>
                                            <input class="form-control" name="username" id="username"
                                                value="<?php echo $data['username'] ?>" type="text"
                                                placeholder="Masukan Username " maxLength="25" />
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="password">Password <span style="color:red;">*</span></label>
                                            <input class="form-control" name="password" id="password"
                                                value="<?php echo $data['password'] ?>" type="password"
                                                placeholder="Enter Password " maxLength="35" />
                                            <i class="fa fa-eye"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="telp" class="col-md-6">Telphone <span
                                            style="color:red;">*</span></label>
                                    <input id="telp" type="tel" name="telp" maxLength="14"
                                        value="<?php echo $data['telp'] ?>" class="form-control"
                                        placeholder="No Telphone">

                                </div>

                                <div class="card-footer col-md-12">
                                    <div class="form-group">
                                        <button type="submit" name="change" class="btn btn-success" required>
                                            <i class="fa fa-save"></i>
                                            Submit
                                        </button>
                                        <button type="button" onclick="window.history.back()" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>
                                            Kembali
                                        </button>
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
</div>


<?php
  if(isset($_POST['change'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = password_hash(mysqli_real_escape_string($con,$_POST['password']), PASSWORD_BCRYPT, ['cost' => 10]);
    $telp = $_POST['telp'];

    // $change = mysqli_query($koneksi, 'INSERT INTO masyarakat(nama,nik,username,password,aamat,telp) VALUES ("'.$nama.'", "'.$nik.'" , "'.$username.'" ,"'.$password.'" ,"'.$telp.'")');
    $change = mysqli_query($koneksi, 'UPDATE masyarakat SET nama="'.$nama.'", username="'.$username.'",password="'.$password.'"  ,telp="'.$telp.'" WHERE nik="'.$nik.'"');
    if ($change){
        echo '
        <script>
        swal({
          title: "Success!",
          text: "Data masyarakat Berhasil Di Update!",
          icon: "success",
          button:"Okey",
          
        });
        window.location="dashboard.php?page=masyarakat";
        </script>
          ';
    }
  }
?>