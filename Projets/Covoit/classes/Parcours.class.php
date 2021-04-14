<?php
class Parcours{

	//Attribut du parcours
	private $par_num;
	private $par_km;
	private $vil_num1;
	private $vil_num2;

	//Constructeur du parcours
	public function __construct($parcours = array())
	{
		if(!empty($parcours))
		{
			$this->affecte($parcours);
		}
	}

	public function affecte($parcours)
	{
		foreach ($parcours as $attribut => $valeur) {
			switch ($attribut) {
			case 'par_num' : $this->setParNum($valeur);
				break;
			case 'par_km' : $this->setParKm($valeur);
				break;
			case 'vil_num1' : $this->setVilNum1($valeur);
				break;
			case 'vil_num2' : $this->setVilNum2($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setParNum($id)
	{
		$this->par_num = $id;
	}
	public function setParKm($km)
	{
		$this->par_km = $km;
	}
	public function setVilNum1($idVille1)
	{
		$this->vil_num1 = $idVille1;
	}
	public function setVilNum2($idVille2)
	{
		$this->vil_num2 = $idVille2;
	}
	public function getParNum()
	{
		return $this->par_num;
	}
	public function getParKm()
	{
		return $this->par_km;
	}
	public function getVilNum1()
	{
		return $this->vil_num1;
	}
	public function getVilNum2()
	{
		return $this->vil_num2;
	}


}
