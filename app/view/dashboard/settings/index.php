<?php include '../app/core/database.php'; ?>
<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: ?page=auth");
        exit;
    }
?>
<?php
// dashboard.php > mailbox > unread-mailbox
$sqlUnread = "SELECT COUNT(*) AS unread_count FROM mailbox WHERE status_name = 'unread'";
$resultUnread = mysqli_query($conn, $sqlUnread);
$rowUnread = mysqli_fetch_assoc($resultUnread);
$unreadCount = $rowUnread['unread_count'];
?>

<title>Setting | Kami Digital Printing Surabaya</title>
<?php include '../app/view/template/dashboard-header.php'; ?>

<?php include '../app/view/template/dashboard-footer.php'; ?>