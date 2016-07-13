/**
 * Created by castrilu on 13/07/2016.
 */
jQuery(function () {
    jQuery('#tbTotals:parent').prepend('<span>Cargando...</span>');
    jQuery.ajax({
        url: 'LoadLogs.php',
        method: 'get',
        dataType: 'json'
    }).done(function (result) {
        jQuery('#tbTotals:parent span').html('');
        addDataTables(result.arrLabels, Object.values(result.arrTotal));
        createChart(result.arrLabelsErr, Object.values(result.arrTotalErr));
    }).error(function () {
        jQuery('#tbTotals:parent span').html('Error cargando los datos Ajax.');
    });
});

function addDataTables(arrLabels, arrValues) {
    arrLabels.forEach(function (strLabel) {
        jQuery('#tbTotals>thead>tr:first-child').append('<th>' + strLabel + '</th>');
    });

    arrValues.forEach(function (intValue) {
        jQuery('#tbTotals>tbody>tr:first-child').append('<td>' + intValue + '</td>');
    })
    jQuery('#tbTotals').show(500);
}

function createChart(arrLabels, arrValues) {
    var data = {
        labels: arrLabels,
        datasets: [
            {
                label: "Total Logs",
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 1,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
                data: arrValues,
            }
        ]
    };
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx,{
        type: 'bar',
        data: data,
        options: {
            responsive: false
        }
    });
}