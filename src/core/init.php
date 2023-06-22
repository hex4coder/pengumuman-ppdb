<?php

require_once 'core/db.php';

class UA_Init
{


    public static function rebuildDatabase()
    {
    }

    public static function recreateTableStudents()
    {
        $ret = false;
        $db = new UA_Database();
        $p = mysqli_query($db->connection(), "CREATE TABLE IF NOT EXITS students(
            nomor VARCHAR(13),
            nama VARCHAR(200),

        )");
        $q = mysqli_query($db->connection(), "TRUNCATE TABLE students");
        $ret = $q != false;
        $db->closeConnection();
        return $ret;
    }

    public static function insertAllDataToTableStudents()
    {
        $ret 
    }
}
