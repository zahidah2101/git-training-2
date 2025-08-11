<?php
// Semak jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);

    echo "<h3>Maklumat Diterima:</h3>";
    echo "Nama: $nama <br>";
    echo "Email: $email <br>";
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Borang Asas PHP</title>
</head>
<body>
    <h2>Borang Maklumat</h2>
    <form method="post" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Hantar</button>
    </form>
</body>
</html>
