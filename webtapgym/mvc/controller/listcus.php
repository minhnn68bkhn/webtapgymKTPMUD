<?php 
	class listcus extends controller {
		public $customersmodel;
		public $execrisemodel;
		function __construct(){
			$this->customersmodel = $this->model("customersmodel");
			$this->execrisemodel = $this->model("execrisemodel");
		}
		public function homePage(){
			$this->viewadmin("masterlayout",[
				"page"=>"listCus/index",
				"get_cus"=>$this->customersmodel->get_cus(),
			]);
		}
		public function exe_cus($id){
			$this->viewadmin("masterlayout",[
			"page"=>"listCus/list_execrise",
			"list"=>$this->execrisemodel->get_cus($id),
			]);
		}

	}
 ?>