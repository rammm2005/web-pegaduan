


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
  <link rel="icon" type="image/png" href="User-asset/Asset/img/logo-icon.png" sizes="16x16">

  <link rel="stylesheet" href="User-asset/Asset/css/navbar.css">
  <link rel="stylesheet" href="User-asset/Asset/css/form.css">
  <link rel="stylesheet" href="User-asset/Asset/css/animate.min.css">
  <link rel="stylesheet" href="User-asset/Asset/css/aos.css">
  <link rel="stylesheet" href="User-asset/Asset/css/slider.css">
  <link rel="stylesheet" href="User-asset/Asset/css/swiper.min.css">


  <!-- FONT AWSOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
  <script src="../admin-Page/Asset/sweetalert/sweetalert.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->



</head>

<?php
include 'User-asset/include/header-2.php';
?>
<body>

  <div class="main-text" style="justify-content:center;">
    <!-- 
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_vn3TKBdEJK.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player> -->
    <h1 data-aos="fade-right">Layanan Pengaduan & Aspirasi Masyarakat Indonesia</h1>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_AqsD4wVNua.json" background="transparent"
      speed="1" style="width: 650px; height: 450px;" loop autoplay></lottie-player>

  </div>
  <section class="main-content" height="100vh !important">


    <h1 class="heading" style="margin-bottom:1.5em;">contoh Pengaduan yang benar</h1>

    <div class="slider-container" data-aos="fade-up">
      <div class="slider">
        <div class="slider__item">
          <img src="User-asset/Asset/img/maxresdefault.jpg" alt="">
          <span class="slider__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<a href="">Далее >></a>
          </span>
        </div>
        <div class="slider__item">
          <img src="User-asset/Asset/img/Tata-cara-pengaduan-1.png" alt="">
          <span class="slider__caption">2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa,
            facilis.</span>
        </div>
        <div class="slider__item">
          <img src="User-asset/Asset/img/FmquwL5aAAEIKug.jpg" alt="">
          <span class="slider__caption">3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit,
            culpa!</span>
        </div>
      </div>
      <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
              d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z" />
          </svg></span>
      </div>
      <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
              d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z" />
          </svg></span>
      </div>
    </div>

  



   <div class="swiper-container">
        <div class="swiper-wrapper" data-aos="fade-up">

      <?php
    include 'User-asset/include/koneksi.php';
      $show = mysqli_query($con , "SELECT * FROM viewtanggapan");
      // $show = mysqli_query($con , "SELECT * FROM tanggapan JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan");

      while($data = mysqli_fetch_array($show)){
    ?>

     

          <?php
if($data['status'] != 'tolak'){
?>

 <div class="swiper-slide">
                <div class="info">
            <?php
        if($data['status'] == 'tolak'){
          echo '
          <div class="status">
          <button class="btn-tolak"> <i class="fa fa-times"></i> di tolak </button>
        </div>
          ';
       
        }else if($data['status'] == 'proses'){
          echo '
          <div class="status">
          <button class="btn-proses"> <i class="fa fa-times"></i> di Proses </button>
        </div>
          ';
        }else if($data['status'] == '0'){
          echo '
          <div class="status">
          <button class="btn-belum"> <i class="fa fa-times"></i> belum Proses </button>
        </div>
          ';
        }else{
          echo '
          <div class="status">
          <button class="btn-selesai"> <i class="fa fa-times"></i> Finish </button>
        </div>
          ';
        }
        ?>
            <?php if($data['foto'] != ''){ ?>
            <div class="img-area">

              <img src="admin-Page/upload/<?= $data['foto']; ?>" width="400" width="300" height="250" alt="Foto Bukti pengaduan">
            </div>
            <?php } else{?>
            <div class="img-area">

              <img src="admin-Page/Asset/img/no-img.png" width="200" alt="No Foto Uploaded">
            </div>
            <?php }?>
            <!-- <img src="User-asset/Asset/img/FmquwL5aAAEIKug.jpg" alt="" class="img"> -->
            <hr class="line">
            <i class="masyarakat"><?php echo $data['username'] ?></i>
            <br>
            <p><?php echo $data['isi_laporan'] ?></p>
            <p style="color:red;">
            <?php
            
            $nice = $data['tgl_pengaduan'];
            $date_new = date("d F, Y , (m.h)", strtotime($nice));
            echo "".$date_new.".";
            
            ?></p>

            </div>
            
            <a href="tanggapan.php?&id=<?=$data['id_tanggapan']?>" class="btn-showing-tanggapan" onclick="return confirm('Anda akan memasuki Secret site?');">Lihat Tanggapan</a>


            </div>

          <?php 
}
    ?>

          <?php
      }
?>

    </div>

<div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <div class="swiper-pagination"></div>


</div>




  </section>



  <?php
include 'User-asset/include/footer-2.php';
?>

  <script src="User-asset/Asset/js/jquery-3.6.3.js"></script>
  <script src="User-asset/Asset/js/script.js"></script>
  <!-- <script src="User-asset/Asset/js/swiper.js"></script> -->
  <script src="User-asset/Asset/js/slider.js"></script>
  <script src="User-asset/Asset/js/swiper.min.js"></script>
  <script>
        var swiper = new Swiper('.swiper-container', {
            effect: 'parallax',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
            rotate: 60,
            stretch: 0,
            depth: 100,
            modifier: 5,
            slideShadows : true,
            },
            autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      type: "dynamic"
            },
            navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
        });
    </script>
 


  <script>
    $(".slider-container").ikSlider({
      speed: 500
    });
    $(".slider-container").on('changeSlide.ikSlider', function (evt) {
      console.log(evt.currentSlide);
    });
  </script>
  <script src="User-asset/Asset/js/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>