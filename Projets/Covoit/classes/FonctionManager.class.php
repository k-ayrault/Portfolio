<?php
class FonctionManager{
	//Constructeur de FonctionManager
	public function __construct($db)
	{
		$this->db = $db;
	}

	//Fonction permettant d'ajouter une fonction dans la bd
	public function add($fonction)
	{
		$req = $this->db->prepare(
			'INSERT INTO personne(fon_num, fon_libelle) VALUES (:fon_num, :fon_libelle)'
		);
		$req->bindValue(':fon_num', $fonction->getFonNum());
		$req->bindValue(':fon_libelle', $fonction->getFonLibelle());
		$retour = $req->execute();
		return $retour;
	}

	//Fonction permettant de retourner toute les fonctions présent dans la bd
	public function getAllFonction()
  {
    $allFonction = array();
    $req = $this->db->prepare(
      'SELECT fon_num, fon_libelle FROM fonction'
    );
    $req->execute();
    while ($fonction = $req->fetch(PDO::FETCH_OBJ))
    {
      $allFonction[] = new Fonction($fonction);
    }
    $req->closeCursor();
    return $allFonction;
  }
	//Fonction permettant de retourner une fonction selon un id
	public function getFonction($id)
	{
		$req = $this->db->prepare(
			'SELECT fon_num, fon_libelle FROM fonction WHERE fon_num = :fon_num'
		);
		$req->bindValue(':fon_num', $id);
		$req->execute();
		if ($fonction = $req->fetch(PDO::FETCH_OBJ))
		{
			$laFonction = new Fonction($fonction);
		}
		else {
			$laFonction = NULL;
		}
		$req->closeCursor();
		return $laFonction;
	}

}
?>
