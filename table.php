<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Responsive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #table {
            padding-top: 50px;
            padding-left: 100px;
            padding-right: 100px;
        }
    </style>
    <?php
        include_once "./php/includes/sessionchk.inc.php";
    ?>
</head>

<body>
    <?php
        if(isset($_SESSION["login"])) {
            echo '
            <div class="alert alert-success text-center" role="alert">
                Selamat datang agan '.$_SESSION["login"].'!
            </div>';
        }
    ?>

    <div id="myButton" class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <button onclick="window.location.href='./chart.php'" type="button"
                    class="btn btn-primary">Check Chart</button>
            </div>
        </div>
    </div>

    <?php
        include_once "./php/includes/dbh.inc.php";
        
        // connect to mysql database
        $mysqli = $connectdb;

        
        // query sql
        $sql = "select * from biodata";
        $result = mysqli_query($mysqli, $sql);
        
        echo '
        <div id="table">
        <caption>Tabel dari database</caption>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat Lahir</th>
            </tr>
            <tbody>
        ';
        $counter = 1;
        while($row = mysqli_fetch_array($result)) {
            $nama = $row["nama"];
            $alamat = $row["alamat"];
            $jenis_kelamin = $row["jenis_kelamin"];
            $tempat_lahir = $row["tempat_lahir"];
            echo "<tr>";
            echo "    <th scope=\"row\">".$counter."</th>";
            echo "    <td>".$nama."</td>";
            echo "    <td>".$alamat."</td>";
            echo "    <td>".$jenis_kelamin."</td>";
            echo "    <td>".$tempat_lahir."</td>";
            echo "</tr>";
            $counter++;
        }
        echo '
            </tbody>
        </table>
        ';
    ?>
    
    <!-- <div id="table">
        <caption>Table input manual</caption>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div> -->

    <div id="myButton" class="container mb-5 mt-5">
        <div class="row">
            <div class="col text-center">
                <button onclick="window.location.href='./php/logout.php'" type="button"
                    class="btn btn-primary">Logout</button>
            </div>
        </div>
    </div>
</body>
</html>