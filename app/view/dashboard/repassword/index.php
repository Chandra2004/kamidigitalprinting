
<?php
    include '../app/models/RepasswordModel.php';
    
    if (!isset($_SESSION['login'])) {
        header("Location: ?page=dashboard");
        exit;
    }

?>
<?php
// dashboard.php > mailbox > unread-mailbox
$sqlUnread = "SELECT COUNT(*) AS unread_count FROM mailbox WHERE status_name = 'unread'";
$resultUnread = mysqli_query($conn, $sqlUnread);
$rowUnread = mysqli_fetch_assoc($resultUnread);
$unreadCount = $rowUnread['unread_count'];

$email_display = $_SESSION['email_display'];
?>

<title>Change Password | Kami Digital Printing Surabaya</title>
<?php include '../app/view/template/dashboard-header.php'; ?>

<!-- Main Content -->
<main class="p-3">
    <!-- Section One -->
    <section>
        <div class="mb-4">
            <span class="text-white font-semibold text-lg">Ganti Kata Sandi</span>
            <div class="flex items-center">
                <span class="text-zinc-400 text-sm uppercase"><a href="main" class="text-blue-600">Dashboard</a></span>
                <span class="text-zinc-400 text-sm mx-2">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </span>
                <span class="text-zinc-400 text-sm uppercase">ganti kata sandi</span>
            </div>
        </div>

        <?php include '../app/view/template/information.php'; ?>

    </section>
    <!-- End Section One -->

    <!-- Alert Messages -->
    <?php if (!empty($newNotMatch)) : ?>
        <div class="text-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
            <span class="text-lg font-medium"><?= $newNotMatch ?></span>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)) : ?>
        <div class="text-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="text-lg font-medium"><?= $success ?></span>
        </div>
    <?php endif; ?>
    <?php if (!empty($failed)) : ?>
        <div class="text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="text-lg font-medium"><?= $failed ?></span>
        </div>
    <?php endif; ?>
    <?php if (!empty($oldNotMatch)) : ?>
        <div class="text-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
            <span class="text-lg font-medium"><?= $oldNotMatch ?></span>
        </div>
    <?php endif; ?>
    <?php if (!empty($userNotFound)) : ?>
        <div class="text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="text-lg font-medium"><?= $userNotFound ?></span>
        </div>
    <?php endif; ?>
    <!-- End Alert Messages -->

    <!-- Section Two -->
    <section class="pb-6">
        <form method="post" action="">
            <div class="md:w-1/2 mx-auto">
                <div class="bg-zinc-700 py-5 px-5 rounded-md">
                    <span class="text-white font-semibold text-lg">Reset Password</span>
                    <div class="mt-3">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $email_display ?>" disabled/>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="hidden" name="email_user" id="email_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $email_display ?>" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="password" name="oldPass_user" id="oldPass_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="oldPass_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password Lama</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="password" name="newPass_user" id="newPass_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="newPass_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password Baru</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="password" name="checkPass_user" id="checkPass_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" placeholder=" " />
                            <label for="checkPass_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ulang Password Baru</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit_newPassword" class="bg-green-600 hover:bg-green-700 w-full md:w-1/2 mt-2 py-3 rounded-md text-white font-bold hover:text-gray-300">
                    Submit New Password
                </button>
            </div>
        </form>
    </section>
    <!-- End Section Two -->
</main>
<!-- End Main Content -->

<?php include '../app/view/template/dashboard-footer.php'; ?>