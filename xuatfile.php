	
<?php

require './libs/students.php';
connect_db();
$result=get_all_students();
require('phpxcel/Classes/PHPExcel.php');
$objExel= new PHPExcel;
$objExel-> setActiveSheetIndex(0);
$sheet = $objExel->getActiveSheet()->setTitle("hihi");
$rowCount = 1;
$sheet->setCellValue('A'.$rowCount,'Name');
$sheet->setCellValue('B'.$rowCount,'Gender');
$sheet->setCellValue('C'.$rowCount,'Birthday');

// $result=$mysqli->query("SELECT sv_name ,sv_sex,sv_birthday FROM tb_sinhvien");

  

    
        foreach($result as $row) {
        	 $rowCount++; // tăng hàng
        $sheet->setCellValue('A'.$rowCount, $row['sv_name']);
        $sheet->setCellValue('B'.$rowCount, $row['sv_sex']);
        $sheet->setCellValue('C'.$rowCount,$row['sv_birthday']);
        } 
       
   
    
      
       
 

      $objWriter = new PHPExcel_Writer_Excel2007($objExel);
      $filename = 'QLSV123.xlsx';
      $objWriter->save($filename);
      header('Content-Disposition: attachment;filename="'.$filename.'"');
      header('Content-Type:application/vnd.openmxlformatsofficedocument.spreadsheettml.sheet');
      header('Content-Length:'.filesize($filename));
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control:must-revalidate');
      header('Pragma:no-cache');
      readfile($filename);
      return;
  ?>
