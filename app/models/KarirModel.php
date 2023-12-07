<?php
    include '../app/core/database.php';

    $success = "";
    if (isset($_POST['karir-submit'])) {
        if (karir($_POST) > 0) {
            $success = "Berhasil Email Anda Terkirim ke Admin KAMI";
            header("refresh:6; url=?page=karir");
        } else {
            echo "
                <script>
                    alert('user gagal ditambahkan');
                </script>
            ";
        }
    }

    // karir.php (Form)
    function karir($karir) {
        global $conn;

        $vacancy_name = htmlspecialchars($karir['vacancy_name']);
        $subject_name = htmlspecialchars($karir['subject_name']);
        $message_name = htmlspecialchars($karir['message_name']);
        $email_name = htmlspecialchars($karir['email_name']);
        $status_name = ($karir['status_name']);

        mysqli_query($conn, "INSERT INTO `mailbox` (`id`, `vacancy_name`, `subject_name`, `message_name`, `email_name`, `status_name`, `timestamp`)  VALUES(
            NULL,
            '$vacancy_name',
            '$subject_name',
            '$message_name',
            '$email_name',
            '$status_name',
            current_timestamp()
        )");

        return mysqli_affected_rows($conn);
    }
?>