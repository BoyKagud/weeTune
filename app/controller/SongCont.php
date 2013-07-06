<?php 

require_once('Controller.php');
class SongCont extends Controller {
	
	public function __construct() {
		parent::view(get_class());
		// parent::model(get_class());
	}

}