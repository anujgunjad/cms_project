
<?php   

     $basic = $_POST['sendbasic'];
     $complaint_id = $basic['complaint_id'];
     $complaint_no = $basic['complaint_no'];
     $name = $basic['ap_name'];
     $age = $basic['ap_age'];
     $gender = $basic['ap_gender'];
     $mob = $basic['ap_mob'];
     $address = $basic['ap_address'];
     $country = $basic['ap_country'];
     $state = $basic['ap_state'];
     $city = $basic['ap_city'];
     $pincode = $basic['ap_pin_code'];
     $adhar = $basic['ap_adhar'];
     $complaint_type = $basic['complaint_type'];
     $bh_dv = $basic['bh_dv'];
     $crime_date = $basic['crime_date'];
     $crime_time = $basic['crime_time'];
     $amount = $basic['amount'];
     $freeze_amount = $basic['freeze_amount'];
     $checker_name = $basic['checker_name'];
     $created_date = $basic['created_date'];
     $last_updated = $basic['last_updated'];
     $complaint_status = $basic['complaint_status'];
 
 require '../dependencies/phpspreadsheet/vendor/autoload.php';
 
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
 $spreadsheet = new Spreadsheet();
 $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Basic Details');

// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object

 $sheet = $spreadsheet->addSheet($myWorkSheet, 0);
 $sheet->setCellValue('A1', 'compaint id');
 $sheet->setCellValue('A2', $complaint_id);
 $sheet->setCellValue('B1', 'compaint no');
 $sheet->setCellValue('B2', $complaint_no);
 $sheet->setCellValue('C1', 'Name');
 $sheet->setCellValue('C2', $name);
 $sheet->setCellValue('D1', 'Age');
 $sheet->setCellValue('D2', $age);
 $sheet->setCellValue('E1', 'Gender');
 $sheet->setCellValue('E2', $gender);
 $sheet->setCellValue('F1', 'Mobile no');
 $sheet->setCellValue('F2', $mob);
 $sheet->setCellValue('G1', 'Address');
 $sheet->setCellValue('G2', $address);
 $sheet->setCellValue('H1', 'Country');
 $sheet->setCellValue('H2', $country);
 $sheet->setCellValue('I1', 'State');
 $sheet->setCellValue('I2', $state);
 $sheet->setCellValue('J1', 'City');
 $sheet->setCellValue('J2', $city);
 $sheet->setCellValue('K1', 'Pin Code');
 $sheet->setCellValue('K2', $pincode);
 $sheet->setCellValue('L1', 'Aadhar No');
 $sheet->setCellValue('L2', $adhar);
 $sheet->setCellValue('M1', 'Compliant type');
 $sheet->setCellValue('M2', $complaint_type);
 $sheet->setCellValue('N1', 'Bh_dv');
 $sheet->setCellValue('N2', $bh_dv);
 $sheet->setCellValue('O1', 'Country');
 $sheet->setCellValue('O2', $country);
 $sheet->setCellValue('P1', 'Crime date ');
 $sheet->setCellValue('P2', $crime_date);
 $sheet->setCellValue('Q1', 'Crime Time');
 $sheet->setCellValue('Q2', $crime_time);
 $sheet->setCellValue('R1', 'Amount');
 $sheet->setCellValue('R2', $amount);
 $sheet->setCellValue('S1', 'Freeze Amount');
 $sheet->setCellValue('S2', $freeze_amount);
 $sheet->setCellValue('T1', 'Checker Name');
 $sheet->setCellValue('T2', $checker_name);
 $sheet->setCellValue('U1', 'Created Date');
 $sheet->setCellValue('U2', $created_date);
 $sheet->setCellValue('V1', 'Last Updated');
 $sheet->setCellValue('V2', $last_updated);
 $sheet->setCellValue('W1', 'Complaint Status');
 $sheet->setCellValue('W2', $complaint_status); 
 $myWorkSheet1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspects Details');
 $sheet1= $spreadsheet->addSheet($myWorkSheet1, 1);
// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$suspectsData = $_POST['suspectsbasic'];
if($suspectsData!='empty')
{
  
    $cell= 1;
    foreach ($suspectsData as $row)
    { $cell1 =$cell+1;
        $cell2 =$cell+2;   
        $cell3 =$cell+3;
    $sheet1->setCellValue('A'.$cell1, 'complaint id');
    $sheet1->setCellValue('A'.$cell2, $row['complaint_number']);
    $sheet1->setCellValue('A'.$cell1, 'Suspect id');
    $sheet1->setCellValue('A'.$cell2, $row['suspect_id']);
    $sheet1->setCellValue('B'.$cell1, 'Suspect Name');
    $sheet1->setCellValue('B'.$cell2, $row['suspect_name']);
    $sheet1->setCellValue('C'.$cell1, 'suspect address');
    $sheet1->setCellValue('C'.$cell2, $row['suspect_address']);
    $sheet1->setCellValue('D'.$cell1, 'email Id');
    $sheet1->setCellValue('D'.$cell2, $row['email_id']);
    $sheet1->setCellValue('E'.$cell1, 'domain Name');
    $sheet1->setCellValue('E'.$cell2, $row['domain_name']);
    $sheet1->setCellValue('F'.$cell1, 'Upi phone number');
    $sheet1->setCellValue('F'.$cell2, $row['upi_phone_no']);
    $sheet1->setCellValue('G'.$cell1, ' upivpa ');
    $sheet1->setCellValue('G'.$cell2, $row['upivpa']);
    $sheet1->setCellValue('H'.$cell1, 'software_name');
    $sheet1->setCellValue('H'.$cell2, $row['software_name']);
    $sheet1->setCellValue('I'.$cell1, 'complaint_action');
    $sheet1->setCellValue('I'.$cell2, $row['complaint_action']);
    $sheet1->setCellValue('J'.$cell1, 'pending_reason');
    $sheet1->setCellValue('J'.$cell2, $row['pending_reason']);
    $sheet1->setCellValue('K'.$cell1, ' remark');
    $sheet1->setCellValue('K'.$cell2, $row['remark']);
    $sheet1->setCellValue('L'.$cell1, 'created_date ');
    $sheet1->setCellValue('L'.$cell2, $row['created_date']);
    $sheet1->setCellValue('M'.$cell1, 'last updated');
    $sheet1->setCellValue('M'.$cell2, $row['last_updated']);
    $sheet1->getStyle('A'.$cell3.':M'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;

    }
   

}

$myWorkSheet2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspect_number Details');
 $sheet2 = $spreadsheet->addSheet($myWorkSheet2, 2);
// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$numberData = $_POST['numbersbasic'];
if($numberData!='empty')
{
  
    $cell= 1;
    foreach ($numberData as $row)
    { $cell1 =$cell+1;
        $cell2 =$cell+2;
        $cell3 =$cell+3;
        
    $sheet2->setCellValue('A'.$cell1, 'complaint id');
    $sheet2->setCellValue('A'.$cell2, $row['complaint_number']);
    $sheet2->setCellValue('B'.$cell1, 'number_id');
    $sheet2->setCellValue('B'.$cell2, $row['number_id']);
    $sheet2->setCellValue('C'.$cell1, 'number_one');
    $sheet2->setCellValue('C'.$cell2, $row['number']);
    $sheet2->setCellValue('D'.$cell1, 'company');
    $sheet2->setCellValue('D'.$cell2, $row['company']);
    $sheet2->setCellValue('E'.$cell1, 'Files');
    $sheet2->setCellValue('E'.$cell2, $row['files']);
    $sheet2->setCellValue('F'.$cell1, 'email_sent');
    $sheet2->setCellValue('F'.$cell2, $row['email_sent']);
    $sheet2->setCellValue('G'.$cell1, 'email_recieved');
    $sheet2->setCellValue('G'.$cell2, $row['email_received']);
    $sheet2->setCellValue('H'.$cell1, 'Suspect Name ');
    $sheet2->setCellValue('H'.$cell2, $row['suspect_name']);
    $sheet2->setCellValue('I'.$cell1, 'Suspect Address');
    $sheet2->setCellValue('I'.$cell2, $row['suspect_address']);
    $sheet2->setCellValue('J'.$cell1, 'City');
    $sheet2->setCellValue('J'.$cell2, $row['city']);
    $sheet2->setCellValue('K'.$cell1, 'State');
    $sheet2->setCellValue('K'.$cell2, $row['state']);
    $sheet2->setCellValue('L'.$cell1, 'Retailer Name');
    $sheet2->setCellValue('L'.$cell2, $row['retailer_name']);
    $sheet2->setCellValue('M'.$cell1, 'Uid Num ');
    $sheet2->setCellValue('M'.$cell2, $row['uid_num']);
    $sheet2->setCellValue('N'.$cell1, 'other_num');
    $sheet2->setCellValue('N'.$cell2, $row['other_num']);
    $sheet2->setCellValue('O'.$cell1, 'Retailer Name');
    $sheet2->setCellValue('O'.$cell2, $row['retailer_name']);
    $sheet2->setCellValue('P'.$cell1, 'Pdf');
    $sheet2->setCellValue('P'.$cell2, $row['pdf']);
    $sheet2->setCellValue('Q'.$cell1, 'confirmation');
    $sheet2->setCellValue('Q'.$cell2, $row['confirmation']);
    $sheet2->setCellValue('R'.$cell1, 'Remark');
    $sheet2->setCellValue('R'.$cell2, $row['remark']);
    $sheet2->setCellValue('S'.$cell1, 'mail_id');
    $sheet2->setCellValue('S'.$cell2, $row['mail_id']);
    $sheet2->setCellValue('T'.$cell1, 'Caf Date');
    $sheet2->setCellValue('T'.$cell2, $row['caf_date']);
    $sheet2->setCellValue('U'.$cell1, 'created_date');
    $sheet2->setCellValue('U'.$cell2, $row['created_date']);
    $sheet2->setCellValue('V'.$cell1, 'last updated');
    $sheet2->setCellValue('V'.$cell2, $row['last_updated']);
    $sheet2->getStyle('A'.$cell3.':V'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;

   
    }
   

}

$myWorkSheet3 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspect Account Details');
 $sheet3 = $spreadsheet->addSheet($myWorkSheet3,3);
// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$accountData = $_POST['accountsbasic'];
if($accountData!='empty')
{
  
    $cell= 1;
    foreach ($accountData as $row)
    { $cell1 =$cell+1;
        $cell2 =$cell+2;
      
        $cell3 =$cell+3;
    $sheet3->setCellValue('A'.$cell1, 'complaint id');
    $sheet3->setCellValue('A'.$cell2, $row['complaint_number']);
    $sheet3->setCellValue('B'.$cell1, 'acc_id');
    $sheet3->setCellValue('B'.$cell2, $row['acc_id']);
    $sheet3->setCellValue('C'.$cell1, 'acc_number');
    $sheet3->setCellValue('C'.$cell2, $row['acc_number']);
    $sheet3->setCellValue('D'.$cell1, 'bank_name');
    $sheet3->setCellValue('D'.$cell2, $row['bank_name']);
    $sheet3->setCellValue('E'.$cell1, 'state');
    $sheet3->setCellValue('E'.$cell2, $row['state']);
    $sheet3->setCellValue('F'.$cell1, 'branch_name');
    $sheet3->setCellValue('F'.$cell2, $row['branch_name']);
    $sheet3->setCellValue('G'.$cell1, 'mail_date');
    $sheet3->setCellValue('G'.$cell2, $row['mail_date']);
    $sheet3->setCellValue('H'.$cell1, 'mail_received ');
    $sheet3->setCellValue('H'.$cell2, $row['mail_received']);
    $sheet3->setCellValue('I'.$cell1, 'freeze_amount');
    $sheet3->setCellValue('I'.$cell2, $row['freeze_amount']);
    $sheet3->setCellValue('J'.$cell1, 'kyc_name');
    $sheet3->setCellValue('J'.$cell2, $row['kyc_name']);
    $sheet3->setCellValue('K'.$cell1, 'State');
    $sheet3->setCellValue('K'.$cell2, $row['state']);
    $sheet3->setCellValue('L'.$cell1, 'address ');
    $sheet3->setCellValue('L'.$cell2, $row['address']);
    $sheet3->setCellValue('M'.$cell1, 'city');
    $sheet3->setCellValue('M'.$cell2, $row['city']);
    $sheet3->setCellValue('N'.$cell1, 'state');
    $sheet3->setCellValue('N'.$cell2, $row['state_twice']);
    $sheet3->setCellValue('O'.$cell1, 'alternate_number');
    $sheet3->setCellValue('O'.$cell2, $row['alternate_number']);
    $sheet3->setCellValue('P'.$cell1, 'profit_acc');
    $sheet3->setCellValue('P'.$cell2, $row['profit_acc']);
    $sheet3->setCellValue('Q'.$cell1, 'internet_banking');
    $sheet3->setCellValue('Q'.$cell2, $row['internet_banking']);
    $sheet3->setCellValue('R'.$cell1, 'bank_manager_name');
    $sheet3->setCellValue('R'.$cell2, $row['bank_manager_name']);
    $sheet3->setCellValue('S'.$cell1, 'bank_manager_number');
    $sheet3->setCellValue('S'.$cell2, $row['bank_manager_number']);
    $sheet3->setCellValue('T'.$cell1, 'kyc_pdf');
    $sheet3->setCellValue('T'.$cell2, $row['kyc_pdf']);
    $sheet3->setCellValue('U'.$cell1, ' bank_statement_file');
    $sheet3->setCellValue('U'.$cell2, $row['bank_statement_file']);
    $sheet3->setCellValue('V'.$cell1, 'created_date');
    $sheet3->setCellValue('V'.$cell2, $row['created_date']);
    $sheet3->setCellValue('W'.$cell1, 'last updated');
    $sheet3->setCellValue('W'.$cell2, $row['last_updated']);
    $sheet3->getStyle('A'.$cell3.':W'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;
    
   
    }
}

$myWorkSheet4 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspect Ewallet Details');
 $sheet4 = $spreadsheet->addSheet($myWorkSheet4, 4);
// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$ewalletData = $_POST['ewalletbasic'];
if($ewalletData!='empty')
{
  
    $cell= 1;
    foreach ($ewalletData as $row)
    { $cell1 =$cell+1;
        $cell2 =$cell+2;
      
        $cell3 =$cell+3;
    $sheet4->setCellValue('A'.$cell1, 'complaint id');
    $sheet4->setCellValue('A'.$cell2, $row['complaint_number']);
    $sheet4->setCellValue('B'.$cell1, 'suspect_ewallet_id');
    $sheet4->setCellValue('B'.$cell2, $row['suspect_ewallet_id']);
    $sheet4->setCellValue('C'.$cell1, 'upi_name');
    $sheet4->setCellValue('C'.$cell2, $row['upi_name']);
    $sheet4->setCellValue('D'.$cell1, 'mob_number');
    $sheet4->setCellValue('D'.$cell2, $row['mob_number']);
    $sheet4->setCellValue('E'.$cell1, 'vpa_id');
    $sheet4->setCellValue('E'.$cell2, $row['vpa_id']);
    $sheet4->setCellValue('F'.$cell1, 'statement');
    $sheet4->setCellValue('F'.$cell2, $row['statement']);
    $sheet4->setCellValue('G'.$cell1, 'email_sent');
    $sheet4->setCellValue('G'.$cell2, $row['email_sent']);
    $sheet4->setCellValue('H'.$cell1, 'email_received ');
    $sheet4->setCellValue('H'.$cell2, $row['email_received']);
    $sheet4->setCellValue('I'.$cell1, 'linked_account');
    $sheet4->setCellValue('I'.$cell2, $row['linked_account']);
    $sheet4->setCellValue('J'.$cell1, 'ip_address');
    $sheet4->setCellValue('J'.$cell2, $row['ip_address']);
    $sheet4->setCellValue('K'.$cell1, 'ip_add_number');
    $sheet4->setCellValue('K'.$cell2, $row['ip_add_number']);
    $sheet4->setCellValue('M'.$cell1, 'device_id ');
    $sheet4->setCellValue('M'.$cell2, $row['device_id']);
    $sheet4->setCellValue('N'.$cell1, 'merchandise');
    $sheet4->setCellValue('N'.$cell2, $row['merchandise']);
    $sheet4->setCellValue('O'.$cell1, 'hold_amount');
    $sheet4->setCellValue('O'.$cell2, $row['hold_amount']);
    $sheet4->setCellValue('P'.$cell1, 'number');
    $sheet4->setCellValue('P'.$cell2, $row['number']);
    $sheet4->setCellValue('Q'.$cell1, 'created_date');
    $sheet4->setCellValue('Q'.$cell2, $row['created_date']);
    $sheet4->setCellValue('R'.$cell1, 'last_updated');
    $sheet4->setCellValue('R'.$cell2, $row['last_updated']);
    $sheet4->getStyle('A'.$cell3.':R'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;
  
   
    }
}

$myWorkSheet5 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspect Website Details');
 $sheet5 = $spreadsheet->addSheet($myWorkSheet5, 5);
// Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
$websiteData = $_POST['websitebasic'];
if($websiteData!='empty')
{
  
    $cell= 1;
    foreach ($websiteData as $row)
    { $cell1 =$cell+1;
        $cell2 =$cell+2; 
        $cell3 =$cell+3;
    $sheet5->setCellValue('A'.$cell1, 'complaint id');
    $sheet5->setCellValue('A'.$cell2, $row['complaint_number']);
    $sheet5->setCellValue('B'.$cell1, 'website_id');
    $sheet5->setCellValue('B'.$cell2, $row['website_id']);
    $sheet5->setCellValue('C'.$cell1, 'website_name');
    $sheet5->setCellValue('C'.$cell2, $row['website_name']);
    $sheet5->setCellValue('D'.$cell1, 'website_domain');
    $sheet5->setCellValue('D'.$cell2, $row['website_domain']);
    $sheet5->setCellValue('E'.$cell1, 'mail_id');
    $sheet5->setCellValue('E'.$cell2, $row['mail_id']);
    $sheet5->setCellValue('F'.$cell1, 'website_mobile_number');
    $sheet5->setCellValue('F'.$cell2, $row['website_mobile_number']);
    $sheet5->setCellValue('G'.$cell1, 'created_date');
    $sheet5->setCellValue('G'.$cell2, $row['created_date']);
    $sheet5->setCellValue('H'.$cell1, 'last_updated ');
    $sheet5->setCellValue('H'.$cell2, $row['last_updated']);
    $sheet5->getStyle('A'.$cell3.':H'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;

   
    }
}
$spreadsheet->setActiveSheetIndex(0);
 $writer = new Xlsx($spreadsheet);
 $writer->save('alldetails_'.$complaint_no.'.xlsx');

echo  'alldetails_'.$complaint_no.'.xlsx';

 ?>