<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">

<?php
		$title = "Bienvenue sur le site de covoiturage de l'IUT.";
    $salt = "48@!alsd";?>
		<title>
		<?php echo $title ?>
		</title>

<link rel="stylesheet" type="text/css" href="css/stylesheett.css" />
</head>
	<body>
	<div id="header">
		<div id="entete">
			<div class="colonne">
				<a href="index.php?page=0">
					<img src="image/logo.png" alt="Logo covoiturage IUT" title="Logo covoiturage IUT Limousin" />
				</a>
			</div>
			<div class="colonne">
				<p>Covoiturage de l'IUT,<br />Partagez plus que votre véhicule !!!</p>
        <div id="connect">
          <?php if (isset($_SESSION["login"])) { ?>
          <a><a style="font-weight: normal;">Utilisateur :</a> <a><?php echo $_SESSION["login"]; ?></a> &nbsp; &nbsp; &nbsp; <a href="index.php?page=12">Déconnexion</a></a>
          <?php
          }
          else { ?>
            <a href="index.php?page=11">Connexion</a>
          <?php } ?>
        </div>
			</div>
		</div>
	</div>
