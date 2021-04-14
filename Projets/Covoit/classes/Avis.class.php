<?php
class Avis{

	//Attributs d'un avis
	private $per_num;
	private $per_per_num;
	private $par_num;
	private $avi_comm;
	private $avi_note;
	private $avi_date;

	//Constructeur d'un avis
	public function __construct($avis = array())
	{
    if(!empty($avis))
		{
			$this->affecte($avis);
		}
	}

	public function affecte($avis)
	{
		foreach ($avis as $attribut => $valeur) {
			switch ($attribut) {
  			case 'per_num' : $this->setPerNum($valeur);
  				break;
  			case 'per_per_num' : $this->setPerPerNum($valeur);
  				break;
  			case 'par_num' : $this->setParNum($valeur);
  				break;
  			case 'avi_comm' : $this->setAviComm($valeur);
  				break;
  			case 'avi_note' : $this->setAviNote($valeur);
  				break;
  			case 'avi_date' : $this->setAviDate($valeur);
  				break;
			}
		}
	}

	//Setters et getters
	public function setPerNum($id)
	{
		$this->per_num = $id;
	}
	public function setPerPerNum($nom)
	{
		$this->per_per_num = $nom;
	}
	public function setParNum($prenom)
	{
		$this->par_num = $prenom;
	}
	public function setAviComm($tel)
	{
		$this->avi_comm = $tel;
	}
	public function setAviNote($mail)
	{
		$this->avi_note = $mail;
	}
	public function setAviDate($login)
	{
		$this->avi_date = $login;
	}
	public function getPerNum()
	{
		return $this->per_num ;
	}
	public function getPerPerNum()
	{
		return $this->per_per_num ;
	}
	public function getParNum()
	{
		return $this->par_num ;
	}
	public function getAviComm()
	{
		return $this->avi_comm ;
	}
	public function getAviNote()
	{
		return $this->avi_note ;
	}
	public function getAviDate()
	{
		return $this->avi_date ;
	}

}
?>
