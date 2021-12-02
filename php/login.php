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
        // tambah session
        $_SESSION["login"] = $email;
        // $_SESSION['last_activity'] = time();

        if (isset($_POST['remember'])) {
            // tambah cookie : lifetime
            $cookie_name = "unlimited_session";
            $cookie_value = "dapat_login_satu_tahun";
            setcookie($cookie_name, $cookie_value, time() + (60*60*24*365), "/"); // 60*60*24*365 -> 1 tahun
        } else {
            // tambah cookie : 1 menit
            $cookie_name = "last_activity";
            $cookie_value = "dapat_login_selama_60_detik_kedepan";
            setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 60 -> 1 menit
        }

        // redirect
        echo "login sukses! sabar.. ngelag :(";
        echo "<script type='text/javascript'>window.location.href='../table.php';</script>";
    } else {
        $_SESSION["login_error"] = true;
        echo "login gagal!";
        echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
    }
?>