<?php $this->setSiteTitle('Edit Contact')?>
<?php $this->start('body')?>
<div>
  <h2 class="tect-center">Edit<?= $this->contact->displayName()?></h2>
    <?php $this->partial('contacts','form')?>
</div>
<?php $this->end()?>
