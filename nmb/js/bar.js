function drawBar(url){
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'IVR Services Summary Nov 2014'
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

