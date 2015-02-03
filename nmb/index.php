<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/jquery.multiselect.css">
    <link rel="stylesheet" href="css/jquery.multiselect.filter.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.1.11.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"  style="padding-top: 2px;padding-bottom: 3px">
                <img alt="Brand" src="images/nmb.jpg">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <h3 class="text-center col-sm-10">IVR Caller Summary Reports</h3>
            <ul class="nav navbar-nav">


            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">profile</a></li>
                        <li><a href="#">logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<form action="excel.php">
<div class="col-sm-12">
    <div class="col-sm-3">
        Year<br><?php date ?>
        <select name="year" class="form-control">
            <option value="2014">2014</option>
            <option value="2014">2015</option>
        </select>
    </div>
    <div class="col-sm-3">
        Reporting Period<br>
        <select name="period_type" class="form-control">
            <option value="month">Monthly</option>
            <option value="week">Weekly</option>
            <option value="day">Daily</option>
            <option value="hour">Hourly</option>
        </select>
    </div>
    <div class="col-sm-3" id="tochange">
        <div id="mounthlist">
       Select Month<br>
        <select name="month" id="mounthlist" class="form-control">
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        </div>
        <div id="weekstart">
                From<br>
                <input type="text" id="date" name="from" class="form-control" placeholder="From">

        </div>
        <div id="days">
            Select Date
            <input type="text" id="dada" name="selectdate" class="form-control" placeholder="Select Date">
        </div>
        <div id="hourlist">
            <div class="col-xs-6">
                Select Date
                <input type="text" id="dada" name="dayhour" class="form-control" placeholder="Select Date">
            </div>
            <div class="col-xs-6">
                Select Hour<br>
                <select class="form-control" name="firsthour">
                    <option value="00">0000Hrs - 0100Hrs</option>
                    <option value="01">0100Hrs - 0200Hrs</option>
                    <option value="02">0200Hrs - 0300Hrs</option>
                    <option value="03">0300Hrs - 0400Hrs</option>
                    <option value="04">0400Hrs - 0500Hrs</option>
                    <option value="05">0500Hrs - 0600Hrs</option>
                    <option value="06">0600Hrs - 0700Hrs</option>
                    <option value="07">0700Hrs - 0800Hrs</option>
                    <option value="08">0800Hrs - 0900Hrs</option>
                    <option value="09">0900Hrs - 1000Hrs</option>
                    <option value="10">1000Hrs - 1100Hrs</option>
                    <option value="11">1100Hrs - 1200Hrs</option>
                    <option value="12">1200Hrs - 1300Hrs</option>
                    <option value="13">1300Hrs - 1400Hrs</option>
                    <option value="14">1400Hrs - 1500Hrs</option>
                    <option value="15">1500Hrs - 1600Hrs</option>
                    <option value="16">1600Hrs - 1700Hrs</option>
                    <option value="17">1700Hrs - 1800Hrs</option>
                    <option value="18">1800Hrs - 1900Hrs</option>
                    <option value="19">1900Hrs - 2000Hrs</option>
                    <option value="20">2000Hrs - 2100Hrs</option>
                    <option value="21">2100Hrs - 2200Hrs</option>
                    <option value="22">2200Hrs - 2300Hrs</option>
                    <option value="23">2300Hrs - 0000Hrs</option>
                </select>

            </div>

        </div>


    </div>
    <div class="col-sm-3">
        Reporting Category
        <select name="category" class="form-control">
            <option value="network">Network Operator</option>
            <option value="duration">Duration</option>
            <option value="weeks">Weeks</option>
            <option value="days">Days</option>
            <option value="hours">Hours</option>
        </select>
    </div>
</div>
<script>
    $("#weekstart,#days,#hourlist").hide();
</script>
<div class="col-sm-12" style="margin-top: 8px">

    <div class="col-sm-3">
        Services<br>
        <select name="services" class="form-control data-element" multiple = "multiple">
            <option value="ATMDMF">Delay in MPESA Transaction</option>
            <option value="ATMDMF-01">Delay in MPESA Transaction</option>
<!--            <option value="">Welcome Note</option>-->
<!--            <option value="">Language Selection</option>-->
<!--            <option value="">Main Menu Selection</option>-->
            <option value="P0004">Jisevie Services</option>
            <option value="P0005">Loan/Account Services selection</option>
            <option value="P0006">Fund Transfer</option>
            <option value="P0007">SMS Alert regarding ATM Transaction</option>
            <option value="P0008">Expired/Lost/Stollen ATM Cards Information</option>
            <option value="P0009">Bill Payments through NMB Mobile</option>
            <option value="P0010">NMB E-Bank statement</option>
            <option value="P0011">ChapChap Account Information</option>
            <option value="P0012">Sending Money NMB-NMB through NMB Mobile Information</option>
            <option value="P0013">Sending Money through Pesa Fasta</option>
            <option value="P0014">Sending Money from MPESA to NMB and vice versa</option>
            <option value="P0016">NMB Products and Services</option>
            <option value="P0017">Current/Saving Accounts Selection</option>
            <option value="P0018">NMB Business Loan Information</option>
            <option value="P0019">NMB Mortage and Housing Loan Information</option>
            <option value="P0020">NMB Loan Information</option>
            <option value="P0021">NMB Wisdom Loan Information</option>
            <option value="P0022">Accounts Information selection</option>
            <option value="P0023">NMB Bonus/Junior Account Selection</option>
            <option value="P0024">NMB Personal Account Information</option>
            <option value="P0025">NMB Wisdom Account Information</option>
            <option value="P0026">NMB Student Account Information</option>
            <option value="P0027">NMB Bonus Account Information</option>
            <option value="P0028">NMB Junior Account Information</option>
<!--            <option value="">Busy Tone</option>-->
            <option value="PCCARE">Customer Care Request</option>
            <option value="CCare Connect">Customer Care Connect</option>
<!--            <option value="">Thanks for Calling NMB</option>-->
        </select>
    </div>
    <div class="col-sm-3" class="form-control data-element">
        Service Number<br>
        <select name="called" class="form-control data-element" multiple="multiple">
            <option value="1500">TTCL</option>
            <option value="500">Vodacom</option>
            <option value="784105900">Airtel</option>
        </select>
    </div>
    <div class="col-sm-3" >
        Call Duration<br>
        <select name="duration" class="form-control data-element" multiple="multiple">
            <option value="1">1 Minute</option>
            <option value="2">2 Minutes</option>
            <option value="3">3 Minutes</option>
            <option value="4">4 Minutes</option>
            <option value="5">5 Minutes</option>
            <option value="6">More than 5 Minutes</option>
        </select>
    </div>
    <div class="col-sm-3" id ="changing" style="visibility: hidden">
        <div class="hourselect">
            Select Hour<br>
            <select class="form-control data-element" multiple="multiple" name="hoursselect" >
                <option value="00">0000Hrs - 0100Hrs</option>
                <option value="01">0100Hrs - 0200Hrs</option>
                <option value="02">0200Hrs - 0300Hrs</option>
                <option value="03">0300Hrs - 0400Hrs</option>
                <option value="04">0400Hrs - 0500Hrs</option>
                <option value="05">0500Hrs - 0600Hrs</option>
                <option value="06">0600Hrs - 0700Hrs</option>
                <option value="07">0700Hrs - 0800Hrs</option>
                <option value="08">0800Hrs - 0900Hrs</option>
                <option value="09">0900Hrs - 1000Hrs</option>
                <option value="10">1000Hrs - 1100Hrs</option>
                <option value="11">1100Hrs - 1200Hrs</option>
                <option value="12">1200Hrs - 1300Hrs</option>
                <option value="13">1300Hrs - 1400Hrs</option>
                <option value="14">1400Hrs - 1500Hrs</option>
                <option value="15">1500Hrs - 1600Hrs</option>
                <option value="16">1600Hrs - 1700Hrs</option>
                <option value="17">1700Hrs - 1800Hrs</option>
                <option value="18">1800Hrs - 1900Hrs</option>
                <option value="19">1900Hrs - 2000Hrs</option>
                <option value="20">2000Hrs - 2100Hrs</option>
                <option value="21">2100Hrs - 2200Hrs</option>
                <option value="22">2200Hrs - 2300Hrs</option>
                <option value="23">2300Hrs - 0000Hrs</option>
            </select>
        </div>


    </div>

</div>

<div class="col-sm-12" style="margin-top: 15px">
    <div class="col-sm-12">
        <div class="btn-group btn-group-xs reports">
            <button type="button" class="btn btn-default" id="draw_table"><img src='images/table.png' style='height:20px;width:20px'> Table</button>
            <button type="button" class="btn btn-default" id="draw_bar"><img src='images/bar.png' style='height:20px;width:20px'> Bar Chart</button>
            <button type="button" class="btn btn-default" id="draw_column"><img src='images/column.png' style='height:20px;width:20px'> Column Chart</button>
            <button type="button" class="btn btn-default" id="draw_line"><img src='images/line.png' style='height:20px;width:20px'> Line Chart</button>
            <button type="button" class="btn btn-default" id="draw_pie"><img src='images/pie.png' style='height:20px;width:20px'> Pie Chart</button>
            <button type="button" class="btn btn-default" id="draw_staked"><img src='images/stacked.png' style='height:20px;width:20px'> Stacked Chart</button>
            <button type="button" class="btn btn-default" id="draw_spider"><img src='images/spider.jpg' style='height:20px;width:20px'> Spider Chart</button>
            <button type="button" class="btn btn-default" id="draw_combined"><img src='images/combined.jpg' style='height:20px;width:20px'> Combined Chart</button>
            <button class="btn btn-default" type="button" id="export_cvs"  style="margin-left: 5px"><img src='images/cvs.jpg' style='height:20px;width:20px'> Export to Excel</button>
        </div>
    </div>
</div>

</form>
<div class="col-sm-12">
<div class="col-sm-12" id="container" style="margin-top: 15px;height: 700px">
    <div class="col-sm-12">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src='images/data3.jpg' style="height: 450px; width: 100%" class="img-responsive img-rounded">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src='images/data4.jpg' style="height: 450px; width: 100%" class="img-responsive img-rounded">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src='images/data2.jpg' style="height: 400px; width: 100%" class="img-responsive img-rounded">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src='images/data1.jpg' style="height: 400px; width: 100%" class="img-responsive img-rounded">
                <div class="carousel-caption">
                    ...
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jqueryui/jquery-ui.min.js"></script>
<script src="js/jquery.multiselect.js"></script>
<script src="js/jquery.multiselect.filter.js"></script>
<script src="js/jquery.form.js"></script>
<script src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>
<script src="Highcharts/js/themes/sand-signika.js"></script>
<script src="Highcharts/js/highcharts-more.js"></script>
<script src="js/bar.js"></script>
<script src="js/column.js"></script>
<script src="js/combined.js"></script>
<script src="js/line.js"></script>
<script src="js/spiderweb.js"></script>
<script src="js/pie.js"></script>
<script src="js/staked.js"></script>
<script src="js/table.js"></script>
<script src="js/script.js"></script>
</body>
</html>