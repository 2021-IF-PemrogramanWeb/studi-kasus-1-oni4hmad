<?php
    include_once "./includes/dbh.inc.php";

    // connect to mysql database
    $mysqli = $connectdb;

    // username, password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // cek username password
    echo $email . " " . $password . "<br>";

    // To protect MySQL injection (more detail about MySQL injection)
    $email = stripslashes($email);
    $password = stripslashes($password);
    $email = mysqli_real_escape_string($mysqli, $email);
    $password = mysqli_real_escape_string($mysqli, $password);
    
    // query sql
    $sql = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($mysqli, $sql);

    // count table row
    $count = mysqli_num_rows($result);

    // if any matched found -> it should have at least one row
    if ($count >= 1) {
        echo "login sukses!";
        header('Location: ../table.php');
    } else {
        echo "login gagal!";
    }
?>