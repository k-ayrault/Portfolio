<h1>Ajouter une personne</h1>
<?php
$pdo = new Mypdo(); // création d'un nouveau pdo
$personneManager = new PersonneManager($pdo); // création d'un nouveau PersonneManager
$departementManager = new DepartementManager($pdo); // création d'un nouveau departementManager
$divisionManager = new DivisionManager($pdo); // création d'un nouveau divisionManager
$fonctionManager = new FonctionManager($pdo); // création d'un nouveau fonctionManager
$etudiantManager = new EtudiantManager($pdo); //création d'un nouveau etudiantManager
$salarieManager = new SalarieManager($pdo); // création d'un nouveau salarieManager

if (!empty($_POST["div_num"]) && ! empty($_POST["dep_num"])) // si les variables div_num et dep_num sont vides alors ...
{
	$personne = new Personne($_POST); //on créée une nouvelle personne avec les informaions saisies par l'utilisateur
	$retour = $personneManager->add($personne); //on ajoute la personne et on récupère le numéro que renvoie l'ajout
	$etudiant = new Etudiant($_POST); //on créée un nouvel etudiant avec les informaions saisies par l'utilisateur
	$etudiant->setPerNum($personneManager->getDernierePersonne()->getPerNum()); //On ajoute l'id de la personne rajoutée aux informations de l'étudiant
	$retour += $etudiantManager->add($etudiant);// on ajoute l'étudiant et on récupère le numéro que renvoie l'ajout
  if ($retour!=0) // si le $resultat !=0 alors l'ajout c'est bien passé
  {?>
    <p><img src="image/valid.png" alt="Valide"/>&nbsp;L'étudiant "<?php echo $personne->getPerNom() ?>" a été ajouté !</p>
  <?php
  } // sinon si le $resultat = 0 alors l'ajout c'est mal passé
  else { ?>
    <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;L'étudiant "<?php echo $personne->getPerNom() ?>" n'a pas été ajouté !</p>
  <?php
  }?>
<?php
}
else {
	if (!empty($_POST["sal_telprof"]) && ! empty($_POST["fon_num"])) // si les variables sal_telprof et fon_num sont vides alors ...
	{
		$salarie = new Salarie($_POST); // on créée un nouveau Salarie
		$personne = new Personne($_POST); //on créée une nouvelle personne avec les informaions saisies par l'utilisateur
		$retour = $personneManager->add($personne); //on ajoute la personne et on récupère le numéro que renvoie l'ajout
		$salarie->setPerNum($personneManager->getDernierePersonne()->getPerNum()); //On ajoute l'id de la personne rajoutée aux informations du salarié
		$retour += $salarieManager->add($salarie, $personneManager->getDernierePersonne());// on ajoute l'étudiant et on récupère le numéro que renvoie l'ajout
	  if ($retour!=0) // Si $resultat != 0 alors l'ajout c'est bien passé
	  {?>
	    <p><img src="image/valid.png" alt="Valide"/>&nbsp;Le salarie "<?php echo $personne->getPerNom() ?>" a été ajouté !</p>
	  <?php
	  } // sinon si $resultat=0 alors l'ajout c'est mal passé
	  else { ?>
	    <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;Le salarie "<?php echo $personne->getPerNom() ?>" n'a pas été ajouté !</p>
	  <?php
	  }?>
	<?php
	}
	else {
		if (empty($_POST["per_nom"]) || empty($_POST["per_prenom"]) || empty($_POST["per_tel"]) || empty($_POST["per_mail"]) || empty($_POST["per_login"]) || empty($_POST["per_pwd"]) || empty($_POST["categorie"]))
		{
		/* Si au moins l'une des variables est vide alors on affiche le formulaire pour renseigner ces dernières*/
		?>
			<form id="formulaire" action="index.php?page=1" method="post">
				<table id="tableau" style="text-align:left;">
					<tr>
						<th><label for="per_nom" style="padding-right:38px;">Nom :</label>
								<input type="text" name="per_nom"></th>
						<th><label for="per_prenom" style="padding-left:25px; padding-right:38px;">Prénom :</label>
								<input type="text" name="per_prenom"></<th>
					</tr>
					<tr>
						<th><label for="per_tel">Téléphone :</label>
								<input type="tel" name="per_tel"></th>
						<th><label for="per_mail" style="padding-left:25px; padding-right:65px;">Mail :</label>
								<input type="mail" name="per_mail"></<th>
					</tr>
					<tr>
						<th><label for="per_login" style="padding-right:36px;">Login :</label>
								<input type="text" name="per_login"></th>
						<th><label for="per_pwd" style="padding-left:25px;">Mot de passe :</label>
								<input type="password" name="per_pwd"></<th>
					</tr>
				</table>
				<div>
					<label for="categorie">Catégorie :</label>
					<input type="radio" id="etudiant" name="categorie" value="Etudiant" checked>
					<label for="etudiant">Etudiant</label>
					<input type="radio" id="salarie" name="categorie" value="Salarie">
					<label for="salarie">Salarie</label>
				</div>
				</br>
				<input id="submit" type="submit" value="Valider">
			</form>
		<?php
		}
		else { // sinon si elles sont toutes remplies ...
			$_POST["per_pwd"] = sha1(sha1($_POST["per_pwd"]).$salt); // On crypte le mot de passe et on le récupère
			$personne = new Personne($_POST); // on créée une nouvelle personne
			$personneLogin = $personneManager->getPersonneLogin($personne->getPerLogin()); // On récupère le login de la personne et on le met dans personneLogin
			if ($personneLogin != NULL) // si personneLogin est null alors on affiche qu'une personne a déjà ce login
			{
				echo "<p>Une personne a déjà ce login !</p>";
			}
			else // sinon ...
			{
				if ($_POST["categorie"] == "Etudiant") // si categorie == à étudiant alors ...
				{
					$divisions = $divisionManager->getAllDivision(); // on récupère toutes les divisions et on les met dans $divisions
					$departements = $departementManager->getAllDepartement();
					/* on récupère tous les départements et on les met dans $departements puis on affiche le formulaire
					pour renseigner ces deux champs */
				?>
					<form id="formulaire" action="index.php?page=1" method="post">
						<input type="hidden" name="per_nom" value="<?php echo $_POST["per_nom"]; ?>">
						<input type="hidden" name="per_prenom" value="<?php echo $_POST["per_prenom"]; ?>">
						<input type="hidden" name="per_tel" value="<?php echo $_POST["per_tel"]; ?>">
						<input type="hidden" name="per_mail" value="<?php echo $_POST["per_mail"]; ?>">
						<input type="hidden" name="per_login" value="<?php echo $_POST["per_login"]; ?>">
						<input type="hidden" name="per_pwd" value="<?php echo $_POST["per_pwd"]; ?>">
						<form id="formulaire" action="index.php?page=1" method="post">
							<table id="tableau" style="text-align:left;">
								<tr>
									<th><label for="div_num" style="padding-right:36px;">Année :</label>
									<select name="div_num">
								    <?php foreach ($divisions as $division) { ?>
								      <option value="<?php echo $division->getDivNum() ?>"><?php echo $division->getDivNom() ?></option>
								    <?php
								    }?>
								  </select></th>
									<th><label for="dep_num" style="padding-left:36px;">Département :</label>
									<select name="dep_num">
								    <?php foreach ($departements as $departement) { ?>
								      <option value="<?php echo $departement->getDepNum() ?>"><?php echo $departement->getDepNom() ?></option>
								    <?php
								    }?>
								  </select></th>
								</tr>
							</table>
						<input type="submit" id="submit" value="Valider">
					</form>
				<?php
				}
				if ($_POST["categorie"] == "Salarie") // si categorie == salarie alors ...
				{
					$fonctions = $fonctionManager->getAllFonction(); /* on récupère toutes les fonctions et on les met dans $fonctions et on affiche  le
7					formulaire pour renseigner le salarie */
				?>
					<form id="formulaire" action="index.php?page=1" method="post">
						<input type="hidden" name="per_nom" value="<?php echo $_POST["per_nom"]; ?>">
						<input type="hidden" name="per_prenom" value="<?php echo $_POST["per_prenom"]; ?>">
						<input type="hidden" name="per_tel" value="<?php echo $_POST["per_tel"]; ?>">
						<input type="hidden" name="per_mail" value="<?php echo $_POST["per_mail"]; ?>">
						<input type="hidden" name="per_login" value="<?php echo $_POST["per_login"]; ?>">
						<input type="hidden" name="per_pwd" value="<?php echo $_POST["per_pwd"]; ?>">
						<form id="formulaire" action="index.php?page=1" method="post">
							<table id="tableau" style="text-align:left;">
								<tr>
									<th><label for="sal_telprof" style="padding-right:36px;">Téléphone professionnel :</label>
									<input type="tel" name="sal_telprof" style="margin-left:0;"></th>
									<th><label for="fon_num" style="padding-left:36px;">Département :</label>
									<select name="fon_num">
								    <?php foreach ($fonctions as $fonction) { ?>
								      <option value="<?php echo $fonction->getFonNum() ?>"><?php echo $fonction->getFonLibelle() ?></option>
								    <?php
								    }?>
								  </select></th>
								</tr>
							</table>
						<input type="submit" id="submit" value="Valider">
					</form>
				<?php
				}
			}
		}
	}
}
		 ?>
