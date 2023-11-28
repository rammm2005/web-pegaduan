<script src="Asset/sweetalert/sweetalert.min.js"></script>


<div class="container-fluid">
    <div class="card shadow mb-2">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="card-header">
                        <h3 style="margin-left:2em;">Tambah Petugas</h3>
                    </div>

                    <div class="row" style="margin-left:2em;">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_petugas">Nama Petugas <span
                                                    style="color:red;">*</span></label>
                                            <input class="form-control" name="nama_petugas" id="nama_petugas"
                                                type="text" placeholder="Masukan Nama Petugas" maxLength="35" />
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="username">Username<span style="color:red;">*</span></label>
                                            <input class="form-control" name="username" id="username" type="text"
                                                placeholder="Username Petugas" maxLength="25" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Password<span style="color:red;">*</span></label>

                                            <input type="password" name="password" id="password" class="form-control"
                                                data-toggle="password">

                                            <div class="input-group-append ">

                                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>




                                        <div class="form-group col-md-6">

                                            <label for="telp" class="col-md-12">Telphone <span
                                                    style="color:red;">*</span></label>
                                            <input class="form-control" name="telp" id="telp" type="text" placeholder=""
                                                maxLength="13" />  
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="level" class="col-md-12">Level <span style="color:red;">*</span></label>
                                            <select class="selectpicker form-control" id="level" name="level"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">



                                                <option value="#" disabled style="text-align:center;">-- Pilih Level --
                                                </option>
                                                <option value="admin"> Level Admin</option>
                                                <option value="petugas"> Level Petugas</option>
                                            </select>

                                        </div>




                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group col-md-12">

                                        <label for="file-7">Foto <span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <div class="file-loading">
                                                <input id="file-1" class="file" type="file" name="foto_petugas" multiple
                                                    data-preview-file-type="any" data-upload-url="#" data-theme="fa5">
                                                <div id="errorBlock" class="help-block"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="card-footer">
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
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];


    $foto_petugas = $_FILES['foto_petugas'];
    $foto_petugas_nama = $_FILES['foto_petugas']['name'];
//    $foto = filter_var($foto, FILTER_SANITIZE_STRING);
   $foto_petugas_size = $_FILES['foto_petugas']['size'];
   $foto_petugas_tmp_name = $_FILES['foto_petugas']['tmp_name'];


   if(isset($foto_petugas)){
    if($foto_petugas_size > 4044070){
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

          }  else if ($nama_petugas == '' || $level == '' || $username == '' || $password == '' || $telp == '' ) {

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

        move_uploaded_file( $foto_petugas_tmp_name,'Admin-img/'.$foto_petugas_nama);
    $simpan = mysqli_query($koneksi, 'INSERT INTO petugas(nama_petugas,username,password,telp,level,foto_petugas) VALUES ("'.$nama_petugas.'", "'.$username.'", "'.$password.'", "'.$telp.'", "'.$level.'" ,"'.$foto_petugas_nama.'")');

        echo '
        <script>
        swal({
          title: "Success!",
          text: "Data Petugas Berhasil Di Tambahkan!",
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