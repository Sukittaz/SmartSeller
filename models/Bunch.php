<?php

class Bunch extends DB {

	protected $table = 'bunch';
	private $BunchID;
	private $CompanyID;
	private $BunchName;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setBunchName($BunchName){
		$this->BunchName = $BunchName;
	}

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectInner($BunchID){
		$sql = "SELECT * FROM smartseller.bunch bc
				LEFT JOIN smartseller.bunch_permissions bp ON bp.BunchID = bc.BunchID
				LEFT JOIN smartseller.permission pm ON pm.PermissionID = bp.PermissionID
				WHERE bc.BunchID = :BunchID AND bc.CompanyID = :CompanyID";

		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchID', $BunchID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}	

	public function selectById($BunchID) {
		$sql = "SELECT * FROM $this->table WHERE BunchID = :BunchID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchID', $BunchID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, BunchName) VALUES (:CompanyID, :BunchName)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':BunchName', $this->BunchName);

		$stm->execute();
		$Con = DB::getInstance();
		return $Con->lastInsertId();			
	}

	public function update($BunchID) {
		$sql = "UPDATE $this->table SET BunchName = :BunchName WHERE BunchID = :BunchID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchName', $this->BunchName);
		$stm->bindParam(':BunchID', $BunchID);

		return $stm->execute();
	}

	public function delete($BunchID) {
		$sql = "DELETE FROM $this->table WHERE BunchID = :BunchID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchID', $BunchID);

		$stm->execute();
	}

}