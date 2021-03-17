<?php
// Start the session
session_start();

if(!empty($_GET["charge"])) {
    $_SESSION["charge"] = true;
}
 
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
?>

</body>
</html>
