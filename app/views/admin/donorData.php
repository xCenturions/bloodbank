<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Personal Information</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Team</li>
      </ol>
    </div>

  </div>
</section>

<section id="team" class="team ">
  <div class="container">

    <div class="row">

      <!-- <div class="col-lg-6"> -->
      <div class="member d-flex align-items-start">
        <!-- <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div> -->
        <div class="member-info">
          <h4><?= $this->data->displayName();  ?></h4>
          <span></span>

          <p><strong>Email : </strong> <?= $this->data->donor_email ?></p>



          <a href="<?= PROOT ?>donor/qrcode/<?= $this->data->id ?>" class="getstarted">Generate QR Code</a>
        </div>
      </div>
    </div>





    <?php $this->end(); ?>