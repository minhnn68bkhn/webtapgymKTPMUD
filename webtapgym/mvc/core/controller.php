<?php 
/**
 * 
 */
class controller  
{
	
	public function model($model){

		require_once "./mvc/model/".$model.".php";
		return new $model;
	}
	public function view($view,$data=[]){
		require_once "./mvc/view/user/".$view.".php";
		//return new $view;
	}
	public function viewadmin($view,$data=[]){
		require_once "./mvc/view/admin/".$view.".php";
		//return new $view;
	}
}
?>