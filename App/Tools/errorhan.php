<?php

function errorhand($key)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
        echo '<div class = "frame frame--alert">' . $_SESSION[$key] . '</div>';
        unset($_SESSION[$key]);
    }
}

// function prompthand($key)
// {
//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }
//     if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
//         echo '<script>alert("' . $_SESSION[$key] . '");</script>';
//         unset($_SESSION[$key]);
//     }
// }