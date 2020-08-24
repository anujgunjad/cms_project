<?php 
    session_start();

    unset($_SESSION['key']);
    unset($_SESSION['acckey']);
    unset($_SESSION['numberkey']);

    echo "Session Cleared Succesfully";
?>