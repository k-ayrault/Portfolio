<h1>Ajouter un parcours</h1>

<?php
  $pdo = new Mypdo();
  $villeManager = new VilleManager($pdo); // on créé un nouveau ville manager
  $allVille = $villeManager->getAllVilleAlpha(); // on récupère toutes les villes

  if(empty($_POST["vil_num1"]) || empty($_POST["vil_num2"]) || empty($_POST["par_km"])) // Si vil_num1, vil_num2 et par_km sont vides alors on affiche un formulaire pour les renseigner.
  {
?>
<form id="formulaire" action="index.php?page=5" method="post">
  <table id="tableau" style="text-align:left;">
    <tr>
      <th><label for="vil_num1">Ville 1 : </label>
      <select name="vil_num1">
        <?php foreach ($allVille as $ville) { ?>
          <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
        <?php
        }?>
      </select></th>
      <th><label for="vil_num2" style="padding-left:36px;">Ville 2 : </label>
      <select name="vil_num2">
        <?php foreach ($allVille as $ville) { ?>
          <option value="<?php echo $ville->getVilNum() ?>"><?php echo $ville->getVilNom() ?></option>
        <?php
        }?>
      </select></th>
      <th><label for="par_km" style="padding-left:36px;">Nombre de kilomètre(s) :</label>
      <input type="text" name="par_km"></th>
    </tr>
  </table>
  <input type="submit" id="submit" value="Valider">
</form>
<?php
}
else {
  $parcoursManager = new ParcoursManager($pdo); // On créé un nouveau parcours manager
  $parcours = new Parcours($_POST); // On créé un nouveau parcours avec tous les attributs dedans
  $retour = $parcoursManager->add($parcours); // On ajoute le nouveau parcours
  if ($retour!=0) // si $retour !=0 l'ajout c'est bien passé
  {?>
    <p><img src="image/valid.png" alt="Valide"/> &nbsp; Le parcours a bien été ajouté</p>
  <?php
  }
  else {  // sinon ça veut dire que l'ajout a rencontré un problème
  ?>
    <p><img src="image/erreur.png" alt="Erreur"/> &nbsp;Le parcours n'a pas était ajouté !</p>
  <?php
  }
}  ?>
