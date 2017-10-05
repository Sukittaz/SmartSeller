<?php

class Supplier extends DB {

	protected $table = 'supplier';
	private $SupplierID;
	private $CompanyID;
	private $SupplierName;
	private $SupplierEmail;
	private $SupplierPhone;
	private $SupplierCNPJ;
	private $SupplierDetail;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setSupplierName($SupplierName){
		$this->SupplierName = $SupplierName;
	}

	public function setSupplierEmail($SupplierEmail){
		$this->SupplierEmail = $SupplierEmail;
	}

	public function setSupplierPhone($SupplierPhone){
		$this->SupplierPhone = $SupplierPhone;
	}

	public function setSupplierCNPJ($SupplierCNPJ){
		$this->SupplierCNPJ = $SupplierCNPJ;
	}

	public function setSupplierDetail($SupplierDetail){
		$this->SupplierDetail = $SupplierDetail;
	}

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($SupplierID) {
		$sql = "SELECT * FROM $this->table WHERE SupplierID = :SupplierID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SupplierID', $SupplierID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, SupplierName, SupplierEmail, SupplierPhone, SupplierCNPJ, SupplierDetail) VALUES (:CompanyID, :SupplierName, :SupplierEmail, :SupplierPhone, :SupplierCNPJ, :SupplierDetail)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':SupplierName', $this->SupplierName);
		$stm->bindParam(':SupplierEmail', $this->SupplierEmail);
		$stm->bindParam(':SupplierPhone', $this->SupplierPhone);
		$stm->bindParam(':SupplierCNPJ', $this->SupplierCNPJ);
		$stm->bindParam(':SupplierDetail', $this->SupplierDetail);

		$stm->execute();
	}

	public function update($SupplierID) {
		$sql = "UPDATE $this->table SET SupplierName = :SupplierName, SupplierEmail = :SupplierEmail, SupplierPhone = :SupplierPhone, SupplierCNPJ = :SupplierCNPJ, SupplierDetail = :SupplierDetail WHERE SupplierID = :SupplierID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SupplierName', $this->SupplierName);
		$stm->bindParam(':SupplierEmail', $this->SupplierEmail);
		$stm->bindParam(':SupplierPhone', $this->SupplierPhone);
		$stm->bindParam(':SupplierCNPJ', $this->SupplierCNPJ);
		$stm->bindParam(':SupplierDetail', $this->SupplierDetail);
		$stm->bindParam(':SupplierID', $SupplierID);

		return $stm->execute();
	}

	public function delete($SupplierID) {
		$sql = "DELETE FROM $this->table WHERE SupplierID = :SupplierID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':SupplierID', $SupplierID);

		$stm->execute();
	}

}