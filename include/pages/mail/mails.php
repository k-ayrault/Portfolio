<div id="boite_mails">

    <?php
        if (!isset($_POST["mail"])) { $_POST["mail"] = "bienvenue";};
        
        if(!isset($_SESSION["heure_bienvenue"])) { $_SESSION["heure_bienvenue"] = date("H")."h".date("i"); }
        
        $suivant = "CV";
    ?>
    
    <h1>Mails</h1>

    <form action="index.php?page=mails" method="post">

        <?php if (isset($_SESSION["plusdinfo"])) {  
           if(!isset($_SESSION["heure_plusdinfo"])) { $_SESSION["heure_plusdinfo"] = date("H")."h".date("i"); }
        ?>
        <button class="mail" name="mail" id="info"  value="info" <?php if(isset($_POST["mail"]) && $_POST["mail"] == "info") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";}?>>

            <table style="width:100%;">
                
                <tr>
                    
                    <td>
                        <div style="width:100%;display:flex;">
                        
                            <p><a href="index.php?page=CV" style="text-decoration:none;color:white">Kévin AYRAULT</a></p>

                            <p style="text-align:right;"><?php echo $_SESSION["heure_plusdinfo"]; ?></p>
                        
                        </div>
                        
                        <h2 <?php if ($_POST["mail"] != "info") { echo "style=\"color:white;\"";}   ?>>Plus d'information !</h2>

                    </td>

                </tr>

            </table>

        </button>
        <?php } ?>
    
        <button class="mail" name="mail"  id="bienvenue" value="bienvenue" <?php if(isset($_POST["mail"]) && $_POST["mail"] == "bienvenue") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table style="width:100%;">
                
                <tr>
                    
                    <td>
                        <div style="width:100%;display:flex;">
                        
                            <p><a href="index.php?page=CV" style="text-decoration:none;color:white">Kévin AYRAULT</a></p>

                            <p style="text-align:right;"><?php echo $_SESSION["heure_bienvenue"]; ?></p>
                        
                        </div>
                        
                        <h2 <?php if ($_POST["mail"] != "bienvenue") { echo "style=\"color:white;\"";}   ?>>Bienvenue sur mon portfolio !</h2>

                    </td>

                </tr>

            </table>

        </button>

    </form>
    
</div>