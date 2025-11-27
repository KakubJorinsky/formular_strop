<?php
session_start();
require_once '/config/database.php';

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

function upload_avatar($file) {
    $target_dir = "/assets/avatars/";
    $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $new_filename = uniqid('avatar_') . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;

    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($file_extension, $allowed)) return false;
    if ($file["size"] > 2 * 1024 * 1024) return false;

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $new_filename;
    }
    return false;
}
?>