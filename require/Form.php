<?php 


	//***Start of Class*******//
	class Form{

		//**Start of Variables*****//
		private $db;
		//**End of Variables******//

		//***Start of Constructor******//
		public function __construct(){
		   $this->db = new Database();
		   session_start();	
		}
		//***End of Constructor*******//

		//***Start of Login*******//
		public function login($data){

			
			extract($data);
			
			$query = "SELECT * FROM `users`,`user_role`,`roles` WHERE users.user_id = user_role.user_id AND roles.role_id = user_role.role_id AND users.email = '$email' AND users.password = '$password'";

			$result = $this->db->executeQuery($query);

			if($result->num_rows > 0){
				
				$result = mysqli_fetch_assoc($result);
				

				if($result['status'] == 1)
				{

					if($result['role_id'] == 1)
					{

						$_SESSION['admin'] = $result;
						header("Location:admin/index.php");

					}else if($result['role_id'] == 2)
					{
						$_SESSION['user'] = $result;
						header("Location:index.php");

					}else if($result['role_id'] == 3){

						$_SESSION['success'] = "You are loggedIn successfully!";
						$_SESSION['owner'] = $result;
						header("Location:owner/index.php");
					}

				}else{
					$_SESSION['error'] = "Your account is inactive!";
 					header('location:login.php');
				}



			}else{
				$_SESSION['error'] = "Email or Password is incorrect";
 				header('location:login.php');
			}


		}
		//***End of Login********//

		//***Start of Register*******//
		public function register($data){

			extract($data);

			//***Start of Confirm Password********//
			if($password == $confirm_password){

				//***Start of Insert Client*******//
				$insert = "INSERT INTO `users` (`username`,`email`,`phone_no`,`password`) VALUES ('$fullname','$email','$number','$password')";

				$result = $this->db->executeQuery($insert);

				if($result){

					//**Start of Getting User Id*****//
					$user_id =   $this->db->getLastId();
					//**End of Getting User Id*****//

					//***Start of Adding User Role****//
					$insert = "INSERT INTO `user_role` (`user_id`,`role_id`) VALUES ('$user_id',2)";
					$result = $this->db->executeQuery($insert);

					if($result){
						$_SESSION['success'] = "Your account has been created successfully!";
			           header("Location:register.php");
					}else{
						echo "User Role Not Inserted";
					}
					//**End of Adding User Role*****//

					
				}else{
					echo "Query Not Run";
				}
				//****End of Insert Client******//

			}else{
				$_SESSION['error'] = "Confirm password not matched!";
 				header('location:register.php');
			}
			//****End of Confirm Password*********//

		}
		//***End of Register********//


		//***Start of Reset Password******//
		public function reset($data){

			
			extract($data);

		
			
			$select = "SELECT *  FROM `users` WHERE `email`= '$email'";

			$result = $this->db->executeQuery($select);


			if($result->num_rows > 0 ){

				$row = mysqli_fetch_assoc($result);

				// $to = $email;
				// $subject = "ONLINE BANQUET SYSTEM | RESET YOUR PASSWORD";
				// $message = "Your old password is  : ". $row['password'];
				// $from    = "ahmedsolangi347@gmail.com";

				// $headers = "FROM : " . $from;

				// mail($to,$subject, $message,$headers);
				$_SESSION['success'] = "Your Old Password is : ". $row['passwords'];
				
 				header('location:reset.php');

			}else{
				$_SESSION['error'] = "Email address not registerd!";
				
 				header('location:reset.php');
			}



		}
		//**End of Reset Password*******//

		//***Start of Logout*****//
		public function logout($location){

			session_destroy();
			header("Location:".$location);
		}
		//***End of Logout*****//


		//***Start of Add Enquery********//
		public function addEnquery($data){

			extract($data);
			print_r($data);

			$insert = "INSERT INTO `enqueries` (`full_name`,`email`,`message`) VALUES ('$name','$email','$message')";

			$result = $this->db->executeQuery($insert);

			if($result){

				$_SESSION['success'] = "Your message sent successfully!";
				
 				header('location:contact.php');

			}else{
				$_SESSION['error'] = "Failed to send message!";
				
 				header('location:contact.php');
			}

		}
		//***End of Add Enquery*********//

	}
	//***End of Class********//


?>