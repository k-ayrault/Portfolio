<?php
class Fonction{

  //Attributs d'une fonction
  private $fon_num;
  private $fon_libelle;

  //Constructeur d'une fonction
	public function __construct($fonction = array())
	{
		if(!empty($fonction))
		{
			$this->affecte($fonction);
		}
	}

	public function affecte($fonction)
	{
		foreach ($fonction as $attribut => $valeur) {
			switch ($attribut) {
			case 'fon_num' : $this->setFonNum($valeur);
				break;
			case 'fon_libelle' : $this->setFonLibelle($valeur);
				break;
			}
		}
	}

  //Setters et getters
	public function setFonNum($id)
	{
		$this->fon_num = $id;
	}
	public function setFonLibelle($nom)
	{
		$this->fon_libelle = $nom;
	}
	public function getFonNum()
	{
		return $this->fon_num;
	}
	public function getFonLibelle()
	{
		return $this->fon_libelle;
	}
}

?>
