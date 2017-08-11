<?php
namespace Library\Entities;

class Convention extends \Library\Entity {

  $objPHPExcel = new PHPExcel();
  $objPHPExcel->getActiveSheet()->setCellValue('A1', 'hello world!');
  $objPHPExcel->getActiveSheet()->setTitle('Table Etudiants');
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Table Etudiants.xlsx"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  $objWriter->save('php://output');
}
?>
