

<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
  <h3 class="text-center"> Register here </h3> <hr>
  <form class="form" action="" method="post">
    <?= FH::csrfInput() ?>
    <div class="bg-white"><?= $this->displayErrors ?></div>
    <div class="form-group">
      <label for="fname">username</label>
      <input type="text" id="username" name="username" class="form-control" value="<?=$this->post['username'] ?>">
    </div>
      <div class="form-group">
        <label for="lname">Name</label>
        <input type="text" id="donor_name" name="donor_name" class="form-control" value="<?= $this->post['donor_name'] ?>">
      </div>
      <div class="form-group">
        <label for="donor_email">E-mail</label>
        <input type="email" id="donor_email" name="donor_email" class="form-control" value="<?= $this->post['donor_email'] ?>">
      </div>
      <div class="form-group">
            <label for="acl">User Type</label>
            <select name="acl" id="acl" class="form-control">
                <option value="" selected disabled hidden>Select User type</option>
                <option value=["Offender"]>Offender</option>
                <option value=["TrafficOfficer"]>Traffic Officer</option>
                <option value=["HigherOfficer"]>HigherOfficer</option>
                <option value=["BranchOIC"]>Branch OIC</option>
                <option value=["PaymentOfficer"]>Payment Officer</option>
            </select>
        </div>

      <div class="form-group">
        <label for="password">Choose a Password</label>
        <input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password'] ?>">
      </div>
      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" name="confirm" class="form-control" value="<?= $this->post['confirm'] ?>">
      </div>
      <div class="pull-right">
        <input type="submit" class"btn btn-primary btn-large" value="Register">
      </div>

  </form>
</div>
<?php $this->end(); ?>
