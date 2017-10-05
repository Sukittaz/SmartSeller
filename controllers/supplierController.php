<?php

class supplierController extends controller {

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
        $supplier = new Supplier();
        
        $data['supplier'] = $supplier->selectAll();  

        $this->loadTemplate('supplier-list', $data, 'supplier');
    }

    public function add() {
        $data = array();   

        $supplier = new Supplier();

        if (isset($_POST['submit'])) {
            $supplier->setSupplierName($_POST['SupplierName']);
            $supplier->setSupplierEmail($_POST['SupplierEmail']);
            $supplier->setSupplierPhone($_POST['SupplierPhone']);
            $supplier->setSupplierCNPJ($_POST['SupplierCNPJ']);
            $supplier->setSupplierDetail($_POST['SupplierDetail']);
            $supplier->insert();

            header("Location: ".BASE."supplier");    
        }   

        $this->loadTemplate('supplier-add', $data, 'supplier');
    }

    public function view($id) {
        $data = array();   
        $supplier = new Supplier();
        $data['supplier'] = $supplier->selectById($id);

        $this->loadTemplate('supplier-view', $data, 'supplier');
    }

    public function edit($id) {
        $data = array();  
        $supplier = new Supplier();
        $data['supplier'] = $supplier->selectById($id); 

        if (isset($_POST['submit'])) {
            $supplier->setSupplierName($_POST['SupplierName']);
            $supplier->setSupplierEmail($_POST['SupplierEmail']);
            $supplier->setSupplierPhone($_POST['SupplierPhone']);
            $supplier->setSupplierCNPJ($_POST['SupplierCNPJ']);
            $supplier->setSupplierDetail($_POST['SupplierDetail']);
            $supplier->update($id);

            header("Location: ".BASE."supplier");    
        }          

        $this->loadTemplate('supplier-edit', $data, 'supplier');
    }

    public function delete($id) {
        $data = array();   
        $supplier = new Supplier();
        $supplier->delete($id);

        header("Location: ".BASE."supplier");    
    }

}