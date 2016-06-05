/**
 * Created by kelvin on 11/27/14.
 */
$(document).ready(function(){
    $( "#from" ).datepicker({
        defaultDate: "+1w"
    });

     var week = $("#weekstart").html();
     var days = $("#days").html();
     var hour = $("#hourlist").html();
     var month = $("#mounthlist").html();
    $("#weekstart,#days,#hourlist").remove();
    $(".data-element").css('width', '180px');
    $("select[name=category]").find("option[value=days]").hide();
    $("select[name=category]").find("option[value=hours]").hide();
    $(".data-element").multiselect().multiselectfilter();
    $('select[name=period_type]').change(function(){
        if($(this).val() == 'month'){
            $("#tochange").html(month);
            $("#mounthlist").show('slow');
            $("select[name=category]").find("option").show();
            $("select[name=category]").find("option[value=days]").hide();
            $("select[name=category]").find("option[value=hours]").hide();
        }if($(this).val() == 'week'){
            $("#tochange").html(week);
            $("#weekstart").show('slow')
            $( "#date" ).datepicker({
                defaultDate: "+1w"
            });
            $("select[name=category]").val("network");
            $("select[name=category]").find("option").show();
            $("select[name=category]").find("option[value=hours]").hide();
            $("select[name=category]").find("option[value=weeks]").hide();
        }if($(this).val() == 'day'){
            $("#tochange").html(days);
            $("#days").show('slow');
            $("select[name=category]").val("network");
            $("select[name=category]").find("option").show();
            $("select[name=category]").find("option[value=days]").hide();
            $("select[name=category]").find("option[value=weeks]").hide();

        }if($(this).val() == 'hour'){
            $("#tochange").html(hour);
            $("#hourlist").show('slow');
            $("select[name=category]").val("network");
            $("select[name=category]").find("option[value=days]").hide();
            $("select[name=category]").find("option[value=weeks]").hide();
        }
        $( "#dada" ).datepicker({
            defaultDate: "+1w"
        });

    })

    $('select[name=category]').change(function(){
        $('select[name=series]').find('option').show();
        $('select[name=series]').find('option[value='+$(this).val()+']').hide();
    });

//    button click application
    $('.reports button').click(function () {
        var idd = $(this).attr('id');
        $('#container').html('<i class="fa fa-spinner fa-spin fa-3x"></i> Loading...')
            var year1 = $("select[name=year]").val();
            var reporting_period = $("select[name=period_type]").val();
            var months = $("select[name=month]").val();
            var category = $("select[name=category]").val();
            var services1 = $("select[name=services]").val();
            var serviceNumer = $("select[name=called]").val();
            var durations = $("select[name=duration]").val();
            var hours = $("select[name=hoursselect]").val();

            var weekstart = "";
            var day = "";
            var hourday = "";
            var hoursselect = "";

        if(reporting_period === "month"){

        }if(reporting_period === "week"){
            weekstart = $("input[name=from]").val();
        }if(reporting_period === "day"){
            day = $("Input[name=selectdate]").val();
        }if(reporting_period === "hour"){
            hourday = $("input[name=dayhour]").val();
            hoursselect = $("select[name=firsthour]").val();
        }
            var url = 'table.php';

        if(idd == 'export_cvs'){
            var str = 'year1='+year1;
                str += '&reporting_period='+reporting_period;
                str +='&months='+months;
                str +='&category='+category;
                str +='&hours='+hours;
                str +='&weekstart='+weekstart;
                str +='&day='+day;
                str +='&hourday='+hourday;
                str +='&hoursselect='+hoursselect;
                str +='&services1='+services1;
                str +='&serviceNumer='+serviceNumer;
                str +='&durations='+durations;
            window.location.assign("excel.php?"+str)
        }else{
            $.post(url,{
                'year1':year1,
                'reporting_period':reporting_period,
                'months':months,
                'category':category,
                'hours':hours,
                'weekstart':weekstart,
                'day':day,
                'hourday':hourday,
                'hoursselect':hoursselect,
                'services1':services1,
                'serviceNumer':serviceNumer,
                'durations':durations,
                'idd':idd

            },function(data){
                $('#container').html(data);
            })
        }

            //checking types of report needed and react accordingly
            //drawing table
//            if ($(this).attr('id') == 'draw_table') {
//                drawTable(url);
//            }
//            //drawing bar chart
//            if ($(this).attr('id') == 'draw_bar') {
//                drawBar(url);
//            }
//            //drawing column chart
//            if ($(this).attr('id') == 'draw_column') {
//                drawColumn(url);
//            }
//            //drawing line chart
//            if ($(this).attr('id') == 'draw_line') {
//                drawLine(url);
//            }
//            //drawing pie chat
//            if ($(this).attr('id') == 'draw_pie') {
//                drawPie(url);
//            }
//            //drawing staked chat
//            if ($(this).attr('id') == 'draw_staked') {
//                drawStaked(url);
//            }
//            //drawing spider chat
//            if ($(this).attr('id') == 'draw_spider') {
//                drawSpider(url);
//            }
//            //drawing combined chat
//            if ($(this).attr('id') == 'draw_combined') {
//                drawCombined(url);
//            }
//            //exporting data to excel
//            if ($(this).attr('id') == 'export_cvs') {
//                window.location = '../api/analytics.xls?' + data_dimension + '&' + column_dimension + '&' + filter;
//            }
    })
})