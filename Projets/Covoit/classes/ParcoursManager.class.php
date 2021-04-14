<?php
class ParcoursManager{

	//Constructeur de ParcoursManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction add permettant d'insérer un parcours dans la bd
	public function add($parcours)
	{
		$req = $this->db->prepare(
			'INSERT INTO parcours(par_km, vil_num1, vil_num2) VALUES (:par_km, :vil_num1, :vil_num2)'
		);
		$req->bindValue(':par_km', $parcours->getParKm());
		$req->bindValue(':vil_num1', $parcours->getVilNum1());
		$req->bindValue(':vil_num2', $parcours->getVilNum2());
		$retour = $req->execute();
    return $retour;
	}

	//Fonction permettant de récupérer les données de la table parcours
	public function getAllParcours()
	{
		$allParcours = array();
		$req = $this->db->prepare(
			'SELECT par_num, vil_num1, vil_num2, par_km FROM parcours'
		);
		$req->execute();
		while ($parcours = $req->fetch(PDO::FETCH_OBJ))
		{
			$allParcours[] = new Parcours($parcours);
		};
		$req->closeCursor();
		return $allParcours;
	}

	public function getParcoursAToB($aller, $retour)
	{
		$req = $this->db->prepare(
			'SELECT par_num, vil_num1, vil_num2, par_km FROM parcours WHERE vil_num1 = :aller AND vil_num2 = :retour
			UNION
			SELECT par_num, vil_num1, vil_num2, par_km FROM parcours WHERE vil_num2 = :aller AND vil_num1 = :retour'
		);
		$req->bindValue(':aller', $aller);
		$req->bindValue(':retour', $retour);
		$req->execute();
		if ($parcours = $req->fetch(PDO::FETCH_OBJ))
		{
			$parcours = new Parcours($parcours);
		}
		else {
			$parcours = NULL;
		}
		$req->closeCursor();
		return $parcours;
	}

	//Fonction permettant de récupérer les villes de la table parcours
	public function getAllVille()
	{
		$allVille = array();
		$req = $this->db->prepare(
			'SELECT vil_num, vil_nom FROM ville WHERE vil_num IN
			(SELECT vil_num1 FROM parcours UNION SELECT vil_num2 FROM parcours)'
		);
		$req->execute();
		while ($ville = $req->fetch(PDO::FETCH_OBJ))
		{
			$allVille[] = new Ville($ville);
		};
		$req->closeCursor();
		return $allVille;
	}

	//Fonction permettant de récupérer les villes possible de départ de la table parcours
	public function getAllVilleDepart()
	{
		$allVille = array();
		$req = $this->db->prepare(
			'SELECT vil_num, vil_nom FROM ville WHERE vil_num IN
			(SELECT vil_num1 FROM parcours p, propose pr WHERE p.par_num=pr.par_num AND pro_sens = 0 UNION SELECT vil_num2 FROM parcours p, propose pr WHERE p.par_num=pr.par_num AND pro_sens = 1)'
		);
		$req->bindValue(':vil_num_dep', $vil_num_dep);
		$req->execute();
		while ($ville = $req->fetch(PDO::FETCH_OBJ))
		{
			$allVille[] = new Ville($ville);
		};
		$req->closeCursor();
		return $allVille;
	}

	//Fonction permettant de récupérer les villes possible d'arivée de la table parcours
	public function getAllVilleArrive($vil_num_dep)
	{
		$allVille = array();
		$req = $this->db->prepare(
			'SELECT vil_num, vil_nom FROM ville WHERE vil_num IN
			(SELECT vil_num1 FROM parcours WHERE vil_num2 = :vil_num_dep UNION SELECT vil_num2 FROM parcours WHERE vil_num1 = :vil_num_dep)'
		);
		$req->bindValue(':vil_num_dep', $vil_num_dep);
		$req->execute();
		while ($ville = $req->fetch(PDO::FETCH_OBJ))
		{
			$allVille[] = new Ville($ville);
		};
		$req->closeCursor();
		return $allVille;
	}
}
