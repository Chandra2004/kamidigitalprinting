<?php
    session_start();

    include '../app/core/database.php';

    if (isset($_POST['submit_newPassword'])) {
        if (upPassword($_POST) > 0) {
            header("Location: https://google.com");
            exit;
        }
    }

    function upPassword($data) {
        global $conn;
        global $newNotMatch;
        global $success;
        global $failed;
        global $oldNotMatch;
        global $userNotFound;

        $email_user = htmlspecialchars($data['email_user']);
        $oldPassword = mysqli_real_escape_string($conn, $data['oldPass_user']);
        $newPassword = mysqli_real_escape_string($conn, $data['newPass_user']);
        $checkNewPassword = mysqli_real_escape_string($conn, $data['checkPass_user']);

        if ($newPassword !== $checkNewPassword) {
            $newNotMatch = "Konfirmasi Password Baru tidak sesuai.";
        } else {
            $query = "SELECT password_user FROM user WHERE email_user = '$email_user'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $db_password = $row["password_user"];

                if (password_verify($oldPassword, $db_password)) {
                    // Ganti password
                    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
                    $update_query = "UPDATE user SET password_user = '$hashed_password' WHERE email_user = '$email_user'";
                    
                    if ($conn->query($update_query) === TRUE) {
                        $success = "Password berhasil direset.";
                    } else {
                        $failed = "Gagal mereset password: " . $conn->error;
                    }
                } else {
                    $oldNotMatch = "Password lama tidak sesuai.";
                }
            } else {
                $userNotFound = "Username tidak ditemukan.";
            }
        }
    }

