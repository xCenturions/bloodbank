

<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
  <h3 class="text-center"> Register here </h3> <hr>
  <form class="form" action="" method="post">

    <div class="bg-white"><?= $this->displayErrors ?></div>

      <div class="form-group">
        <label for="lname">Name</label>
        <input type="text" id="donor_name" name="donor_name" class="form-control" value="<?= $this->post['donor_name'] ?>">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="donor_email" name="donor_email" class="form-control" value="<?= $this->post['donor_email'] ?>">
      </div>



      <div class="pull-right">
        <input type="submit" class"btn btn-primary btn-large" value="update">
      </div>

  </form>
</div>
<?php $this->end(); ?>
