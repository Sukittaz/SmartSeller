<?php

class saleController extends controller {

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
        $saleNormal = array();
        $sale = new Sale();
        
        $data['sale'] = $sale->selectInner();

        foreach ($data['sale'] as $value) {
            $saleNormal['sale'][$value->SaleID]['SaleID']                         = $value->SaleID;
            $saleNormal['sale'][$value->SaleID]['SaleDate']                       = $value->SaleDate;
            $saleNormal['sale'][$value->SaleID]['SaleQtd']                        = $value->SaleQtd;
            $saleNormal['sale'][$value->SaleID]['SaleTotal']                      = $value->SaleTotal;
            $saleNormal['sale'][$value->SaleID]['SaleTotalPaid']                  = $value->SaleTotalPaid;
            $saleNormal['sale'][$value->SaleID]['SaleRest']                       = $value->SaleRest;
            $saleNormal['sale'][$value->SaleID]['SaleProfit']                     = $value->SaleProfit;
            $saleNormal['sale'][$value->SaleID]['Products'][$value->ProductID]    = $value->ProductName;
        }        

        $this->loadTemplate('sale-list', $saleNormal, 'sale');
    }

    public function view($id) {
        $data = array(); 
        $saleNormal = array();
        $sale = new Sale();
        
        $data['sale'] = $sale->selectInner($id); 

        foreach ($data['sale'] as $value) {
            $saleNormal['sale'][$value->SaleID]['SaleID']                                              = $value->SaleID;
            $saleNormal['sale'][$value->SaleID]['SaleDate']                                            = $value->SaleDate;
            $saleNormal['sale'][$value->SaleID]['SaleQtd']                                             = $value->SaleQtd;
            $saleNormal['sale'][$value->SaleID]['SaleTotal']                                           = $value->SaleTotal;
            $saleNormal['sale'][$value->SaleID]['SaleTotalPaid']                                       = $value->SaleTotalPaid;
            $saleNormal['sale'][$value->SaleID]['SaleDetail']                                          = $value->SaleDetail;
            $saleNormal['sale'][$value->SaleID]['SaleRest']                                            = $value->SaleRest;
            $saleNormal['sale'][$value->SaleID]['Products'][$value->ProductID]['ProductName']          = $value->ProductName;
            $saleNormal['sale'][$value->SaleID]['Products'][$value->ProductID]['SaleProductQtd']       = $value->SaleProductQtd;
            $saleNormal['sale'][$value->SaleID]['Products'][$value->ProductID]['SaleProductPrice']     = $value->SaleProductPrice;
        }        

        $this->loadTemplate('sale-view', $saleNormal, 'sale');        
    }    

    public function cashier(){
        $data         = array(); 
        $profit       = array(); 
        $saleNormal   = array();
        $saleExtract  = array();

        $costFinal    = 0;
        $priceFinal   = 0;
        $saleProfit   = 0;        
        $costumer     = new Costumer();
        $sale         = new Sale();
        $saleProducts = new SaleProducts();
        $company      = new Company();
        $products     = new Product();
        
        $saleNormal['costumer'] = $costumer->selectAll();
        $data['saleWait']       = $sale->selectWait();

        foreach ($data['saleWait'] as $value) {
            $saleNormal['saleWait'][$value->SaleID]['SaleID']               = $value->SaleID;
            $saleNormal['saleWait'][$value->SaleID]['SaleRefWait']          = $value->SaleRefWait;
       }        

        if (isset($_POST['submit']) OR isset($_POST['extract']) ) {
           
            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $profit[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $profit[$key]['ProductPrice'] = $value2;
            }     

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $profit[$key]['ProductCost'] = $value2;
            }  

            foreach ($_POST['ProductTypeCalc'] as $key => $value2) {
                $profit[$key]['ProductTypeCalc'] = $value2;
            }    

            foreach ($_POST['SubTotal'] as $key => $value2) {
                $profit[$key]['SubTotal'] = $value2;
            }                    

            foreach ($profit as $key => $value) {

                if ($value['ProductTypeCalc'] == "Quantidade") {
                    $priceFinal += ($value['ProductQtd'] * $value['ProductPrice']);
                    $costFinal  += ($value['ProductQtd'] * $value['ProductCost']);
                }else{
                    $priceFinal += ($value['SubTotal']);
                    $costFinal  += ($value['ProductQtd'] * $value['ProductCost']);
                }
            }

            $saleProfit = ($priceFinal - $costFinal);    

            if ($_POST['CostumerID'] == 0) {
                $sale->setCostumerID(NULL);
            }else{
                $sale->setCostumerID($_POST['CostumerID']);
            }

            $sale->setSaleDate(date('Y-m-d H:i'));
            $sale->setSaleQtd($_POST['SaleQtd']);
            $sale->setSaleTotal($_POST['SaleTotal']);
            $sale->setSaleTotalPaid($_POST['SaleTotalPaid']);
            $sale->setSaleRest($_POST['SaleRest']);
            $sale->setSaleProfit($saleProfit);
            $sale->setSalePayment($_POST['SalePayment']);
            $sale->setSaleDetail($_POST['SaleDetail']);
            $sale->setSaleStatus(1);

            $saleID = $sale->insert();            

            foreach ($_POST['ProductID'] as $key => $value) {
                $array[$key]['ProductID'] = $value;               
            }   

            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $array[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $array[$key]['ProductPrice'] = $value2;
            }                 

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $array[$key]['ProductCost'] = $value2;
            }  

            foreach ($array as $key => $value) {  
                $saleProducts->setSaleID($saleID);
                $saleProducts->setProductID($value['ProductID']);
                $saleProducts->setSaleProductQtd($value['ProductQtd']);
                $saleProducts->setSaleProductPrice($value['ProductPrice']);
                $saleProducts->insert();

                $products->setProductQtd($value['ProductQtd']);
                $products->updateAlertProducts($value['ProductID']);
            }    

            if (isset($_POST['extract'])) {

                $data['saleExtract']        = $sale->selectInner($saleID);
                $saleExtract['company']     = $company->selectById();

                foreach ($data['saleExtract'] as $value) {
                    $saleExtract['saleExtract'][$value->SaleID]['SaleID']                                               = $value->SaleID;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleRefWait']                                          = $value->SaleRefWait;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleDate']                                             = $value->SaleDate;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleQtd']                                              = $value->SaleQtd;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleTotal']                                            = $value->SaleTotal;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleTotalPaid']                                        = $value->SaleTotalPaid;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleRest']                                             = $value->SaleRest;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['ProductID']             = $value->ProductID;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['ProductName']           = $value->ProductName;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductPrice']      = $value->SaleProductPrice;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductCost']       = $value->ProductCost;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductQtd']        = $value->SaleProductQtd;
                }     
                $this->loadTemplate('extract', $saleExtract, 'common');  
            }
        }   

        $this->loadTemplate('cashier', $saleNormal, 'sale');        
    }

    public function wait() {
        $data         = array(); 
        $sale         = new Sale();
        $saleProducts = new SaleProducts();

        if (isset($_POST['submit'])) {
           
            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $profit[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $profit[$key]['ProductPrice'] = $value2;
            }     

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $profit[$key]['ProductCost'] = $value2;
            }   

            if ($_POST['CostumerID'] == 0) {
                $sale->setCostumerID(NULL);
            }else{
                $sale->setCostumerID($_POST['CostumerID']);
            }
            $sale->setSaleDate(date('Y-m-d H:i'));
            $sale->setSaleStatus(0);
            $sale->setSaleRefWait($_POST['SaleRefWait']);

            $saleID = $sale->insert();            

            foreach ($_POST['ProductID'] as $key => $value) {
                $array[$key]['ProductID'] = $value;               
            }   

            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $array[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $array[$key]['ProductPrice'] = $value2;
            }                 

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $array[$key]['ProductCost'] = $value2;
            }  

            foreach ($array as $key => $value) {  
                $saleProducts->setSaleID($saleID);
                $saleProducts->setProductID($value['ProductID']);
                $saleProducts->setSaleProductQtd($value['ProductQtd']);
                $saleProducts->setSaleProductPrice($value['ProductPrice']);
                $saleProducts->insert();
            }    
        }   
        
        header('Location:'.BASE.'sale/cashier');
    }

    public function updateSale($id) {
        $data         = array(); 
        $saleRestore  = array();
        $costumer     = new Costumer();
        $sale         = new Sale();
        $saleProducts = new SaleProducts();
        $company      = new Company();

        $costFinal    = 0;
        $priceFinal   = 0;
        $saleProfit   = 0;   
        
        $saleRestore['costumer']    = $costumer->selectAll();
        $data['saleRestore']        = $sale->selectWait($id);
        $data['saleWait']           = $sale->selectWait();

        foreach ($data['saleWait'] as $value) {
            $saleRestore['saleWait'][$value->SaleID]['SaleID']                                               = $value->SaleID;
            $saleRestore['saleWait'][$value->SaleID]['SaleRefWait']                                          = $value->SaleRefWait;
       }   

        foreach ($data['saleRestore'] as $value) {
            $saleRestore['saleRestore'][$value->SaleID]['SaleID']                                               = $value->SaleID;
            $saleRestore['saleRestore'][$value->SaleID]['SaleRefWait']                                          = $value->SaleRefWait;
            $saleRestore['saleRestore'][$value->SaleID]['SaleDate']                                             = $value->SaleDate;
            $saleRestore['saleRestore'][$value->SaleID]['SaleQtd']                                              = $value->SaleQtd;
            $saleRestore['saleRestore'][$value->SaleID]['SaleTotal']                                            = $value->SaleTotal;
            $saleRestore['saleRestore'][$value->SaleID]['SaleTotalPaid']                                        = $value->SaleTotalPaid;
            $saleRestore['saleRestore'][$value->SaleID]['SaleRest']                                             = $value->SaleRest;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['ProductID']             = $value->ProductID;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['ProductName']           = $value->ProductName;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['SaleProductPrice']      = $value->SaleProductPrice;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['SaleProductCost']       = $value->ProductCost;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['SaleProductQtd']        = $value->SaleProductQtd;
            $saleRestore['saleRestore'][$value->SaleID]['Products'][$value->ProductID]['ProductTypeCalc']       = $value->ProductTypeCalc;
       }   

        if (isset($_POST['submit']) OR isset($_POST['extract'])) {
           
            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $profit[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $profit[$key]['ProductPrice'] = $value2;
            }     

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $profit[$key]['ProductCost'] = $value2;
            }  

            foreach ($profit as $key => $value) {
                $priceFinal += ($value['ProductQtd'] * $value['ProductPrice']);
                $costFinal  += ($value['ProductQtd'] * $value['ProductCost']);
            }

            $saleProfit = ($priceFinal - $costFinal);  
            
            $sale->setSaleQtd($_POST['SaleQtd']);
            $sale->setSaleTotal($_POST['SaleTotal']);
            $sale->setSaleTotalPaid($_POST['SaleTotalPaid']);
            $sale->setSaleRest($_POST['SaleRest']);
            $sale->setSaleProfit($saleProfit);
            $sale->setSalePayment($_POST['SalePayment']);
            $sale->setSaleDetail($_POST['SaleDetail']);
            $sale->setSaleDetail(NULL);
            $sale->setSaleStatus(1);

            $sale->updateSale($id);
            $saleProducts->delete($id);

            foreach ($_POST['ProductID'] as $key => $value) {
                $array[$key]['ProductID'] = $value;               
            }   

            foreach ($_POST['ProductQtd'] as $key => $value1) {
                $array[$key]['ProductQtd'] = $value1;
            }  

            foreach ($_POST['ProductPrice'] as $key => $value2) {
                $array[$key]['ProductPrice'] = $value2;
            }                 

            foreach ($_POST['ProductCost'] as $key => $value2) {
                $array[$key]['ProductCost'] = $value2;
            }  

            foreach ($array as $key => $value) {  
                $saleProducts->setSaleID($id);
                $saleProducts->setProductID($value['ProductID']);
                $saleProducts->setSaleProductQtd($value['ProductQtd']);
                $saleProducts->setSaleProductPrice($value['ProductPrice']);
                $saleProducts->insert();
            }     

            if (isset($_POST['extract'])) {

                $data['saleExtract']        = $sale->selectInner($id);
                $saleExtract['company']     = $company->selectById();

                foreach ($data['saleExtract'] as $value) {
                    $saleExtract['saleExtract'][$value->SaleID]['SaleID']                                               = $value->SaleID;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleRefWait']                                          = $value->SaleRefWait;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleDate']                                             = $value->SaleDate;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleQtd']                                              = $value->SaleQtd;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleTotal']                                            = $value->SaleTotal;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleTotalPaid']                                        = $value->SaleTotalPaid;
                    $saleExtract['saleExtract'][$value->SaleID]['SaleRest']                                             = $value->SaleRest;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['ProductID']             = $value->ProductID;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['ProductName']           = $value->ProductName;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductPrice']      = $value->SaleProductPrice;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductCost']       = $value->ProductCost;
                    $saleExtract['saleExtract'][$value->SaleID]['Products'][$value->ProductID]['SaleProductQtd']        = $value->SaleProductQtd;
                }    
                $this->loadTemplate('extract', $saleExtract, 'common');               
            }                            

            header('Location:'.BASE.'sale/cashier');
        }           

        $this->loadTemplate('cashier', $saleRestore, 'sale');        
    }
}