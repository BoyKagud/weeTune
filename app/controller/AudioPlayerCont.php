<?php

class AudioPlayerCont extends Controller {

	public funtcion __construct() {

	}

	public function __construct($audID) {
		$this->view(get_class()); // load view
		$this->model(get_class()); // load model
		$src = $model->get_audSrc($audID); // get source of audio file
	}

}