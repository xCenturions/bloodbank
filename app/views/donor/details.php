
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

  <div class="col-lg-6">
    <div class="member d-flex align-items-start">
      <!-- <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div> -->
      <div class="member-info">
        <h4><?= currentUser()->donor_name ?></h4>
        <span></span>

        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>
        <p><strong>Email :  </strong> <?= currentUser()->donor_email?></p>

<a href="<?=PROOT?>donor/edit_profile" class="getstarted">Edit</a><br>
<a href="<?=PROOT?>Appo/index" class="getstarted">My Appointments</a>
      </div>
    </div>
  </div>

<?php $this->end(); ?>
