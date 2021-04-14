<?php
class Ville{

	//Attribut de ville
	private $vil_num;
	private $vil_nom;

	//Constructeur de ville
	public function __construct($ville = array())
	{
		if(!empty($ville))
		{
			$this->affecte($ville);
		}
	}

	public function affecte($ville)
	{
		foreach ($ville as $attribut => $valeur) {
			switch ($attribut) {
			case 'vil_num' : $this->setVilNum($valeur);
				break;
			case 'vil_nom' : $this->setVilNom($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setVilNum($id)
	{
		$this->vil_num = $id;
	}
	public function setVilNom($nom)
	{
		$this->vil_nom = $nom;
	}
	public function getVilNum()
	{
		return $this->vil_num;
	}
	public function getVilNom()
	{
		return $this->vil_nom;
	}

}
