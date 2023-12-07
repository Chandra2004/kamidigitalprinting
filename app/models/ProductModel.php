<?php
include '../app/core/database.php';

// Tag Manager
    if (isset($_POST['submit_addtag'])) {
        $name_addtags = $_POST['name_addtags'];

        global $successAddTag;
        global $failAddTag;

        // Menambahkan tag baru ke database
        $insertQuery = "INSERT INTO tag_manager (id, name_tag) VALUES (NULL, '$name_addtags')";
        if ($conn->query($insertQuery) === TRUE) {
            $successAddTag = "Menambahkan Tag Berhasil!";
            header("refresh:3; url=?page=dashboard/produk");
        } else {
            $failAddTag = "Gagal Menambahkan Tag!";
            header("refresh:3; url=?page=dashboard/produk");
        }
    }

    // Tag Manager > List-Tag
    $sqlTagManager = "SELECT * FROM tag_manager";
    $resultTagManager = mysqli_query($conn, $sqlTagManager);
    $dataTagManager = mysqli_fetch_all($resultTagManager, MYSQLI_ASSOC);

// Produk
    // Produk > List-Produk
    $sqlProduk = "SELECT * FROM produk";
    $resultProduk = mysqli_query($conn, $sqlProduk);
    $dataProduk = mysqli_fetch_all($resultProduk, MYSQLI_ASSOC);
    
    // API Rating
    $getRatings = file_get_contents('../app/rest-api/ratings.json');
    $rate = json_decode($getRatings, true);
    $ratinges = json_decode($getRatings, true);

    // API Cities
    $getCities = file_get_contents('../app/rest-api/cities.json');
    $city = json_decode($getCities, true);
    $citiees = json_decode($getCities, true);
    
    // Tag Manager > List-Tag > Tag-Autocomplete
    $getTagManager = "SELECT name_tag FROM tag_manager";
    $resultTagManager = $conn->query($getTagManager);

    // Get Tag Manager > Array
    $name_tag = array();
    while ($row = $resultTagManager->fetch_assoc()) {
        $name_tag[] = $row['name_tag'];
    }

    
    

    if (isset($_POST['submit_newproduk'])) {
        $photo_produk = upload();
        $title_produk = htmlspecialchars($_POST['title_produk']);
        $slug_produk = htmlspecialchars($_POST['slug_produk']);
        $rating_produk = htmlspecialchars($_POST['rating_produk']);
        $kota_produk = htmlspecialchars($_POST['kota_produk']);
        $harga_produk = htmlspecialchars($_POST['harga_produk']);
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $status_produk = $_POST['status_produk'];
        
        global $emptyTag;
        
        if (isset($_POST['newtags']) && is_array($_POST['newtags'])) {
            $tag_produk = implode(', ', $_POST['newtags']);
        } else {
            // Atur nilai default atau berikan pesan kesalahan sesuai kebutuhan Anda
            $tag_produk = 'default_value';
            $emptyTag = "Tag Kosong Mohon Nanti Untuk Diisi";
        }

        if (isset($_POST['newtags']) && is_array($_POST['newtags'])) {
            $tag_produk = implode(', ', $_POST['newtags']);
        } else {
            // Ambil nilai default dari tabel user
            $queryDefaultTag = "SELECT tag_produk FROM produk WHERE tag_produk LIMIT 1";

            $result = $conn->query($queryDefaultTag);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tag_produk = $row['tag_produk'];
            } else {
                // Jika tidak ada data default, atur nilai default sesuai kebutuhan Anda
                $tag_produk = 'default_value';
            }
    
            $emptyTag = "Tag Kosong Mohon Nanti Untuk Diisi";
        }
        

        if (!$photo_produk) {
            return false;
        }

        global $successAddProduk;
        global $failAddProduk;

        // Menambahkan produk baru ke database
        $insertQuery = "INSERT INTO produk (id, photo_produk, title_produk, slug_produk, rating_produk, kota_produk, harga_produk, deskripsi_produk, tag_produk, status_produk) VALUES (NULL, '$photo_produk', '$title_produk', '$slug_produk', '$rating_produk', '$kota_produk', '$harga_produk', '$deskripsi_produk', '$tag_produk', '$status_produk')";
        if ($conn->query($insertQuery) === TRUE) {
            $successAddProduk = "Menambahkan Produk Berhasil!";
            header("refresh:3; url=?page=dashboard/produk");
        } else {
            $failAddProduk = "Gagal Menambahkan Produk!";
            header("refresh:3; url=?page=dashboard/produk");
        }
    }

    if (isset($_POST['submit_upproduk'])) {
        $id_produk = $_POST['id_produk'];
        $title_produk = htmlspecialchars($_POST['title_produk']);
        $slug_produk = htmlspecialchars($_POST['slug_produk']);
        $rating_produk = htmlspecialchars($_POST['rating_produk']);
        $kota_produk = htmlspecialchars($_POST['kota_produk']);
        $harga_produk = htmlspecialchars($_POST['harga_produk']);
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $status_produk = $_POST['status_produk'];
        
        global $emptyTag;
        
        if (isset($_POST['uptags']) && is_array($_POST['uptags'])) {
            $tag_produk = implode(', ', $_POST['uptags']);
        } else {
            // Ambil nilai default dari tabel user
            $queryDefaultTag = "SELECT tag_produk FROM produk WHERE id = $id_produk LIMIT 1";
            $result = $conn->query($queryDefaultTag);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tag_produk = $row['tag_produk'];
            } else {
                // Jika tidak ada data default, atur nilai default sesuai kebutuhan Anda
                $tag_produk = 'default_value';
            }
    
            $emptyTag = "Tag Kosong Mohon Nanti Untuk Diisi";
        }

        global $successUpdateProduk;
        global $failUpdateProduk;

        // Menambahkan produk baru ke database
        
        $updateQuery = "UPDATE produk SET title_produk='$title_produk', slug_produk='$slug_produk', rating_produk='$rating_produk', kota_produk='$kota_produk', harga_produk='$harga_produk', deskripsi_produk='$deskripsi_produk', tag_produk='$tag_produk', status_produk='$status_produk' WHERE id='$id_produk'";
        if ($conn->query($updateQuery) === TRUE) {
            $successUpdateProduk = "Update Produk Berhasil!";
            header("refresh:3; url=?page=dashboard/produk");
        } else {
            $failUpdateProduk = "Gagal Update Produk!";
            header("refresh:3; url=?page=dashboard/produk");
        }
    }

    if (isset($_POST['submit_upphoto_produk'])) {
        $id_produk = $_POST['id_produk'];
        $photo_produk = upload();

        if (!$photo_produk) {
            return false;
        }

        // Mengambil nama file lama
        $result = mysqli_query($conn, "SELECT photo_produk FROM produk WHERE id = $id_produk");
        $row = mysqli_fetch_assoc($result);
        $nameFile = $row['photo_produk'];

        global $successUpPhotoProduk;
        global $failUpPhotoProduk;

        $updatePhotoQuery = "UPDATE produk SET photo_produk='$photo_produk' WHERE id='$id_produk'";
        if ($conn->query($updatePhotoQuery) === TRUE) {
            if ($nameFile && $nameFile !== $photo_produk && file_exists('assets/upload/photo-produk/' . $nameFile)) {
                unlink('assets/upload/photo-produk/' . $nameFile);
            }
            $successUpPhotoProduk = "Update Foto Produk Berhasil!";
            header("refresh:3; url=?page=dashboard/produk");
        } else {
            $failUpPhotoProduk = "Gagal Update Foto Produk!";
            header("refresh:3; url=?page=dashboard/produk");
        }
    }

    function upload() {
        $nameFile = $_FILES['photo_produk']['name'];
        $sizeFile = $_FILES['photo_produk']['size'];
        $error = $_FILES['photo_produk']['error'];
        $tmpName = $_FILES['photo_produk']['tmp_name'];

        global $pilihGambar;
        global $ekstensiGambar;
        global $ukuranGambar;
        global $namaBaru;
    
        if ($error === 4) {
            $pilihGambar = "Mohon Pilih Gambar Terlebih Dahulu";
            header("refresh:3; url=?page=dashboard/produk");
            return false;
        }
    
        $extensionPhotoValid = ['jpg', 'jpeg', 'png'];
        $extensionPhoto = explode('.', $nameFile);
        $extensionPhoto = strtolower(end($extensionPhoto));
    
        if (!in_array($extensionPhoto, $extensionPhotoValid)) {
            $ekstensiGambar = "Yang Anda Upload Bukan Gambar";
    
            // Hapus gambar yang diunggah
            if (file_exists('assets/upload/photo-produk/' . $nameFile)) {
                unlink('assets/upload/photo-produk/' . $nameFile);
            }
            header("refresh:3; url=?page=dashboard/produk");
            return false;
        }
    
        if ($sizeFile > 2000000) {
            $ukuranGambar = "Ukuran Gambar Terlalu Besar";
    
            // Hapus gambar yang diunggah
            if (file_exists('assets/upload/photo-produk/' . $nameFile)) {
                unlink('assets/upload/photo-produk/' . $nameFile);
            }
            header("refresh:3; url=?page=dashboard/produk");
            return false;
        }
    
        $newName = uniqid() . '.' . $extensionPhoto;
        $route = 'assets/upload/photo-produk/' . $newName;
    
        if (move_uploaded_file($tmpName, $route)) {
            return $newName;
        } else {
            $namaBaru = "Gagal Mengganti Nama Gambar";
            header("refresh:3; url=?page=dashboard/produk");
            return false;
        }
    }

    // Produk > Delete-Produk
    function hapusProduct($id) {
        global $conn;
        
        $result = mysqli_query($conn, "SELECT photo_produk FROM produk WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $nameFile = $row['photo_produk'];

        mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

        // Hapus file gambar dari direktori jika nama file telah diambil
        if ($nameFile && file_exists('assets/upload/photo-produk/' . $nameFile)) {
            unlink('assets/upload/photo-produk/' . $nameFile);
        }

        return mysqli_affected_rows($conn);
    }
?>