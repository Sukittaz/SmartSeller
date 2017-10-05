<?php

class Report extends DB {

	private $CompanyID;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function dailySales($date) {
		$sql = "SELECT COUNT(SaleID) AS TotalSales, SUM(SaleTotal) AS TotalMoney
				FROM smartseller.sale 
				WHERE CAST(SaleDate as date) = :SaleDate AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleDate', $date);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();	
	}

	public function dailyPurchases($date) {
		$sql = "SELECT COUNT(PurchaseID) AS TotalPurchase, SUM(PurchaseTotal) AS TotalMoney
				FROM smartseller.purchase 
				WHERE CAST(PurchaseData as date) = :PurchaseData AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':PurchaseData', $date);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();			
	}

	public function dailyExpenses($date) {
		$sql = "SELECT COUNT(ExpenseID) AS TotalExpense, SUM(ExpenseValue) AS TotalMoney
				FROM smartseller.expense 
				WHERE CAST(ExpenseDate as date) = :ExpenseDate AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':ExpenseDate', $date);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();			
	}	

	public function dailyProfit($date) {
		$sql = "SELECT COUNT(SaleID) AS TotalProfit, SUM(SaleProfit) AS TotalMoney
				FROM smartseller.sale 
				WHERE CAST(SaleDate as date) = :SaleDate AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleDate', $date);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();	

		return $stm->fetch();			
	}

	public function monthlySales($month, $year) {
		$sql = "SELECT COUNT(SaleID) AS TotalSales, SUM(SaleTotal) AS TotalMoney
				FROM smartseller.sale 
				WHERE MONTH(SaleDate) = :Month AND YEAR(SaleDate) = :Year AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':Month', $month);
		$stm->bindParam(':Year', $year);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();	
	}

	public function monthlyPurchases($month, $year) {
		$sql = "SELECT COUNT(PurchaseID) AS TotalPurchase, SUM(PurchaseTotal) AS TotalMoney
				FROM smartseller.purchase 
				WHERE MONTH(PurchaseData) = :Month AND YEAR(PurchaseData) = :Year AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':Month', $month);
		$stm->bindParam(':Year', $year);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();	
	}	

	public function monthlyExpenses($month, $year) {
		$sql = "SELECT COUNT(ExpenseID) AS TotalExpense, SUM(ExpenseValue) AS TotalMoney
				FROM smartseller.expense 
				WHERE MONTH(ExpenseDate) = :Month AND YEAR(ExpenseDate) = :Year AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':Month', $month);
		$stm->bindParam(':Year', $year);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();	
	}	

	public function monthlyProfit($month, $year) {
		$sql = "SELECT COUNT(SaleID) AS TotalProfit, SUM(SaleProfit) AS TotalMoney
				FROM smartseller.sale 
				WHERE MONTH(SaleDate) = :Month AND YEAR(SaleDate) = :Year AND CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':Month', $month);
		$stm->bindParam(':Year', $year);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->execute();

		return $stm->fetch();	
	}		
}