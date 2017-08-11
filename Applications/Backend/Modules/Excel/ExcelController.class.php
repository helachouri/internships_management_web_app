<?php
namespace Applications\Backend\Modules\Excel;


class ExcelController extends \Library\BackController {

	public function executeGenerate1(\Library\HTTPRequest $request) {
			$ine1 = $this->managers->getManagerOf('Etudiant')->getInes('1');

			$objPHPExcel = new \PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1',"Nom");
			$objPHPExcel->getActiveSheet()->setCellValue('B1',"Prénom");
			$objPHPExcel->getActiveSheet()->setCellValue('C1',"Filière");
			$objPHPExcel->getActiveSheet()->setCellValue('D1',"Adresse mail");
			$objPHPExcel->getActiveSheet()->setCellValue('E1',"Numéro de téléphone");
			$i = 2;
			foreach ($ine1 as $etudiant) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$etudiant['nom']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$etudiant['prenom']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$etudiant['filiere']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$etudiant['email']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$etudiant['num_tel']);
				$i++;
			}
			$objPHPExcel->getActiveSheet()->setTitle('Liste étudiants INE1');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Liste étudiants INE1.xlsx"');
			header('Cache-Control: max-age=0');	
			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save('php://output');
			exit;
	}

	public function executeGenerate2(\Library\HTTPRequest $request) {
			$ine2 = $this->managers->getManagerOf('Etudiant')->getInes('2');

			$objPHPExcel = new \PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1',"Nom");
			$objPHPExcel->getActiveSheet()->setCellValue('B1',"Prénom");
			$objPHPExcel->getActiveSheet()->setCellValue('C1',"Filière");
			$objPHPExcel->getActiveSheet()->setCellValue('D1',"Adresse mail");
			$objPHPExcel->getActiveSheet()->setCellValue('E1',"Numéro de téléphone");
			$i = 2;
			foreach ($ine2 as $etudiant) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$etudiant['nom']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$etudiant['prenom']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$etudiant['filiere']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$etudiant['email']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$etudiant['num_tel']);
				$i++;
			}
			$objPHPExcel->getActiveSheet()->setTitle('Liste étudiants INE2');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Liste étudiants INE2.xlsx"');
			header('Cache-Control: max-age=0');	
			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save('php://output');
			exit;
	}

	public function executeGenerate(\Library\HTTPRequest $request) {
			$listeOffres = $this->managers->getManagerOf('OffresStages')->getList();

			$objPHPExcel = new \PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A1',"Entreprise");
			$objPHPExcel->getActiveSheet()->setCellValue('B1',"Type d'offre");
			$objPHPExcel->getActiveSheet()->setCellValue('C1',"Contact");

			$i = 2;
			foreach ($listeOffres as $offre) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$offre['titre']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$offre['type']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$offre['contact']);
				$i++;
			}
			$objPHPExcel->getActiveSheet()->setTitle('Liste des entreprises');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Liste des entreprises.xlsx"');
			header('Cache-Control: max-age=0');	
			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save('php://output');
			exit;
	}
}