<h1>Liste des personnes enregistrées</h1>

<?php
  $pdo = new Mypdo();
  $personneManager = new PersonneManager($pdo); // On créé un nouveau personne manager
  $etudiantManager = new EtudiantManager($pdo); // On créé un nouveau étudiant manager
  $salarieManager = new SalarieManager($pdo); // On créé un nouveau salarie manager
  $departementManager = new DepartementManager($pdo); // On créé un nouveau departement manager
  $villeManager = new VilleManager($pdo); // On créé un nouveau ville manager
  $fonctionManager = new FonctionManager($pdo); // On créé un nouveau fonction manager
  $allPersonne = $personneManager->getAllPersonne();  // On récupère toutes les personnes
  $nbrePersonnes = count($allPersonne); // On compte le nombre de personnes total


  if (isset($_POST["info"])) //  vérifie que la variable info est définie et n'est pas vide
  {
    $etudiant = $etudiantManager->getEtudiant($_POST["info"]); // On récupère l'info de l'étudiant
    $salarie = $salarieManager->getSalarie($_POST["info"]); // On récupère l'info du salarié
    if ($etudiant != NULL) // Si $etudiant est différent de null
    {
      $personne = $personneManager->getPersonne($_POST["info"]); // On récupère l'info de la personne
      $departement = $departementManager->getDepartement($etudiant->getDepNum()); // On récupère le département  de l'étudiant
      $ville = $villeManager->getVille($departement->getVilNum()); // On récupère le numéro de la ville du département ?>
      <table id="tableau">
        <tr>
          <th>Prénom</th>
          <th>Mail</th>
          <th>Tel</th>
          <th>Département</th>
          <th>Ville</th>
        </tr>
          <tr>
            <td style="width:15%"><?php echo $personne->getPerPrenom() ?></td>
            <td style="width:15%"><?php echo $personne->getPerMail()  ?></td>
            <td style="width:15%"><?php echo $personne->getPerTel()  ?></td>
            <td style="width:15%"><?php echo $departement->getDepNom()  ?></td>
            <td style="width:15%"><?php echo $ville->getVilNom() ?></td>
          </tr>
      </table>
    <?php
    }
    if($salarie != NULL) // Si $salarie est différent null
    {
      $personne = $personneManager->getPersonne($_POST["info"]); // On récupère l'info de la personne
      $fonction = $fonctionManager->getFonction($salarie->getFonNum()); // On récupère la fonction du salarie
	  ?>
      <table id="tableau">
        <tr>
          <th>Prénom</th>
          <th>Mail</th>
          <th>Tel</th>
          <th>Tel pro</th>
          <th>Fonction</th>
        </tr>
          <tr>
            <td style="width:15%"><?php echo $personne->getPerPrenom() ?></td>
            <td style="width:15%"><?php echo $personne->getPerMail()  ?></td>
            <td style="width:15%"><?php echo $personne->getPerTel()  ?></td>
            <td style="width:15%"><?php echo $salarie->getSalTelProf()  ?></td>
            <td style="width:15%"><?php echo $fonction->getFonLibelle() ?></td>
          </tr>
      </table>
    <?php
    }

  }
  else { // Sinon on affiche le nombre de personne enregistrées
?>
  <a>Actuellement <?php echo $nbrePersonnes ?> personnes sont enregistrées</a>

  <table id="tableau">
    <tr>
      <th>Numéro</th>
      <th>Nom</th>
      <th>Prénom</th>
    </tr>
    <?php foreach ($allPersonne as $personne){ // Pour chaque personne on affiche le nom et le prenom
       ?>
      <tr>
        <td style="width:15%"><form action="index.php?page=2" method="post"> <button name="info" style="background-color:none; border : none; font-weight : bold;" value="<?php echo $personne->getPerNum() ?>"><?php echo $personne->getPerNum() ?></button> </form></td>
        <td style="width:15%"><?php echo $personne->getPerNom()  ?></td>
        <td style="width:15%"><?php echo $personne->getPerPrenom()  ?></td>
      </tr>
    <?php } ?>
  </table>

<?php
} ?>
