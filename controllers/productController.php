<?php

class productController extends controller {

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
        $product = new Product();
        
        $data['product'] = $product->selectAll();
        
        $this->loadTemplate('product-list', $data, 'product');
    }

    public function add() {
        $data = array();   
        $category = new Category();
        $data['category'] = $category->selectAll();

        $product = new Product();

        if (isset($_POST['submit'])) {
            $product->setProductName($_POST['ProductName']);
            $product->setProductCode($_POST['ProductCode']);
            $product->setCategoryID($_POST['CategoryID']);
            $product->setProductCost($_POST['ProductCost']);
            $product->setProductPrice($_POST['ProductPrice']);
            $product->setProductQtd($_POST['ProductQtd']);
            $product->setProductAlert($_POST['ProductAlert']);
            $product->setProductDetail($_POST['ProductDetail']);
            $product->setProductTypeCalc($_POST['ProductTypeCalc']);

            $product->insert();

            header("Location: ".BASE."product");    
        }   

        $this->loadTemplate('product-add', $data, 'product');
    }

    public function view($id) {
        $data = array();   
        $product = new Product();
        $category = new Category();
        $data['product'] = $product->selectById($id);
        $data['category'] = $category->selectAll();

        $this->loadTemplate('product-view', $data, 'product');
    }

    public function edit($id) {
        $data = array();  
        $product = new Product();
        $category = new Category();
        $data['product']  = $product->selectById($id);
        $data['category'] = $category->selectAll();

        if (isset($_POST['submit'])) {
            $product->setProductName($_POST['ProductName']);
            $product->setProductCode($_POST['ProductCode']);
            $product->setCategoryID($_POST['CategoryID']);
            $product->setProductCost($_POST['ProductCost']);
            $product->setProductPrice($_POST['ProductPrice']);
            $product->setProductQtd($_POST['ProductQtd']);
            $product->setProductAlert($_POST['ProductAlert']);
            $product->setProductDetail($_POST['ProductDetail']);
            $product->setProductTypeCalc($_POST['ProductTypeCalc']);

            $product->update($id);

            header("Location: ".BASE."product");    
        }          


        $this->loadTemplate('product-edit', $data, 'product');
    }

    public function delete($id) {
        $data = array();   
        $product = new Product();
        $product->delete($id);

        header("Location: ".BASE."product");    
    }

    public function message(){
        $data = array();  
        $product = new Product();

        $data['alert'] = $product->messageAlert();

        $this->loadTemplate('products-message', $data, 'product');
    }
}