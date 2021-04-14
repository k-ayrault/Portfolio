<?php
session_unset(); // on supprime les variables de $_SESSION[]
header("Location: index.php?page=0");
?>
