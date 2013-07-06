<?php 

require_once('../app/controller/UserCont.php');

//get action
$action = $_POST['action'];
if(function_exists($action)) $action();

function regUser() {
	//retrieve variables
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pname = $_POST['pname'];
	$email = $_POST['email'];
	$pword = $_POST['pword'];

	//init
	// use dummy index. to rename inside class. for security
	$details = array('first_name'=>$fname, 
						'last_name'=>$lname, 
						'profileName'=>$pname, 
						'email'=>$email, 
						'password'=>$pword);

	//instatiate Artist Object & pass vars to contruct as array
	$user = new UserCont();
	$user->regUserAjax($details);
}
