<?php 


	//****Start of Database Class******//
	class Database{
		//***Start of Variables*****//
		private $db_host = "localhost";
		private $db_user = "root";
		private $db_pass = "";
		private $db_name = "hall_booking_system";
		private $connection = null;
		private $query = null;
		private $result = null;
		//****End of Variables*****//

		//***Start of Constructor***//
		public function __construct(){
			$this->connection = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

			if(mysqli_connect_errno()){
				echo "Error Message".mysqli_connect_error();
			}

		}
		//**End of Constructor*****//

		//***Start of Execute Query******//
		public function executeQuery($query){
			$this->query = $query;
			$this->result = mysqli_query($this->connection,$this->query);
			return $this->result;
		}
		//***End of Execute Query*******//


		//**Start of Getting Last Id*******//
		public function getLastId(){

			return mysqli_insert_id($this->connection);
		}

		//***End of Getting Last Id*******//

		//***Start of Destrcutor*****//
		public function __destruct(){
			mysqli_close($this->connection);
		}
		//***End of Destructor******//
	}
	//***End of Database Class*******//

?>