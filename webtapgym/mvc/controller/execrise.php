<?php 
	class execrise extends controller {
		public $customersmodel;
		public $execrisemodel;
		public $type_execrisemodel;
		function __construct(){
			$this->customersmodel = $this->model("customersmodel");
			$this->type_execrisemodel = $this->model("type_execrisemodel");
			$this->execrisemodel = $this->model("execrisemodel");
		}
		public function homePage(){
			$this->viewadmin("masterlayout",[
				"page"=>"execrise/index",
				"execrise"=>$this->execrisemodel->get(),
			]);
		}
		public function insert_form(){
			$this->viewadmin("masterlayout",[
				"page"=>"execrise/insert",
				"type"=>$this->type_execrisemodel->get(),
			]);
		}
		public function insert(){
			if (isset($_POST["insert"])) {
				$kq = false;
				if (empty($_POST["name"])||empty($_FILES["image"])||empty($_POST["decription"])||empty($_POST["type"])) {
						$this->viewadmin("masterlayout",[
						"page"=>"execrise/insert",
						"result"=>$kq,
						"type"=>$this->type_execrisemodel->get(),
					]);
				}
				else{
					$name = $_POST["name"];
					$decription = $_POST["decription"];
					$type = $_POST["type"];
					$file_name = $_FILES["image"]["tmp_name"];
					$path = "./public/uploads/";
					$file_up = "";
					$file_up2 = "";
					$count = $this->execrisemodel->get_count($name,$id);
					if (mysqli_num_rows($count) < 1) {
						if (isset($_FILES["image"])) {
							if ($_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/jpg" || $_FILES["image"]["type"]=="image/gif" || $_FILES["image"]["type"]=="image/jpeg") {
				
								if ($_FILES["image"]["error"]<1) {
									if ($_FILES["image"]["size"]<5*1024*1024) {
										$file_up .=$path.$_FILES["image"]["name"];
										if (file_exists($file_up)) {
											$rand = rand(0,1000000000000);
											$file_up2 .=$path.$rand.$_FILES["image"]["name"];
											move_uploaded_file($file_name, $path.$rand.$_FILES["image"]["name"]);
											$kq = $this->execrisemodel->insert($name,$file_up2,$decription,$type);
											// $this->viewadmin("masterlayout",[
											// 	"page"=>"execrise/insert",
											// 	"result"=>$kq,
											// 	"type"=>$this->type_execrisemodel->get(),
											// ]);
												header("location:../execrise");

										}
										else{
											$kq = $this->execrisemodel->insert($name,$file_up,$decription,$type);
											move_uploaded_file($file_name, $path.$_FILES["image"]["name"]);
											// $this->viewadmin("masterlayout",[
											// 	"page"=>"execrise/insert",
											// 	"result"=>$kq,
											// 	"type"=>$this->type_execrisemodel->get(),
											// ]);
												header("location:../execrise");

										}
									}
									else{
											$this->viewadmin("masterlayout",[
												"page"=>"execrise/insert",
												"result"=>$kq,
												"type"=>$this->type_execrisemodel->get(),
											]);
									}
								}
								else{
										$this->viewadmin("masterlayout",[
										"page"=>"execrise/insert",
										"result"=>$kq,
										"type"=>$this->type_execrisemodel->get(),
									]);
								}
							}
							else{
										$this->viewadmin("masterlayout",[
										"page"=>"execrise/insert",
										"result"=>$kq,
										"type"=>$this->type_execrisemodel->get(),
									]);
							}
						}
							else{

									$this->viewadmin("masterlayout",[
									"page"=>"execrise/insert",
									"result"=>$kq,
									"type"=>$this->type_execrisemodel->get(),
								]);
							}
						}
						else{
								$this->viewadmin("masterlayout",[
								"page"=>"execrise/insert",
								"result"=>$kq,
								"type"=>$this->type_execrisemodel->get(),
							]);

						}

				}
			}
			else{
				$this->viewadmin("masterlayout",[
					"page"=>"execrise/insert",
					"type"=>$this->type_execrisemodel->get(),
				]);
			}
		}
		public function edit($id){
			$this->viewadmin("masterlayout",[
				"page"=>"execrise/edit",
				"edit"=>$this->execrisemodel->edit($id),
				"type"=>$this->type_execrisemodel->get(),
			]);
		}
		public function update($id){
			if (isset($_POST["update"])) {
				$kq = false;
				if (empty($_POST["name"])||empty($_FILES["image"])||empty($_POST["decription"])||empty($_POST["type"])) {
						$this->viewadmin("masterlayout",[
						"page"=>"execrise/insert",
						"result"=>$kq,
						"type"=>$this->type_execrisemodel->get(),
						"edit"=>$this->execrisemodel->edit($id),
					]);
				}
				else{
					$name = $_POST["name"];
					$decription = $_POST["decription"];
					$type = $_POST["type"];
					$file_name = $_FILES["image"]["tmp_name"];
					$path = "./public/uploads/";
					$file_up = "";
					$file_up2 = "";
					$count = $this->execrisemodel->get_count($name);
					// if (mysqli_num_rows($count) < 1) {
						if (isset($_FILES["image"])) {
							if ($_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/jpg" || $_FILES["image"]["type"]=="image/gif" || $_FILES["image"]["type"]=="image/jpeg") {
				
								if ($_FILES["image"]["error"]<1) {
									if ($_FILES["image"]["size"]<5*1024*1024) {
										$file_up .=$path.$_FILES["image"]["name"];
										if (file_exists($file_up)) {
											$rand = rand(0,1000000000000);
											$file_up2 .=$path.$rand.$_FILES["image"]["name"];
											move_uploaded_file($file_name, $path.$rand.$_FILES["image"]["name"]);
											$kq = $this->execrisemodel->update($id,$name,$file_up2,$decription,$type);
											// $this->viewadmin("masterlayout",[
											// 	"page"=>"execrise/edit",
											// 	"result"=>$kq,
											// 	"type"=>$this->type_execrisemodel->get(),
											// 	"edit"=>$this->execrisemodel->edit($id),
											// ]);
												header("location:../execrise");

										}
										else{
											$kq = $this->execrisemodel->update($id,$name,$file_up,$decription,$type);

											move_uploaded_file($file_name, $path.$_FILES["image"]["name"]);
											// $this->viewadmin("masterlayout",[
											// 	"page"=>"execrise/edit",
											// 	"result"=>$kq,
											// 	"type"=>$this->type_execrisemodel->get(),
											// 	"edit"=>$this->execrisemodel->edit($id),

											// ]);
												header("location:../execrise");
											
										}
									}
									else{
											$this->viewadmin("masterlayout",[
												"page"=>"execrise/edit",
												"result"=>$kq,
												"type"=>$this->type_execrisemodel->get(),
												"edit"=>$this->execrisemodel->edit($id),

											]);
									}
								}
								else{
										$this->viewadmin("masterlayout",[
										"page"=>"execrise/edit",
										"result"=>$kq,
										"type"=>$this->type_execrisemodel->get(),
										"edit"=>$this->execrisemodel->edit($id),

									]);
								}
							}
							else{
										$this->viewadmin("masterlayout",[
										"page"=>"execrise/edit",
										"result"=>$kq,
										"type"=>$this->type_execrisemodel->get(),
										"edit"=>$this->execrisemodel->edit($id),

									]);
							}
						}
							else{

									$this->viewadmin("masterlayout",[
									"page"=>"execrise/edit",
									"result"=>$kq,
									"type"=>$this->type_execrisemodel->get(),
									"edit"=>$this->execrisemodel->edit($id),

								]);
							}
						// }
						// else{
						// 		$this->viewadmin("masterlayout",[
						// 		"page"=>"execrise/edit",
						// 		"result"=>$kq,
						// 		"type"=>$this->type_execrisemodel->get(),
						// 		"edit"=>$this->execrisemodel->edit($id),

						// 	]);

						// }

				}
			}
			// else{
			// 	$this->viewadmin("masterlayout",[
			// 		"page"=>"execrise/edit",
			// 		"type"=>$this->type_execrisemodel->get(),
			// 		"edit"=>$this->execrisemodel->edit($id),

			// 	]);
			// }
		}
		public function delete($id){

			$kq = $this->execrisemodel->delete($id);
			$this->viewadmin("masterlayout",[
				"page"=>"execrise/index",
				"execrise"=>$this->execrisemodel->get(),
				"result"=>$kq,
			]);
		}
	
	}
 ?>