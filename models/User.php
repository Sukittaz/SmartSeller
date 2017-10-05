<?php

class User extends DB {

	protected $table = 'user';
	private $UserID;
	private $CompanyID;
	private $BunchID;
	private $UserName;
	private $UserLogin;
	private $UserEmail;
	private $UserPass;
	private $UserStatus;

	public function __construct() {
		if (isset($_SESSION['User'])) {
			$this->CompanyID  = $_SESSION['User']['CompanyID'];
		}
	}

	public function setBunchID($BunchID){
		$this->BunchID = $BunchID;
	}	

	public function setUserName($UserName){
		$this->UserName = $UserName;
	}

	public function setUserLogin($UserLogin){
		$this->UserLogin = $UserLogin;
	}	

	public function setUserEmail($UserEmail){
		$this->UserEmail = $UserEmail;
	}

	public function setUserPass($UserPass){
		$this->UserPass = md5($UserPass);
	}

	public function setUserStatus($UserStatus){
		$this->UserStatus = $UserStatus;
	}	

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectInner($UserID = 0){
		$sql = "SELECT * FROM user us
				INNER JOIN bunch bc ON bc.BunchID = us.BunchID 
				WHERE us.CompanyID = :CompanyID AND UserStatus = :UserStatus";

		if ($UserID != 0) {
			$sql .= " AND us.UserID = :UserID";
		}

		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);	
		$stm->bindValue(':UserStatus', 1);	

		if ($UserID != 0) {
			$stm->bindParam(':UserID', $UserID);	
		}
		
		$stm->execute();

		return $stm->fetchAll();				
	}	

	public function selectById($UserID) {
		$sql = "SELECT * FROM $this->table WHERE UserID = :UserID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':UserID', $UserID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}				

	public function insert(){

		$sql = "INSERT INTO $this->table (CompanyID, BunchID, UserName, UserLogin, UserEmail, UserPass, UserStatus, UserImage) VALUES (:CompanyID, :BunchID, :UserName, :UserLogin, :UserEmail, :UserPass, :UserStatus)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':BunchID', $this->BunchID);
		$stm->bindParam(':UserName', $this->UserName);
		$stm->bindParam(':UserLogin', $this->UserLogin);
		$stm->bindParam(':UserEmail', $this->UserEmail);
		$stm->bindParam(':UserPass', $this->UserPass);
		$stm->bindValue(':UserStatus', 1);

		$stm->execute();
	}

	public function update($UserID) {
		$sql = "UPDATE $this->table SET BunchID = :BunchID, UserName = :UserName, UserLogin= :UserLogin, UserEmail = :UserEmail WHERE UserID = :UserID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':BunchID', $this->BunchID);
		$stm->bindParam(':UserName', $this->UserName);
		$stm->bindParam(':UserLogin', $this->UserLogin);
		$stm->bindParam(':UserEmail', $this->UserEmail);
		$stm->bindParam(':UserID', $UserID);

		$stm->execute();		
	}

	public function updatePass($UserID) {
		$sql = "UPDATE $this->table SET UserPass = :UserPass WHERE UserID = :UserID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':UserPass', $this->UserPass);
		$stm->bindParam(':UserID', $UserID);

		$stm->execute();				
	}

	public function delete($UserID) {
		$sql = "UPDATE $this->table SET UserStatus = :UserStatus WHERE UserID = :UserID";
		$stm = DB::prepare($sql);
		$stm->bindValue(':UserStatus', 0);
		$stm->bindParam(':UserID', $UserID);

		$stm->execute();		
	}

	public function isLogged() {
		if(isset($_SESSION['User']) && !empty($_SESSION['User'])) {
			return true;
		} else {
			return false;
		}
	}

	public function logout() {
		unset($_SESSION['User']);
	}

	public function doLogin() {

		$sql = "SELECT * FROM $this->table WHERE UserEmail = :UserEmail AND UserPass = :UserPass";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':UserEmail', $this->UserEmail);
		$stmt->bindParam(':UserPass', $this->UserPass);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$row = $stmt->fetch();
			$user = array(
						'UserID' => $row->UserID,
						'UserName' => $row->UserName,
						'CompanyID' => $row->CompanyID,
						'UserEmail' =>  $row->UserEmail,
					);

			$_SESSION['User'] = $user;
			
			return true;
		} else {
			return false;
		}
	}

}