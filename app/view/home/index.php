<?php
session_start();

include '../app/core/database.php';

// milestone > list-milestone
$sqlMilestone = "SELECT * FROM milestone ORDER BY timestamp DESC";
$resultMilestone = mysqli_query($conn, $sqlMilestone);
$dataMilestone = mysqli_fetch_all($resultMilestone, MYSQLI_ASSOC);
?>

<?php include '../app/view/template/header.php'; ?>

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://www.kamidigitalprinting.com/">
<meta property="og:type" content="website">
<meta property="og:title" content="Homepage | KAMI Digital Printing Surabaya">
<meta property="og:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta property="og:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="kamidigitalprinting.com">
<meta property="twitter:url" content="https://www.kamidigitalprinting.com/">
<meta name="twitter:title" content="Homepage | KAMI Digital Printing Surabaya">
<meta name="twitter:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta name="twitter:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

<!-- Meta Tags Generated via https://www.opengraph.xyz -->

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

<title>Homepage | Kami Digital Printing Surabaya</title>
</head>

<body>
    <?php include '../app/view/template/navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Section One -->
        <section class="c-hero-center h-screen_4/5x w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div class="w-full h-full relative c-hero-center__background-image transition-opacity duration-1000">
                <div class="u-lazy">
                    <img src="assets/images/banner/banner_1.png" alt="All Team" class="lazy w-full h-full object-cover" />
                    <div class="u-lazy__placeholder"></div>
                </div>
            </div>
            <div class="absolute top-0 left-0 z-10 w-full h-full bg-gray-primary opacity-80"></div>
            <div class="absolute top-0 left-0 z-20 w-full h-full">
                <div class="container mx-auto h-full flex justify-center items-center">
                    <div data-sal-delay="1000" data-sal-duration="1800" data-sal-once="true">

                        <div class="text-center c-hero-center__heading" data-sal="fade" data-sal-delay="500" data-sal-duration="1000" data-module="sal-related" data-sal-relation=".c-hero-center__heading,.c-hero-center__background-image,opacity-0,out">
                            <h1 class="
                                    font-maisonBold md:font-maisonExtendedExtraBold
                                    text-size_12x md:text-size_18x lg:text-size_24x xl:text-size_36x
                                    font-bold md:font-extrabold
                                    tracking-normal lg:tracking-title
                                    leading-height_32x md:leading-height_54x lg:leading-height_64x xl:leading-height_87x
                                    text-white">Sebuah perjalanan</h1>
                            <p class="
                                    font-maisonBook
                                    text-size_7x md:text-size_8x xl:text-size_9x
                                    font-light
                                    tracking-normal
                                    leading-height_21x md:leading-height_24x xl:leading-height_27x
                                    text-white
                                    mt-4 md:mt-5">Kenalan lebih dekat sama sejarah "Karya Merapi Indonesia" dan orang-orang dibaliknya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Section One -->

        <!-- Section Two -->
        <section class="c-hero-center pb-14 w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div class="container mx-auto relative transition-transform duration-300 c-feature-timeline__container">
                <div class="pt-16 md:pt-20 xl:pt-30 pb-8 md:pb-12 xl:pb-20">
                    <h2 class="font-maisonExtendedBold md:font-maisonExtendedExtraBold text-size_13x md:text-size_18x xl:text-size_24x font-bold md:font-extrabold tracking-normal xl:tracking-title leading-height_39x md:leading-height_54x xl:leading-height_64x text-center text-white">
                        Tentang KAMI
                    </h2>
                </div>

                <article class="text-white text-lg">
                    <span class="ml-10">
                        Salam perkenalan dari PT. Karya Merapi Indonesia, kami adalah perusahaan yang bergerak dibidang jasa penyediaan tenaga kerja kantor,kontruksi,advertising,promosi (outsourching ),penyediaan jasa pelaksanaan promosi( Trade & Consumer promo) & juga event organizer. kami adalah salah satu perusahaan yang berkomitmen dan berkompeten di bidangya.
                    </span>
                    <br>
                    <br>
                    <span class="ml-10">
                        PT. Karya Merapi Indonesia berdiri pada tahun 2017 yang sebelumya adalah CV. Merapi Production didirikan pada tahun 2013 oleh para profesional yang mempunyai kompetensi dibidangnya.mengikuti perkembangan waktu serta dari pengalaman yang ada kami berusaha memberikan service yang terbaik dalam bidan advertising maupun di bidang event organizer.
                    </span>
                    <br>
                    <br>
                    <span class="ml-10">
                        Perusahaan Kami berkomitmen selalu memberikan yang terbaik bagi klien sesuai dengan motto yang kami miliki“we make you to be best “ Harapan kami agar klien mempunyai Brand Experience yang baik saat mendapatkan layanan produk/jasa dari kami
                    </span>
                </article>
            </div>
        </section>
        <!-- End of Section Two -->

        <!-- Section Three -->
        <section id="feature-card-slider" class="c-feature-card-spot-brand bg-white flex flex-col justify-center overflow-hidden u-safe-y-120-120 " data-module="" data-theme="light" data-cy="c-feature-card-spot-brand--grid">
            <div>
                <div class="container mx-auto">
                    <div class="text-center mb-8 md:mb-12 xl:mb-16">
                        <h2 class="c-feature-card-spot-brand__title font-maisonExtendedBold md:font-maisonExtendedExtraBold font-bold md:font-extrabold tracking-normal xl:tracking-title text-size_13x md:text-size_18x xl:text-size_24x leading-height_36x md:leading-height_48x xl:leading-height_64x">
                            Visi & Misi
                        </h2>
                    </div>
                </div>
                <div class=" w-3/4 mx-auto text-lg grid grid-cols-1 gap-10 md:grid-cols-2">
                    <div class="c-feature-card-spot-brand__card--auto c-feature-card-spot-brand__card--use-min-height">
                        <div class="flex w-full h-full">
                            <div class="bg-cyan-500 shadow-lg shadow-cyan-500/50 bg-opacity-50 rounded-r40 flex flex-col justify-between w-full overflow-hidden">
                                <div class="p-10 pb-7 md:pb-14 order-1">
                                    <h3 class="text-lg font-bold">VISI</h3>
                                    <p class="c-feature-card-spot-brand__card-desc--join mt-3 md:mt-4 lg:mt-5">
                                        Menjadi perusahaan penyedia jasa layanan yang mampu memberikan pelayanan dengan kualitas terbaik dan selalu mengedepankan profesionalitas kepada perusahaan atau kepada instansi mitranya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-feature-card-spot-brand__card--auto c-feature-card-spot-brand__card--use-min-height">
                        <div class="flex w-full h-full">
                            <div class="bg-yellow-500 shadow-lg shadow-yellow-500/50 bg-opacity-50 rounded-r40 flex flex-col justify-between w-full overflow-hidden">
                                <div class="p-10 pb-7 md:pb-14 order-1">
                                    <h3 class="text-lg font-bold">MISI</h3>
                                    <p class="c-feature-card-spot-brand__card-desc--join mt-3 md:mt-4 lg:mt-5">
                                        memberikan pelayanan yang profesional dan berkualitas kepada pelanggan dengan tolak ukur yaitu :
                                        <br>
                                        – kepuasan mitra kerja
                                        <br>
                                        – memberikan pelayanan yang terbaik
                                        <br>
                                        – citra yang baik
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Section Three -->

        <!-- Section Four -->
        <section class="c-hero-center pb-14 pt-16 w-full h-screen relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div>
                <h2 class="font-maisonExtendedBold md:font-maisonExtendedExtraBold text-size_13x md:text-size_18x xl:text-size_24x font-bold md:font-extrabold tracking-normal xl:tracking-title leading-height_39x md:leading-height_54x xl:leading-height_64x text-center text-white">
                    Milestone
                </h2>
            </div>

            <div class="container mx-auto mt-2 p-5 w-full h-[95%] overflow-y-auto">
                <ol class="relative border-l border-gray-700">
                    <?php foreach ($dataMilestone as $rowMilestone) : ?>
                        <?php
                        $timestamp = $rowMilestone["date_milestone"];
                        //list($date, $time) = explode(" ", $timestamp);
                        $dateObj = date_create($timestamp);
                        $date = date_format($dateObj, "d F Y");
                        $date = ucfirst($date);
                        ?>
                        <li class="mb-10 ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -left-3 ring-8 ring-white bg-gray-primary">
                                <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </span>
                            <div class="p-2 rounded-lg bg-white">
                                <h3 class="mb-1 text-lg font-semibold text-zinc-900">
                                    <?= $rowMilestone['name_milestone'] ?>
                                </h3>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400">
                                    Bekerjasama Sejak <?= $date ?>
                                </time>
                                <p class="text-base font-normal text-gray-700">
                                    <?= $rowMilestone['description_milestone'] ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </section>
        <!-- End of Section Four -->

        <section id="feature-card-slider" class="c-feature-card-spot-brand bg-white flex flex-col justify-center overflow-hidden u-safe-y-120-120 " data-module="" data-theme="light" data-cy="c-feature-card-spot-brand--grid">
        </section>

        <!-- Section Five -->
        <section class="c-feature-spot-image-single u-safe-y-120-120 rounded-t-r40 sm:rounded-t-r64 xl:rounded-t-r96 -mt-10 sm:-mt-16 xl:-mt-24 relative overflow-hidden bg-dark200 onlyMobile:pb-0" data-theme="light" data-module="pull-margin">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="relative sm:order-2 ">
                        <div class="c-feature-spot-image-single__text">
                            <h2 class="font-maisonExtendedBold lg:font-maisonExtendedExtraBold font-bold lg:font-extrabold tracking-normal xl:tracking-title text-size_13x lg:text-size_18x xl:text-size_24x leading-height_36x lg:leading-height_48x xl:leading-height_64x text-center md:text-left mb-5 lg:mb-6 text-white">
                                Tertarik Menjadi Tim KAMI
                            </h2>
                            <p class="font-maisonBook text-size_8x font-light leading-height_24x text-white mb-8 xl:mb-10 -mt-3 sm:-mt-4 xl:-mt-5"></p>
                            <div class="text-center sm:text-left">
                                <a href="?page=karir" aria-label="Gojek Indonesia" data-gtm="">
                                    <button class="btn btn-solid bg-yellow-500 hover:bg-yellow-300">
                                        Selengkapnya
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="relative sm:order-1 ">
                        <div class="c-feature-spot-image-single__image text-center mx-auto sm:absolute">
                            <div class="u-lazy">
                                <picture>
                                    <img src="assets/images/banner/Joinus.png" alt="Kami Digital Printing" class="lazy w-[50%] mx-auto md:w-[75%] md:mt-[-32px] lg:w-[50%] lg:mt-[-64px]">
                                </picture>
                                <div class="u-lazy__placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Five -->
    </main>
    <!-- End Main Content -->

    <?php include '../app/view/template/footer.php'; ?>