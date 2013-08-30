<?php
session_start();
ini_set('memory_limit', '64M');
require_once("app/controller/Controller.php");
$request = explode('/', $_SERVER['REQUEST_URI']);
// print_r($request);

// instead of instantiating directly, must call Controller function get_page()
Controller::get_page($request[2]);
// Controller::get_index();
