<?php
class DepartementManager{
	//Constructeur de DepartementManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction permettant d'ajouter un département dans la bd
	public function add($departement)
	{
		$req = $this->db->prepare(
			'INSERT INTO personne(dep_num, dep_nom, vil_num) VALUES (:dep_num, :dep_nom, :vil_num)'
		);
		$req->bindValue(':dep_num', $departement->getDepNum());
		$req->bindValue(':dep_nom', $departement->getDepNom());
		$req->bindValue(':vil_num', $departement->getVilNum());
		$retour = $req->execute();
		return $retour;
	}

	//Fonction permettant de retourner tout les département présent dans la bd
	public function getAllDepartement()
  {
    $allDepartement = array();
    $req = $this->db->prepare(
      'SELECT dep_num, dep_nom, vil_num FROM departement'
    );
    $req->execute();
    while ($departement = $req->fetch(PDO::FETCH_OBJ))
    {
      $allDepartement[] = new Departement($departement);
    }
    $req->closeCursor();
    return $allDepartement;
  }

	//Fonction permettant de retourner un département selon un id
	public function getDepartement($id)
	{
		$req = $this->db->prepare(
			'SELECT dep_num, dep_nom, vil_num FROM departement WHERE dep_num = :dep_num'
		);
		$req->bindValue(':dep_num', $id);
		$req->execute();
		if ($departement = $req->fetch(PDO::FETCH_OBJ))
		{
			$leDepartement = new Departement($departement);
		}
		else {
			$leDepartement = NULL;
		}
		$req->closeCursor();
		return $leDepartement;
	}

}
?>
