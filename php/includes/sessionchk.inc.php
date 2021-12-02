<?php
    session_start();
    if (!isset($_COOKIE['unlimited_session']) && !isset($_COOKIE['last_activity'])) {
        // last request was more than 30 (1800 sec) minutes ago // 60 -> 1 min
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
    }

    if (!isset($_SESSION["login"])) {
        echo "<script type='text/javascript'>window.location.href='./index.php';</script>";
    } elseif (!isset($_COOKIE['unlimited_session'])) {
        $cookie_name = "last_activity";
        $cookie_value = "dapat_login_selama_60_detik_kedepan";
        setcookie($cookie_name, $cookie_value, time() + (60), "/");
    }
?>