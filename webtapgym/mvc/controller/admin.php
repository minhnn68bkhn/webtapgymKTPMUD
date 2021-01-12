<?php 
	class admin extends controller {
		public $customersmodel;
		function __construct(){
			$this->customersmodel = $this->model("customersmodel");
		}
		public function homePage(){
			$this->viewadmin("masterlayout",[
				"page"=>"page/dash",
			]);
		}
		public function login(){
				$this->viewadmin("login",[

			]);
		}
		public function login_admin(){
					$kq = false;

			if (isset($_POST["login"])) {
				if (empty($_POST["username"])|| empty($_POST["password"])) {
					$this->viewadmin("login",[
						"result"=>$kq
					]);
				}
				else{
					$username = $_POST["username"];
					$password_input = $_POST["password"];
					$count = $this->customersmodel->count_user($username);
					if (mysqli_num_rows($count)>0) {
						while ($row = mysqli_fetch_array($count)) {
							$password =$row["password"];
								$rule = $row["id_rule"];
								$id = $row["id"];
						}
						if (password_verify($password_input, $password)) {
							$_SESSION["admin"] = $rule;
							$_SESSION["id"] = $id;
							if ($_SESSION["admin"] == 1) {
								$this->viewadmin("masterlayout",[
									"page"=>"page/dash",
									"result"=>$kq= true,
								]);

							}
							else{
								$this->viewadmin("login",[
								"result"=>$kq
							]);
							}
						}
						else{
								$this->viewadmin("login",[
								"result"=>$kq
							]);
						}
					}
					else{
						$this->viewadmin("login",[
							"result"=>$kq
						]);
					}
				}
			}
			else{

			}
		}
		public function logout(){
			if (isset($_SESSION["admin"])) {
				unset($_SESSION["admin"]);
					$this->viewadmin("login",[

				]);
			}
		}
		public function change(){
				$this->viewadmin("masterlayout",[
					
							"page"=>"changeadmin",
					]);
				
		}
		public function changePass(){
			if (isset($_POST["change_pass"])) {
				if (isset($_SESSION["admin"])) {
					$id = $_SESSION["id"];
				}
				$kq = false;
				if (empty($_POST["password"]) || empty($_POST["password-confim"])) {
							$this->viewadmin("masterlayout",[
							"page"=>"changeadmin",
							"result"=>$kq,
						]);
				}
				else{
					$password = $_POST["password"];
					$password_confirm = $_POST["password-confim"];
					if ($password == $password_confirm) {
						$password_confirm = password_hash($password_confirm, PASSWORD_DEFAULT);
						$kq = $this->customersmodel->changePass($id,$password_confirm);
							$this->viewadmin("masterlayout",[
							"page"=>"changeadmin",
							"result"=>$kq,

						]);
					}
				}
			}	
		}
	}
 ?>