<?php

class Expense extends DB {

	protected $table = 'expense';
	private $ExpenseID;
	private $CompanyID;
	private $ExpenseDate;
	private $ExpenseRef;
	private $ExpenseValue;
	private $ExpenseAttach;
	private $ExpenseDetail;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setExpenseDate($ExpenseDate){
		$this->ExpenseDate = $ExpenseDate;
	}

	public function setExpenseRef($ExpenseRef){
		$this->ExpenseRef = $ExpenseRef;
	}

	public function setExpenseValue($ExpenseValue){
		$this->ExpenseValue = $ExpenseValue;
	}	

	public function setExpenseAttach($ExpenseAttach){
		$this->ExpenseAttach = $ExpenseAttach;
	}

	public function setExpenseDetail($ExpenseDetail){
		$this->ExpenseDetail = $ExpenseDetail;
	}			

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($ExpenseID) {
		$sql = "SELECT * FROM $this->table WHERE ExpenseID = :ExpenseID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ExpenseID', $ExpenseID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, ExpenseDate, ExpenseRef, ExpenseValue, ExpenseAttach, ExpenseDetail) VALUES (:CompanyID, :ExpenseDate, :ExpenseRef, :ExpenseValue, :ExpenseAttach, :ExpenseDetail)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':ExpenseDate', $this->ExpenseDate);
		$stm->bindParam(':ExpenseRef', $this->ExpenseRef);
		$stm->bindParam(':ExpenseValue', $this->ExpenseValue);
		$stm->bindParam(':ExpenseAttach', $this->ExpenseAttach);
		$stm->bindParam(':ExpenseDetail', $this->ExpenseDetail);

		$stm->execute();
	}

	public function update($ExpenseID) {
		$sql = "UPDATE $this->table SET ExpenseDate = :ExpenseDate, ExpenseRef = :ExpenseRef, ExpenseValue =:ExpenseValue, ExpenseDetail = :ExpenseDetail WHERE ExpenseID = :ExpenseID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ExpenseDate', $this->ExpenseDate);
		$stm->bindParam(':ExpenseRef', $this->ExpenseRef);
		$stm->bindParam(':ExpenseValue', $this->ExpenseValue);
		$stm->bindParam(':ExpenseDetail', $this->ExpenseDetail);
		$stm->bindParam(':ExpenseID', $ExpenseID);

		return $stm->execute();
	}

	public function delete($ExpenseID) {
		$sql = "DELETE FROM $this->table WHERE ExpenseID = :ExpenseID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':ExpenseID', $ExpenseID);

		$stm->execute();
	}

}