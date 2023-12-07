<?php
include '../app/core/database.php';

$id_display = $_SESSION['id_display'];
$name_display = $_SESSION['name_display'];
$username_display = $_SESSION['username_display'];
$email_display = $_SESSION['email_display'];
$numphone_display = $_SESSION['numphone_display'];
$nik_display = $_SESSION['nik_display'];
$joindate_display = $_SESSION['joindate_display'];
$borndate_display = $_SESSION['borndate_display'];
$lastschool_display = $_SESSION['lastschool_display'];
$address_display = $_SESSION['address_display'];
$whatsapp_display = $_SESSION['whatsapp_display'];
$instagram_display = $_SESSION['instagram_display'];
$tiktok_display = $_SESSION['tiktok_display'];
$facebook_display = $_SESSION['facebook_display'];
$photo_display = $_SESSION['photo_display'];

global $wrongMessages;
global $successMessages;

// Submit New Username
if (isset($_POST['submit_username'])) {

    $id_display = $_SESSION['id_display'];
    $username = $_POST['username_user'];

    // Memeriksa apakah username atau email sudah terpakai
    $checkQuery = "SELECT * FROM user WHERE username_user = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $wrongMessages = "Username sudah terpakai. Silakan gunakan yang lain.";
        header("refresh:2; url=?page=dashboard/profile");
    } else {
        // Menambahkan user baru ke database
        $insertQuery = "UPDATE user SET username_user='$username' WHERE id='$id_display'";
        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['username_display'] = $username;
            $successMessages = "Mengganti Username Berhasi";
            header("refresh:2; url=?page=dashboard/profile");
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Submit New Email
if (isset($_POST['submit_email'])) {

    $id_display = $_SESSION['id_display'];
    $email = $_POST['email_user'];

    // Memeriksa apakah username atau email sudah terpakai
    $checkQuery = "SELECT * FROM user WHERE email_user = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $wrongMessages = "Email sudah terpakai. Silakan gunakan yang lain.";
        header("refresh:2; url=?page=dashboard/profile");
    } else {
        // Menambahkan email baru ke database
        $insertQuery = "UPDATE user SET email_user='$email' WHERE id='$id_display'";
        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['email_display'] = $email;
            $successMessages = "Mengganti Email Berhasil";
            header("refresh:2; url=?page=dashboard/profile");
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

if (isset($_POST['submit_photo'])) {
    $id_display = $_SESSION['id_display'];

    // Mengambil nama file lama
    $result = $conn->query("SELECT * FROM user WHERE id = '$id_display'");
    $row = $result->fetch_assoc();
    $nameFile = $row['photo_user'];

    // Jika user telah mengunggah foto sebelumnya, hapus file lama
    if ($nameFile && file_exists('assets/upload/photo-user/' . $nameFile)) {
        unlink('assets/upload/photo-user/' . $nameFile);
    }

    $photo = upload();
    if (!$photo) {
        return false;
    } else {
        // Menambahkan user baru ke database
        $insertQuery = "UPDATE user SET photo_user='$photo' WHERE id='$id_display'";
        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['photo_display'] = $photo;
            $successMessages = "Foto Berhasil Diunggah";
            header("refresh:2; url=?page=dashboard/profile");
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

if (isset($_POST['submit_data'])) {
    $id_display = $_SESSION['id_display'];

    $name_user = htmlspecialchars($_POST['name_user']);
    $numphone_user = ($_POST['numphone_user']);
    $nik_user = ($_POST['nik_user']);
    $joindate_user = date('Y-m-d', strtotime($_POST['joindate_user']));
    $borndate_user = date('Y-m-d', strtotime($_POST['borndate_user']));
    $lastschool_user = htmlspecialchars($_POST['lastschool_user']);
    $address_user = htmlspecialchars($_POST['address_user']);
    $whatsapp_user = ($_POST['whatsapp_user']);
    $instagram_user = htmlspecialchars($_POST['instagram_user']);
    $tiktok_user = htmlspecialchars($_POST['tiktok_user']);
    $facebook_user = htmlspecialchars($_POST['facebook_user']);


    $query = "UPDATE user SET 
    name_user='$name_user', 
    numphone_user='$numphone_user', 
    nik_user='$nik_user', 
    joindate_user='$joindate_user', 
    borndate_user='$borndate_user', 
    lastschool_user='$lastschool_user', 
    address_user='$address_user', 
    whatsapp_user='$whatsapp_user', 
    instagram_user='$instagram_user', 
    tiktok_user='$tiktok_user', 
    facebook_user='$facebook_user' 
    WHERE id='$id_display'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['name_display'] = $name_user;
        $_SESSION['numphone_display'] = $numphone_user;
        $_SESSION['nik_display'] = $nik_user;
        $_SESSION['joindate_display'] = $joindate_user;
        $_SESSION['borndate_display'] = $borndate_user;
        $_SESSION['lastschool_display'] = $lastschool_user;
        $_SESSION['address_display'] = $address_user;
        $_SESSION['whatsapp_display'] = $whatsapp_user;
        $_SESSION['instagram_display'] = $instagram_user;
        $_SESSION['tiktok_display'] = $tiktok_user;
        $_SESSION['facebook_display'] = $facebook_user;

        $successMessages = "Data berhasil diperbarui.";
        header("refresh:2; url=?page=dashboard/profile");
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}

function upload() {
    $nameFile = $_FILES['photo_user']['name'];
    $sizeFile = $_FILES['photo_user']['size'];
    $error = $_FILES['photo_user']['error'];
    $tmpName = $_FILES['photo_user']['tmp_name'];

    global $pilihGambar;
    global $ekstensiGambar;
    global $ukuranGambar;
    global $namaBaru;

    if ($error === 4) {
        $pilihGambar = "Mohon Pilih Gambar Terlebih Dahulu";
        return false;
    }

    $extensionPhotoValid = ['jpg', 'jpeg', 'png'];
    $extensionPhoto = explode('.', $nameFile);
    $extensionPhoto = strtolower(end($extensionPhoto));

    if (!in_array($extensionPhoto, $extensionPhotoValid)) {
        $ekstensiGambar = "Yang Anda Upload Bukan Gambar";

        // Hapus gambar yang diunggah
        if (file_exists('assets/upload/photo-user/' . $nameFile)) {
            unlink('assets/upload/photo-user/' . $nameFile);
        }
        return false;
    }

    if ($sizeFile > 2000000) {
        $ukuranGambar = "Ukuran Gambar Terlalu Besar";

        // Hapus gambar yang diunggah
        if (file_exists('assets/upload/photo-user/' . $nameFile)) {
            unlink('assets/upload/photo-user/' . $nameFile);
        }
        return false;
    }

    $newName = uniqid() . '.' . $extensionPhoto;
    $route = 'assets/upload/photo-user/' . $newName;

    if (move_uploaded_file($tmpName, $route)) {
        return $newName;
    } else {
        $namaBaru = "Gagal Mengganti Nama Gambar";
        return false;
    }
}
?>