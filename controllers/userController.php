<?php

class userController extends controller {

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
        $user = new User();
        
        $data['user'] = $user->selectInner();  

        $this->loadTemplate('user-list', $data, 'user');
    }

    public function add() {
        $data = array();   

        $user  = new User();
        $bunch = new Bunch();

        $data['bunch'] = $bunch->selectAll();

        if (isset($_POST['submit'])) {
            $dir = 'uploads/user/'.$_SESSION['User']['CompanyID'].'/';
            $name = $_FILES['UserImage']['name'];

            if (!file_exists($dir)) {
               mkdir($dir, 0777, true) or die("erro ao criar diretório");
            }

            move_uploaded_file($_FILES['UserImage']['tmp_name'], $dir.$name);

            $user->setBunchID($_POST['BunchID']);
            $user->setUserName($_POST['UserName']);
            $user->setUserLogin($_POST['UserLogin']);
            $user->setUserEmail($_POST['UserEmail']);
            $user->setUserPass($_POST['UserPass']);
            $user->setUserImage($dir.$name);
            $user->insert();

            header("Location: ".BASE."user");    
        }   

        $this->loadTemplate('user-add', $data, 'user');
    }

    public function view($id) {
        $data = array();   
        $user = new User();
        $data['user'] = $user->selectInner($id);

        $this->loadTemplate('user-view', $data, 'user');
    }

    public function edit($id) {
        $data  = array();  
        $user  = new User();
        $bunch = new Bunch();

        $data['user']  = $user->selectInner($id); 
        $data['bunch'] = $bunch->selectAll();

        if (isset($_POST['submit'])) {
            $user->setBunchID($_POST['BunchID']);
            $user->setUserName($_POST['UserName']);
            $user->setUserLogin($_POST['UserLogin']);
            $user->setUserEmail($_POST['UserEmail']);
            $user->setUserImage($dir.$name);

            $user->update($id);

            header("Location: ".BASE."user");     
        }

        if (isset($_POST['alter-pass'])) {
            $user->setUserPass($_POST['UserPass']);
            $user->updatePass($id);
        }

        $this->loadTemplate('user-edit', $data, 'user');   
    }

    public function delete($id) {
        $data = array();   
        $user = new User();
        $user->delete($id);

        header("Location: ".BASE."user");    
    }

}