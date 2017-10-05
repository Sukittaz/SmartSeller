<?php

class Costumer extends DB {

	protected $table = 'costumer';
	private $CostumerID;
	private $CompanyID;
	private $CostumerName;
	private $CostumerCPF;
	private $CostumerEmail;
	private $CostumerPhone;
	private $CostumerCEP;
	private $CostumerAddres;
	private $CostumerAddresNumber;
	private $CostumerNeigh;
	private $CostumerCity;
	private $CostumerCountry;
	private $CostumerUF;
	private $CostumerDetail;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}

	public function setCostumerName($CostumerName){
		$this->CostumerName = $CostumerName;
	}

	public function setCostumerCPF($CostumerCPF){
		$this->CostumerCPF = $CostumerCPF;
	}	

	public function setCostumerEmail($CostumerEmail){
		$this->CostumerEmail = $CostumerEmail;
	}

	public function setCostumerPhone($CostumerPhone){
		$this->CostumerPhone = $CostumerPhone;
	}	

	public function setCostumerCEP($CostumerCEP){
		$this->CostumerCEP = $CostumerCEP;
	}

	public function setCostumerAddres($CostumerAddres){
		$this->CostumerAddres = $CostumerAddres;
	}

	public function setCostumerAddresNumber($CostumerAddresNumber){
		$this->CostumerAddresNumber = $CostumerAddresNumber;
	}

	public function setCostumerNeigh($CostumerNeigh){
		$this->CostumerNeigh = $CostumerNeigh;
	}

	public function setCostumerCity($CostumerCity){
		$this->CostumerCity = $CostumerCity;
	}

	public function setCostumerCountry($CostumerCountry){
		$this->CostumerCountry = $CostumerCountry;
	}	

	public function setCostumerUF($CostumerUF){
		$this->CostumerUF = $CostumerUF;
	}	

	public function setCostumerDetail($CostumerDetail){
		$this->CostumerDetail = $CostumerDetail;
	}	

	public function selectAll(){
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($CostumerID) {
		$sql = "SELECT * FROM $this->table WHERE CostumerID = :CostumerID AND CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CostumerID', $CostumerID);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyID, CostumerName, CostumerCPF, CostumerEmail, CostumerPhone, CostumerCEP, CostumerAddres, CostumerAddresNumber, CostumerNeigh, CostumerCity, CostumerCountry, CostumerUF, CostumerDetail) VALUES (:CompanyID, :CostumerName, :CostumerCPF, :CostumerEmail, :CostumerPhone, :CostumerCEP, :CostumerAddres, :CostumerAddresNumber, :CostumerNeigh, :CostumerCity, :CostumerCountry, :CostumerUF, :CostumerDetail)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);
		$stm->bindParam(':CostumerName', $this->CostumerName);
		$stm->bindParam(':CostumerCPF', $this->CostumerCPF);
		$stm->bindParam(':CostumerEmail', $this->CostumerEmail);
		$stm->bindParam(':CostumerPhone', $this->CostumerPhone);
		$stm->bindParam(':CostumerCEP', $this->CostumerCEP);
		$stm->bindParam(':CostumerAddres', $this->CostumerAddres);
		$stm->bindParam(':CostumerAddresNumber', $this->CostumerAddresNumber);
		$stm->bindParam(':CostumerNeigh', $this->CostumerNeigh);
		$stm->bindParam(':CostumerCity', $this->CostumerCity);
		$stm->bindParam(':CostumerCountry', $this->CostumerCountry);
		$stm->bindParam(':CostumerUF', $this->CostumerUF);
		$stm->bindParam(':CostumerDetail', $this->CostumerDetail);

		$stm->execute();
	}

	public function update($CostumerID) {

		$sql = "UPDATE $this->table SET CostumerName = :CostumerName, CostumerCPF = :CostumerCPF, CostumerEmail = :CostumerEmail, CostumerPhone = :CostumerPhone, CostumerCEP = :CostumerCEP, CostumerAddres = :CostumerAddres, CostumerAddresNumber = :CostumerAddresNumber, CostumerNeigh = :CostumerNeigh, CostumerCity = :CostumerCity, CostumerDetail = :CostumerDetail WHERE CostumerID = :CostumerID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CostumerName', $this->CostumerName);
		$stm->bindParam(':CostumerCPF', $this->CostumerCPF);
		$stm->bindParam(':CostumerEmail', $this->CostumerEmail);
		$stm->bindParam(':CostumerPhone', $this->CostumerPhone);
		$stm->bindParam(':CostumerCEP', $this->CostumerCEP);
		$stm->bindParam(':CostumerAddres', $this->CostumerAddres);
		$stm->bindParam(':CostumerAddresNumber', $this->CostumerAddresNumber);
		$stm->bindParam(':CostumerNeigh', $this->CostumerNeigh);
		$stm->bindParam(':CostumerCity', $this->CostumerCity);
		$stm->bindParam(':CostumerDetail', $this->CostumerDetail);
		$stm->bindParam(':CostumerID', $CostumerID);

		return $stm->execute();
	}

	public function delete($CostumerID) {
		$sql = "DELETE FROM $this->table WHERE CostumerID = :CostumerID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CostumerID', $CostumerID);

		$stm->execute();
	}

}