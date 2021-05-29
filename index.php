<?php
// Start the session
session_start();

if(!empty($_GET["charge"])) {
    $_SESSION["charge"] = true;
}

if(!empty($_GET["choix"])) {
    if ($_GET["choix"] == "choix") {
        unset($_SESSION["choix"]);
    }
    else {
        $_SESSION["choix"] = $_GET['choix'];
    }
}

if (isset($_SESSION["choix"]) && $_SESSION["choix"] == "basique") {
    
    require_once("index_basique.php");
}
else {
    if (isset($_SESSION["choix"]) && $_SESSION["choix"] == "FM") {

        if (isset($_SESSION["charge"])) {
            require_once("include/header.php");
            require_once("include/config/config.php");
            require_once("include/config/autoload.php"); ?>
            <div id="corps">
            <?php
            require_once("include/menu.php");
            require_once("include/menu_horizontal.php");
            require_once("include/page.php"); ?>
            </div>
        <?php
        }
        else
        {
            require_once("include/acceuil.php");
        }
    }
    else {
        include_once("choix_style.php");
    }
}

?>

</body>
</html>
