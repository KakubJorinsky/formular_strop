<?php
require_once '/includes/functions.php';
if (!is_logged_in()) redirect('/login.php');

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Vítej, <?= htmlspecialchars($user['nick']) ?>!</h1>
    <img src="/assets/avatars/<?= htmlspecialchars($user['avatar']) ?>" alt="avatar" width="100" class="avatar">
    <p>E-mail: <?= htmlspecialchars($user['email']) ?></p>
    <p>Členem od: <?= $user['created_at'] ?></p>

    <br>
    <a href="profile.php">Upravit profil</a><br><br>
    <a href="logout.php">Odhlásit se</a>
</div>
</body>
</html>