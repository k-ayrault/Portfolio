<h1>Supprimer votre compte</h1>

<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo); // On créé un nouveau personne manager
$etudiantManager = new EtudiantManager($pdo); // On créé un nouvel etudiant manager
$salarieManager = new SalarieManager($pdo); // On créé un nouveau salarié manager

if (isset($_POST["supp"])) { // Si la variable supp est vide ou non définie
  $etudiant = $etudiantManager->getEtudiant($_SESSION["id"]); // On récupère l'id de l'étudiant
  $salarie = $salarieManager->getSalarie($_SESSION["id"]); // On récupère l'id du salarié

  if ($etudiant != NULL) // Si c'est un étudiant qui est connecté
  {
    $retourE = $etudiantManager->delete($_SESSION["id"]); // On supprime l'id de l'étudiant et on récupère le code retour
    $retourP = $personneManager->delete($_SESSION["id"]); // On supprime l'id de la personne et on récupère le code retour
    if ($retourE != 0 && $retourP != 0) // Si les codes retours sont différents de 0 la suppression c'est bien passé et on affiche un message pour le dire
    { ?>
      <p><img src="image/valid.png" alt="Valide"/>Votre compte a bien été supprimé !</p>
    <?php
      session_unset(); // On supprime les variables de la session
    }
  }
  if ($salarie != NULL) // Si c'est un salarié qui est connecté
  {
    $retourS = $salarieManager->delete($_SESSION["id"]); // On supprime l'id du salarié et on récupère le code retour
    $retourP = $personneManager->delete($_SESSION["id"]); // On supprime l'id de la personne et on récupère le code retour
    if ($retourS != 0 && $retourP != 0) // Si les codes retours sont différents de 0 la suppression c'est bien passé et on affiche un message pour le dire
    { ?>
      <p><img src="image/valid.png" alt="Valide"/>Votre compte a bien été supprimé !</p>
    <?php
      session_unset();// On supprime les variables de la session
    }
  }


}
else { // Sinon ...
  if (!isset($_SESSION["id"]) || !isset($_SESSION["login"]) ) // Si au moins l'une des variables est vide ou pas définie  on affiche un message d'erreur
{ ?>
  <p>Erreur 401 - Connexion requise</p>
<?php }
else { // On affiche un message pour que la personne confirme la suppression du compte
?>

  <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
  <form id="formulaire" action="index.php?page=4" method="post">
    <input type="submit" id="submit" name="supp" value="Supprimer">
  </form>
<?php }
} ?>
