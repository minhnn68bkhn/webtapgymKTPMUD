<?php 
	class calendarmodel extends DB {
		public function get(){

			$sql ="SELECT *FROM calendar";
			return mysqli_query($this->con,$sql);
		}
		public function edit($id){
			$sql ="SELECT *FROM calendar where id =$id";
			return mysqli_query($this->con,$sql);
		}
		public function update($id,$name){

			$sql ="UPDATE `calendar` SET `name`='$name' WHERE id =$id";
		$result = false;
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
	}
 ?>