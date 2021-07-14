<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
  <form class="form" action="<?=PROOT?>donor/login" method="post">
<?= FH::csrfInput(); ?>
    <div class="bg-danger"><?=$this->displayErrors ?></div>
    <h3 class="text-center">Log in</h3>
    <div class="form-group">
            <label for="acl">User Type</label>
            <select name="acl" id="acl" class="form-control">
                <option value="" selected disabled hidden>Select User type</option>
                <option value="Donor">Donor</option>
                <option value="Staff">Staff</option>
            </select>
    </div>
    <div class="form-group">
      <label for="username">username</label>
      <input type="text" name="username" id="username" class="form-control" >
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" >
    </div>
  <div class="form-group">
    <label for="remember_me">Remember Me <input type="checkbox" name="remember_me" id="remember_me" value="on" > </label>
  </div>
  <div class="form-group">
    <label for="remember_me">Remember Me
      <input type="checkbox" name="remember_me" id="remember_me" value="on" >
    </label>
  </div>
  <div class="form-group">
    <input type="submit" value="login" class="btn btn-large btn-primary">
  </div>
  <div class="text-right">
    <a href="<?=PROOT?>donor/register" class="text-primary">Register</a>

  </div>
  </form>
</div>
<?php $this->end(); ?>
