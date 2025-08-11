<?php
// Sambung ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);

// Semak sambungan
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

// Jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name     = htmlspecialchars($_POST['item_name']);
    $item_code     = htmlspecialchars($_POST['item_code']);
    $category      = htmlspecialchars($_POST['category']);
    $quantity      = intval($_POST['quantity']);
    $purchase_date = $_POST['purchase_date'];

    $sql = "INSERT INTO inventory (item_name, item_code, category, quantity, purchase_date) 
            VALUES ('$item_name', '$item_code', '$category', '$quantity', '$purchase_date')";

    if ($conn->query($sql) === TRUE) {
        $success = "Barang berjaya didaftarkan!";
    } else {
        $error = "Ralat: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Barang Inventori</title>
</head>
<body>
    <h2>Pendaftaran Barang Inventori</h2>

    <?php if (!empty($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="post" action="">
        <label>Nama Barang:</label><br>
        <input type="text" name="item_name" required><br><br>

        <label>Kod Barang:</label><br>
        <input type="text" name="item_code" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Kuantiti:</label><br>
        <input type="number" name="quantity" min="1" required><br><br>

        <label>Tarikh Beli:</label><br>
        <input type="date" name="purchase_date" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
