<?php 
	class home extends controller{  // extends controller nằm ở thằng core/Controller
		public $customersmodel;
		public $detail_execrisemodel;
		public $type_execrisemodel;
		public $execrisemodel;
		function __construct(){
			$this->customersmodel = $this->model("customersmodel");
			$this->detail_execrisemodel = $this->model("detail_execrisemodel");
			$this->type_execrisemodel = $this->model("type_execrisemodel");
			$this->execrisemodel = $this->model("execrisemodel");
		}

		public function homePage(){
			$this->view("layoutmain",[ // return về view 
				"menu"=>$this->type_execrisemodel->get(),
			]);
		}
		public function list(){
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}
			else {
				$page =1;
			}
			$this->view("masterlayout",[ // return về view 
				"page"=>'page/allproduct',
				"menu"=>$this->type_execrisemodel->get(),
				"allproduct"=>$this->execrisemodel->page($page),
				"panigation"=>$this->execrisemodel->all_execrise(),
			]);
		}
		public function type_execrise($id){
				$this->view("masterlayout",[ // return về view 
				"page"=>'page/type_execrise',
				"menu"=>$this->type_execrisemodel->get(),
				"type_execrise"=>$this->execrisemodel->get_type($id),
			]);

		}
		public function detail($id){
				$this->view("masterlayout",[ // return về view 
				"page"=>'page/detail',
				"menu"=>$this->type_execrisemodel->get(),
				"detail"=>$this->execrisemodel->detail($id),
				"calendar"=>$this->execrisemodel->calendar(),
			]);

		}
		public function login(){
		if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}
			else {
				$page =1;
			}
			if (isset($_POST["login"])) {
				$username = $_POST["username"];
				$password_input = $_POST["password"];
				$user = $this->customersmodel->login($username);
				if (mysqli_num_rows($user)>0) {
					foreach ($user as  $value) {
						$password = $value["password"];
						$id_rule = $value["id_rule"];
						$name = $value["username"];
						$id = $value["id"];
					}

					if (password_verify($password_input, $password)) {
						$_SESSION["rule"] = $id_rule;
						$_SESSION["id"] = $id;
						$_SESSION["username"] = $name;
						$this->view("masterlayout",[
							"page"=>"page/allproduct",
							"menu"=>$this->type_execrisemodel->get(),
							"allproduct"=>$this->execrisemodel->page($page),
							"panigation"=>$this->execrisemodel->all_execrise(),

						]);
					}
					else{
						$this->view("login",[ // return về view 

						]);
					}
				}
				else{
					$this->view("login",[ // return về view 

					]);
				}

			}
			else{
					$this->view("login",[ // return về view 

					]);
			}
			
		}
		public function logout(){
			if (isset($_SESSION["rule"])) {
				unset($_SESSION["rule"]);
				$this->view("login",[ // return về view 

				]);
			}
		}
		public function register(){
			if (isset($_POST["register"])) {
				$kq = false;
				$true = 1;
				if (empty($_POST["name"])|| empty($_POST["username"])||empty($_POST["password"])||empty($_POST["number"])||empty($_POST["address"])||empty($_POST["email"])||empty($_POST["gender"])) {
					$this->view("register",[
					"menu"=>$this->type_execrisemodel->get(),
					"true"=>$true,
					]);
				}
				else{
					$name = $_POST["name"];
					$username = $_POST["username"];
					$password = $_POST["password"];
					$password = password_hash($password, PASSWORD_DEFAULT);
					$number = $_POST["number"];
					$address = $_POST["address"];
					$email = $_POST["email"];
					$gender = $_POST["gender"];
					$user = $this->customersmodel->count_user($username);
					$dem = mysqli_num_rows($user);
					if ($dem < 1) {
						$kq = $this->customersmodel->register($name,$username,$password,$number,$address,$email,$gender);	
					}
					$this->view("register",[
					"result" =>$kq,
					"menu"=>$this->type_execrisemodel->get(),
					]);
				}
			}
				$this->view("register",[ // return về view 

			]);
		}
		public function profile(){
			if (isset($_SESSION["rule"])) {
				$id = $_SESSION["id"];
			}
				$this->view("masterlayout",[ // return về view 
				"page"=>"page/profile",
				"profile_user"=>$this->customersmodel->profile($id),
				"menu"=>$this->type_execrisemodel->get(),

			]);
		}
		public function exerice(){
			if (isset($_SESSION["rule"]) && $_SESSION["id"]) {
				$id = $_SESSION["id"];
			}
				$this->view("masterlayout",[ // return về view 
				"page"=>"page/exercise",
				"detail"=>$this->detail_execrisemodel->detail_exercise($id),
				"menu"=>$this->type_execrisemodel->get(),

			]);
		}
		public function change_Pass(){
			$this->view("masterlayout",[
				"page"=>"page/changepass",
				"menu"=>$this->type_execrisemodel->get(),

			]);
		}
		public function change(){
			if (isset($_POST["change_pass"])) {
				if (isset($_SESSION["rule"])) {
					$id = $_SESSION["id"];
				}
				$kq = false;
				if (empty($_POST["password"]) || empty($_POST["password-confim"])) {
							$this->view("masterlayout",[
							"page"=>"page/changepass",
							"result"=>$kq,
							"menu"=>$this->type_execrisemodel->get(),
						]);
				}
				else{
					$password = $_POST["password"];
					$password_confirm = $_POST["password-confim"];
					if ($password == $password_confirm) {
						$password_confirm = password_hash($password_confirm, PASSWORD_DEFAULT);
						$kq = $this->customersmodel->changePass($id,$password_confirm);
							$this->view("masterlayout",[
							"page"=>"page/changepass",
							"result"=>$kq,
							"menu"=>$this->type_execrisemodel->get(),

						]);
					}
					else{
							$this->view("masterlayout",[
							"page"=>"page/changepass",
							"result"=>$kq,
							"menu"=>$this->type_execrisemodel->get(),
						]);
					}
				}
			}
		}
		public function chageprofile(){
			if (isset($_POST["change_profile"])) {
				if (isset($_SESSION["rule"])) {
					$id = $_SESSION["id"];
				}
				$kq = false;
				if (empty($_POST["name"])|| empty($_POST["number"])||empty($_POST["address"])||empty($_POST["email"])) {
						$this->view("masterlayout",[
							"page"=>"page/profile",
							"result"=>$kq,
							"profile_user"=>$this->customersmodel->profile($id),
							"menu"=>$this->type_execrisemodel->get(),

						]);
				}
				else{
					$name = $_POST["name"];
					$number = $_POST["number"];
					$address = $_POST["address"];
					$email = $_POST["email"];
					$kq = $this->customersmodel->update_profile($id,$name,$number,$address,$email);
							$this->view("masterlayout",[
							"page"=>"page/profile",
							"result"=>$kq,
							"profile_user"=>$this->customersmodel->profile($id),
							"menu"=>$this->type_execrisemodel->get(),

						]);
				}
			}
		}
		public function insert_detail(){
			if (isset($_POST["add_order"])) {
				if (!isset($_SESSION["rule"])) {
					$this->view("login",[ // return về view 
						"menu"=>$this->type_execrisemodel->get(),
					]);
				
					}
					else{
						if (isset($_SESSION["rule"])) {
							$id =$_SESSION["id"];
							$calendar =$_POST["calendar"];
							$card = !empty($_SESSION["cart"])?$_SESSION["cart"]:[];
							$order_detail = $this->detail_execrisemodel->insert($id,$calendar);
							$max = $this->detail_execrisemodel->max();
							while ($row_max = mysqli_fetch_array($max)) {
								$id_order = $row_max["id"];
							}
							foreach ($card as $value) {
								$or = $this->detail_execrisemodel->get_count_or($value['id'],$calendar);
								if (mysqli_num_rows($or)< 1) {
								 $order_card = $this->execrisemodel->insert_cart($value["id"],$id_order);
									
								}
								else{
									unset($_SESSION["cart"]);
									header("location:../home/exerice");
								}
							}


						}
						unset($_SESSION["cart"]);
						header("location:../home/exerice");
					}
			}
		
		}
		public function add_to_card($id){
			
			$card_add = $this->execrisemodel->adđ_to_card($id);
			$cart = array();
			foreach ($card_add as  $value) {
				$cart[$value["id"]]= $value;
			}

			if (isset($_POST["insert"])) {
				
				if (!isset($_SESSION["cart"]) || $_SESSION["cart"] == null) {
					$_SESSION["cart"][$id] = $cart[$id];
				}
				else{
					$_SESSION["cart"][$id] = $cart[$id];

				}
			}
			header("location:../viewer");
		}
		public function viewer(){
			$this->view("masterlayout",[
				"page"=>"page/card",
				"menu"=>$this->type_execrisemodel->get(),
				"calendar"=>$this->execrisemodel->calendar(),
			]);
		}
		public function delete_cart($id){
			if (isset($_SESSION["cart"][$id])) {
				unset($_SESSION["cart"][$id]);
			}
			header("location:../viewer");

		}
		public function delete_order($id){
			if (isset($_SESSION["rule"]) && $_SESSION["id"]) {
				$id_cus = $_SESSION["id"];
			}
			$kq = $this->detail_execrisemodel->delete_order($id);
				$this->view("masterlayout",[ // return về view 
				"page"=>"page/exercise",
				"menu"=>$this->type_execrisemodel->get(),
				"detail"=>$this->detail_execrisemodel->detail_exercise($id_cus),
				"result"=>$kq

			]);
		}
		public function execrise_detail($id){
				$this->view("masterlayout",[ // return về view 
				"page"=>"page/execrise_detail",
				"menu"=>$this->type_execrisemodel->get(),
				"detail_exercise"=>$this->execrisemodel->get_execrise($id),
			]);
		}
		public function search(){
			if (isset($_POST["action"])) {
				$search_name =$_POST["search_name"];
				$kq = $this->execrisemodel->search($search_name);
				$output ="";
				foreach ($kq as  $value) {
					
					$output .='
							<li><a href="home/detail/'.$value['id'].'">
								<div class="image"><img src="'.$value["image"].'" alt=""></div>
								<div class="content"><p>'.$value['name'].'</p></div>
							</a></li>

					';
				}
				echo $output;
			}
		}
		public function delete($id){
			$kq = $this->detail_execrisemodel->delete_detail($id);
			header("location:../exerice");
			
		}
	}

 ?>