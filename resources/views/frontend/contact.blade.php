@extends('frontend.layout')

@section('title')
    Services
@endsection

@section('customStyle')
    

    <style>
        .contact-wizard {
            border: none;
            padding-top: 3.8rem;
        }

        .services-wraper label span {
            color: #636363 !important;
        }

        .contact-wizard .nav {
            display: none;
        }

        .detail-top-border {
            border: 1px solid var(--primaryblue4);
            margin-top: 5.1rem;
            margin-bottom: 2rem;
        }

        .btn.sw-btn-next {
            margin-top: 3.2rem !important;
        }

        .select2-container {
            width: auto !important;
        }

        .iti-mobile .intl-tel-input.iti-container {
            z-index: 1 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 1.8rem !important;
            line-height: 3.6rem !important;
        }

        .detail-form {
            border: none !important;
            padding-left: 0 !important;
        }

        .need-expert:hover {
            cursor: pointer;
        }

        .swal2-title {
            font-size: 2rem;
            line-height: 3rem;
            font-weight: 400;
            color: #000;
        }

        .swal2-popup {
            max-width: 440px !important;
            width: 100% !important;
            padding-top: 2rem !important;
            padding-bottom: 4rem !important;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .swal2-confirm.swal2-styled {
            padding: 1rem 2.5rem;
            background-color: #005BAA;
            border: 1px solid #005BAA;
            box-shadow: none !important;
            outline: none;
            font-size: 1.8rem;
            line-height: 2.4rem;
            font-weight: 400;
            color: #FFF;
            transition: all .5s ease;
            transition-property: background-color, color;
        }

        .swal2-confirm.swal2-styled:hover {
            background-color: #ffffff !important;
            color: #005BAA;
            background-image: none !important;
        }

        /* .sw>.tab-content{
                                min-height: 510px !important;
                                position: relative;
                                height: auto;
                              } */
        .tab-content .tab-pane {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            transition: all 0s ease;
            transition-property: left;
            background: #f2f7fb !important;
            /* display: block !important; */
        }

        /* .tab-pane:nth-child(2){
                                min-height: 580px !important;
                              } */

        /* .tab-content .tab-pane:last-child{
                                min-height: 1016px;
                              } */

        .shedular-col .custom-book-consultation {
            width: fit-content;
            border: none;
            outline: 0;
            background: var(--primaryblue4);
            border-radius: 4px;
            box-shadow: none;
            font-weight: 600;
            font-size: 1.8rem;
            line-height: 2.8rem;
            color: #fff;
            padding-top: 0.9rem;
            padding-bottom: 0.9rem;
            padding-left: 3.2rem;
            padding-right: 6rem;
            position: relative;
        }

        .shedular-col .custom-book-consultation::after {
            position: absolute;
            content: "";
            width: 14.5px;
            height: 12.5px;
            right: 3.2rem;
            top: 1.7rem;
            background-image: url(frontend-assets/images/icons/chirvan-down.svg);
            background-repeat: no-repeat;
            transition: .5s;
            transform: rotate(-90deg);
        }

        .accordion-collapse.collapse {
            display: block !important;
            transition: unset !important;
        }

        .collapse {
            transition: none !important;
        }

        .collapsing {
            all: unset !important;
        }

        .getInTouch-sec .contect-detail {
            display: grid;
            grid-template-columns: minmax(300px, 487px) minmax(350px, 624px) !important;
        }

        .shedular-col {
            padding: 6.1rem 4.1rem 7rem !important;
            max-width: 624px !important;
            background: white !important;
            max-height: 675px !important;
            overflow: hidden !important;
            z-index: 0 !important;
        }

        /*
                                .calender-container .meet-header, .meet-header{
                                    margin-bottom: 2.4rem !important;
                                } */

        .tab-pane {
            background-color: transparent;
        }

        .shedular-col .let-shedule-call {
            font-size: 3.6rem !important;
            line-height: 4.6rem !important;
        }

        .tab-pane:nth-child(2) {
            min-height: 600px;
        }

        .shedular-col .calender-container::before {
            /* height: 80% !important; */
            top: 11.5rem !important;
        }

        .smart-wizard .swiper-slide {
            max-width: 100% !important;
            height: fit-content !important;
            padding-left: 3.9rem;
            padding-right: 3.9rem;
            max-height: 545px !important;
            overflow-y: auto !important;
        }

        .smart-wizard .swiper-slide::-webkit-scrollbar {
            width: 7.646px;
            border-radius: 19px;
        }


        .smart-wizard .swiper-slide::-webkit-scrollbar-thumb {
            background: #B0D0E7 !important;
        }

        .smart-wizard .swiper-slide::-webkit-scrollbar-track {
            background: transparent;
        }


        .get-in-touch {
            background-color: #f2f7fb;
            padding: 5.4rem;
        }

        .get-in-touch .in-touch-h2 {
            font-size: 3.6rem !important;
            line-height: 4.6rem !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            transform: translateY(-2px) !important;
        }

        /* .get-in-touch .form-detail{
                                    padding-top: 3rem !important;
                                    gap: 4.4rem !important;
                                } */

        .shedule-a-call .offcanvas-body .shedular-col {
            padding: 0 !important;
        }

        .getInTouch-sec {
            margin-top: -5px !important;
        }

        .getInTouch-sec .contect-detail {
            justify-content: start !important;
            gap: 13.7rem !important;
            align-items: center !important;
        }

        .getInTouch-sec .contect-detail .offices {
            min-height: 581px !important;
            height: fit-content !important;
        }

        .form-control {
            display: block;
            width: 100%;
            height: auto;
            padding: 0;
            padding-top: 2px;
            font-size: 1.6rem;
            line-height: 3rem;
            color: #475F7B;
            background-color: #FFF;
            border: 1px solid #DFE3E7;
            border-radius: .267rem;
            -webkit-transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .clientsSwiper {
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
        }

        .clientsSwiper .swiper-wrapper {
            -webkit-transition-timing-function: linear !important;
            -o-transition-timing-function: linear !important;
            transition-timing-function: linear !important;
        }

        .clientsSwiper .swiper-wrapper .swiper-slide {
            width: fit-content !important;
        }

        .contact-links {
            display: flex;
            align-items: center;
            column-gap: 2.156rem;
            margin-top: 2.043rem;
            justify-content: center;
            position: relative;
            z-index: 4;
        }

        .iti-mobile .intl-tel-input .country-list {
            background: white !important;
        }

        .contact-links .contact-link {
            width: 5.45rem;
            height: 5.45rem;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.16);
        }

        /* .contact-detail-section{
                                    padding: 8rem 0 !important;
                                } */

        .we-doHeading {
            margin-bottom: 3rem !important;
        }

        .mt-32 {
            margin-top: 3.2rem !important;
        }

        .detail-grid .iframe-col img {
            border-radius: 0.8rem;
            max-width: 625px !important;
        }

        .get-in-touch {
            height: fit-content !important;
        }

        .get-in-touch .submit-button {
            margin-top: 4.4rem !important;
        }

        .shedular-col .shedule-consultation {
            margin-bottom: 4.2rem !important;
        }

        .getInTouch-sec {
            padding: 6.1rem 0 !important;
        }

        .upload-document label.error {
            bottom: unset !important;
        }

        @media screen and (max-width: 1270px) {
            .getInTouch-sec .contect-detail {
                gap: 3rem !important;
                justify-content: space-between !important;
            }
        }

        @media screen and (max-width: 991px) {

            .getInTouch-sec .contect-detail {
                grid-template-columns: 1fr !important;
            }

            .getInTouch-sec::before {
                height: 627px !important;
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                transform: translateY(0px) !important;
            }

            .contact-detail-section,
            .pr-key-features-sec {
                padding-bottom: 0 !important;
            }

            .detail-grid .iframe-col {
                order: 2;
            }

            .get-in-touch {
                order: 1;
            }

            .shedular-col,
            .smart-wizard .swiper-slide {
                max-height: unset !important;
                /* overflow-y: auto !important; */
            }

        }

        @media screen and (max-width: 768px) {
            .shedular-col {
                padding: 1.6rem 0.6rem !important;
                border-bottom: none !important;
                border-radius: 0.8rem !important;
            }

        }

        @media screen and (max-width: 520px) {

            .select2-container {
                z-index: 700 !important;
            }

            .uploadDocument {
                border-radius: 0.4rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                font-size: 1.2rem !important;
                line-height: 1.6rem !important;
            }

            .get-in-touch .form-detail .contact-field {
                font-size: 1.6rem !important;
                line-height: 2.4rem !important;
            }

            .shedular-col .calender-container::before {
                /* max-height: unset !important; */
                width: 287px !important;
                height: 85% !important;
                top: 9rem !important;
            }

            .shedular-col .custom-book-consultation {
                font-size: 1.4rem !important;
                line-height: 2rem !important;
                white-space: nowrap !important;
                padding: 1.2rem 3rem 1.2rem 2rem !important;
            }

            .shedular-col .custom-book-consultation::after {
                right: 1rem;
                top: 1.6rem;
            }

            .get-in-touch {
                padding-left: 1.6rem;
                padding-right: 1.6rem;
            }

            .get-in-touch .submit-button {
                margin-top: 6rem !important;
            }

            .get-in-touch .in-touch-h2 {
                font-size: 2rem !important;
                line-height: 3rem !important;
                font-weight: 700 !important;
            }

            .smart-wizard .swiper-slide {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            .contact-detail-section,
            .pr-key-features-sec .container {
                max-width: 100% !important;
            }

            .calender-container {
                padding-bottom: 0 !important;
            }

            .shedular-col {
                padding: 5rem 0.6rem;
            }

            .contact-links .contact-link {
                width: 2.5rem;
                height: 2.5rem;
            }

            .contact-links .contact-link svg {
                transform: scale(0.5);
            }

            .contact-links {
                margin-top: 1rem;
                gap: 0.968rem;
            }

            .we-doHeading {
                padding-bottom: 0 !important;
                margin-bottom: 1.7rem !important;
            }

            .contact-detail-section {
                padding-top: 2rem !important;
                padding-bottom: 1.7rem !important;
            }

            .get-in-touch {
                border-radius: 0 !important;
            }

            .get-in-touch {
                padding: 2rem 1.6rem !important;
            }

            .getInTouch-sec {
                padding-top: 1.6rem !important;
                padding-bottom: 5rem !important;
            }

            .shedular-col .let-shedule-call {
                font-size: 2rem !important;
                line-height: 3rem !important;
            }

            .shedular-col .shedule-consultation {
                margin-top: 1.6rem !important;
                margin-bottom: 1.6rem !important;
            }

            /* .get-in-touch .form-detail{
                                    padding-top: 2rem !important;
                                    gap: 2rem !important;
                                } */


            .get-in-touch .submit-button {
                margin-top: 2rem !important;
            }

            .detail-grid {
                gap: 1.6rem !important;
            }

            .shedular-col .custom-book-consultation::after {
                transform: rotate(-90deg) scale(0.8);
            }

            .shedular-col .we-take-meeting {
                margin-top: 1.6rem !important;
            }

            .shedular-col .mail-us .mail-span svg {
                transform: scale(0.7) !important;
            }

            .getInTouch-sec::before {
                height: 656px !important;
            }

            .getInTouch-sec .contect-detail {
                gap: 6.2rem !important;
            }



        }

        @media screen and (max-width: 425px) {
            .select2-container {
                max-width: 100% !important;
            }

            .select2-container--open .select2-dropdown {
                min-width: 259px !important;
                left: -56px !important;
            }
        }
    </style>
@endsection


@section('MainContent')
    <section class="service-section d-flex">
        <div class="content">
            <div id="particles-js"></div>
            <h1 class="service">Contact Us</h1>
            <div class="breadcrums">
                <a href="https://zaptatech.com" class="home-page">Home</a>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.47216 16.3381L0.830078 14.7995L7.03394 8.19075L1.01902 2.17583L2.60712 0.583252L10.1696 8.14577L2.47216 16.3381Z"
                        fill="#EAEAEA" />
                </svg>
                <span class="current-page">Contact Us</span>
            </div>
            <p class="introductory-text mx-auto" style="max-width: 1035px;">Want to consult with industry specialists? Take
                advantage of our call scheduling feature to easily book a time slot that accommodates your availability.</p>
            <div class="contact-links">
                <a href="https://wa.me/923171776993" target="_blank" class="contact-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30"
                        fill="none">
                        <path
                            d="M24.7935 4.72809C23.4751 3.3964 21.9048 2.34055 20.1741 1.62211C18.4434 0.903664 16.587 0.537015 14.7132 0.543543C6.86174 0.543543 0.462696 6.94259 0.462696 14.794C0.462696 17.3105 1.12417 19.7551 2.36084 21.912L0.347656 29.3033L7.89709 27.3189C9.98218 28.4549 12.3261 29.0588 14.7132 29.0588C22.5646 29.0588 28.9636 22.6598 28.9636 14.8084C28.9636 10.9977 27.4825 7.41713 24.7935 4.72809ZM14.7132 26.643C12.5849 26.643 10.4999 26.0678 8.67361 24.9893L8.24221 24.7305L3.75569 25.9097L4.94922 21.5382L4.66162 21.0924C3.47923 19.2043 2.8514 17.0218 2.84976 14.794C2.84976 8.26554 8.17031 2.94498 14.6988 2.94498C17.8624 2.94498 20.839 4.18165 23.0679 6.42491C24.1715 7.52349 25.0461 8.83018 25.641 10.2693C26.2359 11.7084 26.5392 13.2512 26.5334 14.8084C26.5622 21.3369 21.2416 26.643 14.7132 26.643ZM21.2129 17.785C20.8534 17.6125 19.099 16.7497 18.7827 16.6203C18.4519 16.5052 18.2219 16.4477 17.9774 16.7928C17.7329 17.1523 17.0571 17.9576 16.8558 18.1877C16.6544 18.4321 16.4387 18.4609 16.0792 18.2739C15.7198 18.1014 14.5694 17.7131 13.2177 16.5052C12.1535 15.5561 11.4489 14.3914 11.2332 14.0319C11.0319 13.6724 11.2045 13.4854 11.3914 13.2985C11.5496 13.1403 11.7509 12.8815 11.9235 12.6802C12.096 12.4788 12.1679 12.3207 12.283 12.0906C12.398 11.8461 12.3405 11.6448 12.2542 11.4723C12.1679 11.2997 11.4489 9.54535 11.1613 8.82636C10.8737 8.13612 10.5718 8.2224 10.3561 8.20802H9.66582C9.42136 8.20802 9.04749 8.2943 8.71675 8.6538C8.40039 9.01329 7.48008 9.87609 7.48008 11.6304C7.48008 13.3848 8.75989 15.0816 8.93245 15.3117C9.10501 15.5561 11.4489 19.1511 15.0151 20.6898C15.8635 21.0636 16.525 21.2793 17.0427 21.4375C17.8911 21.7107 18.6676 21.6676 19.286 21.5813C19.9762 21.4806 21.3998 20.7185 21.6874 19.8845C21.9894 19.0505 21.9894 18.3458 21.8887 18.1877C21.7881 18.0295 21.5724 17.9576 21.2129 17.785Z"
                            fill="white" />
                    </svg>
                </a>

                <a href="https://join.skype.com/invite/wNPWhhKsQ0qA" target="_blank" class="contact-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                        fill="none">
                        <path
                            d="M28.2317 18.0626C30.3147 8.7252 22.1265 0.24974 12.5019 1.86582C7.29448 -1.36634 0.363281 2.29678 0.363281 8.50972C0.363281 9.94624 0.758324 11.3109 1.44067 12.4601C-0.462717 21.8334 7.76135 30.2012 17.386 28.4414C24.1736 32.0327 31.6435 24.886 28.2317 18.0626ZM19.1098 23.7009C16.5959 24.7424 12.43 24.7424 9.91613 23.4136C6.32483 21.5102 5.71431 17.2007 8.80283 17.2007C11.1372 17.2007 10.383 19.93 12.7533 21.0074C13.8306 21.5102 16.165 21.5461 17.4938 20.6483C18.8225 19.7505 18.7148 18.3499 17.9965 17.7034C16.0932 15.9437 10.5985 16.626 8.08457 13.5375C7.00718 12.2088 6.7917 9.8385 8.12048 8.11468C10.4548 5.09799 17.3142 4.91842 20.2591 7.18094C22.9884 9.29981 22.2343 12.0651 20.0436 12.0651C17.4219 12.0651 18.7866 8.61746 14.513 8.61746C11.4245 8.61746 10.2034 10.8082 12.3941 11.8855C15.339 13.3939 22.8448 12.8911 22.8448 18.6372C22.8448 21.0074 21.3724 22.7672 19.1098 23.7009Z"
                            fill="white" />
                    </svg>
                </a>

                <a href="mailto:contact@zaptatech.com" class="contact-link">
                    <svg width="27" height="20" viewBox="0 0 27 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.2363 0.427379C25.1272 0.416134 25.0172 0.416134 24.9081 0.427379H2.49073C2.34706 0.429593 2.20433 0.451136 2.06641 0.491428L13.6353 12.0123L25.2363 0.427379Z"
                            fill="white" />
                        <path
                            d="M26.4202 1.53931L14.7632 13.1483C14.4632 13.4465 14.0573 13.6139 13.6343 13.6139C13.2113 13.6139 12.8055 13.4465 12.5055 13.1483L0.952528 1.62737C0.917012 1.75791 0.898181 1.89242 0.896484 2.02768V18.0401C0.896484 18.4647 1.06519 18.872 1.36548 19.1723C1.66577 19.4726 2.07305 19.6413 2.49772 19.6413H24.915C25.3397 19.6413 25.747 19.4726 26.0473 19.1723C26.3476 18.872 26.5163 18.4647 26.5163 18.0401V2.02768C26.5099 1.86088 26.4775 1.6961 26.4202 1.53931ZM3.59457 18.0401H2.48171V16.8952L8.30221 11.1227L9.43108 12.2516L3.59457 18.0401ZM24.899 18.0401H23.7782L17.9417 12.2516L19.0705 11.1227L24.891 16.8952L24.899 18.0401Z"
                            fill="white" />
                    </svg>
                </a>

                <a href="tel:923203244278" class="contact-link">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.0596 15.9177C18.2747 15.1423 17.2949 15.1423 16.515 15.9177C15.9201 16.5079 15.3252 17.0982 14.7403 17.6985C14.5803 17.8636 14.4453 17.8986 14.2503 17.7885C13.8654 17.5784 13.4554 17.4084 13.0855 17.1783C11.3608 16.0927 9.91598 14.6971 8.63617 13.1263C8.00126 12.3459 7.43635 11.5105 7.0414 10.5701C6.96142 10.38 6.97641 10.2549 7.13139 10.0999C7.7263 9.52458 8.30622 8.9343 8.89113 8.34402C9.70601 7.52362 9.70601 6.56316 8.88613 5.73776C8.4212 5.26754 7.95627 4.80732 7.49134 4.33709C7.01141 3.85686 6.53648 3.37163 6.05155 2.8964C5.26667 2.13103 4.28681 2.13103 3.50693 2.9014C2.90702 3.49169 2.33211 4.09698 1.7222 4.67725C1.15728 5.21251 0.872323 5.86783 0.812332 6.63319C0.717347 7.87879 1.0223 9.05436 1.45224 10.1999C2.33211 12.571 3.67191 14.6771 5.29666 16.608C7.49134 19.2192 10.1109 21.2852 13.1755 22.7759C14.5553 23.4463 15.9851 23.9615 17.5398 24.0466C18.6097 24.1066 19.5395 23.8365 20.2844 23.0011C20.7944 22.4308 21.3693 21.9105 21.9092 21.3653C22.7091 20.5549 22.7141 19.5744 21.9192 18.774C20.9693 17.8186 20.0145 16.8681 19.0596 15.9177Z"
                            fill="white" />
                        <path
                            d="M18.1034 11.9308L19.9477 11.6157C19.6578 9.91984 18.8581 8.3841 17.6436 7.16351C16.3591 5.87789 14.7347 5.0675 12.9454 4.81738L12.6855 6.67328C14.07 6.86837 15.3295 7.49367 16.3241 8.48915C17.2637 9.4296 17.8785 10.6202 18.1034 11.9308Z"
                            fill="white" />
                        <path
                            d="M20.9838 3.90701C18.8543 1.77598 16.16 0.430336 13.1857 0.0151367L12.9258 1.87103C15.4952 2.2312 17.8246 3.39676 19.6641 5.23265C21.4087 6.97848 22.5534 9.18454 22.9683 11.6107L24.8129 11.2956C24.328 8.48421 23.0033 5.93298 20.9838 3.90701Z"
                            fill="white" />
                    </svg>

                </a>
            </div>
        </div>
    </section>

    <section class="contact-detail-section scrolled-section">
        <div class="container">
            <h2 class="we-doHeading">Contact <span>Details</span></h2>
            <div class="detail-grid">
                <div class="iframe-col">

                    <img id="responsiveImage" width="625" height="410"
                        src="https://zaptatech.com/frontend-assets/images/contact-us.webp"
                        alt='A team of software developers working in the {{ app('companyName') }} Technologies office building in Lahore, Pakistan. The developers are working on a custom software development project, using various tools and technologies to create a high-quality software solution. The image is relevant to the keywords "about us," "custom software development company," "web development company," "mobile app development company," "application development company," "IT consulting company," "IT services company," "IT solutions company," "IT outsourcing company," "quality assurance," "mobile apps," "data analytics," "artificial intelligence," "machine learning," "MVP builder," "dedicated teams," "history of {{ app('companyName') }}," and "{{ app('companyName') }} office building."'>
                    <h2 class="learn-from-meeting">During our meeting, <span>you will receive the following:</span></h2>
                    <ul class="learning-list">
                        <li class="learning-point">A thorough evaluation of your project/idea allows us to identify its
                            scope, objectives, and target audience.</li>
                        <li class="learning-point">Review similar challenges we've solved to provide valuable insights.</li>
                        <li class="learning-point">Engaging in a collaborative brainstorming session, where we will generate
                            innovative ideas and strategies.</li>
                    </ul>
                </div>

                <form action="{{ route('custom.contact.add') }}" method="POST" class="get-in-touch">
                    @csrf
    
                    <h2 class="we-doHeading mb-0">
                        We’re just a <span>message away!</span>
                    </h2>
                    <div class="fields-wrap mt-20">
                        <label class="contact-label">I am looking to</label>
                        <div class="services-wraper d-flex flex-wrap position-relative" style="gap: 12px">
                            <label for="new-project" class="text-checkbox">
                                <span class="">Start a new project</span>
                                <input type="checkbox" id="new-project" name="looking_for[]" value="Start a new project" />
                            </label>
    
                            <label for="revamp-devp" class="text-checkbox">
                                <span class="">Revamp Existing Development</span>
                                <input type="checkbox" id="revamp-devp" name="looking_for[]"
                                    value="Revamp Existing Development" />
                            </label>
    
                            <label for="consultation" class="text-checkbox">
                                <span class="">Consultation</span>
                                <input type="checkbox" id="consultation" name="looking_for[]" value="Consultation" />
                            </label>
    
                            <label for="dedicated-team" class="text-checkbox">
                                <span class="">Dedicated Team</span>
                                <input type="checkbox" id="dedicated-team" name="looking_for[]" value="Dedicated Team" />
                            </label>
    
                            <label class="error" style="font-size: 1.2rem" id="looking_for_error"></label>
    
                        </div>
                    </div>
    
    
                    <div class="postion-relative" style="margin-block: 36px">
                        <label class="contact-label mt-20 d-block">Service I need</label>
                        <div class="services-wraper d-flex flex-wrap position-relative" style="gap: 12px">
    
                            <label for="uiux" class="text-checkbox">
                                <span class="">UI UX Design</span>
                                <input type="checkbox" id="uiux" name="services[]" value="UI UX Design" />
                            </label>
                            <label for="web-development" class="text-checkbox">
                                <span class="">Web Development</span>
                                <input type="checkbox" id="web-development" name="services[]" value="Web Development" />
                            </label>
                            <label for="mobile-development" class="text-checkbox">
                                <span class="">Mobile Development</span>
                                <input type="checkbox" id="mobile-development" name="services[]"
                                    value="Mobile Development" />
                            </label>
                            <label for="qa" class="text-checkbox">
                                <span class="">Quality Assurance</span>
                                <input type="checkbox" id="qa" name="services[]" value="Quality Assurance" />
                            </label>
                            <label for="mvp-builder" class="text-checkbox">
                                <span class="">MVP Builder</span>
                                <input type="checkbox" id="mvp-builder" name="services[]" value="MVP Builder" />
                            </label>
                            <label for="d-team" class="text-checkbox">
                                <span class="">Dedicated Teams</span>
                                <input type="checkbox" id="d-team" name="services[]" value="Dedicated Teams" />
                            </label>
                            <label for="h-app" class="text-checkbox">
                                <span class="">Hybrid Applications Development</span>
                                <input type="checkbox" id="h-app" name="services[]"
                                    value="Hybrid Applications Development" />
                            </label>
                            <label for="data-analytics" class="text-checkbox">
                                <span class="">Data Analytics</span>
                                <input type="checkbox" id="data-analytics" name="services[]" value="Data Analytics" />
                            </label>
                            <label for="sof-automation" class="text-checkbox">
                                <span class="">Software Automation</span>
                                <input type="checkbox" id="sof-automation" name="services[]"
                                    value="Software Automation" />
                            </label>
                            <label for="no-code" class="text-checkbox">
                                <span class="">No-Code & Low-Code Development</span>
                                <input type="checkbox" id="no-code" name="services[]"
                                    value="No-Code & Low-Code Development" />
                            </label>
                            <label for="ai-application" class="text-checkbox">
                                <span class="">AI Embedded Applications</span>
                                <input type="checkbox" id="ai-application" name="services[]"
                                    value="AI Embedded Applications" />
                            </label>
    
                        </div>
    
                        <label class="error" style="font-size: 1.2rem" id="services_error"
                            style="bottom: unset !important"></label>
                    </div>
    
                    <div class="form-detail pt-0 mt-20 d-block">
    
                        <div class="contact-information-wraper">
                            <div class="fields-wrap">
                                <label for="c_name" class="contact-label">Full Name<span
                                        class="steric">*</span></label>
                                <input class="contact-field" type="text" id="c_name" placeholder="John Deo"
                                    name="name" minlength="2" maxlength="50" required />
                            </div>
                            <div class="fields-wrap">
                                <label for="c_email" class="contact-label">Email<span class="steric">*</span></label>
                                <input class="contact-field" type="email" id="c_email" placeholder="example@xyz.com"
                                    name="email" required />
                            </div>
    
                            <div class="budget-selector-main">
                                <div class="fields-wrap">
    
                                    <label for="c_email" class="contact-label">Estimated Budget<span
                                            class="steric">*</span></label>
                                    <select name="estimated_budget" class="budget-selector w-100" id="c_email">
                                        <option value="" selected>Please Select</option>
                                        <option value="< 5,000 USD">&lt; 5,000 USD</option>
                                        <option value="5,000 USD - 10,000 USD">
                                            5,000 USD - 10,000 USD
                                        </option>
                                        <option value="10,000 USD - 20,000 USD">
                                            10,000 USD - 20,000 USD
                                        </option>
                                        <option value="> 20,000 USD">&gt; 20,000 USD</option>
                                    </select>
                                    <input type="text" class="position-absolute bottom-0 opacity-0"
                                        style="z-index: -4" name="selected_budget" id="selectBudget" required />
                                </div>
                            </div>
                        </div>
    
                        <div class="fields-wrap mt-20">
                            <label for="c_comments" class="contact-label">Message<span class="steric">*</span></label>
                            <textarea class="contact-field txtarea" name="message" placeholder="Tell us what you’re looking for" id="c_comments"
                                rows="2"></textarea>
                        </div>
    
                        <div class="d-flex mt-20 gap-2 align-items-center">
                            <input class="dna-checkbox" type="checkbox" id="DNA" value="1"
                                name="nda_agreement" />
                            <label for="DNA" class="contact-label">This project requires an NDA</label>
                        </div>
    
                        <div class="fields-wrap mt-5 mb-2">
                            <label for="document" class="contact-label">Upload Document (Optional)</label>
                            <div class="upload-document">
                                <div class="uploadDocument">
                                    <span class="upload-label" id="file-name">Choose file to upload</span>
                                    <span class="upload-label-browse">Browse File</span>
                                </div>
                                <label for="document_file" class="d-none"></label>
                                <input class="form-control" type="file" id="document_file" name="document"
                                    accept=".doc,.docx,.pdf" />
                            </div>
                        </div>
                    </div>
    
                    <button type="submit" class="component-btn submit-button hover-effect loader-btn mt-20">
                        Send us a message!
                    </button>
                </form>


            </div>
        </div>
    </section>
    <section class="job-section pt-0">
        <div class="container">
            <h2 class="we-doHeading mb-0 pb-0" style="text-align: center !important">Looking for a <span>job</span></h2>
            <a href="https://career.zaptatech.com/" class="component-btn job-button">Apply here</a>
        </div>
    </section>


    <div class="swiper testiSwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="main-testi">
                    <div class="container">
                        <div class="testi-content d-flex align-items-center ">
                            <div class="teti-text">
                                <p class="zapta-team-p" style="text-align: justify">
                                    “{{ app('companyName') }} meticulous attention to detail and unwavering commitment to deadlines fueled a
                                    fantastic project collaboration. Each deliverable exceeded expectations, highlighting
                                    their impressive technical skills and creative problem-solving. Their consistent quality
                                    output showcases their reliability and deep understanding of the project, making them a
                                    true partner, not just a vendor. Bravo, {{ app('companyName') }}!”
                                </p>
                                <p class="redha-client">Terry Peterson</p>
                                <p class="legal-p">Founder & CEO of DrBroker.com</p>
                            </div>
                            <div class="testi-img video-pop position-relative" data-type="youtube" data-id="aLf9aaMdAiE"
                                data-autoplay='true'>
                                <img src="https://zaptatech.com/frontend-assets/images/testiImg-1.png"
                                    alt="Terry Peterson">
                                <span
                                    class="playIcon d-flex align-items-center justify-content-center rounded-circle position-absolute"
                                    id="playVideo">
                                    <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"
                                            fill="#FFFFFF" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="modal fade video-modal" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bg-transparent">
            <div class="modal-content bg-transparent">
                <div class="modal-body overflow-hidden position-relative p-0">
                    <div id="video-popup-close" class="close-video-popup position-absolute" class="fade">✖</div>
                    <iframe id="video-popup-iframe" width="100%" height="100%" src="" frameborder="0"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>




    <section class="getInTouch-sec">
        <div class="container">
            <div class="contect-detail">
                <div class="offices">
                    <h2 class="office-h2">Offices</h2>
                    <div>
                        <h3 class="office-county">Pakistan Office</h3>
                        <a href="https://goo.gl/maps/cN7aP8JwwjECKLhL8" target="_blank" class="office-address">144/2,
                            Block B, Bankers Society Near DHA Phase 4, Lahore, Pakistan</a>

                    </div>

                    <div>
                        <h3 class="office-county">UAE Office</h3>
                        <a target="_blank" class="office-address" href="https://goo.gl/maps/LMkkiAxv7kUNaHVb8">61-51
                            26B St, Jumeirah - Jumeirah 2 - Dubai - United Arab Emirates</a>
                    </div>

                    <div>
                        <h3 class="office-county">UK Office</h3>
                        <a href="https://goo.gl/maps/K4hbC5jfN675ZxSj8" target="_blank" class="office-address">
                            West Tower, 371 Deansgate, Manchester M15 4UP, United Kingdom
                        </a>
                    </div>

                </div>
                <div class="shedular-col">
                    <div class="swiper smart-wizard">
                        <div class="swiper-wrapper" id="smartwizardContact">

                            <div class="swiper-slide">
                                <div id="step-0111" class="tab-pane" role="tabpanel" aria-labelledby="step-0111">

                                    <h2 class="let-shedule-call"><span>Let’s</span> meet our experts</h2>
                                    <p class="shedule-consultation"><span class="need-expert">Looking for expert
                                            guidance?</span> Book a
                                        consultation with us and select a time slot that suits you best.</p>

                                    <button type="button" class="custom-book-consultation sw-btn-next sw-btn"
                                        onclick="bookingFormShow('smartwizardContact')" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Book a Consultation - it’s
                                        free</button>

                                    <p class="we-take-meeting">Contact us:</p>
                                    <div class="mail-us">
                                        <span class="mail-span">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                viewBox="0 0 18 17" fill="none">
                                                <g clip-path="url(#clip0_6552_30897)">
                                                    <path
                                                        d="M4.85893 3.38604C4.85873 3.79339 4.69671 4.18398 4.40853 4.47187C4.12035 4.75977 3.7296 4.92139 3.32225 4.92119C2.9149 4.92098 2.52432 4.75897 2.23642 4.47078C1.94853 4.1826 1.78691 3.79186 1.78711 3.38451C1.78731 2.97716 1.94933 2.58657 2.23751 2.29868C2.52569 2.01078 2.91644 1.84916 3.32379 1.84937C3.73114 1.84957 4.12172 2.01158 4.40962 2.29977C4.69751 2.58795 4.85913 2.97869 4.85893 3.38604ZM4.90501 6.05853H1.83319V15.6733H4.90501V6.05853ZM9.75848 6.05853H6.70202V15.6733H9.72776V10.6279C9.72776 7.81714 13.3909 7.55604 13.3909 10.6279V15.6733H16.4243V9.58344C16.4243 4.84516 11.0026 5.02179 9.72776 7.34869L9.75848 6.05853Z"
                                                        fill="#005BAA" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_6552_30897">
                                                        <rect width="16.4672" height="16.4672" fill="white"
                                                            transform="translate(0.873047 0.527832)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <a href="https://www.linkedin.com/company/zaptatech/mycompany/" target="_blank"
                                            class="mail-link">/zaptatech</a>
                                    </div>

                                    <div class="mail-us">
                                        <span class="mail-span">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                viewBox="0 0 18 17" fill="none">
                                                <g clip-path="url(#clip0_6552_30904)">
                                                    <path
                                                        d="M12.7843 11.0357C12.323 10.58 11.7472 10.58 11.2889 11.0357C10.9393 11.3826 10.5897 11.7295 10.2459 12.0822C10.1519 12.1793 10.0726 12.1998 9.95802 12.1352C9.73181 12.0117 9.4909 11.9117 9.2735 11.7765C8.25993 11.1386 7.41089 10.3184 6.65879 9.39534C6.28568 8.93674 5.9537 8.44581 5.72161 7.89314C5.6746 7.78143 5.68341 7.70794 5.77449 7.6168C6.1241 7.27874 6.46489 6.93185 6.80862 6.58496C7.2875 6.10284 7.2875 5.53842 6.80568 5.05336C6.53246 4.77703 6.25924 4.50657 5.98602 4.23024C5.70398 3.94803 5.42488 3.66287 5.13991 3.3836C4.67866 2.93382 4.10284 2.93382 3.64453 3.38654C3.29198 3.73343 2.95413 4.08913 2.59571 4.43014C2.26373 4.74469 2.09627 5.1298 2.06101 5.57957C2.00519 6.31157 2.1844 7.0024 2.43706 7.6756C2.95413 9.06903 3.74148 10.3067 4.69629 11.4414C5.98602 12.9759 7.52546 14.19 9.32638 15.0661C10.1372 15.46 10.9775 15.7628 11.8911 15.8128C12.5199 15.848 13.0663 15.6893 13.504 15.1984C13.8037 14.8632 14.1416 14.5575 14.4589 14.2371C14.9289 13.7608 14.9318 13.1846 14.4647 12.7143C13.9065 12.1528 13.3454 11.5943 12.7843 11.0357Z"
                                                        fill="#005BAA" />
                                                    <path
                                                        d="M12.2229 8.69274L13.3067 8.50754C13.1364 7.51097 12.6664 6.60848 11.9527 5.89118C11.1979 5.13567 10.2433 4.65944 9.19179 4.51245L9.03906 5.60309C9.85265 5.71774 10.5928 6.08521 11.1773 6.67021C11.7295 7.22288 12.0908 7.92254 12.2229 8.69274Z"
                                                        fill="#005BAA" />
                                                    <path
                                                        d="M13.9151 3.97754C12.6637 2.72521 11.0803 1.93443 9.33244 1.69043L9.17969 2.78107C10.6896 2.99273 12.0585 3.67769 13.1396 4.75657C14.1648 5.78253 14.8375 7.07895 15.0813 8.50472L16.1653 8.31952C15.8803 6.66739 15.1019 5.16813 13.9151 3.97754Z"
                                                        fill="#005BAA" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_6552_30904">
                                                        <rect width="16.4672" height="16.4672" fill="white"
                                                            transform="translate(0.873047 0.52002)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <a href="tel:042-37888403" class="mail-link">042-37888403</a>
                                    </div>

                                    <div class="mail-us">
                                        <span class="mail-span">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18"
                                                viewBox="0 0 17 18" fill="none">
                                                <g clip-path="url(#clip0_6552_30915)">
                                                    <path
                                                        d="M14.8823 3.43231C14.82 3.42588 14.7571 3.42588 14.6948 3.43231H1.88696C1.80488 3.43357 1.72333 3.44588 1.64453 3.4689L8.25428 10.0512L14.8823 3.43231Z"
                                                        fill="#005BAA" />
                                                    <path
                                                        d="M15.5592 4.06787L8.89911 10.7005C8.7277 10.8709 8.49583 10.9665 8.25414 10.9665C8.01246 10.9665 7.78059 10.8709 7.60918 10.7005L1.00858 4.11819C0.988291 4.19277 0.977532 4.26962 0.976562 4.3469V13.4953C0.976562 13.738 1.07295 13.9707 1.24451 14.1422C1.41608 14.3138 1.64877 14.4102 1.89141 14.4102H14.6992C14.9419 14.4102 15.1745 14.3138 15.3461 14.1422C15.5177 13.9707 15.6141 13.738 15.6141 13.4953V4.3469C15.6104 4.2516 15.5919 4.15745 15.5592 4.06787ZM2.51807 13.4953H1.88226V12.8412L5.20772 9.54321L5.85268 10.1882L2.51807 13.4953ZM14.6901 13.4953H14.0497L10.7151 10.1882L11.36 9.54321L14.6855 12.8412L14.6901 13.4953Z"
                                                        fill="#005BAA" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_6552_30915">
                                                        <rect width="16.4672" height="16.4672" fill="white"
                                                            transform="translate(0.09375 0.6875)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <a href="mailto:contact@zaptatech.com" class="mail-link">contact@zaptatech.com</a>
                                    </div>

                                    <a href="https://zaptatech.com/faqs"
                                        class="component-btn meet-our-experts-btn hover-effect-2 mt-32 ms-0"
                                        id="showMore">View FAQs</a>

                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div id="step-111" class="tab-pane" role="tabpanel" aria-labelledby="step-111">

                                    <h2 class="accordion-header d-none" id="headingOne">
                                        <button class="accordion-button collapsed nextSlide" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            Book a Consultation - it’s free
                                        </button>
                                    </h2>
                                    <div class="calender-container">
                                        <div class="meet-header">
                                            <button class="prevSlide btn sw-btn-prev sw-btn go-to-prev" type="button">
                                                <img class="sw-btn-prev"
                                                    src="https://zaptatech.com/frontend-assets/images/icons/prev-arrow.svg"
                                                    alt="back arrow">
                                            </button>
                                            <h2 class="meet">Select <span>Date</span></h2>
                                        </div>
                                        <input type="text" class="myID" name="daterange"
                                            value="01/01/2018 - 01/15/2018" style="display:none;">
                                        <button class="btn sw-btn-next sw-btn" type="button" id="gotoNext"
                                            style="display: none;"><span class="text">Next</span><img
                                                src="https://zaptatech.com/frontend-assets/images/icons/forward-arrow.svg"
                                                alt="arrow"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div id="step-222" class="tab-pane" role="tabpanel" aria-labelledby="step-222">

                                    <div class="meet-column">
                                        <div class="meet-header">
                                            <button class="prevSlide btn sw-btn-prev sw-btn go-to-prev" type="button">
                                                <img class="sw-btn-prev"
                                                    src="https://zaptatech.com/frontend-assets/images/icons/prev-arrow.svg"
                                                    alt="back arrow">
                                            </button>
                                            <h2 class="meet">Let’s <span>Meet</span></h2>
                                        </div>
                                        <div class="time-zone">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1303_23526)">
                                                    <path
                                                        d="M12.5713 2.71875C18.0943 2.71875 22.143 6.82148 22.143 12.3445C22.143 17.8675 18.0943 22.165 12.5713 22.165C7.04832 22.165 2.94128 17.8675 2.94128 12.3445C2.94128 6.82148 7.04832 2.71875 12.5713 2.71875ZM12.5713 4.34448C10.4496 4.34448 8.41475 5.18734 6.91446 6.68763C5.41417 8.18792 4.57132 10.2228 4.57132 12.3445C4.57132 14.4662 5.41417 16.501 6.91446 18.0013C8.41475 19.5016 10.4496 20.3445 12.5713 20.3445C14.693 20.3445 16.7279 19.5016 18.2282 18.0013C19.7285 16.501 20.5713 14.4662 20.5713 12.3445C20.5713 10.2228 19.7285 8.18792 18.2282 6.68763C16.7279 5.18734 14.693 4.34448 12.5713 4.34448ZM12.5713 6.34448C12.8162 6.34451 13.0527 6.43444 13.2357 6.5972C13.4187 6.75996 13.5357 6.98423 13.5643 7.22748L13.5713 7.34448V11.9305L16.2783 14.6375C16.4577 14.8174 16.5618 15.0589 16.5695 15.3129C16.5773 15.5668 16.4881 15.8142 16.3201 16.0048C16.152 16.1953 15.9178 16.3148 15.6648 16.3389C15.4119 16.363 15.1593 16.2899 14.9583 16.1345L14.8643 16.0515L11.8643 13.0515C11.7089 12.8959 11.6091 12.6935 11.5803 12.4755L11.5713 12.3445V7.34448C11.5713 7.07927 11.6767 6.82491 11.8642 6.63738C12.0517 6.44984 12.3061 6.34448 12.5713 6.34448Z"
                                                        fill="#005BAA" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1303_23526">
                                                        <rect width="24" height="24" fill="white"
                                                            transform="translate(0.571655 0.344727)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="time">30
                                                mins</span>
                                        </div>

                                        <div class="time-zone mt-3">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.9717 9.34473V10.5931L17.9465 9.81325L21.3218 7.113C21.5837 6.90348 21.9717 7.08995 21.9717 7.42535V17.2641C21.9717 17.5995 21.5837 17.786 21.3218 17.5764L17.9465 14.8762L16.9717 14.0964V15.3447V17.3447C16.9717 17.716 16.8242 18.0721 16.5616 18.3347C16.2991 18.5972 15.943 18.7447 15.5717 18.7447H4.57166C4.20035 18.7447 3.84426 18.5972 3.58171 18.3347C3.31915 18.0721 3.17166 17.716 3.17166 17.3447V7.34473C3.17166 6.97342 3.31915 6.61733 3.58171 6.35478C3.84426 6.09223 4.20035 5.94473 4.57166 5.94473H15.5717C15.943 5.94473 16.2991 6.09223 16.5616 6.35478C16.8242 6.61733 16.9717 6.97342 16.9717 7.34473V9.34473Z"
                                                    stroke="#005BAA" stroke-width="1.2" />
                                            </svg>
                                            <span class="time">Web conferencing details provided upon
                                                confirmation.</span>
                                        </div>

                                        <h2 class="available-slots">Available Slots <label
                                                class="error time_slot-error">please select
                                                any slot.</label> </h2>

                                        <div class="slot-container total-slots web-version section-load">

                                        </div>

                                        <h2 class="available-slots" style="margin-bottom: 6px;">Time Zone</h2>

                                        <div class="time-selecter-box">
                                            <img src="https://zaptatech.com/frontend-assets/images/icons/bad-face.svg"
                                                alt="face icon">
                                            <select class="time-selecter" name="time_selecter" id="timeSelecter">
                                            </select>
                                        </div>

                                        <button class="component-btn nextSlide2 btn sw-btn-next sw-btn scheduleNextBtn"
                                            type="button">
                                            <span class="text sw-btn-next">Next</span>
                                            <img class="sw-btn-next"
                                                src="https://zaptatech.com/frontend-assets/images/icons/forward-arrow.svg"
                                                alt="arrow">
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tab-pane step-3 tab-pane" id="step-333" role="tabpanel"
                                    aria-labelledby="step-333">
                                    <div class="tab-grid">
                                        <div class="meet-column ">
                                            <div class="meet-header">
                                                <button class="prevSlide btn sw-btn-prev sw-btn go-to-prev"
                                                    type="button">
                                                    <img class="sw-btn-prev"
                                                        src="https://zaptatech.com/frontend-assets/images/icons/prev-arrow.svg"
                                                        alt="back arrow">
                                                </button>
                                                <h2 class="meet">Let’s <span>Meet</span></h2>
                                            </div>

                                            <h3 class="detail">Details</h3>
                                            <div class="time-zone">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1303_23527)">
                                                        <path
                                                            d="M12.5713 2.71875C18.0943 2.71875 22.143 6.82148 22.143 12.3445C22.143 17.8675 18.0943 22.165 12.5713 22.165C7.04832 22.165 2.94128 17.8675 2.94128 12.3445C2.94128 6.82148 7.04832 2.71875 12.5713 2.71875ZM12.5713 4.34448C10.4496 4.34448 8.41475 5.18734 6.91446 6.68763C5.41417 8.18792 4.57132 10.2228 4.57132 12.3445C4.57132 14.4662 5.41417 16.501 6.91446 18.0013C8.41475 19.5016 10.4496 20.3445 12.5713 20.3445C14.693 20.3445 16.7279 19.5016 18.2282 18.0013C19.7285 16.501 20.5713 14.4662 20.5713 12.3445C20.5713 10.2228 19.7285 8.18792 18.2282 6.68763C16.7279 5.18734 14.693 4.34448 12.5713 4.34448ZM12.5713 6.34448C12.8162 6.34451 13.0527 6.43444 13.2357 6.5972C13.4187 6.75996 13.5357 6.98423 13.5643 7.22748L13.5713 7.34448V11.9305L16.2783 14.6375C16.4577 14.8174 16.5618 15.0589 16.5695 15.3129C16.5773 15.5668 16.4881 15.8142 16.3201 16.0048C16.152 16.1953 15.9178 16.3148 15.6648 16.3389C15.4119 16.363 15.1593 16.2899 14.9583 16.1345L14.8643 16.0515L11.8643 13.0515C11.7089 12.8959 11.6091 12.6935 11.5803 12.4755L11.5713 12.3445V7.34448C11.5713 7.07927 11.6767 6.82491 11.8642 6.63738C12.0517 6.44984 12.3061 6.34448 12.5713 6.34448Z"
                                                            fill="#005BAA" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1303_23527">
                                                            <rect width="24" height="24" fill="white"
                                                                transform="translate(0.571655 0.344727)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span class="time">30
                                                    mins</span>
                                            </div>

                                            <div class="time-zone mt-24">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.9717 9.34473V10.5931L17.9465 9.81325L21.3218 7.113C21.5837 6.90348 21.9717 7.08995 21.9717 7.42535V17.2641C21.9717 17.5995 21.5837 17.786 21.3218 17.5764L17.9465 14.8762L16.9717 14.0964V15.3447V17.3447C16.9717 17.716 16.8242 18.0721 16.5616 18.3347C16.2991 18.5972 15.943 18.7447 15.5717 18.7447H4.57166C4.20035 18.7447 3.84426 18.5972 3.58171 18.3347C3.31915 18.0721 3.17166 17.716 3.17166 17.3447V7.34473C3.17166 6.97342 3.31915 6.61733 3.58171 6.35478C3.84426 6.09223 4.20035 5.94473 4.57166 5.94473H15.5717C15.943 5.94473 16.2991 6.09223 16.5616 6.35478C16.8242 6.61733 16.9717 6.97342 16.9717 7.34473V9.34473Z"
                                                        stroke="#005BAA" stroke-width="1.2" />
                                                </svg>
                                                <span class="time">Web conferencing details provided upon
                                                    confirmation.</span>
                                            </div>

                                            <div class="time-zone mt-24">
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="pt-1">
                                                    <path
                                                        d="M18.3445 5.37664H17.5514V3.79053H15.9653V5.37664H8.03475V3.79053H6.44863V5.37664H5.65557C4.78321 5.37664 4.06946 6.09039 4.06946 6.96276V19.6517C4.06946 20.524 4.78321 21.2378 5.65557 21.2378H18.3445C19.2169 21.2378 19.9306 20.524 19.9306 19.6517V6.96276C19.9306 6.09039 19.2169 5.37664 18.3445 5.37664ZM18.3445 19.6517H5.65557V10.928H18.3445V19.6517ZM18.3445 9.34193H5.65557V6.96276H18.3445V9.34193Z"
                                                        fill="#005BAA" />
                                                </svg>
                                                <span class="time date-time-c">11:00pm - 11:30pm, Monday,
                                                    <br>March 13, 2023</span>
                                            </div>

                                            <div class="time-zone mt-24">
                                                <img src="https://zaptatech.com/frontend-assets/images/icons/bad-face.svg"
                                                    alt="face icon">
                                                <span class="time date-timezone">(GMT-05:00) Pacific Time - Los
                                                    Angeles</span>
                                            </div>

                                        </div>
                                        <form data-success-fn="scheduleCallSuccess"
                                            action="https://zaptatech.com/schedule-call"
                                            class="detail-form global-ajax-submit" data-check-validate="false"
                                            id="userDetailFormMobile" data-smart-wizard-id="smartwizardContact">
                                            <hr class="detail-top-border">
                                            <h2 class="enter-details">Enter Details</h2>
                                            <div class="input-container">
                                                <label class="form-label" for="fullName2">Full Name<span
                                                        class="steric">*</span></label>
                                                <input class="form-fields" type="text" id="fullName2" name="name"
                                                    placeholder="John Deo" required>
                                            </div>
                                            <div class="input-container">
                                                <label class="form-label" for="userEmail2">Email<span
                                                        class="steric">*</span></label>
                                                <input class="form-fields" type="email" id="userEmail2" name="email"
                                                    placeholder="example@xyz.com" required>
                                            </div>
                                            <div class="input-container countryContainer">
                                                <label class="form-label" for="userPhoneNumber2">Phone Number</label>
                                                <input class="form-fields country-select" type="tel"
                                                    id="userPhoneNumber2" name="phone">
                                            </div>
                                            <div class="input-container">
                                                <label class="form-label" for="enterMessage2">Tell us what you
                                                    are looking for</label>
                                                <textarea class="user-comments" name="comment" id="enterMessage2" placeholder="Write a description here"></textarea>
                                            </div>

                                            <button class="component-btn event loader-btn" type="submit">Schedule
                                                Event</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="clients-section">
        <div class="container">
            <h2 class="our-clients">Our Clients</h2>
            <div class="swiper clientsSwiper">
                <div class="swiper-wrapper">



                    <a href="https://www.cisco.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/cicso_logo.svg" alt="cicso">
                    </a>

                    <a href="https://www.bon.com.na/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/bank_of_namibia_logo.svg"
                            alt="Bank Of Namibia">
                    </a>

                    <a href="https://www.walmart.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/walmart_logo.svg" alt="Walmart">
                    </a>

                    <a href="https://www.saudiexports.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/saudi_exports_logo.svg"
                            alt="Saudi Export">
                    </a>

                    <a href="https://www.haj.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/ministri_of_haji_and_umra_logo.svg"
                            alt="ministri of haji and umra logo">
                    </a>

                    <a href="https://www.imgprep.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/img_prep_logo.svg" alt="IMF prep">
                    </a>

                    <a href="https://www.cisco.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/cicso_logo.svg" alt="cicso">
                    </a>

                    <a href="https://www.bon.com.na/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/bank_of_namibia_logo.svg"
                            alt="Bank Of Namibia">
                    </a>

                    <a href="https://www.walmart.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/walmart_logo.svg" alt="Walmart">
                    </a>

                    <a href="https://www.saudiexports.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/saudi_exports_logo.svg"
                            alt="Saudi Export">
                    </a>

                    <a href="https://www.haj.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/ministri_of_haji_and_umra_logo.svg"
                            alt="ministri of haji and umra logo">
                    </a>

                    <a href="https://www.imgprep.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/img_prep_logo.svg" alt="IMF prep">
                    </a>


                    <a href="https://www.cisco.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/cicso_logo.svg" alt="cicso">
                    </a>

                    <a href="https://www.bon.com.na/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/bank_of_namibia_logo.svg"
                            alt="Bank Of Namibia">
                    </a>

                    <a href="https://www.walmart.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/walmart_logo.svg" alt="Walmart">
                    </a>

                    <a href="https://www.saudiexports.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/saudi_exports_logo.svg"
                            alt="Saudi Export">
                    </a>

                    <a href="https://www.haj.gov.sa/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/ministri_of_haji_and_umra_logo.svg"
                            alt="ministri of haji and umra logo">
                    </a>

                    <a href="https://www.imgprep.com/" target="_blank" class="swiper-slide">
                        <img width="230" height="75"
                            src="https://zaptatech.com/frontend-assets/images/icons/img_prep_logo.svg" alt="IMF prep">
                    </a>


                </div>
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script>
        function getInTouchError(e) {
            console.log(e);
            $('.error.error-message.customError').remove();
            $.each(e.errors, function(field, messages) {
                if (field == 'services' || field == 'looking_for') {
                    console.log(field)

                    $(`#${field}_error`).css({
                        'display': 'block'
                    });
                    $(`#${field}_error`).text(messages[0]);
                } else {
                    console.log("field", field);
                    if (field == 'document') {
                        $('.upload-document').after('<label class="error error-message customError" for="' + field +
                            '">' + messages[0] + "</label>")
                    } else {
                        $(document).find("input[name=" + field + "]").after(
                            '<label class="error error-message customError" for="' + field +
                            '">' + messages[0] + "</label>");
                    }
                }
            });
        }
    </script>

    <script>
        var image = document.getElementById("responsiveImage");

        // Function to change the image source based on browser width
        function changeImageSource() {
            if (window.innerWidth < 520) {
                image.src = "https://zaptatech.com/frontend-assets/images/contact-2.webp";
            } else {
                image.src = "https://zaptatech.com/frontend-assets/images/contact-us.webp";
            }
        }

        // Initial call to set the image source based on the initial browser width
        changeImageSource();

        // Add an event listener for the window resize event
        window.addEventListener("resize", changeImageSource);

        var sheduleCallSwiper = new Swiper(".smart-wizard", {
            slidesPerView: 1,
            spaceBetween: 0,
            simulateTouch: false,
            shortSwipes: false,
            allowTouchMove: false,
            slideToClickedSlide: false,
            // preventInteractionOnTransition: true;
            // preventClicks: false
            on: {
                slideChange: function() {
                    setWrapperHeight();
                },
            },
        });

        function setWrapperHeight() {
            const activeSlide = sheduleCallSwiper.slides[sheduleCallSwiper.activeIndex];
            const wrapper = sheduleCallSwiper.wrapperEl;
            wrapper.style.height = activeSlide.offsetHeight + 'px';
        }

        // Call the function on window load
        window.addEventListener('load', setWrapperHeight);

        $(".nextSlide").click(function() {
            sheduleCallSwiper.slideNext();
        });

        $(".prevSlide").click(function() {
            sheduleCallSwiper.slidePrev();
        });
    </script>

    <script src="https://zaptatech.com/frontend-assets/js/schedule-call.js"
        data-param="https://zaptatech.com/get-availabe-slots" data-param2="https://zaptatech.com/get-time-zones"
        data-param3="30"></script>

    <script>
        $(document).ready(function() {

            window.addEventListener('load', function() {
                // Create a new link element
                var intelInputCss = document.createElement("link");
                intelInputCss.rel = "stylesheet";
                intelInputCss.type = "text/css";
                intelInputCss.href =
                    "https://cdn.jsdelivr.net/npm/intl-tel-input@15.1.2/build/css/intlTelInput.css";
                var flatPickerCss = document.createElement("link");
                flatPickerCss.rel = "stylesheet";
                flatPickerCss.type = "text/css";
                flatPickerCss.href = "https://zaptatech.com/frontend-assets/libraries/css/flatepicker.css";


                var smartWizardCss = document.createElement("link");
                smartWizardCss.rel = "stylesheet";
                smartWizardCss.type = "text/css";
                smartWizardCss.href = "https://zaptatech.com/frontend-assets/libraries/css/smartWizard.css";

                // Get a reference to the element you want to insert the link before
                var referenceLink = document.querySelector(
                    "head > link[href='https://zaptatech.com/frontend-assets/css/style.css']");
                // Insert the link element before the reference element
                if (referenceLink) {
                    var parent = referenceLink.parentNode;
                    parent.insertBefore(intelInputCss, referenceLink);
                    // parent.insertBefore(select2Css, referenceLink);
                    // parent.insertBefore(select2CustomCss, referenceLink);
                    parent.insertBefore(flatPickerCss, referenceLink);
                    parent.insertBefore(smartWizardCss, referenceLink);
                } else {
                    // If no reference element is found, just append it to the end of the head
                    document.head.appendChild(intelInputCss);
                    // document.head.appendChild(select2Css);
                    // document.head.appendChild(select2CustomCss);
                    document.head.appendChild(flatPickerCss);
                    document.head.appendChild(smartWizardCss);
                }
            });
        });

        $(".event").on("click", function() {
            setTimeout(() => {
                const targetTabContent = $(".we-take-meeting");
                const targetOffset = targetTabContent.offset().top - 300;

                $("html, body").animate({
                    scrollTop: targetOffset
                }, 500);
            }, 1001);


        });

        $(".need-expert").click(function() {
            $(".custom-book-consultation").click();
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#videoModal').modal({
                backdrop: 'static',
                keyboard: false,
            });

            document.querySelectorAll(".video-pop").forEach(function(element) {
                element.addEventListener("click", function(event) {
                    event.preventDefault();
                    $("#videoModal").modal("show");
                    var videoId = this.getAttribute("data-id");
                    document.getElementById("video-popup-iframe").src =
                        "https://www.youtube.com/embed/" + videoId +
                        "?autoplay=1&controls=0&modestbranding=1&;showinfo=0&;autohide=1&;rel=0;";
                });
            });

            document.querySelectorAll("#video-popup-close").forEach(function(element) {
                element.addEventListener("click", function(event) {
                    $("#videoModal").modal("hide");
                    document.getElementById("video-popup-iframe").src = "";
                });
            });

        });


        var swiper = new Swiper(".testiSwiper", {
            speed: 1200,
            // Enable pagination with clickable dots
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            // Enable looping
            loop: true,
        });
    </script>
@endsection
