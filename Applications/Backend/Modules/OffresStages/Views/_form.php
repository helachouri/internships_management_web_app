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
<body>
	<form action="" method="post">
		
			
					<?php if (isset($erreurs) && in_array(\Library\Entities\OffresStages::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
					<div class='container'><div class="well row"><label class='col-md-6'>Titre</label>
					<input class='col-md-6' type="text" name="titre" value="<?php if (isset($offre)) echo $offre['titre']; ?>" /></div></div><br />
			
					<div class='container'><div class="well row"><label class='col-md-6'>Type</label>
					<select class='col-md-6' name="type">
						<option value="ouvrier" <?php if (isset($offre) && $offre['type']==\Library\Entities\OffresStages::TYPE_OUVRIER) echo "selected"; ?>>Ouvrier</option>
						<option value="technique" <?php if (isset($offre) && $offre['type']==\Library\Entities\OffresStages::TYPE_TECHNIQUE) echo "selected"; ?>>Technique</option>
					</select></div></div><br />
			
					<?php if (isset($erreurs) && in_array(\Library\Entities\OffresStages::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
					<div class='container'><div class="well row"><label class='col-md-6'>Contenu</label>
					<textarea class='col-md-6' rows="6" cols="60" name="contenu"><?php if (isset($offre)) echo $offre['contenu']; ?></textarea></div></div><br />

					<?php if (isset($erreurs) && in_array(\Library\Entities\OffresStages::CONTACT_INVALIDE, $erreurs)) echo 'Le contact est invalide.<br />'; ?>
					<div class='container'><div class="well row"><label class='col-md-6'>Contact</label>
					<input class='col-md-6' type='text' name="contact"><?php if (isset($offre)) echo $offre['contact']; ?></input></div></div><br />

					<?php if (isset($erreurs) && in_array(\Library\Entities\OffresStages::CONTACT_INVALIDE, $erreurs)) echo 'L\'adresse mail du contact est invalide.<br />'; ?>
					<div class='container'><div class="well row"><label class='col-md-6'>Adresse mail du contact</label>
					<input class='col-md-6' type='text' name="mail_contact"><?php if (isset($offre)) echo $offre['contact']; ?></input></div></div><br />

					<?php if (isset($erreurs) && in_array(\Library\Entities\OffresStages::CONTACT_INVALIDE, $erreurs)) echo 'Le numéro du contact est invalide.<br />'; ?>
					<div class='container'><div class="well row"><label class='col-md-6'>Numéro du contact</label>
					<input class='col-md-6' type='text' name="num_contact"><?php if (isset($offre)) echo $offre['contact']; ?></input></div></div><br />


			<div class='row'>
				<div class='col-md-12'>
					<?php if(isset($offre) && !$offre->isNew()) { ?>
						<input type="hidden" name="id" value="<?php echo $offre['id']; ?>" />
						<div class="container text-center"><button class="btn btn-primary" />Modifier</div>
						<?php }
					else { ?>
						<div class="container text-center"><button class="btn btn-primary" />Ajouter</div>
					<?php } ?>
				</div>
			</div>
	</form>
</body>
