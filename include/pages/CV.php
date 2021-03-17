<?php 
            $precedent = "mails";
            $suivant = "carriere";?>

<div id="CV">

    <div id="info_personnel">

        <div id="image">

            <div id="photo_cv">

                <img src="image/photo_CV.jpg" alt="Kévin Ayrault">

            </div>

            <div id="photo_nationnalite">

                <img src="image/drapeau_fr.png" alt="Kévin Ayrault">

            </div>

        </div>

        <div id="nom">

            <h1>Kévin AYRAULT</h1>

            <p>(Développeur web)</p>

        </div>

        <div id="age">

            <div id="age_numeric">

                <h2>Age</h2>
                <a><?php echo $age; ?></a>

            </div>

            <div id="date_naissance">

                <h2>Né le</h2>
                <a>26/09/2001</a>

            </div>

        </div>

        <div id="contrat">

            <h2>Libre de tout contrat</h2>

        </div>

        <div id="qualification">

          <h2>Qualifications</h2>

          <a>Bac S SI</a>
          </br>
          </br>
          <a>Etudie en vue d'obtenir un DUT Informatique</a>

        </div>
        <div id="reseau">
            
            <div id="reseaux">
                <p><a href="https://github.com/k-ayrault" style="text-decoration:none;color:white;"><img src="image/reseau/github.png" style="max-height:1em;"> Github</a></p>
                <p><a href="https://www.linkedin.com/in/k%C3%A9vin-ayrault-1306071bb/" style="text-decoration:none;color:white;"><img src="image/reseau/linkedin.png" style="max-height:1em;"> Linkedin</a></p>
            </div>
        </div>

    </div>
    <div id="detail">
        <div id="colonne2">

            <div id="competence">
                
                <h1>Compétences</h1>

                <table>
                    <tr>
                        <td>PHP</td>
                        <td>
                            <progress max="5" value="4"></progress>
                        </td>
                    </tr> 
                    <tr>
                        <td>JAVA</td>
                        <td>
                            <progress max="5" value="3"></progress>
                        </td>
                    </tr> 
                    <tr>
                        <td>C++</td>
                        <td>
                            <progress max="5" value="2.5"></progress>
                        </td>
                    </tr> 
                    <tr>
                        <td>HTML5/CSS3</td>
                        <td>
                            <progress max="5" value="3.5"></progress>
                        </td>
                    </tr> 
                    <tr>
                        <td>SQL/MySQL</td>
                        <td>
                            <progress max="5" value="3"></progress>
                        </td>
                    </tr> 

                </table>

            </div>

            <div id="langues">

                <h1>Langues parlées</h1>

                <a>Français (Usage courant)</a>
                </br>
                <a>Anglais (Bonne maitrise)</a>
                </br>
                <a>Espagnol (Connaissance élémentaire)</a>

            </div>

        </div>

        <div id="colonne3">

            <div id="projets">

                <a href="index.php?page=projet">
                    <h1>Mes projets ></h1>
                </a>


                <table>
                    <tr>
                        <th>2020 -<a style="color:#d2a646"> En cours</a></th>
                        <td><img src="image/projets/legrand.png"> Application de suivi qualité</td>
                    </tr>
                    <tr>
                        <th>2020 -<a style="color:#d2a646"> En cours</a></th>
                        <td><img src="image/projets/om.jpg"> Site relayant certaines informations sur l'Olympique de Marseille</td>
                    </tr>
                    <tr>
                        <th>2020 -<a style="color:#d2a646"> Fini</a></th>
                        <td><img src="image/projets/bio.jpg"> Interface afin de gérer un magasin BIO</td>
                    </tr>
                    <tr>
                        <th>2020 -<a style="color:#d2a646"> Fini</a></th>
                        <td><img src="image/projets/citron.png"> One page pour des regroupements autour de la citronnade</td>
                    </tr>
                </table>
            </div>

            <div id="evenement">

                <a href="index.php?page=evenement">
                    <h1>Evènements ></h1>
                </a>


                <table>
                    <tr>
                        <th>2019</th>
                        <td>Certificat individuel de participation à la journée défense et citoyenneté</td>
                    </tr>
                    <tr>
                        <th style="border-bottom : 1px solid grey;"></th>
                        <td style="border-bottom : 1px solid grey;">Bac S SI</td>
                    </tr>
                    <tr>
                        <th style="border-bottom : 1px solid grey;">2017</th>
                        <td style="border-bottom : 1px solid grey;">1er Prix Départemental ex aequo du concours 2017 "Défense et illustration de la langue française"</td>
                    </tr>
                    <tr>
                        <th>2016</th>
                        <td>ASSR 2</td>
                    </tr>
                    <tr>
                        <th style="border-bottom : 1px solid grey;"></th>
                        <td style="border-bottom : 1px solid grey;">Diplôme National du Brevet</td>
                    </tr>
                    <tr>
                        <th>2014</th>
                        <td>ASSR 1</td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="colonne4">

            <div id="bio_cv">

                <h1>Biographie</h1>

                <p>&emsp;&emsp;Je m'appelle Kévin Ayrault, je suis né le 26 janvier 2001 à Saint-Junien en France. <br> <br>
                &emsp;&emsp;Je rentre au collège Pierre Robert au Dorat en 2012 où j'ai pu obtenir mon ASSR 1 et 2 ainsi que mon diplôme National du Brevet.<br><br>
                &emsp;&emsp;Je rentre ensuite au lycée Jean Giraudoux à Bellac en 2016 où j'ai pu participé et arrivé 1er ex-aequo au concours 2017 "Défense 
                Illustration de la langue française". J'ai aussi obtenu mon Bac Scientifique Science de l'Ingénieur spécialité Mathématiques. <br><br>
                &emsp;&emsp;Je rentre enfin en DUT Informatique à l'Université de Limoges où je suis actuellement.</p>
            </div>

            
            <div id="carriere">
                <a href="index.php?page=carriere">
                    <h1>Carrière ></h1>
                </a>

                <table>
                    <tr>
                        <td>2019-</td>
                        <td><img src="image/Entreprise/univ_limoge.png"> Université de Limoges</td>
                        <td id="poste">Etudiant</td>
                    </tr>
                    <tr>
                        <td>2017-2019</td>
                        <td><img src="image/Entreprise/par_defaut.png"> Lycée Jean Giraudoux</td>
                        <td id="poste">Etudiant</td>
                    </tr>
                </table>

            </div>
            

        </div>
    </div>
</div>

</body>