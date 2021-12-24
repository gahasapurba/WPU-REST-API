<?php

// $mahasiswa = [
//     [
//         "nama" => "Gahasa Purba",
//         "nim" => "11419048",
//         "email" => "11419048@del.ac.id"
//     ],
//     [
//         "nama" => "Zico Aritonang",
//         "nim" => "11419049",
//         "email" => "11419049@del.ac.id"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');

$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;

?>