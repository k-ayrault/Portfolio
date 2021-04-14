
<h1>Pour vous connecter</h1>

<?php
  $pdo = new Mypdo(); // on créé un nouveau personne manager
  $personneManager = new PersonneManager($pdo); // On créé un nouveau personne manager
  $nbre1 = rand(1,9); // On récupère un chiffre random compris en 1 et 9
  $nbre2 = rand(1,9); // On récupère un chiffre random compris en 1 et 9
  $resultat = $nbre1 + $nbre2; // On additionne ces deux nombres


if (empty($_POST["per_login"]) || empty($_POST["per_pwd"])) // si per_login ou per_pwd sont vides on affiche le formulaire pour les renseigner
{ ?>
  <form id="formulaire" action="index.php?page=11" method="post">
      <label for="per_login">Nom d'utilisateur :</label>
      <br/>
      <input type="text" name="per_login" style="background-color:#EDEDED; width:17em;color:black;">
      <br/>
      <label for="per_pwd">Mot de passe :</label>
      <br/>
      <input type="password" name="per_pwd" style="background-color:#EDEDED; width:17em; color:black;">
      <br/>
      <div id="calculConnexion"><a><img src="image/nb/<?php echo $nbre1 ?>.jpg" alt="<?php echo $nbre1 ?>"/> + <img src="image/nb/<?php echo $nbre2 ?>.jpg" alt="<?php echo $nbre2 ?>"/> = </a></div>
      <input type="hidden" name="resultat" value="<?php echo $resultat; ?>">
      <input type="number" name="resultatUtilisateur" style="background-color:#EDEDED; width:17em; color:black;">
      <br/>
      <br/>
      <input type="submit" id="submit" value="Valider">
  </form>
<?php
}
else { // sinon ...
  if ($_POST["resultatUtilisateur"] != $_POST["resultat"]) // sinon si result est égal à $resultat alors on raffiche le formulaire et on affiche un message d'erreur
  {
   ?>

<form id="formulaire" action="index.php?page=11" method="post">
    <label for="per_login">Nom d'utilisateur :</label>
    <br/>
    <input type="text" name="per_login" style="background-color:#EDEDED; width:17em;color:black;">
    <br/>
    <label for="per_pwd">Mot de passe :</label>
    <br/>
    <input type="password" name="per_pwd" style="background-color:#EDEDED; width:17em; color:black;">
    <br/>
    <p><img src="image/nb/<?php echo $nbre1 ?>.jpg" alt="<?php echo $nbre1 ?>"/> + <img src="image/nb/<?php echo $nbre2 ?>.jpg" alt="<?php echo $nbre2 ?>"/> = </p>
    <br/>
    <input type="hidden" name="resultat" value="<?php echo $resultat; ?>">
    <input type="number" name="resultatUtilisateur" style="background-color:#EDEDED; width:17em; color:black;">
          <p>Erreur dans la saisie du résultat</p>
    <br/>
    <input type="submit" id="submit" value="Valider">
</form>
<?php
  }
  else { // sinon alors on connecte l'utilisateur et on le redirige ver la page d'accueil
    $personne = $personneManager->getPersonneLogin($_POST["per_login"]); // On récupère le login
    if ($personne != NULL && $personne->getPerPwd() == sha1(sha1($_POST["per_pwd"]).$salt)) // On vérifie le mot de passe et si $personne est différent de null
    {
      $_SESSION["id"] = $personne->getPerNum(); // alors l'id de la session devient le numéro de la personne
      $_SESSION["login"] = $personne->getPerLogin(); // puis le login de la session devient le login de la personne
      header("Location: index.php?page=accueil");
    }
    else { // sinon le mot de passe et l'utilisateur ne sont pas correct et on ré-affiche le formulaire de connexion
		?>
      <form id="formulaire" action="index.php?page=11" method="post">
          <label for="per_login">Nom d'utilisateur :</label>
          <br/>
          <input type="text" name="per_login" style="background-color:#EDEDED; width:17em;color:black;">
          <br/>
          <label for="per_pwd">Mot de passe :</label>
          <br/>
          <input type="password" name="per_pwd" style="background-color:#EDEDED; width:17em; color:black;">
          <br/>
          <p><img src="image/nb/<?php echo $nbre1 ?>.jpg" alt="<?php echo $nbre1 ?>"/> + <img src="image/nb/<?php echo $nbre2 ?>.jpg" alt="<?php echo $nbre2 ?>"/> = </p>
          <br/>
          <input type="hidden" name="resultat" value="<?php echo $resultat; ?>">
          <input type="number" name="resultatUtilisateur" style="background-color:#EDEDED; width:17em; color:black;">
                <p>Login non existant ou mot de passe non correspondant !</p>
          <br/>
          <input type="submit" value="Valider">
      </form>
<?php
    }
  }
} ?>
