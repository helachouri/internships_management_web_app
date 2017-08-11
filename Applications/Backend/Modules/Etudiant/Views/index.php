<!DOCTYPE html>
<html>
 	<head>
	    <meta charset="UTF-8">    
	    <link rel="stylesheet" href="/css/indexEtudiantBackend.css"> 
	    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	    <script src="js/prefixfree.min.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<header id="top">
				<h1>Liste des étudiants</h1>
			</header>
			<div class="container">
				<div class='row text-center'>
					<div class='col-md-6'>
						<h2>INE 1 <a class="mybtn" href="/admin/gestionEtudiant/listeEtudiants1.html">Télécharger</a><a class="mybtn" href="/admin/gestionEtudiant/mailing.html">Envoyer un mail</a></h2>
						<section class="list-wrap">
							<ul id="list">
								<?php
									foreach ($ine1 as $etudiant) {
									echo '<li class="in"><a href="/admin/gestionEtudiant/etudiant-'.$etudiant['id'].'.html" class="list-item-link">'.$etudiant['nom'].' '.$etudiant['prenom'].'</a></li>';
								}?>		   
							</ul>
						</section>
					</div>	
					<div class='col-md-6'>
						<h2>INE 2 <a class="mybtn" href="/admin/gestionEtudiant/listeEtudiants2.html">Télécharger</a><a class="mybtn" href="/admin/gestionEtudiant/mailing2.html">Envoyer un mail</a></h2>
						<section class="list-wrap">
							<ul id="list">
								<?php
									foreach ($ine2 as $etudiant) {
									echo '<li class="in"><a href="/admin/gestionEtudiant/etudiant-'.$etudiant['id'].'.html" class="list-item-link">'.$etudiant['nom'].' '.$etudiant['prenom'].'</a></li>';
								}?>			   
							</ul>
						</section>
					</div>	
				</div>
			</div>
		</div>

		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
        <script src="js/indexEtudiantBackend.js"></script>
	</body>
</html>
