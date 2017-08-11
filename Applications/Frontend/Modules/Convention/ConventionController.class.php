<?php
namespace Applications\Frontend\Modules\Convention;

use \Library\FPDF;
use \Library\Convention;
use \Library\Font;


class ConventionController extends \Library\BackController {

	public function executeDeclare(\Library\HTTPRequest $request) {

		if ($this->app->user()->isAuthenticated()){

			if ($request->postExists('intitule')){
			
				$this->processForm($request);
			}
			
			$this->page->addVar('title', 'Déclarer votre stage');		
		}
		
		else{
		
			$this->app->httpResponse()->redirectNon_connecte();
		}
	}

	public function executeIndex(\Library\HTTPRequest $request) {

		$this->page->addVar('title', 'Convention');
	}

	public function processForm(\Library\HTTPRequest $request) {

		$convention = new \Library\Entities\Convention(array( 'entreprise' => $request->postData('entreprise'),
												  			  'adresse' => $request->postData('adresse'),
												  			  'ville' => $request->postData('ville'),
												  			  'pays' => $request->postData('pays'),
												  			  'fax' => $request->postData('fax'),
												  			  'civilite_par' => $request->postData('civilite_par'),
												  			  'nom_par' => $request->postData('nom_par'),
												  			  'prenom_par' => $request->postData('prenom_par'),
												  			  'fonction_par' => $request->postData('fonction_par'),
												  			  'tel_par' => $request->postData('tel_par'),
												  			  'email_par' => $request->postData('email_par'),
												  			  'civilite_enc_ext' => $request->postData('civilite_enc_ext'),
												  			  'nom_enc_ext' => $request->postData('nom_enc_ext'),
												  			  'prenom_enc_ext' => $request->postData('prenom_enc_ext'),
												  			  'fonction_enc_ext' => $request->postData('fonction_enc_ext'),
												  			  'tel_enc_ext' => $request->postData('tel_enc_ext'),
												  			  'email_enc_ext' => $request->postData('email_enc_ext'),
												  			  'idEtudiant' => empty($_SESSION['id'])?$_COOKIE['id']:$_SESSION['id'],
										
												  			  'intitule' => $request->postData('intitule'),
												  			  'date_debut' => $request->postData('date_debut'),
												  			  'date_fin' => $request->postData('date_fin'),
												  			   ));

			if ($convention->isValid()) {

			$this->managers->getManagerOf('Convention')->declareInfos($convention);

			$this->app->httpResponse()->redirect('/declarer-stage/telecharger.html');
		}

		else {

			$this->page->addVar('erreurs', $convention->erreurs());
		}			
	}

	public function executeGenerate(\Library\HTTPRequest $request){

		$infos_convention = $this->managers->getManagerOf('Convention')->getConvention(empty($_SESSION['id'])?$_COOKIE['id']:$_SESSION['id']);

		$annee = ($_SESSION['ine']=='1') ? "1ère" : "2ème";
		$pdf = new Convention();
		$pdf->AddPage();
		$pdf->SetTitle("Convention ");
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(24.6,65);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Entre : L'Institut National des Postes Télécommunications"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Situé au Av. Allal El Fassi, Madinat Al Irfane, Rabat - Maroc"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Représenté par M. HILALI Abdelaziz, Directeur Adjoint des Relations Entreprises"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Et désigné dans ce qui suit par l'INPT"),0,'J');
		$pdf->ln(4);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Et : ".$infos_convention['entreprise']),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Situé au : adresse organisme d'accueil"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Représenté par : Encadrant externe"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Et désigné dans ce qui suit par l'organisme d'accueil"),0,'J');
		$pdf->SetFont('Times','B',10);
		$pdf->ln(4);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Préambule"),0,'J');
		$pdf->SetFont('Times','',10);
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"L'INPT forme des ingénieurs en Réseaux de Télécommunications, de l'Informatique et du Multimédia. Ces ingénieurs pourront être de futurs responsables pour des entreprises, dans un monde ouvert aux dynamiques des réseaux et systèmes d'informations"),0,'J');
		$pdf->ln(2);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"La mise en situation professionnelle est une étape importante dans la formation d'ingénieurs, elle permet aux élèves de se confronter aux réalités techniques, scientifiques, économiques et sociales. C'est dans cette optique que l'INPT s'inscrit et marque sa volonté d'avoir dans ses programmes de formation, des stages de divers types orientés vers des objectifs globaux et spécifiques (stages Ouvrier, Stage Technique et Stage de Projet de Fin d'Études)."),0,'J');
		$pdf->ln(2);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Durant le stage ouvrier dont la durée est de 4 semaines ou plus, l'élève ingénieur occupe généralement un poste où il se familiarise avec les conditions de travail et observe le fonctionnement de l'orgnisme d'accueil."),0,'J');
		$pdf->SetFont('Times','B',10);
		$pdf->ln(4);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Article 1"),0,'J');
		$pdf->SetFont('Times','',10);
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"La présente convention règle les rapports entre l'organisme d'accueil d'une part, l'INPT et le stagiaire d'autre part."),0,'J');
		$pdf->ln(2);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Cette convention concerne l'élève ingénieur :"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Mme/Mlle/M. ".$_SESSION['nom']." ". $_SESSION['prenom'].", élève ingénieur de la ".$annee." du cycle INE de l'INPT."),0,'J');
		$pdf->SetFont('Times','B',10);
		$pdf->ln(4);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Article 2"),0,'J');
		$pdf->SetFont('Times','',10);
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"L'étudiant(e) sera encadré(e) par un responsable de stage désigné par l'organisme d'accueil"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Mme/Mlle/M. Nom de l'ncadrant externe"),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Le thème du stage est établi d'un commun accord entrel'organisme d'accueil et l'élève ingénieur."),0,'J');
		$pdf->SetFont('Times','B',10);
		$pdf->ln(4);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Article 3"),0,'J');
		$pdf->SetFont('Times','',10);
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Thème du stage : "),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Intitulé de stage : ".$infos_convention['intitule']),0,'J');
		$pdf->ln(0);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"La durée du stage est fixée à x semaines, du date debut au date fin ."),0,'J');
		$pdf->AddPage();
		$pdf->Output();
	}
}