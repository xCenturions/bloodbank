<?php $this->start('body') ?>
<link rel="stylesheet" href="<?= PROOT ?>css/editstaffpro.css">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Edit Your Profile</h2>
        
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<form action="" method="post" enctype="multipart/form-data">
	<div class="container">
		
		<div class="row gutters">
			<div><?= $this->displayErrors ?></div>
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">

							<?php if (isset($this->data->pro_img)) : ?>
								<img src="<?= PROOT ?>app/views/staff/pro_img/<?= $this->data->pro_img ?>" alt="Admin" class="rounded-circle" height="200 " width="200">
							<?php else : ?>
								<img src="<?= PROOT ?>app/views/staff/pro_img/avatar.png" alt="Admin" class="rounded-circle" width="200">
							<?php endif; ?>
							<label class="btn btn-danger btn-file" style="margin-top:20px;">
								Change Photo <input type="file" id="file" name="file" style="display: none;">
							</label>

							<div class="mt-3">
								<h4><?= $this->data->staff_name ?></h4>
								<p class="text-secondary mb-1"><?= $this->data->designation ?></p>
								<p class="text-muted font-size-sm"><?= $this->data->staff_address ?></p>

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
									<input type="email" class="form-control" name="" id="eMail" placeholder="Enter email ID" value="<?= $this->data->staff_email ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" id="phone" placeholder="Enter phone number" value="<?= $this->data->staff_mobile ?>">
								</div>
							</div>
							

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="Address">Address</label>
									<input type="text" class="form-control" id="Address" placeholder="Enter Address" value="<?= $this->data->staff_address ?>">
								</div>
							</div>


						</div>
						<div class="row gutters mt-5">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<a href="<?= PROOT ?>staff/staffProfile"><button type="button" class="btn btn-secondary">Cancel</button></a>
									<button type="submit" class="btn btn-primary">Update</button>
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