<?php
$pdo = new Mypdo();
$parcoursManager = new ParcoursManager($pdo); // On créé un nouveau parcours manager
$proposeManager = new ProposeManager($pdo); // On créé un nouveau propose manager
$villeManager = new VilleManager($pdo);  // On créé un nouveau ville manager
?>
<?php if (!isset($_SESSION["id"]) || !isset($_SESSION["login"]) ) // Si l'une des variables n'est pas définie ou est vide on affiche un message disant de se connecter
{ ?>
  <p>Erreur 401 - Connexion requise</p>
<?php
}
else { ?>
<h1>Proposer un trajet</h1>

<?php if (empty($_POST["vil_num1"]) || $_POST["vil_num1"] == "") { // Si l'une des deux variables est vide on affiche un formulaire pour les remplir
?>
<form id="formulaire" action="index.php?page=9" method="post">
  <label for="vil_num1">Ville de départ :</label>
  <br/>
  <br/>
  <select name="vil_num1">
    <option value="">Choisissez</option>
    <?php $villes = $parcoursManager->getAllVille(); // On récupère toutes les villes
    foreach ($villes as $ville) { // Pour chaque ville on affiche le numéro de la ville et le nom dans une liste déroulante
		?>
      <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
    <?php } ?>
  </select>
  <br/>
  <br/>
  <input type="submit" id="submit" value="Valider">
</form>
<?php
}
else { // Sinon
  if(empty($_POST["vil_num2"]) || empty($_POST["pro_date"]) || empty($_POST["pro_time"]) || empty($_POST["pro_place"])) /*Si au moins une des quatres variables est vide on
  affiche un formulaire pour les remplir */
  {
    $vil_dep = $villeManager->getVille($_POST["vil_num1"]); // On récupère le numéro de la ville de départ
    $villes_arrivee = $parcoursManager->getAllVilleArrive($vil_dep->getVilNum());  // On récupère les numéros des villes d'arrivées depuis la ville de départ
  ?>
    <form id="formulaire" action="index.php?page=9" method="post">
      <table id="tableau" style="text-align:left;">
        <tr>
          <th><label for="vil_num1">Ville de départ : <?php echo $vil_dep->getVilNom() ?></label> <input type="hidden" name="vil_num1" value="<?php echo $vil_dep->getVilNum() ?>"></th>
          <th><label for="vil_num2"style="padding-left:36px;padding-right:22px;">Ville d'arrivée :</label>
            <select name="vil_num2">
              <?php
              foreach ($villes_arrivee as $ville) { ?>
                <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
              <?php } ?>
            </select></<th>
        </tr>
        <tr>
          <th><label for="pro_date" style="padding-right:17px;">Date de départ :</label>
              <input type="date" name="pro_date" value="<?php echo date("Y-m-d")?>"></th>
          <th><label for="pro_time" style="padding-left:36px;">Heure de départ :</label>
              <input type="time" name="pro_time" value="<?php echo date("H:i")?>"></<th>
        </tr>
        <tr>
          <th><label for="pro_place">Nombre de place :</label>
              <input type="number" name="pro_place"></th>
        </tr>
      </table>
      <input type="submit" id="submit" value="Valider">
    </form>
<?php
  }
  else {   // sinon
    $_POST["per_num"] = $_SESSION["id"]; // On récupère l'id de la session
    $parcoursPropose = new Parcours($_POST); // On créé un nouveau parcours
    $parcours = $parcoursManager->getParcoursAToB($_POST["vil_num1"], $_POST["vil_num2"]); // On affecte le parcours entre les deux villes au parcours
    if (!$parcours == NULL) // Si le parcours n'est pas nul
    {
      $_POST["par_num"] = $parcours->getParNum(); // On récupère le numéro du parcours
      if ($parcours->getVilNum1() == $_POST["vil_num1"]) // Si le numéro de la ville de départ du parcours et celui de la ville de départ renseignée ...
      {
        $_POST["pro_sens"] = 0; // On affecte 0 à pro_sens
      }
      else { //  Sinon...
        $_POST["pro_sens"] = 1; //  On affecte 1 à pro_sens
      }
    }
    $parcoursPropose = new Propose($_POST); // On créé un nouveau propose
    $retour = $proposeManager->add($parcoursPropose); // On ajoute le parcours et on récupère le code retour
    if ($retour!=0) // Si le code retour est différent de 0 l'ajout c'est bien passé et on affiche un message pour le dire
    {?>
      <p><img src="image/valid.png" alt="Valide"/>&nbsp;Votre parcours a bien été ajouté !</p>
    <?php
    }
    else { // Sinon ça c'est mal passé et on affiche un message d'erreur
	?>
      <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;Votre parcours n'a pas pu être ajouté !</p>
    <?php
  }
}
}
} ?>
