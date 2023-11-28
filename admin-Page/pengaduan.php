<script src="Asset/sweetalert/sweetalert.min.js"></script>


<div class="container-fluid">
    <div class="card shadow mb-4">

        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="col-md-12">
            <a href="dashboard.php?page=pengaduantambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Masyarakat</a>
                </div> -->
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Table Pengaduan</h6>
                    </div>
                    <div class="col-md-6 m-9">
                    <div class="float-right">
                        <a href="dashboard.php?page=pengaduantambah" class="btn btn-primary btn-sm"> <i
                                class="fa fa-folder-plus"></i> Tambah Pengaduan</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable table-hover table-striped" id="dataTable" role="grid" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal pengaduan</th>
                            <th>Foto</th>

                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody style="font-size:0.9em !important;">
                        <?php
                             $tampil = mysqli_query($koneksi,"SELECT * FROM viewpengaduan");
            
                             while ($data = mysqli_fetch_Array($tampil)){
                        ?>
                        <tr>


                            <td>
                                <?php
                            $nice = $data['tgl_pengaduan'];
                            $date_new = date("d F, Y (l)", strtotime($nice));
                            echo "".$date_new."";
                            ?>
                            </td>
                            <td style="text-align:center; vertical-align:middle;">
                                <?php if($data['foto'] != ''){ ?>
                                <img src="upload/<?= $data['foto']; ?>" class="img-box" style="max-widht:15em;"
                                    width="200" alt="Foto Buktib pengaduan">
                                <?php } else{?>
                                <img src="Asset/img/no-img.png" width="200"
                                    style=" align-items:center;"
                                    alt="No Foto Uploaded">
                                <?php }?>
                            </td>
                            <td style="text-align:center; vertical-align:middle; font-size:1em !important;">
                                <?php
                              if($data['status'] == '0') { 
                                    echo '<div class="card-shadow mb-4"> <i class="fa fa-info" style="color:blue; font-weight:bold; font-size:1.2em !important;"></i> Belum Di Proses</button>';
                              } else if($data['status'] == 'proses') {
                                    echo '<div class="card-shadow mb-4"><i class="fa fa-spinner" style="color:blue; font-weight:bold; font-size:1.2em !important;"></i> Sedang Di Proses</button>';
                              }else if($data['status'] == 'tolak'){
                                    echo '<div class="card-shadow mb-4"><i class="fa fa-times" style="color:red; font-weight:bold; font-size:1.2em !important;"></i> Pengaduan di Tolak</button>';

                              }else{
                                echo '<div class="card-shadow mb-4"><i class="fa fa-check-circle" style="color:green; font-weight:bold; font-size:1.2em !important;"></i> Proses Selesai</button>';
                              }
                              ?>

                              <hr>
                            <form method="post" action="#########">
                            <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                            


                            <select class="selectpicker form-control" id="status" name="status"  data-live-search="true" title="Select Isi Pengaduan" data-hide-disabled="true">

                                            <option value="#" disabled>-- Pilih Status --</option>
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
                                                <?php if($data['status'] == 'tolak') {echo'selected'; }?>> Di tolak
                                            </option>

                                        </select>
                                        <hr>
                                        <button type="submit" name="update"  class="btn btn-primary btn-sm" value="Save"> <i class="fa fa-save"></i> Save </button>
                                       
                            </form>
                            <?php
                        if(isset($_POST['update'])){
                            $id_pengaduan = $_POST['id_pengaduan'];
                            $status = $_POST['status'];
                            
                            
                                $update = mysqli_query($koneksi, 'UPDATE pengaduan SET status="'.$status.'" WHERE id_pengaduan="'.$id_pengaduan.'"');
                                if($update){
                                echo'

                                <script type="text/javascript">
                                swal({
                                    title: "Success!",
                                    text: "Data Status Berhasil di ubah!",
                                    icon: "success",
                                    button:"Okey",
                                    
                                });
                                    window.location.href="dashboard.php?page=pengaduan";
                                </script>

                        ';
                                }
                        }
                        ?>

 
                         

                            </td>

                            <td style="text-align:center; justyfy-content:center; align-items:center; vertical-align:middle;">
                                <?php
                              echo'
                              <a href="dashboard.php?page=pengaduanedit&id='.$data['id_pengaduan'].'" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
                              <a href="dashboard.php?page=pengaduanhapus&id='.$data['id_pengaduan'].'"
                              class="btn btn-circle btn-danger btn-sm" name="hapus">
                              <i class="fa fa-trash"></i>
                              
                           </a>
                           

                              ';
                              ?>

                                <button data-target="#Showing<?php echo $data['id_pengaduan'] ?>" data-toggle="modal"
                                    class="btn btn-circle btn-info btn-sm">
                                    <i class="fa fa-search-plus">

                                    </i>
                                    
                                </button>

                                <a href="dashboard.php?page=pengaduan_show&id=<?php echo $data['id_pengaduan'] ?>" 
                                    class="btn btn-circle btn-primary btn-sm" target="_BLANK">
                                    <i class="fa fa-print">

                                    </i>
                                    
                                </a>




                                <div class="modal fade" id="Showing<?php echo $data['id_pengaduan'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="Showing&idLabel" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped table-border">
                                                    <tbody class="responsive">

                                                    <tr style="text-align:center; vertical-align:middle; align-items:center; margin-right:20em;"  width="200px">
                                                        <?php if($data['foto'] != ''){ ?>
                                                            <img src="upload/<?= $data['foto']; ?>" class="img-box" style="" width="200" alt="Foto no-img"png                                                       <?php } else{?>
                                                                <img src="Asset/img/no-img.png" width="100"style=" align-items:center;" alt="No Foto Uploaded">
                                                        <?php }?>
                                                        </tr>
                                                            <hr>
                                                            <?php
                                                                if($data['status'] == '0') { 
                                                                        echo '<div class="btn btn-primary"> <i class="fa fa-info" style="color:white; font-weight:bold; font-size:1em !important;"></i> Belum Di Proses</button>';
                                                                } else if($data['status'] == 'proses') {
                                                                        echo '<div class="btn btn-info"><i class="fa fa-spinner" style="color:blue; font-weight:bold; font-size:1em !important;"></i> Sedang Di Proses</button>';
                                                                }else if($data['status'] == 'tolak'){
                                                                echo '<div class="btn btn-danger btn-sm"><i class="fa fa-times" style="color:white; font-weight:bold; font-size:.9em !important;"></i> Pengaduan di Tolak</button>';

                                                                }else{
                                                                    echo '<div class="btn btn-success"><i class="fa fa-check-circle" style="color:green; font-weight:bold; font-size:1.1em"></i> Proses Selsai</button>';
                                                                }
                                                                ?>
                                                                
                                                               <br>

                                                               <tr>

                                                                <td class="text-left">primary :</td>
                                                                <td class="text"><span><?php echo $data['id_pengaduan'] ?></span></td>
                                                                </tr>

                                                             <tr>

                                                                    <td class="text-left">NIK :</td>
                                                                    <td class="text"><span><b><?php echo $data['nik']; ?></b></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left">Tanggal Pengaduan:</td>
                                                                    <td><span> 
                                                                    <?php
                                                                    $nice = $data['tgl_pengaduan'];
                                                                    $date_new = date("d F, Y (H:s:i)", strtotime($nice));
                                                                    echo "".$date_new.".";
                                                                    ?>
                                                                    </span>
                                                                    </td>
                                                                    <!-- date_format($date,"Y/m/d H:i:s") -->
                                                                   
                                                                </tr>
                                                               
                                                                <tr>
                                                                    <td class="text-left">Nama Lengkap :</td>
                                                                    <td><span> <?php echo $data['nama']; ?></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left">Nama Panggilan :</td>
                                                                    <td><span> <?php echo $data['username']; ?> </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left">Telphone :</td>
                                                                    <td><span>

                                                                    <?php 
                                                                    echo $data['telp'];
                                                                    ?>

                                                                 </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">Laporan :</td>
                                                                <td><span class="flex flex-row"> 
                                                                    <?php
                                                                    echo $data['isi_laporan'];
                                                                    ?>
                                                                </td>
                                                                </span>
                                                            </td>
                                                           
                            </td>


                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" style="color:white !important;"> <i
                        class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

</td>
</tr>


<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>
