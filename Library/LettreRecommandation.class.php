<?php
namespace Library;
use \Library\Font;

class LettreRecommandation extends FPDF {

    public function __construct() {

        parent::__construct();
    }

    // Page header
    function Header() {
        $annee = ($_SESSION['ine']=='1') ? "1ère" : "2ème";
        $type = ($_SESSION['ine']=='1') ? "ouvrier" : "technique";
        // Logo INPT
        $this->Image('images/logo_inpt2.png',25.5,12.7,41.64,19.8);
        // Times 12
        $this->SetFont('Times','',12);
        // Move to Position
        $this->SetXY(140,51);
        // Lieu & date
        $this->Cell(0,0,'Rabat, le 02 Mars '.date("Y"),0,0);
        // Times bold 15
        $this->SetFont('Arial','B',15);
        // Move to position
        $this->setY(66);
        // Titre
        $this->Cell(0,0,'Lettre de recommandation',0,1,'C');
        $this->ln(7);
        // Times 15
        $this->SetFont('Arial','',14);
        // Sous titre
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Stage ".$type." de la ".$annee." année du cycle des Ingénieurs d’Etat (INE) de"),0,1,'C');
        $this->ln(6);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"l’Institut National des Postes et Télécommunications (INPT)"),0,1,'C');
    }

    // Page footer
    function Footer() {
        // Mr. Hilali's signature
        $this->Image('images/signature.png',79,221,56,33);
        // Arial 9
        $this->SetFont('Arial','',9);
        // Position at 1.5 cm from bottom
        $this->SetXY(24,-35.5);
        // color gray
        $this->SetTextColor(169,169,169);
        // Page footer
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Av. Allal El Fassi"),0,1,'L');
        $this->ln(3.8);
        $this->SetX(24);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Madinat Al Irfane"),0,0,'L');
        $this->ln(3.8);
        $this->SetX(24);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Rabat - Maroc"),0,1,'L');
        $this->ln(3.8);
        $this->SetX(24);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Tél.:+212 5 38 00 27 00"),0,0,'L');
        $this->ln(3.8);
        $this->SetX(24);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"Fax.:+212 5 37 77 30 44"),0,0,'L');
        $this->ln(3.8);
        $this->SetX(24);
        $this->Cell(0,0,iconv('UTF-8', 'windows-1252',"http://www.inpt.ac.ma"),0,0,'L');
    }
}
