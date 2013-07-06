<?php

require_once('Controller.php');
class UserCont extends Controller {

	private $id;
	private $fname;
	private $lname;
	private $mname;
	private $email;
	private $model;

	public function __construct($id) {
		$this->model = parent::model(get_class(), true);

		$userInfo = $this->get_user_info($id);

		$this->id = $userInfo['id'];
		$this->fname = $userInfo['first_name'];
		$this->lname = $userInfo['last_name'];
		$this->mname = $userInfo['middle_name'];
		$this->email = $userInfo['email'];
	}

	public function regUser($info) {
		print_r($info);
		echo $info['password'];

		// check for duplicates
			// check for illegal characters
			//query search if email already exists

		// if no duplicate model->reguser.
		$this->model->regUser($info);
	}

	protected function get_user_info($id) {
		return $this->model->get_user_info($id); 
	}


}