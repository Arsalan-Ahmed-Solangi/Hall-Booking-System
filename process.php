<?php 

	//****Start of Database*******//
	require('database/database.php');
	$db = new Database();
	//***End of Database********//

	//***Start of Form Class******//
	require('require/Form.php');
	$form = new Form();
	//***End of Form Class******//

	//***Start of Data Class*****//
	require('require/Data.php');
	$data = new Data();
	//***End of Data Class*****//

	//***Start of Owner Class*****//
	require('require/Owner.php');
	$owner = new owner();
	//***End of Owner Class*****//

	//****Start of Login Process Class********//
	if(isset($_POST['login'])){

		$form->login($_POST);

	}
	//***End of Login Process Class*********//

	//****Start of Register******//
	if(isset($_POST['register'])){

		$form->register($_POST);
	}
	//***End of Register*******//

	//****Start of Resetr******//
	if(isset($_POST['reset'])){

		$form->reset($_POST);
	}
	//***End of Reset*******//


	//**Start of Logout****//
	if(isset($_GET['logout']) && $_GET['logout'] == true){
		$form->logout("login.php");
	}
	//**End of Logout****//


	//***Start of Delete Enquery******//
	if(isset($_GET['deleteEnquery']) && $_GET['deleteEnquery'] == true){
		$data->deleteEnquery($_GET['id']);
	}
	//***End of Delete Enquery*******//

	//***Start of Update Password*******//
	if(isset($_POST['UpdatePassword'])){

		$data->updatePassword($_POST);

	}
	//***End of Update Password********//


	//***Start of Update Profile******//
	if(isset($_POST['UpdateProfile'])){

		$data->updateProfile($_POST);
	}
	//***End of Update Profile******//

	//**Start of Add Client*****//
	if(isset($_POST['addClient'])){

		$data->addClient($_POST);
	}
	//**End of Add Client*****//

	//**Start of Update User Status****//
	if(isset($_GET['userStatus']) AND $_GET['userStatus'] == true){

		$data->updateStatus($_GET);

	}
	//**End of Update User Status****//


	//**Start of Delete User******//
	if(isset($_GET['deleteUser']) AND $_GET['deleteUser'] == true){

		$data->deleteUser($_GET);
	}
	//***End of Delete User******//


	//***Start of Edit Client*****//
	if(isset($_GET['editUser']) AND $_GET['editUser'] == true){

		header("Location:admin/editClient.php?user_id=".$_GET['id']);
	}
	//**End of Edit Client******//

	//***Start of Update Client*****//
	if(isset($_POST['updateClient'])){

		$data->updateClient($_POST);
	}
	//***End of Update Client******//


	//***Start of Add Location****//
	if(isset($_POST['addlocation'])){

		$data->addLocation($_POST);
	}
	//***End of Add Location*****//

	//****Start of Location Status*****//
	if(isset($_GET['locationStatus']) AND $_GET['locationStatus'] == true){

		$data->locationStatus($_GET);
	}
	//***End of Location Status ******//

	//***Start of Add Status*****//
	if(isset($_POST['addStatus'])){

		$data->addStatus($_POST);

	}
	//**End of Add Status******//

	//***Start of Delete Status******//
	if(isset($_GET['deleteStatus']) AND $_GET['deleteStatus'] == true){

		$data->deleteStatus($_GET);
	}
	//***End of Delete Status*******//

	//***Start of Add Category***//
	if(isset($_POST['addCategory'])){
		$data->addCategory($_POST);
	}
	//***End of Add Category****//

	//****Start of Category Status******//
	if(isset($_GET['categoryStatus']) AND $_GET['categoryStatus'] == true){
		$data->categoryStatus($_GET);
	}
	//***End of Category Status*******//


	//***Start of Edit Category*****//
	if(isset($_GET['editCategory']) AND $_GET['editCategory'] == true){

		header("Location:admin/editCategory.php?category_id=".$_GET['id']);
	}
	//**End of Edit Category******//


	//**Start of Update Category******//
	if(isset($_POST['updateCategory'])){

		$data->updateCategory($_POST);
	}
	//***End of Update Category*****//


	//***Start of Add Banquet********//
	if(isset($_POST['addBanquet'])){

		$data->addBanquet($_POST,$_FILES);

	}
	//***End of Add Banquet********//


	//***Start of Show Banquet*****//
	if(isset($_GET['showBanquet']) AND $_GET['showBanquet'] == true){

		header("Location:admin/showBanquet.php?banquet_id=".$_GET['id']);
	}
	//**End of Show Banquet*****//

	//***Start of Show Booking Details*****//
	if(isset($_GET['showBookingsDetails']) AND $_GET['showBookingsDetails'] == true){


		header("Location:admin/showBookingsDetails.php?booking_id=".$_GET['id']);


	}
	//***End of Show Booking Details******//


	//**Start of Banquet Status****//
	if(isset($_GET['banquetStatus']) AND $_GET['banquetStatus'] == true){

		$data->updateBanquetStatus($_GET);
	}
	//**End of Banquet Status****//




	//********Start of OWNER DASHBOARD WORK******************//
		

		//***Start of Change Password*******//
		if(isset($_POST['ownerPassword'])){

			$owner->changePassword($_POST);
		}
		//***End of Change Password********//


		//***Start of Update Owner Profile*******//
		if(isset($_POST['UpdateProfileOwner'])){

			$owner->updateProfile($_POST);
		}
		//***End of Update Owner Profile*******//


		//**Start of Add Banquet Owner********//
		if(isset($_POST['addBanquetOwner'])){

			$owner->addBanquet($_POST,$_FILES);
		}
		//**End of Add Banquet Owner********//


		//****Start of Update Owner Banquet Status******//
		if(isset($_GET['OwnerbanquetStatus']) AND $_GET['OwnerbanquetStatus'] == true){

			$owner->updateBanquetStatus($_GET);
		}
		//****End of Update Owner Banquet Status*******//


		//**Start of Show Banquet Owner*****//
		if(isset($_GET['showBanquetOwner']) AND $_GET['showBanquetOwner'] == true){

			header("Location:owner/showBanquet.php?banquet_id=".$_GET['id']);

		}
		//**End of Show Banquet Owner*****//


		//****Start of Add Booking Owner******//
		if(isset($_POST['addBookingOwner'])){

			$owner->addBooking($_POST);
		}
		//***End of Add Booking Owner********//



		//***Start of Add Enqueries******//
		if(isset($_POST['send_message'])){

			$form->addEnquery($_POST);

		}
		//**End of Add Enqueries*******//

		//**Start of Logout User******//
		if(isset($_GET['userLogout']) && $_GET['userLogout'] == true){
			sleep(1);
			$form->logout('index.php');
		}
		//**End of Logout User*******//


		//***Start of Update User Password*********//
		if(isset($_POST['userPasswordUpdate'])){

			extract($_POST);


			//***Start of Check Old Password*******//
			if($old_password == $_SESSION['user']['password']){

				//***Start of Check New Password******//
				if($new_password == $confirm_password){


					$update = "UPDATE `users` SET `password`  = '$confirm_password' WHERE `user_id` = ".$_SESSION['user']['user_id'];
					$result = $db->executeQuery($update);
					if($result){
						$_SESSION['success'] = "Password Changed Successfully!";
						$_SESSION['user']['password'] = $confirm_password;
				        header("Location:changePassword.php");
					}else{
						$_SESSION['error'] = "Password Not Updated!";
				        header("Location:changePassword.php");
					}

				}else{
					$_SESSION['error'] = "Confirm Password not matched!";
				    header("Location:changePassword.php");
				}
				//***End of Check New Password******//

			}else{
				$_SESSION['error'] = "Old Password not matched!";
				header("Location:changePassword.php");
			}
			//***End of Check Old Password********//

		}
		//***End of Update User Password**********//


		//***Start of Update User Profile********//
		if(isset($_POST['userProfileUpdate'])){

			extract($_POST);


			if($email == $_SESSION['user']['email']){

				$update = "UPDATE `users` SET `username` = '$username' , `phone_no` = '$number' WHERE `user_id`=".$_SESSION['user']['user_id'];
				$result = $db->executeQuery($update);

				if($result){

					$_SESSION['success'] = "Profile Updated Successfully!";
					$_SESSION['user']['username'] = $username;
					header("Location:editProfile.php");

				} else{
					echo "Query Not Run";
				}

			}else{

				//***Start of Check if Email is Unique*****//
				$select = "SELECT `email` FROM `users` WHERE `email` = '$email' AND  `user_id`=".$_SESSION['user']['user_id'];
				$result = $db->executeQuery($select);

				if($result->num_rows > 0){
					$_SESSION['error'] = "Email is already exits!";
					header("Location:editProfile.php");
				}else{

					$update = "UPDATE `users` SET `username` = '$username' , `email` = '$email' , `phone_no` = '$number'	 WHERE `user_id`=".$_SESSION['user']['user_id'];
					$result = $db->executeQuery($update);

					if($result){

						$_SESSION['success'] = "Profile Updated Successfully!";
						$_SESSION['user']['username'] = $username;
						$_SESSION['user']['email'] = $email;
						header("Location:editProfile.php");

					} else{
						echo "Query Not Run";
					}
				}
				//**End of Check if Email is Unique******//

			}
		}
		//***End of Update User Profile********//

		//***Start of Search Banquets******//
		if(isset($_POST['searchBanquets'])){

			extract($_POST);
		}
		//***End of Search Banquets*******//

	//*******End of OWNER DASHBOARD WORK*******************//




?>