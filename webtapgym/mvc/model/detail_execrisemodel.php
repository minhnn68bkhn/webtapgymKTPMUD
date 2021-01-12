<?php 
	class detail_execrisemodel extends DB{

		public function get($id){

			$sql ="SELECT detail_exercise.id as 'id',exercise.name as 'name_execirse',exercise.image as 'image',exercise.decription as 'decription',type_exercise.name 'name_type' FROM `detail_exercise`,exercise,customers,calendar,type_exercise WHERE detail_exercise.id_execrise=exercise.id  and exercise.id_type = type_exercise.id and customers.id = $id";
			return mysqli_query($this->con,$sql);
		}
		public function insert($id_cus,$id_date){
			$sql ="INSERT INTO `order_execrise`(`id_customers`, `id_calendar`) VALUES ('$id_cus','$id_date')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
				
			}
			return json_encode($result);
		}
		public function max(){
			$sql ="SELECT max(id) as 'id'  FROM `order_execrise`";
			return mysqli_query($this->con,$sql);

		}
		public function detail_exercise($id){
			$sql ="SELECT order_execrise.id as 'id',calendar.name as 'date',calendar.id as 'id_calendar' FROM `order_execrise`,calendar,customers WHERE order_execrise.id_customers = customers.id and order_execrise.id_calendar = calendar.id and order_execrise.id_customers = $id";
			return mysqli_query($this->con,$sql);

		}
		public function delete_order($id){
			$sql ="DELETE FROM order_execrise where id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
				
			}
			return json_encode($result);

		}
		public function delete_detail($id_detail){
			$sql ="DELETE FROM `detail_exercise` WHERE id = $id_detail";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
				
			}
			return json_encode($result);
		}
		public function get_count_or($id,$date){
			$sql="SELECT * FROM `detail_exercise`,order_execrise WHERE detail_exercise.id_order = order_execrise.id and order_execrise.id_calendar = $date and detail_exercise.id_execrise = $id";
			echo $sql;
			return mysqli_query($this->con,$sql);

		}
	}
 ?>