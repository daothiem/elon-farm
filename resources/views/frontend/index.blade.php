@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')

@endsection
@section('main-content')
    <!-- main-slider-start -->
        <section class="main-slider-four" id="home">
            <div class="main-slider-four__carousel trevlo-owl__carousel owl-carousel owl-theme" data-owl-options='{
		"items": 1,
		"margin": 0,
		"loop": true,
		"smartSpeed": 700,
		"animateOut": "fadeOut",
		"autoplayTimeout": 5000,
		"nav": true,
		"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": false,
		"autoplay": true
		}'>
                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-1.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">Elon Farm with love from Center highland</h3>
                                    <p class="main-slider-four__text mb-3">At Elon Farm, we blend the art of cultivating premium coffee with
                                         immersive farm-stay tours. Sip, stay, and savor the natural
                                         beauty of our vibrant farm</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>Explore Our Farm</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 1 -->
                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-2.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">Cultivating Quality, Harvesting Happiness</h3>
                                    <p class="main-slider-four__text mb-3">We believe that each coffee region offers a unique experience. Nestled in the fertile hills of Nam Ban at over 1000 meters above sea level, we produce Robusta coffee rich in flavor and tradition. With sustainable farming practices and a dedication to quality, we’re proud to share Vietnamese coffee from Nam Bạn with coffee lovers. Come and explore! </p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>Explore Our Farm</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 2 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-3.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">The Heart of Robusta Excellence</h3>
                                    <p class="main-slider-four__text mb-3">Discover the story behind our Robusta coffee. We love to share our coffee production process with you. Visit our farm to learn, experience, and enjoy the journey from bean to cup.  </p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>Explore Our Farm</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 3 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-4.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">Beyond Coffee: Live the Local Life</h3>
                                    <p class="main-slider-four__text mb-3">Visit our vibrant coffee farm and immerse yourself in the local culture. Not only will you experience our coffee, but you’ll also have the opportunity to explore the local culture through silk worm raising activities, visiting Linh An Pagoda, and viewing the majestic Elephant Waterfall.  </p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>Explore Our Farm</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 4 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-5.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">More Than a Tour—This is a Local Experience </h3>
                                    <p class="main-slider-four__text mb-3">At Elon Farm, we offer more than just a tour. Immerse yourself in Vietnam’s coffee heritage. Wander through our plantations, learn about local life alongside our coffee processing, and enjoy fresh brews. Join us for an experience where we share our knowledge and passion for coffee. </p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>Explore Our Farm</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 5 -->

            </div><!-- banner-slider -->
            <div class="banner-form banner-form--two banner-form--three wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <form class="banner-form__wrapper"
                      action="https://bracketweb.com/trevlo-html/tour-listing-top-search.html">
                    <div class="row m-0">
                        <div class="banner-form__col banner-form__col--1 margin-24">
                            <div class="banner-form__control banner-form__control--location d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/tour-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="location">Tour</label>
                                    <select name="location" class="selectpicker" id="location">
                                        <option value="">Select Tour</option>
                                        <option value="spain">Spain</option>
                                        <option value="africa">Africa</option>
                                        <option value="europe">Europe</option>
                                        <option value="thailand">Thailand</option>
                                        <option value="dubai">Dubai</option>
                                        <option value="swizerlan">Swizerlan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--2 margin-24">
                            <div class="banner-form__control d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/date-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="date">Preferred Tour Date</label>
                                        <input class="trevlo-multi-datepicker" id="date" type="text" name="date"
                                            placeholder="Select Date">
                                </div>
                                <span class="trevlo-one-icon-chevron-down banner-form__datepicker-icon position-relative"></span>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--3 banner-form__control--type margin-24">
                            <div class="banner-form__control d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/pax-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="guests">Pax</label>
                                    <input id="guests" type="number" value="2" name="guests" placeholder="2">
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="banner-form__qty-minus sub position-relative">
                                        <i class="icon-minus-3"></i>
                                    </button>
                                    <button class="banner-form__qty-plus add position-relative">
                                        <i class="icon-plus-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--4 margin-24">
                            <div class="banner-form__control d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/transport-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="type">Transportation</label>
                                    <select name="type" class="selectpicker" id="type">
                                        <option value="select">Yes</option>
                                        <option value="africa">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--5">
                            <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                                <span>Book Now @lang('translation.menu')</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- banner-form -->
        </section>
        <!-- main-slider-end -->

    <section class="about-six section-space">
        <div class="container">
            <div class="row gutter-y-50">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-six__image">
                        <div class="about-six__image__one">
                            <img src="assets/frontend/images/about/about-6-1.png" alt="about">
                        </div><!-- /.about-six__image__one -->
                        <div class="about-six__image__two">
                            <img src="assets/frontend/images/about/about-6-2.png" alt="about">
                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                                <i class="fas fa-play"></i>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div><!-- /.about-six__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-six__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">Our Story</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">We strive to elevate Vietnamese robusta coffee for global coffee lovers.</h2>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="about-six__text wow fadeInUp" data-wow-duration="1500ms">Located in the Vietnam Central Highlands at 1000m, we are Elon Farm - coffee producers with experience in elevating the taste of Robusta since 2017.</p>
                        <!-- /.about-six__text -->
                        <div class="about-six__inner d-flex flex-column align-items-center">
                            <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><img src="assets/frontend/images/about/coffee-icon.svg" alt="about"></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">Vietnam's Leadership in Robusta Coffee Production</h3>
                                    <p class="about-six__box__text">By refining processing methods, we enhance the flavor and commercial value of Robusta, creating high-quality products that elevate its market reputation.</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                            <div class="about-six__box wow fadeInUp mb-3" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><img src="assets/frontend/images/about/coffee-icon.svg" alt="about"></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">Connecting People to the Premium Potential of Robusta</h3>
                                    <p class="about-six__box__text">Through immersive agritourism experiences, we introduce high-quality Vietnamese Robusta to new audiences while rekindling appreciation among longtime fans. These efforts aim to showcase the unique qualities of Robusta and build deeper connections with coffee lovers worldwide.</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                            <a href="about.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base w-50">
                                <span>more about us</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.about-six__inner -->
                        <div class="about-six__bottom wow fadeInUp" data-wow-duration="1500ms">
                            <div class="about-six__phone">
                                <div class="about-six__phone__icon">
                                    <img src="assets/frontend/images/about/whapsapp-icon.svg" alt="about">
                                </div>
                                <div class="about-six__phone__text">
                                    <p class="about-six__phone__title">Chat on WhatsApp</p>
                                    <h4 class="about-six__phone__number"><a href="tel:+208-555-0112">(+84) 969285991</a>
                                    </h4>
                                </div>
                            </div><!-- /.about-six__phone -->
                            <div class="about-six__phone">
                                <div class="about-six__phone__icon">
                                    <img src="assets/frontend/images/about/zalo-icon.svg" alt="about">
                                </div>
                                <div class="about-six__phone__text">
                                    <p class="about-six__phone__title">Chat on Zalo</p>
                                    <h4 class="about-six__phone__number"><a href="tel:+208-555-0112">(+84) 397529379</a>
                                    </h4>
                                </div>
                            </div><!-- /.about-six__phone -->
                        </div><!-- /.about-five__bottom -->
                    </div><!-- /.about-six__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row gutter-y-40 -->
        </div><!-- /.container -->
        <img src="assets/frontend/images/shapes/about-mountain-6-1.png" alt="mountain" class="about-six__mountain">
        <img src="assets/frontend/images/shapes/about-parashoot-6-1.png" alt="mountain" class="about-six__parashoot">

        <section class="gallery-one gallery-one--home-two position-absolute w-100">
            <div class="container">
                <div class="gallery-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-carousel" data-owl-options='{
            "loop": true,
            "items": 5,
            "autoplay": true,
            "smartSpeed": 600,
            "nav": false,
            "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
            "dots": true,
            "margin": 10,
            "responsive": {
                "0": {
                    "items": 1
                },
                "576": {
                    "items": 2
                },
                "992": {
                    "items": 3
                },
                "1200": {
                    "items": 4
                },
                "1400": {
                    "items": 5
                }
            }
            }'>
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-1.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-2.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-3.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-4.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                </div>
            </div>
        </section>
    </section><!-- /.about-six section-space -->
    <section class="tab-one" id="adventure">
        <div class="tab-one__bg" style="background-image: url(assets/images/shapes/tab-bg-1.png);"></div>
        <div class="container">
            <div class="sec-title--two text-left d-flex mx-4 align-items-center pb-3 border-bottom">
                <div class="flex-fill">
                    <p class="sec-title__tagline">Our Story</p>
                    <h2 class="sec-title__title title-made-by">Made By Us</h2>
                </div>
                <a href="blog-details-right.html" class="h-fit-content ">
                    <span>Read more about our process</span>
                    <i class="trevlo-one-icon-up-right-arrow"></i>
                </a><!-- /.trevlo-btn -->
            </div><!-- /.sec-title -->
            <p class="about-six__box__text my-4">We are proud to offer high quality robusta coffee green beans from Vietnam. Our beans are grown in optimal conditions and processed with care to ensure the best flavor and aroma. Whether you are a roaster, a retailer, or a coffee lover, you will appreciate the excellence of our Robusta coffee green beans.</p>
            <div class="row tabs-box">
                <div class="col-xl-5 col-lg-5">
                    <ul class="list-unstyled tab-buttons tab-one__list">
                        <li data-tab="#tent_camping" class="tab-btn active-btn"><img src="assets/frontend/images/about/tab1-mbu.svg" alt="gallery" class="logo-img">Selection of Coffee Cherries</li>
                        <li data-tab="#adventure_travel" class="tab-btn"><img src="assets/frontend/images/about/tab2-mbu.svg" alt="gallery" class="logo-img">Natural Process</li>
                        <li data-tab="#mountain_biking" class="tab-btn"><img src="assets/frontend/images/about/tab3-mbu.svg" alt="gallery" class="logo-img">Full-Washed Process</li>
                        <li data-tab="#discovery_world" class="tab-btn"><img src="assets/frontend/images/about/tab4-mbu.svg" alt="gallery" class="logo-img">Honey Process</li>
                        <li data-tab="#fishing_swimming" class="tab-btn"><img src="assets/frontend/images/about/tab5-mbu.svg" alt="gallery" class="logo-img">Experimental Processes</li>
                        <li data-tab="#paragliding_tours" class="tab-btn"><img src="assets/frontend/images/about/tab6-mbu.svg" alt="gallery" class="logo-img">Final Drying and Quality Check</li>
                    </ul><!-- /.list-unstyledf -->
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tabs-content">
                        <div class="tab fadeInUp animated active-tab" id="tent_camping">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-1.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">1. Selection of Coffee Cherries</h4>
                                <p class="tab-one__content__text">
                                    We carefully handpick only ripe coffee cherries to ensure premium quality. After harvesting, the cherries are soaked to remove impurities such as broken fruit, twigs, and soil.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Ripeness checked by color</li>
                                    <li><span class="far fa-check-circle"></span>Impurities inspected post-soaking</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="adventure_travel">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-2.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">2. Natural Process</h4>
                                <p class="tab-one__content__text">
                                    Bold, naturally sweet, and low in acidity, our coffee is sun-dried in thin layers and carefully turned to enhance its vibrant flavors.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Sunlight Exposure Optimized</li>
                                    <li><span class="far fa-check-circle"></span>Drying monitored every hour</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="mountain_biking">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-3.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">3. Full-Washed Process</h4>
                                <p class="tab-one__content__text">
                                    Clean, bright, with light acidity, our coffee is fermented for 8 hours, washed, and dried to achieve pure, fruity flavors.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Fermentation time precisely tracked</li>
                                    <li><span class="far fa-check-circle"></span>Cleanliness checked post-washing</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="discovery_world">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-4.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">4. Honey Process</h4>
                                <p class="tab-one__content__text">
                                    Sweet, smooth, and balanced acidity, our coffee is de-pulped and dried with its mucilage intact, developing rich honey-like hues and complex flavors.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Ingredient ratios precisely calculated</li>
                                    <li><span class="far fa-check-circle"></span>Flavor testing pre- and post-process</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="fishing_swimming">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-5.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">5. Experimental Processes</h4>
                                <p class="tab-one__content__text">
                                    At Elon Farm, we embrace innovation by experimenting with fermentation techniques. By using ingredients such as pineapple juice or beer, we create coffee with diverse and unique flavor profiles, offering an exciting experience for coffee lovers.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Ingredient ratios precisely calculated</li>
                                    <li><span class="far fa-check-circle"></span>Consistency across batches ensured</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="paragliding_tours">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-6.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">6. Final Drying and Quality Check</h4>
                                <p class="tab-one__content__text">
                                    The beans are carefully dried under controlled conditions to maintain consistent quality. Once dried, they undergo a rigorous quality check to evaluate aroma and flavor, ensuring each batch aligns with our high standards.
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Moisture content precisely measured</li>
                                    <li><span class="far fa-check-circle"></span>Final flavor consistency verified</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="assets/frontend/images/shapes/coffee-background.svg" alt="mountain" class="about-six__coffee">
        <img src="assets/frontend/images/shapes/leaf-background.svg" alt="mountain" class="about-six__leaf">
    </section>
    <!-- tab-section-end -->

     <div class="blog-three section-space-top mb-5" id="blog">
        <div class="container">
            <div class="blog-three__top">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">Our Latest Blog</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Our Latest News</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="blog-three__button">
                            <a href="blog-details-right.html" class="h-fit-content ">
                                <span>View All Blogs</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.blog-three__button -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.blog-three__top -->
            <div class="row gutter-y-30">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="blog-three__card blog-three__card--one">
                        <div class="blog-three__card__image">
                            <img src="assets/frontend/images/about/tab-1-1.png" alt="tab">
                            <div class="blog-three__card__date">
                                <span class="blog-three__card__date__day">25</span>
                                <span class="blog-three__card__date__month">june</span>
                            </div>
                        </div><!-- /.blog-three__card__image -->
                        <div class="blog-three__card__content">
                            <ul class="list-unstyled blog-three__card__meta">
                                <li>
                                    <a href="#">
                                        <span class="blog-three__card__meta__icon">
                                            <i class="trevlo-one-icon-user"></i>
                                        </span>
                                        by Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="blog-three__card__meta__icon">
                                            <i class="trevlo-one-icon-comment"></i>
                                        </span>
                                        2 Comments
                                    </a>
                                </li>
                            </ul>
                            <h3 class="blog-three__card__title"><a href="blog-details-right.html">Collaboratively pontificate bleeding edge resources with inexpensive methodologies</a></h3><!-- /.blog-three__card__title -->
                        </div><!-- /.blog-three__card__content -->
                    </div><!-- /.blog-three__card -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="blog-three__inner">
                        <div class="blog-three__inner__card">
                            <div class="blog-three__card blog-three__card--two wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                                <div class="blog-three__card__image">
                                    <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                                </div><!-- /.blog-three__card__image -->
                                <div class="blog-three__card__content">
                                    <ul class="list-unstyled blog-three__card__meta">
                                        <li>
                                            <a href="#">
                                                <span class="blog-three__card__meta__icon">
                                                    <i class="trevlo-one-icon-user"></i>
                                                </span>
                                                by Admin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="blog-three__card__meta__icon">
                                                    <i class="trevlo-one-icon-comment"></i>
                                                </span>
                                                2 Comments
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="blog-three__card__title"><a href="blog-details-right.html">Copy And Paste From Stack Overflow Can You Put It Into</a></h3><!-- /.blog-three__card__title -->
                                    <div class="blog-three__card__date">
                                        <span class="blog-three__card__date__day">25</span>
                                        <span class="blog-three__card__date__month">june</span>
                                    </div>
                                </div><!-- /.blog-three__card__content -->
                            </div><!-- /.blog-three__card -->
                            <div class="blog-three__card blog-three__card--two wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                                <div class="blog-three__card__image">
                                    <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                                </div><!-- /.blog-three__card__image -->
                                <div class="blog-three__card__content">
                                    <ul class="list-unstyled blog-three__card__meta">
                                        <li>
                                            <a href="#">
                                                <span class="blog-three__card__meta__icon">
                                                    <i class="trevlo-one-icon-user"></i>
                                                </span>
                                                by Admin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="blog-three__card__meta__icon">
                                                    <i class="trevlo-one-icon-comment"></i>
                                                </span>
                                                2 Comments
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="blog-three__card__title"><a href="blog-details-right.html">Catching And Not Too Giant, Yet Drink From The Firehose</a></h3><!-- /.blog-three__card__title -->
                                    <div class="blog-three__card__date">
                                        <span class="blog-three__card__date__day">25</span>
                                        <span class="blog-three__card__date__month">june</span>
                                    </div>
                                </div><!-- /.blog-three__card__content -->
                            </div><!-- /.blog-three__card -->
                        </div><!-- /.blog-three__inner__card -->
                    </div><!-- /.blog-three__inner -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-three section-space-top -->

    <section class="testimonial-three section-space-bottom" id="testimonials">
        <div class="testimonial-three__bg" style="background-image: url(assets/images/shapes/testimonial-bg-3-1.png);">
        </div><!-- /.testimonial-three__bg -->
        <div class="container">
            <div class="sec-title sec-title--two text-center">

                <p class="sec-title__tagline">Our feedback</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">What Peoples Say About Elon Farm</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <!-- /.sec-title -->
            <div class="testimonial-three__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
        "items": 3,
        "margin": 30,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":false,
        "dots":true,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "responsive":{
            "0":{
                "items": 1
            },
            "768":{
                "items": 2
            },
            "1200":{
                "items": 3,
                "dots": false
            }
        }
        }'>
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Guy Hawkins</h5>
                                <p class="testimonials-card-three__identity__designation">managing director</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">travel agency Company also impressed us with their transpa regarding costs. The initial quote was</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Robert Fox</h5>
                                <p class="testimonials-card-three__identity__designation">Tourist</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">Flexible Classes refers to the process of acquiring is knowledge free or skills through the use</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Michael G. Ware</h5>
                                <p class="testimonials-card-three__identity__designation">Tourist</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">There are many variations of passages, but the majority have suffered alteradution in some form</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </section><!-- /.testimonial-three section-space-bottom -->

    <section class="why-choose-five section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="why-six__image__two mb-3">
                        <img src="assets/frontend/images/about/why-video.png" alt="about">
                        <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                            <i class="fas fa-play"></i>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="trevlo-accrodion why-choose-five__faq" data-grp-name="why-choose-five__faq">
                        <div class="accrodion active wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>How do I get to Elon Farm from the airport?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Elon Farm is approximately 30 km from Dalat Airport. You can take a taxi or arrange a private transfer through our team. The scenic drive takes about 45 minutes and offers beautiful views of the Central Highlands.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Can I participate in coffee activities all year round?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Yes, but the experience varies by season! During the harvest season (November to January), you can pick ripe coffee cherries. Outside of this period, you’ll still get to learn about coffee processing, roasting, and brewing.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Are meals or snacks provided during the tour?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Yes, we provide light snacks and coffee as part of the tour. For a full meal, you can enjoy authentic local dishes by arranging in advance. Let us know if you have any dietary restrictions or preferences!</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Are there any other activities besides coffee tours?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Yes! You can explore local attractions like Elephant Waterfall, Linh An Pagoda, and traditional silk-making villages. We also offer cycling trips and cooking classes with fresh, organic ingredients from the farm.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.why-choose-five__faq -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="why-choose-five__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">Get To Know Us</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Why You Should Choose <br> Elon Farm?</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="why-choose-five__text-box wow fadeInUp" data-wow-duration="1500ms">
                            <p class="why-choose-five__text">Elon Farm stands out for its innovative approach to agriculture, offering sustainable, high-quality products while integrating modern technology. Whether you’re looking for fresh, organic produce or customized agricultural solutions, Elon Farm provides expert services designed to enhance farming productivity and sustainability.</p><!-- /.why-choose-five__text -->
                        </div><!-- /.why-choose-five__text-box -->
                        <div class="why-choose-five__inner">
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">High-Quality Robusta Coffee</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">We are dedicated to producing premium Robusta coffee that challenges the stereotypes. Our beans are rich in flavor, sustainably grown, and crafted with care to deliver an unforgettable coffee experience.</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">Natural Beauty</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">Nestled in Lam Ha, our farm offers breathtaking views of rolling hills, lush plantations, and serene countryside landscapes. It’s the perfect escape for nature and coffee lovers alike.</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">Cultural Immersion</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">Our tours are not just about coffee—they’re about connecting with the local community. Learn about Vietnamese traditions, enjoy authentic dishes, and participate in activities like cycling and silk-making.</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">Commit to Sustainability</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">At Elon Farm, we prioritize eco-friendly practices and support local farmers. By choosing us, you’re contributing to sustainable coffee production and community development.</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                        </div><!-- /.why-choose-five__inner -->
                    </div><!-- /.why-choose-five__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.why-choose-five section-space -->

    <section class="why-choose-three">
        <div class="why-choose-three__bg" style="background-image: url(assets/images/shapes/why-choose-3-bg.png);"></div>
        <!-- /.why-choose__bg -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="why-choose-three__content">
                        <div class="sec-title text-left">
                            <p class="sec-title__tagline text-white">Our Tour</p><!-- /.sec-title__tagline -->
                            <h2 class="sec-title__title text-white">Elon Farm with love<br> from central highland</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <p class="why-choose-three__content__text text-white">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in
                            some form by injected humour, some form
                        </p>
                        <a href="about.html" class="trevlo-btn book-button">
                            <span>Book now</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a><!-- /.trevlo-btn -->
                    </div>
                </div>
                <div class="col-xl-6 wow slideInRight" data-wow-delay="200ms">
                    <div class="trevlo-stretch-element-inside-column">
                        <div class="why-choose-three__image">
                            <img src="assets/frontend/images/about/why-choose.png" alt="tab">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section><!-- /.why-choose-three -->
@endsection
@section('scripts')

@endsection
