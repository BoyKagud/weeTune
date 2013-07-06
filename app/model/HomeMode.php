<?php

// require('Model.php');
class HomeMode extends Model {

	public function __construct() {
		parent::__construct();
	}

	private function get_top_selling_albums() {
		$this->get_top_albums();
	}

}