<?php
include 'db.php';

class UA_Core
{
    // dapatkan data dari database
    public static function getDataByNomor($nomor)
    {
        $query = "SELECT * FROM PPDB WHERE nomor='$nomor'";
        if ($q = mysqli_query($conn, $query)) {
            $data = mysqli_fetch_assoc($q);
            $numrows =  mysqli_num_rows($q);
            return $numrows > 0 ? $data : null;
        } else {
            return null;
        }
    }

    // cek nomor didatabase
    public static function checkNomor($nomor)
    {
        $query = "SELECT * FROM PPDB WHERE nomor='$nomor'";
        $q = mysqli_query($conn, $query);

        if (!$q) {
            return false;
        } else {
            $numrows = mysqli_num_rows($q);
            return $numrows > 0;
        }
    }
}
