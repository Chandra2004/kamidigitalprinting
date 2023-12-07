<?php
    include '../app/core/database.php';
    include '../app/models/MailboxModel.php';

    // Ambil ID pesan dari parameter URL
    $message_id = $_GET['id'];

    // Perbarui status pesan menjadi "read"
    $sqlStatusUpdate = "UPDATE mailbox SET status_name = 'read' WHERE id = $message_id";
    if (mysqli_query($conn, $sqlStatusUpdate)) {
        header("Location: ?page=dashboard/mailbox");
        exit;
    } else {
        echo "Error: " . $sqlStatusUpdate . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
?>