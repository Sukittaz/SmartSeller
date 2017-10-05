<?php

class reportController extends controller {

	public function __construct() {
        parent::__construct();
        
		$user = new User();
        if($user->isLogged() == false) {
        	header("Location: ".BASE."login");
        	exit;
        }
	}

    public function index() {}

    public function add() {}

    public function dailyReport() {
        $data = array();   

        $this->loadTemplate('daily-report', $data, 'report');
    }

    public function monthlyReport() {
        $data = array();   

        $this->loadTemplate('monthly-report', $data, 'report');
    }        

}