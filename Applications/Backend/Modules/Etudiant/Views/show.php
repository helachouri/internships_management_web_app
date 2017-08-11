<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<style>
		.well{
			align-items: center;
			width: 100%;
			margin-left: 0px;
		}
		h2 {
			margin: 40px 120px;
		}

	</style>
</head>
<body>
	<h2>Profil Étudiant</h2>

	<div class='container'><div class="well form-group"><label class="col-md-6">Nom </label> <div class="col-md-6"><?php echo $etudiant['nom']?></div><br /></div></div>
	<div class='container'><div class="well form-group"><label class="col-md-6">Prénom </label> <div class="col-md-6"><?php echo $etudiant['prenom']?></div><br /></div></div>

	<form action="" method="post">
					<div class='container'><div class="well form-group"><label class="col-md-6">Filière</label>
					<select class="col-md-6" name="filiere">
					<?php
						if($etudiant['ine'] == '1'){ ?>
							<option value="2I" <?php if ($etudiant['filiere']=="2I"): echo "selected"; ?>
								
							<?php endif ?>>2I</option>
							<option value="IT" <?php if ($etudiant['filiere']=="IT"): echo "selected"; ?>
								
							<?php endif ?>>IT</option>
							<option value="IMTI" <?php if ($etudiant['filiere']=="IMTI"): echo "selected"; ?>
								
							<?php endif ?>>IMTI</option>
					<?php }
						elseif ($etudiant['ine'] == '2' || $etudiant['ine'] == '3') { ?>
							<option value="CS2E" <?php if ($etudiant['filiere']=="CS2E"): echo "selected"; ?>
								
							<?php endif ?>>CS2E</option>
							<option value="IRM" <?php if ($etudiant['filiere']=="IRM"): echo "selected"; ?>
								
							<?php endif ?>>IRM</option>
							<option value="ISMR" <?php if ($etudiant['filiere']=="ISMR"): echo "selected"; ?>
								
							<?php endif ?>>ISMR</option>
							<option value="RSS" <?php if ($etudiant['filiere']=="RSS"): echo "selected"; ?>
								
							<?php endif ?>>RSS</option>
							<option value="WMD" <?php if ($etudiant['filiere']=="WMD"): echo "selected"; ?>
								
							<?php endif ?>>WMD</option>
					<?php	if($etudiant['ine'] == '2') { ?>
								<option value="IMTI" <?php if ($etudiant['filiere']=="IMTI"): echo "selected"; ?>
								
							<?php endif ?>>IMTI</option>
					<?php	} else { ?>
								<option value="IA" <?php if ($etudiant['filiere']=="IA"): echo "selected"; ?>
								
							<?php endif ?>>IA</option>
								<option value="MIL" <?php if ($etudiant['filiere']=="MIL"): echo "selected"; ?>
								
							<?php endif ?>>MIL</option>
								<option value="SIM" <?php if ($etudiant['filiere']=="SIM"): echo "selected"; ?>
								
							<?php endif ?>>SIM</option>
					<?php	}
						} ?>
					</select><br /></div></div>
			
					
					<div class='container'><div class="well row"><span class="col-md-6"></span><span class="col-md-6 text-danger"><?php if (isset($erreurs) && in_array(\Library\Entities\Etudiant::EMAIL_INVALIDE, $erreurs)) echo 'L\'adresse mail est invalide.<br /><br />'; ?></span><label class='col-md-6'>Adresse mail</label>
					<input class='col-md-6' type="text" name="email" value="<?php if (isset($etudiant)) echo $etudiant['email']; ?>" /></div></div><br />
			
					
					<div class='container'><div class="well row"><span class="col-md-6"></span><span class="col-md-6 text-danger"><?php if (isset($erreurs) && in_array(\Library\Entities\Etudiant::NUM_TEL_INVALIDE, $erreurs)) echo 'Le numéro de téléphone est invalide.<br /><br />'; ?></span><label class='col-md-6'>Numéro de téléphone</label>
					<input class='col-md-6' type="text" name="num_tel" value="<?php if (isset($etudiant)) echo $etudiant['num_tel']; ?>" /></div></div><br />
						<input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>" />
						<div class="container text-center"><button class="btn btn-primary" />Modifier</div>
	</form>
</body>
