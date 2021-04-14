<?php
class Salarie{

	//Attributs d'un salarié
	private $per_num;
	private $sal_telprof;
	private $fon_num;

	//Constructeur d'un salarié
	public function __construct($salarie = array())
	{
		if(!empty($salarie))
		{
			$this->affecte($salarie);
		}
	}

	public function affecte($salarie)
	{
		foreach ($salarie as $attribut => $valeur) {
			switch ($attribut) {
			case 'per_num' : $this->setPerNum($valeur);
				break;
			case 'sal_telprof' : $this->setSalTelProf($valeur);
				break;
			case 'fon_num' : $this->setFonNum($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setPerNum($id)
	{
		$this->per_num = $id;
	}
	public function setSalTelProf($tel)
	{
		$this->sal_telprof = $tel;
	}
	public function setFonNum($id)
	{
		$this->fon_num = $id;
	}
	public function getPerNum()
	{
		return $this->per_num;
	}
	public function getSalTelProf()
	{
		return $this->sal_telprof;
	}
	public function getFonNum()
	{
		return $this->fon_num;
	}
}
?>
