<div id="texte">
    <?php
    if (!empty($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "acceuil";
    }

    switch ($page) {
        case "mails" : 
            if(isset($_POST["plusdinfo"])) {
                $_SESSION["plusdinfo"] = true;
            }
            include_once('pages/mail/mails.php');
            if(isset($_POST["mail"])) {
                include_once('pages/mail/'.$_POST["mail"].'.php');
            }
            break;
        case "CV" :
            $precedent = "mails";
            $suivant = "carriere";
            include_once('pages/CV.php');
            break;
        case "deco" :
            include_once('deco.php');
            break;
        case "contact" :
            include_once('pages/contact.php');
            break;
        case "carriere" :
            include_once('pages/carriere.php');
            break;
        case "projet" : 
            include_once('pages/projets/projet_form.php');
            if(isset($_POST["projet"])) {
                include_once('pages/projets/'.$_POST["projet"].'.php');
            }
            break;
        case "evenement" :
            include_once('pages/evenement.php');
            break;
        default :
            if(isset($_POST["plusdinfo"])) {
                $_SESSION["plusdinfo"] = true;
            }
            include_once('pages/mail/mails.php');
            if(isset($_POST["mail"])) {
                include_once('pages/mail/'.$_POST["mail"].'.php');
            }
            break;
    }
    ?>
</div>
