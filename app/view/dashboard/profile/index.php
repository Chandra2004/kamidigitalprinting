<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ?page=auth");
    exit;
}
?>
<?php include '../app/models/ProfileModel.php'; ?>
<?php
// dashboard.php > mailbox > unread-mailbox
$sqlUnread = "SELECT COUNT(*) AS unread_count FROM mailbox WHERE status_name = 'unread'";
$resultUnread = mysqli_query($conn, $sqlUnread);
$rowUnread = mysqli_fetch_assoc($resultUnread);
$unreadCount = $rowUnread['unread_count'];
?>

<title>Profile | Kami Digital Printing Surabaya</title>
<?php include '../app/view/template/dashboard-header.php'; ?>

<!-- Main Content -->
<main class="p-3">
    <!-- Section One -->
    <section>
        <div class="mb-4">
            <span class="text-white font-semibold text-lg">Profile</span>
            <div class="flex items-center">
                <span class="text-zinc-400 text-sm uppercase"><a href="main" class="text-blue-600">Dashboard</a></span>
                <span class="text-zinc-400 text-sm mx-2">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </span>
                <span class="text-zinc-400 text-sm uppercase">profile</span>
            </div>
        </div>

        <?php include '../app/view/template/information.php' ?>

    </section>
    <!-- End Section One -->

    <!-- Error Message -->
    <?php if (!empty($wrongMessages) || !empty($pilihGambar) || !empty($ekstensiGambar) || !empty($ukuranGambar) || !empty($namaBaru)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-yellow-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Warning alert!</span>
                <?php if (!empty($wrongMessages)) : ?>
                    <span class="font-bold"><?= $wrongMessages ?></span>
                <?php endif; ?>
                <?php if (!empty($pilihGambar)) : ?>
                    <span class="font-bold"><?= $pilihGambar ?></span>
                <?php endif; ?>
                <?php if (!empty($ekstensiGambar)) : ?>
                    <span class="font-bold"><?= $ekstensiGambar ?></span>
                <?php endif; ?>
                <?php if (!empty($ukuranGambar)) : ?>
                    <span class="font-bold"><?= $ukuranGambar ?></span>
                <?php endif; ?>
                <?php if (!empty($namaBaru)) : ?>
                    <span class="font-bold"><?= $namaBaru ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Error Message -->
    <!-- Success Message -->
    <?php if (!empty($successMessages)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span>
                <span class="font-bold"><?= $successMessages ?></span>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Success Message -->

    <!-- Section Two -->
    <section class="pb-6">
        <div class="grid md:grid-cols-2 gap-2">
            <div class="bg-zinc-700 py-5 px-5 rounded-md">
                <span class="text-white font-semibold text-lg">Standard Profile</span>
                <div class="mt-3">
                    <form action="" method="post">
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex gap-3">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" name="username_user" id="username_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" maxlength="8" value="<?= $username_display ?>" />
                                    <label for="username_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                                </div>
                                <div class="bg-green-500 rounded-md text-white font-medium w-full flex whitespace-nowrap items-center justify-center relative z-0 mb-6">
                                    <button type="submit" name="submit_username" class="w-full h-full">Submit New Username</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="" method="post">
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex gap-3">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="email" name="email_user" id="email_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $email_display ?>" />
                                    <label for="email_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                </div>
                                <div class="bg-green-500 rounded-md text-white font-medium w-full flex items-center justify-center relative z-0 mb-6">
                                    <button type="submit" name="submit_email" class="w-full h-full">Submit New Email</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="" enctype="multipart/form-data">
                        <span class="text-white font-semibold text-sm">Foto Profile</span>
                        <div class="my-3 grid gap-2 sm:grid-cols-2">
                            <div class="aspect-square overflow-hidden flex items-center justify-center rounded-lg">
                                <img class="rounded-lg" alt="Username" src="assets/upload/photo-user/<?= $photo_display ?>" onerror="this.src='assets/upload/photo-user/error-user/errorBanner.png';">
                            </div>
                            <div>
                                <div class="flex justify-center items-center font-medium h-20 mb-2 text-sm rounded-lg text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 2MB</li>
                                        <li>Gambar Harus 1:1 (Persegi)</li>
                                    </ul>
                                </div>
                                <input class="block w-full text-sm border text-white border-zinc-300 rounded-lg cursor-pointer" id="file_input" type="file" name="photo_user">
                                <button type="submit" name="submit_photo" class="bg-green-500 rounded-md text-white font-medium w-full mt-2 p-3">Submit New Photo</button>
                            </div>
                        </div>
                    </form>
                    <a href="?page=dashboard/repassword" class="block text-center bg-blue-600 hover:bg-blue-700 w-full py-3 rounded-md text-white font-bold hover:text-gray-300">
                        Change Password
                    </a>
                </div>
            </div>
            <div class="bg-zinc-700 py-5 px-5 rounded-md">
                <span class="text-white font-semibold text-lg">Detail Profile</span>
                <div class="mt-3">
                    <form action="" method="post">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="name_user" id="name_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $name_display ?>" />
                            <label for="name_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="numphone_user" id="numphone_user" oninput="numphone(this)" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $numphone_display ?>" />
                            <label for="numphone_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Telepon</label>
                            <script>
                                function numphone(input) {
                                    let newValue = input.value.replace(/[^0-9]/g, ''); // Hapus karakter selain angka
                                    if (newValue.startsWith("0")) {
                                        newValue = "62" + newValue.substring(1);
                                    }
                                    input.value = newValue;
                                }
                            </script>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input maxlength="16" type="text" name="nik_user" id="nik_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $nik_display ?>" />
                            <label for="nik_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIK</label>
                        </div>
                        <div class="flex gap-3">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" name="joindate_user" id="joindate_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $joindate_display ?>" />
                                <label for="joindate_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal Bergabung</label>
                            </div>
                            <div class="bg-zinc-800 rounded-md text-white font-medium w-full flex items-center justify-center relative z-0 mb-6">
                                <p><?= $joindate_display ?></p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" name="borndate_user" id="borndate_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $borndate_display ?>" />
                                <label for="borndate_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal Kelahiran</label>
                            </div>
                            <div class="bg-zinc-800 rounded-md text-white font-medium w-full flex items-center justify-center relative z-0 mb-6">
                                <p><?= $borndate_display ?></p>
                            </div>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="lastschool_user" id="lastschool_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $lastschool_display ?>" />
                            <label for="lastschool_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pendidikan Terakhir</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="address_user" id="address_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $address_display ?>" />
                            <label for="address_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                        </div>

                        <span class="text-white font-semibold text-sm">Social Media</span>
                        <div class="mt-3">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="whatsapp_user" id="whatsapp_user" oninput="whatsapp(this)" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $whatsapp_display ?>" />
                                <label for="whatsapp_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">WhatsApp</label>
                                <script>
                                    function whatsapp(input) {
                                        let newValue = input.value.replace(/[^0-9]/g, ''); // Hapus karakter selain angka
                                        if (newValue.startsWith("0")) {
                                            newValue = "62" + newValue.substring(1);
                                        }
                                        input.value = newValue;
                                    }
                                </script>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="instagram_user" id="instagram_user" oninput="instagram(this)" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $instagram_display ?>" />
                                <label for="instagram_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Instagram</label>
                                <script>
                                    // Mendapatkan elemen input
                                    const input = document.getElementById('instagram_user');

                                    // Menambahkan event listener untuk setiap kali pengguna menekan tombol pada input
                                    input.addEventListener('input', function(event) {
                                        // Mendapatkan nilai input
                                        const inputValue = event.target.value;

                                        // Memeriksa apakah input mengandung karakter "@"
                                        if (inputValue.includes('@')) {
                                            // Jika ada karakter "@", hapus karakter "@" tersebut dari input
                                            event.target.value = inputValue.replace('@', '');
                                        }
                                    });
                                </script>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="tiktok_user" id="tiktok_user" oninput="tiktok(this)" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $tiktok_display ?>" />
                                <label for="tiktok_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tiktok</label>
                                <script>
                                    function tiktok(inputElement) {
                                        const inputValue = inputElement.value;
                                        const pattern = /^[a-zA-Z0-9]+$/; // Pola untuk huruf dan angka

                                        if (pattern.test(inputValue)) {
                                            inputElement.value = "@" + inputValue;
                                        }
                                    }
                                </script>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="facebook_user" id="facebook_user" class="text-white block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer" value="<?= $facebook_display ?>" />
                                <label for="facebook_user" class="text-zinc-400 peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Facebook</label>
                            </div>
                        </div>
                        <button type="submit" name="submit_data" class="bg-green-500 rounded-md text-white font-medium w-full mt-2 p-3">Submit Detail Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Two -->
</main>
<!-- End Main Content -->

<?php include '../app/view/template/dashboard-footer.php'; ?>