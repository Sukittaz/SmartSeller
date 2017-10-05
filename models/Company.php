<?php

class Company extends DB {

	protected $table = 'company';
	private $CompanyID;
	private $CompanyName;
	private $CompanyCNPJ;
	private $CompanyAddres;
	private $CompanyAddresNumber;
	private $CompanyComplement;
	private $CompanyNeigh;
	private $CompanyCity;
	private $CompanyUF;
	private $CompanyCep;
	private $CompanyPhone;
	private $CompanySocialName;
	private $CompanyIE;
	private $CompanyIEST;
	private $CompanyIM;
	private $CompanyCNAE;
	private $CompanyImage;

	public function __construct() {
		$this->CompanyID = $_SESSION['User']['CompanyID'];
	}	

	public function setCompanyName($CompanyName){
		$this->CompanyName = $CompanyName;
	}

	public function setCompanyCNPJ($CompanyCNPJ){
		$this->CompanyCNPJ = $CompanyCNPJ;
	}

	public function setCompanyAddres($CompanyAddres){
		$this->CompanyAddres = $CompanyAddres;
	}

	public function setCompanyAddresNumber($CompanyAddresNumber){
		$this->CompanyAddresNumber = $CompanyAddresNumber;
	}

	public function setCompanyComplement($CompanyComplement){
		$this->CompanyComplement = $CompanyComplement;
	}

	public function setCompanyNeigh($CompanyNeigh){
		$this->CompanyNeigh = $CompanyNeigh;
	}

	public function setCompanyCity($CompanyCity){
		$this->CompanyCity = $CompanyCity;
	}

	public function setCompanyUF($CompanyUF){
		$this->CompanyUF = $CompanyUF;
	}

	public function setCompanyCep($CompanyCep){
		$this->CompanyCep = $CompanyCep;
	}

	public function setCompanyPhone($CompanyPhone){
		$this->CompanyPhone = $CompanyPhone;
	}

	public function setCompanySocialName($CompanySocialName){
		$this->CompanySocialName = $CompanySocialName;
	}

	public function setCompanyIE($CompanyIE){
		$this->CompanyIE = $CompanyIE;
	}

	public function setCompanyIEST($CompanyIEST){
		$this->CompanyIEST = $CompanyIEST;
	}

	public function setCompanyIM($CompanyIM){
		$this->CompanyIM = $CompanyIM;
	}

	public function setCompanyCNAE($CompanyCNAE){
		$this->CompanyCNAE = $CompanyCNAE;
	}	

	public function setCompanyImage($CompanyImage){
		$this->CompanyImage = $CompanyImage;
	}	

	public function selectAll(){
		$sql = "SELECT * FROM $this->table";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $this->CompanyID);

		$stm->execute();

		return $stm->fetchAll();
	}

	public function selectById($CompanyID) {
		$sql = "SELECT * FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $CompanyID);

		$stm->execute();

		return $stm->fetch();		
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (CompanyName, CompanyCNPJ, CompanyAddres, CompanyAddresNumber, CompanyComplement, CompanyNeigh, CompanyCity, CompanyUF, CompanyCep, CompanyPhone, CompanySocialName, CompanyIE, CompanyIEST, CompanyIM, CompanyCNAE) VALUES (:CompanyName, :CompanyCNPJ, :CompanyAddres, :CompanyAddresNumber, :CompanyComplement, :CompanyNeigh, :CompanyCity, :CompanyUF, :CompanyCep, :CompanyPhone, :CompanySocialName, :CompanyIE, :CompanyIEST, :CompanyIM, :CompanyCNAE)";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyName', $this->CompanyName);
		$stm->bindParam(':CompanyCNPJ', $this->CompanyCNPJ);
		$stm->bindParam(':CompanyAddres', $this->CompanyAddres);
		$stm->bindParam(':CompanyAddresNumber', $this->CompanyAddresNumber);
		$stm->bindParam(':CompanyComplement', $this->CompanyComplement);
		$stm->bindParam(':CompanyNeigh', $this->CompanyNeigh);
		$stm->bindParam(':CompanyCity', $this->CompanyCity);
		$stm->bindParam(':CompanyUF', $this->CompanyUF);
		$stm->bindParam(':CompanyCep', $this->CompanyName);
		$stm->bindParam(':CompanyPhone', $this->CompanyPhone);
		$stm->bindParam(':CompanySocialName', $this->CompanySocialName);
		$stm->bindParam(':CompanyIE', $this->CompanyIE);
		$stm->bindParam(':CompanyIEST', $this->CompanyIEST);
		$stm->bindParam(':CompanyIM', $this->CompanyIM);
		$stm->bindParam(':CompanyCNAE', $this->CompanyCNAE);

		$stm->execute();
	}

	public function update($CompanyID) {
		$sql = "UPDATE $this->table SET CompanyName = :CompanyName, CompanyCNPJ = :CompanyCNPJ, CompanyAddres = :CompanyAddres, CompanyAddresNumber = :CompanyAddresNumber, CompanyComplement =:CompanyComplement, CompanyNeigh = :CompanyNeigh, CompanyCity = :CompanyCity, CompanyUF = :CompanyUF, CompanyCep = :CompanyCep, CompanyPhone = :CompanyPhone, CompanySocialName = :CompanySocialName, CompanyIE = :CompanyIE, CompanyIEST = :CompanyIEST, CompanyIM = :CompanyIM, CompanyCNAE = :CompanyCNAE, CompanyImage = :CompanyImage WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyName', $this->CompanyName);
		$stm->bindParam(':CompanyCNPJ', $this->CompanyCNPJ);
		$stm->bindParam(':CompanyAddres', $this->CompanyAddres);
		$stm->bindParam(':CompanyAddresNumber', $this->CompanyAddresNumber);
		$stm->bindParam(':CompanyComplement', $this->CompanyComplement);
		$stm->bindParam(':CompanyNeigh', $this->CompanyNeigh);
		$stm->bindParam(':CompanyCity', $this->CompanyCity);
		$stm->bindParam(':CompanyUF', $this->CompanyUF);
		$stm->bindParam(':CompanyCep', $this->CompanyCep);
		$stm->bindParam(':CompanyPhone', $this->CompanyPhone);
		$stm->bindParam(':CompanySocialName', $this->CompanySocialName);
		$stm->bindParam(':CompanyIE', $this->CompanyIE);
		$stm->bindParam(':CompanyIEST', $this->CompanyIEST);
		$stm->bindParam(':CompanyIM', $this->CompanyIM);
		$stm->bindParam(':CompanyCNAE', $this->CompanyCNAE);
		$stm->bindParam(':CompanyImage', $this->CompanyImage);
		$stm->bindParam(':CompanyID', $CompanyID);

		return $stm->execute();
	}

	public function delete($CompanyID) {
		$sql = "DELETE FROM $this->table WHERE CompanyID = :CompanyID";
		$stm = DB::prepare($sql);
		$stm->bindParam(':CompanyID', $CompanyID);

		$stm->execute();
	}
}