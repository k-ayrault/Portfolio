<?php
class AvisManager{

  //Constructeur de AvisManager
  public function __construct($db)
  {
    $this->db = $db;
  }

  //Fonction permettant d'ajouter un avis dans la bd
  public function add($avis)
  {
    $req = $this->db->prepare(
      'INSERT INTO personne(per_num, per_per_num, par_num, avi_comm, avi_note, avi_date) VALUES (:per_num, :per_per_num, :par_num, :avi_comm, :avi_note, :avi_date)'
    );
    $req->bindValue(':per_num', $avis->getPerNum());
    $req->bindValue(':per_per_num', $avis->getPerPerNum());
    $req->bindValue(':par_num', $avis->getParNum());
    $req->bindValue(':avi_comm', $avis->getAviComm());
    $req->bindValue(':avi_note', $avis->getAviNote());
    $req->bindValue(':avi_date', $avis->getAviDate());
    $retour = $req->execute();
    return $retour;
  }

  //Fonction permettant de récupérer le dernier commentaire d'un covoiteur
  public function getLastComm($id)
  {
    $req = $this->db->prepare(
      'SELECT per_num, per_per_num, par_num, avi_comm, avi_note, avi_date FROM avis WHERE per_num = :per_num ORDER BY avi_date DESC'
    );
    $req->bindValue(':per_num', $id);
    $req->execute();
    if ($avis = $req->fetch(PDO::FETCH_OBJ))
    {
      $lAvis = new Avis($avis);
    }
    else {
      $lAvis = NULL;
    }
    $req->closeCursor();
    return $lAvis;
  }

  //Fonction permettant de récupérer les notes moyennes d'un covoiteur
  public function getAvgAvis($id)
  {
    $req = $this->db->prepare(
      'SELECT per_num, per_per_num, par_num, avi_comm, avg(avi_note) as avi_note, avi_date FROM avis WHERE per_num = :per_num GROUP BY per_num ORDER BY avi_date DESC'
    );
    $req->execute();
    $req->bindValue(':per_num', $id);
    if ($avis = $req->fetch(PDO::FETCH_OBJ))
    {
      $lAvis = new Avis($avis);
    }
    else {
      $lAvis = NULL;
    }
    $req->closeCursor();
    return $lAvis;
  }
}
?>
