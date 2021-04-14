<?php
class ProposeManager{

	//Constructeur de ParcoursManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction add permettant d'insérer un parcours dans la bd
	public function add($trajet)
	{
		$req = $this->db->prepare(
			'INSERT INTO propose(par_num, per_num, pro_date, pro_time, pro_place, pro_sens) VALUES (:par_num, :per_num, :pro_date, :pro_time, :pro_place, :pro_sens)'
		);
		$req->bindValue(':par_num', $trajet->getParNum());
		$req->bindValue(':per_num', $trajet->getPerNum());
		$req->bindValue(':pro_date', $trajet->getProDate());
		$req->bindValue(':pro_time', $trajet->getProTime());
		$req->bindValue(':pro_place', $trajet->getProPlace());
		$req->bindValue(':pro_sens', $trajet->getProSens());
		$retour = $req->execute();
    return $retour;
	}
	//Fonction permettant de récupérer les trajet proposer d'une ville spécifique à une autre
	public function getAllTrajet($ville_dep, $ville_arrivee, $date, $precision, $heure_mini)
	{
		$allTrajet = array();
		$req = $this->db->prepare(
			'SELECT par_num, per_num, pro_date, pro_time, pro_place, pro_sens FROM propose
			WHERE par_num IN
			(SELECT par_num FROM parcours WHERE vil_num1 = :ville_dep AND vil_num2 = :ville_arrivee) AND pro_sens = 0 AND
		  (pro_time >= TIME(DATE_ADD(\'1970-01-01 00:00:00\', INTERVAL :precision HOUR))) AND (pro_date BETWEEN DATE(DATE_ADD(:date_depart , INTERVAL -:precision DAY)) AND DATE(DATE_ADD(:date_depart , INTERVAL :precision DAY)))
			UNION
			SELECT par_num, per_num, pro_date, pro_time, pro_place, pro_sens FROM propose
			WHERE par_num IN
			(SELECT par_num FROM parcours WHERE vil_num1 = :ville_arrivee AND vil_num2=:ville_dep) AND pro_sens = 1
		AND pro_time >= TIME(DATE_ADD(\'1970-01-01 00:00:00\', INTERVAL :heure_mini HOUR)) AND (pro_date BETWEEN DATE(DATE_ADD(:date_depart , INTERVAL -:precision DAY)) AND DATE(DATE_ADD(:date_depart , INTERVAL :precision DAY)))'
		);
		$req->bindValue(':ville_dep', $ville_dep);
		$req->bindValue(':ville_arrivee', $ville_arrivee);
		$req->bindValue(':date_depart', $date);
		$req->bindValue(':precision', $precision);
		$req->bindValue(':heure_mini', $heure_mini);
		$req->execute();
		while ($trajet = $req->fetch(PDO::FETCH_OBJ))
		{
			$allTrajet[] = new Propose($trajet);
		};
		$req->closeCursor();
		return $allTrajet;
	}
}
