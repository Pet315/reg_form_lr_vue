<!DOCTYPE html>
<head>
    <title>Function Graph</title>
</head>
<body>
<div style="height: 1000px; width: 1000px">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    // Генеруємо дані для графіка
    var data = {
        labels: Array.from({ length: 11 }, (_, i) => i - 5),
        datasets: [{
            label: 'Function у = х^2',
            data: Array.from({ length: 11 }, (_, i) => Math.pow(i - 5, 2)),
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false
        }]};

    // var data = {
    //     labels: [-5, -4, -3, -2, -1, 0, 1, 2, 3, 4, 5],
    //     datasets: [{
    //         label: 'Графік функції у = х^2',
    //         data: [25, 16, 9, 4, 1, 0, 1, 4, 9, 16, 25],
    //         borderColor: 'rgba(75, 192, 192, 1)',
    //         borderWidth: 1
    //     }]};

    var options = {
        scales: {
            x: [{
                type: 'linear',
                position: 'bottom'
            }],
            y: [{
                type: 'linear',
                position: 'left'
            }]
        }
    };

    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false
    };

    var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options,
        chartOptions: chartOptions
    });
</script>
</body>
