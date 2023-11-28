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



                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="datepicker">Tanggal Pengaduan <span
                                                    style="color:red;">*</span></label>
                                            <input name="tgl_pengaduan" id="datepicker" type="date"
                                                placeholder="tanggal/bulan/tahun" class="form-control" />
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-md-12">

                                        <label for="file-7">Foto <span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <div class="file-loading">
                                                <input id="file-5" class="file" type="file" name="foto" 
                                                    data-preview-file-type="any" data-upload-url="false" data-theme="fa5">
                                                <div id="errorBlock" class="help-block"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group col-md-9">
                                    <label for="isi_laporan">Isi Laporan <span style="color:red;">*</span></label>

                                    <textarea name="isi_laporan" height="100px" minLength="50" id="isi_laporan" cols="30" rows="15"
                                        class="form-control" placeholder="Masukan Isi Laporan anda "></textarea>

                                </div>


                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nik">Nik Masyarakat <span style="color:red;">*</span></label>
                                        

                                        <select class="selectpicker form-control" id="nik" name="nik"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">
                        
                                                <option value="#" disabled>-- Pilih Nik --</option>
                                                                    <?php
                                                            $key = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                                                            while ($data = mysqli_fetch_array($key)) {
                                                            ?>
                                                                    <option value="<?php echo $data['nik']; ?>" id="kategori"> <?php echo $data['nik'] ; ?> | <?php echo $data['username'] ; ?>
                                                                    </option>
                                                                    <?php
                                                            }
                                                            ?>
                                                
                                                </option>
                                                
                                            </select>
                                        </div>

                                        <input type="hidden" name="status" value="0">
                                        <!-- <div class="form-group col-md-6">

                                            <label for="status" class="col-md-12">Status <span
                                                    style="color:red;">*</span></label>
                                            <select name="status" id="status" class="js-searchBox">
                                                <option value="#" disabled>-- Pilih Status --</option>
                                                <option value="0"> Belum Proses</option>
                                                <option value="proses"> Di Proses</option>
                                                <option value="selesai"> Selesai</option>
                                            </select>

                                        </div> -->
                                    </div>
                                </div>

                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-12">Status <span style="color:red;">*</span></label>


                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" id="L" > Belum Proses
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="proses" id="L" > Di Proses
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="status" value="selesai" id="P" > Selesai
                                </label>

                            </div> -->




                    <div class="card-footer col-md-11">
                        <div class="form-group">
                            <button type="submit" name="simpan" class="btn btn-success">
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
  if(isset($_POST['simpan'])){
    $tgl_pengaduan = $_POST['tgl_pengaduan'];
    $isi_laporan = $_POST['isi_laporan'];
    $status = $_POST['status'];
    $nik = $_POST['nik'];

    $foto = $_FILES['foto'];
    $foto_nama = $_FILES['foto']['name'];
//    $foto = filter_var($foto, FILTER_SANITIZE_STRING);
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

        }else if ($tgl_pengaduan == '' || $isi_laporan == '' || $status == '' || $nik == '' || $foto == '') {

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

    }else{ //foto_folder
        move_uploaded_file( $foto_tmp_name,'upload/'.$foto_nama);
        // move_uploaded_file( $foto_siswa_tmp_name,'upload/'.$foto_nama);
        $simpan = mysqli_query($koneksi, 'INSERT INTO pengaduan(tgl_pengaduan,isi_laporan,status,foto,nik) VALUES ("'.$tgl_pengaduan.'", "'.$isi_laporan.'", "'.$status.'" , "'.$foto_nama.'","'.$nik.'")');
        echo '
        <script>
        swal({
          title: "Success!",
          text: "Data pengaduan Berhasil Di Tambahkan!",
          icon: "success",
          button:"Okey",
          
        });
        window.location="dashboard.php?page=pengaduan";
        </script>
          ';
    }
  }
}
?>