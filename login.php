<?php
session_start();

// Contoh data login hardcoded (sepatutnya ambil dari DB)
$correct_username = "admin";
$correct_password = "12345";

// Jika borang dihantar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Nama pengguna atau kata laluan salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Log Masuk</h2>

    <?php if (!empty($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="">
        <label>Nama Pengguna:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Kata Laluan:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Log Masuk</button>
    </form>
</body>
</html>
