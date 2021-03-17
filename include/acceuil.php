
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<?php date_default_timezone_set('Europe/Paris');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>AYRAULT Kévin</title>
<link rel="icon" href="image/photo_CV.jpg">
<link rel="stylesheet" type="text/css" href="css/css.css" />

<?php 
    $dateNaissance = "2001-09-26";
    $dateAujourdhui = date("Y-m-d");
    
    $diff = abs(strtotime($dateNaissance) - strtotime($dateAujourdhui));
    
    $age = floor($diff / (365*60*60*24));
?>

</head>
<body>
    <div id="chargement_portfolio" class="chargement_portfolio">
        <div id="popup_chargement" class="popup_chargement">
            <div id="nom_chargement">
                <h2>Chargement du portfolio</h2>
            </div>
            <div id="barre_chargement">
                <div id="progress_charg">
                </div>
            </div>

            <div id="message_chargement">
                <p>Bienvenue sur mon portfolio !! </p>
            </div>
        </div>
    </div>
    
    <div id="acceuil">
        <div id="menu_charger" style='position:relative;'>
            <div id="titre_charger">
                <h1>Bienvenue sur mon portfolio ! </h1>
                <h2 style='color:white;'>Kévin AYRAULT !</h2>
            </div>
            <div id="boutton_charger">
                    <button name="charge" onclick="move();">Charger le portfolio</button> 
            </div>
            <div id="reseau" style='position:absolute;bottom:0'>
            
                <div id="reseaux" >
                    <p><a href="https://github.com/k-ayrault" style="text-decoration:none;color:white;"><img src="image/reseau/github.png" style="max-height:1em;"> Github</a></p>
                    <p><a href="https://www.linkedin.com/in/k%C3%A9vin-ayrault-1306071bb/" style="text-decoration:none;color:white;"><img src="image/reseau/linkedin.png" style="max-height:1em;"> Linkedin</a></p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var i = 0;

        function move() {
            if (i == 0) {
                i = 1;         
                let chargementDiv = document.getElementById("chargement_portfolio");
                chargementDiv.style.display = "block";
                var elem = document.getElementById("progress_charg");
                var width = 1;
                var id = setInterval(frame, 30);
                function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    i = 0;
                    window.location.href = "index.php?page=mails&charge=true";
                } else {
                    width++;
                    elem.style.width = width + "%";
                }
                }
            }
        }
    
    </script>
</body>