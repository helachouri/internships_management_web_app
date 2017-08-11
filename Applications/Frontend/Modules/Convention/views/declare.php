<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <!-- Load jQuery JS -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    </head>

    <body>
    <?php if(!empty($_SESSION['id'])){ ?>
        <div class="wrapper">
            <header id="top">
                <h2>Déclaration de stage</h2>
            </header>
            <div class="container">
                <!-- multistep form -->
                <form id="msform" action="" method="post">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Organisme d'accueil</li>
                        <li>Parrain du stage</li>
                        <li>Eencadrant externe</li>
                        <li>Informations sur le stage</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Informations concernant l'organisme d'accueil</h2>
                        <input type="text" name="entreprise" placeholder="Entreprise (obligatoire)" />
                        <input type="text" name="adresse" placeholder="Adresse (obligatoire)" />
                        <input type="text" name="ville" placeholder="Ville (obligatoire)" />
                        <input type="text" name="pays" placeholder="Pays (obligatoire)" />
                        <input type="text" name="fax" placeholder="Fax" />
                        <input type="button" name="next" class="next action-button" value="Suivant" />
                    </fieldset>    
                    
                    <fieldset>
                        <h2 class="fs-title">Informations concernant le parrain du stage</h2>
                        <h3 class="fs-subtitle">La personne qui va signer la convention (RH, Direction, ...)</h3>
                        <input type="text" name="nom_par" placeholder="Nom du parrain (obligatoire)" />
                        <input type="text" name="prenom_par" placeholder="Prénom du parrain (obligatoire)" />
                        <input type="text" name="fonction_par" placeholder="Fonction du parrain" />
                        <input type="text" name="tel_par" placeholder="Téléphone du parrain" />
                        <input type="text" name="mail_par" placeholder="Mail du parrain" />
                        <input type="button" name="previous" class="previous action-button" value="Précedent" />
                        <input type="button" name="next" class="next action-button" value="Suivant" />
                    </fieldset>
                 
                    <fieldset>
                        <h2 class="fs-title">Informations concernant l'encadrant externe</h2>
                        <h3 class="fs-subtitle">La personne qui va encadrer votre stage en entreprise</h3>
                        <input type="text" name="nom_enc_ext" placeholder="Nom de l'encadrant externe" />
                        <input type="text" name="prenom_enc_ext" placeholder="Prénom de l'encadrant externe" />
                        <input type="text" name="fonction_enc_ext" placeholder="Fonction de l'encadrant externe" />
                        <input type="text" name="tel_enc_ext" placeholder="Téléphone de l'encadrant externe" />
                        <input type="text" name="mail_enc_ext" placeholder="Mail de l'encadrant externe" />
                        <input type="button" name="previous" class="previous action-button" value="Précedent" />
                        <input type="button" name="next" class="next action-button" value="Suivant" />
                    </fieldset>   
                    
                    <fieldset>
                        <h2 class="fs-title">Informations sur le stage</h2>
                        <textarea name="intitule" placeholder="Intitulé du stage (obligatoire)"></textarea>
                       
                        <input name="date_debut" placeholder="Date début stage (obligatoire)" type="date" id="from" />
                        <input name="date_debut" placeholder="Date fin stage (obligatoire)" type="date" id="to" />
                        <input type="button" name="previous" class="previous action-button" value="Précedent" /> 
                        <input type="submit" name="submit" class="btn btn-primary submit action-button" value="Valider" />   
                    </fieldset>
                </form>
            </div>
        </div>
    <?php }?>
        <script src="/js/index.js"></script>
         <script>
            $(document).ready(function(){
                // Initialize Tooltip
                $('[data-toggle="tooltip"]').tooltip();});
        </script>
    </body>
</html>
