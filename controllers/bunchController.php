<?php

class bunchController extends controller {

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
        $bunch = new Bunch();
        
        $data['bunch'] = $bunch->selectAll();  

        $this->loadTemplate('bunch-list', $data, 'bunch');
    }

    public function add() {
        $data = array();   

        $bunch            = new Bunch();
        $permission       = new Permission();
        $bunchPermissions = new BunchPermissions();

        $data['permission'] = $permission->selectAll();

        if (isset($_POST['submit'])) {

            $bunch->setBunchName($_POST['BunchName']);
            $BunchID = $bunch->insert();

            foreach ($_POST['PermissionID'] as $value) {
                $bunchPermissions->setBunchID($BunchID);
                $bunchPermissions->setPermissionID($value);
                $bunchPermissions->insert();
            }

            header("Location: ".BASE."bunch");    
        }   

        $this->loadTemplate('bunch-add', $data, 'bunch');
    }

    public function view($id) {
        $data = array();   
        $bunchNormal                = array();
        $bunch                      = new Bunch();
        $bunchPermissions           = new BunchPermissions();
        $data['bunch']              = $bunch->selectInner($id); 
        
        foreach ($data['bunch'] as $value) {
            $bunchNormal['bunch'][$value->BunchID]['BunchID']                                                = $value->BunchID;
            $bunchNormal['bunch'][$value->BunchID]['BunchName']                                              = $value->BunchName;
            $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value->PermissionID]['PermissionID']      = $value->PermissionID;
            $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value->PermissionID]['PermissionName']    = $value->PermissionName;
        }    

        $this->loadTemplate('bunch-view', $bunchNormal, 'bunch');
    }

    public function edit($id) {
        $data                       = array();  
        $bunchNormal                = array();
        $bunch                      = new Bunch();
        $permissions                = new Permission();
        $bunchPermissions           = new BunchPermissions();
        $data['bunch']              = $bunch->selectInner($id); 
        $data['AllPermissions']     = $permissions->selectAll(); 

        foreach ($data['bunch'] as $value) {
            foreach ($data['AllPermissions'] as $key => $value2) {
                $bunchNormal['bunch'][$value->BunchID]['BunchID']                                                = $value->BunchID;
                $bunchNormal['bunch'][$value->BunchID]['BunchName']                                              = $value->BunchName;
                $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value2->PermissionID]['PermissionName']   = $value2->PermissionName;
                $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value2->PermissionID]['PermissionID']     = $value2->PermissionID;
                $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value->PermissionID]['Selected']          = 'true';
                $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value->PermissionID]['PermissionID']      = $value->PermissionID;
                $bunchNormal['bunch'][$value->BunchID]['Permissions'][$value->PermissionID]['PermissionName']    = $value->PermissionName;  
            }
        }    
        
        if (isset($_POST['submit'])) {

            $bunch->setBunchName($_POST['BunchName']);
            $bunch->update($id);
            $bunchPermissions->delete($id);

            foreach ($_POST['PermissionID'] as $value) {
                $bunchPermissions->setBunchID($id);
                $bunchPermissions->setPermissionID($value);
                $bunchPermissions->insert();
            }

            header("Location: ".BASE."bunch");    
        }          

        $this->loadTemplate('bunch-edit', $bunchNormal, 'bunch');
    }

    public function delete($id) {
        $data = array();   
        $bunch = new Bunch();
        $bunch->delete($id);

        header("Location: ".BASE."bunch");    
    }

}