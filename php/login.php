<?php
    session_start();
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
        $_SESSION["login"] = $email;
        $cookie_name = "user";
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 -> 1 hari
        echo "login sukses! sabar.. ngelag :(";
        echo "<script type='text/javascript'>window.location.href='../table.php';</script>";
    } else {
        $_SESSION["login_error"] = true;
        echo "login gagal!";
        echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
    }
?>