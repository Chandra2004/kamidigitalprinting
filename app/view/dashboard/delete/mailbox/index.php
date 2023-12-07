<?php
    include '../app/core/database.php';
    include '../app/models/MailboxModel.php';
    
    $id = $_GET["id"];

    if( hapusMailbox($id) > 0) {
        header("Location: ?page=dashboard/mailbox");
        exit;
    } else {
        echo "
                <script>
                    alert('data gagal');
                </script>
            ";
    }