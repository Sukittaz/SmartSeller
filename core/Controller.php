<?php
Class Controller {

	protected $lang;

	public function __construct() {
		global $config;
		$this->lang = new Language();
	}	

	public function loadView($viewName, $viewData = array(), $viewFolder = '') {
		extract($viewData);
		if ($viewFolder != '') {
			require_once ('views/'.$viewFolder.'/'.$viewName.'.php');
		}else{
			require_once ('views/'.$viewName.'.php');
		}
	}

	public function loadTemplate($viewName, $viewData = array(), $viewFolder = '') {
		require_once ('views/template/template.php');
	}

	public function loadViewInTemplate($viewName, $viewData = array(), $viewFolder = '') {
		extract($viewData);

		if ($viewFolder != '') {
			require_once ('views/'.$viewFolder.'/'.$viewName.'.php');
		}else{
			require_once ('views/'.$viewName.'.php');
		}
	}

}