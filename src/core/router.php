<?php
session_start();

class UA_Router
{
    static $SESSION_KEY = 'MX-UAX-ER-N4-ME';
    static $DATA_KEY = 'DT-UAX-EN';


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

    // Buat session baru
    public static function setSession($value, $data)
    {
        $_SESSION[UA_Router::$SESSION_KEY] = $value;
        $_SESSION[UA_Router::$DATA_KEY] = $data;
    }

    // ambil data di session
    public static function getDataFromSession()
    {
        return $_SESSION[UA_Router::$DATA_KEY];
    }

    // Hapus session
    public static function clearSession()
    {
        session_unset();
        session_destroy();

        // redirect ke home
        header('location:index.php');
    }
}
