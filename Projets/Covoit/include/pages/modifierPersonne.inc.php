<h1>Modifier une personne</h1>
<?php
$pdo = new Mypdo(); // création d'un nouveau pdo
$personneManager = new PersonneManager($pdo); // création d'un nouveau PersonneManager
$departementManager = new DepartementManager($pdo); // création d'un nouveau departementManager
$divisionManager = new DivisionManager($pdo); // création d'un nouveau divisionManager
$fonctionManager = new FonctionManager($pdo); // création d'un nouveau fonctionManager
$etudiantManager = new EtudiantManager($pdo); //création d'un nouveau etudiantManager
$salarieManager = new SalarieManager($pdo); // création d'un nouveau salarieManager

if (!isset($_SESSION["id"]) || !isset($_SESSION["login"]) ) // Si au moins l'une des variables est vide ou pas définie  on affiche un message d'erreur
{ ?>
<p>Erreur 401 - Connexion requise</p>
<?php }
  else {
    $personne = new Personne($_POST); // on créée une nouvelle Personne avec les informations modifiées
    if (!empty($_POST["div_num"]) && ! empty($_POST["dep_num"])) // si les variables div_num et dep_num sont vides alors ...
    {
      $etudiantExistant = $etudiantManager->getEtudiant($_SESSION["id"]); //Récupération potentiel des informations étudiantes de l'utilisateur
      $etudiant = new Etudiant($_POST); // on créée un nouvel Etudiant avec les informations modifiées ou crées
      if ($etudiantExistant!=NULL)
      {
        $retour = $personneManager->update($personne, $_SESSION["id"]) + $etudiantManager->update($etudiant, $_SESSION["id"]); // on modifie les informaions (personnelles et étudiantes) de la personne et on récupère le numéro que renvoie l'ajout
        if ($retour!=0) // si le $resultat !=0 alors l'ajout c'est bien passé
        {?>
          <p><img src="image/valid.png" alt="Valide"/>&nbsp;<?php echo $personne->getPerNom() ?> a été modifié !</p>
        <?php
        } // sinon si le $resultat = 0 alors l'ajout c'est mal passé
        else { ?>
          <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;<?php echo $personne->getPerNom() ?> n'a pas été modifié !</p>
        <?php
        }
      }
      else {
        $etudiant->setPerNum($_SESSION["id"]); //On ajoute l'id de l'utilisateur à l'Etudiant créée
        $retour = $personneManager->update($personne, $_SESSION["id"]) + $etudiantManager->add($etudiant) + $salarieManager->delete($_SESSION["id"]); // on modifie les informaions (personnelles) de la personne, on ajoute ces informations étudiantes et on supprime ces informations salariales et on récupère le numéro que renvoie l'ajout
        if ($retour!=0) // si le $resultat !=0 alors l'ajout c'est bien passé
        {?>
          <p><img src="image/valid.png" alt="Valide"/>&nbsp;<?php echo $personne->getPerNom() ?> a été modifié !</p>
        <?php
        } // sinon si le $resultat = 0 alors l'ajout c'est mal passé
        else { ?>
          <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;<?php echo $personne->getPerNom() ?> n'a pas été modifié !</p>
        <?php
        }
      }
    }
    else {
    	if (!empty($_POST["sal_telprof"]) && ! empty($_POST["fon_num"])) // si les variables sal_telprof et fon_num sont vides alors ...
    	{
        $salarieExistant = $salarieManager->getSalarie($_SESSION["id"]); //Récupération potentiel des informations salariales de l'utilisateur
        $salarie = new Salarie($_POST); // on créée un nouveau Salarie avec les informations modifiées ou crées
        if ($salarieExistant!=NULL)
        {
          $retour = $personneManager->update($personne, $_SESSION["id"]) + $salarieManager->update($salarie, $_SESSION["id"]); // on modifie les informaions (personnel et salariale) de la personne et on récupère le numéro que renvoie le tout
          if ($retour!=0) // si le $resultat !=0 alors l'ajout c'est bien passé
          {?>
            <p><img src="image/valid.png" alt="Valide"/>&nbsp;<?php echo $personne->getPerNom() ?> a été modifié !</p>
          <?php
          } // sinon si le $resultat = 0 alors l'ajout c'est mal passé
          else { ?>
            <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;<?php echo $personne->getPerNom() ?> n'a pas été modifié !</p>
          <?php
          }
        }
        else {
          $salarie->setPerNum($_SESSION["id"]); //On ajoute l'id de l'utilisateur au salarie créée
          $retour = $personneManager->update($personne, $_SESSION["id"]) + $salarieManager->add($salarie) + $etudiantManager->delete($_SESSION["id"]);// on modifie les informaions (personnelles) de la personne, on ajoute ces informations salariales et on supprime ces informations étudiantes et on récupère le numéro que renvoie le tout
          if ($retour!=0) // si le $resultat !=0 alors l'ajout c'est bien passé
          {?>
            <p><img src="image/valid.png" alt="Valide"/>&nbsp;<?php echo $personne->getPerNom() ?> a été modifié !</p>
          <?php
          } // sinon si le $resultat = 0 alors l'ajout c'est mal passé
          else { ?>
            <p><img src="image/erreur.png" alt="Erreur"/>&nbsp;<?php echo $personne->getPerNom() ?> n'a pas été modifié !</p>
          <?php
          }
        }
    	}
    	else {
    		if (empty($_POST["per_nom"]) || empty($_POST["per_prenom"]) || empty($_POST["per_tel"]) || empty($_POST["per_mail"]) || empty($_POST["per_login"]) || empty($_POST["per_pwd"]) || empty($_POST["categorie"]))
    		{
    		/* Si au moins l'une des variables est vide alors on affiche le formulaire pour renseigner ces dernières*/
        $personne = $personneManager->getPersonne($_SESSION["id"]); // On récupère l'id de la personne connectée à la session
    		?>
    			<form id="formulaire" action="index.php?page=3" method="post">
    				<table id="tableau" style="text-align:left;">
    					<tr>
    						<th><label for="per_nom" style="padding-right:38px;">Nom :</label>
    								<input type="text" name="per_nom" value="<?php echo $personne->getPerNom(); ?>"></th>
    						<th><label for="per_prenom" style="padding-left:25px; padding-right:38px;">Prénom :</label>
    								<input type="text" name="per_prenom" value="<?php echo $personne->getPerPrenom(); ?>"></<th>
    					</tr>
    					<tr>
    						<th><label for="per_tel">Téléphone :</label>
    								<input type="tel" name="per_tel" value="<?php echo $personne->getPerTel(); ?>"></th>
    						<th><label for="per_mail" style="padding-left:25px; padding-right:65px;">Mail :</label>
    								<input type="mail" name="per_mail" value="<?php echo $personne->getPerMail(); ?>"></<th>
    					</tr>
    					<tr>
    						<th><label for="per_login" style="padding-right:36px;">Login :</label>
    								<input type="text" name="per_login" value="<?php echo $personne->getPerLogin(); ?>"></th>
    						<th><label for="per_pwd" style="padding-left:25px;">Mot de passe :</label>
    								<input type="password" name="per_pwd" required></<th>
    					</tr>
    				</table>
    				<div>
    				<label for="categorie">Catégorie :</label>
    				<input type="radio" id="etudiant" name="categorie" value="Etudiant" checked style="border:none;">
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
          if ($personne->getPerLogin()!=$_SESSION["login"]){ // Si le login de la session est différent au login de la personne...
            $personneLogin = $personneManager->getPersonneLogin($personne->getPerLogin()); // on récupère le login de la personne
            if ($personneLogin != NULL) // Si le login est différent de null ...
            {
              echo "<p>Une personne a déjà ce login !</p>"; // On affiche un message d'erreur car le login est déjà pris
            }
          }
    			else // sinon ...
    			{
            $personne = new Personne($_POST); //On créée une nouvelle personne avec les informations modifiées
            $_POST["per_pwd"] = sha1(sha1($_POST["per_pwd"]).$salt); // On crypte le mot de passe et on le récupère

    				if ($_POST["categorie"] == "Etudiant") // si categorie == à étudiant alors ...
    				{
    					$divisions = $divisionManager->getAllDivision(); // on récupère toutes les divisions et on les met dans $divisions
    					$departements = $departementManager->getAllDepartement();
    					/* on récupère tous les départements et on les met dans $departements puis on affiche le formulaire
    					pour renseigner ces deux champs */
              $etudiant = $etudiantManager->getEtudiant($_SESSION["id"]); // On récupère l'id de la personne connectée à la session afin de récupérer ces informations étudiantes si elle est étudiante
    				?>
    					<form id="formulaire" action="index.php?page=3" method="post">
                <input type="hidden" name="per_nom" value="<?php echo $_POST["per_nom"]; ?>">
                <input type="hidden" name="per_prenom" value="<?php echo $_POST["per_prenom"]; ?>">
                <input type="hidden" name="per_tel" value="<?php echo $_POST["per_tel"]; ?>">
                <input type="hidden" name="per_mail" value="<?php echo $_POST["per_mail"]; ?>">
                <input type="hidden" name="per_login" value="<?php echo $_POST["per_login"]; ?>">
                <input type="hidden" name="per_pwd" value="<?php echo $_POST["per_pwd"]; ?>">
                <table id="tableau" style="text-align:left;">
                  <tr>
        						<th><label for="div_num" style="padding-right:36px;">Année :</label>
                    <select name="div_num">
        					    <?php foreach ($divisions as $division) { ?>
        					      <option value="<?php echo $division->getDivNum() ?>" <?php if($etudiant!=NULL){ if($etudiant->getDivNum()==$division->getDivNum()) {echo "selected";}} ?>><?php echo $division->getDivNom() ?></option>
        					    <?php
        					    }?>
        					  </select></th>
        						<th><label for="dep_num" style="padding-left:36px;">Département :</label>
        						<select name="dep_num">
        					    <?php foreach ($departements as $departement) { ?>
        					      <option value="<?php echo $departement->getDepNum() ?>" <?php if($etudiant!=NULL){ if($etudiant->getDepNum()==$departement->getDepNum()) {echo "selected";}} ?>><?php echo $departement->getDepNom() ?></option>
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
    					formulaire pour renseigner le salarie */
              $salarie = $salarieManager->getSalarie($_SESSION["id"]);// On récupère l'id de la personne connectée à la session afin de récupérer ces informations dalariées si elle est salariée
    				?>
    					<form id="formulaire" action="index.php?page=3" method="post">
                <input type="hidden" name="per_nom" value="<?php echo $_POST["per_nom"]; ?>">
                <input type="hidden" name="per_prenom" value="<?php echo $_POST["per_prenom"]; ?>">
                <input type="hidden" name="per_tel" value="<?php echo $_POST["per_tel"]; ?>">
                <input type="hidden" name="per_mail" value="<?php echo $_POST["per_mail"]; ?>">
                <input type="hidden" name="per_login" value="<?php echo $_POST["per_login"]; ?>">
                <input type="hidden" name="per_pwd" value="<?php echo $_POST["per_pwd"]; ?>">
                <table id="tableau" style="text-align:left;">
                  <tr>
        						<th><label for="sal_telprof" style="padding-right: 36px;">Téléphone professionnel :</label>
        						<input type="tel" name="sal_telprof" style="margin-left:0;" <?php if($salarie!=NULL){ echo $salarie->getSalTelProf();} ?>></th>
        						<th><label for="fon_num" style="padding-left:36px;">Département :</label>
        						<select name="fon_num">
        					    <?php foreach ($fonctions as $fonction) { ?>
        					      <option value="<?php echo $fonction->getFonNum() ?>" <?php if($salarie!=NULL){ if($salarie->getFonNum()==$fonction->getFonNum()) {echo "selected";}} ?>><?php echo $fonction->getFonLibelle() ?></option>
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
}

		 ?>
