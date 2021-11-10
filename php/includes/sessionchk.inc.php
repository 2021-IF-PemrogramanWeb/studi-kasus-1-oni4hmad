<?php
    session_start();
    if (!isset($_SESSION["login"]))
        echo "<script type='text/javascript'>window.location.href='./index.php';</script>";
?>