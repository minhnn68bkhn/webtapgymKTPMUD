<?php 
	class type_execrisemodel extends DB {
		public function get(){
			$sql = "SELECT * FROM `type_exercise`";
			return mysqli_query($this->con,$sql);
		}
		public function insert($name){
			$sql ="INSERT INTO `type_exercise`(`name`) VALUES ('$name')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function count_type($name){
			$sql = "SELECT * FROM `type_exercise` where name ='{$name}'";
			return mysqli_query($this->con,$sql);
		}
			public function edit($id){
			$sql = "SELECT * FROM `type_exercise` where id = $id";
			return mysqli_query($this->con,$sql);
		}
		public function update($id,$name){
			$sql ="UPDATE `type_exercise` SET `name`='$name' WHERE id= $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function delete($id){
			$sql ="DELETE FROM `type_exercise` WHERE id=$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
	}
 ?>