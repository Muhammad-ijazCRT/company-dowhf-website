

<?php $__env->startSection('title'); ?>
    Blogs
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customStyle'); ?>
    <style>
        .loading {
            position: relative;
            pointer-events: none;
            cursor: not-allowed;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .loading:before {
            content: "";
            display: block;
            width: 24px;
            height: 24px;
            border: 2px solid;
            border-left-color: transparent;
            border-right-color: transparent;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.5s;
            animation: 0.8s linear infinite rotate;
        }

        .loading:before {
            transition-delay: 0.5s;
            transition-duration: 1s;
            opacity: 1;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('MainContent'); ?>
    <section class="service-section d-flex">
        <div class="content">
            <div id="particles-js" class="height-436"></div>
            <h1 class="service">Blogs</h1>
            <div class="breadcrums">
                <a href="https://zaptatech.com" class="home-page">Home</a>
                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.47216 16.3381L0.830078 14.7995L7.03394 8.19075L1.01902 2.17583L2.60712 0.583252L10.1696 8.14577L2.47216 16.3381Z"
                        fill="#EAEAEA" />
                </svg>
                <span class="current-page">Blogs</span>
            </div>
            <p class="introductory-text mx-auto" style="max-width: 740px;">Explore informative and engaging blog articles on
                a wide range of topics, written by experts and curated for your reading pleasure.</p>
        </div>
    </section>

    <section class="latest-blog-section">
        <div class="container">

            <div class="outsourcing">
                <h2 class="we-doHeading latest-item">Latest <span>Blogs</span></h2>
                <div class="outsourcing-img" id="latest-blogs">

                </div>
                <!-- Header Search -->
                <div class="header-search-wrapper">
                    <label>Search</label>
                    <input type="search" class="search-field" placeholder="Search">
                    <div class="search-result-container">

                    </div>
                </div>
                <!-- Header Search -->

                <form class="outsourcing2">

                    <h3 class="trend-blogs-hd">Trending Blogs</h3>
                    <div class="ensure-cards" id="trending-blogs">


                    </div>

                    <h3 style="padding-bottom: 16px;" class="trend-blogs-hd">Categories</h3>
                    <div class="main-fields">
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn0" name="catogeris_selecter"
                                value="1">
                            <label for="btn0" class="category-label">Web Design</label>
                            <span class="blog-counter">4</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn1" name="catogeris_selecter"
                                value="16">
                            <label for="btn1" class="category-label">Web Development</label>
                            <span class="blog-counter">5</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn2" name="catogeris_selecter"
                                value="17">
                            <label for="btn2" class="category-label">Mobile Development</label>
                            <span class="blog-counter">3</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn3" name="catogeris_selecter"
                                value="18">
                            <label for="btn3" class="category-label">Software Development</label>
                            <span class="blog-counter">5</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn4" name="catogeris_selecter"
                                value="21">
                            <label for="btn4" class="category-label">Business Analyst</label>
                            <span class="blog-counter">3</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn5" name="catogeris_selecter"
                                value="22">
                            <label for="btn5" class="category-label">General</label>
                            <span class="blog-counter">2</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn6" name="catogeris_selecter"
                                value="23">
                            <label for="btn6" class="category-label">ZAPTA Learning</label>
                            <span class="blog-counter">1</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn7" name="catogeris_selecter"
                                value="24">
                            <label for="btn7" class="category-label">Human Resource</label>
                            <span class="blog-counter">1</span>
                        </div>
                        <!-- 1 -->
                        <div class="field-wraper position-relative">
                            <input class="category-field" type="checkbox" id="btn8" name="catogeris_selecter"
                                value="25">
                            <label for="btn8" class="category-label">Business Development</label>
                            <span class="blog-counter">1</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- section-blogs-cards -->
    <section class="blogs-cards-section">
        <div class="container">
            <h2 class="we-doHeading">Other <span>Blogs</span></h2>
            <div id="previous-blogs">
                <div class="blogs-cards">
                    <!-- card-1 -->
                    <div class="blog-card-1">
                        <div class="img-card-1">
                            <img src="https://zaptatech.com/storage/741/how-to-combine-ux-writing-and-ux-design-a-guide-zapta-technologies.webp"
                                alt="how-to-combine-ux-writing-and-ux-design-a-guide-zapta-technologies" width="407"
                                height="274">
                        </div>
                        <div class="text-card-1">
                            <div class="software-time">
                                <p class="software-p">Web Design</p>
                                <p class="Reading-time">Reading Time: 6 mins</p>
                            </div>
                            <h2 class="blog-title" role="button"
                                onclick="blogDetail('https://zaptatech.com/blogs/how-to-combine-ux-writing-and-ux-design-a-guide')">
                                How to Combine UX Writing and UX Design? A Guide</h2>
                            <p class="blogs-description">Learn how UX writing and UX design work together to craft
                                intuitive &amp; engaging digital products. This guide offers practical tips for seamless
                                collaboration.</p>
                            <div class="main-john-doe">

                                <p class="john-date">Posted On: May 9, 2024</p>

                                <div class="half-stars-example">
                                    <div class="rating-group static">
                                        <label class="rating__label">&nbsp;</label>
                                        <input class="rating__input  done " value="5" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="4.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="4" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="3.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="3" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="2.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="2" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="1.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="1" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="0.5" type="radio">
                                    </div>
                                </div>
                                <a onclick="shareLinksModel('https://zaptatech.com/blogs/how-to-combine-ux-writing-and-ux-design-a-guide')"
                                    class="share-btn"><span><img
                                            src="https://zaptatech.com/frontend-assets/images/icons/share-2.svg"
                                            alt="share-img" width="12" height="13"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card-1">
                        <div class="img-card-1">
                            <img src="https://zaptatech.com/storage/738/building-strong-business-relationships-for-sustainable-growth-zapta-technologies.webp"
                                alt="building-strong-business-relationships-for-sustainable-growth-zapta-technologies"
                                width="407" height="274">
                        </div>
                        <div class="text-card-1">
                            <div class="software-time">
                                <p class="software-p">Business Development</p>
                                <p class="Reading-time">Reading Time: 6 mins</p>
                            </div>
                            <h2 class="blog-title" role="button"
                                onclick="blogDetail('https://zaptatech.com/blogs/building-strong-business-relationships-for-sustainable-growth')">
                                Building Strong Business Relationships for Sustainable Growth</h2>
                            <p class="blogs-description">Forge enduring partnerships for long-term success. Discover how to
                                build strong business relationships that fuel sustainable growth for your company.</p>
                            <div class="main-john-doe">

                                <p class="john-date">Posted On: May 8, 2024</p>

                                <div class="half-stars-example">
                                    <div class="rating-group static">
                                        <label class="rating__label">&nbsp;</label>
                                        <input class="rating__input  done " value="5" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="4.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="4" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="3.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="3" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="2.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="2" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="1.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="1" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="0.5" type="radio">
                                    </div>
                                </div>
                                <a onclick="shareLinksModel('https://zaptatech.com/blogs/building-strong-business-relationships-for-sustainable-growth')"
                                    class="share-btn"><span><img
                                            src="https://zaptatech.com/frontend-assets/images/icons/share-2.svg"
                                            alt="share-img" width="12" height="13"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card-1">
                        <div class="img-card-1">
                            <img src="https://zaptatech.com/storage/734/skills-gap-to-skills-leap-how-to-overcome-talent-shortages-in-2024-zapta-technologies-.webp"
                                alt="skills-gap-to-skills-leap-how-to-overcome-talent-shortages-in-2024-zapta-technologies-"
                                width="407" height="274">
                        </div>
                        <div class="text-card-1">
                            <div class="software-time">
                                <p class="software-p">Human Resource</p>
                                <p class="Reading-time">Reading Time: 6 mins</p>
                            </div>
                            <h2 class="blog-title" role="button"
                                onclick="blogDetail('https://zaptatech.com/blogs/skills-gap-to-skills-leap-how-to-overcome-talent-shortages-in-2024')">
                                Skills Gap to Skills Leap: How to Overcome Talent Shortages in 2024</h2>
                            <p class="blogs-description">The skills gap with actionable strategies to overcome talent
                                shortages and transform your hiring game. Learn how to attract, develop, and retain top
                                performers.</p>
                            <div class="main-john-doe">

                                <p class="john-date">Posted On: April 24, 2024</p>

                                <div class="half-stars-example">
                                    <div class="rating-group static">
                                        <label class="rating__label">&nbsp;</label>
                                        <input class="rating__input  done " value="5" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="4.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="4" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="3.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="3" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="2.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="2" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="1.5" type="radio">
                                        <label class="rating__label rating__label--half"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input " value="1" type="radio">
                                        <label class="rating__label"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input " value="0.5" type="radio">
                                    </div>
                                </div>
                                <a onclick="shareLinksModel('https://zaptatech.com/blogs/skills-gap-to-skills-leap-how-to-overcome-talent-shortages-in-2024')"
                                    class="share-btn"><span><img
                                            src="https://zaptatech.com/frontend-assets/images/icons/share-2.svg"
                                            alt="share-img" width="12" height="13"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="previousBlogsPage">

                    <nav class="d-flex justify-items-center justify-content-between">
                        <div class="d-flex justify-content-between flex-fill d-sm-none">
                            <ul class="pagination">

                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link">« Previous</span>
                                </li>


                                <li class="page-item">
                                    <a class="page-link" href="https://zaptatech.com/blogs?previousBlogsPage=2"
                                        rel="next">Next »</a>
                                </li>
                            </ul>
                        </div>

                        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                            <div>
                                <p class="small text-muted">
                                    Showing
                                    <span class="fw-semibold">1</span>
                                    to
                                    <span class="fw-semibold">3</span>
                                    of
                                    <span class="fw-semibold">23</span>
                                    results
                                </p>
                            </div>

                            <div>
                                <ul class="pagination">

                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li>


                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=2">2</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=3">3</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=4">4</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=5">5</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=6">6</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=7">7</a></li>
                                    <li class="page-item"><a class="page-link"
                                            href="https://zaptatech.com/blogs?previousBlogsPage=8">8</a></li>


                                    <li class="page-item">
                                        <a class="page-link" href="https://zaptatech.com/blogs?previousBlogsPage=2"
                                            rel="next" aria-label="Next »">›</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <input type="hidden" id="previousblogCurrentPage" value="1">
                </div>
            </div>


        </div>

    </section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    <script>
        function shareLinksModel(url) {
            $('#shareBlogModal').modal('show');
            $('#facebookUrl').attr('href', `https://www.facebook.com/sharer/sharer.php?u=${url}`);
            $('#whatsappUrl').attr('href', `https://web.whatsapp.com/send?text=${url}`);
            $('#linkedinUrl').attr('href', `http://www.linkedin.com/shareArticle?mini=true&url=${url}`);
            $('#twitterUrl').attr('href', `https://twitter.com/intent/tweet?text=${url}`);
            $('#clipboard').val(url);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchField = document.querySelector('.header-search-wrapper .search-field');
            var searchResultContainer = document.querySelector('.header-search-wrapper .search-result-container');

            function toggleSearchResultContainer() {
                document.querySelector(".search-result-container").innerHTML = '';
                var selectedCatgories = $('.category-field:checked');
                var categories = [];

                // Loop through the checked checkboxes buttons and collect their values
                selectedCatgories.each(function() {
                    categories.push($(this).val());
                });
                var value = searchField.value;
                if (value.length > 0) {
                    const url = "https://zaptatech.com/blogs/search";
                    const params = {
                        key: value,
                        categories: categories,
                    };


                    const queryParams = new URLSearchParams(params).toString();
                    const fetchUrl = `${url}?${queryParams}`;

                    fetch(fetchUrl)
                        .then(response => response.text())
                        .then(result => {
                            searchResultContainer.classList.remove('loading');
                            document.querySelector(".search-result-container").innerHTML = result;
                            searchResultContainer.classList.add('show');

                        })
                        .catch(error => {
                            searchResultContainer.classList.remove('loading');
                            searchResultContainer.classList.remove('show');
                            console.error('Error:', error);
                        });
                } else {
                    searchResultContainer.classList.remove('show');
                    searchResultContainer.classList.remove('loading');
                }
            }

            // searchField.addEventListener('keyup', toggleSearchResultContainer);

            var debounceTimeout = null;
            // Add input event listener to handle changes in the input value
            searchField.addEventListener('keyup', function() {
                document.querySelector(".search-result-container").innerHTML = '';
                searchResultContainer.classList.add('loading');
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(toggleSearchResultContainer, 1000);

            });

            // Handle the focusin event to show the search result container if the input field is not empty
            searchField.addEventListener('focusin', function() {
                if (searchField.value.length > 0) {
                    searchResultContainer.classList.add('show');
                }
            });

        });

        function blogDetail(url) {
            location.href = url;
        }

        $(document).ready(function() {
            getBlogs(1, 1);
        });

        $('.category-field').change(function(e) {

            getBlogs(1, 1) //when category filter apply page start from 1

        });

        function getBlogs(latestBlogsPage = 1, previousBlogsPage = 1) {
            $(".zapta-loader").css("display", "flex");
            var selectedCatgories = $('.category-field:checked');
            var categories = [];

            // Loop through the checked checkboxes buttons and collect their values
            selectedCatgories.each(function() {
                categories.push($(this).val());
            });

            $.ajax({
                type: "get",
                url: "https://zaptatech.com/blogs",
                data: {
                    latestBlogsPage: latestBlogsPage,
                    previousBlogsPage: previousBlogsPage,
                    categories: categories,
                },
                success: function(response) {
                    $('#latest-blogs').html(response.latestBlogs);
                    $('#previous-blogs').html(response.previousBlogs);
                    $('#trending-blogs').html(response.trendingBlogs);



                    $(".zapta-loader").css("display", "none");
                },
                error: function(response) {
                    $(".zapta-loader").css("display", "none");
                }
            });
        }

        // click event on latest blog pagination
        $(document).on('click', '#latestBlogsPage a', function(event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var latestBlogsPage = $(this).attr('href').split('latestBlogsPage=')[
                1]; // get page number of next or back
            var previousBlogsPage = $('#previousblogCurrentPage')
                .val(); // also get current page number of previous Blog
            getBlogs(latestBlogsPage, previousBlogsPage);
        });

        // click event on Previous blog pagination
        $(document).on('click', '#previousBlogsPage a', function(event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var previousBlogsPage = $(this).attr('href').split('previousBlogsPage=')[
                1]; // get page number of next or back
            var latestBlogsPage = $('#latestblogCurrentPage').val(); // also get current page no of previousBlog
            getBlogs(latestBlogsPage, previousBlogsPage);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crmgo\resources\views/frontend/blogs.blade.php ENDPATH**/ ?>