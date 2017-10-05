<?php

Class homeController extends controller {

	public function __construct() {
        parent::__construct();

		$user = new User();
        if($user->isLogged() == false) {
        	header("Location: ".BASE."login");
        	exit;
        }
	}

    public function index() {
        $dados = array(
        	'opa' => 'ola'
        );        
        
        $this->loadTemplate('home', $dados, 'home');
    }

}