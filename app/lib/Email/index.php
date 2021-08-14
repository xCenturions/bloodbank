<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	
</head>
<body>
	<div class="container mt-5">
		<form action="signup.php" method="post" autocomplete="off">
			<div class="row">
				<div class=" col-md-12  mt-4">
					<label for="name">Full Name</label>
					<div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-user" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="full_name"  placeholder="Enter Full Name">
					</div>
				</div>

				<div class=" col-md-12 mt-4">
					<label for="email">Email</label>
					<div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<input type="email" class="form-control" name="email_address"  placeholder="Enter Email">
					</div>
				</div>

				<div class=" col-md-12 mt-4">
					<label for="password">Password</label>
					<div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-lock" aria-hidden="true"></i></span>
						<input type="password" class="form-control" name="password"  id="password" placeholder="Enter Password">

						<div class="input-group-prepend">
							<div class="input-group-text">
								<a href="#" class="text-dark" id="icon-click">
									<i class="fa fa-eye" id="icon"></i>
								</a>
							</div>
						</div>

					</div>
				</div>

			</div>
			<button type="submit" name="submit" id="submit" class="btn btn-primary mt-4">Submit</button>
		</form>
	</div>
	<script scr="bootstrsp.js"></script>
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$("#icon-click").click(function(){
			$("#icon").toggleClass('fa-eye-slash');

			var input =$("#password");
			if(input.attr("type")==="password"){
				input.attr("type","text");
			}else{
				input.attr("type","password");
			}
		});

		});
	</script>

</body>
</html>