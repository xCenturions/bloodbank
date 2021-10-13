<?php $this->start('body') ?>


<link rel="stylesheet" href="<?= PROOT ?>css/thankyou.css">
<div class="body">
  <div class="div">Mail Sent.</div>
  <div class="div">
    <span>Check Your Inbox</span><br>


  </div>

  <p>Password Reset link sent to <?= $this->email ?>. Use the link to reset your password </p>

</div>
<?php $this->end() ?>