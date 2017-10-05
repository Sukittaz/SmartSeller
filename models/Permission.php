<?php

class Permission extends DB {

	protected $table = 'permission';
	private $PermissionID;
	private $CompanyID;
	private $UserID;	
	private $PermissionName;

	public function __construct() {
		$this->UserID 	 = $_SESSION['User']['UserID'];
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setPermissionName($PermissionName){
		$this->PermissionName = $PermissionName;
	}

	public function selectAll(){
		$sql = "SELECT * FROM $this->table";
		$stm = DB::prepare($sql);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($PermissionID) {
		$sql = "SELECT * FROM $this->table WHERE PermissionID = :PermissionID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':PermissionID', $PermissionID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function hasPermission ($PermissionID) {
		$sql ="SELECT bp.PermissionID FROM user us
			   INNER JOIN bunch_permissions bp ON bp.BunchID = us.BunchID
			   WHERE us.UserID = :UserID AND us.CompanyID = :CompanyID AND bp.PermissionID = :PermissionID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':UserID', $this->UserID);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':PermissionID', $PermissionID);

		$stm->execute();

		if($stm->rowCount() > 0) {
			return true;
		}	

		return false;	
	}

}