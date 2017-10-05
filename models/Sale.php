<?php

class Sale extends DB {

	protected $table = 'sale';
	private $SaleID;
	private $CompanyID;
	private $CostumerID;
	private $SaleDate;
	private $SaleQtd;	
	private $SaleTotal;
	private $SaleTotalPaid;
	private $SaleRest;
	private $SaleProfit;
	private $SalePayment;
	private $SaleDetail;
	private $SaleStatus;
	private $SaleRefWait;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setCostumerID($CostumerID){
		$this->CostumerID = $CostumerID;
	}	

	public function setSaleDate($SaleDate){
		$this->SaleDate = $SaleDate;
	}

	public function setSaleQtd($SaleQtd){
		$this->SaleQtd = $SaleQtd;
	}	
	
	public function setSaleTotal($SaleTotal){
		$this->SaleTotal = $SaleTotal;
	}

	public function setSaleTotalPaid($SaleTotalPaid){
		$this->SaleTotalPaid = $SaleTotalPaid;
	}

	public function setSaleRest($SaleRest){
		$this->SaleRest = $SaleRest;
	}

	public function setSaleProfit($SaleProfit){
		$this->SaleProfit = $SaleProfit;
	}	

	public function setSalePayment($SalePayment){
		$this->SalePayment = $SalePayment;
	}	

	public function setSaleDetail($SaleDetail){
		$this->SaleDetail = $SaleDetail;
	}		

	public function setSaleStatus($SaleStatus){
		$this->SaleStatus = $SaleStatus;
	}		

	public function setSaleRefWait($SaleRefWait){
		$this->SaleRefWait = $SaleRefWait;
	}			

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectInner($SaleID = 0){
		$sql = "SELECT * FROM sale_products sp
				INNER JOIN sale sl ON sl.SaleID = sp.SaleID
				INNER JOIN product pd ON pd.ProductID = sp.ProductID
				WHERE sp.CompanyID = :CompanyID AND SaleStatus = :SaleStatus";

		if ($SaleID != 0) {
			$sql .= " AND sl.SaleID = :SaleID";
		}

		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);	
		$stm->bindValue(':SaleStatus', 1);

		if ($SaleID != 0) {
			$stm->bindParam(':SaleID', $SaleID);	
		}
		
		$stm->execute();

		return $stm->fetchAll();				
	}

	public function selectById($SaleID) {
		$sql = "SELECT * FROM $this->table WHERE SaleID = :SaleID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleID', $SaleID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function selectWait($SaleID = 0) {
		$sql = "SELECT * FROM sale_products sp
				INNER JOIN sale sl ON sl.SaleID = sp.SaleID
				INNER JOIN product pd ON pd.ProductID = sp.ProductID
				WHERE sp.CompanyID = :CompanyID AND sl.SaleStatus = :SaleStatus";

		if ($SaleID != 0) {
			$sql .= " AND sl.SaleID = :SaleID";
		}

		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);	
		$stm->bindValue(':SaleStatus', 0);

		if ($SaleID != 0) {
			$stm->bindParam(':SaleID', $SaleID);	
		}
		
		$stm->execute();

		return $stm->fetchAll();			
	}

	public function searchSaleWait() {
		$sql = "SELECT SaleID FROM sale WHERE SaleRefWait = :SaleRefWait AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleRefWait', $this->SaleRefWait);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();			
	}	

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, CostumerID, SaleDate, SaleQtd, SaleTotal, SaleTotalPaid, SaleRest, SaleProfit, SalePayment, SaleDetail, SaleStatus, SaleRefWait) VALUES (:CompanyID, :CostumerID, :SaleDate, :SaleQtd, :SaleTotal, :SaleTotalPaid, :SaleRest, :SaleProfit, :SalePayment, :SaleDetail, :SaleStatus, :SaleRefWait)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':CostumerID', $this->CostumerID);
		$stm->bindParam(':SaleDate', $this->SaleDate);
		$stm->bindParam(':SaleQtd', $this->SaleQtd);
		$stm->bindParam(':SaleTotal', $this->SaleTotal);
		$stm->bindParam(':SaleTotalPaid', $this->SaleTotalPaid);
		$stm->bindParam(':SaleRest', $this->SaleRest);
		$stm->bindParam(':SaleProfit', $this->SaleProfit);
		$stm->bindParam(':SalePayment', $this->SalePayment);
		$stm->bindParam(':SaleDetail', $this->SaleDetail);
		$stm->bindParam(':SaleStatus', $this->SaleStatus);
		$stm->bindParam(':SaleRefWait', $this->SaleRefWait);

		$stm->execute();
		$Con = DB::getInstance();
		return $Con->lastInsertId();			
	}

	public function updateSale($SaleID) {
		$sql = "UPDATE $this->table SET SaleQtd = :SaleQtd, SaleTotal = :SaleTotal, SaleTotalPaid = :SaleTotalPaid, SaleRest = :SaleRest, SaleProfit = :SaleProfit,  SalePayment = :SalePayment, SaleDetail = :SaleDetail, SaleStatus = :SaleStatus, SaleRefWait = :SaleRefWait  WHERE SaleID = :SaleID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleQtd', $this->SaleQtd);
		$stm->bindParam(':SaleTotal', $this->SaleTotal);
		$stm->bindParam(':SaleTotalPaid', $this->SaleTotalPaid);
		$stm->bindParam(':SaleRest', $this->SaleRest);
		$stm->bindParam(':SaleProfit', $this->SaleProfit);
		$stm->bindParam(':SalePayment', $this->SalePayment);
		$stm->bindParam(':SaleDetail', $this->SaleDetail);
		$stm->bindParam(':SaleStatus', $this->SaleStatus);
		$stm->bindParam(':SaleRefWait', $this->SaleRefWait);
		$stm->bindParam(':SaleID', $SaleID);

		return $stm->execute();
	}

	public function delete($SaleID) {
		$sql = "DELETE FROM $this->table WHERE SaleID = :SaleID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleID', $SaleID);

		$stm->execute();
	}

}