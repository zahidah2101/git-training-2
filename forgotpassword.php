<?php
// Sambung ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "user_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

$message = "";

// Jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // Semak email dalam DB
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Simulasi token reset
        $token = bin2hex(random_bytes(16));
        
        // Simpan token dalam DB
        $conn->query("UPDATE users SET reset_token = '$token' WHERE email = '$email'");

        // Simulasi pautan reset
        $reset_link = "http://localhost/resetpassword.php?token=$token";

        // Dalam sistem sebenar → hantar email guna PHPMailer
        $message = "Pautan reset kata laluan telah dihantar!<br>
                    <a href='$reset_link'>Klik sini untuk reset kata laluan</a>";
    } else {
        $message = "❌ Emel tidak wujud dalam sistem.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Lupa Kata Laluan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .msg {
            margin: 10px 0;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lupa Kata Laluan</h2>
    <?php if ($message) { echo "<p class='msg'>$message</p>"; } ?>
    <form method="post" action="">
        <label>Masukkan Emel Berdaftar:</label>
        <input type="email" name="email" required placeholder="emel@example.com">
        <button type="submit">Hantar Pautan Reset</button>
    </form>
</div>

</body>
</html>
