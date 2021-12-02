<?php 


	//***Start of Class*******//
	class Owner{

		//**Start of Variables*****//
		private $db;
		//**End of Variables******//

		//***Start of Constructor******//
		public function __construct(){
		   $this->db = new Database();	
		}
		//***End of Constructor*******//

		//***Start of Change Password*******//
		public function changePassword($data){

			extract($data);

			//***Start of Check Old Password*******//
			if($old_password == $_SESSION['owner']['password']){

				//***Start of Check New Password******//
				if($new_password == $confirm_password){


					$update = "UPDATE `users` SET `password`  = '$confirm_password' WHERE `user_id` = ".$_SESSION['owner']['user_id'];
					$result = $this->db->executeQuery($update);
					if($result){
						$_SESSION['success'] = "Password Changed Successfully!";
						$_SESSION['owner']['password'] = $confirm_password;
				        header("Location:owner/changePassword.php");
					}else{
						$_SESSION['error'] = "Password Not Updated!";
				        header("Location:owner/changePassword.php");
					}

				}else{
					$_SESSION['error'] = "Confirm Password not matched!";
				    header("Location:owner/changePassword.php");
				}
				//***End of Check New Password******//

			}else{
				$_SESSION['error'] = "Old Password not matched!";
				header("Location:owner/changePassword.php");
			}
			//***End of Check Old Password********//
		}
		//***End of Change Password*******//



		//***Start of Update Profile*******//
		public function updateProfile($data){

			extract($data);
			print_r($data);

			if($email == $_SESSION['owner']['email']){

				$update = "UPDATE `users` SET `phone_no` = '$number' ,	 `username` = '$username' WHERE `user_id`=".$_SESSION['owner']['user_id'];
				$result = $this->db->executeQuery($update);

				if($result){

					$_SESSION['success'] = "Profile Updated Successfully!";
					$_SESSION['owner']['username'] = $username;
					$_SESSION['owner']['phone_no'] = $number;
					header("Location:owner/editProfile.php");

				} else{
					echo "Query Not Run";
				}

			}else{

				//***Start of Check if Email is Unique*****//
				echo $select = "SELECT `email` FROM `users` WHERE `email` = '$email' AND  `user_id`=".$_SESSION['owner']['user_id'];
				$result = $this->db->executeQuery($select);

				if($result->num_rows > 0){
					$_SESSION['error'] = "Email is already exits!";
					header("Location:owner/editProfile.php");
				}else{

					$update = "UPDATE `users` SET `phone_no` = '$number' ,	  `username` = '$username' , `email` = '$email' WHERE `user_id`=".$_SESSION['owner']['user_id'];
					$result = $this->db->executeQuery($update);

					if($result){


						$_SESSION['success'] = "Profile Updated Successfully!";
						$_SESSION['owner']['username'] = $username;
						$_SESSION['owner']['email'] = $email;
						$_SESSION['owner']['phone_no'] = $number;
						header("Location:owner/editProfile.php");

					} else{
						echo "Query Not Run";
					}
				}
				//**End of Check if Email is Unique******//

			}


		}
		//***End of Update Profile*******//

		//***Start of Add Banquet*******//
		public function addBanquet($data,$image){

			//Extracting Post Variable
			extract($data);
		
		

			//****Start of Uploading Image********//

				//****Start of Making Directory If Not Exists****//
				$directory = "uploads";
				if(!is_dir($directory)){
					mkdir($directory);
				}
				//****End of Making Directory If Not Exists****//

				//Array Which File Type Allowed
	     	    $fileextstored=array('png','jpg','jpeg');


	     	    //Image Data 
		     	$banquetImage = $image['banquet_image'];


		     	//Image Type
		     	$banquet_image_type = explode('/',$banquetImage['type']);

		     	//******Start of Upload Image**********// 
		     	 if(in_array($banquet_image_type[1],$fileextstored)){
		     	 		
		     	 	   //*****Getting Path With File Name*********//		
		               $banquet_image_name = date("F-D-Y").time().".".$banquet_image_type[1];
		               $banquet_image_path = $directory ."/".$banquet_image_name;
		               //****Upload Thumbnail********//
		               $banuet_image_upload = move_uploaded_file($banquetImage['tmp_name'],$banquet_image_path);

		               if($banuet_image_upload){
		               			

		               		$user_id = $_SESSION['owner']['user_id'];
		               		//****Start of Inserting Data*******//
		               		$insert = "INSERT INTO `banquets` (`user_id`,`category_id`,`location_id`,`status_id`,`banquet_name`,`price`,`phone_number`,`address`,`total_guest`,`banquet_image`) VALUES ('$user_id','$category_id','$location_id','$status_id','$banquet_name','$price','$number','$address','$total_guest','$banquet_image_name')";


		               		$result = $result = $this->db->executeQuery($insert);

		               		if($result){


		               			//***Start of Add Multiple Images********//
		               			$files = $image['images'];
               			        $flag = true;
               			        // print_r($files);
               			        // die;

               			        //****Start of Uploadding File******//	
								foreach ($files['tmp_name'] as $key => $value) {

									//***Getting File Name***//
									$post_images_name = date("F-D-Y").time().$files['name'][$key];
									
									$banquet_id =   $this->db->getLastId();

									//***Upload File Name***//
									$upload_file = move_uploaded_file($files['tmp_name'][$key],$directory."/".$post_images_name);	
									if(!$upload_file){
									  $flag = false;
									  break;
									}
								}
								//****End of Uploading File******//

								//***Start of Images Uploaded or Not*******//
								if($flag){
									//*****Start of Inserting in Database******//
									foreach($files['name'] as $key => $value){
										
										$insert = "INSERT INTO `banquet_images` (`banquet_id`,`banquet_image`) VALUES ($banquet_id,'$value')";
										$result = $this->db->executeQuery($insert);

										if(!$result){
											$flag = false;
											$_SESSION['error'] = "Banquet Images not Upload!";
											header('location:owner/addBanquet.php');
										}
									}
									//****End of Inserting in Database*******//

									//****Start of Checking Data Inserted *****//
									if(!$flag){
										$_SESSION['error'] = "Failed to Upload Images!";
									    header('location:owner/addBanquet.php');
									}else{
											$_SESSION['success'] = "Banquet Added Successfully!";
			                    			header("Location:owner/addBanquet.php");
									}
									//****End of Checking Data Inserted*****//
								}else{
									$_SESSION['error'] = "Post Images not Upload!";
									header('location:owner/addBanquet.php');
								}
								//***End of Images Uploaded or Not********//

		               			//***End of Add Multiple Images*********//

		               		
		               		}else{
		               			echo "Failed";
		               		}
		               		//****End of Inserting Data*******//	

		               }else{
		               	    $_SESSION['error'] = "Failed to Upload Post Thumbnail";
		               		header('location:owner/addBanquet.php');
		               }
				}

				else{
					$_SESSION['error'] = "Post Thumbnail Image Type is Invalid";
					header('Location:owner/addBanquet.php');
				}
				//*******End of Upload Image*************// 
	     	//***End of Uploading Image*******//


			
		}
		//****End of Add Banquet*******//



		//***Start of View Owner Banquets********//
		public function viewBanquets(){

			$user_id = $_SESSION['owner']['user_id'];
			$select = "SELECT * FROM categories,banquets,locations,users,status WHERE banquets.user_id = users.user_id AND banquets.category_id = categories.category_id AND banquets.location_id = locations.location_id AND banquets.status_id = status.status_id AND users.user_id=".$user_id;

			$result = $this->db->executeQuery($select);
			
			if($result->num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr align="center">
						<td><b><?php echo $row['banquet_name']?></b></td>
						<td><b><?php echo $row['username']?></b></td>
						<td><b><?php echo $row['address']?></b></td>
						<td><b><?php echo $row['banquet_name']?></b></td>
							<td>
							<?php 


								if($row['status_type'] == "Active"){
									?>
									<p style="padding:10px" class=" badge bg-success"><i class="fa fa-toggle-on"></i> Active </p>
									<?php
								}else{
									?>
									<p style="padding:10px" class=" badge bg-danger"><i class="fa fa-toggle-off"></i> Inactive </p>
									<?php
								}


							?>
						</td>
				

					<td>
						<?php 


								if($row['status_type'] == "Active"){
									?>
									<a href="../process.php?OwnerbanquetStatus=true&id=<?php echo $row['banquet_id']?>" class="btn btn-danger"><i class="fa fa-toggle-off"></i> Inactive</a>
									<?php
								}else{
									?>
									<a href="../process.php?OwnerbanquetStatus=true&id=<?php echo $row['banquet_id']?>" class="btn btn-success"><i class="fa fa-toggle-on"></i> Active</a>
									<?php
								}

							?>
							<a href="../process.php?showBanquetOwner=true&id=<?php echo $row['banquet_id']?>" class="btn btn-dark mt-2"><i class="fa fa-eye"></i></a>
							
						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Banquets Found</b>
						</div>
					</td>
				</tr>
			   <?php	
			}
		}
		//***End of View Owner Banquets*********//

		//**Start of Change Status of Banquet******//
		public function updateBanquetStatus($data){


			extract($data);


			$select = "SELECT `status_id` FROM `banquets` WHERE `banquet_id` =".$id; 
			$result = $this->db->executeQuery($select);

			if($result->num_rows){	

				$row = mysqli_fetch_assoc($result);

				if($row['status_id'] == 5){

					 $update = "UPDATE `banquets` SET `status_id` = 6 WHERE `banquet_id`=".$id;

				}else{

					 $update = "UPDATE `banquets` SET `status_id` = 5 WHERE `banquet_id`=".$id;
				}

				$result = $this->db->executeQuery($update);
				if($result){

					$_SESSION['success'] = "Status Updated Successfully!";
				     header("Location:owner/viewBanquet.php");	

				}else{
					echo "Status Updated Failed!";
				}

			}else{
				echo "Query Not Run";
			}
		}
		//***End of Change Status of Banquet*****//

		//***Start of Get Banquet Details*****//
		public function getBanuqetDetails($data){

			extract($data);

			$select = "SELECT * FROM categories,banquets,locations,users,status WHERE banquets.user_id = users.user_id AND banquets.category_id = categories.category_id AND banquets.location_id = locations.location_id AND banquets.status_id = status.status_id AND banquets.banquet_id =".$banquet_id;

			$result = $this->db->executeQuery($select);

			$row = mysqli_fetch_assoc($result);
			return $row;
		}
		//**End of Get Banquet Details******//



		//***Start of Get Banquets*********//
		public function getBanquets(){

			$except =  $_SESSION['owner']['user_id'];
			
			$select = "SELECT * FROM `banquets` WHERE  `user_id` = ".$except;
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['banquet_id']?>"><?php echo $row['banquet_name']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Banquets Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//***End of Get Banquet********//



		//**Start of Get Clients********//
		public function getClients(){


			$except =  $_SESSION['owner']['user_id'];
			
			$select = "SELECT * FROM users,roles,user_role WHERE users.user_id = user_role.user_id AND roles.role_id = user_role.role_id AND roles.role_type = 'Client' AND users.user_id <> ".$except;
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['user_id']?>"><?php echo $row['username']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Clients Found</b>
						</div>
					</td>
				</tr>
				<?php
			}

		}
		//***End of Get Clients*******//



		//***Start of Add Booking********//
		public function addBooking($data){


			extract($data);

			$insert = "INSERT INTO `bookings` (`user_id`,`banquet_id`,`status_id`,`from_date`,`to_date`) VALUES ('$user_id','$banquet_id',2,'$form_date','$to_date')";

			$result = $this->db->executeQuery($insert);

			if($result){

					$_SESSION['success'] = "Booking Added Successfully!";
				     header("Location:owner/addBookings.php");	

			}else{
				echo "Query Faile to Run";
			}

		}
		//***End of Add Booking********//




	}
	//***End of Class********//


?>