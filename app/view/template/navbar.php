    <!-- Navigation -->
    <header class="c-header c-header--alternate font-maisonDemi font-medium fixed top-0 z-50 w-full py-4 sm:py-5 lg:py-10 xl:py-8 transition duration-300 delay-100 ease-in-out" data-module="navigation" x-data="{...dropdownHeader(), ...dropdownLang()}" x-bind:class="{'c-header--active': isDropdownHeader}">
        <div class="container mx-auto flex justify-between items-center">
            <!-- logo -->
            <span>
                <a href="?page=home" class="flex items-center">
                    <img src="assets/images/logo/logo.png" class="h-10 mr-3" alt="Logo KAMI Digital Printing Surabaya" />
                </a>
            </span> 
            <!-- end of logo -->
            <!-- burger menu -->
            <div class="o-burger relative w-4 h-4 z-10 xl:hidden">
            <span class="o-burger__item o-burger__item--top absolute left-0 w-full transform transition duration-100 ease-out top-0 bg-black rounded-r4"></span>
            <span class="o-burger__item o-burger__item--middle absolute left-0 w-full transform transition duration-100 ease-out bg-black rounded-r4"></span>
            <span class="o-burger__item o-burger__item--bottom absolute left-0 w-full transform transition duration-100 ease-out bottom-0 bg-black rounded-r4"></span>
            </div> 
            <!-- end of burger menu -->
            <!-- menu item -->
            <ul class="c-header__menu c-header--alternate__menu items-start flex flex-col xl:flex-row absolute xl:static min-h-screen w-full xl:w-auto xl:min-h-0 max-h-0 sm:max-h-screen left-0 overflow-y-scroll xl:overflow-y-visible invisible xl:visible pointer-events-none xl:pointer-events-auto pl-5 sm:pl-11 lg:pl-20 xl:pl-0 pt-10 xl:pt-0 xl:pb-0 transform xl:transform-none -translate-y-6 opacity-0 xl:opacity-100 transition-transform-opacity duration-200 delay-50 ease-out">
            
                <li class="mb-8 sm:mb-9 xl:my-0 xl:mx-5 relative gtm-navbar-home"  >
                    <a href="?page=home" class="font-maisonBold sm:font-maisonExtendedBold xl:font-maisonDemi leading-height_32x md:leading-height_36x xl:leading-height_27x text-size_12x md:text-size_13x xl:text-size_9x u-animation-underline ">Beranda</a>
                </li>

                <li class="mb-8 sm:mb-9 xl:my-0 xl:mx-5 relative gtm-navbar-careers"  >
                    <a href="?page=karir" class="font-maisonBold sm:font-maisonExtendedBold xl:font-maisonDemi leading-height_32x md:leading-height_36x xl:leading-height_27x text-size_12x md:text-size_13x xl:text-size_9x u-animation-underline ">Karir</a>
                </li>

                <li class="mb-8 sm:mb-9 xl:my-0 xl:mx-5 relative gtm-navbar-products"  >
                    <a href="?page=produk" class="font-maisonBold sm:font-maisonExtendedBold xl:font-maisonDemi leading-height_32x md:leading-height_36x xl:leading-height_27x text-size_12x md:text-size_13x xl:text-size_9x u-animation-underline ">Produk</a>
                </li>
                
                <li class="mb-8 sm:mb-9 xl:my-0 xl:mx-5 relative gtm-navbar-help"  >
                    <a href="?page=bantuan" class="font-maisonBold sm:font-maisonExtendedBold xl:font-maisonDemi leading-height_32x md:leading-height_36x xl:leading-height_27x text-size_12x md:text-size_13x xl:text-size_9x u-animation-underline ">Bantuan</a>
                </li>
            </ul> 
            <!-- end of menu item -->
        </div>
    </header> 
    <!-- End of Navigation-->