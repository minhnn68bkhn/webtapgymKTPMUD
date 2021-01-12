<?php
class App{
	//http://localhost/TL2/home/action/1/2/3
	protected $controller="home";
	protected $action="homePage";
	protected $param=[];
	function __construct(){
		//Array ( [0] => home [1] => tintuc [2] => 1 [3] => 2 [4] => 3 )
		 $array = $this->urlProcess();
		 // xử lý controller
		 if (file_exists("./mvc/controller/".$array[0].".php")) {
		 	$this ->controller = $array[0];
		 	unset($array[0]);

		 }
		 	require_once "./mvc/controller/" .$this->controller.".php";
		 	$this ->controller = new $this->controller;


		 	// xử lý action
		 	if (isset($array[1])) {
		 		if (method_exists($this ->controller,$array[1])) {
		 			$this ->action =$array[1];
		 			unset($array[1]);
		 		}

		 	}

		 	// xử lý tham số param
		 	$this ->param =$array?array_values($array):[];
		 
			call_user_func_array([$this->controller,$this->action],$this->param);

	}
	function urlProcess(){
	//	/home/tintuc/1/2/3 -> xử lý cắt chuỗi
		if (isset($_GET["url"])) {
		return	explode("/", filter_var(trim($_GET["url"],"/")));
		 // xử lý khoẳng trắng [] của url
		}
	}
}
?>