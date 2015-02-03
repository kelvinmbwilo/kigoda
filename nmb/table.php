<?php


//prepare a table
$table = "ivr_call_log_".$_POST['year1'];
$month11 = "";
$timeQuery = "";
$titletime = "";
$defaultDate= date('Y-m-d');
$logtable = "ivr_calllog_detail_".$_POST['year1'];
if($_POST['reporting_period'] == 'month'){
   $table .= $_POST['months'];
    $month11 = date('F',strtotime($_POST['year1'].'-'.$_POST['months'].'-'.'01'));
    $logtable .= $_POST['months'];
    $titletime = $month11." ".$_POST['year1'];
}elseif($_POST['reporting_period'] == 'week'){
    $table .= date('m',strtotime($_POST['weekstart']));
    $logtable .= date('m',strtotime($_POST['weekstart']));
    $month11 = date('F',strtotime($_POST['weekstart']));
    $start = date('YmdHis',strtotime($_POST['weekstart']));
    $end = date('YmdHis',strtotime($_POST['weekstart'])+(60*60*24*7));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start' AND '$end' ";
    $titletime = date('jS',strtotime($start))." To ".date('jS F Y',strtotime($end));
}elseif($_POST['reporting_period'] == 'day'){
    $table .= date('m',strtotime($_POST['day']));
    $logtable .= date('m',strtotime($_POST['day']));
    $start = date('YmdHis',strtotime($_POST['day']));
    $end = date('YmdHis',strtotime($_POST['day'])+(60*60*24));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start' AND '$end' ";
    $titletime = date('jS F Y',strtotime($start));
    $month11 = date('F',strtotime($_POST['day']));
}elseif($_POST['reporting_period'] == 'hour'){
    $table .= date('m',strtotime($_POST['hourday']));
    $logtable .= date('m',strtotime($_POST['hourday']));
    $htarr = explode("-",$_POST['hoursselect']);
    $start = date('Ymd',strtotime($_POST['hourday'])).$htarr[0]."";
    $start1 = date('Ymd',strtotime($_POST['hourday'])).$htarr[0]."0000";
    $end = date('YmdHis',strtotime($start1)+(60*60));
    $timeQuery = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start1' AND '$end' ";
    $titletime = date('gA',strtotime($start1))." To ".date('gA jS F Y',strtotime($end));
    $month11 = date('F',strtotime($_POST['hourday']));
}

//preparing services
if($_POST['services1'] == ""){
    $service  = array('ATMDMF'=>'Delay in MPESA Transaction','ATMDMF-01'=>'Delay in MPESA Transaction','P0004'=>'Jisevie Services','P0005'=>'Loan/Account Services selection','P0006'=>'Fund Transfer','P0007'=>'SMS Alert regarding ATM Transaction','P0008'=>'Expired/Lost/Stollen ATM Cards Information','P0009'=>'Bill Payments through NMB Mobile','P0010'=>'NMB E-Bank statement','P0011'=>'ChapChap Account Information','P0012'=>'Sending Money NMB-NMB through NMB Mobile Information','P0013'=>'Sending Money through Pesa Fasta','P0014'=>'Sending Money from MPESA to NMB and vice versa','P0016'=>'NMB Products and Services','P0017'=>'Current/Saving Accounts Selection','P0018'=>'NMB Business Loan Information','P0019'=>'NMB Mortage and Housing Loan Information','P0020'=>'NMB Loan Information','P0021'=>'NMB Wisdom Loan Information','P0022'=>'Accounts Information selection','P0023'=>'NMB Bonus/Junior Account Selection','P0024'=>'NMB Personal Account Information','P0025'=>'NMB Wisdom Account Information','P0026'=>'NMB Student Account Information','P0027'=>'NMB Bonus Account Information','P0028'=>'NMB Junior Account Information','PCCARE'=>'Customer Care Request','CCare Connect'=>'Customer Care Connect');
}else{
    $service1  = array('ATMDMF'=>'Delay in MPESA Transaction','ATMDMF-01'=>'Delay in MPESA Transaction','P0004'=>'Jisevie Services','P0005'=>'Loan/Account Services selection','P0006'=>'Fund Transfer','P0007'=>'SMS Alert regarding ATM Transaction','P0008'=>'Expired/Lost/Stollen ATM Cards Information','P0009'=>'Bill Payments through NMB Mobile','P0010'=>'NMB E-Bank statement','P0011'=>'ChapChap Account Information','P0012'=>'Sending Money NMB-NMB through NMB Mobile Information','P0013'=>'Sending Money through Pesa Fasta','P0014'=>'Sending Money from MPESA to NMB and vice versa','P0016'=>'NMB Products and Services','P0017'=>'Current/Saving Accounts Selection','P0018'=>'NMB Business Loan Information','P0019'=>'NMB Mortage and Housing Loan Information','P0020'=>'NMB Loan Information','P0021'=>'NMB Wisdom Loan Information','P0022'=>'Accounts Information selection','P0023'=>'NMB Bonus/Junior Account Selection','P0024'=>'NMB Personal Account Information','P0025'=>'NMB Wisdom Account Information','P0026'=>'NMB Student Account Information','P0027'=>'NMB Bonus Account Information','P0028'=>'NMB Junior Account Information','PCCARE'=>'Customer Care Request','CCare Connect'=>'Customer Care Connect');
    foreach($_POST['services1'] as $val){
        $service[$val] = $service1[$val];
    }
}
//preparing the durations
if($_POST['durations'] == ""){
    $duration = array("1"=>"1 Minute","2"=>"2 Minutes","3"=>"3 Minutes","4"=>"4 Minutes","5"=>"5 Minutes","6"=>"More than 5 Minutes");
}else{
    $duration1 = array("1"=>"1 Minute","2"=>"2 Minutes","3"=>"3 Minutes","4"=>"4 Minutes","5"=>"5 Minutes","6"=>"More than 5 Minutes");
    foreach($_POST['durations'] as $number){
        $duration[$number] = $duration1[$number];
    }
}

//preparing network number
if($_POST['serviceNumer'] == ""){
    $netoperator = array("1500"=>"TTCL","500"=>"VODACOM","784105900"=>"AIRTEL");
}else{
    $netoperator1 = array("1500"=>"TTCL","500"=>"VODACOM","784105900"=>"AIRTEL");
    foreach($_POST['serviceNumer'] as $number){
        $netoperator[$number] = $netoperator1[$number];
    }
}
//preparing hours
if($_POST['hours'] == ""){
    $hrs = array("00"=>"0000Hrs - 0100Hrs","01"=>"0100Hrs - 0200Hrs","02"=>"0200Hrs - 0300Hrs","03"=>"0300Hrs - 0400Hrs","04"=>"0400Hrs - 0500Hrs","05"=>"0500Hrs - 0600Hrs","06"=>"0600Hrs - 0700Hrs","07"=>"0700Hrs - 0800Hrs","08"=>"0800Hrs - 0900Hrs","09"=>"0900Hrs - 1000Hrs","10"=>"1000Hrs - 1100Hrs","11"=>"1100Hrs - 1200Hrs","12"=>"1200Hrs - 1300Hrs","13"=>"1300Hrs - 1400Hrs","14"=>"1400Hrs - 1500Hrs","15"=>"1500Hrs - 1600Hrs","16"=>"1600Hrs - 1700Hrs","17"=>"1700Hrs - 1800Hrs","18"=>"1800Hrs - 1900Hrs","19"=>"1900Hrs - 2000Hrs","20"=>"2000Hrs - 2100Hrs","21"=>"2100Hrs - 2200Hrs","22"=>"2200Hrs - 2300Hrs","23"=>"2300Hrs - 0000Hrs");
}else{
    $hrs1 = array("00"=>"0000Hrs - 0100Hrs","01"=>"0100Hrs - 0200Hrs","02"=>"0200Hrs - 0300Hrs","03"=>"0300Hrs - 0400Hrs","04"=>"0400Hrs - 0500Hrs","05"=>"0500Hrs - 0600Hrs","06"=>"0600Hrs - 0700Hrs","07"=>"0700Hrs - 0800Hrs","08"=>"0800Hrs - 0900Hrs","09"=>"0900Hrs - 1000Hrs","10"=>"1000Hrs - 1100Hrs","11"=>"1100Hrs - 1200Hrs","12"=>"1200Hrs - 1300Hrs","13"=>"1300Hrs - 1400Hrs","14"=>"1400Hrs - 1500Hrs","15"=>"1500Hrs - 1600Hrs","16"=>"1600Hrs - 1700Hrs","17"=>"1700Hrs - 1800Hrs","18"=>"1800Hrs - 1900Hrs","19"=>"1900Hrs - 2000Hrs","20"=>"2000Hrs - 2100Hrs","21"=>"2100Hrs - 2200Hrs","22"=>"2200Hrs - 2300Hrs","23"=>"2300Hrs - 0000Hrs");
    foreach($_POST['hours'] as $number){
        $hrs[$number] = $hrs1[$number];
    }

}
//preparing days
$weekdays = array();
$daystitle1 = array();
if($_POST['reporting_period'] == 'week'){
    $start = ($_POST['weekstart'] == "")?date('Y-m-d'):$_POST['weekstart'];
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
if($_POST['reporting_period'] == 'month'){
    $weestart = $_POST['year1']."-".$_POST['months'].'-01';
    for($i = 0;$i<4; $i++){
        $old = date('j M,Y',strtotime($weestart)+(60*60*24*7));
        $weektitle1[] = date('j',strtotime($weestart))." to ". date('j M Y',strtotime($weestart)+(60*60*24*7));
        $weekslist[$i] = date('YmdHis',strtotime($weestart))."-".date('YmdHis',strtotime($weestart)+(60*60*24*7));
        $weestart = $old;
    }
}
//preparing the columns according to selections
$colums = array();
if($_POST['category'] == 'network'){
  $colums = $netoperator;
}elseif($_POST['category'] == 'duration'){
  $colums = $duration;
}elseif($_POST['category'] == 'weeks'){
  $colums = $weektitle1;
}elseif($_POST['category'] == 'days'){
   $colums = $daystitle1;
}elseif($_POST['category'] == 'hours'){
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
    if($_POST['category'] == 'network'){
        $title = "IVR Services Network Operators  $titletime";
        foreach($service as $servekey=>$srve){
            foreach($netoperator as $key=>$value){
                $dquery = $conn->query($query1." AND $table.CALLED_NUMBER = '$key' AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$value] = $dquery->num_rows;
            }
        }
        if($_POST['idd'] == "draw_table"){
            drawtable($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_bar"){
            drawbar($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_column"){
            dracol($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_line"){
            drawline($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_staked"){
            drawstack($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_spider"){
            drawsspider($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_combined"){
            drawcombined($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_pie"){
            drawpie($resultArray,$colums,$title);
        }
    }
    elseif($_POST['category'] == 'duration'){
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
        if($_POST['idd'] == "draw_table"){
            drawtable($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_bar"){
            drawbar($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_column"){
            dracol($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_line"){
            drawline($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_staked"){
            drawstack($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_spider"){
            drawsspider($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_combined"){
            drawcombined($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_pie"){
            drawpie($resultArray,$colums,$title);
        }
    }
    elseif($_POST['category'] == 'weeks'){
        $title = "IVR Services Weekly Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($weekslist as $key=>$value){
                $weekarr = explode("-",$value);
                $weektitle = date('j',strtotime($weekarr[0]))." to ". date('j M Y',strtotime($weekarr[1]));
                $dquery = $conn->query($query1." AND $logtable.ACTION_DATE_TIME BETWEEN '{$weekarr[0]}' AND '{$weekarr[1]}'  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$weektitle] = $dquery->num_rows;
            }
        }
        if($_POST['idd'] == "draw_table"){
            drawtable($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_bar"){
            drawbar($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_column"){
            dracol($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_line"){
            drawline($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_staked"){
            drawstack($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_spider"){
            drawsspider($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_combined"){
            drawcombined($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_pie"){
            drawpie($resultArray,$colums,$title);
        }
    }
    elseif($_POST['category'] == 'days'){
        $title = "IVR Services Daily Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($weekdays as $key=>$value){
                $weekarr = explode("-",$value);
                $daytitle = date('j M Y',strtotime($weekarr[0]));
                $dquery = $conn->query($query1." AND $logtable.ACTION_DATE_TIME BETWEEN '{$weekarr[0]}' AND '{$weekarr[1]}'  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$daytitle] = $dquery->num_rows;
            }
        }
        if($_POST['idd'] == "draw_table"){
            drawtable($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_bar"){
            drawbar($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_column"){
            dracol($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_line"){
            drawline($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_staked"){
            drawstack($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_spider"){
            drawsspider($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_combined"){
            drawcombined($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_pie"){
            drawpie($resultArray,$colums,$title);
        }
    }
    elseif($_POST['category'] == 'hours'){
        $title = "IVR Services Hourly Call Distribution $titletime";
        foreach($service as $servekey=>$srve){
            foreach($hrs as $key=>$value){
                $htarr = explode("-",$key);
                $start = date('Ymd',strtotime($_POST['day'])).$htarr[0]."";
                $start1 = date('Ymd',strtotime($_POST['day'])).$htarr[0]."0000";
                $end = date('YmdHis',strtotime($start1)+(60*60));
                $timeQuery2 = " AND $logtable.ACTION_DATE_TIME BETWEEN '$start1' AND '$end' ";
                $dquery = $conn->query($query1." $timeQuery2  AND $logtable.LOG_TEXT LIKE '%$servekey%'");
                $resultArray[$srve][$value] = $dquery->num_rows;
            }
        }
        if($_POST['idd'] == "draw_table"){
            drawtable($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_bar"){
            drawbar($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_column"){
            dracol($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_line"){
            drawline($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_staked"){
            drawstack($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_spider"){
            drawsspider($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_combined"){
            drawcombined($resultArray,$colums,$title);
        }elseif($_POST['idd'] == "draw_pie"){
            drawpie($resultArray,$colums,$title);
        }
    }


} else {
    echo "<h3 class='text-primary text-center'>There are no data for $titletime</h3>";
}
$conn->close();

function drawtable($array,$colums,$title){
    echo "<h3 class='text-center text-primary'>$title</h3>";
    echo "<table class='table-responsive table table-bordered'>";
    echo "<tr>";
    echo "<th>Services</th>";
    foreach($colums as $val){
        echo "<th>$val</th>";
    }
    echo "</tr>";
    foreach($array as $key=>$value){
        echo "<tr>";
        echo "<td>$key</td>";
        foreach($colums as $k=>$val1){
            echo "<td>".$value[$val1]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function drawbar($array,$colums,$title){
    $categories = "[";
    $series = "[";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
    $series .= "]";
    ?>

<script>
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $title ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories ?>,
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                rotation: -90,
                borderWidth: 0
            }
        },
        series: <?php echo $series ?>

    });
</script>
<?php
}

function dracol($array,$colums,$title){
    $categories = "[";
    $series = "[";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
    $series .= "]";
    ?>

<script>
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '<?php echo $title ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories ?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                rotation: -90,
                borderWidth: 0
            }
        },
        series: <?php echo $series ?>

    });
</script>
<?php
}

function drawline($array,$colums,$title){
    $categories = "[";
    $series = "[";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
    $series .= "]";
    ?>

<script>
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '<?php echo $title ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories ?>,
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                rotation: -90,
                borderWidth: 0
            }
        },
        series: <?php echo $series ?>

    });
</script>
<?php
}

function drawstack($array,$colums,$title){
    $categories = "[";
    $series = "[";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
    $series .= "]";
    ?>

<script>
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $title ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories ?>,
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: <?php echo $series ?>

    });
</script>
<?php
}

function drawsspider($array,$colums,$title){
    $categories = "[";
    $series = "[";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
    $series .= "]";
    ?>

<script>
    $('#container').highcharts({
        chart: {
            polar: true,
            type: 'line'
        },
        title: {
            text: '<?php echo $title ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories ?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: <?php echo $series ?>

    });
</script>
<?php
}

function drawcombined($array,$colums,$title){
    $categories = "[";
    $series = "";
    $lineSeries = "";
    $i = 0;
    foreach($array as $key=>$value){
        $i++;

        $categories .= ($i == count($array))?"'$key'":"'$key',";
    }
    $j = 0;
    foreach($colums as $k=>$val1){
        $j++;
        $series .="{type: 'column',name:'$val1',data:[";
        $lineSeries .="{type: 'spline',name:'$val1',data:[";
        $k =0;
        foreach($array as $key=>$value){
            $k++;
            $series .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
            $lineSeries .= ($k == count($array))?"{$value[$val1]}":"{$value[$val1]},";
        }
        $series .=($j == count($colums))?"]},":"]},";
        $lineSeries .=($j == count($colums))?"]}":"]},";
    }
    $categories .= "]";
//    echo $series.$lineSeries;exit;
    ?>

    <script>
        $('#container').highcharts({
            title: {
                text: '<?php echo $title ?>'
            },
            xAxis: {
                categories: <?php echo $categories; ?>,
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            labels: {
                items: [{
                    html: 'Total fruit consumption',
                    style: {
                        left: '50px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [<?php echo $series.$lineSeries ?>]

        });
    </script>
<?php
}

function drawpie($array,$colums,$title){
    $series = "";
    $i = 0;
    foreach($colums as $k=>$val1){
        $j = 0;$i++;
        foreach($array as $key=>$value){
            $j++;
            $series .= ($j == count($array))?"['{$key} {$val1}', {$value[$val1]}]":"['{$key} {$val1}', {$value[$val1]}],";
        }
        $series .=($i == count($colums))?"":",";
    }
//    echo $series;exit;
    ?>

    <script>
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 1,//null,
                plotShadow: false
            },
            title: {
                text: '<?php echo $title ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.value}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Customers',
                data: [
                    <?php echo $series ?>
                ]
            }]
        });
    </script>
<?php
}

