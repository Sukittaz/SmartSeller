<?php
class ajaxController extends controller {

    public function __construct() {
        parent::__construct();

        $user = new User();
        if($user->isLogged() == false) {
            header("Location: ".BASE."login");
            exit;
        }
    }

    public function index(){}

    public function searchProduct() {
        $data = array();
        $product = new Product();

        $value = $_GET['value'];
        $data = $product->selectByName($value);

        echo json_encode($data);
    }

    public function searchSaleWait() {
        $data = array();
        $sale = new Sale();

        $value = $_GET['value'];
        $sale->setSaleRefWait($value);
        $data = $sale->searchSaleWait();

        echo json_encode($data);        
    }

    public function dailyReport(){
        $data   = array();
        $report = new Report();
        $value  = $_GET['value'];
        $date   = implode('-',array_reverse(explode('/',$value)));

        $data['dailySales']       = $report->dailySales($date);
        $data['dailyPurchases']   = $report->dailyPurchases($date);
        $data['dailyExpenses']    = $report->dailyExpenses($date);
        $data['dailyProfit']      = $report->dailyProfit($date);

        echo json_encode($data);
    }

    public function monthlyReport(){
        $data   = array();
        $report = new Report();
        $value  = $_GET['value'];
        $date   = explode('/', $value);
        $month  = $date[0];
        $year   = $date[1];


        $data['monthlySales']       = $report->monthlySales($month, $year);
        $data['monthlyPurchases']   = $report->monthlyPurchases($month, $year);
        $data['monthlyExpenses']    = $report->monthlyExpenses($month, $year);
        $data['monthlyProfit']      = $report->monthlyProfit($month, $year);        

        echo json_encode($data);
    }    

    public function getCityList(){
        $data         = array();
        $dataNormal   = array();
        $city         = new City();
        $state        = $_GET['state'];

        $data['cities'] = $city->getCityList($state);

        foreach ($data['cities'] as $city) {
           $dataNormal['cities'][$city->CityCode]['CityCode'] = $city->CityCode;
           $dataNormal['cities'][$city->CityCode]['CityName'] = utf8_encode($city->CityName);
        }

        echo json_encode($dataNormal);
    }
}
















