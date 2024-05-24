@extends('frontend.layout')

@section('title')
    Projects
@endsection

@section('customStyle')
    <style>
        .bs-pagination nav {
            top: 101%
        }

        .custom-position {

            position: absolute;
            top: 50%;
            left: 45%;
        }

        #project-partials {

            opacity: 0;
        }


        .projects-section {

            min-height: 1300px;
        }

        @media screen and (max-width:991px) {
            .bs-pagination nav {
                top: 100%;
            }
        }

        @media screen and (max-width:520px) {
            .bs-pagination {
                margin-bottom: 4.5rem;
            }

            .custom-position {

                position: absolute !important;
                top: -5% !important;
                left: 30% !important;

            }
        }

        @media screen and (max-width:998px) {

            .custom-position {

                position: absolute;
                top: -3%;
                left: 41%;
            }

        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection


@section('MainContent')
    <section class="service-section d-flex">
        <div class="content">
            <div id="particles-js"></div>
            <h1 class="service">Projects</h1>
            <div class="breadcrums">
                <a href="https://zaptatech.com" class="home-page">Home</a>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.47216 16.3381L0.830078 14.7995L7.03394 8.19075L1.01902 2.17583L2.60712 0.583252L10.1696 8.14577L2.47216 16.3381Z"
                        fill="#EAEAEA" />
                </svg>
                <span class="current-page">Projects</span>
            </div>
            <p class="introductory-text mx-auto" style="max-width: 740px;">Explore our case studies to see how our
                cutting-edge technology solutions have helped businesses achieve their goals and overcome their challenges.
            </p>
        </div>
    </section>

    <section class="projects-section position-relative">
        <div class="container" id="project-partials">

        </div>
        <div class="project-loader custom-position">
            <div class="position-relative" style="height: 170px; width:170px;transform:scale(0.7);">
                <div class="loader-loading"></div>
                <svg class="absolute-logo" xmlns="http://www.w3.org/2000/svg" width="100" height="125"
                    viewBox="0 0 100 125" fill="none">
                    <path
                        d="M62.6938 46.2742C62.5518 48.621 61.7249 50.8747 60.3154 52.7564C58.9059 54.6381 56.9757 56.0652 54.7635 56.8613C52.1865 57.7947 49.7372 57.6591 47.2081 57.9782C39.6608 58.9675 33.6452 62.5417 29.9114 69.4987C28.3488 72.3129 27.4279 75.4378 27.2148 78.6497V78.8172C27.1945 79.0135 27.1945 79.2114 27.2148 79.4076C27.1797 79.9438 27.1077 80.477 26.9994 81.0033C26.9515 81.2346 26.9036 81.466 26.8398 81.6894C26.776 81.9128 26.76 81.9846 26.7122 82.1362C26.6643 82.2878 26.5925 82.5032 26.5287 82.6787C25.8132 84.6345 24.5921 86.3658 22.9899 87.6962C21.3876 89.0267 19.4614 89.9087 17.4074 90.2525C15.3534 90.5962 13.2449 90.3895 11.2968 89.6534C9.34861 88.9172 7.63036 87.6779 6.31699 86.0616C5.00363 84.4454 4.14207 82.5099 3.82006 80.4524C3.49805 78.3948 3.72708 76.2887 4.48385 74.3484C5.24061 72.4082 6.49807 70.7032 8.12815 69.407C9.75824 68.1108 11.7027 67.2698 13.7636 66.9696H13.9152C14.0508 66.9696 14.1784 66.9696 14.322 66.9218H14.6412C16.6647 66.7596 18.6698 66.4179 20.6328 65.9006C24.6935 64.8581 28.3704 62.6735 31.2278 59.6058C34.5851 56.0087 36.5827 51.3534 36.8764 46.4418C37.2593 41.2639 39.0704 36.2138 44.703 34.4187C53.3433 31.6582 62.9172 35.9026 62.6938 46.2742Z"
                        fill="#005BAA" />
                    <path
                        d="M62.3427 112.334C62.3426 113.137 62.2624 113.939 62.1034 114.727C62.0555 114.959 61.9997 115.19 61.9359 115.413C61.9044 115.565 61.8618 115.715 61.8082 115.86C61.7603 116.036 61.6965 116.227 61.6327 116.403C61.0404 118.283 59.9927 119.988 58.5827 121.366C57.1728 122.744 55.4443 123.752 53.5508 124.301C45.4928 126.535 39.3975 123.399 37.1636 115.11C36.7552 113.701 36.4879 112.256 36.3658 110.794C35.935 103.701 32.5442 98.5873 26.6723 94.9093C22.9066 92.5159 18.9414 91.7181 14.5135 91.2314C8.6416 90.5692 2.71381 86.0536 2.54626 78.4663C2.54626 72.363 7.46082 67.5761 11.9924 67.1533L14.2582 66.9618C14.5694 66.9618 14.8805 66.89 15.1837 66.874H15.798C18.9212 66.874 21.9164 68.1147 24.1248 70.3231C26.3332 72.5315 27.5738 75.5267 27.5738 78.6498V78.9051C27.5535 79.072 27.5535 79.2408 27.5738 79.4077C27.5579 79.6921 27.5579 79.9771 27.5738 80.2614C27.6696 83.8277 29.1056 86.9072 30.7172 89.931C33.5016 95.1327 38.1449 98.1166 43.4105 99.6803C45.3765 100.268 47.4142 100.582 49.466 100.614C50.0563 100.614 50.6547 100.614 51.261 100.574C54.2582 100.755 57.0736 102.072 59.1328 104.257C61.192 106.443 62.3401 109.331 62.3427 112.334Z"
                        fill="#005BAA" />
                    <path
                        d="M94.1518 87.9045C91.16 90.5931 87.9528 91.7021 83.6446 92.0292C75.451 92.6355 65.4703 98.5793 63.4837 107.052C62.9802 108.895 62.628 110.776 62.4306 112.677C62.3939 113.181 62.3246 113.682 62.2232 114.177C62.2232 114.376 62.1593 114.568 62.1274 114.759C62.1339 114.788 62.1339 114.818 62.1274 114.847C62.0831 115.092 62.0245 115.334 61.9519 115.573C61.8641 115.876 61.7764 116.179 61.6647 116.482L61.4732 116.969C60.6541 118.905 59.3315 120.587 57.6429 121.839C55.9542 123.092 53.961 123.869 51.8703 124.091C49.7796 124.313 47.6677 123.971 45.7538 123.101C43.8399 122.231 42.1939 120.864 40.9867 119.143C39.7795 117.421 39.0552 115.408 38.8889 113.312C38.7227 111.217 39.1206 109.114 40.0413 107.224C40.962 105.334 42.3719 103.725 44.1247 102.564C45.8774 101.403 47.909 100.732 50.0086 100.622C50.216 100.622 50.4154 100.622 50.6229 100.622H50.8223C52.9699 100.524 55.0948 100.14 57.141 99.4808C61.0743 98.2123 64.0342 95.8747 66.8266 93.0344C69.7435 90.1272 71.4777 86.2409 71.6933 82.1283C71.9725 78.0594 72.9538 74.1501 75.8659 71.2301C78.7779 68.3101 82.4718 67.1532 86.8438 67.7915C88.6049 68.0121 90.2987 68.6058 91.8121 69.5331C93.3255 70.4604 94.6236 71.6999 95.6198 73.1688C97.2654 75.3624 98.0277 78.0938 97.7559 80.8225C97.4841 83.5513 96.1979 86.0786 94.1518 87.9045Z"
                        fill="#005BAA" />
                    <path
                        d="M95.9149 46.0429C95.9138 48.7713 94.9647 51.4145 93.2299 53.5203C91.4952 55.6262 89.0826 57.0638 86.4049 57.5873C85.6949 57.6671 85.0008 57.723 84.2987 57.8187C82.545 57.9913 80.8098 58.3169 79.1129 58.792C75.0646 59.8641 71.4111 62.08 68.5896 65.1746C65.2721 68.8031 63.3252 73.4758 63.0847 78.3865C62.7656 83.5643 61.0104 88.6304 55.4017 90.4973C46.8012 93.3535 37.1636 89.2368 37.2673 78.8412C37.378 76.4916 38.1787 74.2268 39.5692 72.3296C40.9598 70.4325 42.8786 68.9872 45.0859 68.1744C47.6469 67.209 50.0962 67.3367 52.6094 66.9697C60.1487 65.9006 66.1164 62.2625 69.7704 55.2657C71.3235 52.4199 72.2075 49.2576 72.3553 46.019V45.8993C72.3674 45.7 72.3674 45.5002 72.3553 45.3009C72.5105 42.2193 73.869 39.3217 76.1385 37.2314C78.408 35.1411 81.4074 34.025 84.4913 34.1233C87.5752 34.2216 90.4974 35.5263 92.6292 37.7569C94.7611 39.9875 95.9323 42.9657 95.891 46.0509L95.9149 46.0429Z"
                        fill="#005BAA" />
                    <path
                        d="M97.4227 46.027C97.5025 52.1303 92.6358 56.9651 88.1042 57.4198C87.3064 57.5076 86.5086 57.5714 85.7108 57.6671H85.5353C85.28 57.6671 85.0406 57.731 84.7853 57.7469H84.171C82.6243 57.748 81.0925 57.4441 79.6634 56.8527C78.2342 56.2612 76.9356 55.3939 75.8419 54.3002C74.7482 53.2065 73.8808 51.9079 73.2894 50.4788C72.698 49.0496 72.3941 47.5178 72.3952 45.9711C72.3952 45.7717 72.3952 45.5642 72.3952 45.3648C72.3952 45.1653 72.3952 44.7824 72.3952 44.4872C72.1483 40.7062 70.8434 37.0708 68.6295 33.9959C65.1271 29.3366 61.6246 26.7437 56.3351 25.2199C54.5789 24.7154 52.7679 24.4261 50.9419 24.3582C50.7344 24.3582 50.535 24.3582 50.3275 24.3582C48.1671 24.234 46.083 23.5148 44.3057 22.2802C42.5284 21.0456 41.1271 19.3435 40.2567 17.3623C39.3862 15.381 39.0805 13.1977 39.3733 11.0536C39.6662 8.90943 40.5462 6.88801 41.916 5.21274C43.2859 3.53746 45.0923 2.27355 47.1355 1.56072C49.1788 0.847895 51.3794 0.713905 53.494 1.17355C55.6087 1.63319 57.5551 2.66858 59.1181 4.16527C60.6811 5.66196 61.7998 7.56168 62.3507 9.65444V9.76613C62.7787 11.1673 63.0647 12.6079 63.2043 14.0664C63.7069 21.151 67.1934 26.2251 73.0733 29.8392C76.871 32.1689 80.8441 32.9507 85.272 33.3975C91.1918 34.0198 97.1595 38.4637 97.4227 46.027Z"
                        fill="#005BAA" />
                    <path
                        d="M62.6939 12.6144C62.6939 15.732 61.4576 18.7224 59.2561 20.9298C57.0546 23.1373 54.0676 24.3817 50.95 24.3902C50.7505 24.3902 50.5431 24.3902 50.3437 24.3902C47.7345 24.3748 45.1409 24.7927 42.6686 25.6268C38.7434 26.9272 35.8154 29.3047 33.047 32.1689C30.1701 35.0967 28.4742 38.9827 28.284 43.083C28.0526 47.1599 27.1271 51.0612 24.2311 54.0291C21.335 56.997 17.681 58.1778 13.3089 57.5794C11.5466 57.3791 9.84749 56.8042 8.3256 55.8933C6.80371 54.9823 5.49424 53.7564 4.48506 52.2978C2.80364 50.1299 1.99836 47.4092 2.22889 44.6753C2.45942 41.9414 3.70895 39.394 5.72967 37.5382C8.68957 34.8256 11.8888 33.6847 16.1731 33.3177C24.3747 32.6157 34.2676 26.5762 36.1744 18.0714C36.6515 16.2231 36.9796 14.3396 37.1557 12.4388C37.4908 7.19717 40.5385 2.31453 45.8839 0.750801C53.4711 -1.4432 59.375 1.18162 61.9599 8.48964C62.1062 8.87266 62.2287 9.26434 62.3269 9.66243C62.5761 10.6264 62.6995 11.6187 62.6939 12.6144Z"
                        fill="#005BAA" />
                </svg>
            </div>
        </div>
    </section>

    <section class="projects-section position-relative" style="min-height: unset;">
        <div class="container" id="project-partials" style="opacity: 1;">
            <div class="project-container">
                <!-- Project 1 -->
                <a href="https://zaptatech.com/project/sohcahtoa" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/585/Sohcahtoa-Mockup-Single.png"
                            alt="Sohcahtoa Mockup Single" style="display: none;">
                        <video class="video-player" poster="https://zaptatech.com/storage/585/Sohcahtoa-Mockup-Single.png"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/586/Sohcahtoa-Havor-in.mp4"
                                type="video/mp4">
                        </video>
                        <video class="video-player" poster="https://zaptatech.com/storage/585/Sohcahtoa-Mockup-Single.png"
                            width="100%" height="100%" style="display: block;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/587/Sohcahtoa-Havor-out.mp4"
                                type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">Sohcahtoa</h2>
                        <p class="project-intro">To empower individuals to learn, mentor, innovate, and invest all in one
                            place</p>
                    </div>
                </a>
                <a href="https://zaptatech.com/project/metutors" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/553/METUTORS-Mockup-Single.png" alt="METUTORS Mockup Single"
                            style="display: none;">
                        <video class="video-player" poster="https://zaptatech.com/storage/553/METUTORS-Mockup-Single.png"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/554/MEtutors-Havor-in.mp4" type="video/mp4">
                        </video>
                        <video class="video-player" poster="https://zaptatech.com/storage/553/METUTORS-Mockup-Single.png"
                            width="100%" height="100%" style="display: block;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/555/MEtutors-havor-out.mp4"
                                type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">METutors</h2>
                        <p class="project-intro">Personalized live 1:1 Tutoring with expert educators</p>
                    </div>
                </a>
                <a href="https://zaptatech.com/project/investme" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/452/Investme-Mockup-Single.png"
                            alt="Investme Mockup-Single">
                        <video class="video-player" poster="https://zaptatech.com/storage/452/Investme-Mockup-Single.png"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/677/Investme-havor-in.mp4"
                                type="video/mp4">
                        </video>
                        <video class="video-player" poster="https://zaptatech.com/storage/452/Investme-Mockup-Single.png"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/678/InvestMe-havor-out.mp4"
                                type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">InvestME</h2>
                        <p class="project-intro">Simplify asset management with InvestMe and make an informed investment
                        </p>
                    </div>
                </a>
                <a href="https://zaptatech.com/project/lalo" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/372/Lalo-Mockup-(2).webp" alt="Lalo Mockup (2)">
                        <video class="video-player" poster="https://zaptatech.com/storage/372/Lalo-Mockup-(2).webp"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/373/Hover-in.mp4" type="video/mp4">
                        </video>
                        <video class="video-player" poster="https://zaptatech.com/storage/372/Lalo-Mockup-(2).webp"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/374/Hover-out.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">LALO</h2>
                        <p class="project-intro">A keepsake for all of life’s moments and the people we share them</p>
                    </div>
                </a>
                <a href="https://zaptatech.com/project/solar-innovatio" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/367/Solarinnovatio-Mockup-(1).webp"
                            alt="Solarinnovatio Mockup (1)" style="display: none;">
                        <video class="video-player"
                            poster="https://zaptatech.com/storage/367/Solarinnovatio-Mockup-(1).webp" width="100%"
                            height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/368/Hover-in.mp4" type="video/mp4">
                        </video>
                        <video class="video-player"
                            poster="https://zaptatech.com/storage/367/Solarinnovatio-Mockup-(1).webp" width="100%"
                            height="100%" style="display: block;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/369/Hover-out.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">Solar Innovatio</h2>
                        <p class="project-intro">Solar Innovatio SRL Innovative photovoltaic systems for Apartments</p>
                    </div>
                </a>
                <a href="https://zaptatech.com/project/luxuri" class="project-card">
                    <div class="project-thumbnail">
                        <img class="thumbnail-img" width="407" height="424"
                            src="https://zaptatech.com/storage/356/Luxuri-Mockup-(1).webp" alt="Luxuri Mockup (1)">
                        <video class="video-player" poster="https://zaptatech.com/storage/356/Luxuri-Mockup-(1).webp"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/459/Hover-in.mp4" type="video/mp4">
                        </video>
                        <video class="video-player" poster="https://zaptatech.com/storage/356/Luxuri-Mockup-(1).webp"
                            width="100%" height="100%" style="display: none;" autoplay="true" muted="muted">
                            <source src="https://zapta-website.s3.amazonaws.com/460/Hover-out.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="project-description">
                        <h2 class="project-title">Luxuri</h2>
                        <p class="project-intro">Get access to the best rates through a seamless car rental booking
                            experience</p>
                    </div>
                </a>


            </div>
            <nav class="d-flex justify-items-center justify-content-between">
                <div class="d-flex justify-content-between flex-fill d-sm-none">
                    <ul class="pagination">

                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">« Previous</span>
                        </li>


                        <li class="page-item">
                            <a class="page-link" href="https://zaptatech.com/projects?page=2" rel="next">Next »</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div>
                        <p class="small text-muted">
                            Showing
                            <span class="fw-semibold">1</span>
                            to
                            <span class="fw-semibold">6</span>
                            of
                            <span class="fw-semibold">11</span>
                            results
                        </p>
                    </div>

                    <div>
                        <ul class="pagination">

                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>





                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="https://zaptatech.com/projects?page=2">2</a>
                            </li>


                            <li class="page-item">
                                <a class="page-link" href="https://zaptatech.com/projects?page=2" rel="next"
                                    aria-label="Next »">›</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="project-loader custom-position" style="display: none;">
            <div class="position-relative" style="height: 170px; width:170px;transform:scale(0.7);">
                <div class="loader-loading"></div>
                <svg class="absolute-logo" xmlns="http://www.w3.org/2000/svg" width="100" height="125"
                    viewBox="0 0 100 125" fill="none">
                    <path
                        d="M62.6938 46.2742C62.5518 48.621 61.7249 50.8747 60.3154 52.7564C58.9059 54.6381 56.9757 56.0652 54.7635 56.8613C52.1865 57.7947 49.7372 57.6591 47.2081 57.9782C39.6608 58.9675 33.6452 62.5417 29.9114 69.4987C28.3488 72.3129 27.4279 75.4378 27.2148 78.6497V78.8172C27.1945 79.0135 27.1945 79.2114 27.2148 79.4076C27.1797 79.9438 27.1077 80.477 26.9994 81.0033C26.9515 81.2346 26.9036 81.466 26.8398 81.6894C26.776 81.9128 26.76 81.9846 26.7122 82.1362C26.6643 82.2878 26.5925 82.5032 26.5287 82.6787C25.8132 84.6345 24.5921 86.3658 22.9899 87.6962C21.3876 89.0267 19.4614 89.9087 17.4074 90.2525C15.3534 90.5962 13.2449 90.3895 11.2968 89.6534C9.34861 88.9172 7.63036 87.6779 6.31699 86.0616C5.00363 84.4454 4.14207 82.5099 3.82006 80.4524C3.49805 78.3948 3.72708 76.2887 4.48385 74.3484C5.24061 72.4082 6.49807 70.7032 8.12815 69.407C9.75824 68.1108 11.7027 67.2698 13.7636 66.9696H13.9152C14.0508 66.9696 14.1784 66.9696 14.322 66.9218H14.6412C16.6647 66.7596 18.6698 66.4179 20.6328 65.9006C24.6935 64.8581 28.3704 62.6735 31.2278 59.6058C34.5851 56.0087 36.5827 51.3534 36.8764 46.4418C37.2593 41.2639 39.0704 36.2138 44.703 34.4187C53.3433 31.6582 62.9172 35.9026 62.6938 46.2742Z"
                        fill="#005BAA"></path>
                    <path
                        d="M62.3427 112.334C62.3426 113.137 62.2624 113.939 62.1034 114.727C62.0555 114.959 61.9997 115.19 61.9359 115.413C61.9044 115.565 61.8618 115.715 61.8082 115.86C61.7603 116.036 61.6965 116.227 61.6327 116.403C61.0404 118.283 59.9927 119.988 58.5827 121.366C57.1728 122.744 55.4443 123.752 53.5508 124.301C45.4928 126.535 39.3975 123.399 37.1636 115.11C36.7552 113.701 36.4879 112.256 36.3658 110.794C35.935 103.701 32.5442 98.5873 26.6723 94.9093C22.9066 92.5159 18.9414 91.7181 14.5135 91.2314C8.6416 90.5692 2.71381 86.0536 2.54626 78.4663C2.54626 72.363 7.46082 67.5761 11.9924 67.1533L14.2582 66.9618C14.5694 66.9618 14.8805 66.89 15.1837 66.874H15.798C18.9212 66.874 21.9164 68.1147 24.1248 70.3231C26.3332 72.5315 27.5738 75.5267 27.5738 78.6498V78.9051C27.5535 79.072 27.5535 79.2408 27.5738 79.4077C27.5579 79.6921 27.5579 79.9771 27.5738 80.2614C27.6696 83.8277 29.1056 86.9072 30.7172 89.931C33.5016 95.1327 38.1449 98.1166 43.4105 99.6803C45.3765 100.268 47.4142 100.582 49.466 100.614C50.0563 100.614 50.6547 100.614 51.261 100.574C54.2582 100.755 57.0736 102.072 59.1328 104.257C61.192 106.443 62.3401 109.331 62.3427 112.334Z"
                        fill="#005BAA"></path>
                    <path
                        d="M94.1518 87.9045C91.16 90.5931 87.9528 91.7021 83.6446 92.0292C75.451 92.6355 65.4703 98.5793 63.4837 107.052C62.9802 108.895 62.628 110.776 62.4306 112.677C62.3939 113.181 62.3246 113.682 62.2232 114.177C62.2232 114.376 62.1593 114.568 62.1274 114.759C62.1339 114.788 62.1339 114.818 62.1274 114.847C62.0831 115.092 62.0245 115.334 61.9519 115.573C61.8641 115.876 61.7764 116.179 61.6647 116.482L61.4732 116.969C60.6541 118.905 59.3315 120.587 57.6429 121.839C55.9542 123.092 53.961 123.869 51.8703 124.091C49.7796 124.313 47.6677 123.971 45.7538 123.101C43.8399 122.231 42.1939 120.864 40.9867 119.143C39.7795 117.421 39.0552 115.408 38.8889 113.312C38.7227 111.217 39.1206 109.114 40.0413 107.224C40.962 105.334 42.3719 103.725 44.1247 102.564C45.8774 101.403 47.909 100.732 50.0086 100.622C50.216 100.622 50.4154 100.622 50.6229 100.622H50.8223C52.9699 100.524 55.0948 100.14 57.141 99.4808C61.0743 98.2123 64.0342 95.8747 66.8266 93.0344C69.7435 90.1272 71.4777 86.2409 71.6933 82.1283C71.9725 78.0594 72.9538 74.1501 75.8659 71.2301C78.7779 68.3101 82.4718 67.1532 86.8438 67.7915C88.6049 68.0121 90.2987 68.6058 91.8121 69.5331C93.3255 70.4604 94.6236 71.6999 95.6198 73.1688C97.2654 75.3624 98.0277 78.0938 97.7559 80.8225C97.4841 83.5513 96.1979 86.0786 94.1518 87.9045Z"
                        fill="#005BAA"></path>
                    <path
                        d="M95.9149 46.0429C95.9138 48.7713 94.9647 51.4145 93.2299 53.5203C91.4952 55.6262 89.0826 57.0638 86.4049 57.5873C85.6949 57.6671 85.0008 57.723 84.2987 57.8187C82.545 57.9913 80.8098 58.3169 79.1129 58.792C75.0646 59.8641 71.4111 62.08 68.5896 65.1746C65.2721 68.8031 63.3252 73.4758 63.0847 78.3865C62.7656 83.5643 61.0104 88.6304 55.4017 90.4973C46.8012 93.3535 37.1636 89.2368 37.2673 78.8412C37.378 76.4916 38.1787 74.2268 39.5692 72.3296C40.9598 70.4325 42.8786 68.9872 45.0859 68.1744C47.6469 67.209 50.0962 67.3367 52.6094 66.9697C60.1487 65.9006 66.1164 62.2625 69.7704 55.2657C71.3235 52.4199 72.2075 49.2576 72.3553 46.019V45.8993C72.3674 45.7 72.3674 45.5002 72.3553 45.3009C72.5105 42.2193 73.869 39.3217 76.1385 37.2314C78.408 35.1411 81.4074 34.025 84.4913 34.1233C87.5752 34.2216 90.4974 35.5263 92.6292 37.7569C94.7611 39.9875 95.9323 42.9657 95.891 46.0509L95.9149 46.0429Z"
                        fill="#005BAA"></path>
                    <path
                        d="M97.4227 46.027C97.5025 52.1303 92.6358 56.9651 88.1042 57.4198C87.3064 57.5076 86.5086 57.5714 85.7108 57.6671H85.5353C85.28 57.6671 85.0406 57.731 84.7853 57.7469H84.171C82.6243 57.748 81.0925 57.4441 79.6634 56.8527C78.2342 56.2612 76.9356 55.3939 75.8419 54.3002C74.7482 53.2065 73.8808 51.9079 73.2894 50.4788C72.698 49.0496 72.3941 47.5178 72.3952 45.9711C72.3952 45.7717 72.3952 45.5642 72.3952 45.3648C72.3952 45.1653 72.3952 44.7824 72.3952 44.4872C72.1483 40.7062 70.8434 37.0708 68.6295 33.9959C65.1271 29.3366 61.6246 26.7437 56.3351 25.2199C54.5789 24.7154 52.7679 24.4261 50.9419 24.3582C50.7344 24.3582 50.535 24.3582 50.3275 24.3582C48.1671 24.234 46.083 23.5148 44.3057 22.2802C42.5284 21.0456 41.1271 19.3435 40.2567 17.3623C39.3862 15.381 39.0805 13.1977 39.3733 11.0536C39.6662 8.90943 40.5462 6.88801 41.916 5.21274C43.2859 3.53746 45.0923 2.27355 47.1355 1.56072C49.1788 0.847895 51.3794 0.713905 53.494 1.17355C55.6087 1.63319 57.5551 2.66858 59.1181 4.16527C60.6811 5.66196 61.7998 7.56168 62.3507 9.65444V9.76613C62.7787 11.1673 63.0647 12.6079 63.2043 14.0664C63.7069 21.151 67.1934 26.2251 73.0733 29.8392C76.871 32.1689 80.8441 32.9507 85.272 33.3975C91.1918 34.0198 97.1595 38.4637 97.4227 46.027Z"
                        fill="#005BAA"></path>
                    <path
                        d="M62.6939 12.6144C62.6939 15.732 61.4576 18.7224 59.2561 20.9298C57.0546 23.1373 54.0676 24.3817 50.95 24.3902C50.7505 24.3902 50.5431 24.3902 50.3437 24.3902C47.7345 24.3748 45.1409 24.7927 42.6686 25.6268C38.7434 26.9272 35.8154 29.3047 33.047 32.1689C30.1701 35.0967 28.4742 38.9827 28.284 43.083C28.0526 47.1599 27.1271 51.0612 24.2311 54.0291C21.335 56.997 17.681 58.1778 13.3089 57.5794C11.5466 57.3791 9.84749 56.8042 8.3256 55.8933C6.80371 54.9823 5.49424 53.7564 4.48506 52.2978C2.80364 50.1299 1.99836 47.4092 2.22889 44.6753C2.45942 41.9414 3.70895 39.394 5.72967 37.5382C8.68957 34.8256 11.8888 33.6847 16.1731 33.3177C24.3747 32.6157 34.2676 26.5762 36.1744 18.0714C36.6515 16.2231 36.9796 14.3396 37.1557 12.4388C37.4908 7.19717 40.5385 2.31453 45.8839 0.750801C53.4711 -1.4432 59.375 1.18162 61.9599 8.48964C62.1062 8.87266 62.2287 9.26434 62.3269 9.66243C62.5761 10.6264 62.6995 11.6187 62.6939 12.6144Z"
                        fill="#005BAA"></path>
                </svg>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row">
            @forelse ($projects as $project)
                @php
                    $percentages = 0;
                    $total = count($project->tasks);

                    if ($total != 0) {
                        $percentages = $project->completedTask($stage_id) / ($total / 100);
                    }
                @endphp
                <div class="col-4">

                    <a href="#" class="project-card">
                        <div class="project-thumbnail">
                            <img class="thumbnail-img" width="407" height="424"
                                src="https://source.unsplash.com/random/1600x900?apple" alt="Solarinnovatio Mockup (1)"
                                style="display: none;">
                            <video class="video-player"
                                poster="https://zaptatech.com/storage/367/Solarinnovatio-Mockup-(1).webp" width="100%"
                                height="100%" style="display: none;" autoplay="true" muted="muted">
                                <source src="https://zapta-website.s3.amazonaws.com/368/Hover-in.mp4" type="video/mp4">
                            </video>
                            <video class="video-player"
                                poster="https://zaptatech.com/storage/367/Solarinnovatio-Mockup-(1).webp" width="100%"
                                height="100%" style="display: block;" autoplay="true" muted="muted">
                                <source src="https://zapta-website.s3.amazonaws.com/369/Hover-out.mp4" type="video/mp4">
                            </video>
                            <img class="thumbnail-img" src="{{ asset('') }}" alt="Sohcahtoa Mockup Single"
                                style="display: none;">
                        </div>
                        <div class="card-header border-0 pt-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0" data-bs-placement="top" data-bs-toggle="tooltip"
                                        title="{{ __('Start Date ') }}">
                                        {{ \Auth::user()->dateFormat($project->start_date) }}</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <h6 class="mb-0" data-bs-placement="top" data-bs-toggle="tooltip"
                                            title="{{ __('Due Date ') }}">
                                            {{ \Auth::user()->dateFormat($project->due_date) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-description">
                            <h2 class="project-title">{{ $project->title }}</h2>
                            <p class="project-intro">{{ $project->description }}</p>
                        </div>

                        <div class="project-description">
                            <span class="project-intro">Employee :</span>
                            @foreach ($project->projectUser() as $projectUser)
                                <span class="project-intro">
                                    {{ $projectUser->name }} ,
                                </span>
                            @endforeach
                        </div>
                        <span class="clearfix"></span>
                        <div class="d-flex pt-2">
                            @if ($project->status == 'not_started')
                                <button class="btn bt-large bg-primary p-2 px-3 rounded">{{ __('Not Started') }}</button>
                            @elseif($project->status == 'in_progress')
                                <button class="btn bt-large bg-success p-2 px-3 rounded">{{ __('In Progress') }}</button>
                            @elseif($project->status == 'on_hold')
                                <button class="btn bt-large bg-info p-2 px-3 rounded">{{ __('On Hold') }}</button>
                            @elseif($project->status == 'canceled')
                                <button class="btn bt-large bg-danger p-2 px-3 rounded">{{ __('Canceled') }}</button>
                            @elseif($project->status == 'finished')
                                <button class="btn bt-large bg-warning p-2 px-3 rounded">{{ __('Finished') }}</button>
                            @endif
                            <a href="#" class="btn bt-large bg-info p-2 px-3 rounded">{{ __('Readmore') }}</a>
                        </div>
                    </a>

                </div>
            @empty
                <p>nothing</p>
            @endforelse

            @forelse ($projects as $project)
                @php
                    $percentages = 0;
                    $total = count($project->tasks);

                    if ($total != 0) {
                        $percentages = $project->completedTask($stage_id) / ($total / 100);
                    }
                @endphp
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="card hover-shadow-lg">
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0" data-bs-placement="top" data-bs-toggle="tooltip"
                                        title="{{ __('Start Date ') }}">
                                        {{ \Auth::user()->dateFormat($project->start_date) }}</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <h6 class="mb-0" data-bs-placement="top" data-bs-toggle="tooltip"
                                            title="{{ __('Due Date ') }}">
                                            {{ \Auth::user()->dateFormat($project->due_date) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                
                        <div class="card-body text-center">
                            <h5 class="my-4">
                                <span class="text-dark">{{ $project->title }}</span>
                            </h5>
                            <div class="avatar-group hover-avatar-ungroup mb-3">
                                Employee :
                                @foreach ($project->projectUser() as $projectUser)
                                    <span class="user-group1">
                                        {{ $projectUser->name }}
                                    </span>
                                @endforeach
                            </div>
                            <span class="clearfix"></span>
                            @if ($project->status == 'not_started')
                                <span class="badge fix_badges bg-primary p-2 px-3 rounded">{{ __('Not Started') }}</span>
                            @elseif($project->status == 'in_progress')
                                <span class="badge fix_badges bg-success p-2 px-3 rounded">{{ __('In Progress') }}</span>
                            @elseif($project->status == 'on_hold')
                                <span class="badge fix_badges bg-info p-2 px-3 rounded">{{ __('On Hold') }}</span>
                            @elseif($project->status == 'canceled')
                                <span class="badge fix_badges bg-danger p-2 px-3 rounded">{{ __('Canceled') }}</span>
                            @elseif($project->status == 'finished')
                                <span class="badge fix_badges bg-warning p-2 px-3 rounded">{{ __('Finished') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <h4>{{ __('No data available') }}</h4>
                </div>
            @endforelse
        </div>
    </div>
    <br />

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        // For Videos and Lottie Player

        // Function to show video player and hide the other
        function toggleVideoPlayer(playerToShow, playerToHide) {
            if (window.innerWidth >= 768) {
                playerToShow.style.display = "block";
                playerToHide.style.display = "none";
                playerToShow.currentTime = 0; // Reset the playback progress to the beginning
                playerToShow.play();
            }
        }

        // Attach event listener for hover in and hover out for all project cards
        function attachHoverEvents() {
            var projectCards = document.querySelectorAll('.project-card');
            projectCards.forEach(function(projectCard) {
                var projectThumbnail = projectCard.querySelector('.project-thumbnail');
                var videoPlayers = projectCard.querySelectorAll('.video-player');
                var isHovered = false;

                // Event listener for when videoPlayer2 completes playing
                if (videoPlayers.length === 2 && videoPlayers[1]) {
                    videoPlayers[1].addEventListener('ended', function() {
                        if (!isHovered) {
                            var image = projectThumbnail.querySelector('.thumbnail-img');
                            // image.style.display = "block"; // Show the image again after video completes
                        }
                    });
                }

                projectThumbnail.addEventListener('mouseenter', function() {
                    isHovered = true;
                    var image = projectThumbnail.querySelector('.thumbnail-img');
                    image.style.display = "none";
                    toggleVideoPlayer(videoPlayers[0], videoPlayers[1]);
                });

                projectThumbnail.addEventListener('mouseleave', function() {
                    isHovered = false;
                    setTimeout(function() {
                        if (!isHovered) {
                            toggleVideoPlayer(videoPlayers[1], videoPlayers[0]);
                            var image = projectThumbnail.querySelector('.thumbnail-img');
                            // image.style.display = "block";
                        }
                    }, 0); // Adjust the time (in milliseconds) before the video stops
                });
            });
        }

        window.addEventListener('resize', function() {
            // attachHoverEvents();
            if (window.innerWidth >= 768) {

                attachHoverEvents();
            }
        });
    </script>

    <script>
        window.addEventListener('load', function() {
            getProjects(1);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var page = $(this).attr('href').split('page=')[1];

            document.getElementById("project-partials").style.opacity = "0.5";

            getProjects(page);
        });


        function getProjects(page) {

            $(".project-loader").css("display", "flex");

            $.ajax({
                type: "get",
                url: "https://zaptatech.com/projects",
                data: {
                    page: page
                },
                cache: false,
                success: function(response) {

                    if (response.status) {
                        $(".project-loader").css("display", "none");
                        let section = document.getElementsByClassName("projects-section")[0];
                        document.getElementById("project-partials").style.opacity = "1";

                        section.style.minHeight = 'unset';

                        $('#project-partials').html(response.project_partials);

                        if (window.innerWidth >= 768) {

                            attachHoverEvents();
                        }
                    }

                },
                error: function(response) {
                    $(".project-loader").css("display", "none");

                }
            });
        }
    </script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
@endsection
