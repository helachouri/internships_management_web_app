<!DOCTYPE html>
<html >
 	<head>
	    <meta charset="UTF-8">    
	    <link rel="stylesheet" href="/css/indexOffresStages.css">
	    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>

	<body>

		<section> 
		<?php
			if(!empty($listeOffres)) {
		?>
		<h1>Offres de stages <a class="mybtn" href="/admin/gestionEtudiant/listeEntreprises.html">Télécharger liste des entreprises</a></h1>  
		<div  class="tbl-header">
		<table cellpadding="0" cellspacing="0" border="0">
		  <thead>
		    <tr>
		      <th>Titre</th>
		      <th>Type</th>
		      <th>Date d'ajout</th>
		      <th>Dernière modification</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		</table>
		</div>

		<div  class="tbl-content">
			<table cellpadding="0" cellspacing="0" border="0">
			  <tbody>
			    <?php
				foreach ($listeOffres as $offre) {

					echo '<tr><td><a href="gestionOffres/offre-',$offre['id'], '.html"><strong class="title">', $offre['titre'], '<td>',ucfirst($offre['type']) ,'</td>', '</strong></a></td><td>le ', $offre['dateAjout'], '</td><td>', ($offre['dateAjout'] == $offre['dateModif'] ? '-' : 'le '.$offre['dateModif']), '</td><td><a href="gestionOffres/offre-update-', $offre['id'], '.html"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></span> <a href="gestionOffres/offre-delete-', $offre['id'], '.html"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Supprimer"></span></td></tr>', "\n";
				}?>
			  </tbody>
			</table>
		</div>
		<?php	
			}
			else {		
				echo "<h1> Pas d'offres diponibles pour le moment !</h1>";}
		?>	
		</section>

		<script>
			$(document).ready(function(){
	    	// Initialize Tooltip
	    		$('[data-toggle="tooltip"]').tooltip();});
		</script>
		    
	</body>
</html>
