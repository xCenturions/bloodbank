<?php $this->setSiteTitle('Access Restricted'); ?>

<?php $this->start('head'); ?>
<?= $this->content('head'); ?>
<?php $this->end(); ?>


<?= $this->start('body'); ?>
<?= $this->content('body'); ?>
<section id="services" class="services">
  <div class="container">

    <div class="row">
      <div class="col-md-6">
        <div class="icon-box">
          <i class="bi bi-briefcase"></i>
          <h4><a href="#">Access Restricted</a></h4>
        </div>


      </div>
</section>
<?php $this->end(); ?>