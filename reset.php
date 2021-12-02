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
	<title>Login</title>
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
		<div class="card shadow-lg bg-white p-2" style="width:50%; margin: auto;">
			<div class="card-body">
				<h4 align="center">ONLINE BANQUET SYSTEM</h4>	
				<h6 align="center" style="text-transform: uppercase; color: #85929E;">Forget Password</h6>
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
                    <div class="alert alert-danger mt-1" id="error">
                        <b><?php echo $_SESSION['error']?></b>

                    </div>
                    <?php
                    unset($_SESSION['error']);
                }



                ?>
				<form action="process.php" method="POST" id="form">
					<div class="form-group mb-2">
						<strong>Email Address <span class="text-danger">*</span></strong>
						<input type="email" minlength="5" maxlength="40" name="email" placeholder="Enter your email address" required class="form-control">
						<p style="font-size: 14px;" class="text-success">please provide your registered email</p>
					</div>

					<div class="form-group mb-2">
						<center>
							<a href="login.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back to Login</a>
							<button name="reset" class="btn btn-dark" type="submit" class="form-control"><i class="fa fa-check"></i>	Verify</button>
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
		  $("#form").validate({
		   
		    rules: {
		   
		      email: {
		        required: true,
		        email: true
		      },
		      password: {
		        required: true,
		        minlength: 4
		      }
		    },
		    messages: {
		      password: {
		        required: "Please provide a password",
		        minlength: "Your password must be at least 4 characters long"
		      },
		      email: "Please enter a valid email address"
		    },
		   
		    submitHandler: function(form) {
		      form.submit();
		    }
		  });
		});
	</script>
</body>
</html>