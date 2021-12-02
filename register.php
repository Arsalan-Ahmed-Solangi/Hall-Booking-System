<?php 

	//*****Check Session******//
    session_start();
	if(isset($_SESSION['admin'])){
		header("Location:admin/index.php");
	}else if(isset($_SESSION['owner'])){
		header("Location:owner/index.php");
    }else if(isset($_SESSION['client'])){
    	header("Location:index.php");
    }
	//*****Check Session*********//


	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<style type="text/css">
		label.error {
		  color: #a94442;
		  width:100%;
		  background-color: #f2dede;
		  border-color: #ebccd1;
		  padding: 15px;
		  font-weight: 600;
		  margin-top: 10px;
		  border: 1px solid transparent;
		  border-radius: 4px;
		}
	</style>
</head>
<body style="background:#34495E;">



	<div class="container mt-5">
		<div class="card shadow-lg bg-white p-2" style="width:70%; margin: auto;">
			<div class="card-body">
				<h4 align="center">ONLINE BANQUET SYSTEM</h4>	
				<h6 align="center" style="text-transform: uppercase; color: #85929E;">Create your account</h6>
				<hr/>
				<?php 

                if(isset($_SESSION['success'])){

                    ?>
                    <div class="alert alert-success mt-1" id="message">
                        <b><?php echo $_SESSION['success']?></b>

                    </div>
                    <?php
                    unset($_SESSION['success']);

                }else if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger mt-1" id="message">
                        <b><?php echo $_SESSION['error']?></b>

                    </div>
                    <?php
                    unset($_SESSION['error']);
                }



                ?>
				<form action="process.php" method="POST" id="form">

					<div class="row">
						<div class="col-md-6 col-xs-6 col-sm-6">
							<div class="form-group mb-2">
								<strong>Full Name <span class="text-danger">*</span></strong>
								<input type="text" minlength="4" maxlength="20" name="fullname" placeholder="Enter Full Name" required class="form-control">
							</div>
						</div>

						<div class="col-md-6 col-xs-6 col-sm-6">
							<div class="form-group mb-2">
								<strong>Phone Number <span class="text-danger">*</span></strong>
								<input type="number" minlength="11" maxlength="11" name="number" placeholder="Enter Phone No" required class="form-control">
							</div>
						</div>


					</div>
					

					<div class="form-group mb-2">
						<strong>Email Address <span class="text-danger">*</span></strong>
						<input type="email" minlength="5" maxlength="40" name="email" placeholder="Enter your email address" required class="form-control">
						<p style="font-size: 14px;" class="text-success">please provide valid email</p>
					</div>

					<div class="row mb-2">
						<div class="col-md-6 col-xs-6 col-sm-6">
							<strong>Password <span class="text-danger">*</span></strong>
							<input type="password" minlength="4" maxlength="20" name="password" placeholder="Enter your password" required class="form-control">
						</div>

						<div class="col-md-6 col-xs-6 col-sm-6">
							<strong>Confirm Password <span class="text-danger">*</span></strong>
							<input type="password" minlength="4" maxlength="20" name="confirm_password" placeholder="Confirm your password" required class="form-control">
						</div>
					</div>


					<div class="form-group mb-2">
						<center>
							<button name="register" class="btn btn-dark" type="submit" class="form-control"><i class="fa fa-user"></i>	Register</button>
							<p class="mt-2">Already have an account? <a class="text-dark" style="font-weight: 600;" href="login.php">Login <a></p>
						</center>

					</div>
				</form>
			</div>
		</div>
	</div>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(function() {

			$("#message").delay(1000).fadeOut(1000);
			$(".error").delay(1000).fadeOut(1000);

			jQuery.validator.addMethod("lettersonly", function(value, element) {
			  return this.optional(element) || /^[a-z ]+$/i.test(value);
			}, "Full name contain only alphabets"); 

		  $("#form").validate({
		   
		    rules: {
		   	
		   	  fullname:{
		   	  	lettersonly:true,
		   	  	required:true,
		   	  },
		      email: {
		        required: true,
		        email: true
		      },
		      password: {
		        required: true,
		        minlength: 4
		      },
		      number:{
		      	required:true,
		      },
		    },
		    messages: {
		     number:{
		     	required: "Please enter phone number",
		     },	
		     fullname:{
		     	required: "Please enter your full name",
		     },
		      password: {
		        required: "Please enter your password",
		        minlength: "Your password must be at least 4 characters long"
		      },
		      email: "Please enter a valid email address"
		      , 
		      confirm_password:{
		      	required: "Please confirm your password",
		      }
		    },
		   
		    submitHandler: function(form) {
		      form.submit();
		    }
		  });
		});
	</script>
</body>
</html>