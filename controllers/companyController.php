<?php

class companyController extends controller {

	public function __construct() {
        parent::__construct();
        
		$user = new User();
        if($user->isLogged() == false) {
        	header("Location: ".BASE."login");
        	exit;
        }
	}

    public function index() { }

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
        $company = new Company();
        $data['company'] = $company->selectById($id); 

        if (isset($_POST['submit'])) {
            $dir = 'uploads/company/'.$_SESSION['User']['CompanyID'].'/';
            $name = $_FILES['CompanyImage']['name'];

            if (!file_exists($dir)) {
               mkdir($dir, 0777, true) or die("erro ao criar diretório");
            }

            move_uploaded_file($_FILES['CompanyImage']['tmp_name'], $dir.$name);

            $company->setCompanyName($_POST['CompanyName']);
            $company->setCompanyCNPJ($_POST['CompanyCNPJ']);
            $company->setCompanyAddres($_POST['CompanyAddres']);
            $company->setCompanyAddresNumber($_POST['CompanyAddresNumber']);
            $company->setCompanyComplement($_POST['CompanyComplement']);
            $company->setCompanyNeigh($_POST['CompanyNeigh']);
            $company->setCompanyCity($_POST['CompanyCity']);
            $company->setCompanyUF($_POST['CompanyUF']);
            $company->setCompanyCep($_POST['CompanyCep']);
            $company->setCompanyPhone($_POST['CompanyPhone']);
            $company->setCompanySocialName($_POST['CompanySocialName']);
            $company->setCompanyIE($_POST['CompanyIE']);
            $company->setCompanyIEST($_POST['CompanyIEST']);
            $company->setCompanyIM($_POST['CompanyIM']);
            $company->setCompanyCNAE($_POST['CompanyCNAE']);
            $company->setCompanyImage($dir.$name);
            $company->update($id);

            header("Location: ".BASE."company/edit/".$_SESSION['User']['CompanyID']);    
        }          

        $this->loadTemplate('company-edit', $data, 'company');
    }
}