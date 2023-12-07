<?php
include '../app/core/database.php';

// dashboard > mailbox > total-mailbox
$sql_totalMailbox = "SELECT COUNT(*) AS total_mailbox FROM mailbox";
$result_totalMailbox = $conn->query($sql_totalMailbox);

if ($result_totalMailbox->num_rows > 0) {
    $row = $result_totalMailbox->fetch_assoc();
    $total_mailbox = $row["total_mailbox"];
}

// dashboard.php > mailbox > unread-mailbox
$sqlUnread = "SELECT COUNT(*) AS unread_count FROM mailbox WHERE status_name = 'unread'";
$resultUnread = mysqli_query($conn, $sqlUnread);
$rowUnread = mysqli_fetch_assoc($resultUnread);
$unreadCount = $rowUnread['unread_count'];

// dashboard > milestone > total-milestone
$sql_totalMilestone = "SELECT COUNT(*) AS total_milestone FROM milestone";
$result_totalMilestone = $conn->query($sql_totalMilestone);

if ($result_totalMilestone->num_rows > 0) {
    $row = $result_totalMilestone->fetch_assoc();
    $total_milestone = $row["total_milestone"];
}

// dashboard > product > total-product
$sql_totalProduct = "SELECT COUNT(*) AS total_product FROM produk";
$result_totalProduct = $conn->query($sql_totalProduct);

if ($result_totalProduct->num_rows > 0) {
    $row = $result_totalProduct->fetch_assoc();
    $total_product = $row["total_product"];
}

// dashboard > user > total-user
$sql_totalUser = "SELECT COUNT(*) AS total_user FROM user";
$result_totalUser = $conn->query($sql_totalUser);

if ($result_totalUser->num_rows > 0) {
    $row = $result_totalUser->fetch_assoc();
    $total_user = $row["total_user"];
}
