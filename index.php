<?php
// index.php
// Fail ini ialah halaman utama projek PHP

// Contoh: Tetapkan tajuk laman
$title = "Selamat Datang ke Laman Utama";

// Boleh masukkan logik PHP di sini
$tarikh = date("d/m/Y");

// Paparan HTML
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <p>Hari ini: <?php echo $tarikh; ?></p>
    <p>Ini adalah contoh fail <strong>index.php</strong>.</p>
</body>
</html>
