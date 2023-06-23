<?php

require_once 'core/db.php';
require_once 'core/log.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

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
            nomor_di_jurusan VARCHAR(3) NOT NULL,
            nama VARCHAR(254) NOT NULL,
            nomor_registrasi VARCHAR(13) NOT NULL PRIMARY KEY,
            pilihan_kedua VARCHAR(254) NOT NULL,
            jk VARCHAR(20) NOT NULL,
            dusun VARCHAR(254) NOT NULL,
            desa VARCHAR(254) NOT NULL,
            asal_sekolah VARCHAR(254) NOT NULL,
            nilai_rapor VARCHAR(20) NOT NULL,
            nilai_bakat_minat VARCHAR(20) NOT NULL,
            nilai_akhir VARCHAR(20) NOT NULL,
            keterangan VARCHAR(254) NOT NULL,
            lulus_di VARCHAR(254) NOT NULL
            
        )");
        $q = mysqli_query($db->connection(), "TRUNCATE TABLE students");
        $ret = $q != false;
        $db->closeConnection();
        return $ret;
    }

    public static function insertAllDataToTableStudents()
    {

        $path = 'assets/xlsx/data.xlsx';
        # open the file
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);
        # read each cell of each row of each sheet
        foreach ($reader->getSheetIterator() as $sheet) {
            $counter = 0;
            foreach ($sheet->getRowIterator() as $row) {
                // echo (count($row->getCells()));
                // echo ("<br/>");
                // echo ($counter);
                // echo ("<br/>");
                // echo ("<br/>");

                if ($counter != 0) {
                    $colCounter = 0;
                    $dataCol = [];
                    foreach ($row->getCells() as $cell) {

                        // nomor
                        // nama
                        // nomorreg
                        // pil2
                        // jk
                        // dsn
                        // desa
                        // asal
                        // nr
                        // ntbm
                        // na
                        // ket
                        // lulusdi

                        if ($colCounter < 13) {
                            $cv = ($cell->getValue());

                            if ($colCounter == 12) {
                                // lulus di
                                $lulusdi = [
                                    "DKV" => "Desain Komunikasi Visual",
                                    "TJKT" => "Teknik Jaringan Komputer dan Telekomunikasi",
                                    "BSN" => "Busana",
                                    "TO" => "Teknik Otomotif",
                                    "AKL" => "Akuntansi dan Keuangan Lembaga",
                                    "MPLB" => "Manajemen Perkantoran dan Layanan Bisnis",
                                ];
                                $dataCol[$colCounter] = $lulusdi[$cv];
                            } else {
                                $dataCol[$colCounter] = str_replace("'", "_", $cv);
                            }
                        }

                        $colCounter++;
                    }


                    $db = new UA_Database();
                    mysqli_query($db->connection(), "INSERT INTO students(
                        nomor_di_jurusan,
                        nama,
                        nomor_registrasi,
                        pilihan_kedua,
                        jk,
                        dusun,
                        desa,
                        asal_sekolah,
                        nilai_rapor,
                        nilai_bakat_minat,
                        nilai_akhir,
                        keterangan,
                        lulus_di)

                        VALUES(
'$dataCol[0]',
'$dataCol[1]',
'$dataCol[2]',
'$dataCol[3]',
'$dataCol[4]',
'$dataCol[5]',
'$dataCol[6]',
'$dataCol[7]',
'$dataCol[8]',
'$dataCol[9]',
'$dataCol[10]',
'$dataCol[11]',
'$dataCol[12]')");
                    $db->closeConnection();
                }
                $counter++;
            }
        }
        $reader->close();
    }
}
