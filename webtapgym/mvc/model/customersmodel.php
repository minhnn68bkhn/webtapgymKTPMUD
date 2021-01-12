<?php 
	class customersmodel extends DB {

		public function register($name,$username,$password,$phone,$address,$email,$gender){

			$sql ="INSERT INTO `customers`(`name`, `username`, `password`, `phone`, `address`, `email`, `gender`, `id_rule`) VALUES ('$name','$username','$password','$phone','$address','$email','$gender',2)";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function count_user($username){

			$sql = "SELECT * FROM `customers` WHERE username='{$username}'";
			return mysqli_query($this->con,$sql);
		}
		public function login($username){
			$sql = "SELECT * FROM `customers` WHERE username='{$username}'";
			return mysqli_query($this->con,$sql);
		}
				public function profile($id){
			$sql = "SELECT * FROM `customers` WHERE id=$id";
			return mysqli_query($this->con,$sql);
		}
		public function changePass($id,$password){
			$sql ="UPDATE `customers` SET `password`='$password' WHERE  id = $id";
				$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function update_profile($id,$name,$number,$address,$email){
			$sql ="UPDATE `customers` SET `name`='$name',`phone`='$number',`address`='$address',`email`='$email' WHERE $id = $id";
				if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function get_cus(){
			$sql ="SELECT *FROM customers where id_rule = 2";
			return mysqli_query($this->con,$sql);
		}

	}
 ?>