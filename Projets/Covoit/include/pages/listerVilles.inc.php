<h1>Liste des villes</h1>

<?php
  $pdo = new Mypdo();
  $villeManager = new VilleManager($pdo);  // On créé un nouveau ville manager
  $allVille = $villeManager->getAllVilleAlpha(); // On récupère toute les villes
  $nbreVille = count($allVille); // On compte le nombre total de villes
?>
  <a>Actuellement <?php echo $nbreVille ?> villes sont enregistrées</a>

  <table id="tableau">
    <tr>
      <th>Numéro</th>
      <th>Nom</th>
    </tr>
    <?php foreach ($allVille as $ville){  // Pour chaque ville on affiche le numéro et le nom de la ville
	?>
      <tr>
        <td><?php echo $ville->getVilNum() ?></td>
        <td><?php echo $ville->getVilNom() ?></td>
      </tr>
    <?php } ?>
  </table>
