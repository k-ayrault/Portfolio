<?php
class Etudiant{

	//Attributs d'un etudiant
	private $per_num;
	private $dep_num;
	private $div_num;

	//Constructeur d'un etudiant
	public function __construct($etudiant = array())
	{
		if(!empty($etudiant))
		{
			$this->affecte($etudiant);
		}
	}

	public function affecte($etudiant)
	{
		foreach ($etudiant as $attribut => $valeur) {
			switch ($attribut) {
			case 'per_num' : $this->setPerNum($valeur);
				break;
			case 'dep_num' : $this->setDepNum($valeur);
				break;
			case 'div_num' : $this->setDivNum($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setPerNum($id)
	{
		$this->per_num = $id;
	}
	public function setDepNum($id)
	{
		$this->dep_num = $id;
	}
	public function setDivNum($id)
	{
		$this->div_num = $id;
	}
	public function getPerNum()
	{
		return $this->per_num;
	}
	public function getDepNum()
	{
		return $this->dep_num;
	}
	public function getDivNum()
	{
		return $this->div_num;
	}
}
?>
