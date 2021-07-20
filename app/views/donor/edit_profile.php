

<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
  <h3 class="text-center"> Register here </h3> <hr>
  <form class="form" action="<?= $this->postAction ?>" method="post">

    <div class="bg-white"><?= $this->displayErrors ?></div>

      <div class="form-group">
        <label for="donor_fname">Name</label>
        <input type="text" id="donor_fname" name="donor_fname" class="form-control" value="<?= $this->post['donor_fname'] ?>">
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
