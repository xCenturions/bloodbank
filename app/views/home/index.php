<?php $this->start('head'); ?>


<?php $this->end(); ?>
<?php $this->start('body'); ?>


<?php if (staff() !== null && staff()->acl == '["MLT"]') {

  include('mlt_home.php');
} elseif (staff()) {

  include('staff_home.php');
} elseif (admin()) {
  include('admin_home.php');
} elseif (currentUser()) {
  include('donor_home.php');
} else {
  include('donor_home.php');
}


?>









 

  <?php include 'app/views/layouts/footer.php' ?>
  <?php $this->end(); ?>