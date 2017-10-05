<?php

class SaleProducts extends DB {

	protected $table = 'sale_products';
	private $SaleProductsID;
	private $CompanyID;
	private $SaleID;
	private $ProductID;
	private $SaleProductQtd;
	private $SaleProductPrice;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setSaleID($SaleID){
		$this->SaleID = $SaleID;
	}

	public function setProductID($ProductID){
		$this->ProductID = $ProductID;
	}		

	public function setSaleProductQtd($SaleProductQtd){
		$this->SaleProductQtd = $SaleProductQtd;
	}	

	public function setSaleProductPrice($SaleProductPrice){
		$this->SaleProductPrice = $SaleProductPrice;
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
		$sql = "INSERT INTO $this->table (CompanyID, SaleID, ProductID, SaleProductQtd, SaleProductPrice) VALUES (:CompanyID, :SaleID, :ProductID, :SaleProductQtd, :SaleProductPrice)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':SaleID', $this->SaleID);
		$stm->bindParam(':ProductID', $this->ProductID);
		$stm->bindParam(':SaleProductQtd', $this->SaleProductQtd);
		$stm->bindParam(':SaleProductPrice', $this->SaleProductPrice);

		$stm->execute();
	}

	public function update() {}

	public function delete($SaleID) {
		$sql = "DELETE FROM $this->table WHERE SaleID = :SaleID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SaleID', $SaleID);

		$stm->execute();
	}

}