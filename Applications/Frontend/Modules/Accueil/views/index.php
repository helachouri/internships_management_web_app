<!DOCTYPE html>
<html lang="fr">
<head>
  <title><?php if (!isset($title)) { ?> Platforme de gestion des stages <?php } else { echo $title; } ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/accueil.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  
</head>

<body>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<!-- Container (Home Section) -->
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-caption">
        <blockquote>
        	<h3>Nous accompagnons vos premiers pas vers l’entreprise</h3>
        	<p>L'équipe D.A.R.E</p>
        </blockquote>
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div id='home' class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/1.jpg" alt="INPT">
    </div>

    <div class="item">
      <img src="images/2.jpg" alt="INPT">
    </div>

    <div class="item">
      <img src="images/3.jpg" alt="INPT">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Container (Contacts Section) -->
<div id='contact' class="bg-1">
  <div class="container">
  	<div class="row">
  		<div class="col-sm-8 text-left">
  			<h3>RENSEIGNER VOS CONTACTS</h3>
  			<p>Renseigner vos contacts pour recevoir des offres de stages</p>
  			<a class='btn' href='/infos-etudiant.html'>Renseigner</a>
    	</div>
    	<div class="col-sm-4">
    		<span  class="glyphicon glyphicon-info-sign logo"></span>
    	</div>
    </div>
  </div>
</div>

<!-- Container (Offers Section) -->
<div id='offers' class="bg-2">
  <div class="container">
  	<div class="row">
    	<div class="col-sm-4">
    		<span  class="glyphicon glyphicon-bullhorn logo"></span>
    	</div>
    	<div class="col-sm-8 text-right">
  			<h3>OFFRES DE STAGES</h3>
  			<p>Consulter les offres de stages d'été</p>
  			<a class='btn btn-bis' href='/offres/'>Consulter</a>
    	</div>
    </div>
  </div>
</div>

<!-- Container (Documents Section) -->
<div id='documents' class="bg-1">
  <div class="container">
  	<div class="row">
  		<div class="col-sm-6 text-center">
  			<h4>CONVENTION</h4>
  			<a href="#demo" data-toggle="collapse">
  				<span  class="glyphicon glyphicon-print logo"></span>
  			</a>
	    	<div id="demo" class="collapse">
		      	<p>Déclarer votre stage et télécharger<br>votre convention <a href="declarer-stage/" data-toggle="tooltip" title="Télécharger votre convention">ici .</a></p>
	    	</div>
    	</div>
    	<div class="col-sm-6 text-center">
    		<h4>LETTRE DE RECOMMANDATION</h4>
    		<a href="#demo2" data-toggle="collapse">
    			<span  class="glyphicon glyphicon-envelope logo"></span>
    		</a>
    		<div id="demo2" class="collapse">
		      	<p>Télécharger votre lettre de recommandation <a href="generer-LR.html" data-toggle="tooltip" title="Télécharger votre lettre de recommandation">ici .</a></p>
	    	</div>
    	</div>
    </div>
  </div>
</div>

</body>
</html>
