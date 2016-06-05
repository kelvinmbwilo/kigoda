<?php


//prepare a table
$table = "ivr_call_log_".$_GET['year1'];
$month11 = "";
$timeQuery = "";
$titletime = "";
$defaultDate= date('Y-m-d');
$logtable = "ivr_calllog_detail_".$_GET['year1'];
if($_GET['reporting_period'] == 'month'){
    $table .= $_GET['months'];
    $month11 = date('F',strtotime($_GET['year1'].'-'.$_GET['months'].'-'.'01'));
    $logtable .= $_GET['months'];
    $titletime = $month11." ".$_GET['year1'];
}elseif($_GET['reporting_period'] == 'week'){
    $table .= date('m',strtotime($_GET['weekstart']));
    $logtable .= date('m',strtotime($_GET['weekstart']));
    $month11 = date('F',strtotime($_GET['weekstart']));
    $start = date('YmdHis',strtotime($_GET['weekstart']));
    $end = date('YmdHis',strtotime($_GET['weekstart'])+(60*60*24*7));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start' AND '$end' ";
    $titletime = date('jS',strtotime($start))." To ".date('jS F Y',strtotime($end));
}elseif($_GET['reporting_period'] == 'day'){
    $table .= date('m',strtotime($_GET['day']));
    $logtable .= date('m',strtotime($_GET['day']));
    $start = date('YmdHis',strtotime($_GET['day']));
    $end = date('YmdHis',strtotime($_GET['day'])+(60*60*24));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start' AND '$end' ";
    $titletime = date('jS F Y',strtotime($start));
    $month11 = date('F',strtotime($_GET['day']));
}elseif($_GET['reporting_period'] == 'hour'){
    $table .= date('m',strtotime($_GET['hourday']));
    $logtable .= date('m',strtotime($_GET['hourday']));
    $htarr = explode("-",$_GET['hoursselect']);
    $start = date('Ymd',strtotime($_GET['hourday'])).$htarr[0]."";
    $start1 = date('Ymd',strtotime($_GET['hourday'])).$htarr[0]."0000";
    $end = date('YmdHis',strtotime($start1)+(60*60));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start1' AND '$end' ";
    $titletime = date('gA',strtotime($start1))." To ".date('gA jS F Y',strtotime($end));
    $month11 = date('F',strtotime($_GET['hourday']));
}


//preparing services
if($_GET['services1']){
    $service  = array('ATMDMF'=>'Delay in MPESA Transaction','ATMDMF-01'=>'Delay in MPESA Transaction','P0004'=>'Jisevie Services','P0005'=>'Loan/Account Services selection','P0006'=>'Fund Transfer','P0007'=>'SMS Alert regarding ATM Transaction','P0008'=>'Expired/Lost/Stollen ATM Cards Information','P0009'=>'Bill Payments through NMB Mobile','P0010'=>'NMB E-Bank statement','P0011'=>'ChapChap Account Information','P0012'=>'Sending Money NMB-NMB through NMB Mobile Information','P0013'=>'Sending Money through Pesa Fasta','P0014'=>'Sending Money from MPESA to NMB and vice versa','P0016'=>'NMB Products and Services','P0017'=>'Current/Saving Accounts Selection','P0018'=>'NMB Business Loan Information','P0019'=>'NMB Mortage and Housing Loan Information','P0020'=>'NMB Loan Information','P0021'=>'NMB Wisdom Loan Information','P0022'=>'Accounts Information selection','P0023'=>'NMB Bonus/Junior Account Selection','P0024'=>'NMB Personal Account Information','P0025'=>'NMB Wisdom Account Information','P0026'=>'NMB Student Account Information','P0027'=>'NMB Bonus Account Information','P0028'=>'NMB Junior Account Information','PCCARE'=>'Customer Care Request','CCare Connect'=>'Customer Care Connect');
}else{
    $service1  = array('ATMDMF'=>'Delay in MPESA Transaction','ATMDMF-01'=>'Delay in MPESA Transaction','P0004'=>'Jisevie Services','P0005'=>'Loan/Account Services selection','P0006'=>'Fund Transfer','P0007'=>'SMS Alert regarding ATM Transaction','P0008'=>'Expired/Lost/Stollen ATM Cards Information','P0009'=>'Bill Payments through NMB Mobile','P0010'=>'NMB E-Bank statement','P0011'=>'ChapChap Account Information','P0012'=>'Sending Money NMB-NMB through NMB Mobile Information','P0013'=>'Sending Money through Pesa Fasta','P0014'=>'Sending Money from MPESA to NMB and vice versa','P0016'=>'NMB Products and Services','P0017'=>'Current/Saving Accounts Selection','P0018'=>'NMB Business Loan Information','P0019'=>'NMB Mortage and Housing Loan Information','P0020'=>'NMB Loan Information','P0021'=>'NMB Wisdom Loan Information','P0022'=>'Accounts Information selection','P0023'=>'NMB Bonus/Junior Account Selection','P0024'=>'NMB Personal Account Information','P0025'=>'NMB Wisdom Account Information','P0026'=>'NMB Student Account Information','P0027'=>'NMB Bonus Account Information','P0028'=>'NMB Junior Account Information','PCCARE'=>'Customer Care Request','CCare Connect'=>'Customer Care Connect');
    foreach($_GET['services1'] as $val){
        $service[$val] = $service1[$val];
    }
}
//preparing the durations
if($_GET['durations']){
    $duration = array("1"=>"1 Minute","2"=>"2 Minutes","3"=>"3 Minutes","4"=>"4 Minutes","5"=>"5 Minutes","6"=>"More than 5 Minutes");
}else{
    $duration1 = array("1"=>"1 Minute","2"=>"2 Minutes","3"=>"3 Minutes","4"=>"4 Minutes","5"=>"5 Minutes","6"=>"More than 5 Minutes");
    foreach($_GET['durations'] as $number){
        $duration[$number] = $duration1[$number];
    }
}
//preparing network number
if($_GET['serviceNumer']){
    $netoperator = array("1500"=>"TTCL","500"=>"VODACOM","784105900"=>"AIRTEL");

}else{
    $netoperator1 = array("1500"=>"TTCL","500"=>"VODACOM","784105900"=>"AIRTEL");
    foreach($_GET['serviceNumer'] as $number){
        $netoperator[$number] = $netoperator1[$number];
    }
}

//preparing hours
if($_GET['hours']){
    $hrs = array("00"=>"0000Hrs - 0100Hrs","01"=>"0100Hrs - 0200Hrs","02"=>"0200Hrs - 0300Hrs","03"=>"0300Hrs - 0400Hrs","04"=>"0400Hrs - 0500Hrs","05"=>"0500Hrs - 0600Hrs","06"=>"0600Hrs - 0700Hrs","07"=>"0700Hrs - 0800Hrs","08"=>"0800Hrs - 0900Hrs","09"=>"0900Hrs - 1000Hrs","10"=>"1000Hrs - 1100Hrs","11"=>"1100Hrs - 1200Hrs","12"=>"1200Hrs - 1300Hrs","13"=>"1300Hrs - 1400Hrs","14"=>"1400Hrs - 1500Hrs","15"=>"1500Hrs - 1600Hrs","16"=>"1600Hrs - 1700Hrs","17"=>"1700Hrs - 1800Hrs","18"=>"1800Hrs - 1900Hrs","19"=>"1900Hrs - 2000Hrs","20"=>"2000Hrs - 2100Hrs","21"=>"2100Hrs - 2200Hrs","22"=>"2200Hrs - 2300Hrs","23"=>"2300Hrs - 0000Hrs");
}else{
    $hrs1 = array("00"=>"0000Hrs - 0100Hrs","01"=>"0100Hrs - 0200Hrs","02"=>"0200Hrs - 0300Hrs","03"=>"0300Hrs - 0400Hrs","04"=>"0400Hrs - 0500Hrs","05"=>"0500Hrs - 0600Hrs","06"=>"0600Hrs - 0700Hrs","07"=>"0700Hrs - 0800Hrs","08"=>"0800Hrs - 0900Hrs","09"=>"0900Hrs - 1000Hrs","10"=>"1000Hrs - 1100Hrs","11"=>"1100Hrs - 1200Hrs","12"=>"1200Hrs - 1300Hrs","13"=>"1300Hrs - 1400Hrs","14"=>"1400Hrs - 1500Hrs","15"=>"1500Hrs - 1600Hrs","16"=>"1600Hrs - 1700Hrs","17"=>"1700Hrs - 1800Hrs","18"=>"1800Hrs - 1900Hrs","19"=>"1900Hrs - 2000Hrs","20"=>"2000Hrs - 2100Hrs","21"=>"2100Hrs - 2200Hrs","22"=>"2200Hrs - 2300Hrs","23"=>"2300Hrs - 0000Hrs");
    foreach($_GET['hours'] as $number){
        $hrs[$number] = $hrs1[$number];
    }

}
//preparing days
$weekdays = array();
$daystitle1 = array();
if($_GET['reporting_period'] == 'week'){
    $start = ($_GET['weekstart'] == "")?date('Y-m-d'):$_GET['weekstart'];
    for($i = 0;$i<7; $i++){
        $old = date('j M,Y',strtotime($start)+(60*60*24));
//        $weekdays[$i] = date('j M,Y',strtotime($start)+(60*60*24));
        $daystitle1 [] = date('j M Y',strtotime($start));
        $weekdays[$i] = date('Ymd',strtotime($start))."000000-".date('Ymd',strtotime($start)+(60*60*24))."000000";
        $start = $old;
    }
}
//preparing weeks
$weekslist = array();
$weektitle1 = array();
if($_GET['reporting_period'] == 'month'){
    $weestart = $_GET['year1']."-".$_GET['months'].'-01';
    for($i = 0;$i<4; $i++){
        $old = date('j M,Y',strtotime($weestart)+(60*60*24*7));
        $weektitle1[] = date('j',strtotime($weestart))." to ". date('j M Y',strtotime($weestart)+(60*60*24*7));
        $weekslist[$i] = date('YmdHis',strtotime($weestart))."-".date('YmdHis',strtotime($weestart)+(60*60*24*7));
        $weestart = $old;
    }
}
//preparing the columns according to selections
$colums = array();
if($_GET['category'] == 'network'){
    $colums = $netoperator;
}elseif($_GET['category'] == 'duration'){
    $colums = $duration;
}elseif($_GET['category'] == 'weeks'){
    $colums = $weektitle1;
}elseif($_GET['category'] == 'days'){
    $colums = $daystitle1;
}elseif($_GET['category'] == 'hours'){
    $colums = $hrs;
}
//preparing the database connection variables
$servername = "localhost";
$username = "root"; //pec
$password = "kevdom"; //parwanone
$dbname = "cdr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $query = "SHOW TABLES LIKE '{$logtable}'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
//    creating a query fo filtering time

    $query1 = "SELECT *
        FROM $logtable
        INNER JOIN $table
        ON $logtable.CALL_ID= $table.CALL_ID WHERE $table.DURATION is not null
        AND LOG_TYPE != 'Call Start' AND LOG_TYPE != 'Call End'
        AND LOG_LEVEL != '2'  AND LOG_LEVEL != '3'  AND LOG_LEVEL != '10'  AND LOG_LEVEL != '12'  AND LOG_LEVEL != '41.1'  AND LOG_LEVEL != '4'  AND LOG_LEVEL != '7'    AND LOG_LEVEL != '51'  AND LOG_LEVEL != '8'  AND LOG_LEVEL != '6'  AND LOG_LEVEL != '44'  AND LOG_LEVEL != '45'
         $timeQuery";
    $i = 0;
    ///////////////////////////////////////////////////////////////////
    //preparing the arrays for dumping//////////////
    $resultArray = array();
    if($_GET['category'] == 'network'){
        $title = "IVR Services Network Operators  $titletime";
        foreach($service as $servekey=>$srve){
            foreach($netoperator as $key=>$value){
                $dquery = $conn->query($query1." AND $table.CALLED_NUMBER = '$key' AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$value] = $dquery->num_rows;
            }
        }
        drawexcel($resultArray,$colums,$title);
    }
    elseif($_GET['category'] == 'duration'){
        $norrec = "<small>(".$conn->query("SELECT * FROM $logtable INNER JOIN $table ON $logtable.CALL_ID= $table.CALL_ID  WHERE $table.DURATION is null  $timeQuery ")->num_rows ." Calls Not Received)</small>";
        $title = "IVR Services CUstomer Call Duration   $titletime $norrec";
        foreach($service as $servekey=>$srve){
            foreach($duration as $key=>$value){
                $dimearr =  ($key == 6)?" > 5 ":" = $key";
                //AND TIMESTAMPDIFF(MINUTE,CALL_CONNECT_TIME,CALL_DISCONNECT_TIME) between 0 and 5
                $dquery = $conn->query($query1." AND TIMESTAMPDIFF(MINUTE,CALL_CONNECT_TIME,CALL_DISCONNECT_TIME) $dimearr AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$value] = $dquery->num_rows;
            }
        }
        drawexcel($resultArray,$colums,$title);
    }
    elseif($_GET['category'] == 'weeks'){
        $title = "IVR Services Weekly Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($weekslist as $key=>$value){
                $weekarr = explode("-",$value);
                $weektitle = date('j',strtotime($weekarr[0]))." to ". date('j M Y',strtotime($weekarr[1]));
                $dquery = $conn->query($query1." AND $logtable.ACTION_DATE_TIME BETWEEN '{$weekarr[0]}' AND '{$weekarr[1]}'  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$weektitle] = $dquery->num_rows;
            }
        }
        drawexcel($resultArray,$colums,$title);
    }
    elseif($_GET['category'] == 'days'){
        $title = "IVR Services Daily Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($weekdays as $key=>$value){
                $weekarr = explode("-",$value);
                $daytitle = date('j M Y',strtotime($weekarr[0]));
                $dquery = $conn->query($query1." AND $logtable.ACTION_DATE_TIME BETWEEN '{$weekarr[0]}' AND '{$weekarr[1]}'  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$daytitle] = $dquery->num_rows;
            }
        }
        drawexcel($resultArray,$colums,$title);
    }
    elseif($_GET['category'] == 'hours'){
        $title = "IVR Services Hourly Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($hrs as $key=>$value){
                $htarr = explode("-",$key);
                $start = date('Ymd',strtotime($_GET['day'])).$htarr[0]."";
                $start1 = date('Ymd',strtotime($_GET['day'])).$htarr[0]."0000";
                $end = date('YmdHis',strtotime($start1)+(60*60));
                $timeQuery2 = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start1' AND '$end' ";
                $dquery = $conn->query($query1." $timeQuery2  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$value] = $dquery->num_rows;
            }
        }
            drawexcel($resultArray,$colums,$title);
    }


} else {
    echo "<h3 class='text-primary text-center'>There are no data for $titletime</h3>";
}
$conn->close();

function drawexcel($resultArray,$colums,$title){
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();


// Set document properties
    $objPHPExcel->getProperties()->setCreator("IVR Caller Summary")
        ->setLastModifiedBy("User")
        ->setTitle("Callers")
        ->setSubject("Callers")
        ->setDescription("IVR Caller System")
        ->setKeywords("IVR php")
        ->setCategory("Result file");

    $latterArr = Array("A","B","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BM","BL","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ");
    $ttlecont = 1;

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells("A1:{$latterArr[$ttlecont-1]}1");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1',$title);
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $k=3; $colcount=1;
    foreach($resultArray as $keys => $cols){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A{$k}", $keys);
        foreach($cols as $colsval){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("{$latterArr[$colcount]}{$k}", $colsval);
            $colcount++;
        }
        $colcount=1;
        $k++;
    }



    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Call Summary');
    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}
