<?php 
    if (isset($_POST["nom"])||isset($_POST["mail"])||isset($_POST["objet"])||isset($_POST["message"])) {

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = $_POST["mail"];
    $fromName = $_POST["nom"];
    $to = "kevin.ayrault87@gmail.com";
    $subject = $_POST["objet"];
    $message = "De : ".$fromName." \n Mail : ".$from."  \n Message : ".$_POST["message"];
    $headers = "De :" . $from;
    mail($to,$subject,$message, $headers);?>

    
    <div id="contact">
        <div style="height:50%;display:flex;align-items:center;justify-content:center;font-size:x-large;">
            <h1 style='color:white;'>Merci de votre message ! <br><br> Je vous répond d'ici peu !</h1>
        </div>
    </div>
<?php
    }
    else
    {
?>
<div id="contact">
    <div style="height:10%">
        <h1>Me contacter</h1>
    </div>
    <div id="bloc_contact">

        <div id="form_contact">

            <div id="titre_contact">

                <h2>Envoyez-moi un message :</h2>

            </div>

            <div id="corps_contact">

                <form action="index.php?page=contact" method="post" style='width:100%;'>
                    <label for="nom">Nom<a style="color:red">*</a> :</label>
                    <input type="text" name="nom" required>
<br/>
                    <label for="mail">Mail<a style="color:red">*</a> :</label>
                    <input type="email" name="mail" required>
<br/>     
                    <label for="objet">Objet<a style="color:red">*</a> :</label>
                    <input type="text" name="objet" required>
<br/>                    
                    <label for="message">Message<a style="color:red">*</a> :</label>
                    <textarea type="text" name="message" rows="5" required></textarea>
<br/>
                    <input type="submit" name="envoie" value="Envoyer">
                </form>

            </div>
        </div>
        
        <div id="info_contact">
            <div id="titre_contact">

                <h2>Contactez-moi : </h2>

            </div>

            <div id="corps_contact">

                <p>Tel : 06-45-36-32-02</p>
                <p>Mail : <a href="mailto:kevin.ayrault@etu.unilim.fr" style="color:white;">kevin.ayrault@etu.unilim.fr</a></p>
                <div id="reseaux">
                    <p><a href="https://www.linkedin.com/in/k%C3%A9vin-ayrault-1306071bb/" style="text-decoration:none;color:white;"><img src="image/reseau/linkedin.png" style="max-height:1em;"> Linkedin</a></p>
                    <p><a href="https://github.com/k-ayrault" style="text-decoration:none;color:white;"><img src="image/reseau/github.png" style="max-height:1em;"> Github</a></p>
                </div>
            
            </div>
        </div>
        
    </div>

</div>

<?php } ?>