<?php
class Personne{

	//Attributs d'une personne
	private $per_num;
	private $per_nom;
	private $per_prenom;
	private $per_tel;
	private $per_mail;
	private $per_login;
	private $per_pwd;

	//Constructeur d'une personne
	public function __construct($personne = array())
	{
		if(!empty($personne))
		{
			$this->affecte($personne);
		}
	}

	public function affecte($personne)
	{
		foreach ($personne as $attribut => $valeur) {
			switch ($attribut) {
			case 'per_num' : $this->setPerNum($valeur);
				break;
			case 'per_nom' : $this->setPerNom($valeur);
				break;
			case 'per_prenom' : $this->setPerPrenom($valeur);
				break;
			case 'per_tel' : $this->setPerTel($valeur);
				break;
				case 'per_mail' : $this->setPerMail($valeur);
				break;
			case 'per_login' : $this->setPerLogin($valeur);
				break;
			case 'per_pwd' : $this->setPerPwd($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setPerNum($id)
	{
		$this->per_num = $id;
	}
	public function setPerNom($nom)
	{
		$this->per_nom = $nom;
	}
	public function setPerPrenom($prenom)
	{
		$this->per_prenom = $prenom;
	}
	public function setPerTel($tel)
	{
		$this->per_tel = $tel;
	}
	public function setPerMail($mail)
	{
		$this->per_mail = $mail;
	}
	public function setPerLogin($login)
	{
		$this->per_login = $login;
	}
	public function setPerPwd($pwd)
	{
		$this->per_pwd = $pwd;
	}
	public function getPerNum()
	{
		return $this->per_num ;
	}
	public function getPerNom()
	{
		return $this->per_nom ;
	}
	public function getPerPrenom()
	{
		return $this->per_prenom ;
	}
	public function getPerTel()
	{
		return $this->per_tel ;
	}
	public function getPerMail()
	{
		return $this->per_mail ;
	}
	public function getPerLogin()
	{
		return $this->per_login ;
	}
	public function getPerPwd()
	{
		return $this->per_pwd ;
	}

}
?>
