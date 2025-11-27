<?php
require_once '/includes/functions.php';
if (!is_logged_in()) redirect('/login.php');

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nick = trim($_POST['nick']);
    $email = trim($_POST['email']);
    $new_pass = $_POST['new_password'] ?? '';
    $current_pass = $_POST['current_password'] ?? '';

    // kontrola aktuálního hesla pokud mění heslo nebo email
    if ($new_pass || $email !== $user['email'] || $nick !== $user['nick']) {
        if (!verify_password($current_pass, $user['password'])) {
            $error = 'Aktuální heslo je špatné';
            goto end;
        }
    }

    // avatar
    $avatar = $user['avatar'];
    if (!empty($_FILES['avatar']['name'])) {
        $uploaded = upload_avatar($_FILES['avatar']);
        if ($uploaded) {
            if ($avatar !== 'default.png' && file_exists("/assets/avatars/$avatar")) {
                unlink("/assets/avatars/$avatar");
            }
            $avatar = $uploaded;
        } else {
            $error = 'Chyba při nahrávání avataru (pouze jpg/png/gif/webp, max 2 MB)';
        }
    }

    // heslo
    $password_hash = $user['password'];
    if ($new_pass) {
        if (strlen($new_pass) < 6) {
            $error = 'Nové heslo musí mít alespoň 6 znaků';
            goto end;
        }
        $password_hash = hash_password($new_pass);
    }

    // update
    try {
        $stmt = $pdo->prepare("UPDATE users SET nick = ?, email = ?, password = ?, avatar = ? WHERE id = ?");
        $stmt->execute([$nick, $email, $password_hash, $avatar, $_SESSION['user_id']]);

        $_SESSION['user_nick'] = $nick;
        $success = 'Profil úspěšně aktualizován!';
        $user = $pdo->query("SELECT * FROM users WHERE id = {$_SESSION['user_id']}")->fetch(); // refresh
    } catch (Exception $e) {
        $error = 'Nick nebo e-mail už někdo používá';
    }
}
end:
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Upravit profil</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Upravit profil</h1>
    <a href="dashboard.php">← Zpět na dashboard</a><br><br>

    <?php if($success) echo "<p class='success'>$success</p>"; ?>
    <?php if($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Nick</label>
        <input type="text" name="nick" value="<?= htmlspecialchars($user['nick']) ?>" required>

        <label>E-mail</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>Nové heslo (nechat prázdné = neměnit)</label>
        <input type="password" name="new_password">

        <label>Aktuální heslo (povinné při změně)</label>
        <input type="password" name="current_password" required>

        <label>Avatar (max 2 MB)</label>
        <img src="/assets/avatars/<?= htmlspecialchars($user['avatar']) ?>" width="100" class="avatar"><br>
        <input type="file" name="avatar" accept="image/*">

        <button type="submit">Uložit změny</button>
    </form>
</div>
</body>
</html>