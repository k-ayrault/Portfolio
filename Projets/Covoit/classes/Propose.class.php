<?php
class Propose{

	//Attribut du parcours
	private $par_num;
	private $per_num;
	private $pro_date;
	private $pro_time;
  private $pro_place;
  private $pro_sens;

	//Constructeur du parcours
	public function __construct($trajets = array())
	{
		if(!empty($trajets))
		{
			$this->affecte($trajets);
		}
	}

	public function affecte($trajets)
	{
		foreach ($trajets as $attribut => $valeur) {
			switch ($attribut) {
			case 'par_num' : $this->setParNum($valeur);
				break;
			case 'per_num' : $this->setPerNum($valeur);
				break;
			case 'pro_date' : $this->setProDate($valeur);
				break;
			case 'pro_time' : $this->setProTime($valeur);
				break;
			case 'pro_place' : $this->setProPlace($valeur);
				break;
			case 'pro_sens' : $this->setProSens($valeur);
				break;
			}
		}
	}

	//Setters et getters
	public function setParNum($id)
	{
		$this->par_num = $id;
	}
  public function setPerNum($id)
  {
    $this->per_num = $id;
  }
	public function setProDate($date)
	{
		$this->pro_date = $date;
	}
	public function setProTime($heure)
	{
		$this->pro_time = $heure;
	}
  public function setProPlace($place)
  {
    $this->pro_place = $place;
  }
  public function setProSens($sens)
  {
    $this->pro_sens = $sens;
  }
  public function getParNum()
  {
    return $this->par_num;
  }
  public function getPerNum()
  {
    return $this->per_num;
  }
  public function getProDate()
  {
    return $this->pro_date;
  }
  public function getProTime()
  {
    return $this->pro_time;
  }
  public function getProPlace()
  {
    return $this->pro_place;
  }
  public function getProSens()
  {
    return $this->pro_sens;
  }

}
?>
