/**
 * Created by kelvin Mbwilo on 8/18/14.
 */
function drawStaked(url){
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'IVR Services Summary Nov 2014'
        },
        xAxis: {
            categories: [
                'Jisevie Services',
                'Fund Transfer',
                'SMS Alert regarding ATM Transaction',
                'Expired/Lost/Stollen ATM Cards Information',
                'Bill Payments through NMB Mobile',
                'NMB E-Bank statement',
                'ChapChap Account Information',
                'Sending Money NMB-NMB through NMB Mobile Information',
                'Sending Money through Pesa Fasta',
                'NMB Business Loan Information',
                'NMB Loan Information',
                'NMB Wisdom Loan Information'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Customers'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -70,
            verticalAlign: 'top',
            y: 20,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
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
        series: [{
            name: 'Airtel',
            data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

        }, {
            name: 'Zantel',
            data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

        }, {
            name: 'Vodacom',
            data: [48, 38, 39, 41, 47, 48, 59, 59, 52, 65, 59, 51]

        },{
            name: 'TTCL',
            data: [42, 33, 34, 39, 52, 75, 57, 60, 47, 39, 46, 51]

        }]
    });
}

