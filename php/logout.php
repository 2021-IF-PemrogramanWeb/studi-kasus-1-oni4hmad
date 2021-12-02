<?php
    // hapus cookie
    $cookie_name = "unlimited_session";
    setcookie($cookie_name, "", time() - (86400), "/");
    $cookie_name = "last_activity";
    setcookie($cookie_name, "", time() - (86400), "/");
    
    // hapus session
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "<h2 class='green'> Thank you </h2>";
    echo "<h3 class='green'>You will be redirected to the login page now</h3>";
    echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
?>