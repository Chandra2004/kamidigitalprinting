<?php
    include '../app/core/database.php';
    include '../app/models/ProductModel.php';
    
    $id = $_GET["id"];
    
    if( hapusProduct($id) > 0) {
        header("Location: ?page=dashboard/produk");
        exit;
    } else {
        echo "
                <script>
                    alert('data gagal');
                </script>
            ";
    }