<div class="container-fluid">
    <div class="card shadow mb-4">

        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="col-md-12">
            <a href="dashboard.php?page=tanggapantambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah tanggapan</a>
                </div> -->
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">     Tanggapan</h6>
                    </div>
                    <div class="col-md-6 m-9">
                        <div class="float-right">
                        <a href="dashboard.php?page=tanggapantambah" class="btn btn-primary btn-sm"> <i
                                class="fa fa-folder-plus"></i> Tambah Tanggapan</a>
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
                            <th class="text-center">tanggal Tanggapan</th>
                            <th class="text-center">Petugas</th>
                            <th class="text-center">Nama Petugas</th>

                          
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                             $tampil = mysqli_query($koneksi,"SELECT * FROM viewtanggapan");
            
                             while ($data = mysqli_fetch_Array($tampil)){
                        ?>
                        <tr>
                        <td>
                                <?php
                            $nice = $data['tgl_tanggapan'];
                            $date_new = date("d F, Y (l)", strtotime($nice));
                            echo "".$date_new."";
                            ?>
                            </td>
                              <td style="text-align:center; vertical-align:middle">
                                 <?php echo $data['username']; ?>
                              </td>
                              <td style="text-align:center; vertical-align:middle">
                                 <?php echo $data['nama_petugas']; ?>
                              </td>
                             
                              <td style="text-align:center;">
                              <?php
                              echo'
                              <a href="dashboard.php?page=tanggapanedit&id='.$data['id_tanggapan'].'" class="btn-circle btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                              <a href="dashboard.php?page=tanggapanhapus&id='.$data['id_tanggapan'].'"
                              class="btn-circle btn-danger btn-sm" name="hapus">
                              <i class="fa fa-trash"></i>
                            
                           </a>
                              ';
                              
                              ?>
                                <a href="dashboard.php?page=tanggapanshow&id=<?php echo $data['id_tanggapan'] ?>"
                           class="btn btn-circle btn-info btn-sm">
                           <i class="fa fa-search-plus">
                             
                           </i>
                           
                            </a>

                             </td>
                           <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                             </div>