<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    if ($email === 'admin@test.com' && $pass === '123456') {
        $_SESSION["user"] = $email;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Email/password salah!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - LeleShop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="max-width: 400px; margin: 100px auto; padding: 2rem; background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
        <h2 style="text-align: center; margin-bottom: 1rem;">Login LeleShop</h2>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 1rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 8px;">
            <input type="password" name="pass" placeholder="Password" required style="width: 100%; padding: 1rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 8px;">
            <button type="submit" style="width: 100%; padding: 1rem; background: #EE4D2D; color: white; border: none; border-radius: 8px; font-size: 1rem;">Login</button>
        </form>
        <?php if ($error): ?><p style="color: red; text-align: center;"><?php echo $error; ?></p><?php endif; ?>
        <p style="text-align: center; margin-top: 1rem;">Demo: admin@test.com / 123456</p>
        <p style="text-align: center;"><a href="register.php">Register</a></p>
    </div>
</body>
</html>
