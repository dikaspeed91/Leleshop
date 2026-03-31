<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$success = '';
$error = '';
if ($_POST) {
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $users_file = 'users.json';
    $users = file_exists($users_file) ? json_decode(file_get_contents($users_file), true) : [];
    if (!isset($users[$email])) {
        $users[$email] = $pass;
        file_put_contents($users_file, json_encode($users));
        $success = 'Register sukses! Silakan login.';
    } else {
        $error = 'Email sudah terdaftar!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - LeleShop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="max-width: 400px; margin: 100px auto; padding: 2rem; background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
        <h2 style="text-align: center; margin-bottom: 1rem;">Register LeleShop</h2>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 1rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 8px;">
            <input type="password" name="pass" placeholder="Password" required style="width: 100%; padding: 1rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 8px;" minlength="6">
            <button type="submit" style="width: 100%; padding: 1rem; background: #4CAF50; color: white; border: none; border-radius: 8px; font-size: 1rem;">Register</button>
        </form>
        <?php if ($error): ?><p style="color: red; text-align: center;"><?php echo $error; ?></p><?php endif; ?>
        <?php if ($success): ?><p style="color: green; text-align: center;"><?php echo $success; ?></p><?php endif; ?>
        <p style="text-align: center; margin-top: 1rem;"><a href="login.php">Sudah punya akun? Login</a></p>
    </div>
</body>
</html>
