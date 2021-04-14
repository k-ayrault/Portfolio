<?php
class DivisionManager{
	//Constructeur de DivisionManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction permettant d'ajouter une division dans la bd
	public function add($division)
	{
		$req = $this->db->prepare(
			'INSERT INTO personne(div_num, div_nom) VALUES (:div_num, :div_nom)'
		);
		$req->bindValue(':div_num', $division->getDivNum());
		$req->bindValue(':div_nom', $division->getDivNom());
		$retour = $req->execute();
		return $retour;
	}

	//Fonction permettant de retourner toute les divisions présent dans la bd
	public function getAllDivision()
  {
    $allDivision = array();
    $req = $this->db->prepare(
      'SELECT div_num, div_nom FROM division'
    );
    $req->execute();
    while ($division = $req->fetch(PDO::FETCH_OBJ))
    {
      $allDivision[] = new Division($division);
    }
    $req->closeCursor();
    return $allDivision;
  }

	//Fonction permettant de retourner une division selon un id
	public function getDivision($id)
	{
		$req = $this->db->prepare(
			'SELECT div_num, div_nom FROM division WHERE div_num = :div_num'
		);
		$req->bindValue(':div_num', $id);
		$req->execute();
		if ($division = $req->fetch(PDO::FETCH_OBJ))
		{
			$laDivision = new Division($division);
		}
		else {
			$laDivision = NULL;
		}
		$req->closeCursor();
		return $laDivision;
	}

}
?>
