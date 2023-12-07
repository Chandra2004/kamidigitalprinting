<?php include '../app/models/KarirModel.php' ?>

<?php include '../app/view/template/header.php'; ?>

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://www.kamidigitalprinting.com/?page=karir">
<meta property="og:type" content="website">
<meta property="og:title" content="Karir | KAMI Digital Printing Surabaya">
<meta property="og:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta property="og:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="kamidigitalprinting.com">
<meta property="twitter:url" content="https://www.kamidigitalprinting.com/?page=karir">
<meta name="twitter:title" content="Karir | KAMI Digital Printing Surabaya">
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

<title>Karir | Kami Digital Printing Surabaya</title>
</head>

<body>
    <?php include '../app/view/template/navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Section One -->
        <section class="c-hero-center h-screen w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div class="w-full h-full relative c-hero-center__background-image transition-opacity duration-1000">
                <div class="u-lazy">
                    <img src="assets/images/banner/banner_2.jpg" alt="All Team" class="lazy w-full h-full object-cover" />
                    <div class="u-lazy__placeholder"></div>
                </div>
            </div>
            <div class="absolute top-0 left-0 z-10 w-full h-full bg-gray-primary opacity-80"></div>
            <div class="absolute top-0 left-0 z-20 w-full h-full">
                <div class="container mx-auto h-full flex justify-center items-center">
                    <div data-sal-delay="1000" data-sal-duration="1800" data-sal-once="true">
                        <div class="container mx-auto w-full relative z-10">
                            <div class="w-full pt-48 h-full lg:w-3/4 z-10">
                                <div class="md:mb-16 mb-11 xl:mb-20" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500" data-sal-once="true">
                                    <h1 class="font-maisonExtendedExtraBold 
                                        font-extrabold
                                        text-size_13x md:text-size_24x 
                                        tracking-normal xl:tracking-title
                                        leading-height_36x md:leading-height_64x
                                        text-white">
                                        Tampilkan Kreativitas Kita di Seluruh Dunia<br>dan Hasilkan Transformasi Sosial
                                    </h1>
                                </div>
                                <div class="c-hero-form__form-container" x-data="careerDataSet()" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="600" data-sal-once="true">
                                    <form action="" method="POST" class="w-full">
                                        <div class="w-full mb-2 md:mb-5">
                                            <input type="text" name="vacancy_name" class="form-control form__input-text form__input-text--light w-full overflow-ellipsis" placeholder="Cari lowongan (Cth: Marketing, Design Graphics...)" autocomplete="off">
                                        </div>
                                        <div class="w-full mb-2 md:mb-5">
                                            <input id="inputField" oninput="replaceSpaces()" type="text" name="subject_name" class="form-control form__input-text form__input-text--light w-full overflow-ellipsis" placeholder="Subjek" autocomplete="off">
                                        </div>
                                        <div class="w-full mb-2 md:mb-5">
                                            <input type="text" name="message_name" class="form-control form__input-text form__input-text--light w-full overflow-ellipsis" placeholder="Pesan" autocomplete="off">
                                        </div>
                                        <div class="w-full mb-2 md:mb-5">
                                            <input type="text" name="email_name" class="form-control form__input-text form__input-text--light w-full overflow-ellipsis" placeholder="Email" autocomplete="off">
                                        </div>
                                        <div class="w-full mb-2 md:mb-5">
                                            <input type="hidden" name="status_name" value="unread" checked>
                                        </div>
                                        <button type="submit" name="karir-submit" class="btn btn-solid bg-yellow-500 hover:bg-yellow-300 mb-18 md:mb-16 xl:mb-20">Cari lowongan</button>
                                    </form>
                                </div>
                                <?php if (!empty($success)) : ?>
                                    <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium">
                                            <?= $success ?>
                                        </div>
                                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Section One -->
    </main>
    <!-- End Main Content -->

    <script>
        function replaceSpaces() {
            var inputElement = document.getElementById('inputField');
            var inputValue = inputElement.value;

            // Ganti spasi dengan garis bawah
            var replacedValue = inputValue.replace(/ /g, '_');

            // Setel nilai input dengan spasi yang sudah diganti
            inputElement.value = replacedValue;
        }
    </script>

    <?php include '../app/view/template/footer.php'; ?>