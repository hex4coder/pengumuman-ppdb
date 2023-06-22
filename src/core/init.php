<?php

require_once 'core/db.php';
require_once 'core/log.php';

class UA_Init
{

    public static function rebuildDatabase()
    {
        UA_Logger::log("Merekonstruksi tabel siswa");
        $t = UA_Init::recreateTableStudents();
        if ($t) {
            UA_Logger::log("Berhasil membuat tabel siswa");
        } else {
            UA_Logger::danger("Gagal membuat tabel siswa");
        }

        UA_Logger::log("Mengentri data baru");
        $t = UA_Init::insertAllDataToTableStudents();
        if ($t) {
            UA_Logger::log("Berhasil mengentri data siswa");
        } else {
            UA_Logger::danger("Gagal mengentri data siswa");
        }
    }

    public static function recreateTableStudents()
    {
        $ret = false;
        $db = new UA_Database();
        mysqli_query($db->connection(), "DROP TABLE students");
        mysqli_query($db->connection(), "CREATE TABLE IF NOT EXISTS students(
            nomor VARCHAR(13) NOT NULL PRIMARY KEY,
            nik VARCHAR(16) NOT NULL,
            alamat VARCHAR(254) NOT NULL,
            nama VARCHAR(254) NOT NULL,
            pertama VARCHAR(254) NOT NULL,
            kedua VARCHAR(254) NOT NULL,
            keterangan VARCHAR(254) NOT NULL,
            nilai INT NOT NULL
        )");
        $q = mysqli_query($db->connection(), "TRUNCATE TABLE students");
        $ret = $q != false;
        $db->closeConnection();
        return $ret;
    }

    public static function insertAllDataToTableStudents()
    {
        $db = new UA_Database();

        $db->closeConnection();
    }
}
