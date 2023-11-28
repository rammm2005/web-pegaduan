<?php
    $id     = $_GET['id'];
    $tampil	= mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
    $data	= mysqli_fetch_array($tampil);
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <?php if($data['foto_petugas'] != ''){ ?>
                                <img src="Admin-img/<?= $data['foto_petugas']; ?>" class="circle img-fluid"
                                    width="200" alt="Foto petugas">
                                <?php } else{?>
                                <img src="Asset/img/default.png" class="rounded-circle img-fluid" width="150"
                                    style="align-items:center;"
                                    alt="No Foto Uploaded">
                                <?php }?>
        
            <h5 class="my-3"><?php echo $data['nama_petugas']  ?></h5>
            <hr>
            <p class="text">Tingkat Level</p>
            <p class="text-muted mb-4"> <i class="fab fa-github fa-lg" style="color: #333333;"></i> <?php echo $data['level']  ?></p>
           
          </div>
        </div>
        <!-- <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div> -->
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['username']  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Call Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['nama_petugas']  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['telp']  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(+62) <?php echo $data['telp']  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Your Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['password']  ?></p>
              </div>
            </div>
          </div>
        </div>

        <?php
            if($data['level'] == 'admin'){
                echo'

                <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">Role </span> Admin Memiliki Hak Lebih ke Halaman di bawah Ini
                      </p>
                      <p class="mb-1" style="font-size: .77rem;">Petugas</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Masyarakat</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Tanggapan</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Pengaduan</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                      </div>
                    </div>
                  </div>
                </div>
                ';
            }else{
                echo'
                <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">Role </span> Petugas Hanya Memiliki Hak yang terbatas ke Halaman di bawah Ini
                      </p>
                      <p class="mb-1" style="font-size: .77rem;">Petugas</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Masyarakat</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Tanggapan</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Pengaduan</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                      </div>
                    </div>
                  </div>
                </div>
                ';
            }
        ?>
        
        </div>
      </div>
    </div>
  </div>
</section>