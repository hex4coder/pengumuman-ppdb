<?php

$host = 'localhost';
$root = 'pengumuman';
$password = 'p3n9umum4n';
$database = 'pengumumanppdb';

$conn = mysqli_connect($host, $root, $password, $database);

if (!$conn) {
    echo ("Koneksi database error!");
}
