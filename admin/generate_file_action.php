<?php
     
    $basicDetailsData = $_POST['sendbasic'];
    $complaint_id = $basicDetailsData['complaint_id'];
    $complaint_no = $basicDetailsData['complaint_no'];
    $name = $basicDetailsData['ap_name'];
    $age = $basicDetailsData['ap_age'];
    $gender = $basicDetailsData['ap_gender'];
    $mob = $basicDetailsData['ap_mob'];
    $address = $basicDetailsData['ap_address'];
    $country = $basicDetailsData['ap_country'];
    $state = $basicDetailsData['ap_state'];
    $city = $basicDetailsData['ap_city'];
    $pincode = $basicDetailsData['ap_pin_code'];
    $adhar = $basicDetailsData['ap_adhar'];
    $complaint_type = $basicDetailsData['complaint_type'];
    $bh_dv = $basicDetailsData['bh_dv'];
    $crime_date = $basicDetailsData['crime_date'];
    $crime_time = $basicDetailsData['crime_time'];
    $amount = $basicDetailsData['amount'];
    $freeze_amount = $basicDetailsData['freeze_amount'];
    $checker_name = $basicDetailsData['checker_name'];
    $created_date = $basicDetailsData['created_date'];
    $last_updated = $basicDetailsData['last_updated'];
    $complaint_status = $basicDetailsData['complaint_status'];

    require '../dependencies/phpspreadsheet/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
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
    $writer = new Xlsx($spreadsheet);
    $writer->save('basicdetails_'.$complaint_no.'.xlsx');
    echo 'basicdetails_'.$complaint_no.'.xlsx';
   
  
    ?>



