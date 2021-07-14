<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('body'); ?>
<div class =  >
  <a href="<?=PROOT?>contacts" class="btn btn-danger"> Back</a>
  <h2 class="text-center"><?= $this->contact->displayName(); ?></h2>
</div>

<div class="col-md-6">
  <p><strong>Email : </strong><?= $this->contact->email?></p>
  <p><strong>Phone : </strong><?= $this->contact->cell_phone?></p>
  <p><strong>Adress : </strong><?= $this->contact->displayAdress();?></p>
  <p><strong>City : </strong><?= $this->contact->city?></p>
</div>

<div>
  <?= $this->contact->displayAdressLable() ; ?>
</div>
<?php $this->end(); ?>
