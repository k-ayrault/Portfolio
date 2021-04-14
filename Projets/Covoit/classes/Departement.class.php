<?php
class Departement{

  //Attributs d'un département
  private $dep_num;
  private $dep_nom;
  private $vil_num;

  //Constructeur d'un département
	public function __construct($departement = array())
	{
		if(!empty($departement))
		{
			$this->affecte($departement);
		}
	}

	public function affecte($departement)
	{
		foreach ($departement as $attribut => $valeur) {
			switch ($attribut) {
			case 'dep_num' : $this->setDepNum($valeur);
				break;
			case 'dep_nom' : $this->setDepNom($valeur);
				break;
			case 'vil_num' : $this->setVilNum($valeur);
				break;
			}
		}
	}

  //Setters et getters
	public function setDepNum($id)
	{
		$this->dep_num = $id;
	}
	public function setDepNom($nom)
	{
		$this->dep_nom = $nom;
	}
	public function setVilNum($id)
	{
		$this->vil_num = $id;
	}
	public function getDepNum()
	{
		return $this->dep_num;
	}
	public function getDepNom()
	{
		return $this->dep_nom;
	}
	public function getVilNum()
	{
		return $this->vil_num;
	}
}

?>
