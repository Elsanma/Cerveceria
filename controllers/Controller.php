<?php
namespace Controllers;
class Controller
{
	public function model($model) {
		try
		{
			require_once './models/'.$model.'.php';
			return new $model(); 
		}
		catch (Exception $ex)
		{
		  echo $ex->getMessage();
		  die;
		}
	}
	public function view($view,$data='') {
		try
		{
			require_once './views/'.$view.'.php';
		}
		catch (Exception $ex)
		{
		  echo $ex->getMessage();
		  die;
		}
	}
}
