<?php
class VilleManager{

	//Constructeur de VilleManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction add permettant d'insérer une ville dans la bd
	public function add($ville)
	{
		$req = $this->db->prepare(
			'INSERT INTO ville(vil_nom) VALUES (:vil_nom)'
		);
		$req->bindValue(':vil_nom', $ville->getVilNom());
		$retour=$req->execute();
    return $retour;
	}

	//Fonction permettant de récupérer toute les villes présentent dans la base par ordre alphabétique
	public function getAllVilleAlpha()
	{
		$allVille = array();
		$req = $this->db->prepare(
			'SELECT vil_num, vil_nom FROM ville ORDER BY vil_nom ASC'
		);
		$req->execute();
		while ($ville = $req->fetch(PDO::FETCH_OBJ))
		{
			$allVille[] = new Ville($ville);
		}
		$req->closeCursor();
		return $allVille;
	}

	//Fonction permettant de récupérer une ville à l'aide
	public function getVille($num)
	{
		$req = $this->db->prepare(
			'SELECT vil_num, vil_nom FROM ville WHERE vil_num = :vil_num'
		);
		$req->bindValue(':vil_num', $num);
		$req->execute();
		if($ville = $req->fetch(PDO::FETCH_OBJ))
		{
			$laVille = new Ville($ville);
		}
		else {
			$laVille = NULL;
		}
		$req->closeCursor();
		return $laVille;
	}
}
