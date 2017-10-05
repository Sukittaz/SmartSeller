<?php

class BunchPermissions extends DB {

	protected $table = 'bunch_permissions';
	private $BunchPermissionsID;
	private $CompanyID;
	private $BunchID;
	private $PermissionID;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setBunchID($BunchID){
		$this->BunchID = $BunchID;
	}

	public function setPermissionID($PermissionID){
		$this->PermissionID = $PermissionID;
	}			

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($BunchPermissionsID) {
		$sql = "SELECT * FROM $this->table WHERE BunchPermissionsID = :BunchPermissionsID AND BunchPermissionsID = :BunchPermissionsID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryID', $CategoryID);
		$stm->bindParam(':BunchPermissionsID', $BunchPermissionsID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, BunchID, PermissionID) VALUES (:CompanyID, :BunchID, :PermissionID)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':BunchID', $this->BunchID);
		$stm->bindParam(':PermissionID', $this->PermissionID);

		$stm->execute();
	}

	public function update($BunchPermissionsID) {
		$sql = "UPDATE $this->table SET CompanyID = :CompanyID, PurchaseID = :PurchaseID, ProductID = :ProductID, PurchaseProductQtd = :PurchaseProductQtd, PurchaseProductCost = :PurchaseProductCost) WHERE BunchPermissionsID = :BunchPermissionsID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CategoryName', $this->CategoryName);
		$stm->bindParam(':BunchPermissionsID', $BunchPermissionsID);

		return $stm->execute();
	}

	public function delete($BunchID) {
		$sql = "DELETE FROM $this->table WHERE BunchID = :BunchID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchID', $BunchID);

		$stm->execute();
	}

}