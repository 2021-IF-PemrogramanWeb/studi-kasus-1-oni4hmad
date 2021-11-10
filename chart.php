<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <style>
        #myButton {
            padding-top: 50px;
        }
    </style>
    <?php
        include_once "./php/includes/sessionchk.inc.php";
    ?>
</head>

<body>
    <div id="myButton" class="container">
        <div class="row">
            <div class="col text-center">
                <button onclick="window.location.href='./table.php'" type="button"
                    class="btn btn-primary">Check Table</button>
            </div>
        </div>
    </div>

    <div class="container">
        <canvas id="myChart"></canvas>
    </div>

    <script type="text/javascript">
        <?php
            include_once "./php/includes/dbh.inc.php";
            
            // connect to mysql database
            $mysqli = $connectdb;

            $colors = array("rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)", "rgba(75, 192, 192, 0.6)", "rgba(153, 102, 255, 0.6)", "rgba(255, 159, 64, 0.6)", "rgba(255, 99, 132, 0.6)");
            $sql = "select tempat_lahir, count(users_id) as jumlah from biodata GROUP BY tempat_lahir;";
            $result = mysqli_query($mysqli, $sql);
            $row_count = mysqli_num_rows($result);
            while($row = $result->fetch_array()) {
                $rows[] = $row;
            }
        ?>

        let myChart = document.getElementById("myChart").getContext('2d');

        let massPopChart = new Chart(myChart, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: [
                    <?php
                        // for($i = 1; $i <= $row_count; $i++) {
                        //     $row = mysqli_fetch_array($result);
                        //     echo $i < $row_count ? '"'.$row["tempat_lahir"].'",' : "\"".$row["tempat_lahir"].'"';
                        // }
                        for($i = 0; $i < $row_count; $i++) {
                            echo $i < $row_count-1 ? '"'.$rows[$i]["tempat_lahir"].'",' : "\"".$rows[$i]["tempat_lahir"].'"';
                        }
                    ?>
                ],
                datasets: [{
                    label: "Jumlah",
                    data: [
                        <?php
                            // for($i = 1; $i <= $row_count; $i++) {
                            //     $row = mysqli_fetch_array($result);
                            //     echo $i < $row_count ? $row["jumlah"]."," : $row["jumlah"];
                            // }
                            for($i = 0; $i < $row_count; $i++) {
                                echo $i < $row_count-1 ? $rows[$i]["jumlah"]."," : $rows[$i]["jumlah"];
                            }
                        ?>
                    ],
                    // backgroundColor: 'green'
                    backgroundColor: [
                        <?php
                            // for($i = 1; $i < $row_count; $i++) {
                            //     $row = mysqli_fetch_array($result);
                            //     echo $i < $row_count ? $colors[$i-1]."," : $colors[$i-1];
                            // }
                            for($i = 0; $i < $row_count; $i++) {
                                echo $i < $row_count-1 ? "'".$colors[$i]."'," : "'".$colors[$i]."'";
                            }
                        ?>
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#555'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Julmah Mahasiswa/Tempat Lahir',
                    fontSize: 25
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: '#000'
                    }
                },
                layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        bottom: 0,
                        top: 50
                    }
                },
                tooltips: {
                    enabled: true
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,   // minimum value will be 0.
                            // suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                        }
                    }]
                }
            }
        });
    </script>

    <div id="myButton" class="container">
        <div class="row">
            <div class="col text-center">
                <button onclick="window.location.href='./php/logout.php'" type="button"
                    class="btn btn-primary">Logout</button>
            </div>
        </div>
    </div>
</body>

</html>