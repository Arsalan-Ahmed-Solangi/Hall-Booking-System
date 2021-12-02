<?php 


	//***Start of Class*******//
	class Data{

		//**Start of Variables*****//
		private $db;
		//**End of Variables******//

		//***Start of Constructor******//
		public function __construct(){
		   $this->db = new Database();	
		}
		//***End of Constructor*******//

		//****Start of Getting Enqueries********//
		public function getEnqueries(){

			$select = "SELECT * FROM `enqueries`";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr align="center">
						<th align="center"><?php echo $row['full_name']?></th >
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['message']?></td>
						<td>
							<a href="../process.php?deleteEnquery=true&id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Enqueries Found</b>
						</div>
					</td>
				</tr>
				<?php
			}

		}
		//***End of Getting Enqueries**********//

		//****Start of Delete Enquery*****//
		public function deleteEnquery($id){
		
			$delete = "DELETE FROM `enqueries` WHERE `id` =".$id;
			$result = $this->db->executeQuery($delete);

			if($result){

				$_SESSION['success'] = "Enquery Deleted Successfully!";
				header("Location:admin/index.php");

			}else{	
				echo "Delete Query Not Work";
			}

		}
		//***End of Delete Enquery*******//


		//***Start of Update Password*******//
		public function updatePassword($data){
			extract($data);

			//***Start of Check Old Password*******//
			if($old_password == $_SESSION['admin']['password']){

				//***Start of Check New Password******//
				if($new_password == $confirm_password){


					$update = "UPDATE `users` SET `password`  = '$confirm_password' WHERE `user_id` = ".$_SESSION['admin']['user_id'];
					$result = $this->db->executeQuery($update);
					if($result){
						$_SESSION['success'] = "Password Changed Successfully!";
						$_SESSION['admin']['password'] = $confirm_password;
				        header("Location:admin/changePassword.php");
					}else{
						$_SESSION['error'] = "Password Not Updated!";
				        header("Location:admin/changePassword.php");
					}

				}else{
					$_SESSION['error'] = "Confirm Password not matched!";
				    header("Location:admin/changePassword.php");
				}
				//***End of Check New Password******//

			}else{
				$_SESSION['error'] = "Old Password not matched!";
				header("Location:admin/changePassword.php");
			}
			//***End of Check Old Password********//

		}
		//***End of Update Password********//


		//***Start of Update Profile*******//
		public function updateProfile($data){

			extract($data);

			if($email == $_SESSION['admin']['email']){

				$update = "UPDATE `users` SET `username` = '$username' WHERE `user_id`=".$_SESSION['admin']['user_id'];
				$result = $this->db->executeQuery($update);

				if($result){

					$_SESSION['success'] = "Profile Updated Successfully!";
					$_SESSION['admin']['username'] = $username;
					header("Location:admin/editProfile.php");

				} else{
					echo "Query Not Run";
				}

			}else{

				//***Start of Check if Email is Unique*****//
				$select = "SELECT `email` FROM `users` WHERE `email` = '$email' AND  `user_id`=".$_SESSION['admin']['user_id'];
				$result = $this->db->executeQuery($select);

				if($result->num_rows > 0){
					$_SESSION['error'] = "Email is already exits!";
					header("Location:admin/editProfile.php");
				}else{

					$update = "UPDATE `users` SET `username` = '$username' , `email` = '$email' WHERE `user_id`=".$_SESSION['admin']['user_id'];
					$result = $this->db->executeQuery($update);

					if($result){

						$_SESSION['success'] = "Profile Updated Successfully!";
						$_SESSION['admin']['username'] = $username;
						$_SESSION['admin']['email'] = $email;
						header("Location:admin/editProfile.php");

					} else{
						echo "Query Not Run";
					}
				}
				//**End of Check if Email is Unique******//

			}


		}
		//***End of Update Profile*******//


		//****Start of Add Client******//
		public function addClient($data){

			extract($data);



			//***Start of Check Email Exits*****//
			$select = "SELECT * FROM  `users` WHERE `email`='$email'";
			$result = $this->db->executeQuery($select);
			

			if($result->num_rows  > 0 ){

				$_SESSION['error'] = "Email is already exits!";
				header("Location:admin/addClient.php");

			}else{

				//****Start of Contact Number Unique*******//
				$select = "SELECT `phone_no` FROM `users` WHERE `phone_no`= 'number'";
				$result = $this->db->executeQuery($select);

				if($result->num_rows > 0){
					$_SESSION['error'] = "Phone No is already in used!";
					header("Location:admin/addClient.php");
				}else{

					//****Start of Password Matching*******//
					if($password == $confirm_password){


						//***Start of Insert Client*******//
						$insert = "INSERT INTO `users` (`username`,`email`,`phone_no`,`password`) VALUES ('$fullname','$email','$number','$password')";

						$result = $this->db->executeQuery($insert);

						if($result){

							//**Start of Getting User Id*****//
							$user_id =   $this->db->getLastId();
							//**End of Getting User Id*****//

							//***Start of Adding User Role****//
							$insert = "INSERT INTO `user_role` (`user_id`,`role_id`) VALUES ('$user_id','$role_id')";
							$result = $this->db->executeQuery($insert);

							if($result){
								$_SESSION['success'] = "Client Added Successfully!";
					           header("Location:admin/addClient.php");
							}else{
								echo "User Role Not Inserted";
							}
							//**End of Adding User Role*****//

							
						}else{
							echo "Query Not Run";
						}
						//****End of Insert Client******//


					}else{
						$_SESSION['error'] = "Password not matched with confirm password!";
					    header("Location:admin/addClient.php");
					}
					//***End of Password Matching********//

				}
				//****End of Contact Number Uniquer********//

			}
			//***End of Check Email Exits*****//


		}
		//***End of Add Client*******//


		//***Start of View Clients*******//
		public function viewClients(){
			 $select = "SELECT * FROM `users`,`user_role`,`roles` WHERE users.`user_id` = user_role.`user_id` AND roles.`role_id` = user_role.`role_id` AND `delete` = 0 AND   `email` != '".$_SESSION['admin']['email']."'";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr align="center">
						<th align="center"><?php echo $row['username']?></th >
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['phone_no']?></td>
						<td><?php echo $row['role_type']?></td>
						<td>
							<?php 


								if($row['status'] == 1){
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


								if($row['status'] == 1){
									?>
									<a href="../process.php?userStatus=true&id=<?php echo $row['user_id']?>" class="btn btn-danger"><i class="fa fa-toggle-off"></i> Inactive</a>
									<?php
								}else{
									?>
									<a href="../process.php?userStatus=true&id=<?php echo $row['user_id']?>" class="btn btn-success"><i class="fa fa-toggle-on"></i> Active</a>
									<?php
								}

							?>
							<a href="../process.php?editUser=true&id=<?php echo $row['user_id']?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
							<a href="../process.php?deleteUser=true&id=<?php echo $row['user_id']?>" class="btn btn-danger mt-2"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="7" align="center">
						<div class="alert alert-danger">
							<b>No Clients Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//***End of View Clients*******//


		//**Start of Select Roles***//
		public function getRoles(){

			$select = "SELECT * FROM `roles` WHERE `role_id` <> 1";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['role_id']?>"><?php echo $row['role_type']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Roles Found</b>
						</div>
					</td>
				</tr>
				<?php
			}

		}
		//**End of Select Roles***//


		//***Start of Update Status****//
		public function updateStatus($data){

			extract($data);

			$select = "SELECT `status` FROM `users` WHERE `user_id` =".$id; 
			$result = $this->db->executeQuery($select);

			if($result->num_rows){	

				$row = mysqli_fetch_assoc($result);

				if($row['status'] == 1){

					echo $update = "UPDATE `users` SET `status` = 0 WHERE `user_id`=".$id;

				}else{

					echo $update = "UPDATE `users` SET `status` = 1 WHERE `user_id`=".$id;
				}

				$result = $this->db->executeQuery($update);
				if($result){

					$_SESSION['success'] = "Status Updated Successfully!";
				     header("Location:admin/viewClients.php");	

				}else{
					echo "Status Updated Failed!";
				}

			}else{
				echo "Query Not Run";
			}
		}
		//**End of Update Status*****//


		//***Start of Delete *******//
		public function deleteUser($data){

			extract($data);

			$update = "UPDATE `users` SET `delete` = 1 WHERE `user_id`=".$id;
			$result = $this->db->executeQuery($update);

			if($result){

				$_SESSION['success'] = "Client Deleted Successfully!";
				header("Location:admin/viewClients.php");

			}else{
				echo "Query Not Run";
			}

		}
		//****Start of Delete*******//



		//***Start of Getting User Data******//
		public function editUser($data){

			extract($data);

			$select = "SELECT * FROM `users`,`user_role`,`roles` WHERE users.`user_id` = user_role.`user_id` AND roles.`role_id` = user_role.`role_id` AND `delete` = 0 AND users.user_id = ".$user_id;


			$result = $this->db->executeQuery($select);
			$row = mysqli_fetch_assoc($result);


			?>

			 <form action="../process.php" method="POST" id="form">
			 	 						<input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
                                        <div class="form-group mb-4">
                                            <strong>Full Name <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $row['username']?>" type="text" minlength="4" maxlength="20" name="fullname" required placeholder="Enter your full name" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Phone Number <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $row['phone_no']?>" type="number" minlength="11" maxlength="11" name="number" placeholder="Enter Phone No" required class="form-control">
                                        </div>
                                    
                                        <div class="form-group mb-4">
                                            <strong>Email Address <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $row['email']?>"  type="email" minlength="4" maxlength="40" name="email" required placeholder="Enter your valid email" class="form-control">
                                            <p style="font-size: 14px;" class="text-success">please provide valid email</p>
                                        </div>

                                       

                                        <div class="row mb-2">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <strong>Select Role <span class="text-danger">*</span></strong>
                                                <select name="role_id" required class="form-select">
                                                    <option value="">--SELECT ROLE---</option>
                                                     <!-- Start of  Getting Users-->
                                                    <?php 

       
                                                       $this->getRoles();

                                                    ?>
                                                    <!---End of Getting Users---->
                                                </select>
                                            </div>


                                        </div>


                                       	<button type="submit" class="btn btn-success mt-2" name="updateClient"><i class="fa fa-edit"></i> Update</button>
                                    </form>
			<?php
			

		}
		//****End of Getting User Data******//


		//***Start of Update Client********//
		public function updateClient($data){
			extract($data);


			//***Start of Check Email Unqiue********//
			$select  = "SELECT * FROM `users` WHERE  `email`='$email' AND `user_id` <> ".$user_id;
			$result  = $this->db->executeQuery($select);

			if($result->num_rows > 0){

				$_SESSION['error'] = "Email is already exits!";
				header("Location:admin/addClient.php");

			}else{	

				echo $update = "UPDATE `users` SET `username` = '$fullname' , `email` = '$email' , `phone_no` = '$number' WHERE `user_id`=".$user_id;

				$result = $this->db->executeQuery($update);

				if($result){
					$_SESSION['success'] = "Client Updated Successfully!";
				    header("Location:admin/viewClients.php");
				}else{
					echo "Client Not Updated!";
				}

			}
			//***End of Check Email Unique********//

		}
		//***End of Update Client*******//


		//**Start of Add Location*****//
		public function addLocation($data){

			extract($data);
			$insert = "INSERT INTO `locations` (`location_name`,`status_id`) VALUES ('$location','$status_id')";
			$result = $this->db->executeQuery($insert);

			if($result){
				$_SESSION['success'] = "Location Added Successfully!";
				header("Location:admin/viewLocations.php");
			}else{
				echo "Failed to add Location";
			}

		}
		//**End of Add Location*****//


		//***Start of View Locations******//
		public function viewLocations(){

			$select = "SELECT * FROM `status`,`locations` WHERE locations.status_id = status.status_id";
			$result = $this->db->executeQuery($select);

			if($result){
				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr align="center">
					<td>
						<b><?php echo strtoupper($row['location_name'])?></b>
					</td>

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
									<a href="../process.php?locationStatus=true&id=<?php echo $row['location_id']?>" class="btn btn-danger"><i class="fa fa-toggle-off"></i> Inactive</a>
									<?php
								}else{
									?>
									<a href="../process.php?locationStatus=true&id=<?php echo $row['location_id']?>" class="btn btn-success"><i class="fa fa-toggle-on"></i> Active</a>
									<?php
								}

							?>

						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="7" align="center">
						<div class="alert alert-danger">
							<b>No Locations Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//**End of View Locations*******//

		//***Start of Location Status******//
		public function locationStatus($data){

			extract($data);

			$select = "SELECT `status_id` FROM `locations` WHERE `location_id` =".$id; 
			$result = $this->db->executeQuery($select);

			if($result->num_rows){	

				$row = mysqli_fetch_assoc($result);

				if($row['status_id'] == 5){

					 $update = "UPDATE `locations` SET `status_id` = 6 WHERE `location_id`=".$id;

				}else{

					 $update = "UPDATE `locations` SET `status_id` = 5 WHERE `location_id`=".$id;
				}

				$result = $this->db->executeQuery($update);
				if($result){

					$_SESSION['success'] = "Status Updated Successfully!";
				     header("Location:admin/viewLocations.php");	

				}else{
					echo "Status Updated Failed!";
				}

			}else{
				echo "Query Not Run";
			}
		}
		//***End of Location Status*******//


		//***Start of Add Status*****//
		public function addStatus($data){

			extract($data);
			$insert = "INSERT INTO `status` (`status_type`) VALUES ('$status')";
			$result = $this->db->executeQuery($insert);

			if($result){
				$_SESSION['success'] = "Status Added Successfully!";
				header("Location:admin/viewStatus.php");
			}else{
				echo "Failed to add Status";
			}
		}
		//**End of Add Status******//

		//***Start of View Status******//
		public function viewStatus(){

			$select = "SELECT * FROM `status` WHERE `action`=1";
			$result = $this->db->executeQuery($select);

			if($result){
				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr>
					<td align="center">
						<b><?php echo $row['status_type']?></b>
					</td>

					<td>
						
							<a href="../process.php?deleteStatus=true&id=<?php echo $row['status_id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="7" align="center">
						<div class="alert alert-danger">
							<b>No Status Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//***End of View Status*******//


		//***Start of Delete Status******//
		public function deleteStatus($data){

			extract($data);

			$update = "UPDATE `status` SET `action` = 0 WHERE `status_id`=".$id;
			$result = $this->db->executeQuery($update);

			if($result){

				$_SESSION['success'] = "Status Soft Deleted Successfully!";
				header("Location:admin/viewStatus.php");

			}else{
				echo "Query Not Run";
			}
		}
		//***End of Delete Status*******//



		//**Start of Select Status***//
		public function getStatus(){

			$select = "SELECT * FROM `status` WHERE `status_type` IN ('Active','Inactive')";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['status_id']?>"><?php echo $row['status_type']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Status Found</b>
						</div>
					</td>
				</tr>
				<?php
			}

		}
		//**End of Select Status***//

		//****Start of Add Category******//
		public function addCategory($data){

			extract($data);
			echo $insert = "INSERT INTO `categories` (`category_name`,`category_desc`,`status_id`) VALUES ('$category_name','$category_description','$status_id')";
			$result = $this->db->executeQuery($insert);

			if($result){
				$_SESSION['success'] = "Category Added Successfully!";
				header("Location:admin/addCategory.php");
			}else{
				echo "Failed to add Category";
			}
		}
		//****End of Add Category******//


		//***Start of View Categories*******//
		public function viewCategories(){


			$select = "SELECT * FROM status , categories WHERE categories.status_id = status.status_id";
			$result = $this->db->executeQuery($select);

			if($result){
				while($row = mysqli_fetch_assoc($result)){

					?>
					<tr>
					<td align="center">
						<b><?php echo $row['category_name']?></b>
					</td>

					<td align="center" style="width: 500px">
						<?php echo $row['category_desc']?>
					</td>
				
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
									<a href="../process.php?categoryStatus=true&id=<?php echo $row['category_id']?>" class="btn btn-danger"><i class="fa fa-toggle-off"></i> Inactive</a>
									<?php
								}else{
									?>
									<a href="../process.php?categoryStatus=true&id=<?php echo $row['category_id']?>" class="btn btn-success"><i class="fa fa-toggle-on"></i> Active</a>
									<?php
								}

							?>
							<a href="../process.php?editCategory=true&id=<?php echo $row['category_id']?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
					<?php

				}
			}else{
				?>
				<tr>
					<td colspan="7" align="center">
						<div class="alert alert-danger">
							<b>No Categories Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//***End of View Categories********//

		//***Start of Category Status******//
		public function categoryStatus($data){

			extract($data);

			$select = "SELECT `status_id` FROM `categories` WHERE `category_id` =".$id; 
			$result = $this->db->executeQuery($select);

			if($result->num_rows){	

				$row = mysqli_fetch_assoc($result);

				if($row['status_id'] == 5){

					 $update = "UPDATE `categories` SET `status_id` = 6 WHERE `category_id`=".$id;

				}else{

					 $update = "UPDATE `categories` SET `status_id` = 5 WHERE `category_id`=".$id;
				}

				$result = $this->db->executeQuery($update);
				if($result){

					$_SESSION['success'] = "Status Updated Successfully!";
				     header("Location:admin/viewCategories.php");	

				}else{
					echo "Status Updated Failed!";
				}

			}else{
				echo "Query Not Run";
			}

		}
		//***End of Category Status*******//


		//****Start of edit Category********//
		public function editCategory($data){


			extract($data);


			$select = "SELECT * FROM `categories` WHERE `category_id`=".$category_id;


			$result = $this->db->executeQuery($select);
			$row = mysqli_fetch_assoc($result);


			?>

			 <form action="../process.php" method="POST" id="form">
			 	<input type="hidden" name="category_id" value="<?php echo $row['category_id']?>">
                                        <div class="form-group mb-4">
                                            <strong>Category Title <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $row['category_name']?>" type="text" minlength="4" maxlength="20" name="category_name" required placeholder="Enter category title" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Category Description <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $row['category_desc']?>" type="text" minlength="50" maxlength="200" name="category_description" placeholder="Enter category description" required class="form-control">
                                        </div>
                                    
                                      
                                    
                                        <div class="row mb-2">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <strong>Category Status <span class="text-danger">*</span></strong>
                                                <select name="status_id" required class="form-select">
                                                    <option value="">--SELECT STATUS---</option>
                                                     <!-- Start of  Getting Users-->
                                                    <?php 

                                                       
                                                       $this->getStatus();

                                                    ?>
                                                    <!---End of Getting Users---->
                                                </select>
                                            </div>


                                        </div>
                                        <center>
                                        	<button type="submit" class="btn btn-success mt-2" name="updateCategory"><i class="fa fa-list"></i> Update</button>
                                   		</center>

                                    </form>
			<?php


		}
		//****End of edit Category*********//


		//***Start of Update Category*****//
		public function updateCategory($data){

			extract($data);
		
			$update = "UPDATE `categories` SET `category_name` = '$category_name' , `category_desc` = '$category_description' , `status_id` = '$status_id' WHERE `category_id`=".$category_id;

			$result = $this->db->executeQuery($update);

			if($result){
				$_SESSION['success'] = "Category Updated Successfully!";
			    header("Location:admin/viewCategories.php");
			}else{
				echo "Category Not Updated!";
			}
		}
		//***End of Update Category*****//


		//***Start of Get Locations******//
		public function getLocations(){
			
			$select = "SELECT * FROM `locations` WHERE `location_id` <> 6";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['location_id']?>"><?php echo $row['location_name']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Locations Found</b>
						</div>
					</td>
				</tr>
				<?php
			}

		}
		//***End of Get Locations*****//


		//**Start of Get Clients*****//
		public function getClients(){

			$except =  $_SESSION['admin']['user_id'];
			
			$select = "SELECT * FROM users,roles,user_role WHERE users.user_id = user_role.user_id AND roles.role_id = user_role.role_id AND roles.role_type = 'Owner' AND users.user_id <> ".$except;
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
							<b>No Users Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//**End of Get Clients*****//



		//***Start of Get Categories******//
		public function getCategories(){
			
			$select = "SELECT * FROM `categories` WHERE `status_id` <> 6";
			$result = $this->db->executeQuery($select);

			if($result->num_rows){

				while($row = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
					<?php
				}

			}else{
				?>
				<tr>
					<td colspan="5" align="center">
						<div class="alert alert-danger">
							<b>No Categories Found</b>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		//***End of Get Categories******//


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
									$post_images_name = date("F-D-Y").time().$files['name'];
									
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
										$value = date("F-D-Y").time().$files['name'];
										$insert = "INSERT INTO `banquet_images` (`banquet_id`,`banquet_image`) VALUES ($banquet_id,'$value')";
										$result = $this->db->executeQuery($insert);

										if(!$result){
											$flag = false;
											$_SESSION['error'] = "Banquet Images not Upload!";
											header('location:admin/addBanquet.php');
										}
									}
									//****End of Inserting in Database*******//

									//****Start of Checking Data Inserted *****//
									if(!$flag){
										$_SESSION['error'] = "Failed to Upload Images!";
									    header('location:admin/addBanquet.php');
									}else{
											$_SESSION['success'] = "Banquet Added Successfully!";
			                    			header("Location:admin/addBanquet.php");
									}
									//****End of Checking Data Inserted*****//
								}else{
									$_SESSION['error'] = "Post Images not Upload!";
									header('location:admin/addBanquet.php');
								}
								//***End of Images Uploaded or Not********//

		               			//***End of Add Multiple Images*********//

		               		
		               		}else{
		               			echo "Failed";
		               		}
		               		//****End of Inserting Data*******//	

		               }else{
		               	    $_SESSION['error'] = "Failed to Upload Post Thumbnail";
		               		header('location:index.php');
		               }
				}

				else{
					$_SESSION['error'] = "Post Thumbnail Image Type is Invalid";
					header('Location:index.php');
				}
				//*******End of Upload Image*************// 
	     	//***End of Uploading Image*******//


			
		}
		//****End of Add Banquet*******//


		//***Start of View Banquets*******//
		public function viewBanquets(){

			$select = "SELECT * FROM categories,banquets,locations,users,status WHERE banquets.user_id = users.user_id AND banquets.category_id = categories.category_id AND banquets.location_id = locations.location_id AND banquets.status_id = status.status_id";

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
									<a href="../process.php?banquetStatus=true&id=<?php echo $row['banquet_id']?>" class="btn btn-danger"><i class="fa fa-toggle-off"></i> Inactive</a>
									<?php
								}else{
									?>
									<a href="../process.php?banquetStatus=true&id=<?php echo $row['banquet_id']?>" class="btn btn-success"><i class="fa fa-toggle-on"></i> Active</a>
									<?php
								}

							?>
							<a href="../process.php?showBanquet=true&id=<?php echo $row['banquet_id']?>" class="btn btn-dark"><i class="fa fa-eye"></i></a>
							
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
		//***End of View Banquets*******//


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
				     header("Location:admin/viewBanquet.php");	

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

		//***Start of View Bookings********//
		public function viewBookings(){


			$select = "SELECT * FROM bookings,banquets,status,users WHERE bookings.user_id = users.user_id AND bookings.banquet_id = banquets.banquet_id AND bookings.status_id = status.status_id";

			$result = $this->db->executeQuery($select);

			if($result->num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					?>
				<tr align="center">
					<th><?php echo $row['banquet_name'] ?></th>
					<th><?php echo $row['username'] ?></th>
					<th><?php echo $row['price'] ?></th>
					<th class="text-success"><?php echo $row['from_date'];?></th>
					<th class="text-success"><?php echo $row['to_date'];?></th>
					<th class="text-danger"><?php echo $row['status_type'];?></th>
					<td>
					
							<a href="../process.php?showBookingsDetails=true&id=<?php echo $row['booking_id']?>" class="btn btn-dark"><i class="fa fa-eye"></i></a>
						</td>
					</tr>	
				</tr>
				<?php
				}
			}else{
				?>
				<tr>
					<td colspan="8" align="center">
						<div class="alert alert-danger">
							<b>No Bookings Found Yet</b>
						</div>
					</td>
				</tr>
			   <?php
			}

		}
		//***End of View Bookings*********//


		//****Start of Get Booking Details*******//
		public function showBookingsDetails($data){


			extract($data);


			$select = "SELECT * FROM bookings,banquets,status,users,categories , locations WHERE bookings.user_id = users.user_id AND bookings.banquet_id = banquets.banquet_id AND bookings.status_id = status.status_id AND categories.category_id = banquets.category_id AND locations.location_id = banquets.banquet_id AND  bookings.booking_id=".$booking_id;

			$result = $this->db->executeQuery($select);

			$row = mysqli_fetch_assoc($result);
			return $row;
		}
		//***End of Get Booking Details********//


		//***Start of Getting Images*******//
		public function getImages(){

			$select = "SELECT * FROM `banquet_images`";
			$result = $this->db->executeQuery($select);
			return $result;

		}
		//***End of Getting Images********//


		//**Start of Get Categories********//
		public function getCategoriesDetails(){
			$select = "SELECT * FROM `categories` WHERE `status_id` = 5";
			$result = $this->db->executeQuery($select);
			return $result;
		}
		//**End of Get Categories******//


		//***Start of Get Banquet Details Query*****//
		public function getBanuqetDetailsQuery(){

			$select = "SELECT * FROM categories,banquets,locations,users,status WHERE banquets.user_id = users.user_id AND banquets.category_id = categories.category_id AND banquets.location_id = locations.location_id AND banquets.status_id = status.status_id AND banquets.status_id = 5";

			$result = $this->db->executeQuery($select);
			return $result;

		}
		//**End of Get Banquet Details Query*******//

	}
	//***End of Class********//


?>