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

	//source : http://php.net/manual/en/function.empty.php
	public static function array_empty($mixed) {
		if (is_array($mixed)) {
	        foreach ($mixed as $value) {
	            if (!self::array_empty($value)) {
	                return false;
	            }
	        }
	    }
	    elseif (!empty($mixed)) {
	        return false;
	    }
   		return true;
	}

	public static function getInt($str) {
		preg_match_all('!\d+!', $str, $matches);
		if(self::array_empty($matches)) return 0; else return $matches;
	}

	public static function getSpecialChars($str) {
		preg_match('/[^a-zA-Z]+/', $str, $matches);
		if(self::array_empty($matches)) return 0; else return $matches;
	}

	public static function isAlphaOnly($str) {
		$ret = true;
		if(self::getInt($str) == 0) $ret = true; else $ret = false;
		if(self::getSpecialChars($str) == 0) $ret = true; else $ret = false;
		return $ret;
	}

	public function sendMail($to, $subject, $message) {
		$headers = 'From: WeeTune.com <noreply@WeeTune.com>' . "\r\n"
						."Content-type: text/html; charset=iso-8859-1\r\n"
						."Content-Transfer-Encoding: 8bit\r\n\r\n";
			mail($to, $subject, $message, $headers);		
	}

}