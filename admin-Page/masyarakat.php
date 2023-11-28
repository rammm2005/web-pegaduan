<div class="container-fluid">
    <div class="card shadow mb-4">

        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="col-md-12">
            <a href="dashboard.php?page=masyarakattambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Masyarakat</a>
                </div> -->
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Table Masyarakat</h6>
                    </div>
                    <div class="col-md-6 ">
                        <div class="float-right">
                            <a href="dashboard.php?page=masyarakattambah" class="btn btn-primary btn-sm"> <i
                                    class="fa fa-plus"></i> Tambah Masyarakat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable table-hover table-striped" id="dataTable" role="grid"
                    width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Nik</th>
                            <th class="text-center">Username</th>

                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody style="font-size:0.9em !important;">
                        <?php
                             $tampil = mysqli_query($koneksi,"SELECT * FROM masyarakat");
            
                             while ($data = mysqli_fetch_Array($tampil)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $data['nik']; ?>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <?php echo $data['username']; ?>
                            </td>

                            <td style="text-align:center; vertical-align:middle;">
                                <?php
                              echo'
                              <a href="dashboard.php?page=masyarakatedit&id='.$data['nik'].'" class="btn btn-circle btn-warning btn-sm"><i class="fas fa-fw fa-edit "></i></a>
                              <a href="dashboard.php?page=masyarakathapus&id='.$data['nik'].'"
                              class="btn btn-circle btn-danger btn-sm" name="hapus">
                              <i class="fa fa-trash"></i>
                            
                           </a>
                              ';
                              
                              ?>
                                <button data-target="#Showing<?php echo $data['nik'] ?>" data-toggle="modal"
                                    class="btn btn-circle btn-info btn-sm">
                                    <i class="fa fa-search-plus">

                                    </i>

                                </button>

                                <div class="modal fade" id="Showing<?php echo $data['nik'] ?>" tabindex="-1"
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
                                                    <tbody class="responsive" style="font-size:1.2em;">


                                                        <tr>
                                                            <td class="text-left">NIK :</td>
                                                            <td class="text">
                                                                <span><b><?php echo $data['nik']; ?></b></span></td>
                                                        </tr>


                                                        <tr>
                                                            <td class="text-left">Nama Panggilan :</td>
                                                            <td><span> <?php echo $data['nama']; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Nama Lengkap :</td>
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
                                                            <td class="text-left">Password :</td>
                                                            <td><span>
                                                                    <?php
                                                                    echo $data['password'];
                                                                    ?>
                                                            </td>
                                                            </span>
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