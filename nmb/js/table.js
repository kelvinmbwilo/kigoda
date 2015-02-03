function drawTable(url){
    $()
    var airtel = new Array(49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54);
    var tigo   = new Array(83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92);
    var voda   = new Array(48, 38, 39, 41, 47, 48, 59, 59, 52, 65, 59, 51);
    var ttcl   = new Array(42, 33, 34, 39, 52, 75, 57, 60, 47, 39, 46, 51);
    var service = new Array('Jisevie Services','Fund Transfer','SMS Alert regarding ATM Transaction','Expired/Lost/Stollen ATM Cards Information','Bill Payments through NMB Mobile','NMB E-Bank statement','ChapChap Account Information','Sending Money NMB-NMB through NMB Mobile Information','Sending Money through Pesa Fasta','NMB Business Loan Information','NMB Loan Information','NMB Wisdom Loan Information');
    var table = "<h3 class='text-center text-primary'>IVR Services Distribution Nov 2014</h3>"
    table += "<table class='table table-bordered table-condensed'>";
    table += '<tr>';
    table += '<th>Service</th>';
    table += '<th>Airtel</th>';
    table += '<th>Vodacom</th>';
    table += '<th>Zantel</th>';
    table += '<th>TTCL</th>';
    table += '</tr>';
    for(var i=0; i<service.length; i++){
        table += '<tr>';
        table += '<td>'+service[i]+'</td>';
//        for(var j=0; j<airtel.length; j++){
            table += '<td>'+airtel[i]+'</td>';
            table += '<td>'+voda[i]+'</td>';
            table += '<td>'+tigo[i]+'</td>';
            table += '<td>'+ttcl[i]+'</td>';
//        }
        table += '</tr>';
    }
    table +=  "</table>";
        $('#container').html(table);
}
