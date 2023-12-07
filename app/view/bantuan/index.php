<?php include '../app/view/template/header.php'; ?>

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://www.kamidigitalprinting.com/?page=bantuan">
<meta property="og:type" content="website">
<meta property="og:title" content="Bantuan | KAMI Digital Printing Surabaya">
<meta property="og:description" content="Perusahaan digital printing KAMI menyediakan layanan cetak berkualitas tinggi untuk kebutuhan bisnis dan personal.">
<meta property="og:image" content="https://www.kamidigitalprinting.com/assets/images/logo/favicon.png">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="kamidigitalprinting.com">
<meta property="twitter:url" content="https://www.kamidigitalprinting.com/?page=bantuan">
<meta name="twitter:title" content="Bantuan | KAMI Digital Printing Surabaya">
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

<title>Bantuan | Kami Digital Printing Surabaya</title>
</head>

<body>
    <?php include '../app/view/template/navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Section One -->
        <section class="c-hero-center h-screen w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300 bg-gray-primary" data-theme="dark" data-module="sal" data-cy="c-hero-center">
            <div class="w-full h-full relative c-hero-center__background-image transition-opacity duration-1000">
                <div class="u-lazy">
                    <img src="assets/images/banner/banner_4.jpg" alt="All Team" class="lazy w-full h-full object-cover" />
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
                                        Ingin tahu lebih banyak tentang cara kami<br>
                                        menjadikan imajinasi Anda kenyataan?<br>
                                        Baca FAQ kami di bawah ini.
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
        <section class="c-accordion relative py-12 md:py-16 lg:py-20" data-theme="light">
            <div class="mb-6 md:mb-8 lg:mb-10 text-center">
                <div class="container mx-auto">
                    <div class="mx-auto w-full lg:w-9/12 xl:w-7/12 ">
                        <h2 class="font-maisonExtendedBold lg:font-maisonExtendedExtraBold font-bold lg:font-extrabold tracking-normal xl:tracking-title text-size_12x md:text-size_13x lg:text-size_18x leading-height_32x md:leading-height_39x lg:leading-height_54x">
                            Top FAQ
                        </h2>
                    </div>
                </div>
            </div>

            <div class="container mx-auto">
                <div class="block shadow-high rounded-r24 md:rounded-r40 px-5 py-6 md:px-10 xl:py-8" x-data="{selected:null}">
                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 1 ? selected = 1 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Apa yang KAMI Digital Printing lakukan?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 1 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                KAMI Digital Printing adalah perusahaan yang menyediakan layanan cetak digital berkualitas tinggi. Kami mencetak berbagai produk seperti brosur, spanduk, poster, kaos, dan banyak lagi.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 2 ? selected = 2 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Apa jenis produk yang dapat dicetak oleh KAMI Digital Printing?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 2 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Kami dapat mencetak berbagai macam produk cetakan, termasuk:

                                Brosur dan pamflet,
                                Spanduk dan backdrop,
                                Poster dan kartu pos,
                                Kaos dan produk tekstil lainnya,
                                Bahan promosi seperti stiker, label, dan sebagainya.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 3 ? selected = 3 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Bagaimana cara memesan layanan KAMI Digital Printing?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 3 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Anda dapat memesan layanan kami dengan menghubungi tim penjualan kami melalui telepon, email, atau mengunjungi kantor kami. Kami juga menyediakan opsi pemesanan online melalui situs web kami.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 4 ? selected = 4 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Apakah KAMI Digital Printing menerima pesanan dalam jumlah besar?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 4 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Ya, kami menyediakan layanan cetak dalam jumlah besar untuk kebutuhan bisnis atau acara khusus. Kami memiliki fasilitas yang memadai untuk mengatasi pesanan dalam jumlah besar.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 5 ? selected = 5 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Berapa lama waktu produksi yang dibutuhkan untuk pesanan saya?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 5 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Waktu produksi dapat bervariasi tergantung pada jenis produk dan jumlah pesanan Anda. Kami akan memberikan perkiraan waktu produksi saat Anda melakukan pemesanan. Untuk pesanan dalam jumlah besar, kami akan memberikan jadwal produksi yang lebih rinci.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 6 ? selected = 6 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Bagaimana dengan kualitas cetakan dari KAMI Digital Printing?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 6 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Kualitas cetakan kami sangat tinggi. Kami menggunakan peralatan cetak modern dan bahan berkualitas untuk memastikan hasil cetakan yang jelas dan tajam.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 7 ? selected = 7 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Bisakah saya melihat sampel pekerjaan sebelum memesan?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 7 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 7 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Ya, kami menyediakan sampel pekerjaan sebelum produksi besar-besaran. Anda dapat meminta sampel cetakan untuk memeriksa kualitas dan desain sebelum pesanan Anda diproses.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 8 ? selected = 8 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Apakah KAMI Digital Printing memiliki layanan desain grafis?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 8 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 8 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Ya, kami memiliki tim desain grafis yang berpengalaman yang dapat membantu Anda dengan desain produk cetakan Anda. Silakan hubungi kami untuk detail lebih lanjut.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 9 ? selected = 9 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Bagaimana dengan harga untuk layanan KAMI Digital Printing?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 9 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 9 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Harga kami bervariasi tergantung pada jenis produk, jumlah pesanan, dan spesifikasi lainnya. Kami akan memberikan penawaran harga yang sesuai setelah menerima detail pesanan Anda.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 10 ? selected = 10 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Apakah KAMI Digital Printing menerima pengiriman pesanan?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 10 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 10 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Ya, kami dapat mengirimkan pesanan Anda ke lokasi yang Anda inginkan. Biaya pengiriman akan ditentukan berdasarkan lokasi dan ukuran pesanan Anda.
                            </div>
                        </div>
                    </div>

                    <div class="border-system-disabled py-4 xl:py-6 " style="padding-top: 0; ">
                        <div class="border-b pb-2 flex justify-between items-center cursor-pointer" @click="selected !== 11 ? selected = 11 : selected = null" data-gtm="help_top_faqs">
                            <h3 class="font-maisonDemi xl:font-maisonBold font-medium xl:font-bold text-size_8x md:text-size_9x xl:text-size_12x leading-height_24x md:leading-height_27x xl:leading-height_32x">
                                Bagaimana saya dapat menghubungi KAMI Digital Printing?
                            </h3>
                            <i class="pi pi-expand_more text-size_14x transition-transform duration-200 ease-out transform" x-ref="container1" x-bind:class="selected == 11 ? 'rotate-180' : ''"></i>
                        </div>
                        <div class="relative overflow-hidden transition-height-width max-h-0 duration-300" x-ref="container1" x-bind:style="selected == 11 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="font-normal text-size_7x md:text-size_8x xl:text-size_9x leading-height_21x md:leading-height_24x xl:leading-height_27x line-clamp-5 md:line-clamp-3 xl:line-clamp-2 mt-6 mb-6">
                                Anda dapat menghubungi kami melalui telepon di +62 813-5925-4021 atau melalui email di karya.merapiindonesia@yahoo.com. Kami juga memiliki situs web resmi di karyamerapiindonesia.com yang dapat Anda kunjungi untuk informasi lebih lanjut.

                                Jangan ragu untuk menyesuaikan pertanyaan-pertanyaan ini sesuai dengan kebutuhan perusahaan Anda. FAQ ini dapat membantu calon pelanggan memahami lebih baik tentang layanan dan proses bisnis KAMI Digital Printing Anda.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Two -->
    </main>
    <!-- End Main Content -->

    <?php include '../app/view/template/footer.php'; ?>