<?php

class Purchase extends DB {

	protected $table = 'purchase';
	private $PurchaseID;
	private $CompanyID;
	private $SupplierID;
	private $PurchaseData;
	private $PurchaseRef;
	private $PurchaseStatus;
	private $PurchaseAttach;
	private $PurchaseDetail;
	private $PurchaseTotal;

	private $CategoryName;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setSupplierID($SupplierID){
		$this->SupplierID = $SupplierID;
	}

	public function setPurchaseData($PurchaseData){
		$this->PurchaseData = $PurchaseData;
	}

	public function setPurchaseRef($PurchaseRef){
		$this->PurchaseRef = $PurchaseRef;
	}

	public function setPurchaseStatus($PurchaseStatus){
		$this->PurchaseStatus = $PurchaseStatus;
	}

	public function setPurchaseAttach($PurchaseAttach){
		$this->PurchaseAttach = $PurchaseAttach;
	}

	public function setPurchaseDetail($PurchaseDetail){
		$this->PurchaseDetail = $PurchaseDetail;
	}

	public function setPurchaseTotal($PurchaseTotal){
		$this->PurchaseTotal = $PurchaseTotal;
	}	

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectInner($PurchaseID = 0) {
		$sql = "SELECT * FROM purchase_products pp
				INNER JOIN purchase pc ON pc.PurchaseID = pp.PurchaseID
				INNER JOIN product pd ON pd.ProductID = pp.ProductID
				INNER JOIN supplier sp ON sp.SupplierID = pc.SupplierID
				WHERE pp.CompanyID = :CompanyID";

		if ($PurchaseID != 0) {
			$sql .= " AND pc.PurchaseID = :PurchaseID";
		}

		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);	

		if ($PurchaseID != 0) {
			$stm->bindParam(':PurchaseID', $PurchaseID);	
		}
		
		$stm->execute();

		return $stm->fetchAll();				
	}

	public function selectById($PurchaseID) {
		$sql = "SELECT * FROM $this->table WHERE PurchaseID = :PurchaseID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':PurchaseID', $PurchaseID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, SupplierID, PurchaseData, PurchaseRef, PurchaseStatus, PurchaseAttach, PurchaseDetail, PurchaseTotal) VALUES (:CompanyID, :SupplierID, :PurchaseData, :PurchaseRef, :PurchaseStatus, :PurchaseAttach, :PurchaseDetail, :PurchaseTotal)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':SupplierID', $this->SupplierID);
		$stm->bindParam(':PurchaseData', $this->PurchaseData);
		$stm->bindParam(':PurchaseRef', $this->PurchaseRef);
		$stm->bindParam(':PurchaseStatus', $this->PurchaseStatus);
		$stm->bindParam(':PurchaseAttach', $this->PurchaseAttach);
		$stm->bindParam(':PurchaseDetail', $this->PurchaseDetail);
		$stm->bindParam(':PurchaseTotal', $this->PurchaseTotal);

		$stm->execute();
		$Con = DB::getInstance();
		return $Con->lastInsertId();		
	}

	public function update($PurchaseID) {
		$sql = "UPDATE $this->table SET SupplierID = :SupplierID, PurchaseData = :PurchaseData, PurchaseRef = :PurchaseRef, PurchaseStatus = :PurchaseStatus, PurchaseAttach = :PurchaseAttach, PurchaseDetail = :PurchaseDetail WHERE PurchaseID = :PurchaseID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryName', $this->CategoryName);
		$stm->bindParam(':SupplierID', $this->SupplierID);
		$stm->bindParam(':PurchaseData', $this->PurchaseData);
		$stm->bindParam(':PurchaseRef', $this->PurchaseRef);
		$stm->bindParam(':PurchaseStatus', $this->PurchaseStatus);
		$stm->bindParam(':PurchaseAttach', $this->PurchaseAttach);
		$stm->bindParam(':PurchaseDetail', $this->PurchaseDetail);		
		$stm->bindParam(':PurchaseID', $PurchaseID);

		return $stm->execute();
	}

	public function delete($PurchaseID) {
		$sql = "DELETE FROM $this->table WHERE PurchaseID = :PurchaseID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':PurchaseID', $PurchaseID);

		$stm->execute();
	}

}