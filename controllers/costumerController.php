<?php

class costumerController extends controller {

	public function __construct() {
        parent::__construct();
        
		$user = new User();
        if($user->isLogged() == false) {
        	header("Location: ".BASE."login");
        	exit;
        }
	}

    public function index() {
        $data = array();   
        $costumer = new Costumer();
        
        $data['costumer'] = $costumer->selectAll();
        
        $this->loadTemplate('costumer-list', $data, 'costumer');
    }

    public function add() {
        $data = array();   
        $costumer = new Costumer();
        $category = new Category();

        $data['category'] = $category->selectAll();

        if (isset($_POST['submit'])) {

            $costumer->setCostumerName($_POST['CostumerName']);
            $costumer->setCostumerCPF($_POST['CostumerCPF']);
            $costumer->setCostumerEmail($_POST['CostumerEmail']);
            $costumer->setCostumerPhone($_POST['CostumerPhone']);
            $costumer->setCostumerCEP($_POST['CostumerCEP']);
            $costumer->setCostumerAddres($_POST['CostumerAddres']);
            $costumer->setCostumerAddresNumber($_POST['CostumerAddresNumber']);
            $costumer->setCostumerNeigh($_POST['CostumerNeigh']);
            $costumer->setCostumerUF($_POST['CostumerUF']);
            $costumer->setCostumerCity($_POST['CostumerCity']);
            $costumer->setCostumerCountry($_POST['CostumerCountry']);
            $costumer->setCostumerDetail($_POST['CostumerDetail']);
            $costumer->insert();

            header("Location: ".BASE."costumer");    
        }   

        $this->loadTemplate('costumer-add', $data, 'costumer');
    }

    public function view($id) {
        $data = array();   
        $costumer = new Costumer();
        $category = new Category();
        $data['costumer'] = $costumer->selectById($id);
        $data['category'] = $category->selectAll();

        $this->loadTemplate('costumer-view', $data, 'costumer');
    }

    public function edit($id) {
        $data = array();  
        $costumer = new Costumer();
        $category = new Category();
        $data['costumer']  = $costumer->selectById($id);
        $data['category'] = $category->selectAll();

        if (isset($_POST['submit'])) {
            $costumer->setCostumerName($_POST['CostumerName']);
            $costumer->setCostumerCPF($_POST['CostumerCPF']);
            $costumer->setCostumerEmail($_POST['CostumerEmail']);
            $costumer->setCostumerPhone($_POST['CostumerPhone']);
            $costumer->setCostumerCEP($_POST['CostumerCEP']);
            $costumer->setCostumerAddres($_POST['CostumerAddres']);
            $costumer->setCostumerAddresNumber($_POST['CostumerAddresNumber']);
            $costumer->setCostumerNeigh($_POST['CostumerNeigh']);
            $costumer->setCostumerCity($_POST['CostumerCity']);
            $costumer->setCostumerDetail($_POST['CostumerDetail']);
            $costumer->update($id);

            header("Location: ".BASE."costumer");    
        }          


        $this->loadTemplate('costumer-edit', $data, 'costumer');
    }

    public function delete($id) {
        $data = array();   
        $costumer = new Costumer();
        $costumer->delete($id);

        header("Location: ".BASE."costumer");    
    }

}