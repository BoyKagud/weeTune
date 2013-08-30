<?php

require_once('Controller.php');
class UserCont extends Controller {

	private $id;
	private $fname;
	private $lname;
	private $mname;
	private $email;
	private $model;

	public function __construct() {
		// $this->model = parent::model(get_class(), true);
	}

	public function user_init($id) {
		$userInfo = $this->get_user_info($id);

		$this->id = $userInfo['id'];
		$this->fname = $userInfo['first_name'];
		$this->lname = $userInfo['last_name'];
		$this->mname = $userInfo['middle_name'];
		$this->email = $userInfo['email'];
	}

	public function regUserAjax($info) { 
		$arrTranslate = array('first_name'=>$info['fn'], 
						'last_name'=>$info['ln'], 
						'profileName'=>$info['pn'], 
						'email'=>$info['e'], 
						'password'=>md5($info['pw']));

		// check for duplicates
		// >> check for illegal characters
		//check mail. duplicate mail input. if mail1 == mail2 then true;
		if(parent::isAlphaOnly($arrTranslate['first_name']) &&  
			parent::isAlphaOnly($arrTranslate['last_name']) && 
			parent::isAlphaOnly($arrTranslate['profileName']) )
		{
			echo "ok";
		} else {
			echo "no";
		}
			//query search if email already exists

		// if no duplicate model->reguser.
			// regUser, retrieve activation Token
			// if token != null sendMail
				//if sendmail == true return 1;
		// echo $this->model->regUser($info);
	    
	}

	public function login($uname, $pword) {

	}

	protected function get_user_info($id) {
		return $this->model->get_user_info($id); 
	}


}