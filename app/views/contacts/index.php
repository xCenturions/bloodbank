<?php $this->start('body'); ?>

<h1 class="text-center">Contacts</h1>

<table class="table table-striped table-condensed table-bordered table-hover">
  <thred>
    <th>Name</th>
    <th>Email</th>
    <th>Cell Phone</th>
    <th>Adress</th>
  </thred>

  <body>
    <?php foreach($this->contacts as $contact): ?>
      <tr>

        <td>
          <a href="<?=PROOT?>contacts/details/<?= $contact->id ?>" >
            <?= $contact->displayName(); ?>
          </a>
          </td>
        <td><?= $contact->email;?></td>
        <td><?= $contact->cell_phone;?></td>
        <td><?= $contact->address;?></td>
        <td><a href="<?=PROOT?>contacts/edit/<?=$contact->id?>" class="btn btn-info btn-xs">
          <i class="glyphicon glyphicon-pencil"></i>Edit
        </a>


          <a href="<?=PROOT?>contacts/delete/<?=$contact->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure?')){return false};">
              <i class="glyphicon glyphicon-pencil"></i>Delete
          </a>
        </td>

      </tr>
    <?php endforeach; ?>
  </body>
</table>

<?php $this->end(); ?>
