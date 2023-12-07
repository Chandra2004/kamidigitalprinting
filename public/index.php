<?php
    function cleanAndValidateParameter($parameter)
    {
        return preg_replace('/[^a-zA-Z0-9\/]/', '', $parameter);
    }

    $folder = isset($_GET['page']) ? cleanAndValidateParameter($_GET['page']) : 'default';
    $file_path = __DIR__ . '/../app/view/' . $folder . '/index.php';

    if (file_exists($file_path) && !is_dir($file_path)) {
        include $file_path;
    } else {
        error_log("File not found: $file_path");

        // Jika folder ditemukan, coba mencari index.php di dalamnya
        if (is_dir($file_path)) {
            $subfolder_index_path = $file_path . '/index.php';
            if (file_exists($subfolder_index_path)) {
                include $subfolder_index_path;
            } else {
                header("HTTP/Home");
                include(__DIR__ . '/../app/view/produk/index.php');
            }
        } else {
            header("HTTP/Home");
            include(__DIR__ . '/../app/view/produk/index.php');
        }
    }
?>