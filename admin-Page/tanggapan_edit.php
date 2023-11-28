<?php
    $id     = $_GET['id'];
    $tampil2 = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_tanggapan='$id'");
    $data2   = mysqli_fetch_array($tampil2);
?>
<script src="Asset/sweetalert/sweetalert.min.js"></script>

<div class="alert alert-light" role="alert">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Form Ubah Data Tanggapan</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body col-md-12">


            <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Tanggapan<span style="color:red;">*</span></label>

                    <textarea name="tanggapan" height="100px" id="tanggapan" cols="20" rows="9" class="form-control"
                        placeholder="Masukan Isi Tanggapan anda "><?php echo $data2['tanggapan'] ?></textarea>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="id_tanggapan" value="<?php echo $id ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Tanggapan">
                        <label for="exampleInputEmail1">Tanggal Tanggapan <span style="color:red;">*</span></label>
                        <input type="date" name="tgl_tanggapan" value="<?php echo $data2['tgl_tanggapan'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Tanggal Tanggapan">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="us">Nama Petugas <span style="color:red;">*</span></label>
                        <select class="selectpicker form-control" id="us" name="id_petugas"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">


                        <option value="#" disabled>-- Pilih Petugas --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM petugas");
                            while($data=mysqli_fetch_array($tampil)){
                                if ($data['id_petugas']==$data2['id_petugas'])
                                {
                                    echo '<option selected="selected" value="'.$data['id_petugas'].'"> '.$data['nama_petugas'].' | '.$data['telp'].'</option>';
                                } else {
                                    echo '<option value="'.$data['id_petugas'].'"> '.$data['nama_petugas'].' | '.$data['telp'].'</option>';
                                }
                            }?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="number" class="col-md-12">Isi Pengaduan <span style="color:red;">*</span></label>
                        <select class="selectpicker form-control" id="number" name="id_pengaduan"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">
   
                        <option value="#" disabled>-- Pilih Pengaduan --</option>
                            <?php
                            
                            $tampil = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                            while($data=mysqli_fetch_array($tampil)){?>

                            <?php
                            if($data['status'] != 'tolak'){
                                if($data['id_pengaduan']== $data2['id_pengaduan'])
                                {
                                    echo '<option selected="selected" value="'.$data['id_pengaduan'].'"> '.$data['isi_laporan'].'</option>';
                                } else {
                                    echo '<option value="'.$data['id_pengaduan'].'"> '.$data['isi_laporan'].'</option>';
                                }
                                
                            }
                             ?>

                            <?php
                            }?> 
                      

                        </select>
                    </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="ubah"  class="btn btn-success" required><i class="fa fa-save"></i> Simpan</button>
                <button type="button" onclick="window.history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Batal</button>
            </div>
        </form>
    </div>
</div>
                        </div>

<?php
    if(isset ($_POST['ubah'])){ //proses simpan perubahan data tanggapan
    	$id_tanggapan = $_POST['id_tanggapan'];
        $tgl_tanggapan = $_POST['tgl_tanggapan'];
        $tanggapan = $_POST['tanggapan'];
        $id_petugas = $_POST['id_petugas'];
        $id_pengaduan = $_POST['id_pengaduan'];

        $ubah = mysqli_query($koneksi, 'UPDATE tanggapan SET tgl_tanggapan="'.$tgl_tanggapan.'",tanggapan="'.$tanggapan.'",id_petugas="'.$id_petugas.'",id_pengaduan="'.$id_pengaduan.'" WHERE id_tanggapan="'.$id_tanggapan.'"');
        if ($ubah){
		    echo '
            <script>
            swal({
              title: "Success!",
              text: "Data tanggapan Berhasil Di Update!",
              icon: "success",
              button:"Okey",
              
            });
            window.location="dashboard.php?page=tanggapan";
            </script>
              
		    ';
        }
    }
?>