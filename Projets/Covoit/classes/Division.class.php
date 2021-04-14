<?php
class Division{

  //Attributs d'une division
  private $div_num;
  private $div_nom;

  //Constructeur d'une division
	public function __construct($division = array())
	{
		if(!empty($division))
		{
			$this->affecte($division);
		}
	}

	public function affecte($division)
	{
		foreach ($division as $attribut => $valeur) {
			switch ($attribut) {
			case 'div_num' : $this->setDivNum($valeur);
				break;
			case 'div_nom' : $this->setDivNom($valeur);
				break;
			}
		}
	}

  //Setters et getters
	public function setDivNum($id)
	{
		$this->div_num = $id;
	}
	public function setDivNom($nom)
	{
		$this->div_nom = $nom;
	}
	public function getDivNum()
	{
		return $this->div_num;
	}
	public function getDivNom()
	{
		return $this->div_nom;
	}
}

?>
