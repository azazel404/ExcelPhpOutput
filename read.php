<?php


require_once 'vendor/autoload.php';


//filename
$fileName = 'firstExcelphp1.xlsx';
//chek format $fileName
$fileType = 'Excel2007';




// digunakan jika sudah mengetahui format file
// $excel  = new PHPExcel_Reader_Excel2007();
// $reader = $excel->load($fileName);
//
// var_dump($reader);


//load file
$reader = PHPExcel_IOFactory::createreader($fileType);

$reader->setReadDataOnly(true);
$reader = $reader->load($fileName);

//worksheet spesifik
// $sheet = $reader->getSheet(0);
// var_dump($sheet->getHighestRow());
// var_dump($sheet->getHighestColumn());



//rumus excel 
$reader->getActiveSheet()->setCellValue('A7','rumus formula');
$reader->getActiveSheet()->setCellValue('B7','=IF(A1>A3,"sama","tidak sama")');


$data = $reader->getActiveSheet()->toArray(null,true,true,true);
  foreach ($data as $value) {
    foreach ($value as $key) {
      echo $key . '|';
    }

    echo "<br>";
  }
 ?>
