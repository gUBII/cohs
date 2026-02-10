<?php
$tval = $_GET["tval"];
$tuse = $_GET["tuse"];
$tbal = $_GET["tbal"];
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chartContainer {
            width: 100%;   /* chart width */
            height: 300px;  /* chart height */
            margin: auto;
        }
        canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>
<body>
    <div id="chartContainer">
        <canvas id="budgetChart" style='margin-top:-45px'></canvas>
    </div>

    <script>
        const ctx = document.getElementById('budgetChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Budget Planned', 'Used', 'SOS Allocated'],
                datasets: [{
                    label: 'Budget',
                    data: [<?= $tval ?>, <?= $tuse ?>, <?= $tbal ?>],
                    backgroundColor: ['#FF6384', '#0ace00', '#36A2EB'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // ✅ lets height/width be controlled by CSS
                plugins: {
                    title: {
                        display: true
                    },
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>
</html>
