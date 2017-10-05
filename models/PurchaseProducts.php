<?php

class PurchaseProducts extends DB {

	protected $table = 'purchase_products';
	private $PurchaseProductsID;
	private $CompanyID;
	private $PurchaseID;
	private $ProductID;
	private $PurchaseProductQtd;
	private $PurchaseProductCost;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setPurchaseID($PurchaseID){
		$this->PurchaseID = $PurchaseID;
	}

	public function setProductID($ProductID){
		$this->ProductID = $ProductID;
	}	

	public function setPurchaseProductQtd($PurchaseProductQtd){
		$this->PurchaseProductQtd = $PurchaseProductQtd;
	}	

	public function setPurchaseProductCost($PurchaseProductCost){
		$this->PurchaseProductCost = $PurchaseProductCost;
	}				

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($PurchaseProductsID) {
		$sql = "SELECT * FROM $this->table WHERE CategoryID = :CategoryID AND PurchaseProductsID = :PurchaseProductsID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryID', $CategoryID);
		$stm->bindParam(':PurchaseProductsID', $PurchaseProductsID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, PurchaseID, ProductID, PurchaseProductQtd, PurchaseProductCost) VALUES (:CompanyID, :PurchaseID, :ProductID, :PurchaseProductQtd, :PurchaseProductCost)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':PurchaseID', $this->PurchaseID);
		$stm->bindParam(':ProductID', $this->ProductID);
		$stm->bindParam(':PurchaseProductQtd', $this->PurchaseProductQtd);
		$stm->bindParam(':PurchaseProductCost', $this->PurchaseProductCost);

		$stm->execute();
	}

	public function update($PurchaseProductsID) {
		$sql = "UPDATE $this->table SET CompanyID = :CompanyID, PurchaseID = :PurchaseID, ProductID = :ProductID, PurchaseProductQtd = :PurchaseProductQtd, PurchaseProductCost = :PurchaseProductCost) WHERE PurchaseProductsID = :PurchaseProductsID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryName', $this->CategoryName);
		$stm->bindParam(':PurchaseProductsID', $PurchaseProductsID);

		return $stm->execute();
	}

	public function delete($PurchaseProductsID) {
		$sql = "DELETE FROM $this->table WHERE PurchaseProductsID = :PurchaseProductsID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':PurchaseProductsID', $PurchaseProductsID);

		$stm->execute();
	}

}