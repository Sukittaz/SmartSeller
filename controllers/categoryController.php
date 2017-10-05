<?php

class categoryController extends controller {

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
        $category = new Category();
        
        $data['category'] = $category->selectAll();  

        $this->loadTemplate('category-list', $data, 'category');
    }

    public function add() {
        $data = array();   

        $category = new Category();

        if (isset($_POST['submit'])) {
            $category->setCategoryName($_POST['CategoryName']);
            $category->insert();

            header("Location: ".BASE."category");    
        }   

        $this->loadTemplate('category-add', $data, 'category');
    }

    public function view($id) {
        $data = array();   
        $category = new Category();
        $data['category'] = $category->selectById($id);

        $this->loadTemplate('category-view', $data, 'category');
    }

    public function edit($id) {
        $data = array();  
        $category = new Category();
        $data['category'] = $category->selectById($id); 

        if (isset($_POST['submit'])) {
            $category->setCategoryName($_POST['CategoryName']);
            $category->update($id);

            header("Location: ".BASE."category");    
        }          

        $this->loadTemplate('category-edit', $data, 'category');
    }

    public function delete($id) {
        $data = array();   
        $category = new Category();
        $category->delete($id);

        header("Location: ".BASE."category");    
    }

}