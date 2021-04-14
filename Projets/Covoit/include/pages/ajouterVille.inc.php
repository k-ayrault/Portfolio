
<h1>Ajouter une ville</h1>

<?php if(empty($_POST["vil_nom"])) // si la variable vil_nom est vide on affiche le formulaire pour le saisir
{ ?>
  <form id="formulaire" action="index.php?page=7" method="post">
    <label for="vil_nom">Nom : </label>
    <input type="text" name="vil_nom">
    <input type="submit" id="submit" value="Valider" style="margin-left:3em;">
  </form>
<?php }
else
{
  $pdo = new Mypdo();
  $villeManager = new VilleManager($pdo); // On créé un nouveau VilleManager
  $ville = new Ville($_POST); // On créé un nouvelle ville
  $retour = $villeManager->add($ville); // on ajoute la ville et on récupère le numéro renvoyé dans $retour
  if ($retour!=0) // Si $resultat != 0 alors l'ajout c'est bien passé
  {?>
    <p><img src="image/valid.png" alt="Valide"/>&nbsp;La ville "<?php echo $ville->getVilNom() ?>" a été ajouté !</p>
  <?php
  }
  else {  // sinon si $resultat=0 alors l'ajout c'est mal passé
  ?>
    <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;La ville "<?php echo $ville->getVilNom() ?>" n'a pas était ajouté !</p>
  <?php
  }
} ?>
