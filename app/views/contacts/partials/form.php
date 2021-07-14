<form class="form" acion=<?= $this->postAction ?> method ="post">
<div ><?= $this->displayErrors ?></div>
<?= FH::csrfInput() ?>
<?= inputBlock('text','First Name','fname',$this->contact->fname,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
<?= inputBlock('text','Last Name','lname',$this->contact->lname,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
<?= inputBlock('text','email','email',$this->contact->email,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
<?= inputBlock('text','Adress','address',$this->contact->address,['class'=>'form-control'],['class'=>'form-group col-md-5']);?>
<?= inputBlock('text','City','city',$this->contact->city,['class'=>'form-control'],['class'=>'form-group col-md-4']);?>
<?= inputBlock('text','Zip','zip',$this->contact->zip,['class'=>'form-control'],['class'=>'form-group col-md-3']);?>
<?= inputBlock('text','Phone','cell_phone',$this->contact->cell_phone,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
<div class="text-center">
  <a href="<?=PROOT?>contacts" class="btn btn-outline-danger" > Cancel</a>
  <?= submitTag('Save',['class'=>'btn btn-success']) ?>
</form>
