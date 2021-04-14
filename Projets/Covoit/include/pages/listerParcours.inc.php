<h1>Liste des parcours proposés</h1>

<?php
  $pdo = new Mypdo();
  $villeManager = new VilleManager($pdo); // On créé un nouveau ville manager
  $parcoursManager = new ParcoursManager($pdo); // On créé un nouveau parcours manager
  $allParcours = $parcoursManager->getAllParcours(); // On récupère tous les parcours
  $nbreParcours = count($allParcours); // On compte le nombre de parcours total 
?>
  <a>Actuellement <?php echo $nbreParcours ?> parcours sont enregistrées</a>

  <table id="tableau">
    <tr>
      <th>Numéro</th>
      <th>Nom Ville</th>
      <th>Nom ville</th>
      <th>Nombre de Km</th>
    </tr>
    <?php foreach ($allParcours as $parcours){ // pour chaque parcours ...
       $ville1 = $villeManager->getVille($parcours->getVilNum1()); // On récupère la ville de départ 
       $ville2 = $villeManager->getVille($parcours->getVilNum2()); // On récupère la ville d'arrivé ... et on affiche la liste des parcours
       ?>
      <tr>
        <td style="width:15%"><?php echo $parcours->getParNum() ?></td>
        <td style="width:15%"><?php echo $ville1->getVilNom()  ?></td>
        <td style="width:15%"><?php echo $ville2->getVilNom()  ?></td>
        <td style="width:15%"><?php echo $parcours->getParKm()  ?></td>
      </tr>
    <?php } ?>
  </table>
