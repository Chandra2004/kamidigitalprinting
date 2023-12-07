<?php
include '../app/core/database.php';

// User > List User
$sqlUser = "SELECT * FROM user";
$resultUser = mysqli_query($conn, $sqlUser);
$dataUser = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

// Tombol Register
if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        header("Location: ?page=dashboard/user");
    } else {
        header("refresh:6; url=?page=dashboard/user");
    }
}

// Fungsi Tombol Register
function register($regData)
{
    global $conn;
    global $missPassword;
    global $usernameFound;
    global $emailFound;
    global $successRegister;

    $username_user = htmlspecialchars($regData['username_user']);
    $email_user = htmlspecialchars($regData['email_user']);
    $password_user = htmlspecialchars($regData['password_user']);
    $rePassword_user = htmlspecialchars($regData['rePassword_user']);


    if ($password_user != $rePassword_user) {
        $missPassword = "Password yang anda masukkan diantaranya tidak cocok";
        return;
    }

    $hashed_password = password_hash($password_user, PASSWORD_DEFAULT);

    $checkUsernameQuery = "SELECT * FROM user WHERE username_user = '$username_user'";
    $resultUsername = $conn->query($checkUsernameQuery);

    // Validasi Username
    if ($resultUsername->num_rows > 0) {
        $usernameFound = "Username sudah terpakai. Silakan gunakan yang lain.";
        return;
    }

    // Validasi Email
    $checkEmailQuery = "SELECT * FROM user WHERE email_user = '$email_user'";
    $resultEmail = $conn->query($checkEmailQuery);

    if ($resultEmail->num_rows > 0) {
        $emailFound = "Email sudah terpakai. Silakan gunakan yang lain.";
        return;
    }

    // Menambahkan user baru ke database
    $insertQuery = "INSERT INTO user (id, name_user, username_user, email_user, password_user, numphone_user, nik_user, joindate_user, borndate_user, lastschool_user, address_user, whatsapp_user, instagram_user, tiktok_user, facebook_user, photo_user) VALUES (NULL, '', '$username_user', '$email_user', '$hashed_password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
    if ($conn->query($insertQuery) === TRUE) {
        $successRegister = "Registrasi berhasil!";
        header("refresh:6; url=?page=dashboard/user");
    }
}
