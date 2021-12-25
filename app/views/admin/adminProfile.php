<?php $this->start('body') ?>
		<link rel="stylesheet" href="<?=PROOT?>css/staffpro.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
         
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                 <?php if(isset($this->adminData->pro_img)) : ?>
                    <img src="<?=PROOT?>app/views/staff/pro_img/<?= $this->adminData->pro_img?>" alt="Admin" class="rounded-circle" border="5" height="200 "width="200">
                        <?php else: ?>
                            <img src="<?=PROOT?>app/views/staff/pro_img/avatar.png" alt="Admin" class="rounded-circle" width="200">
                        <?php endif; ?>
                    <div class="mt-3">
                      <h4>John Doe</h4>
                    
                      <p class="text-muted font-size-sm"><?= $this->adminData->assigned ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Mobile</h6>
                    <span class="text-secondary"><?= $this->adminData->mobile ?></span>
                  </li>
                 
                 
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?= $this->adminData->name ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $this->adminData->email ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?= $this->adminData->username ?>
                    </div>
                  </div>
                   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Assigned Blood Bank</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?= $this->adminData->assigned ?>
                    </div>
                  </div>
                  <hr>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <?= $this->adminData->staff_address ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info "  href="<?=PROOT?>staff/editProfile/<?= base64_encode($this->adminData->id) ?> ">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              


            </div>
          </div>

        </div>
    </div>
<?php $this->end() ?>