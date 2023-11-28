<div class="container-fluid">
    <div class="card shadow mb-4">

        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="col-md-12">
            <a href="dashboard.php?page=petugastambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah petugas</a>
                </div> -->
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-6">
                        <h4 class="m-0 font-weight-bold text-primary">Table Petugas</h4>
                    </div>
                    <div class="col-md-6">
                    <div class="float-right">
                        <a href="dashboard.php?page=petugastambah" class="btn btn-primary btn-sm"> <i
                                class="fa fa-user-plus"></i> Tambah Petugas</a>
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
                            <th class="text-center">Username</th>
                            <th class="text-center">Level</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody >
                        <?php
                             $tampil = mysqli_query($koneksi,"SELECT * FROM petugas");
            
                             while ($data = mysqli_fetch_Array($tampil)){
                        ?>
                        <tr>
                              <td >
                                 <?php echo $data['username']; ?>
                              </td>
                              
                              <td style="text-align:center; vertical-align:middle">
                                <?php 
                                if($data['level'] == 'admin'){
                                echo'<button class="btn btn-primary" style="color:white;"> 
                                <img src="Asset/img/user.png" alt="" class="img-profile rounded-circle" width="20" srcset="">
                                Admin</button>';
                                }else{
                                echo'<button class="btn btn-success" style="color:white;"><i class="fa fa-user-shield"></i> Petugas</button>';

                                }
                                
                                ?>
                            </td>
                            <td style="text-align:center; vertical-align:middle;">
                                <?php if($data['foto_petugas'] != ''){ ?>
                                <img src="Admin-img/<?= $data['foto_petugas']; ?>" class="img-box" style="max-widht:15em;"
                                    width="200" alt="Foto petugas">
                                <?php } else{?>
                                <img src="Asset/img/default.png" width="150"
                                    style="align-items:center;"
                                    alt="No Foto Uploaded">
                                <?php }?>
                            </td>
                              
                             
                            
                              <td style="text-align:center; vertical-align:middle;">
                              <?php
                              echo'
                              <a href="dashboard.php?page=petugasedit&id='.$data['id_petugas'].'" class="btn-circle btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                              <a href="dashboard.php?page=petugashapus&id='.$data['id_petugas'].'"
                              class="btn-circle btn-danger" name="hapus">
                              <i class="fa fa-trash"></i>
                            
                           </a>
                              ';


 
                              ?>

                             
                                <button data-target="#Showing<?php echo $data['id_petugas'] ?>" data-toggle="modal"
                           class="btn btn-circle btn-info ">
                           <i class="fa fa-search-plus">
                             
                           </i>
                           
                            </button>

                            <div class="modal fade" id="Showing<?php echo $data['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="Showing&idLabel"
                                                aria-hidden="true">
                                                
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                                    
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                
                                                        </div>
                                                        <div class="modal-body">
                                                        <table class="table table-striped table-border">
                                                            <tbody class="responsive" style="font-size:1.2em;">

                                                          
                                                             <tr>
                                                                    <td class="text-left">Id :</td>
                                                                    <td class="text"><span><b><?php echo $data['id_petugas']; ?></b></span></td>
                                                                </tr>

                                                               
                                                                <tr>
                                                                    <td class="text-left">Nama Panggilan :</td>
                                                                    <td><span> <?php echo $data['nama_petugas']; ?></span></td>
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
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color:white !important;"> <i class="fa fa-times"></i> Close</button>
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