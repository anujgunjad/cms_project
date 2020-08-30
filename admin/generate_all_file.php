
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

 $sheet->setCellValue('A1', 'compaint no');
 $sheet->setCellValue('A2', $complaint_no);
 $sheet->setCellValue('B1', 'Name');
 $sheet->setCellValue('B2', $name);
 $sheet->setCellValue('C1', 'Age');
 $sheet->setCellValue('C2', $age);
 $sheet->setCellValue('D1', 'Gender');
 $sheet->setCellValue('D2', $gender);
 $sheet->setCellValue('E1', 'Mobile no');
 $sheet->setCellValue('E2', $mob);
 $sheet->setCellValue('F1', 'Address');
 $sheet->setCellValue('F2', $address);
 $sheet->setCellValue('G1', 'Country');
 $sheet->setCellValue('G2', $country);
 $sheet->setCellValue('H1', 'State');
 $sheet->setCellValue('H2', $state);
 $sheet->setCellValue('I1', 'City');
 $sheet->setCellValue('I2', $city);
 $sheet->setCellValue('J1', 'Pin Code');
 $sheet->setCellValue('J2', $pincode);
 $sheet->setCellValue('K1', 'Aadhar No');
 $sheet->setCellValue('K2', $adhar);
 $sheet->setCellValue('L1', 'Compliant type');
 $sheet->setCellValue('L2', $complaint_type);
 $sheet->setCellValue('M1', 'Bh_dv');
 $sheet->setCellValue('M2', $bh_dv);
 $sheet->setCellValue('N1', 'Country');
 $sheet->setCellValue('N2', $country);
 $sheet->setCellValue('O1', 'Crime date ');
 $sheet->setCellValue('O2', $crime_date);
 $sheet->setCellValue('P1', 'Crime Time');
 $sheet->setCellValue('P2', $crime_time);
 $sheet->setCellValue('Q1', 'Amount');
 $sheet->setCellValue('Q2', $amount);
 $sheet->setCellValue('R1', 'Freeze Amount');
 $sheet->setCellValue('R2', $freeze_amount);
 $sheet->setCellValue('S1', 'Checker Name');
 $sheet->setCellValue('S2', $checker_name);
 $sheet->setCellValue('T1', 'Created Date');
 $sheet->setCellValue('T2', $created_date);
 $sheet->setCellValue('U1', 'Last Updated');
 $sheet->setCellValue('U2', $last_updated);
 $sheet->setCellValue('V1', 'Complaint Status');
 $sheet->setCellValue('V2', $complaint_status); 
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
   
    $sheet1->setCellValue('A'.$cell1, 'Suspect Name');
    $sheet1->setCellValue('A'.$cell2, $row['suspect_name']);
    $sheet1->setCellValue('B'.$cell1, 'Suspect address');
    $sheet1->setCellValue('B'.$cell2, $row['suspect_address']);
    $sheet1->setCellValue('C'.$cell1, 'Suspect Mobile');
    $sheet1->setCellValue('C'.$cell2, $row['suspect_mob']);
    $sheet1->setCellValue('D'.$cell1, 'Email Id');
    $sheet1->setCellValue('D'.$cell2, $row['email_id']);
    $sheet1->setCellValue('E'.$cell1, 'Domain Name');
    $sheet1->setCellValue('E'.$cell2, $row['domain_name']);
    $sheet1->setCellValue('F'.$cell1, 'Upi phone number');
    $sheet1->setCellValue('F'.$cell2, $row['upi_phone_no']);
    $sheet1->setCellValue('G'.$cell1, ' Upivpa ');
    $sheet1->setCellValue('G'.$cell2, $row['upivpa']);
    $sheet1->setCellValue('H'.$cell1, 'Software Name');
    $sheet1->setCellValue('H'.$cell2, $row['software_name']);
    $sheet1->setCellValue('I'.$cell1, 'Complaint Action');
    $sheet1->setCellValue('I'.$cell2, $row['complaint_action']);
    $sheet1->setCellValue('J'.$cell1, 'Pending Reason');
    $sheet1->setCellValue('J'.$cell2, $row['pending_reason']);
    $sheet1->setCellValue('K'.$cell1, ' Remark');
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
else{
    $sheet1->setCellValue('A1', 'No data');
}

$myWorkSheet2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Suspect Number Details');
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
        
    
   
    $sheet2->setCellValue('A'.$cell1, 'Number');
    $sheet2->setCellValue('A'.$cell2, $row['number']);
    $sheet2->setCellValue('B'.$cell1, 'Company');
    $sheet2->setCellValue('B'.$cell2, $row['company']);
    $sheet2->setCellValue('C'.$cell1, 'Files');
    $sheet2->setCellValue('C'.$cell2, $row['files']);
    $sheet2->setCellValue('D'.$cell1, 'Email sent');
    $sheet2->setCellValue('D'.$cell2, $row['email_sent']);
    $sheet2->setCellValue('E'.$cell1, 'Email recieved');
    $sheet2->setCellValue('E'.$cell2, $row['email_received']);
    $sheet2->setCellValue('F'.$cell1, 'Suspect Name ');
    $sheet2->setCellValue('F'.$cell2, $row['suspect_name']);
    $sheet2->setCellValue('G'.$cell1, 'Suspect Address');
    $sheet2->setCellValue('G'.$cell2, $row['suspect_address']);
    $sheet2->setCellValue('H'.$cell1, 'City');
    $sheet2->setCellValue('H'.$cell2, $row['city']);
    $sheet2->setCellValue('I'.$cell1, 'State');
    $sheet2->setCellValue('I'.$cell2, $row['state']);
    $sheet2->setCellValue('J'.$cell1, 'Retailer Name');
    $sheet2->setCellValue('J'.$cell2, $row['retailer_name']);
    $sheet2->setCellValue('K'.$cell1, 'Uid Num ');
    $sheet2->setCellValue('K'.$cell2, $row['uid_num']);
    $sheet2->setCellValue('L'.$cell1, 'Other Number');
    $sheet2->setCellValue('L'.$cell2, $row['other_num']);
    $sheet2->setCellValue('M'.$cell1, 'Retailer Name');
    $sheet2->setCellValue('M'.$cell2, $row['retailer_name']);
    $sheet2->setCellValue('N'.$cell1, 'Pdf');
    $sheet2->setCellValue('N'.$cell2, $row['pdf']);
    $sheet2->setCellValue('O'.$cell1, 'Confirmation');
    $sheet2->setCellValue('O'.$cell2, $row['confirmation']);
    $sheet2->setCellValue('P'.$cell1, 'Remark');
    $sheet2->setCellValue('P'.$cell2, $row['remark']);
    $sheet2->setCellValue('Q'.$cell1, 'Mail_id');
    $sheet2->setCellValue('Q'.$cell2, $row['mail_id']);
    $sheet2->setCellValue('R'.$cell1, 'Caf Date');
    $sheet2->setCellValue('R'.$cell2, $row['caf_date']);
    $sheet2->setCellValue('S'.$cell1, 'created_date');
    $sheet2->setCellValue('S'.$cell2, $row['created_date']);
    $sheet2->setCellValue('T'.$cell1, 'last updated');
    $sheet2->setCellValue('T'.$cell2, $row['last_updated']);
    $sheet2->getStyle('A'.$cell3.':T'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;

   
    }
   

}
else{
    $sheet2->setCellValue('A1', 'No data');
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
  
    $sheet3->setCellValue('A'.$cell1, 'Acc Number');
    $sheet3->setCellValue('A'.$cell2, $row['acc_number']);
    $sheet3->setCellValue('B'.$cell1, 'Bank Name');
    $sheet3->setCellValue('B'.$cell2, $row['bank_name']);
    $sheet3->setCellValue('C'.$cell1, 'State');
    $sheet3->setCellValue('C'.$cell2, $row['state']);
    $sheet3->setCellValue('D'.$cell1, 'Branch Name');
    $sheet3->setCellValue('D'.$cell2, $row['branch_name']);
    $sheet3->setCellValue('E'.$cell1, 'Mail Date');
    $sheet3->setCellValue('E'.$cell2, $row['mail_date']);
    $sheet3->setCellValue('F'.$cell1, 'Mail Received ');
    $sheet3->setCellValue('F'.$cell2, $row['mail_received']);
    $sheet3->setCellValue('G'.$cell1, 'freeze Amount');
    $sheet3->setCellValue('G'.$cell2, $row['freeze_amount']);
    $sheet3->setCellValue('H'.$cell1, 'Kyc Name');
    $sheet3->setCellValue('H'.$cell2, $row['kyc_name']);
    $sheet3->setCellValue('I'.$cell1, 'State');
    $sheet3->setCellValue('I'.$cell2, $row['state']);
    $sheet3->setCellValue('J'.$cell1, 'Address ');
    $sheet3->setCellValue('J'.$cell2, $row['address']);
    $sheet3->setCellValue('K'.$cell1, 'City');
    $sheet3->setCellValue('K'.$cell2, $row['city']);
    $sheet3->setCellValue('L'.$cell1, 'State');
    $sheet3->setCellValue('L'.$cell2, $row['state_twice']);
    $sheet3->setCellValue('M'.$cell1, 'Alternate_number');
    $sheet3->setCellValue('M'.$cell2, $row['alternate_number']);
    $sheet3->setCellValue('N'.$cell1, 'Profit_acc');
    $sheet3->setCellValue('N'.$cell2, $row['profit_acc']);
    $sheet3->setCellValue('O'.$cell1, 'Internet_banking');
    $sheet3->setCellValue('O'.$cell2, $row['internet_banking']);
    $sheet3->setCellValue('P'.$cell1, 'Bank manager Name');
    $sheet3->setCellValue('P'.$cell2, $row['bank_manager_name']);
    $sheet3->setCellValue('Q'.$cell1, 'Bank manager number');
    $sheet3->setCellValue('Q'.$cell2, $row['bank_manager_number']);
    $sheet3->setCellValue('R'.$cell1, 'kyc_pdf');
    $sheet3->setCellValue('R'.$cell2, $row['kyc_pdf']);
    $sheet3->setCellValue('S'.$cell1, ' bank_statement_file');
    $sheet3->setCellValue('S'.$cell2, $row['bank_statement_file']);
    $sheet3->setCellValue('T'.$cell1, 'created_date');
    $sheet3->setCellValue('T'.$cell2, $row['created_date']);
    $sheet3->setCellValue('U'.$cell1, 'last updated');
    $sheet3->setCellValue('U'.$cell2, $row['last_updated']);
    $sheet3->getStyle('A'.$cell3.':U'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;
    
   
    }
}
else{
    $sheet3->setCellValue('A1', 'No data');
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

    $sheet4->setCellValue('A'.$cell1, 'upi name');
    $sheet4->setCellValue('A'.$cell2, $row['upi_name']);
    $sheet4->setCellValue('B'.$cell1, 'mobile number');
    $sheet4->setCellValue('B'.$cell2, $row['mob_number']);
    $sheet4->setCellValue('C'.$cell1, 'vpa id');
    $sheet4->setCellValue('C'.$cell2, $row['vpa_id']);
    $sheet4->setCellValue('D'.$cell1, 'statement');
    $sheet4->setCellValue('D'.$cell2, $row['statement']);
    $sheet4->setCellValue('E'.$cell1, 'email sent');
    $sheet4->setCellValue('E'.$cell2, $row['email_sent']);
    $sheet4->setCellValue('F'.$cell1, 'email received ');
    $sheet4->setCellValue('F'.$cell2, $row['email_received']);
    $sheet4->setCellValue('G'.$cell1, 'linked account');
    $sheet4->setCellValue('G'.$cell2, $row['linked_account']);
    $sheet4->setCellValue('H'.$cell1, 'ip address');
    $sheet4->setCellValue('H'.$cell2, $row['ip_address']);
    $sheet4->setCellValue('I'.$cell1, 'ip add_number');
    $sheet4->setCellValue('I'.$cell2, $row['ip_add_number']);
    $sheet4->setCellValue('J'.$cell1, 'device id ');
    $sheet4->setCellValue('J'.$cell2, $row['device_id']);
    $sheet4->setCellValue('K'.$cell1, 'merchandise');
    $sheet4->setCellValue('K'.$cell2, $row['merchandise']);
    $sheet4->setCellValue('L'.$cell1, 'hold amount');
    $sheet4->setCellValue('L'.$cell2, $row['hold_amount']);
    $sheet4->setCellValue('M'.$cell1, 'number');
    $sheet4->setCellValue('M'.$cell2, $row['number']);
    $sheet4->setCellValue('N'.$cell1, 'created_date');
    $sheet4->setCellValue('N'.$cell2, $row['created_date']);
    $sheet4->setCellValue('O'.$cell1, 'last_updated');
    $sheet4->setCellValue('O'.$cell2, $row['last_updated']);
    $sheet4->getStyle('A'.$cell3.':O'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;
  
   
    }
}
else{
    $sheet4->setCellValue('A1', 'No data');
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

    $sheet5->setCellValue('A'.$cell1, 'website name');
    $sheet5->setCellValue('A'.$cell2, $row['website_name']);
    $sheet5->setCellValue('B'.$cell1, 'website domain');
    $sheet5->setCellValue('B'.$cell2, $row['website_domain']);
    $sheet5->setCellValue('C'.$cell1, 'mail id');
    $sheet5->setCellValue('C'.$cell2, $row['mail_id']);
    $sheet5->setCellValue('D'.$cell1, 'website mobile number');
    $sheet5->setCellValue('D'.$cell2, $row['website_mobile_number']);
    $sheet5->setCellValue('E'.$cell1, 'created_date');
    $sheet5->setCellValue('E'.$cell2, $row['created_date']);
    $sheet5->setCellValue('F'.$cell1, 'last_updated ');
    $sheet5->setCellValue('F'.$cell2, $row['last_updated']);
    $sheet5->getStyle('A'.$cell3.':F'.$cell3)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFFFF00');
    $cell =$cell+4;

   
    }
}
else{
    $sheet5->setCellValue('A1', 'No data');
}
$spreadsheet->setActiveSheetIndex(0);
 $writer = new Xlsx($spreadsheet);
 $writer->save('alldetails_'.$complaint_no.'.xlsx');

echo  'alldetails_'.$complaint_no.'.xlsx';

 ?>