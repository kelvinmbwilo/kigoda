function drawLine(title,url,category,dataArray){
    $('#container').highcharts({
        title: {
            text: 'IVR Services Summary Nov 2014',
            x: -20 //center
        },
        subtitle: {
            text: ''
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
            title: {
                text: 'Customers'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Cutomers'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
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
