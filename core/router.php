<?php
session_start();

class UA_Router
{
    static $SESSION_KEY = 'MX-UAX-ER-N4-ME';


    // Pengecekan diluar form login
    public static function checkForLogin()
    {
        if (!isset($_SESSION[UA_Router::$SESSION_KEY])) {
            header('location:login.php');
        }
    }


    // Jika berada di form login, maka lakukan pengecekan autentikasi lagi
    public static function checkForDashboard()
    {
        if (isset($_SESSION[UA_Router::$SESSION_KEY])) {
            header('location:dashboard.php');
        }
    }
}
