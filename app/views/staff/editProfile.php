<?php $this->start('body') ?>
<link rel="stylesheet" href="<?=PROOT?>css/editstaffpro.css">
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row gutters">
			<div ><?= $this->displayErrors ?></div>
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		 <div class="card h-100">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
					
					  <?php if(isset($this->data->pro_img)) : ?>
                    <img src="<?=PROOT?>app/views/staff/pro_img/<?= $this->data->pro_img?>" alt="Admin" class="rounded-circle" height="200 "width="200">
					<?php else: ?>
						  <img src="<?=PROOT?>app/views/staff/pro_img/avatar.png" alt="Admin" class="rounded-circle" width="200">
					<?php endif; ?>
					<label class="btn btn-danger btn-file"  style="margin-top:20px;">
    					Change Photo <input type="file" id="file" name="file" style="display: none;" >
					</label>
 
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                     
                    </div>
                  </div>
                </div>
              </div>
	</div>
	<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Full Name</label>
							<input type="text" class="form-control" name="staff_name" id="staff_name" placeholder="Enter full name" value="<?= $this->data->staff_name ?>">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" name="" id="eMail" placeholder="Enter email ID">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="website">Website URL</label>
							<input type="url" class="form-control" id="website" placeholder="Website url">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Address</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Street">Street</label>
							<input type="name" class="form-control" id="Street" placeholder="Enter Street">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="ciTy">City</label>
							<input type="name" class="form-control" id="ciTy" placeholder="Enter City">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="sTate">State</label>
							<input type="text" class="form-control" id="sTate" placeholder="Enter State">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="zIp">Zip Code</label>
							<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="button"  class="btn btn-secondary">Cancel</button>
							<button type="submit"   class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
	
</div>
</form>

<?php $this->end() ?>