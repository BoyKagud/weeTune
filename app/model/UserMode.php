<?php

// require('Model.php');
class UserMode extends Model {

	public function __construct() {
		parent::__construct();
	}

	private function get_user_info($id) {
		return parent::getUserFromID($id);
	}

	public static function regUser($userInfo) {
		// $userInfo['']

		//call parent insert method
		$model = new Model();
		return $model->insert('users', $userInfo);
	}

}