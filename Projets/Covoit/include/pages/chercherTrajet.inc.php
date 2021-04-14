<?php
$pdo = new Mypdo();
$parcoursManager = new ParcoursManager($pdo); // On créé un nouveau parcours manager
$villeManager = new VilleManager($pdo); // On créé un nouveau ville manager
$proposeManager = new ProposeManager($pdo); // On créé un nouveau propose manager
$personneManager = new PersonneManager($pdo); // On créé un nouveau personne manager
$avisManager = new AvisManager($pdo); // On créé un nouvelle avis manager
?>
<?php if (!isset($_SESSION["id"]) || !isset($_SESSION["login"]) ) // Si les variables ne sont pas définies ou sont nulles on affiche une erreur pour que la personne se connecte
{ ?>
  <p>Erreur 401 - Connexion requise</p>
<?php }
else { ?>
<h1>Rechercher un trajet</h1>

<?php if (empty($_POST["vil_num1"]) || $_POST["vil_num1"] == "") { // Si la variable vil_num1 est vide  on affiche le formulaire pour saisir vil_num1
?>
<form id="formulaire" action="index.php?page=10" method="post">
  <label for="vil_num1">Ville de départ :</label>
  <br/>
  <br/>
  <select name="vil_num1">
    <option value="">Choisissez</option>
    <?php $villes = $parcoursManager->getAllVilleDepart(); // On récupère chaque ville et on les affiche dans un menu déroulant
    foreach ($villes as $ville) { ?>
      <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
    <?php } ?>
  </select>
  <br/>
  <br/>
  <input type="submit" id="submit" value="Valider">
</form>
<?php
}
else {
  if (empty($_POST["vil_num1"]) || empty($_POST["vil_num2"]) || empty($_POST["pro_date"])) // si vil_num1 ou vil_num2 ou pro_date dont vides on affiche un formulaire pour tout sélectionner
  {
    $vil_dep = $villeManager->getVille($_POST["vil_num1"]);
    $villes_arrivee = $parcoursManager->getAllVilleArrive($vil_dep->getVilNum());
    ?>
    <form id="formulaire" action="index.php?page=10" method="post">
      <table id="tableau" style="text-align:left;">
        <tr>
          <th><label for="vil_num1">Ville de départ : <?php echo $vil_dep->getVilNom() ?></label> <input type="hidden" name="vil_num1" value="<?php echo $vil_dep->getVilNum() ?>"></th>
          <th><label for="vil_num2" style="padding-left:25px;">Ville d'arrivée :</label>
            <select name="vil_num2">
              <?php
              foreach ($villes_arrivee as $ville) {  // Pour chaque élément dans $villes_arrivee on affiche le numero et le nom de la ville  ?>
                <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
              <?php } ?>
            </select></<th>
        </tr>
        <tr>
          <th><label for="pro_date">Date de départ :</label>
              <input type="date" name="pro_date" value="<?php echo date("Y-m-d")?>"></th>
              <th><label for="precision" style="padding-left:25px;padding-right: 37px;">Précision : </label>
                <select name="precision">
                  <option value="0">Ce jour</option>
                  <option value="1">+/- 1 jour</option>
                  <?php
                  for ($i=2; $i <= 3; $i++) { ?>
                    <option value="<?php echo $i ?>">+/- <?php echo $i ?> jours</option>
                  <?php } ?>
                </select></<th>
        </tr>
        <tr>
          <th><label for="heure_mini" style="padding-right: 32px;">A partir de : </label>
            <select name="heure_mini">
              <?php
              for ($i=0; $i <= 24; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?>h</option>
              <?php } ?>
            </select></<th>
        </tr>

      </table>
      <input type="submit" id="submit" value="Valider">
    </form>
    <?php
  }
  else { // sinon ...
    $trajets = $proposeManager->getAllTrajet($_POST["vil_num1"],$_POST["vil_num2"],$_POST["pro_date"], $_POST["precision"],$_POST["heure_mini"]);/* on récupère tous les trajets
	et on les met dans $trajets*/
    if (count($trajets) == 0) // si $trajets = 0 alors il n y a pas de trajet entre ces deux villes disponibles.
    { ?>
      <p><img src="image/erreur.png" alt="Erreur"/>Désolé pas de trajet disponible !</p>
    <?php
    }
    else { // sinon il y a bien des trajets entre ces deux villes
      $ville_dep = $villeManager->getVille($_POST["vil_num1"]); // On récupère la ville de départ
      $ville_arrivee = $villeManager->getVille($_POST["vil_num2"]); // On récupère la ville d'arrivée ?>
      <table id="tableau">
        <tr>
          <th>Ville départ</th>
          <th>Ville arrivée</th>
          <th>Date départ</th>
          <th>Heure départ</th>
          <th>Nombre de place(s)</th>
          <th>Nom du covoiteur</th>
        </tr>
        <?php foreach ($trajets as $trajet) /*pour chaque trajet on affiche les attributs de ce trajet*/
		{
          $personne = $personneManager->getPersonne($trajet->getPerNum()); // On récupère le numéro de la personne du trajet
          $avis = $avisManager->getLastComm($personne->getPerNum()); // On récupère le dernier avis sur la personne
           ?>
          <tr>
            <td style="width:15%"><?php echo $ville_dep->getVilNom()  ?></td>
            <td style="width:15%"><?php echo $ville_arrivee->getVilNom()  ?></td>
            <td style="width:15%"><?php echo date("d/m/Y",strtotime($trajet->getProDate())) ?></td>
            <td style="width:15%"><?php echo $trajet->getProTime()  ?></td>
            <td style="width:15%"><?php echo $trajet->getProPlace()  ?></td>
            <td style="width:15%"><div class="tooltip"><?php echo $personne->getPerPrenom()." ".$personne->getPerNom()  ?><span class="tooltiptext">Moyenne des avis : <?php  if ($avis!=NULL) {echo $avis->getAviNote(); } else { echo "N/A";} ?> </br>Dernier avis : <?php if ($avis!=NULL) {echo $avis->getAviComm(); } else { echo "N/A";} ?></span></div></td>
          </tr>
        <?php } ?>
      </table>
    <?php
    }

  }
}
}?>
