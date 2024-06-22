<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Web Conference UMB 2024</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
  <link href="<?= base_url('assets/img/logo/LOGO.jpg'); ?>" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/animate/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/venobox/venobox.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url('assets/css/mainstyle.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body>
  <!--==========================
    Intro Section
  ============================-->

  <section id="intro" style="height: 100vh;">
    <div class="intro-container wow fadeIn">
      <div class="logo-container" style="display: flex; align-items: center; justify-content: center;">
        <img src="<?= base_url('assets/img/logo/umb.jpg'); ?>" alt="Logo" class="logo-bulet">
        <img src="<?= base_url('assets/img/logo/LOGO.png'); ?>" alt="Logo" style="width: 15%; margin-right: 20px;">
        <img src="<?= base_url('assets/img/logo/UMSidoarjo.png'); ?>" alt="Logo" style="width: 10%;">
      </div>
      <h1 class="mb-4 pb-0">Accounting Conference<br><span style="color: #3DD99E;">on Sustainability </span>and Technopreneurial (ACST):<br>1st International Series.</h1>
      <p class="mb-4 pb-0">July 3rd & 19th 2024, Muhammadiyah University of Bandung , Indonesia</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="aboutnav">
          <a href="<?= base_url('auth/registration'); ?>" class="navigasion"><img src="assets/img/person_add.png" alt="Register Icon">Register</a>
          <a href="<?= base_url('auth/login'); ?>" class="navigasion"><img src="assets/img/login.png" alt="Login Icon"> Login</a>
          <a href="#schedule" class="navigasion"><img src="assets/img/calendar.png" alt="Schedule Icon"> Schedule</a>
        </div>
      </div>
    </section>

    <div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup" id="popup">
      <p>Coming Soon</p>
      <button onclick="closePopup()">Close</button>
    </div>

    <!--==========================
      Background Section
    ============================-->
    <section id="background" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Background</h2>
          <h3 class="judul">“Accounting Challenges and Opportunities in the Global Era”</h3>
        </div>
        <p>Various efforts are needed to improve the learning process through seminar activities to build a conducive academic atmosphere, especially for academics.
          International seminars that are held will not only contribute to the field of science but can also enhance the performance of universities which ultimately become world-class universities.
          Event organizing of the Accounting Conference on Sustainability and Technopreneurial (ACST): 1st International Series by the Accounting Study Program of
          Muhammadiyah University of Bandung and Muhammadiyah University of Sidoarjo is one of the efforts to build the academic. atmosphere. It is not only intended for lecturers but also for all students.
          This activity is also developed with the Join Seminar program to increase the publication of lecturers and students. As well as accounting competitions thatcan also increase student recognition or achievement at the international level.

        </p>
      </div>
    </section>

    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event Speakers</h2>
          <p>Here are some of our speakers</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/Rektor.png" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3 style="font-size: 17px;"><a href="speaker-details.html">Prof. Dr. Ir. Herry Suhardiyanto, M.Sc., IPU.</a></h3>
                <p>Muhammadiyah University of Bandung</p>
                <p>Indonesia</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/Ataliapraratya.jpg" alt="Speaker 6" class="img-fluid">
              <div class="details">
                <h3 style="font-size: 17px;"><a href="speaker-details.html">Dr. Hj. Atalia Pratatya, SIP., M.I.Kom.</a></h3>
                <p>Indonesia</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/Sigit.png" alt="Speaker 5" class="img-fluid">
              <div class="details">
                <h3 style="font-size: 17px;"><a href="speaker-details.html">Dr. Sigit Hermawan, SE., M.Si., CIQaR., CRP</a></h3>
                <p>Universitas Muhammadiyah Sidoarjo</p>
                <p>Indonesia</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/Bobur.png" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Bobur Subirov</a></h3>
                <p style="font-size: 13px;">Tashkent State University of Economics Samarkand Branch</p>
                <p>Uzbekistan</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/Bisa.png" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Dr. Bisa Sarkar</a></h3>
                <p>Ajeenkya D.Y. Patil University of India</p>
                <p>India</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="assets/img/speakers/LILI.jpg" alt="Speaker 4" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Lili Susanti Binti Samsurijal</a></h3>
                <p>Dean of Bussines School, UniKL</p>
                <p>Malaysia</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Event Schedule</h2>
          <p>Here is our event schedule</p>
        </div>

        <!-- <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Day 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Day 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Day 3</a>
          </li>
        </ul> -->

        <h3 class="sub-heading">“Accounting Challenges and Opportunities in the Global Era”</h3>

        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">
              <div class="col-md-2"><time>08.00 - 08.15</time></div>
              <div class="col-md-10">
                <h4>Opening Ceremony</h4>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>08.15 - 08.20</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Recitation of the Holy Quran</h4>
                <!-- <p>Facere provident incidunt quos voluptas.</p> -->
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>08.20 - 08.30</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div> -->
                <h4>Singing a song</h4>
                <p>Indonesia Raya and Sang Surya</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>08.30 - 08.40</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/3.jpg" alt="Cole Emmerich">
                </div> -->
                <h4>Committee Chairman’s Report</h4>
                <p>Yasar M Farhan</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>08.40 - 08.55</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/logo/LOGO.png" alt="Jack Christiansen">
                </div> -->
                <h4>Opening of ACST 2024</h4>
                <p>Opening speech from Prof. Dr. Ir. Herry Suhardiyanto, M.Sc., IPU.</p>
              </div>
            </div>


            <div class="row schedule-item">
              <div class="col-md-2"><time>08.55 - 09.10</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div> -->
                <h4>Keynote Speaker</h4>
                <p>Dr. Hj. Atalia Pratatya, SIP., M.I.Kom.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>09.10 - 09.15</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/6.jpg" alt="Willow Trantow">
                </div> -->
                <h4>Group Photo</h4>
                <!-- <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p> -->
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>09.15 - 09.45</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Speaker 1</h4>
                <p>Bobur Subirov</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>09.45 - 10.15</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Speaker 2</h4>
                <p>Lili Susanti Binti Samsurijal</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10.15 - 10.45</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Speaker 3</h4>
                <p>Dr. Sigit Hermawan, SE., M.Si., CIQaR., CRP.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10.45 - 11.15</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Speaker 4</h4>
                <p>Dr. Bisa Sarkar</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10.45 - 11.15</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Break</h4>
                <!-- <p>Name of Speaker 4</p> -->
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>13.00 - 13.30</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>QNA Session</h4>
                <p>QNA Sessinon with Speaker</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>13.30 - 14.30</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Winners Announcement</h4>
                <p>Olympic Winners Announcement</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>14.30 - 15.00</time></div>
              <div class="col-md-10">
                <!-- <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div> -->
                <h4>Closing</h4>
                <p>Closing Ceremony</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 1 -->

        </div>

      </div>

    </section>

    <!--==========================
      Venue Section
    ============================-->
    <section id="venue" class="wow fadeInUp">

      <div class="container-fluid">

        <div class="section-header">
          <h2>Event Venue</h2>
          <p>Event venue location info and gallery</p>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6181133131918!2d107.70586387573965!3d-6.936162567898753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e87f933b6c55%3A0x8481a5df48e2a169!2sUniversitas%20Muhammadiyah%20Bandung!5e0!3m2!1sid!2sid!4v1717543511681!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>Accounting Conference on Sustainability and Technopreneurial (ACST) 2024</h3>
                <p>Lecturers and students around 400 participants from several universities
                  participated in various series of events to develop the potential of participants
                  in the field of accounting through the Accounting Conference on Sustainability
                  and Technopreneurial (ACST): 1 st International Series.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="https://bandungmu.com/wp-content/uploads/2022/06/UMB-1.jpg" class="venobox" data-gall="venue-gallery">
                <img src="https://bandungmu.com/wp-content/uploads/2022/06/UMB-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="https://bandungmu.com/wp-content/uploads/2023/07/UM-Bandung-3.jpg" class="venobox" data-gall="venue-gallery">
                <img src="https://bandungmu.com/wp-content/uploads/2023/07/UM-Bandung-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="https://www.menpan.go.id/site/images/berita_foto_backup/2022/20221207_-_Kunjungan_Riset_dan_Praktik_Universitas_Muhammadiyah_Bandung_6.jpeg" class="venobox" data-gall="venue-gallery">
                <img src="https://www.menpan.go.id/site/images/berita_foto_backup/2022/20221207_-_Kunjungan_Riset_dan_Praktik_Universitas_Muhammadiyah_Bandung_6.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ge46dhzk7vagmsmc28w4v6gv.jpg" class="venobox" data-gall="venue-gallery">
                <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ge46dhzk7vagmsmc28w4v6gv.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/5.jpg" class="venobox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/6.jpg" class="venobox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/7.jpg" class="venobox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/8.jpg" class="venobox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a> -->
        </div>
      </div>

      </div>
      </div>

    </section>

    <!--==========================
      Gallery Section
    ============================-->
    <!-- <style>
      #gallery {
        background-color: white;
      }
    </style>
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        <a href="assets/img/gallery/1.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/1.jpg" alt=""></a>
        <a href="assets/img/gallery/2.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/2.jpg" alt=""></a>
        <a href="assets/img/gallery/3.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/3.jpg" alt=""></a>
        <a href="assets/img/gallery/4.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/4.jpg" alt=""></a>
        <a href="assets/img/gallery/5.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/5.jpg" alt=""></a>
        <a href="assets/img/gallery/6.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/6.jpg" alt=""></a>
        <a href="assets/img/gallery/7.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/7.jpg" alt=""></a>
        <a href="assets/img/gallery/8.jpg" class="venobox" data-gall="gallery-carousel"><img src="assets/img/gallery/8.jpg" alt=""></a>
      </div>

    </section> -->

    <!--==========================
      Sponsors Section
    ============================-->
    <!-- <section id="sponsors" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        <div class="row no-gutters sponsors-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/1.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/2.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/4.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/5.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/6.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/7.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="assets/img/sponsors/8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section> -->

    <!--==========================
      F.A.Q Section
    ============================-->
    <!-- <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">

                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq1" class="collapse" data-parent="#faq-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq2" class="collapse" data-parent="#faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq4" class="collapse" data-parent="#faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq5" class="collapse" data-parent="#faq-list">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq6" class="collapse" data-parent="#faq-list">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                    </p>
                  </div>
                </li>
      
              </ul>
          </div>
        </div>

      </div>

    </section> -->

    <!--==========================
      Subscribe Section
    ============================-->
    <!-- <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
        </div>

        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section> -->

    <!--==========================
      Buy Ticket Section
    ============================-->
    <!-- <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Buy Tickets</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">$150</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">$250</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div> -->
    <!-- Pro Tier -->
    <!-- <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">$350</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div> -->

    <!-- Modal Order Form -->
    <!-- <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="ticket-type" class="form-control" >
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section> -->

    <!--==========================
      Contact Section
    ============================-->
    <!-- <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Nihil officia ut sint molestiae tenetur.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section>#contact -->

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <img src="assets/img/logo/LOGO.png" alt="TheEvenet">
            <p>Various efforts are needed to improve the learning and academic atmosphere. International seminars such as Accounting Conference on Sustainability and Technopreneurial (ACST): 1st International Series by Universitas Muhammadiyah Bandung and Universitas Muhammadiyah Sidoarjo contribute to knowledge and improve university performance. These activities are aimed at lecturers and students, and include Join Seminar programs to increase accounting publications and competitions for students' international recognition.</p>
          </div>

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <div class="col-lg-6 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Universitas Muhammadiyah Bandung<br>
              Jl. Soekarno Hatta No.752, Cipadung Kidul, Kec. Panyileukan, Bandung City<br>
              Indonesia <br>
              <strong>Phone:</strong> 0895 3719 53670 or 0896 8723 9219<br>
              <strong>Email:</strong> <a href="https://umbandung.ac.id/">https://umbandung.ac.id/</a><br>
            </p>

            <!-- <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div> -->

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>UMbandung</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        Designed by <a href="https://www.instagram.com/raihanmubarok_/">rehaanhan</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?= base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/easing/easing.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?= base_url(); ?>assets/lib/superfish/superfish.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/wow/wow.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/venobox/venobox.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/js/main.js"></script>
</body>

</html>