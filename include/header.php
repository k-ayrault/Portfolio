
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<?php date_default_timezone_set('Europe/Paris');?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>AYRAULT Kévin</title>
<link rel="icon" href="image/photo_CV.jpg">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript"> 
    function refresh(){
        var t = 1000; // rafraîchissement en millisecondes
        setTimeout('showDate()',t)
    }
     
    function showDate() {
        var date = new Date()
        var h = date.getHours();
        var m = date.getMinutes();
        if( h < 10 ){ h = '0' + h; }
        if( m < 10 ){ m = '0' + m; }
        var time = h + ':' + m;
        document.getElementById('heure').innerHTML = time;
        refresh();
    }
</script>

<?php 
    $dateNaissance = "2001-09-26";
    $dateAujourdhui = date("Y-m-d");
    
    $diff = abs(strtotime($dateNaissance) - strtotime($dateAujourdhui));
    
    $age = floor($diff / (365*60*60*24));
?>
</head>
<?php 
    if (!empty($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "acceuil";
    }

    switch ($page) {
        case "mails" :
            $precedent = null; 
            $suivant = "CV";
            break;
        case "CV" :
            $precedent = "mails";
            $suivant = "carriere";
            break;
        case "deco" :
            $precedent = null;
            $suivant = null;
            break;
        case "carriere" :
            $precedent = "CV";
            $suivant = "projet";
            break;
        case "projet" : 
            $precedent = "carriere";
            $suivant = "evenement";
            break;
        case "evenement" :
            $precedent = "projet";
            $suivant = null;
            break;
        default :
            $precedent = null;
            $suivant = null;
            break;
    }
    if (isset($_SESSION["charge"])) { ?>
<header>
<body onload=showDate();>
    <div id="entete">

        <div id="fleches">
            <a href="javascript:history.go(-1)">
                <div id="fleche_gauche">

                    <img src="image/fleches/gauche.png">

                </div>
            </a>

            <div id="fleches_milieu">

                <?php if ($precedent != null) { ?>
                <a href="index.php?page=<?php echo $precedent; ?>"> <?php } ?>
                <div id="fleche_haut">

                    <img src="image/fleches/haut.png">

                </div>
                <?php if ($precedent != null) { ?>
                </a> <?php } ?>

                <?php if ($suivant != null) { ?>
                <a href="index.php?page=<?php echo $suivant; ?>"> <?php } ?>
                    <div id="fleche_bas">

                        <img src="image/fleches/bas.png">

                    </div>
                <?php if ($suivant != null) { ?>
                </a> <?php } ?>

            </div>
            
            <a href="javascript:history.go(+1)">
                <div id="fleche_droite">

                    <img src="image/fleches/droite.png">

                </div>
            </a>

        </div>

        <div id="recherche">

            <h1>Kévin AYRAULT</h1>

            <h2> - Etudiant</h2>

        </div>

        <div id="fin_barre">

                <div id="ak">
                    <ul> 
                        <li><a href="">AK</a>
                            <ul id="sous">
                                <li><a href="AYRAULT_CV.pdf" download>Télécharger le CV</a></li>
                                <li id='plus_info_header'><form action="index.php?page=mails" method="post">
                                        <input type="hidden" name="mail" value="info">
                                        <button name="plusdinfo">Plus d'information</button>
                                    </form>
                                </li>
                                <li style="border-radius:0 0 1.5em 1.5em;"><a href="index.php?page=deco">Quitter le portfolio</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


            <div id="date_heure">

                <p id="date"><?php echo date("d")." ".substr(date("F"),0,4)." ".date("Y");?><br/><span id='heure'></span></p>
                

            </div>

            <div id="continue">

                <form action="index.php?page=mails" method="post">
                    <input type="hidden" name="mail" value="info">
                    <button name="plusdinfo">Plus d'information</button>
                </form>

            </div>
        </div>
    </div>
</header>
    
<?php } ?>