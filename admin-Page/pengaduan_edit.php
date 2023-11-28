<?php

$id = $_GET['id'];
$tampil	= mysqli_query($koneksi, "SELECT * FROM viewpengaduan WHERE id_pengaduan=$id");
$data = mysqli_fetch_array($tampil);
?>

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
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengaduan" value="<?php echo $id ?>" required>


                            <div class="card-body col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="date">Tanggal Pengaduan <span style="color:red;">*</span></label>
                                        <input name="tgl_pengaduan" id="date"
                                            value="<?php echo $data['tgl_pengaduan'] ?>" type="date" placeholder=""
                                            required class="form-control" />
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-12">
                                    <div class="form-group col-md-12">

                                        <label for="file-7">Foto <span style="color:red;">*</span></label>
                                        <div class="form-group">
                                              
                                                <div class="col-md-12">
                                            <div class="file-loading">

                                        <input id="file-1" class="file" type="file"  data-preview-file-type="any"  name="foto" data-upload-url="#" data-theme="fa5" value="upload/<?=$data['foto']?>'" data-show-upload="true">

                                              
                                                    
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="form-group col-md-9">
                                <label for="isi_laporan">Isi Laporan <span style="color:red;">*</span></label>

                                <textarea name="isi_laporan" height="100px" id="isi_laporan" minLength="50" cols="30" rows="15" class="form-control"   placeholder="Masukan Isi Laporan anda "> <?php
                                        echo $data['isi_laporan'];
                                        ?></textarea>
   
                            </div>


                            <div class="card-body col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nik">Nik Masyarakat <span style="color:red;">*</span></label>
                                        <select class="selectpicker form-control" id="nik" name="nik"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">


                                            <option value="#" disabled>-- Pilih Nik --</option>
                                            <?php
                                            $masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                                            while ($key = mysqli_fetch_array($masyarakat)) {
                                                ?>
                                            <option value="<?php echo $key['nik']; ?>"  <?php if ($data['nik'] == $key['nik']) { echo 'selected'; } ?>> <?php echo $key['nik'] ; ?> | <?php echo $key['username'] ; ?>
                                            </option>
                                            <?php
                              }  ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status" class="col-md-12">Status <span
                                                style="color:red;">*</span></label>
                                            <select class="selectpicker form-control" id="status" name="status"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">


                                            <option value="0" name="status"
                                                <?php if($data['status'] == '0') {echo'selected'; }?>> Belum Proses
                                            </option>
                                            <option value="proses" name="status"
                                                <?php if($data['status'] == 'proses') {echo'selected';} ?>> Di Proses
                                            </option>
                                            <option value="selesai" name="status"
                                                <?php if($data['status'] == 'selesai') {echo'selected';} ?>> Selesai
                                            </option>
                                            <option value="tolak" name="status"
                                                <?php if($data['status'] == 'tolak') {echo'selected';} ?>> Tolak
                                            </option>

                                        </select>

                                    </div>
                                </div>
                            </div>

                    </div>





                <div class="card-footer col-md-11">
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-success" required>
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

                           



<?php

if(isset($_POST['update'])){
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl_pengaduan = $_POST['tgl_pengaduan'];
    $isi_laporan = $_POST['isi_laporan'];
    $nik = $_POST['nik'];
    $status = $_POST['status'];


    if(isset($_FILES["foto"])){
    $foto = $_FILES['foto'];
    $foto_nama = $_FILES['foto']['name'];
   $foto_size = $_FILES['foto']['size'];
   $foto_tmp_name = $_FILES['foto']['tmp_name'];

        if(isset($foto)){
            if($foto_size > 4044070){
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

        }else{
            move_uploaded_file( $foto_tmp_name,'upload/'.$foto_nama);
            $update = mysqli_query($koneksi, 'UPDATE pengaduan SET tgl_pengaduan="'.$tgl_pengaduan.'", isi_laporan="'.$isi_laporan.'" , nik="'.$nik.'" ,status="'.$status.'"  ,foto="'.$foto_nama.'" WHERE id_pengaduan="'.$id_pengaduan.'"');
            
            echo '
            <script>
            swal({
            title: "Success!",
            text: "Data pengaduan Berhasil Di Update!",
            icon: "success",
            button:"Okey",
            
            });
            window.location="dashboard.php?page=pengaduan";
            </script>
            ';
        }
    
    }
}
}




?>