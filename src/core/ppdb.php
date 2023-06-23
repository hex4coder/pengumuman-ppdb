<?php
include_once 'db.php';

class UA_Core
{
    // dapatkan data dari database
    public static function getDataByNomor($nomor)
    {
        $db = new UA_Database();

        $query = "SELECT * FROM students WHERE nomor_registrasi='$nomor'";
        if ($q = mysqli_query($db->connection(), $query)) {
            $data = mysqli_fetch_assoc($q);
            $numrows =  mysqli_num_rows($q);
            return $numrows > 0 ? $data : null;
        } else {
            return null;
        }

        $db->closeConnection();
    }

    // cek nomor didatabase
    public static function checkNomor($nomor)
    {
        $db = new UA_Database();

        $query = "SELECT * FROM students WHERE nomor_registrasi='$nomor'";
        $q = mysqli_query($db->connection(), $query);

        if (!$q) {
            return false;
        } else {
            $numrows = mysqli_num_rows($q);
            return $numrows > 0;
        }

        $db->closeConnection();
    }
}
