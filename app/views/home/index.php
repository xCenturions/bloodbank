<?php $this->start('head'); ?>
<link href="<?= PROOT ?>css/homecards.css" rel="stylesheet">

<?php $this->end(); ?>
<?php $this->start('body'); ?>



<section id="hero">


  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(img/slide/slide-1.jpg) ;">



        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown"><?= displayRole(); ?></h2>
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Blood Bank Management System</span></h2>
            <p class="animate__animated animate__fadeInUp">Our Blood Bank mission is to serve our community by meeting the needs of patients, hospitals, and donors for safe, high quality blood products and related services.</p>
            <?php if (Session::exists(STAFF_SESSION_NAME)) : ?>
              <a href="<?= PROOT ?>staff" class="btn-get-started animate__animated animate__fadeInUp scrollto">Go to the Services Panel</a>
            <?php else : ?>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php if (currentUser()) : ?>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(img/slide/slide.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Who can donate blood?</h2>
              <p class="animate__animated animate__fadeInUp">The person must fulfill several criteria to be accepted as a blood donor. These criteria are set forth to ensure the safety of the donor as well as the quality of donated blood.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(img/slide/1000.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Why should people donate blood?</h2>
              <p class="animate__animated animate__fadeInUp">Safe blood saves lives. Blood is needed by women with complications during pregnancy and childbirth, children with severe anaemia, often resulting from malaria or malnutrition, accident victims and surgical and cancer patients.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      <?php endif; ?>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>National Blood Transfusion Service</h2>
          <h3>To be a unique model for the world securing quality assured blood services, through a nationally coordinated system</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Recently NBTS Sri Lanka proudly anounced that
            we have 100% voluntory blood donor base.
            Achievement of this figure is only a dream to all
            developing countries and most of the developped countries.
            We as Sri Lankan can be proud of this
            acheivement just because of your dedication.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> 100% of our donors are voluntory, non remunerated donors</li>

          </ul>
          <p class="fst-italic">
            The main function of NBTS is to collect,
            process and deliver safe blood,
            blood components and blood products
            through 19 cluster centres and
            77 peripheral blood banks situated
            island wide
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients section-bg">
    <div class="container ">

      <div class="row justify-content-center">



        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/clients/cl.jpg" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/clients/who.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/clients/moh.jpg" class="img-fluid" alt="">
        </div>


      </div>

    </div>
  </section><!-- End Clients Section -->

  <!-- ======= Services Section ======= -->
  <?php if (currentUser()) : ?>

    <div class="homes">



      <img src="img/home/img.jpeg" style="width:100%">
      <div class=" text-block">
        <strong> Give Blood</strong>

      </div>
      <div>
        <p class=" text-block1">Donating Blood Makes a Big Difference in the Lives of Others.</p>

      </div>
      <center><button type="button" class="btn btn-danger" style="top:70%;left:42%;position:absolute;">Register as a Donor</button></center>

      <br>

    </div>
    <div class="homes">
      <div class="row">
        <div class="col-sm-4">
          <div class="card text-white card-has-bg click-col" style="background-image:url('img/home/bld.JPG');">
            <img class="card-img d-none" src="img/home/bld.JPG" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <h2 class="card-meta mb-2">Find Nearest Blood Bank</h2>

                <center> <small>NBTS consists of 96 hospital based blood banks affiliated to 19 cluster centers based on their geographic location. National Blood Center at Elvitigala Mawatha Narahenpita is the operational headquarters where national
                    policies are developed and implement for the efficient operation of blood bank network in the country. </small></center>

              </div>

            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card text-white card-has-bg click-col" style="background-image:url('img/home/app.JPG');">
            <img class="card-img d-none" src="img/home/app.JPG" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <h2 class="card-meta mb-2"><a class="card-meta mb-2" href="<?= PROOT ?>appo/makeAppo">Make An Appointment</h2></a>

                <center> <small>Now you can make an appointment online via this link for island wide selected blood centers.
                    Please reserve your convenient time slot as you wish. Donate Blood, Save a Life.</small></center>

              </div>

            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card text-white card-has-bg click-col" style="background-image:url('img/home/camp.JPG');">
            <img class="card-img d-none" src="img/home/camp.JPG" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <h2 class="card-meta mb-2"> <a class="card-meta mb-2" href="<?= PROOT ?>staff">Organize a Blood Camp</h2></a>

                <center> <small>By organizing a blood donation campaign, you can give your society a chance to donate blood. It is not that difficult or expensive to organize a campaign in your area or work place. </small></center>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  <?php endif ?>


  <?php include 'app/views/layouts/footer.php' ?>
  <?php $this->end(); ?>