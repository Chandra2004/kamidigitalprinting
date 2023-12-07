<?php include '../app/models/UserModel.php'; ?>
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

<title>Users | Kami Digital Printing Surabaya</title>
<?php include '../app/view/template/dashboard-header.php'; ?>

<!-- Main Content -->
<main class="p-3">
    <!-- Section One -->
    <section>
        <div class="mb-4">
            <span class="text-white font-semibold text-lg">User Data</span>
            <div class="flex items-center">
                <span class="text-zinc-400 text-sm uppercase"><a href="main" class="text-blue-600">Dashboard</a></span>
                <span class="text-zinc-400 text-sm mx-2">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </span>
                <span class="text-zinc-400 text-sm uppercase">User Data</span>
            </div>
        </div>

        <?php include '../app/view/template/information.php' ?>

    </section>
    <!-- End Section One -->

    <!-- Section Two -->
    <section class="pb-6">
        <div class="mx-auto overflow-x-auto">
            <div class="flex items-center justify-end">
                <span class="flex items-center p-3 rounded-md bg-green-500 text-white font-medium cursor-pointer" data-modal-target="addUser-modal" data-modal-toggle="addUser-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                    </svg>&nbsp;
                    Add New User
                </span>
            </div>
        </div>
        <div id="addUser-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="addUser-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-white">Add New User</h3>
                        <form class="space-y-6" action="" method="post">
                            <div>
                                <label for="username_user" class="block mb-2 text-sm font-medium text-white">Username</label>
                                <input type="text" id="username_user" name="username_user" maxlength="8" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                            </div>
                            <div>
                                <label for="email_user" class="block mb-2 text-sm font-medium text-white">Email</label>
                                <input type="email" id="email_user" name="email_user" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                            </div>
                            <div>
                                <label for="pass_user" class="block mb-2 text-sm font-medium text-white">Password</label>
                                <input type="password" id="password_user" name="password_user" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="">
                            </div>
                            <div>
                                <label for="rePass_user" class="block mb-2 text-sm font-medium text-white">Confirm Password</label>
                                <input type="password" id="rePassword_user" name="rePassword_user" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="">
                            </div>

                            <button type="submit" name="register" class="w-full text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add User Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Two -->

    <!-- Error Message -->
    <?php if (!empty($missPassword) || !empty($usernameFound) || !empty($emailFound)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-yellow-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Warning alert!</span>
                <?php if (!empty($missPassword)) : ?>
                    <span class="font-bold"><?= $missPassword ?></span>
                <?php elseif (!empty($usernameFound)) : ?>
                    <span class="font-bold"><?= $usernameFound ?></span>
                <?php elseif (!empty($emailFound)) : ?>
                    <span class="font-bold"><?= $emailFound ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Error Message -->

    <!-- Success Message -->
    <?php if (!empty($successRegister)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span>
                <?php if (!empty($successRegister)) : ?>
                    <span class="font-bold"><?= $successRegister ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Success Message -->

    <!-- Section Three -->
    <section class="pb-6">
        <div class="lg:w-1/2 mx-auto overflow-x-auto rounded-md">
            <table class="w-full">
                <thead class="uppercase text-white bg-zinc-700">
                    <tr>
                        <th class="py-2 px-4 border-r border-zinc-600">action</th>
                        <th class="py-2 px-4 border-r border-zinc-600">photo</th>
                        <th class="py-2 px-4 border-r border-zinc-600">Username</th>
                        <th class="py-2 px-4">Email</th>
                    </tr>
                </thead>
                <tbody class="bg-zinc-500 text-white">
                    <?php foreach ($dataUser as $rowUser) : ?>
                        <tr class="border-b border-zinc-700">
                            <td class="border-r border-zinc-700">
                                <span class="flex justify-center items-center cursor-pointer gap-1">
                                    <span class="bg-blue-500 p-2 rounded-md" data-modal-target="info-modal<?= $rowUser['id'] ?>" data-modal-toggle="info-modal<?= $rowUser['id'] ?>">
                                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                </span>
                            </td>
                            <td class="py-2 px-4 text-center border-r border-zinc-700">
                                <img src="assets/upload/photo-user/<?= $rowUser['photo_user'] ?>" onerror="this.src='assets/upload/photo-user/error-user/errorBanner.png';" alt="<?= $rowUser['username_user'] ?>" class="w-20 mx-auto cursor-pointer rounded-md" data-modal-target="photo-modal<?= $rowUser['id'] ?>" data-modal-toggle="photo-modal<?= $rowUser['id'] ?>">
                            </td>
                            <td class="py-2 px-4 text-center font-bold border-r border-zinc-700"><?= $rowUser['username_user'] ?></td>
                            <td class="py-2 px-4 text-center font-bold lowercase"><?= $rowUser['email_user'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php foreach ($dataUser as $rowUser) : ?>
            <div id="info-modal<?= $rowUser['id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-600">
                            <h3 class="text-xl font-medium text-white">
                                <span><?= $rowUser['username_user'] ?></span>
                                <br>
                                <span class="text-gray-400 text-sm font-normal">( <?= $rowUser['email_user'] ?> )</span>
                            </h3>
                            <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center text-white" data-modal-hide="info-modal<?= $rowUser['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <p class="text-base leading-relaxed text-gray-400">
                                Nama Panjang : <span class="text-white"><?= $rowUser['name_user'] ?></span> <br>
                                Username : <span class="text-white"><?= $rowUser['username_user'] ?></span> <br>
                                Email : <span class="text-white"><?= $rowUser['email_user'] ?></span> <br>
                                Nomor Telepon : <span class="text-white"><?= $rowUser['numphone_user'] ?></span> <br>
                                NIK : <span class="text-white"><?= $rowUser['nik_user'] ?></span> <br>
                                Tanggal Bergabung : <span class="text-white"><?= $rowUser['joindate_user'] ?></span> <br>
                                Tanggal Lahir : <span class="text-white"><?= $rowUser['borndate_user'] ?></span> <br>
                                Pendidikan Terakhir : <span class="text-white"><?= $rowUser['lastschool_user'] ?></span> <br>
                                Alamat : <span class="text-white"><?= $rowUser['address_user'] ?></span> <br>
                                <span class="flex items-center">
                                    WhatsApp :&nbsp;<span class="text-white">
                                        <a target="_blank" href="https://wa.me/<?= $rowUser['whatsapp_user'] ?>" class="flex items-center">
                                            <?= $rowUser['whatsapp_user'] ?>&nbsp;&nbsp;
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                            </svg>
                                        </a>
                                    </span>
                                </span>
                                <span class="flex items-center">
                                    Instagram :&nbsp;<span class="text-white">
                                        <a target="_blank" href="https://www.instagram.com/<?= $rowUser['instagram_user'] ?>" class="flex items-center">
                                            <?= $rowUser['instagram_user'] ?>&nbsp;&nbsp;
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                            </svg>
                                        </a>
                                    </span>
                                </span>
                                <span class="flex items-center">
                                    Tiktok :&nbsp;<span class="text-white">
                                        <a target="_blank" href="https://www.tiktok.com/<?= $rowUser['tiktok_user'] ?>" class="flex items-center">
                                            <?= $rowUser['tiktok_user'] ?>&nbsp;&nbsp;
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                            </svg>
                                        </a>
                                    </span>
                                </span>
                                <span class="flex items-center">
                                    Facebook :&nbsp;<span class="text-white">
                                        <a target="_blank" href="https://www.facebook.com/<?= $rowUser['facebook_user'] ?>" class="flex items-center">
                                            <?= $rowUser['facebook_user'] ?>&nbsp;&nbsp;
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                            </svg>
                                        </a>
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($dataUser as $rowUser) : ?>
            <div id="photo-modal<?= $rowUser['id'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="photo-modal<?= $rowUser['id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="text-xl font-medium text-white">
                                <span><?= $rowUser['username_user'] ?></span>
                                <br>
                                <span class="text-gray-400 text-sm font-normal">( <?= $rowUser['email_user'] ?> )</span>
                            </h3>
                            <img src="assets/upload/photo-user/<?= $rowUser['photo_user'] ?>" onerror="this.src='assets/upload/photo-user/error-user/errorBanner.png';" alt="<?= $rowUser['username_user'] ?>" class="mt-3 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <!-- End Section Three -->
</main>
<!-- End Main Content -->

<?php include '../app/view/template/dashboard-footer.php'; ?>