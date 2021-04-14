<div id="projet_form">
    
    <h1>Projets</h1>

    <form action="index.php?page=projet" method="get">
        
        <input type="hidden" name="page" value="projet">

        <button class="projet" name="projet" id='cr_proj' value="cr_photo" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "cr_photo") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/cr_photo.jpg"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Vitrine numérique d'un photographe -<a style="color:#d2a646;"> 2021 (En cours)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/perso.png" style="max-height:1em;"> Personnel</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" name="projet" id='vip_proj' value="vip" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "vip") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/vip.png"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Serveur WEB pour informer les lecteurs sur certains VIP -<a style="color:#d2a646;"> 2021 (Fini)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" name="projet" id='vn_proj' value="portfolio" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "portfolio") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/photo_CV.jpg"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Vitrine numérique personnelle -<a style="color:#d2a646;"> 2020 (Fini)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" name="projet" id='lg_proj' value="legrand" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "legrand") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/legrand.png"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Application de suivi qualité -<a style="color:#d2a646;"> 2020/2021 (Fini)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>
        
        <button class="projet" name="projet" id='covoit_proj' value="covoit" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "covoit") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/covoit.png"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Site de covoiturage -<a style="color:#d2a646;"> 2020 (Fini)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" id='om_proj' name="projet"  value="om" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "om") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/om.jpg"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Site relayant certaines informations sur l'Olympique de Marseille -<a style="color:#d2a646;"> 2020 (En cours)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/perso.png" style="max-height:1em;"> Personnel</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" id='bio_proj' name="projet"  value="bio" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "bio") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>
                
                <tr>
                    
                    <td><img src="image/projets/bio.jpg"></td>
                    
                    <td class='info_projet_form'>

                        <div>
                        
                            <h3>Interface afin de gérer un magasin BIO -<a style="color:#d2a646;"> 2020 (Fini)</a></h3>
                        
                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>
                        
                        </div>

                    </td>

                </tr>

            </table>

        </button>

        <button class="projet" id='citron_proj' name="projet"  value="citron" <?php if(isset($_GET["projet"]) && $_GET["projet"] == "citron") { echo "style=\"background-color:#090b0f; border-left:5px solid #d2a646\"";} ?>>

            <table>

                <tr>

                    <td><img src="image/projets/citron.png"></td>

                    <td class='info_projet_form'>

                        <div>

                            <h3>One page pour des regroupements autour de la citronnade -<a style="color:#d2a646;"> 2020 (Fini)</h3>

                        </div>

                        <div>

                            <p><img src="image/Entreprise/univ_limoge.png" style="max-height:1em;"> Université de Limoges</p>

                        </div>

                    </td>

                </tr>

            </table>

        </button>

    </form>

</div>