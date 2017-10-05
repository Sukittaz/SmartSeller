<?php

class expenseController extends controller {

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
        $expense = new Expense();
        
        $data['expense'] = $expense->selectAll();  

        $this->loadTemplate('expense-list', $data, 'expense');
    }

    public function add() {
        $data = array();   

        $expense = new Expense();

        if (isset($_POST['submit'])) {
            $dir = 'uploads/expense/'.$_SESSION['User']['CompanyID'].'/';
            $name = $_FILES['ExpenseAttach']['name'];



            if (!file_exists($dir)) {
               mkdir($dir, 0777, true) or die("erro ao criar diretório");
            }

            move_uploaded_file($_FILES['ExpenseAttach']['tmp_name'], $dir.$name);  

            $expense->setExpenseDate($_POST['ExpenseDate']);
            $expense->setExpenseRef($_POST['ExpenseRef']);
            $expense->setExpenseValue($_POST['ExpenseValue']);
            $expense->setExpenseAttach($dir.$name);
            $expense->setExpenseDetail($_POST['ExpenseDetail']);
            $expense->insert();

            header("Location: ".BASE."expense");    
        }   

        $this->loadTemplate('expense-add', $data, 'expense');
    }

    public function view($id) {
        $data = array();   
        $expense = new Expense();
        $data['expense'] = $expense->selectById($id);

        $this->loadTemplate('expense-view', $data, 'expense');
    }

    public function edit($id) {
        $data = array();  
        $expense = new Expense();
        $data['expense'] = $expense->selectById($id); 

        if (isset($_POST['submit'])) {
            $expense->setExpenseDate($_POST['ExpenseDate']);
            $expense->setExpenseRef($_POST['ExpenseRef']);
            $expense->setExpenseValue($_POST['ExpenseValue']);
            $expense->setExpenseDetail($_POST['ExpenseDetail']);
            $expense->update($id);

            header("Location: ".BASE."expense");    
        }          

        $this->loadTemplate('expense-edit', $data, 'expense');
    }

    public function delete($id) {
        $data = array();   
        $expense = new Expense();
        $expense->delete($id);

        header("Location: ".BASE."expense");    
    }

}