<script src="Asset/sweetalert/sweetalert.min.js"></script>



<div class="container-fluid">
    <div class="card shadow mb-2">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="card-header">
                        <h3 style="margin-left:2em;">Tambah masyarakat</h3>
                    </div>


                    <div class="row" style="margin-left:2em;">
                        <div class="col-md-10">
                            <form action="" method="post">

                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama <span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama" id="nama" type="text"
                                                placeholder="Masukan Nama Pelapor " maxLength="35" />
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="nik">Nik <span style="color:red;">*</span></label>
                                            <input class="form-control" name="nik" id="nik" type="text"
                                                placeholder="Masukan Nik" maxLength="16" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username <span style="color:red;">*</span></label>
                                            <input class="form-control" name="username" id="username" type="text"
                                                placeholder="Masukan Username " maxLength="25" />
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="password">Password <span style="color:red;">*</span></label>
                                            <input class="form-control" name="password" id="password" type="password"
                                                placeholder="Enter Password " maxLength="35" />
                                            <i class="fa fa-eye"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="telp" class="col-md-6">Telp <span style="color:red;">*</span></label>
                                    <input id="telp" type="tel" name="telp" maxLength="14" class="form-control"
                                        placeholder="No Telphone">

                                </div>




                                <div class="card-footer mb-4">
                                    <div class="form-group">
                                        <button type="submit" name="simpan" class="btn btn-success">
                                            <i class="fa fa-save"></i>
                                            Submit
                                        </button>
                                        <button type="button" onclick="window.history.back()" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>
                                            Back
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
  if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    // $password = md5($_POST['password']);

   $password = password_hash(mysqli_real_escape_string($con,$_POST['password']), PASSWORD_BCRYPT, ['cost' => 10]);

    $telp = $_POST['telp'];




 $cheked = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik='$nik'"));

    if($cheked > 0){
        echo '
        <script>
        swal({
          title: "Warning!",
          text: "Maaf Nik Sudah Terdaftar !",
          icon: "info",
          button:"Ok",
          
        });
        </script>
          ';
    }

    else if ($nama == '' || $nik == '' || $username == '' || $password == '' || $telp == '') {

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

    }else{

    $simpan = mysqli_query($koneksi, 'INSERT INTO masyarakat(nama,nik,username,password,telp) VALUES ("'.$nama.'", "'.$nik.'", "'.$username.'", "'.$password.'", "'.$telp.'")');
        echo '
        <script>
        swal({
          title: "Success!",
          text: "Data masyarakat Berhasil Di Tambahkan!",
          icon: "success",
          button:"Okey",
          
        });
        window.location="dashboard.php?page=masyarakat";
        </script>
          ';
    }
  }
?>