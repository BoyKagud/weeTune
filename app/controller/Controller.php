<?php

class Controller {

	private $model;
	private $view;
	public $cart;
	private static $home_url = "http://localhost/weetune.com";

	public function view($class) {
		// exec('ls', $output, $ret);
		// print_r($output);
		$view = substr($class, 0, -4);
		require_once('app/view/View.php'); 
		require_once('app/view/'.$view."View.php"); 
		$class = $view."View";
		new $class();
	}

	public function model($class, $return) {
		$model = substr($class, 0, -4);
		$modelfile = 'app/model/Model.php';
		if (file_exists($modelfile)) {
			require_once('app/model/Model.php');
			require_once('app/model/'.$model."Mode.php"); 
		} else {
			require_once('../app/model/Model.php');
			require_once('../app/model/'.$model."Mode.php");
		}

		$class = $model."Mode";
		if($return == true) {
			$db = new $class();
			return $db;
		} else {new $class();}
	}

	public static function get_index() {
		require_once('HomeCont.php');
		new HomeCont();
	}

	public static function get_page($page) {
		$page = substr(ucfirst($page),0,-1);
		$pageContURI = 'app/controller/'.$page."Cont.php";
		// echo $pageContURI;
		if(file_exists($pageContURI)) {
			require_once($pageContURI);
			$cont = $page."Cont";
			new $cont;
		} else {Controller::get_index();}
	}

	public function get_top_sellers() {
		// fetch from Model
	}

	public static function get_home_url() {
		return Controller::$home_url;
	}

}