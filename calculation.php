<?php

include "./header.php";
$weeklyEarnings = 0;
$result = $dbc->query("SELECT * FROM `workhourslog` WHERE yearweek(DATE(`current_interval`), 1) = yearweek(curdate(), 1) AND `user_index` = " . $_SESSION['user_id']);

$daysOfWeek = [0, 0, 0, 0, 0, 0, 0];

while ($row = $result->fetch_assoc()) {
    #Hours of Work Per Day
    $datetime = new DateTime($row['current_interval']);
    $dayNumber = intval(date_format($datetime, 'N'));
    $daysOfWeek[$dayNumber - 1] += ($row['stop_time'] - $row['start_time']) / 3600;
    #Calculate Salary
    $weeklyEarnings += $row['earnings'];
};
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<div id="main">
    <div id="contentBody">

        <div class="box">

            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                        datasets: [{
                            label: 'Hours per Day',
                            data: [<?php echo ("$daysOfWeek[0], $daysOfWeek[1],$daysOfWeek[2],$daysOfWeek[3],$daysOfWeek[4],$daysOfWeek[5], $daysOfWeek[6],") ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>

        <div class="box2">
            <img src="images/money2.gif" alt="">
            <?php
            echo ("<p> You've Earned<br>");
            echo ("<div class='earning'>$weeklyEarnings\$</div>");
            echo ("this week.<br>");
            echo ("Now go earn more!<br>");
            echo ('<a id="workButton2" href="workPage.php">Start Work</a>');
            ?>
        </div>

    </div>

</div>


<?php include "./footer.php" ?>