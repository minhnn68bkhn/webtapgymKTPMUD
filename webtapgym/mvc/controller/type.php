<?php 
	class type extends controller {
		public $customersmodel;
		public $type_execrisemodel;
		function __construct(){
			$this->customersmodel = $this->model("customersmodel");
			$this->type_execrisemodel = $this->model("type_execrisemodel");
		}
		public function homePage(){
			$this->viewadmin("masterlayout",[
				"page"=>"type/index",
				"data"=>$this->type_execrisemodel->get(),
			]);
		}
		public function insert_form(){
			$this->viewadmin("masterlayout",[
				"page"=>"type/insert",
			]);
		}
		public function insert(){

			if (isset($_POST["insert"])) {
				$kq = false;
				if (empty($_POST["name"])) {
					$this->viewadmin("masterlayout",[
						"page"=>"type/insert",
						"result"=>$kq,
					]);
				}
				else{
					$name = $_POST["name"];
					$dem = $this->type_execrisemodel->count_type($name);
					if (mysqli_num_rows($dem)<1) {
						$kq = $this->type_execrisemodel->insert($name);
						// 	$this->viewadmin("masterlayout",[
						// 	"page"=>"type/insert",
						// 	"result"=>$kq,
						// ]);
						header("location:../type");
					}
					else{
							$this->viewadmin("masterlayout",[
							"page"=>"type/insert",
							"result"=>$kq,
						]);
					}
				
				}
			}
		}
		public function edit($id){

			$this->viewadmin("masterlayout",[
				"page"=>"type/edit",
				"edit"=>$this->type_execrisemodel->edit($id),
			]);
		}
		public function update($id){
			if (isset($_POST["update"])) {
				$kq = false;
				if (empty($_POST["name"])) {
						$this->viewadmin("masterlayout",[
						"page"=>"type/edit",
						"edit"=>$this->type_execrisemodel->edit($id),
						"result"=>$kq,
					]);
				}
				else{
					$name = $_POST["name"];
					$kq = $this->type_execrisemodel->update($id,$name);
					// $this->viewadmin("masterlayout",[
					// 	"page"=>"type/edit",
					// 	"edit"=>$this->type_execrisemodel->edit($id),
					// 	"result"=>$kq,
					// ]);
						header("location:../type");
					
				}
			}
		}
		public function delete($id){

			$kq = $this->type_execrisemodel->delete($id);
				$this->viewadmin("masterlayout",[
				"page"=>"type/index",
				"edit"=>$this->type_execrisemodel->edit($id),
				"data"=>$this->type_execrisemodel->get(),
				"result"=>$kq,
			]);
		}
	
	}
 ?>