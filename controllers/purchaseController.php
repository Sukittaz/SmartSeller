<?php

class purchaseController extends controller {

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
        $purchaseNormal = array();
        $purchase = new Purchase();

        $data['purchase'] = $purchase->selectInner(); 
 
        foreach ($data['purchase'] as $value) {
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseID']      = $value->PurchaseID;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseData']    = $value->PurchaseData;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseRef']     = $value->PurchaseRef;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseAttach']  = $value->PurchaseAttach;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseDetail']  = $value->PurchaseDetail;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseStatus']  = $value->PurchaseStatus;
            $purchaseNormal['purchase'][$value->PurchaseID]['SupplierID']      = $value->SupplierID;
            $purchaseNormal['purchase'][$value->PurchaseID]['SupplierName']    = $value->SupplierName;
            $purchaseNormal['purchase'][$value->PurchaseID]['Products'][$value->ProductID] = $value->ProductName;
        }

        $this->loadTemplate('purchase-list', $purchaseNormal, 'purchase');
    }

    public function add() {
        $data          = array();  
        $array         = array(); 
        $PurchaseTotal = 0;

        $purchase = new Purchase();
        $supplier = new Supplier();      

        $product          = new Product(); 
        $purchaseProducts = new PurchaseProducts(); 

        $data['supplier'] = $supplier->selectAll();

        if (isset($_POST['submit'])) {
            
            $dir = 'uploads/purchase/'.$_SESSION['User']['CompanyID'].'/';
            $name = $_FILES['PurchaseAttach']['name'];

            if (!file_exists($dir)) {
               mkdir($dir, 0777, true) or die("erro ao criar diretório");
            }

            move_uploaded_file($_FILES['PurchaseAttach']['tmp_name'], $dir.$name);

            foreach ($_POST['ProductID'] as $key => $value) {
                $array[$key]['ProductID'] = $value;               
            }   

            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $array[$key]['ProductQtd'] = $value1;
            }     

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $array[$key]['ProductCost'] = $value2;
            }    

            foreach ($array as $key => $value) {
                $PurchaseTotal += ($value['ProductQtd'] * $value['ProductCost']);
            }

            $purchase->setSupplierID($_POST['SupplierID']);
            $purchase->setPurchaseData(date('Y-m-d H:i'));
            $purchase->setPurchaseRef($_POST['PurchaseRef']);
            $purchase->setPurchaseStatus($_POST['PurchaseStatus']);
            $purchase->setPurchaseAttach($dir.$name);
            $purchase->setPurchaseDetail($_POST['PurchaseDetail']);
            $purchase->setPurchaseTotal($PurchaseTotal);
            $PurchaseID = $purchase->insert();

            foreach ($array as $key => $value) {
                $product->setProductQtd($value['ProductQtd']);
                $product->setProductCost($value['ProductCost']);
                $product->updateNewPurchase($value['ProductID']); 
                
                $purchaseProducts->setPurchaseID($PurchaseID);
                $purchaseProducts->setProductID($value['ProductID']);
                $purchaseProducts->setPurchaseProductQtd($value['ProductQtd']);
                $purchaseProducts->setPurchaseProductCost($value['ProductCost']);

                $purchaseProducts->insert();
            }

            header("Location: ".BASE."purchase");    
        }   

        $this->loadTemplate('purchase-add', $data, 'purchase');
    }

    public function view($id) {
        $data = array();   
        $purchase = new Purchase();
        $supplier = new Supplier();
        $data['purchase'] = $purchase->selectInner($id); 
 
        foreach ($data['purchase'] as $value) {
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseID']                                           = $value->PurchaseID;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseData']                                         = $value->PurchaseData;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseRef']                                          = $value->PurchaseRef;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseAttach']                                       = $value->PurchaseAttach;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseDetail']                                       = $value->PurchaseDetail;
            $purchaseNormal['purchase'][$value->PurchaseID]['PurchaseStatus']                                       = $value->PurchaseStatus;
            $purchaseNormal['purchase'][$value->PurchaseID]['SupplierID']                                           = $value->SupplierID;
            $purchaseNormal['purchase'][$value->PurchaseID]['SupplierName']                                         = $value->SupplierName;
            $purchaseNormal['purchase'][$value->PurchaseID]['Products'][$value->ProductID]['ProductName']           = $value->ProductName;
            $purchaseNormal['purchase'][$value->PurchaseID]['Products'][$value->ProductID]['PurchaseProductQtd']    = $value->PurchaseProductQtd;
            $purchaseNormal['purchase'][$value->PurchaseID]['Products'][$value->ProductID]['PurchaseProductCost']   = $value->PurchaseProductCost;
        }

        $this->loadTemplate('purchase-view', $purchaseNormal, 'purchase');
    }

    public function edit($id) {
        $data = array();  
        $purchase = new Purchase();
        $category = new Category();
        $data['purchase'] = $purchase->selectById($id); 
        $data['category'] = $purchase->SelectAll(); 

        if (isset($_POST['submit'])) {
            $purchase->setpurchaseName($_POST['purchaseName']);
            $purchase->update($id);

            header("Location: ".BASE."purchase");    
        }          

        $this->loadTemplate('purchase-edit', $data, 'purchase');
    }

    public function delete($id) {
        $data = array();   
        $purchase = new Purchase();
        $purchase->delete($id);

        header("Location: ".BASE."purchase");    
    }
}