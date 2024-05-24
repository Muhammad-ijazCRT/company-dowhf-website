@extends('frontend.layout')

@section('title')
    Services
@endsection

@section('customStyle')
    <style>
        .getInTouch-sec {
            margin-top: -5px !important;
        }

        .services-wraper label span {
            color: #636363 !important;
        }
    </style>

    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "ItemList",
      "name": "Services",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "Service",
            "name": "UI Ux Design",
            "url": "https://zaptatech.com/services/ui-ux-design"
          }
        },
        {
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "Service",
            "name": "Web Development",
            "url": "https://zaptatech.com/services/web-development"
          }
        },
        {
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@type": "Service",
            "name": "Mobile Development",
            "url": "https://zaptatech.com/services/mobile-development"
          }
        },
        {
          "@type": "ListItem",
          "position": 4,
          "item": {
            "@type": "Service",
            "name": "Quality Assurance",
            "url": "https://zaptatech.com/services/quality-assurance"
          }
        },
        {
          "@type": "ListItem",
          "position": 5,
          "item": {
            "@type": "Service",
            "name": "MVP Builder",
            "url": "https://zaptatech.com/services/mvp-builder"
          }
        },
        {
          "@type": "ListItem",
          "position": 6,
          "item": {
            "@type": "Service",
            "name": "Dedicated Teams",
            "url": "https://zaptatech.com/services/dedicated-teams"
          }
        }
      ]
    }
    </script>
@endsection


@section('MainContent')
    <section class="service-section d-flex">

        <div class="content">
            <div id="particles-js"></div>
            <h1 class="service">Services</h1>
            <div class="breadcrums">
                <a href="https://zaptatech.com" class="home-page">Home</a>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.47216 16.3381L0.830078 14.7995L7.03394 8.19075L1.01902 2.17583L2.60712 0.583252L10.1696 8.14577L2.47216 16.3381Z"
                        fill="#EAEAEA" />
                </svg>
                <span class="current-page">Services</span>
            </div>
            <p class="introductory-text">{{ app('companyName') }} Technologies is a custom software design and development company offering a
                comprehensive range of innovative and AI powered solutions. Our expert team is well versed in Website
                development, Mobile application development, UI UX design, Quality assurance, MVP builder and Dedicated team
                services.</p>
        </div>

    </section>

    <section class="do-cards-sec">
        <div class="container">
            <h2 class="we-doHeading">What <span>We Do!</span></h2>
            <div class="do-card-wraper">
                <!-- Card 1 -->
                <a href="https://zaptatech.com/services/ui-ux-design" class="do-card">
                    <img width="60" height="60" src="https://zaptatech.com/frontend-assets/images/icons/ui-icon.svg"
                        alt="UI icon">
                    <h2 class="cardTitle">UI UX Design</h2>
                    <p class="card-text">Crafting a data-driven and user centered UI UX design to provide the greatest user
                        experience and satisfaction.</p>
                </a>

                <!-- Card 2 -->
                <a href="https://zaptatech.com/services/web-development" class="do-card">
                    <img width="60" height="60" src="https://zaptatech.com/frontend-assets/images/icons/web-icon.svg"
                        alt="UI icon">
                    <h2 class="cardTitle">Web Development</h2>
                    <p class="card-text">Achieve business objectives and build a strong online presence by our web
                        development solutions for customers.</p>
                </a>

                <!-- Card 3 -->
                <a href="https://zaptatech.com/services/mobile-development" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/mobile-icon.svg" alt="UI icon">
                    <h2 class="cardTitle">Mobile Development</h2>
                    <p class="card-text">Well-engineered, AI-driven native and hybrid applications for all your business
                        needs with a seamless experience.</p>
                </a>

                <!-- Card 4 -->
                <a href="https://zaptatech.com/services/quality-assurance" class="do-card">
                    <img width="60" height="60" src="https://zaptatech.com/frontend-assets/images/icons/Quality.svg"
                        alt="UI icon">
                    <h2 class="cardTitle">Quality Assurance</h2>
                    <p class="card-text">Providing well-tested and bug-free web and mobile apps, ensuring high-quality and
                        the best user experience.</p>
                </a>

                <!-- Card 5 -->
                <a href="https://zaptatech.com/services/mvp-builder" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/mvp-builder.svg" alt="UI icon">
                    <h2 class="cardTitle">MVP Builder</h2>
                    <p class="card-text">Streamlined MVPs of development expedites the product journey and validates market
                        potential while insuring well engineering.</p>
                </a>

                <!-- Card 6 -->
                <a href="https://zaptatech.com/services/dedicated-teams" class="do-card">
                    <img width="60" height="60" src="https://zaptatech.com/frontend-assets/images/icons/teams.svg"
                        alt="UI icon">
                    <h2 class="cardTitle">Dedicated Teams</h2>
                    <p class="card-text">Onboard our dedicated designers, developers and skilled engineers on a full-time
                        basis to achieve your business objectives.</p>
                </a>
                <!-- Card 7 -->
                <a href="https://zaptatech.com/services/hybrid-applications-development" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/hybrid-applications.svg" alt="UI icon">
                    <h2 class="cardTitle">Hybrid Applications Development</h2>
                    <p class="card-text">Create efficient, versatile apps that reach every user, all from a
                        single, efficient codebase. </p>
                </a>

                <!-- Card 8 -->
                <a href="https://zaptatech.com/services/ai-embedded-applications" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/ai-embeded.svg" alt="UI icon">
                    <h2 class="cardTitle">AI Embedded Applications</h2>
                    <p class="card-text">Infuse your devices with AI to create smarter, more autonomous, & more efficient
                        products. </p>
                </a>

                <!-- Card 9 -->
                <a href="https://zaptatech.com/services/software-automation" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/software-automation.svg" alt="UI icon">
                    <h2 class="cardTitle">Software Automation</h2>
                    <p class="card-text">Streamline your software creation and testing process to improve quality, reduce
                        costs, and speed up releases.</p>
                </a>

                <!-- Card 10 -->
                <a href="https://zaptatech.com/services/no-code-and-low-code-development" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/no-code-development.svg" alt="UI icon">
                    <h2 class="cardTitle">No-Code and Low-Code Development</h2>
                    <p class="card-text">Empower your team to build custom apps faster and easier, leveraging no-code and
                        low-code development tools.</p>
                </a>

                <!-- Card 11 -->
                <a href="https://zaptatech.com/services/data-analytics" class="do-card">
                    <img width="60" height="60"
                        src="https://zaptatech.com/frontend-assets/images/icons/data-analyst.svg" alt="UI icon">
                    <h2 class="cardTitle">Data Analytics</h2>
                    <p class="card-text">Exploit within the capability of data extracting valuable insights for informed
                        decisions and
                        accelerated business growth.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="technologies-sec">
        <div class="container">
            <h2 class="technologies">Our <span class="light-blue">Technologies</span></h2>
            <div class="swiper clientsSwiper">

                <div class="swiper-wrapper align-items-center">
                    <a href="https://www.php.net/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/483/php.png" alt="PHP">
                    </a>
                    <a href="https://laravel.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/463/Property-1=Default.png" alt="Laravel">
                    </a>
                    <a href="https://nodejs.org/en" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/467/node-JS.png" alt="Node JS">
                    </a>
                    <a href="https://www.python.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/491/python.png" alt="Python">
                    </a>
                    <a href="https://www.mongodb.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/482/Mongo-DB.png" alt="Mango DB">
                    </a>
                    <a href="https://getbootstrap.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/484/Bootstrap.png" alt="Bootstrap">
                    </a>
                    <a href="https://angular.io/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/480/Angular.png" alt="Angular">
                    </a>
                    <a href="https://jquery.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/478/ajax.png" alt="AJAX">
                    </a>
                    <a href="https://www.w3schools.com/css/css_intro.asp" target="_blank"
                        class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/474/CSS.png" alt="CSS">
                    </a>
                    <a href="https://vuejs.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/471/Vue-JS.png" alt="Vue JS">
                    </a>
                    <a href="https://jquery.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/470/Jquery.png" alt="jQuery">
                    </a>
                    <a href="https://www.json.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/469/JSON.png" alt="JSON">
                    </a>
                    <a href="https://react.dev/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/464/react.png" alt="React">
                    </a>
                    <a href="https://html.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/486/HTML.png" alt="HTML">
                    </a>
                    <a href="http://meanjs.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/415/Group-1261223948.png" alt="Mean Stack">
                    </a>
                    <a href="http://mern.js.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/416/Pasted-20230920-175125.png" alt="Mern Stack">
                    </a>
                    <a href="https://reactnative.dev/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/475/react-native.png" alt="React Native">
                    </a>
                    <a href="https://www.android.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/485/Android.png" alt="Android">
                    </a>
                    <a href="https://www.cypress.io/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/477/cypress.png" alt="Cypress">
                    </a>
                    <a href="https://www.selenium.dev/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/476/Selenium.png" alt="Selenium">
                    </a>
                    <a href="https://cucumber.io/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/487/Cucumber.png" alt="Cucumber">
                    </a>
                    <a href="https://jmeter.apache.org/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/488/jmeter.png" alt="JMeter">
                    </a>
                    <a href="https://www.microfocus.com/en-us/products/loadrunner-professional/overview" target="_blank"
                        class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/489/Load-runner.png" alt="Load Runner">
                    </a>
                    <a href="https://www.postman.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/490/postman.png" alt="Postman">
                    </a>
                    <a href="https://www.figma.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/479/Figma.png" alt="Figma">
                    </a>
                    <a href="https://www.adobe.com/products/illustrator.html" target="_blank"
                        class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/473/illustrator.png" alt="Adobe Illustrator">
                    </a>
                    <a href="https://www.adobe.com/products/photoshop.html" target="_blank"
                        class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/472/photoshop.png" alt="Photoshop">
                    </a>
                    <a href="https://www.xdguru.com/xd-website-templates/" target="_blank"
                        class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/468/XD.png" alt="xd">
                    </a>
                    <a href="https://www.sketch.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/466/sketch.png" alt="Sketch">
                    </a>
                    <a href="https://miro.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/465/Miro.png" alt="Miro">
                    </a>
                    <a href="https://www.invisionapp.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/492/inivision.png" alt="Invision">
                    </a>
                    <a href="https://balsamiq.com/" target="_blank" class="swiper-slide text-decoration-none">
                        <img src="https://zaptatech.com/storage/493/Balsamiq.png" alt="Balsamiq">
                    </a>

                </div>
            </div>
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
                                    “{{ app('companyName') }}'s meticulous attention to detail and unwavering commitment to deadlines fueled a
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
@endsection



@section('scripts')
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
