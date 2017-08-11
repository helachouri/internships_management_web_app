<!DOCTYPE html>
<html lang="fr">

  	<head>
  		<title><?php if (!isset($title)) { ?> Platforme de gestion des stages <?php } else { echo $title; } ?></title>
    	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?php if($title!='Connexion' & $title!='Error 404' & $title!='Error'){ echo '<link rel="stylesheet" type="text/css" href="/css/layoutFrontend.css">';}?>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  	</head>

  	<body>
        <?php
        if($title!='Connexion | Platforme de gestion des stages' & $title!='Error 404' & $title!='Error'){ ?>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Platforme de gestion des stages</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/accueil.html">ACCUEIL</a></li>
                            <li><a href="/infos-etudiant.html">VOS CONTACTS</a></li>
                            <li><a href="/offres/">OFFRES</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="menu1" data-toggle="dropdown" href="#">DOCUMENTS
                                    <span class="caret"></span>
                                </a>
                                <ul role="menu" class="dropdown-menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" href="/declarer-stage/">Convention</a></li>
                                    <li role="presentation"><a role="menuitem" href="/generer-LR.html">Lettre de recommandation</a></li>
                                </ul>
                            </li>
                            <li><a href="/deconnexion.html">DÉCONNEXION</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
        } ?>

  		
        <div class="content-wrap">
            <?php echo $content; ?>
        </div>
        <?php if ($user->hasFlash()){ ?>
            <div class="alert alert-info text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $user->getFlash(); ?>
            </div> <?php } ?>
        <?php
        if($title!='Connexion | Platforme de gestion des stages' & $title!='Error 404' & $title!='Error'){ ?>
            <footer class="text-center">
                <a class="up-arrow" href="#top" data-toggle="tooltip" title="TO TOP">
                    <span class="glyphicon glyphicon-chevron-up"></span>
                </a><br><br>
                <p>Institut National des Postes et Télécommunications &copy; <?php echo date("Y");?></p>
            </footer>
        <?php
        } ?>

        <script>
            $(document).ready(function(){
                // Initialize Tooltip
                $('[data-toggle="tooltip"]').tooltip();});
        </script>
  	</body>

</html>
