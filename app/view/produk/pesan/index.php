<?php
include '../app/core/database.php';

$slug_initial = $_GET['slug_produk'];

// Query untuk mengambil detail produk berdasarkan slug_produk
$query = "SELECT * FROM produk WHERE slug_produk = '$slug_initial'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Tampilkan detail produk
    $row = $result->fetch_assoc();
    $photo_produk = $row['photo_produk'];
    $title_produk = $row['title_produk'];
    $slug_produk = $row['slug_produk'];
    $rating_produk = $row['rating_produk'];
    $kota_produk = $row['kota_produk'];
    $harga_produk = $row['harga_produk'];
    $deskripsi_produk = $row['deskripsi_produk'];
    $tag_produk = $row['tag_produk'];
    // ...
} else {
    header("Location: https://www.kamidigitalprinting.com");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (Bagian yang sama seperti sebelumnya)    $nama = $_POST['nama'];
    $nama = $_POST['nama'];
    $noHp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kotKab = $_POST['kota_kabupaten'];
    $kodePos = $_POST['kode_pos'];
    $level = $_POST['lvl_design'];
    $pengerjaan = $_POST['pengerjaan'];
    $deskripsi = $_POST['deskripsi'];

    // Mengambil nilai harga_produk dari database (asumsi tipe data di database adalah varchar)
    $harga_produk = $row['harga_produk'];
    // Menghilangkan karakter selain angka dari harga_produk
    $harga_produk_angka = (int)preg_replace('/[^0-9]/', '', $harga_produk);

    // Mengambil nilai dari lvl_design
    $lvl_design_value = $_POST['lvl_design'];
    // Menghilangkan karakter selain angka dari lvl_design_value
    $lvl_design_angka = (int)preg_replace('/[^0-9]/', '', $lvl_design_value);

    // Mengambil nilai dari pengerjaan
    $pengerjaan_value = $_POST['pengerjaan'];
    // Menghilangkan karakter selain angka dari pengerjaan_value
    $pengerjaan_angka = (int)preg_replace('/[^0-9]/', '', $pengerjaan_value);

    // Menjumlahkan ketiga nilai
    $total = $harga_produk_angka + $lvl_design_angka + $pengerjaan_angka;
    $total_formatted = number_format($total, 0, ',', '.');

    // ... (Bagian yang sama seperti sebelumnya)
    $space = "%20";
    $enter = "%0A";

    $url = "https://api.whatsapp.com/send?phone=6281359254021&text=";
    
    // Info-Salam
    $infoSalam = "Halo" . $enter . "*KAMI DIGITAL PRINTING SURABAYA*,";
    
    // Info-Produk
    $infoProduk = "==========" . $enter . "Saya ingin Memesan Produk Berikut : " . $enter . "Nama Produk : " . $title_produk . $enter . "Harga Produk : " . $harga_produk . $enter . "==========";
    
    // Info-Pemesan
    $infoPemesan = "==========" . $enter . "Nama Pemesan : " . $nama . $enter . "No Hp/WA : " . $noHp . $enter . "Alamat : " . $alamat . $enter . "Kelurahan : " . $kelurahan . $enter . "Kecamatan : " . $kecamatan . $enter . "Kota/Kab : " . $kotKab . $enter . "Kode Pos : " . $kodePos . $enter . "==========";

    // Info-Request
    $infoRequest = "==========" . $enter . "Request Produk :" . $enter . "Level Design : " . $level . $enter . "Pengerjaan : " . $pengerjaan . $enter . "Deskripsi : " . $enter . $deskripsi . $enter . "==========";

    // Invoice
    $invoice = "==========" . $enter . "*INVOICE*" . $enter . "Total Pembayaran Rp "  . "*" . $total_formatted . "*,-" . $enter . $enter . "Mohon Untuk Segera Membayar" . $enter . "Via TF: 0882315205" . $enter . "A/N : Abdul Hafid" . $enter . "==========";;

    // InfoFoto
    $infoFoto = "Foto Produk :" . $enter . "https://www.kamidigitalprinting.com/?page=produk/pesan%26slug_produk=" . $slug_produk;
    

    $api_url = $url . $space . $infoSalam . $enter . $enter . $infoProduk . $enter . $enter . $infoPemesan . $enter . $enter . $infoRequest . $enter . $enter . $invoice . $enter . $enter . $infoFoto;
    
    // Redirect ke URL WhatsApp
    header("Location: $api_url");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
    <title>Pesan | Kami Digital Printing Surabaya</title>

    <meta name="description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
    <meta name="keywords" content="<?= $tag_produk ?>">
    <meta name="author" content="KAMI Digital Printing">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.kamidigitalprinting.com/?page=produk/pesan&slug_produk=<?= $slug_produk ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title_produk ?> | KAMI Digital Printing Surabaya">
    <meta property="og:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
    <meta property="og:image" content="https://www.kamidigitalprinting.com/assets/upload/photo-produk/<?= $photo_produk ?>">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="kamidigitalprinting.com">
    <meta property="twitter:url" content="https://www.kamidigitalprinting.com/?page=produk/pesan&slug_produk=<?= $slug_produk ?>">
    <meta name="twitter:title" content="<?= $title_produk ?> | KAMI Digital Printing Surabaya">
    <meta name="twitter:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
    <meta name="twitter:image" content="https://www.kamidigitalprinting.com/assets/upload/photo-produk/<?= $photo_produk ?>">

    <script>
        export const onPreRenderHTML = ({
            getHeadComponents,
            replaceHeadComponents
        }) => {
            const headComponents = getHeadComponents();
            headComponents.sort((a, b) => {
                if (a.type === 'meta') {
                    return -1;
                } else if (b.type === 'meta') {
                    return 1;
                }
                return 0;
            });
            replaceHeadComponents(headComponents);
        };
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WP77DCTK');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Tailwindcss CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-200 p-6">
    <div class="bg-white w-[90%] md:w-full lg:w-1/2 mx-auto">
        <div class="flex justify-center">
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
        </div>

        <h1 class="text-center text-gray-800 font-bold text-xl my-3">Pemesanan Produk</h1>

        <div class="grid gap-2 grid-cols-1 md:grid-cols-2 p-2">
            <!-- Left -->
            <div class="mx-auto">
                <div class="w-full max-w-sm border rounded-lg shadow bg-gray-800">
                    <div class="bg-gray-200 w-full aspect-square flex items-center justify-center">
                        <img class="rounded-t-lg w-full" src="assets/upload/photo-produk/<?= $photo_produk ?>" alt="<?= $title_produk ?>" onerror="this.src='assets/upload/photo-produk/error-produk/errorBanner.png';" alt="<?= $key['title_produk'] ?>" />
                    </div>
                    <div class="px-5 py-4">
                        <h5 class="mb-4 text-xl tracking-tight text-white"><?= $title_produk ?></h5>
                        <span class="text-xl font-bold text-white">Rp <?= $harga_produk ?></span>
                        <div class="flex items-start gap-3 mt-3">
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-yellow-200 text-yellow-800 ms-3"><?= $rating_produk ?></span>
                            </div>
                            <div class="text-white text-lg mt-1">|</div>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-200 text-blue-800 ms-3"><?= $kota_produk ?></span>
                            </div>
                        </div>
                        <div class="bg-gray-700 mb-2 text-white w-full p-2 rounded-md">
                            <span class="font-bold">Deskripsi Produk :</span><br>
                            <?= $deskripsi_produk ?>
                        </div>
                        <div class="bg-gray-700 text-white w-full p-2 rounded-md">
                            <span class="font-bold">Tag Produk :</span><br>
                            <?= $tag_produk ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="mx-auto">
                <div class="w-full max-w-sm border rounded-lg shadow bg-gray-800 p-2">
                    <h1 class="text-center text-white font-bold text-xl my-3">Isi Jika Order</h1>
                    <form action="#" method="post">
                        <div class="mb-4">
                            <label for="nama" class="block text-white font-bold mb-2">Nama Pemesan</label>
                            <input type="text" id="nama" name="nama" oninput="namaInput(this)" class="w-full border p-2 rounded text-white bg-gray-700" required>
                            <script>
                                function namaInput(input) {
                                    // Hapus karakter selain angka menggunakan regular expression
                                    input.value = input.value.replace(/[^a-zA-Z]/g, '');
                                }
                            </script>
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="block text-white font-bold mb-2">No. HP Pemesan</label>
                            <input type="text" oninput="notelp(this)" id="no_hp" name="no_hp" class="w-full border p-2 rounded text-white bg-gray-700" required>
                            <script>
                                function notelp(input) {
                                    // Hapus karakter selain angka menggunakan regular expression
                                    input.value = input.value.replace(/[^0-9]/g, '');
                                }
                            </script>
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="block text-white font-bold mb-2">Alamat</label>
                            <textarea id="alamat" name="alamat" class="w-full border p-2 rounded text-white bg-gray-700" required></textarea>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-1/2 mr-2">
                                <label for="kelurahan" class="block text-white font-bold mb-2">Kelurahan</label>
                                <input type="text" id="kelurahan" name="kelurahan" class="w-full border p-2 rounded text-white bg-gray-700">
                            </div>
                            <div class="w-1/2">
                                <label for="kecamatan" class="block text-white font-bold mb-2">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="w-full border p-2 rounded text-white bg-gray-700">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="kota_kabupaten" class="block text-white font-bold mb-2">Kota/Kabupaten</label>
                            <input type="text" id="kota_kabupaten" name="kota_kabupaten" class="w-full border p-2 rounded text-white bg-gray-700" required>
                        </div>

                        <div class="mb-4">
                            <label for="kode_pos" class="block text-white font-bold mb-2">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" maxlength="5" oninput="kodePos(this)" class="w-full border p-2 rounded text-white bg-gray-700" required>
                            <script>
                                function kodePos(input) {
                                    // Hapus karakter selain angka menggunakan regular expression
                                    input.value = input.value.replace(/[^0-9]/g, '');
                                }
                            </script>
                        </div>

                        <div class="mb-4">
                            <div class="w-full p-2 rounded text-white bg-yellow-600">
                                <ul class="text-center">
                                    <li class="mt-4">Jika tidak memiliki File Design <b><i>(Ingin diDesignkan)</i></b> maka isi <label for="lvl_design"><b><i>Level Design</i></b></label></li>
                                    <li class="mt-4">Jika ingin point Pertama terlaksana berikan deskripsi secara rinci dan mudah dimengerti</li>
                                    <li class="mt-4">Jika memiliki file design mohon setelah mengirim form ini, kirim file tersebut melalui whatsApp</li>
                                    <li class="mt-4"><img src="assets/images/logo/logo.png" alt="Kami Logo" class="w-11 mx-auto"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="lvl_design" class="block text-white font-bold mb-2">Level Design</label>
                            <select id="lvl_design" name="lvl_design" class="w-full border p-2 rounded text-white bg-gray-700">
                                <option value="Kirim File">Kirim File</option>
                                <option value="D-Biasa Rp 15.000">Design Biasa - Rp 15.000,-</option>
                                <option value="D-Sedang Rp 25.000">Design Sedang - Rp 25.000,-</option>
                                <option value="D-Bagus Rp 50.000">Design Bagus - Rp 50.000,-</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="pengerjaan" class="block text-white font-bold mb-2">Pengerjaan</label>
                            <select id="pengerjaan" name="pengerjaan" class="w-full border p-2 rounded text-white bg-gray-700">
                                <option value="standar - Rp 0.000">Standard - Rp 0,- ( Estimasi 1 hari)</option>
                                <option value="express - Rp 20.000">Express - Rp 20.000,- ( Langsung Jadi)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-white font-bold mb-2">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="w-full border p-2 rounded text-white bg-gray-700"></textarea>
                        </div>

                        <div class="mb-4">
                            <h1 class="text-center text-white font-bold text-xl my-3">Persetujuan & Ketentuan</h1>
                            <div class="flex items-center mb-4">
                                <input id="sk1" type="checkbox" value="" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" required>
                                <label for="sk1" class="ms-2 text-sm font-medium text-gray-300">Saya memahami bahwa setiap revisi tambahan mungkin dikenakan biaya tambahan</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="sk2" type="checkbox" value="" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" required>
                                <label for="sk2" class="ms-2 text-sm font-medium text-gray-300">Saya memberikan izin untuk menggunakan desain ini untuk keperluan yang telah dijelaskan</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="sk3" type="checkbox" value="" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" required>
                                <label for="sk3" class="ms-2 text-sm font-medium text-gray-300">Saya bertanggung jawab atas keakuratan informasi yang disediakan</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="sk4" type="checkbox" value="" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" required>
                                <label for="sk4" class="ms-2 text-sm font-medium text-gray-300">Saya bersedia memesan produk ini</label>
                            </div>
                        </div>

                        <button type="" class="w-full p-2 rounded font-bold text-white bg-green-600">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
            <div class="h-1 w-24 bg-red-300"></div>
            <div class="h-1 w-24 bg-blue-300"></div>
        </div>
    </div>

    <!-- Flowbite JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP77DCTK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>