
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
 <h1 class="red">Welcome</h1>
 <?= inputBlock('text','Favorite color:','favorite_color','red',['class'=>'form-control'],['class'=>'form-group']); ?>
<?= submitBlock("Save",['class'=>'btn btn-primary'],['class'=>'text-center']); ?>
<?php $this->end(); ?>
