<?php
    include '../app/core/database.php';
    include '../app/models/MilestoneModel.php';
    
    $id = $_GET["id"];

    if( hapusMilestone($id) > 0) {
        header("Location: ?page=dashboard/milestone");
        exit;
    } else {
        echo "
                <script>
                    alert('data gagal');
                </script>
            ";
    }