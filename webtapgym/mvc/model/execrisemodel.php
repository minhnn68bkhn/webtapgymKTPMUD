<?php 
	class execrisemodel extends DB{
		public function get(){
			$sql ="SELECT exercise.id as 'id',exercise.name as 'name',exercise.image as 'image',exercise.decription as 'decription',type_exercise.name as 'name_execrise' FROM `exercise`,type_exercise WHERE exercise.id_type=type_exercise.id";
			return mysqli_query($this->con,$sql);
		}
		public function insert($name,$image,$decription,$type){
			$sql ="INSERT INTO `exercise`(`name`, `image`, `decription`, `id_type`) VALUES ('$name','$image','$decription','$type')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
		public function get_count($name,$id){
			$sql ="SELECT *FROM `exercise` where name ='{$name}' and id_type = $id";
			return mysqli_query($this->con,$sql);

		}
		public function get_type($id){
			$sql ="SELECT exercise.id as 'id',exercise.name as 'name',exercise.image as 'image',exercise.decription as 'decription',type_exercise.name as 'name_execrise' FROM `exercise`,type_exercise WHERE exercise.id_type=type_exercise.id and type_exercise.id = $id";
			return mysqli_query($this->con,$sql);
		}
		public function detail($id){
			$sql ="SELECT exercise.id as 'id',exercise.name as 'name',exercise.image as 'image',exercise.decription as 'decription',type_exercise.name as 'name_execrise' FROM `exercise`,type_exercise WHERE exercise.id_type=type_exercise.id and exercise.id = $id";
			return mysqli_query($this->con,$sql);
		}
		public function calendar(){
			$sql ="SELECT * FROM `calendar` ";
			return mysqli_query($this->con,$sql);	
		}
		public function count_cal($calendar,$id,$id_execrise){
			$sql ="SELECT * FROM `detail_exercise` WHERE id_calendar = $calendar and id_customers = $id and id_execrise = $id_execrise";
			return mysqli_query($this->con,$sql);	
		}
		public function insert_data($id_execrise,$id_calendar,$id_customers){
			$sql="INSERT INTO `detail_exercise`(`id_execrise`, `id_calendar`, `id_customers`) VALUES ('$id_execrise','$id_calendar','$id_customers')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
		public function adđ_to_card($id){
			$sql ="SELECT exercise.id as 'id',exercise.name as 'name_',exercise.image as 'image',exercise.decription as 'decription',type_exercise.name as 'name_execrise' FROM `exercise`,type_exercise WHERE exercise.id_type=type_exercise.id and exercise.id = $id";
			return mysqli_query($this->con,$sql);	

		}
		public function insert_cart($id_execrise,$id_order){
			$sql ="INSERT INTO `detail_exercise`(`id_execrise`, `id_order`) VALUES ('$id_execrise','$id_order')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
		public function get_execrise($id){
			$sql ="SELECT exercise.id as'id',exercise.name as'name',exercise.image as 'image',detail_exercise.id as 'id_detail' FROM `detail_exercise`,exercise,order_execrise WHERE detail_exercise.id_execrise=exercise.id and detail_exercise.id_order=order_execrise.id and order_execrise.id_calendar = $id";
			return mysqli_query($this->con,$sql);	

		}
		public function search($search_name){

			$sql ="SELECT * FROM `exercise` WHERE name LIKE '%$search_name%'";
			return mysqli_query($this->con,$sql);	

		}
		public function edit($id){

			$sql ="SELECT *FROM `exercise` where id = $id";
			return mysqli_query($this->con,$sql);	

		}
		public function update($id,$name,$image,$decription,$id_type){
			$sql ="UPDATE `exercise` SET `name`='$name',`image`='$image',`decription`='$decription',`id_type`='$id_type' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
		public function page($page){
			$one_page =6;
			$number_one_page =($page - 1)*$one_page;
			$sql ="SELECT *FROM exercise order by id DESC Limit $number_one_page,$one_page";
			return mysqli_query($this->con,$sql);	
		}
		public function all_execrise(){
			$sql ="SELECT *FROM `exercise`";
			return mysqli_query($this->con,$sql);	

		}
		public function get_cus($id){
			$sql ="SELECT exercise.id as 'id',exercise.name as 'name',exercise.image as 'image',calendar.name as 'date' FROM `detail_exercise`,order_execrise,calendar,exercise,customers WHERE detail_exercise.id_order=order_execrise.id and order_execrise.id_calendar = calendar.id and detail_exercise.id_execrise = exercise.id and order_execrise.id_customers = customers.id and order_execrise.id_customers = customers.id and order_execrise.id_customers = $id and customers.id_rule = 2";
				return mysqli_query($this->con,$sql);	

		}
		public function delete($id) {
			$sql ="DELETE FROM exercise where id = $id";
			$result = false; 
			if (mysqli_query($this->con,$sql)) {		
				$result = true;
			}
			return json_encode($result);
		}
	}
 ?>