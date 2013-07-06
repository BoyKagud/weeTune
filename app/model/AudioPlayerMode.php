<?php

class AudioPlayerMode extends Model {

	public function __construct() {
		
	}

	public function get_audSrc($audId) {
		$audData = parent::get_result('audio', $audId); //build on Model.php
		return $audData['src'];
	}

}