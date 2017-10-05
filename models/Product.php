<?php

class Product extends DB {

	protected $table = 'product';
	private $ProductID;
	private $CompanyID;
	private $CategoryID;
	private $ProductName;
	private $ProductCode;
	private $ProductCost;
	private $ProductPrice;
	private $ProductQtd;
	private $ProductAlert;
	private $ProductDetail;
	private $ProductTypeCalc;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setCategoryID($CategoryID){
		$this->CategoryID = $CategoryID;
	}	

	public function setProductName($ProductName){
		$this->ProductName = $ProductName;
	}

	public function setProductCode($ProductCode){
		$this->ProductCode = $ProductCode;
	}

	public function setProductCost($ProductCost){
		$this->ProductCost = $ProductCost;
	}

	public function setProductPrice($ProductPrice){
		$this->ProductPrice = $ProductPrice;
	}

	public function setProductQtd($ProductQtd){
		$this->ProductQtd = $ProductQtd;
	}

	public function setProductAlert($ProductAlert){
		$this->ProductAlert = $ProductAlert;
	}

	public function setProductDetail($ProductDetail){
		$this->ProductDetail = $ProductDetail;
	}

	public function setProductTypeCalc($ProductTypeCalc){
		$this->ProductTypeCalc = $ProductTypeCalc;
	}	

	public function selectAll(){
		$sql = "SELECT 
				pd.ProductID,
				pd.CompanyID,
				pd.ProductName,
				pd.ProductCode, 
				pd.ProductCost, 
				pd.ProductPrice,
				pd.ProductQtd,
				pd.ProductAlert,
				pd.ProductDetail,
				pd.ProductTypeCalc,
				ct.CategoryName,
				pd.CategoryID
				FROM product pd
				INNER JOIN category ct ON pd.CategoryID = ct.CategoryID
				WHERE pd.CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($ProductID) {
		$sql = "SELECT 
				pd.ProductID,
				pd.CompanyID,
				pd.ProductName,
				pd.ProductCode, 
				pd.ProductCost, 
				pd.ProductPrice,
				pd.ProductQtd,
				pd.ProductAlert,
				pd.ProductDetail,
				pd.ProductTypeCalc,
				ct.CategoryName,
				pd.CategoryID
				FROM product pd
				INNER JOIN category ct ON pd.CategoryID = ct.CategoryID
				WHERE pd.ProductID = :ProductID AND pd.CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':ProductID', $ProductID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function selectByName($ProductName) {

		$sql = "SELECT ProductID, ProductName, ProductPrice, ProductCost, ProductTypeCalc FROM product WHERE ProductName LIKE :ProductName AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindValue(':ProductName', '%'.$ProductName.'%');
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();	
	}	

	public function insert(){

		$sql = "INSERT INTO $this->table (CompanyID, ProductName, ProductCode, CategoryID, ProductCost, ProductPrice, ProductQtd, ProductAlert, ProductDetail, ProductTypeCalc) VALUES (:CompanyID, :ProductName, :ProductCode, :CategoryID, :ProductCost, :ProductPrice, :ProductQtd, :ProductAlert, :ProductDetail, :ProductTypeCalc)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':ProductName', $this->ProductName);
		$stm->bindParam(':ProductCode', $this->ProductCode);
		$stm->bindParam(':CategoryID', $this->CategoryID);
		$stm->bindParam(':ProductCost', $this->ProductCost);
		$stm->bindParam(':ProductPrice', $this->ProductPrice);
		$stm->bindParam(':ProductQtd', $this->ProductQtd);
		$stm->bindParam(':ProductAlert', $this->ProductAlert);
		$stm->bindParam(':ProductDetail', $this->ProductDetail);
		$stm->bindParam(':ProductTypeCalc', $this->ProductTypeCalc);

		$stm->execute();
	}

	public function update($ProductID) {
		$sql = "UPDATE $this->table SET ProductName = :ProductName, ProductCode = :ProductCode, CategoryID = :CategoryID, ProductCost = :ProductCost, ProductPrice = :ProductPrice, ProductQtd = :ProductQtd, ProductAlert = :ProductAlert, ProductDetail = :ProductDetail, ProductTypeCalc = :ProductTypeCalc WHERE ProductID = :ProductID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ProductName', $this->ProductName);
		$stm->bindParam(':ProductCode', $this->ProductCode);
		$stm->bindParam(':CategoryID', $this->CategoryID);
		$stm->bindParam(':ProductCost', $this->ProductCost);
		$stm->bindParam(':ProductPrice', $this->ProductPrice);
		$stm->bindParam(':ProductQtd', $this->ProductQtd);
		$stm->bindParam(':ProductAlert', $this->ProductAlert);
		$stm->bindParam(':ProductDetail', $this->ProductDetail);
		$stm->bindParam(':ProductTypeCalc', $this->ProductTypeCalc);
		$stm->bindParam(':ProductID', $ProductID);

		return $stm->execute();
	}

	public function delete($ProductID) {
		$sql = "DELETE FROM $this->table WHERE ProductID = :ProductID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ProductID', $ProductID);

		$stm->execute();
	}

	public function updateNewPurchase($ProductID) {
		$sql = "UPDATE $this->table SET ProductCost = :ProductCost, ProductQtd = ProductQtd + :ProductQtd WHERE ProductID = :ProductID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ProductCost', $this->ProductCost);
		$stm->bindParam(':ProductQtd', $this->ProductQtd);
		$stm->bindParam(':ProductID', $ProductID);

		return $stm->execute();
	}	

	public function updateAlertProducts($ProductID) {
		$sql = "UPDATE $this->table SET ProductQtd = ProductQtd - :ProductQtd WHERE ProductID = :ProductID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ProductQtd', $this->ProductQtd);
		$stm->bindParam(':ProductID', $ProductID);

		return $stm->execute();
	}	

	public function messageAlert(){
		$sql = "SELECT *, COUNT(ProductID) as Qtd FROM product WHERE ProductQtd <= ProductAlert GROUP BY ProductID";
		$stm = DB::prepare($sql);
		$stm->execute();

		return $stm->fetchAll();	
	}
}