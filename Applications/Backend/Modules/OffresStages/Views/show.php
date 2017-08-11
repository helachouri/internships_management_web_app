<!DOCTYPE html>
<html >
 	<head>
	    <meta charset="UTF-8">    
	    <link rel="stylesheet" href="css/showOffresStagesFrontend.css"> 
	    <style>
	    	* {
				-webkit-box-sizing: border-box;
			  	-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			html, body{
				background-color:#F2F2F2;
				margin:0;
				padding:0;
				height:100%;
				width:100%;
				color:#404040;
				position:relative;
			}

			.wrapper{
				width:1000px;
				margin:30px auto 0;
				background-color:#FFFFFF;
				-webkit-box-sizing: border-box;
			  	-moz-box-sizing: border-box;
				box-sizing: border-box;
				box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
			}
			@media (max-width: 600px) {
    			.wrapper {
        			width: 400px; 
    			}
			}

			header{
				text-align:left;
				font-family: 'Open Sans', sans-serif;
				padding:30px;
				background-color:#33b5e5;
				margin: 50px 0 0 0 !important;
				color: #fff;
			}

			.container{
				padding:10px 0 10px 10px;
				font-size: 15px !important;
				font:'Open Sans', sans-serif;
				padding: 20px;
				height: 100%;
			}
			.contenu {
				margin:20px 0 50px 0;
				text-align: left !important;
				width: 900px;
			}
			.col-md-3 {
				padding-left: 0px !important;
			}
			.navbar {
			    margin-bottom: 0;
			    font-family: Montserrat, sans-serif !important;
			    background-color: #2c3e50;
			    border: 0;
			    font-size: 12px !important;
			    letter-spacing: 3px;
			    opacity:0.9;
			}

			.navbar-brand {
			    font-size: 17px !important;
			}

			.navbar li a, .navbar .navbar-brand {
			    color: #fff !important;
			}

			.navbar-nav li a:hover {
			    color: #fff !important;
			    background-color: #3498db !important;
			}

			.navbar-nav li.active a {
			    color: #fff !important;
			    background-color:#3498db !important;
			}

			.navbar-default .navbar-toggle {
			    border-color: transparent;
			}

			/* Dropdown */
			.open .dropdown-toggle {
			    color: #fff ;
			    background-color: #3498db !important;
			}

			/* Dropdown links */
			.dropdown-menu li a {
			    color: #3498db !important;
			}

			/* On hover, the dropdown links will turn blue */
			.dropdown-menu li a:hover {
			    background-color: #3498db !important;
			}

			.content-wrap {
			    padding: 50px 120px;
			    font-family: 'Open Sans', sans-serif;
			}

			.alert {
			    margin-top: 50px;
			    text-align: center;
			}
			form {
			    margin-bottom: 100px;
			}
			form button {
			    border: 0 !important;
			    padding: 10px 15px;
			    background: #33b5e5 !important;
			    width: 100%;
			}
			footer {
			    background-color: #2c3e50;
			    color: #fff;
			    padding: 32px;
			    width: 100%;
			}
			footer .glyphicon{
			    color: #fff;
			}
	    </style>
	</head>
	<body>
		<div class="wrapper">
			<header id="top">
				<h2><?php echo strtoupper($offre['titre']).' '.$offre['type']; ?></h2>
				<div class='raw'>
					<p class="col-md-3"><small>Ajoutée <?php echo $offre['dateAjout']; ?></small></p>
					<?php if ($offre['dateAjout'] != $offre['dateModif']) { ?>
					<p class="col-md-3"><small>Modifiée le <?php echo $offre['dateModif']; ?></small></p>
					<?php } ?>
			</header>
			<div class="container">
				<p class="contenu"><?php echo nl2br($offre['contenu']); ?></p>
				<h4><u>Contact</u></h4>
				<p><strong><?php echo nl2br($offre['contact']); ?></strong></p>
			</div>
		</div>
	</body>