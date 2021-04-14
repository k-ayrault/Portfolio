<?php
class SalarieManager{

		//Constructeur de SalarieManager
	  public function __construct($db)
	  {
	    $this->db = $db;
	  }

	  //Fonction permettant d'ajouter un salarié dans la bd
	  public function add($salarie)
	  {
	    $req = $this->db->prepare(
	      'INSERT INTO salarie(per_num, sal_telprof, fon_num) VALUES (:per_num, :sal_telprof, :fon_num)'
	    );
	    $req->bindValue(':per_num', $salarie->getPerNum());
	    $req->bindValue(':sal_telprof', $salarie->getSalTelProf());
	    $req->bindValue(':fon_num', $salarie->getFonNum());
	    $retour = $req->execute();
	    return $retour;
	  }
		//Fonction permettant de modifié un salarié de la bd
		public function update($salarie, $id)
		{
			$req = $this->db->prepare(
				'UPDATE salarie
				SET sal_telprof = :sal_telprof, fon_num = :fon_num
				WHERE per_num = :per_num'
			);
			$req->bindValue(':per_num', $id);
			$req->bindValue(':sal_telprof', $salarie->getSalTelProf());
			$req->bindValue(':fon_num', $salarie->getFonNum());
			$retour = $req->execute();
			return $retour;
		}

		//Fonction permettant de supprimer un salarié de la bd
		public function delete($id)
	  {
	    $req = $this->db->prepare(
	      'DELETE FROM salarie WHERE per_num = :id'
	    );
	    $req->bindValue(':id', $id);
	    $retour = $req->execute();
	    return $retour;
	  }

		//Fonction permettant de retourner un étudiant selon un id
		public function getSalarie($id)
		{
			$req = $this->db->prepare(
				'SELECT per_num, sal_telprof, fon_num FROM salarie WHERE per_num = :per_num'
			);
			$req->bindValue(':per_num', $id);
			$req->execute();
			if ($salarie = $req->fetch(PDO::FETCH_OBJ))
			{
				$leSalarie = new Salarie($salarie);
			}
			else {
				$leSalarie = NULL;
			}
			$req->closeCursor();
			return $leSalarie;
		}

	}
?>
