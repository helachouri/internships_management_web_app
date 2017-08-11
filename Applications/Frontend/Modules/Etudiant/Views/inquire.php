<?php
	if(empty($_SESSION['email'])) { ?>
	<div class="container" id="top"><h3 class='alert alert-info text-center'> Veuillez renseigner vos contact </h3></div>
	<div class='container'><div class="well form-group"><label class="col-md-6">Nom </label> <div class="col-md-6"><?php echo $_SESSION['nom']?></div><br /></div></div>
	<div class='container'><div class="well form-group"><label class="col-md-6">Prénom </label> <div class="col-md-6"><?php echo $_SESSION['prenom']?></div><br /></div></div>

	<form action="" method="post">

				<div class='container'><div class="well form-group"><label class="col-md-6">Filière</label>
				<select class="col-md-6" name="filiere">
				<?php
					if($_SESSION['ine'] == '1'){ ?>
						<option value="IT">2I</option>
						<option value="2I">IT</option>
						<option value="IMTI">IMTI</option>
				<?php }
					elseif ($_SESSION['ine'] == '2' || $_SESSION['ine'] == '3') { ?>
						<option value="CESE">CESE</option>
						<option value="IRM">IRM</option>
						<option value="ISMR">ISMR</option>
						<option value="RSS">RSS</option>
						<option value="WMD">WMD</option>
				<?php	if($_SESSION['ine'] == '2') { ?>
							<option value="IMTI">IMTI</option>
				<?php	} else { ?>
							<option value="IA">IA</option>
							<option value="MIL">MIL</option>
							<option value="SIM">SIM</option>
				<?php	}
					} ?>
				</select><br /></div></div>

			<div class='container'><div class="well form-group"><?php if (isset($erreurs) && in_array(\Library\Entities\Etudiant::EMAIL_INVALIDE, $erreurs)) {echo '<div class="text-danger">L\'adresse mail est invalide.</div><br />';} ?>
				<label class="col-md-6">Adresse mail</label>
				<input class="col-md-6" type="text" name="email" placeholder="Entrer votre Email"><br /></div></div>

			<div class='container'><div class="well form-group"><?php if (isset($erreurs) && in_array(\Library\Entities\Etudiant::NUM_TEL_INVALIDE, $erreurs)) echo '<div class="text-danger">Le numéro de téléphone est invalide.</div><br />'; ?>
				<label class="col-md-6">Numéro de téléphone</label>
				<input class="col-md-6" type="text" name="num_tel" placeholder="Entrer votre Numéro de Tel."><br /></div></div>

				<div class="container text-center"><button class="btn btn-primary">Valider</button></div>

	</form>

<?php } else { ?>
	<div class='container' id="top"><h4 class='alert alert-info text-center'> Vos informations sont déjà enregistrées. Pour toute modification veuillez contacter le service des stages. </h4></div>
	<div class='container'><div class="well"><label class="col-md-6">Nom </label> <div class="col-md-6"><?php echo $_SESSION['nom']?></div><br /></div></div>
	<div class='container'><div class="well"><label class="col-md-6">Prénom </label> <div class="col-md-6"><?php echo $_SESSION['prenom']?></div><br /></div></div>
	<div class='container'><div class="well"><label class="col-md-6">Filière </label> <div class="col-md-6"><?php echo $_SESSION['filiere']?></div><br /></div></div>
	<div class='container'><div class="well"><label class="col-md-6">Adresse mail </label> <div class="col-md-6"><?php echo $_SESSION['email']?></div><br /></div></div>
	<div class='container'><div class="well"><label class="col-md-6">Numéro de téléphone </label> <div class="col-md-6"><?php echo $_SESSION['num_tel']?></div><br /></div></div>
<?php } ?>
