<?php
include '../app/core/database.php';

// Product > List Product
$sqlProduk = "SELECT * FROM produk ORDER BY id DESC";
$resultProduk = mysqli_query($conn, $sqlProduk);
$dataProduk = mysqli_fetch_all($resultProduk, MYSQLI_ASSOC);
?>

<?php include '../app/view/template/header.php'; ?>

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://www.kamidigitalprinting.com/?page=produk">
<meta property="og:type" content="website">
<meta property="og:title" content="Produk | KAMI Digital Printing Surabaya">
<meta property="og:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta property="og:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="kamidigitalprinting.com">
<meta property="twitter:url" content="https://www.kamidigitalprinting.com/?page=produk">
<meta name="twitter:title" content="Produk | KAMI Digital Printing Surabaya">
<meta name="twitter:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta name="twitter:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

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

<title>Produk | Kami Digital Printing Surabaya</title>
</head>

<body>
    <?php include '../app/view/template/navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Section One -->
        <section class="c-hero-center h-screen w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div class="w-full h-full relative c-hero-center__background-image transition-opacity duration-1000">
                <div class="u-lazy">
                    <img src="assets/images/banner/banner_3.jpg" alt="All Team" class="lazy w-full h-full object-cover" />
                    <div class="u-lazy__placeholder"></div>
                </div>
            </div>
            <div class="absolute top-0 left-0 z-10 w-full h-full bg-gray-primary opacity-80"></div>
            <div class="absolute top-0 left-0 z-20 w-full h-full">
                <div class="container mx-auto h-full flex justify-center items-center">
                    <div data-sal-delay="1000" data-sal-duration="1800" data-sal-once="true">
                        <div class="container mx-auto w-full relative z-10">
                            <div class="w-full h-full pt-48 lg:w-3/4 z-10">
                                <div class="md:mb-16 mb-11 xl:mb-20" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500" data-sal-once="true">
                                    <h1 class="font-maisonExtendedExtraBold 
                                            font-extrabold
                                            text-size_13x md:text-size_24x 
                                            tracking-normal xl:tracking-title
                                            leading-height_36x md:leading-height_64x
                                            text-white">
                                        Kami menciptakan<br>
                                        solusi untuk membantumu<br>
                                        mewujudkan imajinasi
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Section One -->

        <!-- Section Two -->
        <section id="feature-card-slider" class="px-2 py-10">
            <div>
                <div class="container mx-auto">
                    <div class="text-center mb-8 md:mb-12 xl:mb-16">
                        <h2 class="c-feature-card-spot-brand__title font-maisonExtendedBold md:font-maisonExtendedExtraBold font-bold md:font-extrabold tracking-normal xl:tracking-title text-size_13x md:text-size_18x xl:text-size_24x leading-height_36x md:leading-height_48x xl:leading-height_64x">
                            Produk KAMI
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
                    <?php foreach ($dataProduk as $key) : ?>
                        <div class="w-full max-w-sm border rounded-lg shadow bg-gray-800">
                            <div class="bg-gray-200 w-full aspect-square flex items-center justify-center">
                                <img class="rounded-t-lg" src="assets/upload/photo-produk/<?= $key['photo_produk'] ?>" alt="<?= $key["title_produk"]; ?>" onerror="this.src='assets/upload/photo-produk/error-produk/errorBanner.png';" alt="<?= $key['title_produk'] ?>" />
                            </div>
                            <div class="px-5 py-4">
                                <h5 class="mb-4 text-xl tracking-tight text-white"><?= $key['title_produk'] ?></h5>
                                <span class="text-xl font-bold text-white">Rp <?= $key['harga_produk'] ?></span>
                                <div class="flex items-start gap-3 mt-3">
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-yellow-200 text-yellow-800 ms-3"><?= $key['rating_produk'] ?></span>
                                    </div>
                                    <div class="text-white text-lg mt-1">|</div>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <svg class="w-4 h-4 text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-200 text-blue-800 ms-3"><?= $key['kota_produk'] ?></span>
                                    </div>
                                </div>
                                <div class="w-full mt-2">
                                    <div class="flex items-center justify-end">
                                        <?php if ($key['status_produk'] === 'available') : ?>
                                            <a href="?page=produk/pesan&slug_produk=<?= $key['slug_produk'] ?>" class="flex items-center gap-1 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                    <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                                </svg>
                                                Pesan
                                            </a>
                                        <?php elseif ($key['status_produk'] === 'unavailable') : ?>
                                            <div class="flex items-center gap-1 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-gray-600">
                                                Produk Stok Habis
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- End of Section Two -->
    </main>
    <!-- End of Main Content -->

    <?php include '../app/view/template/footer.php'; ?>