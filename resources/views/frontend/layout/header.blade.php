
<div class="zapta-loader">
    <div class="position-relative" style="height: 170px; width:170px;transform:scale(0.7);">
        <div class="loader-loading"></div>
        <img src="{{ asset('cuf_images/logo.png') }}"  class="rounded-circle absolute-logo" width="160px" height="160px" viewBox="0 0 100 125"
            fill="none" >
    </div>
</div>


<!-- Navigation / Header  -->

<header class="nav-bar bg-isChange bg-change">
    <div class="container" style="position: relative;">
        <div class="zapta-navbar">
            <!-- <img src="../assets/images/logo.svg" alt="zapa logo"> -->
            <a href="{{ route('custom.index') }}" aria-label="navigation">
                <svg class="zapta-logo" width="138" height="43" viewBox="0 0 138 43" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M32.1556 15.5467C32.1791 17.6106 30.5399 19.2429 29.0104 19.3996C27.993 19.5038 26.9509 19.5736 25.9773 19.8592C24.6306 20.2544 23.3936 20.9223 22.4256 22.0242C21.3039 23.302 20.6764 24.7131 20.5667 26.4891C20.4591 28.2384 19.8675 29.9512 17.9727 30.5795C15.0652 31.5448 11.8124 30.1552 11.8494 26.6427C11.8651 25.192 12.8746 23.6467 14.4871 23.0388C15.352 22.7125 16.181 22.7533 17.0304 22.6319C19.5761 22.2701 21.5874 21.0415 22.8243 18.6758C23.4171 17.5429 23.7567 16.3381 23.7039 15.0312C23.6558 13.8275 23.1314 12.4218 22.4311 11.4886C21.249 9.91327 20.0669 9.03703 18.2798 8.52909C16.7828 8.10279 15.2209 8.1307 13.6556 8.64937C12.3301 9.08857 11.3407 9.89069 10.4097 10.8604C9.42139 11.8913 8.89251 13.1209 8.81072 14.5566C8.73229 15.9343 8.41744 17.2595 7.44375 18.2538C6.44655 19.2729 5.23083 19.6541 3.7507 19.4554C2.44536 19.2804 1.54675 18.6898 0.774753 17.6718C-0.384926 16.1427 -0.240387 14.0004 1.19268 12.6849C2.19214 11.7668 3.27114 11.3812 4.72215 11.2566C7.48856 11.0183 10.832 8.9769 11.4741 6.10651C11.6141 5.47831 11.7643 4.84152 11.8057 4.20257C11.9189 2.43181 12.9509 0.779165 14.7536 0.255128C17.463 -0.531998 19.5335 0.507482 20.3212 3.30054C20.4546 3.77411 20.5723 4.26379 20.6081 4.75346C20.7806 7.14921 21.9437 8.86414 23.9426 10.0851C25.2245 10.8679 26.5656 11.1332 28.0613 11.2867C30.0502 11.4897 32.067 12.993 32.1556 15.5467Z"
                        fill="white"></path>
                    <path
                        d="M0.00811768 26.5074C0.00811768 24.4435 1.66641 22.8284 3.19808 22.6877C4.21658 22.5943 5.25972 22.5364 6.23677 22.2604C7.58805 21.8791 8.83289 21.2251 9.81327 20.133C10.9494 18.868 11.5937 17.4635 11.7237 15.6884C11.8514 13.9402 12.4632 12.2339 14.3645 11.6261C17.2835 10.6918 20.5204 12.1168 20.4421 15.6283C20.4095 17.079 19.382 18.6136 17.763 19.2041C16.8946 19.5209 16.0654 19.4715 15.215 19.5833C12.6649 19.9182 10.6391 21.1253 9.37523 23.477C8.76902 24.6035 8.41608 25.804 8.45305 27.112C8.48778 28.3158 8.96847 29.3562 9.51412 30.3785C10.4519 32.1376 12.0195 33.1438 13.801 33.6721C15.2935 34.1146 16.8555 34.1027 18.4264 33.6011C19.7575 33.176 20.7558 32.3856 21.6981 31.4245C22.6986 30.4043 23.2421 29.1813 23.3396 27.7455C23.4336 26.3688 23.7643 25.0479 24.7491 24.0634C25.7585 23.055 26.9777 22.6867 28.4566 22.9014C29.7597 23.0904 30.6517 23.6907 31.4114 24.7172C32.5532 26.2583 32.3829 28.3995 30.9352 29.6988C29.9245 30.6063 28.8422 30.9799 27.3889 31.0894C24.6202 31.2979 21.2532 33.3037 20.5777 36.1666C20.4297 36.7938 20.2728 37.4284 20.2246 38.0673C20.0903 39.8371 19.0404 41.479 17.2308 41.9836C14.5125 42.7418 12.4542 41.6798 11.699 38.8791C11.5713 38.4045 11.4592 37.9127 11.429 37.423C11.2834 35.0263 10.1416 33.2984 8.15725 32.056C6.8844 31.2591 5.54657 30.9799 4.05188 30.8103C2.06529 30.587 0.0663818 29.0621 0.00811768 26.5074Z"
                        fill="white"></path>
                    <path
                        d="M58.0031 23.4654V27.1623H40.8719V24.2216L51.621 11.2545H41.0959V7.55762H57.5832V10.4983L46.8623 23.4654H58.0031ZM73.8158 22.9613H64.7183L62.9828 27.1623H58.3362L67.0697 7.55762H71.5484L80.3099 27.1623H75.5513L73.8158 22.9613ZM72.3882 19.5165L69.2811 12.0107L66.1739 19.5165H72.3882ZM90.8244 7.55762C92.5596 7.55762 94.0622 7.84702 95.331 8.42582C96.6189 9.00463 97.6079 9.8262 98.2986 10.8905C98.9885 11.9547 99.3344 13.215 99.3344 14.6714C99.3344 16.109 98.9885 17.3693 98.2986 18.4523C97.6079 19.5165 96.6189 20.338 95.331 20.9168C94.0622 21.477 92.5596 21.757 90.8244 21.757H86.8775V27.1623H82.3427V7.55762H90.8244ZM90.5725 18.0602C91.9349 18.0602 92.9706 17.7708 93.6797 17.192C94.3888 16.5945 94.7429 15.7543 94.7429 14.6714C94.7429 13.5698 94.3888 12.7296 93.6797 12.1508C92.9706 11.5532 91.9349 11.2545 90.5725 11.2545H86.8775V18.0602H90.5725ZM106.083 11.2545H99.8132V7.55762H116.888V11.2545H110.618V27.1623H106.083V11.2545ZM131.249 22.9613H122.151L120.416 27.1623H115.769L124.502 7.55762H128.981L137.743 27.1623H132.984L131.249 22.9613ZM129.821 19.5165L126.714 12.0107L123.607 19.5165H129.821Z"
                        fill="white"></path>
                    <path
                        d="M41.7979 37.5487H39.8444V36.397H45.1643V37.5487H43.2107V42.5049H41.7979V37.5487ZM52.9188 41.3705V42.5049H48.192V36.397H52.8054V37.5312H49.596V38.8575H52.4304V39.957H49.596V41.3705H52.9188ZM59.215 42.6096C58.5928 42.6096 58.0289 42.4758 57.5231 42.2083C57.023 41.9348 56.6276 41.5596 56.337 41.0826C56.0521 40.5997 55.9097 40.056 55.9097 39.4509C55.9097 38.8459 56.0521 38.3049 56.337 37.8279C56.6276 37.3451 57.023 36.9699 57.5231 36.7023C58.0289 36.4289 58.5958 36.2922 59.2237 36.2922C59.7528 36.2922 60.2294 36.3852 60.654 36.5714C61.0841 36.7577 61.4447 37.0251 61.7354 37.3742L60.8284 38.2118C60.4156 37.7349 59.9039 37.4964 59.2935 37.4964C58.9156 37.4964 58.5783 37.5806 58.2818 37.7494C57.9853 37.9122 57.7527 38.1421 57.5842 38.4387C57.4213 38.7354 57.34 39.0728 57.34 39.4509C57.34 39.8291 57.4213 40.1664 57.5842 40.4631C57.7527 40.7598 57.9853 40.9924 58.2818 41.1612C58.5783 41.324 58.9156 41.4055 59.2935 41.4055C59.9039 41.4055 60.4156 41.1641 60.8284 40.6812L61.7354 41.5189C61.4447 41.8737 61.0841 42.1442 60.654 42.3304C60.2237 42.5166 59.744 42.6096 59.215 42.6096ZM70.5558 36.397V42.5049H69.143V40.0006H66.3696V42.5049H64.9569V36.397H66.3696V38.8052H69.143V36.397H70.5558ZM79.8667 36.397V42.5049H78.7068L75.6631 38.7965V42.5049H74.2677V36.397H75.4364L78.4714 40.1054V36.397H79.8667ZM86.535 42.6096C85.9014 42.6096 85.3286 42.473 84.8169 42.1995C84.3111 41.926 83.913 41.5509 83.6222 41.0739C83.3373 40.591 83.1948 40.05 83.1948 39.4509C83.1948 38.8518 83.3373 38.3136 83.6222 37.8367C83.913 37.3538 84.3111 36.9758 84.8169 36.7023C85.3286 36.4289 85.9014 36.2922 86.535 36.2922C87.1687 36.2922 87.7386 36.4289 88.2443 36.7023C88.7502 36.9758 89.1484 37.3538 89.4392 37.8367C89.7299 38.3136 89.8752 38.8518 89.8752 39.4509C89.8752 40.05 89.7299 40.591 89.4392 41.0739C89.1484 41.5509 88.7502 41.926 88.2443 42.1995C87.7386 42.473 87.1687 42.6096 86.535 42.6096ZM86.535 41.4055C86.8955 41.4055 87.221 41.324 87.5118 41.1612C87.8025 40.9924 88.0293 40.7598 88.192 40.4631C88.3607 40.1664 88.4449 39.8291 88.4449 39.4509C88.4449 39.0728 88.3607 38.7354 88.192 38.4387C88.0293 38.1421 87.8025 37.9122 87.5118 37.7494C87.221 37.5806 86.8955 37.4964 86.535 37.4964C86.1745 37.4964 85.849 37.5806 85.5583 37.7494C85.2675 37.9122 85.0379 38.1421 84.8693 38.4387C84.7066 38.7354 84.6251 39.0728 84.6251 39.4509C84.6251 39.8291 84.7066 40.1664 84.8693 40.4631C85.0379 40.7598 85.2675 40.9924 85.5583 41.1612C85.849 41.324 86.1745 41.4055 86.535 41.4055ZM93.2044 36.397H94.6172V41.3531H97.6785V42.5049H93.2044V36.397ZM103.59 42.6096C102.956 42.6096 102.383 42.473 101.872 42.1995C101.365 41.926 100.967 41.5509 100.676 41.0739C100.392 40.591 100.25 40.05 100.25 39.4509C100.25 38.8518 100.392 38.3136 100.676 37.8367C100.967 37.3538 101.365 36.9758 101.872 36.7023C102.383 36.4289 102.956 36.2922 103.59 36.2922C104.223 36.2922 104.793 36.4289 105.299 36.7023C105.805 36.9758 106.203 37.3538 106.493 37.8367C106.784 38.3136 106.93 38.8518 106.93 39.4509C106.93 40.05 106.784 40.591 106.493 41.0739C106.203 41.5509 105.805 41.926 105.299 42.1995C104.793 42.473 104.223 42.6096 103.59 42.6096ZM103.59 41.4055C103.951 41.4055 104.275 41.324 104.566 41.1612C104.857 40.9924 105.083 40.7598 105.247 40.4631C105.416 40.1664 105.5 39.8291 105.5 39.4509C105.5 39.0728 105.416 38.7354 105.247 38.4387C105.083 38.1421 104.857 37.9122 104.566 37.7494C104.275 37.5806 103.951 37.4964 103.59 37.4964C103.229 37.4964 102.904 37.5806 102.613 37.7494C102.322 37.9122 102.093 38.1421 101.924 38.4387C101.761 38.7354 101.68 39.0728 101.68 39.4509C101.68 39.8291 101.761 40.1664 101.924 40.4631C102.093 40.7598 102.322 40.9924 102.613 41.1612C102.904 41.324 103.229 41.4055 103.59 41.4055ZM114.384 39.3549H115.674V41.833C115.343 42.0832 114.96 42.2751 114.523 42.4089C114.087 42.5428 113.649 42.6096 113.207 42.6096C112.573 42.6096 112.003 42.4758 111.498 42.2083C110.991 41.9348 110.593 41.5596 110.302 41.0826C110.018 40.5997 109.875 40.056 109.875 39.4509C109.875 38.8459 110.018 38.3049 110.302 37.8279C110.593 37.3451 110.994 36.9699 111.506 36.7023C112.018 36.4289 112.593 36.2922 113.232 36.2922C113.768 36.2922 114.253 36.3825 114.689 36.5627C115.125 36.743 115.492 37.0048 115.788 37.348L114.881 38.1857C114.445 37.7262 113.919 37.4964 113.303 37.4964C112.913 37.4964 112.567 37.5779 112.265 37.7407C111.963 37.9035 111.727 38.1334 111.558 38.43C111.39 38.7267 111.306 39.067 111.306 39.4509C111.306 39.8291 111.39 40.1664 111.558 40.4631C111.727 40.7598 111.96 40.9924 112.256 41.1612C112.558 41.324 112.901 41.4055 113.286 41.4055C113.692 41.4055 114.059 41.3182 114.384 41.1437V39.3549ZM119.255 36.397H120.668V42.5049H119.255V36.397ZM129.11 41.3705V42.5049H124.384V36.397H128.997V37.5312H125.788V38.8575H128.622V39.957H125.788V41.3705H129.11ZM134.508 42.6096C134.026 42.6096 133.558 42.5456 133.105 42.4176C132.656 42.2838 132.296 42.1122 132.023 41.9028L132.503 40.8383C132.764 41.0303 133.075 41.1844 133.436 41.3008C133.796 41.4172 134.157 41.4753 134.517 41.4753C134.918 41.4753 135.214 41.4172 135.406 41.3008C135.598 41.1786 135.694 41.0186 135.694 40.8208C135.694 40.6754 135.636 40.5561 135.52 40.4631C135.41 40.3642 135.264 40.2856 135.084 40.2275C134.909 40.1693 134.671 40.1054 134.369 40.0355C133.904 39.9251 133.523 39.8144 133.227 39.704C132.929 39.5935 132.674 39.4161 132.459 39.1717C132.25 38.9274 132.145 38.6016 132.145 38.1944C132.145 37.8396 132.24 37.5196 132.433 37.2346C132.625 36.9437 132.912 36.714 133.296 36.5453C133.685 36.3765 134.16 36.2922 134.717 36.2922C135.107 36.2922 135.488 36.3388 135.86 36.4318C136.232 36.5248 136.558 36.6587 136.836 36.8332L136.401 37.9065C135.836 37.5866 135.272 37.4265 134.709 37.4265C134.314 37.4265 134.02 37.4906 133.828 37.6185C133.642 37.7465 133.549 37.9152 133.549 38.1246C133.549 38.334 133.657 38.4911 133.871 38.5958C134.093 38.6947 134.426 38.7936 134.874 38.8925C135.339 39.0029 135.721 39.1135 136.017 39.224C136.313 39.3346 136.567 39.509 136.776 39.7476C136.99 39.9861 137.099 40.309 137.099 40.7161C137.099 41.0652 137 41.385 136.802 41.676C136.61 41.961 136.319 42.1878 135.93 42.3566C135.54 42.5253 135.067 42.6096 134.508 42.6096Z"
                        fill="white"></path>
                </svg>
            </a>

            <div class="nav-items">
                <a href="{{ route('custom.index') }}" class="nav-link">Home</a>
                <a href="{{ route('custom.about') }}" class="nav-link {{ Route::currentRouteName() == 'custom.about' ? 'active' : '' }} ">About Us</a>
                <a href="{{ route('custom.services') }}" class="nav-link {{ Route::currentRouteName() == 'custom.services' ? 'active' : '' }}">Services</a>
                <a href="{{ route('custom.projects') }}" class="nav-link {{ Route::currentRouteName() == 'custom.projects' ? 'active' : '' }}">Projects</a>
                <a href="{{ route('custom.blogs') }}" class="nav-link {{ Route::currentRouteName() == 'custom.blogs' ? 'active' : '' }}">Blogs</a>
                {{-- <a href="https://career.zaptatech.com/job-openings" class="nav-link">Careers</a> --}}
                <a href="{{ route('custom.contact') }}" class="nav-link nav-btn component-btn">Contact Us</a>
            </div>

            <svg id="nav-toggler" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                fill="none" data-bs-toggle="offcanvas" data-bs-target="#navTogglerCanvas"
                aria-controls="navTogglerCanvas">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.00012 8.67188V6.67188H21.0001V8.67188H3.00012ZM3.00012 13.6719H21.0001V11.6719H3.00012V13.6719ZM3.00012 18.6719H21.0001V16.6719H3.00012V18.6719Z"
                    fill="#005BAA"></path>
            </svg>
        </div>
    </div>
</header>


<!-- Mobile menu -->


<div class="offcanvas offcanvas-end" id="navTogglerCanvas" aria-labelledby="navTogglerCanvasLabel"
    style="width: fit-content;">
    <div class="mobile-menu">
        <button type="button" class="btnClose border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M14.8512 2.45104C14.9367 2.36563 15.0046 2.26421 15.0509 2.15258C15.0972 2.04094 15.1211 1.92127 15.1212 1.80041C15.1212 1.67954 15.0975 1.55985 15.0513 1.44815C15.0051 1.33646 14.9374 1.23496 14.852 1.14944C14.7666 1.06393 14.6652 0.996069 14.5535 0.949747C14.4419 0.903426 14.3222 0.879546 14.2014 0.879472C14.0805 0.879398 13.9608 0.90313 13.8491 0.949314C13.7374 0.995499 13.6359 1.06323 13.5504 1.14864L7.99999 6.69904L2.45119 1.14864C2.27849 0.975933 2.04424 0.878906 1.79999 0.878906C1.55575 0.878906 1.3215 0.975933 1.14879 1.14864C0.976086 1.32135 0.879059 1.55559 0.879059 1.79984C0.879059 2.04409 0.976086 2.27833 1.14879 2.45104L6.69919 7.99984L1.14879 13.5486C1.06328 13.6342 0.995442 13.7357 0.949161 13.8474C0.902879 13.9591 0.879059 14.0789 0.879059 14.1998C0.879059 14.3208 0.902879 14.4405 0.949161 14.5523C0.995442 14.664 1.06328 14.7655 1.14879 14.851C1.3215 15.0237 1.55575 15.1208 1.79999 15.1208C1.92093 15.1208 2.04069 15.097 2.15242 15.0507C2.26415 15.0044 2.36568 14.9366 2.45119 14.851L7.99999 9.30064L13.5504 14.851C13.7231 15.0235 13.9573 15.1204 14.2014 15.1202C14.4455 15.1201 14.6795 15.0229 14.852 14.8502C15.0245 14.6775 15.1213 14.4434 15.1212 14.1993C15.121 13.9552 15.0239 13.7211 14.8512 13.5486L9.30079 7.99984L14.8512 2.45104Z"
                    fill="black"></path>
            </svg>
        </button>
        <a href="{{ route('custom.index') }}" aria-label="navigation" class="mb-3">
            <svg class="zapta-logo" width="138" height="43" viewBox="0 0 138 43" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M32.1556 15.5467C32.1791 17.6106 30.5399 19.2429 29.0104 19.3996C27.993 19.5038 26.9509 19.5736 25.9773 19.8592C24.6306 20.2544 23.3936 20.9223 22.4256 22.0242C21.3039 23.302 20.6764 24.7131 20.5667 26.4891C20.4591 28.2384 19.8675 29.9512 17.9727 30.5795C15.0652 31.5448 11.8124 30.1552 11.8494 26.6427C11.8651 25.192 12.8746 23.6467 14.4871 23.0388C15.352 22.7125 16.181 22.7533 17.0304 22.6319C19.5761 22.2701 21.5874 21.0415 22.8243 18.6758C23.4171 17.5429 23.7567 16.3381 23.7039 15.0312C23.6558 13.8275 23.1314 12.4218 22.4311 11.4886C21.249 9.91327 20.0669 9.03703 18.2798 8.52909C16.7828 8.10279 15.2209 8.1307 13.6556 8.64937C12.3301 9.08857 11.3407 9.89069 10.4097 10.8604C9.42139 11.8913 8.89251 13.1209 8.81072 14.5566C8.73229 15.9343 8.41744 17.2595 7.44375 18.2538C6.44655 19.2729 5.23083 19.6541 3.7507 19.4554C2.44536 19.2804 1.54675 18.6898 0.774753 17.6718C-0.384926 16.1427 -0.240387 14.0004 1.19268 12.6849C2.19214 11.7668 3.27114 11.3812 4.72215 11.2566C7.48856 11.0183 10.832 8.9769 11.4741 6.10651C11.6141 5.47831 11.7643 4.84152 11.8057 4.20257C11.9189 2.43181 12.9509 0.779165 14.7536 0.255128C17.463 -0.531998 19.5335 0.507482 20.3212 3.30054C20.4546 3.77411 20.5723 4.26379 20.6081 4.75346C20.7806 7.14921 21.9437 8.86414 23.9426 10.0851C25.2245 10.8679 26.5656 11.1332 28.0613 11.2867C30.0502 11.4897 32.067 12.993 32.1556 15.5467Z"
                    fill="#005BAA"></path>
                <path
                    d="M0.00811768 26.5074C0.00811768 24.4435 1.66641 22.8284 3.19808 22.6877C4.21658 22.5943 5.25972 22.5364 6.23677 22.2604C7.58805 21.8791 8.83289 21.2251 9.81327 20.133C10.9494 18.868 11.5937 17.4635 11.7237 15.6884C11.8514 13.9402 12.4632 12.2339 14.3645 11.6261C17.2835 10.6918 20.5204 12.1168 20.4421 15.6283C20.4095 17.079 19.382 18.6136 17.763 19.2041C16.8946 19.5209 16.0654 19.4715 15.215 19.5833C12.6649 19.9182 10.6391 21.1253 9.37523 23.477C8.76902 24.6035 8.41608 25.804 8.45305 27.112C8.48778 28.3158 8.96847 29.3562 9.51412 30.3785C10.4519 32.1376 12.0195 33.1438 13.801 33.6721C15.2935 34.1146 16.8555 34.1027 18.4264 33.6011C19.7575 33.176 20.7558 32.3856 21.6981 31.4245C22.6986 30.4043 23.2421 29.1813 23.3396 27.7455C23.4336 26.3688 23.7643 25.0479 24.7491 24.0634C25.7585 23.055 26.9777 22.6867 28.4566 22.9014C29.7597 23.0904 30.6517 23.6907 31.4114 24.7172C32.5532 26.2583 32.3829 28.3995 30.9352 29.6988C29.9245 30.6063 28.8422 30.9799 27.3889 31.0894C24.6202 31.2979 21.2532 33.3037 20.5777 36.1666C20.4297 36.7938 20.2728 37.4284 20.2246 38.0673C20.0903 39.8371 19.0404 41.479 17.2308 41.9836C14.5125 42.7418 12.4542 41.6798 11.699 38.8791C11.5713 38.4045 11.4592 37.9127 11.429 37.423C11.2834 35.0263 10.1416 33.2984 8.15725 32.056C6.8844 31.2591 5.54657 30.9799 4.05188 30.8103C2.06529 30.587 0.0663818 29.0621 0.00811768 26.5074Z"
                    fill="#005BAA"></path>
                <path
                    d="M58.0031 23.4654V27.1623H40.8719V24.2216L51.621 11.2545H41.0959V7.55762H57.5832V10.4983L46.8623 23.4654H58.0031ZM73.8158 22.9613H64.7183L62.9828 27.1623H58.3362L67.0697 7.55762H71.5484L80.3099 27.1623H75.5513L73.8158 22.9613ZM72.3882 19.5165L69.2811 12.0107L66.1739 19.5165H72.3882ZM90.8244 7.55762C92.5596 7.55762 94.0622 7.84702 95.331 8.42582C96.6189 9.00463 97.6079 9.8262 98.2986 10.8905C98.9885 11.9547 99.3344 13.215 99.3344 14.6714C99.3344 16.109 98.9885 17.3693 98.2986 18.4523C97.6079 19.5165 96.6189 20.338 95.331 20.9168C94.0622 21.477 92.5596 21.757 90.8244 21.757H86.8775V27.1623H82.3427V7.55762H90.8244ZM90.5725 18.0602C91.9349 18.0602 92.9706 17.7708 93.6797 17.192C94.3888 16.5945 94.7429 15.7543 94.7429 14.6714C94.7429 13.5698 94.3888 12.7296 93.6797 12.1508C92.9706 11.5532 91.9349 11.2545 90.5725 11.2545H86.8775V18.0602H90.5725ZM106.083 11.2545H99.8132V7.55762H116.888V11.2545H110.618V27.1623H106.083V11.2545ZM131.249 22.9613H122.151L120.416 27.1623H115.769L124.502 7.55762H128.981L137.743 27.1623H132.984L131.249 22.9613ZM129.821 19.5165L126.714 12.0107L123.607 19.5165H129.821Z"
                    fill="#005BAA"></path>
                <path
                    d="M41.7979 37.5487H39.8444V36.397H45.1643V37.5487H43.2107V42.5049H41.7979V37.5487ZM52.9188 41.3705V42.5049H48.192V36.397H52.8054V37.5312H49.596V38.8575H52.4304V39.957H49.596V41.3705H52.9188ZM59.215 42.6096C58.5928 42.6096 58.0289 42.4758 57.5231 42.2083C57.023 41.9348 56.6276 41.5596 56.337 41.0826C56.0521 40.5997 55.9097 40.056 55.9097 39.4509C55.9097 38.8459 56.0521 38.3049 56.337 37.8279C56.6276 37.3451 57.023 36.9699 57.5231 36.7023C58.0289 36.4289 58.5958 36.2922 59.2237 36.2922C59.7528 36.2922 60.2294 36.3852 60.654 36.5714C61.0841 36.7577 61.4447 37.0251 61.7354 37.3742L60.8284 38.2118C60.4156 37.7349 59.9039 37.4964 59.2935 37.4964C58.9156 37.4964 58.5783 37.5806 58.2818 37.7494C57.9853 37.9122 57.7527 38.1421 57.5842 38.4387C57.4213 38.7354 57.34 39.0728 57.34 39.4509C57.34 39.8291 57.4213 40.1664 57.5842 40.4631C57.7527 40.7598 57.9853 40.9924 58.2818 41.1612C58.5783 41.324 58.9156 41.4055 59.2935 41.4055C59.9039 41.4055 60.4156 41.1641 60.8284 40.6812L61.7354 41.5189C61.4447 41.8737 61.0841 42.1442 60.654 42.3304C60.2237 42.5166 59.744 42.6096 59.215 42.6096ZM70.5558 36.397V42.5049H69.143V40.0006H66.3696V42.5049H64.9569V36.397H66.3696V38.8052H69.143V36.397H70.5558ZM79.8667 36.397V42.5049H78.7068L75.6631 38.7965V42.5049H74.2677V36.397H75.4364L78.4714 40.1054V36.397H79.8667ZM86.535 42.6096C85.9014 42.6096 85.3286 42.473 84.8169 42.1995C84.3111 41.926 83.913 41.5509 83.6222 41.0739C83.3373 40.591 83.1948 40.05 83.1948 39.4509C83.1948 38.8518 83.3373 38.3136 83.6222 37.8367C83.913 37.3538 84.3111 36.9758 84.8169 36.7023C85.3286 36.4289 85.9014 36.2922 86.535 36.2922C87.1687 36.2922 87.7386 36.4289 88.2443 36.7023C88.7502 36.9758 89.1484 37.3538 89.4392 37.8367C89.7299 38.3136 89.8752 38.8518 89.8752 39.4509C89.8752 40.05 89.7299 40.591 89.4392 41.0739C89.1484 41.5509 88.7502 41.926 88.2443 42.1995C87.7386 42.473 87.1687 42.6096 86.535 42.6096ZM86.535 41.4055C86.8955 41.4055 87.221 41.324 87.5118 41.1612C87.8025 40.9924 88.0293 40.7598 88.192 40.4631C88.3607 40.1664 88.4449 39.8291 88.4449 39.4509C88.4449 39.0728 88.3607 38.7354 88.192 38.4387C88.0293 38.1421 87.8025 37.9122 87.5118 37.7494C87.221 37.5806 86.8955 37.4964 86.535 37.4964C86.1745 37.4964 85.849 37.5806 85.5583 37.7494C85.2675 37.9122 85.0379 38.1421 84.8693 38.4387C84.7066 38.7354 84.6251 39.0728 84.6251 39.4509C84.6251 39.8291 84.7066 40.1664 84.8693 40.4631C85.0379 40.7598 85.2675 40.9924 85.5583 41.1612C85.849 41.324 86.1745 41.4055 86.535 41.4055ZM93.2044 36.397H94.6172V41.3531H97.6785V42.5049H93.2044V36.397ZM103.59 42.6096C102.956 42.6096 102.383 42.473 101.872 42.1995C101.365 41.926 100.967 41.5509 100.676 41.0739C100.392 40.591 100.25 40.05 100.25 39.4509C100.25 38.8518 100.392 38.3136 100.676 37.8367C100.967 37.3538 101.365 36.9758 101.872 36.7023C102.383 36.4289 102.956 36.2922 103.59 36.2922C104.223 36.2922 104.793 36.4289 105.299 36.7023C105.805 36.9758 106.203 37.3538 106.493 37.8367C106.784 38.3136 106.93 38.8518 106.93 39.4509C106.93 40.05 106.784 40.591 106.493 41.0739C106.203 41.5509 105.805 41.926 105.299 42.1995C104.793 42.473 104.223 42.6096 103.59 42.6096ZM103.59 41.4055C103.951 41.4055 104.275 41.324 104.566 41.1612C104.857 40.9924 105.083 40.7598 105.247 40.4631C105.416 40.1664 105.5 39.8291 105.5 39.4509C105.5 39.0728 105.416 38.7354 105.247 38.4387C105.083 38.1421 104.857 37.9122 104.566 37.7494C104.275 37.5806 103.951 37.4964 103.59 37.4964C103.229 37.4964 102.904 37.5806 102.613 37.7494C102.322 37.9122 102.093 38.1421 101.924 38.4387C101.761 38.7354 101.68 39.0728 101.68 39.4509C101.68 39.8291 101.761 40.1664 101.924 40.4631C102.093 40.7598 102.322 40.9924 102.613 41.1612C102.904 41.324 103.229 41.4055 103.59 41.4055ZM114.384 39.3549H115.674V41.833C115.343 42.0832 114.96 42.2751 114.523 42.4089C114.087 42.5428 113.649 42.6096 113.207 42.6096C112.573 42.6096 112.003 42.4758 111.498 42.2083C110.991 41.9348 110.593 41.5596 110.302 41.0826C110.018 40.5997 109.875 40.056 109.875 39.4509C109.875 38.8459 110.018 38.3049 110.302 37.8279C110.593 37.3451 110.994 36.9699 111.506 36.7023C112.018 36.4289 112.593 36.2922 113.232 36.2922C113.768 36.2922 114.253 36.3825 114.689 36.5627C115.125 36.743 115.492 37.0048 115.788 37.348L114.881 38.1857C114.445 37.7262 113.919 37.4964 113.303 37.4964C112.913 37.4964 112.567 37.5779 112.265 37.7407C111.963 37.9035 111.727 38.1334 111.558 38.43C111.39 38.7267 111.306 39.067 111.306 39.4509C111.306 39.8291 111.39 40.1664 111.558 40.4631C111.727 40.7598 111.96 40.9924 112.256 41.1612C112.558 41.324 112.901 41.4055 113.286 41.4055C113.692 41.4055 114.059 41.3182 114.384 41.1437V39.3549ZM119.255 36.397H120.668V42.5049H119.255V36.397ZM129.11 41.3705V42.5049H124.384V36.397H128.997V37.5312H125.788V38.8575H128.622V39.957H125.788V41.3705H129.11ZM134.508 42.6096C134.026 42.6096 133.558 42.5456 133.105 42.4176C132.656 42.2838 132.296 42.1122 132.023 41.9028L132.503 40.8383C132.764 41.0303 133.075 41.1844 133.436 41.3008C133.796 41.4172 134.157 41.4753 134.517 41.4753C134.918 41.4753 135.214 41.4172 135.406 41.3008C135.598 41.1786 135.694 41.0186 135.694 40.8208C135.694 40.6754 135.636 40.5561 135.52 40.4631C135.41 40.3642 135.264 40.2856 135.084 40.2275C134.909 40.1693 134.671 40.1054 134.369 40.0355C133.904 39.9251 133.523 39.8144 133.227 39.704C132.929 39.5935 132.674 39.4161 132.459 39.1717C132.25 38.9274 132.145 38.6016 132.145 38.1944C132.145 37.8396 132.24 37.5196 132.433 37.2346C132.625 36.9437 132.912 36.714 133.296 36.5453C133.685 36.3765 134.16 36.2922 134.717 36.2922C135.107 36.2922 135.488 36.3388 135.86 36.4318C136.232 36.5248 136.558 36.6587 136.836 36.8332L136.401 37.9065C135.836 37.5866 135.272 37.4265 134.709 37.4265C134.314 37.4265 134.02 37.4906 133.828 37.6185C133.642 37.7465 133.549 37.9152 133.549 38.1246C133.549 38.334 133.657 38.4911 133.871 38.5958C134.093 38.6947 134.426 38.7936 134.874 38.8925C135.339 39.0029 135.721 39.1135 136.017 39.224C136.313 39.3346 136.567 39.509 136.776 39.7476C136.99 39.9861 137.099 40.309 137.099 40.7161C137.099 41.0652 137 41.385 136.802 41.676C136.61 41.961 136.319 42.1878 135.93 42.3566C135.54 42.5253 135.067 42.6096 134.508 42.6096Z"
                    fill="#005BAA"></path>
            </svg>
        </a>
        <a href="{{ route('custom.index') }}" class="nav-link">Home</a>
        <a href="{{ route('custom.about') }}" class="nav-link ">About Us</a>
        <a href="{{ route('custom.services') }}" class="nav-link ">Services</a>
        <a href="{{ route('custom.projects') }}" class="nav-link active">Projects</a>
        <a href="{{ route('custom.blogs') }}" class="nav-link ">Blogs</a>
        <a href="{{ route('custom.contact') }}" class="nav-link nav-btn component-btn">Contact Us</a>
    </div>
</div>
