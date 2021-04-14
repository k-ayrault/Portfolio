<?php
class PersonneManager{

  //Constructeur de ParcoursManager
  public function __construct($db)
  {
    $this->db = $db;
  }

  //Fonction permettant d'ajouter une personne dans la bd
  public function add($personne)
  {
    $req = $this->db->prepare(
      'INSERT INTO personne(per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd) VALUES (:per_nom, :per_prenom, :per_tel, :per_mail, :per_login, :per_pwd)'
    );
    $req->bindValue(':per_nom', $personne->getPerNom());
    $req->bindValue(':per_prenom', $personne->getPerPrenom());
    $req->bindValue(':per_tel', $personne->getPerTel());
    $req->bindValue(':per_mail', $personne->getPerMail());
    $req->bindValue(':per_login', $personne->getPerLogin());
    $req->bindValue(':per_pwd', $personne->getPerPwd());
    $retour = $req->execute();
    return $retour;
  }
  //Fonction permettant de modifier une personne de la bd
  public function update($personne, $id)
  {
    $req = $this->db->prepare(
      'UPDATE personne
      SET per_nom=:per_nom, per_prenom=:per_prenom, per_tel=:per_tel, per_mail=:per_mail, per_login=:per_login, per_pwd=:per_pwd
      WHERE per_num = :per_num'
    );
    $req->bindValue(':per_num', $id);
    $req->bindValue(':per_nom', $personne->getPerNom());
    $req->bindValue(':per_prenom', $personne->getPerPrenom());
    $req->bindValue(':per_tel', $personne->getPerTel());
    $req->bindValue(':per_mail', $personne->getPerMail());
    $req->bindValue(':per_login', $personne->getPerLogin());
    $req->bindValue(':per_pwd', $personne->getPerPwd());
    $retour = $req->execute();
    return $retour;
  }
  //Fonction permettant de supprimer une personne de la bd
  public function delete($id)
  {
    $req = $this->db->prepare(
      'DELETE FROM personne WHERE per_num = :id'
    );
    $req->bindValue(':id', $id);
    $retour = $req->execute();
    return $retour;
  }

  //Fonction permettant de récupérer toutes les personnes présentent dans la bd
  public function getAllPersonne()
  {
    $allPersonne = array();
    $req = $this->db->prepare(
      'SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd FROM personne'
    );
    $req->execute();
    while ($personne = $req->fetch(PDO::FETCH_OBJ))
    {
      $allPersonne[] = new Personne($personne);
    }
    $req->closeCursor();
    return $allPersonne;
  }

  //Fonction permettant de récupérer une personne de la bd selon son num
  public function getPersonne($id)
  {
    $req = $this->db->prepare(
      'SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd FROM personne WHERE per_num = :per_num'
    );
    $req->bindValue(':per_num', $id);
    $req->execute();
    if ($personne = $req->fetch(PDO::FETCH_OBJ))
    {
      $laPersonne = new Personne($personne);
    }
    else {
      $laPersonne = NULL;
    }
    $req->closeCursor();
    return $laPersonne;
  }

  //Fonction permettant de récupérer une personne de la bd selon son login
  public function getPersonneLogin($login)
  {
    $req = $this->db->prepare(
      'SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd FROM personne WHERE per_login = :per_login'
    );
    $req->bindValue(':per_login', $login);
    $req->execute();
    if ($personne = $req->fetch(PDO::FETCH_OBJ))
    {
      $laPersonne = new Personne($personne);
    }
    else {
      $laPersonne = NULL;
    }
    $req->closeCursor();
    return $laPersonne;
  }

  //Fonction permettant de retourner la derniere personne ajouté
  public function getDernierePersonne()
  {
    $req = $this->db->prepare(
      'SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd FROM personne ORDER BY per_num DESC'
    );
    $req->execute();
    if ($personne = $req->fetch(PDO::FETCH_OBJ))
    {
      $laPersonne = new Personne($personne);
    }
    else {
      $laPersonne = NULL;
    }
    $req->closeCursor();
    return $laPersonne;
  }

}
?>
