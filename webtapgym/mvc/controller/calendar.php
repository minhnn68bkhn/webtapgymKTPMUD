<?php 
	class calendar extends controller{
		public $calendarmodel;
		function __construct(){

			$this->calendarmodel = $this->model("calendarmodel");
		}
		public function homePage(){

			$this->viewadmin("masterlayout",[
				"page"=>"month/index",
				"get_month"=>$this->calendarmodel->get()
			]);
		}
		public function edit($id){

			$this->viewadmin("masterlayout",[
				"page"=>"month/edit",
				"get_month"=>$this->calendarmodel->edit($id)
			]);
		}
		public function update($id){

			if (isset($_POST["update"])) {
				$kq = false;
				if (empty($_POST["name"])) {
						$this->viewadmin("masterlayout",[
						"page"=>"month/edit",
						"get_month"=>$this->calendarmodel->edit($id),
						"result"=>$kq,

					]);
				}
				else{
					$name = $_POST["name"];
					$kq = $this->calendarmodel->update($id,$name);
						$this->viewadmin("masterlayout",[
						"page"=>"month/edit",
						"get_month"=>$this->calendarmodel->edit($id),
						"result"=>$kq,
					]);
				}
			}
			else{
					$this->viewadmin("masterlayout",[
					"page"=>"month/edit",
					"get_month"=>$this->calendarmodel->edit($id),
					"result"=>$kq,

				]);
			}
		}
	}
 ?>