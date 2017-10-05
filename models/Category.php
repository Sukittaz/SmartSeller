<?php

class Category extends DB {

	protected $table = 'category';
	private $CategoryID;
	private $CompanyID;
	private $CategoryName;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setCategoryName($CategoryName){
		$this->CategoryName = $CategoryName;
	}

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($CategoryID) {
		$sql = "SELECT * FROM $this->table WHERE CategoryID = :CategoryID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryID', $CategoryID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, CategoryName) VALUES (:CompanyID, :CategoryName)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':CategoryName', $this->CategoryName);

		$stm->execute();
	}

	public function update($CategoryID) {
		$sql = "UPDATE $this->table SET CategoryName = :CategoryName WHERE CategoryID = :CategoryID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryName', $this->CategoryName);
		$stm->bindParam(':CategoryID', $CategoryID);

		return $stm->execute();
	}

	public function delete($CategoryID) {
		$sql = "DELETE FROM $this->table WHERE CategoryID = :CategoryID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryID', $CategoryID);

		$stm->execute();
	}

}