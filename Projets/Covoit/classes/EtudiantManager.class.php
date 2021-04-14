<?php
class EtudiantManager{
	//Constructeur de EtudiantManager
  public function __construct($db)
  {
    $this->db = $db;
  }

  //Fonction permettant d'ajouter un étudiant dans la bd
  public function add($etudiant)
  {
    $req = $this->db->prepare(
      'INSERT INTO etudiant(per_num, dep_num, div_num) VALUES (:per_num, :dep_num, :div_num)'
    );
    $req->bindValue(':per_num', $etudiant->getPerNum());
    $req->bindValue(':dep_num', $etudiant->getDepNum());
    $req->bindValue(':div_num', $etudiant->getDivNum());
    $retour = $req->execute();
    return $retour;
  }
  //Fonction permettant de modifié un étudiant de la bd
  public function update($etudiant, $id)
  {
    $req = $this->db->prepare(
      'UPDATE etudiant
      SET dep_num = :dep_num, div_num = :div_num
      WHERE per_num = :per_num'
    );
    $req->bindValue(':per_num', $id);
    $req->bindValue(':dep_num', $etudiant->getDepNum());
    $req->bindValue(':div_num', $etudiant->getDivNum());
    $retour = $req->execute();
    return $retour;
  }

  //Fonction permettant de supprimer un étudiant de la bd
  public function delete($id)
  {
    $req = $this->db->prepare(
      'DELETE FROM etudiant WHERE per_num = :id'
    );
    $req->bindValue(':id', $id);
    $retour = $req->execute();
    return $retour;
  }

	//Fonction permettant de retourner un étudiant selon un id
	public function getEtudiant($id)
	{
		$req = $this->db->prepare(
			'SELECT per_num, dep_num, div_num FROM etudiant WHERE per_num = :per_num'
		);
		$req->bindValue(':per_num', $id);
		$req->execute();
		if ($etudiant = $req->fetch(PDO::FETCH_OBJ))
		{
			$lEtudiant = new Etudiant($etudiant);
		}
		else {
			$lEtudiant = NULL;
		}
		$req->closeCursor();
		return $lEtudiant;
	}

  //Fonction permettant de retourner un étudiant selon un login
  public function getEtudiantLogin($login)
  {
    $req = $this->db->prepare(
      'SELECT per_num, dep_num, div_num FROM etudiant WHERE per_num = :per_num'
    );
    $req->bindValue(':per_num', $id);
    $req->execute();
    if ($etudiant = $req->fetch(PDO::FETCH_OBJ))
    {
      $lEtudiant = new Etudiant($etudiant);
    }
    else {
      $lEtudiant = NULL;
    }
    $req->closeCursor();
    return $lEtudiant;
  }

}
?>
