<?php


require_once 'PHPExcel.php';




$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$result1=$mysql->query("SELECT * FROM `users`");


$mysql->close();


$per='2';

$excel = new PHPExcel();
$excel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'id')
      ->setCellValue('C1', 'name')
      ->setCellValue('E1', 'telefon')
      ->setCellValue('G1', 'email')
      ->setCellValue('I1', 'boss-id')
      ->setCellValue('K1', 'post')
      ->setCellValue('M1', 'login')
      ->setCellValue('O1', 'boses');
      while($data=mysqli_fetch_assoc($result1))
      {
        $excel->setActiveSheetIndex(0)
        ->setCellValue('A'.$per, $data['id'])
        ->setCellValue('C'.$per, $data['name'])
        ->setCellValue('E'.$per, $data['telefon'])
        ->setCellValue('G'.$per, $data['email'])
        ->setCellValue('I'.$per, $data['boss-id'])
        ->setCellValue('K'.$per, $data['post'])
        ->setCellValue('M'.$per, $data['login'])
        ->setCellValue('O'.$per, $data['bog']);
        $per=$per+1;
      }
$write=PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$localname='test.xls';
$write->save($localname);

?>
<script>document.location.href="http://dbsayt/work-place.php"</script>
