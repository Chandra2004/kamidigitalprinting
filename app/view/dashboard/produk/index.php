<?php include '../app/models/ProductModel.php'; ?>
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

<title>Produk | Kami Digital Printing Surabaya</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<?php include '../app/view/template/dashboard-header.php'; ?>

<!-- Main Content -->
<main class="p-3">
    <!-- Section One -->
    <section>
        <div class="mb-4">
            <span class="text-white font-semibold text-lg">Products</span>
            <div class="flex items-center">
                <span class="text-zinc-400 text-sm uppercase"><a href="main" class="text-blue-600">Dashboard</a></span>
                <span class="text-zinc-400 text-sm mx-2">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </span>
                <span class="text-zinc-400 text-sm uppercase">Products</span>
            </div>
        </div>

        <?php include '../app/view/template/information.php' ?>

    </section>
    <!-- End Section One -->

    <!-- Error Message Tag Manager -->
    <?php if (!empty($failAddTag)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-yellow-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Warning alert!</span>
                <span class="font-bold"><?= $failAddTag ?></span>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Error Message Tag Manager -->
    <!-- Success Message Tag Manager -->
    <?php if (!empty($successAddTag)) : ?>
        <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span>
                <span class="font-bold"><?= $successAddTag ?></span>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Success Message Tag Manager -->

    <!-- Section Two -->
    <section>
        <div class="mx-auto">
            <div class="bg-zinc-700 py-5 px-5 rounded-md">
                <span class="text-white font-semibold text-lg">Tag Manager</span>
                <div class="mt-3">
                    <form action="" method="post">
                        <div class="flex gap-2 whitespace-nowrap">
                            <input type="text" id="" name="name_addtags" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Masukkan Tag Baru">
                            <button type="submit" name="submit_addtag" class="bg-green-600 p-2.5 rounded-lg text-white">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                    <path d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="w-full bg-white/10 h-[250px] mt-3 rounded-lg overflow-auto">
                    <table class="w-full">
                        <thead class="uppercase text-zinc-700 bg-white">
                            <tr>
                                <th class="py-2 px-4 border-r-2 border-zinc-700 w-[10%]">ID</th>
                                <th class="py-2 px-4 w-[90%]">Tags</th>
                            </tr>
                        </thead>
                        <tbody class="bg-zinc-500 text-white">
                            <?php foreach ($dataTagManager as $TagManager) : ?>
                                <tr class="border-b-2 border-zinc-700">
                                    <td class="border-r-2 border-zinc-700 text-center font-medium"><?= $TagManager['id'] ?></td>
                                    <td class="pl-3 font-medium"><?= $TagManager['name_tag'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Two -->

    <div class="mt-3">
        <!-- Error Message Tag Manager -->
        <?php if (!empty($failAddProduk) || !empty($failUpdateProduk) || !empty($failUpPhotoProduk)) : ?>
            <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-yellow-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Warning alert!</span>
                    <?php if (!empty($failAddProduk)) : ?>
                        <span class="font-bold"><?= $failAddProduk ?></span>
                    <?php endif; ?>    
                    <?php if (!empty($failUpdateProduk)) : ?>
                        <span class="font-bold"><?= $failUpdateProduk ?></span>
                    <?php endif; ?>    
                    <?php if (!empty($failUpPhotoProduk)) : ?>
                        <span class="font-bold"><?= $failUpPhotoProduk ?></span>
                    <?php endif; ?>    
                </div>
            </div>
        <?php endif; ?>
        <!-- End Error Message Tag Manager -->
        <!-- Success Message Tag Manager -->
        <?php if (!empty($successAddProduk) || !empty($successUpdateProduk) || !empty($successUpPhotoProduk)) : ?>
            <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span>
                    <?php if (!empty($successAddProduk)) : ?>
                        <span class="font-bold"><?= $successAddProduk ?></span>
                    <?php endif; ?>
                    <?php if (!empty($successUpdateProduk)) : ?>
                        <span class="font-bold"><?= $successUpdateProduk ?></span>
                    <?php endif; ?>
                    <?php if (!empty($successUpPhotoProduk)) : ?>
                        <span class="font-bold"><?= $successUpPhotoProduk ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- End Success Message Tag Manager -->
        <!-- Error Message -->
        <?php if (!empty($wrongMessages) || !empty($pilihGambar) || !empty($ekstensiGambar) || !empty($ukuranGambar) || !empty($namaBaru) || !empty($emptyTag)) : ?>
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
        <?php if (!empty($emptyTag)) : ?>
            <div class="flex items-center p-4 mb-4 text-sm rounded-lg text-zinc-800 bg-yellow-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Warning alert!</span>
                    <span class="font-bold"><?= $emptyTag ?></span>
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
    </div>

    <!-- Section Three -->
    <section>
        <div class="mx-auto">
            <div class="bg-zinc-700 py-5 px-5 rounded-md mt-3">
                <span class="text-white font-semibold text-lg">Produk</span>
                <div class="mt-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <div class="flex justify-center items-center font-medium h-20 mb-2 text-sm rounded-lg text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 2MB</li>
                                        <li>Gambar Harus 1:1 (Persegi)</li>
                                    </ul>
                                </div>
                                <div class="w-full mb-3">
                                    <input id="" type="file" name="photo_produk" class="border border-gray-500 text-white w-full rounded-lg" placeholder="">
                                </div>
                                <div class="w-full mb-3">
                                    <input type="text" id="newtitle_produk" name="title_produk" oninput="newJudulSlug()" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nama Produk">
                                </div>
                                <div class="w-full mb-3">
                                    <select id="rating" name="rating_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <?php foreach ($rate['ratings'] as $ratings) : ?>
                                            <option value="<?= $ratings ?>"><?= $ratings ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <select id="cities" name="kota_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <?php foreach ($city['cities'] as $cities) : ?>
                                            <option value="<?= $cities ?>"><?= $cities ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <input type="text" id="" name="harga_produk" oninput="formatHarga(this)" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Harga">
                                    <script>
                                        function formatHarga(input) {
                                            // Menghapus semua karakter selain angka
                                            let harga = input.value.replace(/\D/g, '');

                                            // Menambahkan titik setiap 3 digit dari belakang
                                            harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                            // Memasukkan kembali hasil format ke dalam input
                                            input.value = harga;
                                        }
                                    </script>
                                </div>
                            </div>
                            <div>
                                <div class="w-full mb-3">
                                    <input type="text" id="newslug_produk" name="slug_produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white/40 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Slug Nama Produk" readonly>
                                    <script>
                                        function newJudulSlug() {
                                            // Mengambil nilai dari Input 1 (Judul Biasa)
                                            var judulBiasa = document.getElementById('newtitle_produk').value;

                                            // Mengubah tulisan menjadi lowercase
                                            var judulLowerCase = judulBiasa.toLowerCase();

                                            // Mengganti spasi dengan underscore (_) dan mengisi nilai ke Input 2 (Judul Slug)
                                            var judulSlug = judulLowerCase.replace(/\s+/g, '-');
                                            document.getElementById('newslug_produk').value = judulSlug;
                                        }
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <textarea name="deskripsi_produk" id="" placeholder="Masukkan Deskripsi Produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"></textarea>
                                </div>
                                <div class="w-full mb-3">
                                    <textarea type="text" id="newTags" name="" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Tag Produk"></textarea>
                                    <div id="newTag-container" class="bg-zinc-900 mt-3 h-20 p-3 rounded-lg flex items-center overflow-auto">
                                    </div>
                                    <script>
                                        const newTagInput = document.getElementById('newTags');
                                        const newTagContainer = document.getElementById('newTag-container');

                                        function createNewTag(text) {
                                            const newTag = document.createElement('span');
                                            newTag.classList.add('inline-flex', 'items-center', 'whitespace-nowrap', 'py-2', 'px-3', 'm-1', 'bg-white/30', 'text-white', 'rounded-md');

                                            const hiddenNewInput = document.createElement('input');
                                            hiddenNewInput.setAttribute('type', 'hidden');
                                            hiddenNewInput.setAttribute('name', 'newtags[]');
                                            hiddenNewInput.setAttribute('value', text);
                                            newTag.appendChild(hiddenNewInput);

                                            const tagNewText = document.createElement('span');
                                            tagNewText.textContent = text;
                                            newTag.appendChild(tagNewText);

                                            const deleteNewIcon = document.createElement('i');
                                            deleteNewIcon.classList.add('fas', 'fa-times', 'ml-2', 'cursor-pointer', 'bg-white', 'text-zinc-900', 'px-2', 'py-1', 'rounded-md');
                                            deleteNewIcon.addEventListener('click', () => {
                                                newTagContainer.removeChild(newTag);
                                            });
                                            newTag.appendChild(deleteNewIcon);

                                            return newTag;
                                        }

                                        function addNewTag(text) {
                                            const newTag = createNewTag(text);
                                            newTagContainer.appendChild(newTag);
                                            newTagInput.value = '';
                                        }

                                        const availableNewTags = <?php echo json_encode($name_tag); ?>;

                                        $(function() {
                                            $("#newTags").autocomplete({
                                                source: availableNewTags
                                            });
                                        });

                                        newTagInput.addEventListener('keydown', handleKeyDown);
                                        function handleKeyDown(event) {
                                            if (event.key === 'Enter' || (event.key === 'Tab')) {
                                                event.preventDefault();
                                                const textNew = newTagInput.value.trim();
                                                if (textNew !== '' && !Array.from(newTagContainer.children).some(child => child.textContent === textNew)) {
                                                    addNewTag(textNew);
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <select id="status" name="status_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option value="available">available</option>
                                        <option value="unavailable">unavailable</option>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="submit_newproduk" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white">Kirim Produk Baru</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Three -->

    <!-- Section Four -->
    <section>
        <div class="mx-auto">
            <div class="bg-zinc-700 py-5 px-5 rounded-md mt-3">
                <span class="text-white font-semibold text-lg">List Produk</span>
                <div class="w-full bg-white/10 h-[250px] mt-3 rounded-lg overflow-auto">
                    <table class="w-full">
                        <thead class="uppercase text-zinc-700 bg-white">
                            <tr>
                                <th class="py-2 px-4 border-r-2 border-zinc-700 w-[15%]">action</th>
                                <th class="py-2 px-4 border-r-2 border-zinc-700 w-[20%]">photo</th>
                                <th class="py-2 px-4 border-r-2 border-zinc-700 w-[50%]">title</th>
                                <th class="py-2 px-4 w-[10%]">info</th>
                            </tr>
                        </thead>
                        <tbody class="bg-zinc-500 text-white">
                            <?php foreach ($dataProduk as $key) : ?>
                                <tr class="border-b-2 border-zinc-700">
                                    <td class="p-2 border-r-2 border-zinc-700 text-center font-medium">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="?page=dashboard/delete/produk&id=<?= $key['id']; ?>" class="bg-red-600 p-3 rounded-md">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                </svg>
                                            </a>
                                            <button data-modal-target="edit-modal<?= $key['id']; ?>" data-modal-toggle="edit-modal<?= $key['id']; ?>" class="bg-green-600 p-3 rounded-md" type="button">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="border-r-2 border-zinc-700 text-center font-medium">
                                        <button data-modal-target="photo-modal<?= $key['id']; ?>" data-modal-toggle="photo-modal<?= $key['id']; ?>" class="bg-blue-600 p-3 rounded-md">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="p-2 border-r-2 border-zinc-700 ">
                                        <span class="font-medium"><?= $key['title_produk'] ?></span>
                                    </td>
                                    <td class="text-center font-medium">
                                        <button data-modal-target="info-modal<?= $key['id'] ?>" data-modal-toggle="info-modal<?= $key['id'] ?>" class="bg-orange-600 p-3 rounded-md" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <?php foreach ($dataProduk as $key) : ?>
            <div id="edit-modal<?= $key['id']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Edit : <?= $key['title_produk']; ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="edit-modal<?= $key['id']; ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="" method="post">
                                <div class="w-full mb-3">
                                    <input value="<?= $key['id']; ?>" type="text" id="id" name="id_produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="w-full mb-3">
                                    <input value="<?= $key['title_produk']; ?>" type="text" id="title_produk_<?= $key['id']?>" name="title_produk" oninput="updateJudulSlug<?= $key['id']?>()" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nama Produk">
                                </div>
                                <div class="w-full mb-3">
                                    <input value="<?= $key['slug_produk']; ?>" type="text" id="slug_produk_<?= $key['id']?>" name="slug_produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white/40 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Slug Nama Produk" readonly>
                                    <script>
                                        function updateJudulSlug<?= $key['id']?>() {
                                            // Mengambil nilai dari Input 1 (Judul Biasa)
                                            var judulBiasa<?= $key['id']?> = document.getElementById('title_produk_<?= $key['id']?>').value;

                                            var judulLowerCase<?= $key['id']?> = judulBiasa<?= $key['id']?>.toLowerCase();

                                            // Mengganti spasi dengan underscore (_) dan mengisi nilai ke Input 2 (Judul Slug)
                                            var judulSlug<?= $key['id']?> = judulLowerCase<?= $key['id']?>.replace(/\s+/g, '-');
                                            document.getElementById('slug_produk_<?= $key['id']?>').value = judulSlug<?= $key['id']?>;
                                        }
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <select id="rating" name="rating_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <?php foreach ($rate['ratings'] as $ratings) : ?>
                                            <option value="<?= $ratings ?>"><?= $ratings ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <select id="cities" name="kota_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <?php foreach ($city['cities'] as $cities) : ?>
                                            <option value="<?= $cities ?>"><?= $cities ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <input value="<?= $key['harga_produk']; ?>" type="text" id="" name="harga_produk" oninput="formatHarga(this)" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Harga">
                                    <script>
                                        function formatHarga(input) {
                                            // Menghapus semua karakter selain angka
                                            let harga = input.value.replace(/\D/g, '');

                                            // Menambahkan titik setiap 3 digit dari belakang
                                            harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                            // Memasukkan kembali hasil format ke dalam input
                                            input.value = harga;
                                        }
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <textarea name="deskripsi_produk" id="" placeholder="Masukkan Deskripsi Produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"><?= $key['deskripsi_produk']; ?></textarea>
                                </div>
                                <div class="w-full mb-3">
                                    <textarea type="text" id="upTags_<?= $key['id'] ?>" name="" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Tag Baru"></textarea>
                                    <div id="upTag-container_<?= $key['id'] ?>" class="bg-zinc-900 mt-3 h-20 p-3 rounded-lg flex items-center overflow-auto">
                                    </div>
                                    <script>
                                        const upTagInput<?= $key['id']; ?> = document.getElementById('upTags_<?= $key["id"]; ?>');
                                        const upTagContainer<?= $key['id']; ?> = document.getElementById('upTag-container_<?= $key["id"]; ?>');

                                        function createUpdateTag<?= $key['id']; ?>(text) {
                                            const upTag<?= $key['id']; ?> = document.createElement('span');
                                            upTag<?= $key['id']; ?>.classList.add('inline-flex', 'items-center', 'whitespace-nowrap', 'py-2', 'px-3', 'm-1', 'bg-white/30', 'text-white', 'rounded-md');

                                            const hiddenUpdateInput<?= $key['id']; ?> = document.createElement('input');
                                            hiddenUpdateInput<?= $key['id']; ?>.setAttribute('type', 'hidden');
                                            hiddenUpdateInput<?= $key['id']; ?>.setAttribute('name', 'upTags[]');
                                            hiddenUpdateInput<?= $key['id']; ?>.setAttribute('value', text);
                                            upTag<?= $key['id']; ?>.appendChild(hiddenUpdateInput<?= $key['id']; ?>);

                                            const tagUpdateText<?= $key['id']; ?> = document.createElement('span');
                                            tagUpdateText<?= $key['id']; ?>.textContent = text;
                                            upTag<?= $key['id']; ?>.appendChild(tagUpdateText<?= $key['id']; ?>);

                                            const deleteUpdateIcon<?= $key['id']; ?> = document.createElement('i');
                                            deleteUpdateIcon<?= $key['id']; ?>.classList.add('fas', 'fa-times', 'ml-2', 'cursor-pointer', 'bg-white', 'text-zinc-900', 'px-2', 'py-1', 'rounded-md');
                                            deleteUpdateIcon<?= $key['id']; ?>.addEventListener('click', () => {
                                                upTagContainer<?= $key['id']; ?>.removeChild(upTag<?= $key['id']; ?>);
                                            });
                                            upTag<?= $key['id']; ?>.appendChild(deleteUpdateIcon<?= $key['id']; ?>);

                                            return upTag<?= $key['id']; ?>;
                                        }

                                        function addUpdateTag<?= $key['id']; ?>(text) {
                                            const upTag<?= $key['id']; ?> = createUpdateTag<?= $key['id']; ?>(text);
                                            upTagContainer<?= $key['id']; ?>.appendChild(upTag<?= $key['id']; ?>);
                                            upTagInput<?= $key['id']; ?>.value = '';
                                        }

                                        const availableUpdateTags<?= $key['id']; ?> = <?php echo json_encode($name_tag); ?>;

                                        $(function() {
                                            $(upTagInput<?= $key['id']; ?>).autocomplete({
                                                source: availableUpdateTags<?= $key['id']; ?>
                                            });
                                        });

                                        upTagInput<?= $key['id']; ?>.addEventListener('keydown', handleKeyPress);
                                        upTagInput<?= $key['id']; ?>.addEventListener('keypress', handleKeyPress);

                                        function handleKeyPress(event) {
                                            if (event.key === 'Enter' || event.key === 'Tab') {
                                                event.preventDefault();
                                                const text = upTagInput<?= $key['id']; ?>.value.trim();
                                                if (text !== '' && !Array.from(upTagContainer<?= $key['id']; ?>.children).some(child => child.textContent === text)) {
                                                    addUpdateTag<?= $key['id']; ?>(text);
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <select id="status" name="status_produk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option value="available">available</option>
                                        <option value="unavailable">unavailable</option>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="submit_upproduk" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white">Update Produk Ini</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Modal -->

        <!-- Photo Modal -->
        <?php foreach ($dataProduk as $key) : ?>
            <div id="photo-modal<?= $key['id']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Photo : <?= $key['title_produk']; ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="photo-modal<?= $key['id']; ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="flex justify-center items-center font-medium h-20 mb-2 text-sm rounded-lg text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 2MB</li>
                                        <li>Gambar Harus 1:1 (Persegi)</li>
                                    </ul>
                                </div>
                                <div class="w-full mb-3">
                                    <input value="<?= $key['id']; ?>" type="text" id="id" name="id_produk" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="w-full mb-3">
                                    <input id="" type="file" name="photo_produk" class="border border-gray-500 text-white w-full rounded-lg" placeholder="">
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="submit_upphoto_produk" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white">Update Foto Produk Ini</button>
                                </div>
                            </form>
                            <div class="w-full aspect-square bg-white rounded-md overflow-auto">
                                <img src="assets/upload/photo-produk/<?= $key['photo_produk']; ?>" onerror="this.src='assets/upload/photo-produk/error-produk/errorBanner.png';" alt="<?= $key['title_produk']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Photo Modal -->

        <!-- Info Modal -->
        <?php foreach ($dataProduk as $key) : ?>
            <div id="info-modal<?= $key['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Info : <?= $key['title_produk'] ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="info-modal<?= $key['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <div class="w-full aspect-square rounded-md overflow-auto bg-white">
                                        <img src="assets/upload/photo-produk/<?= $key['photo_produk'] ?>" onerror="this.src='assets/upload/photo-produk/error-produk/errorBanner.png';" alt="<?= $key['title_produk'] ?>">
                                    </div>
                                </div>
                                <div class="w-full p-2 aspect-square border border-zinc-600 rounded-md overflow-auto">
                                    <span class="text-white text-lg">Title : <span class="font-semibold"><?= $key['title_produk'] ?></span></span><br>
                                    <span class="text-white text-lg">Slug Title : <span class="font-semibold"><?= $key['slug_produk'] ?></span></span><br>
                                    <span class="text-white text-lg">Rating : <span class="font-semibold"><?= $key['rating_produk'] ?></span></span><br>
                                    <span class="text-white text-lg">Kota : <span class="font-semibold"><?= $key['kota_produk'] ?></span></span><br>
                                    <span class="text-white text-lg">Harga : <span class="font-semibold"><?= $key['harga_produk'] ?></span></span><br>
                                    <div>
                                        <span class="text-white text-lg">Deskripsi :</span><br>
                                        <div class="rounded-md w-full bg-zinc-900 p-2">
                                            <span class="font-semibold text-white text-lg"><?= $key['deskripsi_produk'] ?></span><br>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-white text-lg">Tag :</span><br>
                                        <div class="rounded-md w-full bg-zinc-900 p-2">
                                            <span class="font-semibold text-white text-lg"><?= $key['tag_produk'] ?></span><br>
                                        </div>
                                    </div>
                                    <span class="text-white text-lg">Status Produk : <span class="font-semibold"><?= $key['status_produk'] ?></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Info Modal -->
    </section>
    <!-- End Section Four -->
</main>
<!-- End Main Content -->

<?php include '../app/view/template/dashboard-footer.php'; ?>