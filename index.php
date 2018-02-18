<?php


require_once 'vendor/autoload.php';


$phpExcel = new PHPExcel();



//set Properties
$phpExcel->getProperties()->setCreator('percobaan belajar')
          ->setTitle('PHP Excel Testing')
          ->SetSubject('hanya percobaan phpexcel')
          ->setDescription('lorem impsum php excel');



//set data sheet
$teamsecret = array(
      ['captain','puppey'],
      ['carry','Ace'],
      ['middlaner','MidOne'],
      ['support4','Yapzor'],
      ['offlaner','Fata']
);

$phpExcel->setActiveSheetIndex(0)
         ->SetCellValue('A1','Role')
         ->SetcellValue('B1','Name');

$coll = 2;
foreach ($teamsecret as $secret) {
$phpExcel->setActiveSheetIndex(0)
         ->setCellValueByColumnAndRow(0,$coll,$secret[0])
         ->setCellValueByColumnAndRow(1,$coll,$secret[1]);
$coll++;

}



$writer = PHPExcel_IOFactory::createWriter($phpExcel,'Excel2007');
$writer->save('firstExcelphp1.xlsx');

//for save excel download attachment
// $writer = PHPExcel_IOFactory::createWriter($phpExcel,'Excel2007');
// header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header("content-disposition", "attachment; filename=myfile.xlsx");
// $writer->save('php://output');


 ?>
