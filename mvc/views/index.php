<div class="section-container">
    <div class="home-banner">
        <div class="slideshow-container">
            <div class="mySlides img-fade">
                <img src="./public/images/d9mrd0c-d95eeca4-1d26-491f-9002-d8167994077c.jpg">
                <!-- <div class="text">Caption Text</div> -->
            </div>

            <div class="mySlides img-fade">

                <img src="./public/images/banner-3.jpg">
                <!-- <div class="text">Caption Two</div> -->
            </div>

            <div class="mySlides img-fade">
                <img src="./public/images/Corsair-M65-RGB-Elite.jpg">
                <!-- <div class="text">Caption Three</div> -->
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");

                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex - 1].style.display = "block";
            }
        </script>
    </div>

</div> <!-- .page-section -->
<div class="achievement-container">
    <h2>Hoạt động đáng chú ý</h2>
    <div class="achieve-block">
        <div class="ach-1 wow fadeInDown">
            <h3 class="countfect" data-num="2"></h3>
            <p>Năm hoạt động</p>
        </div>
        <div class="ach-2 wow fadeInDown" data-wow-delay="0.2s">
            <h3 class="countfect" data-num="240"></h3>
            <p>Sản phẩm</p>
        </div>
        <div class="ach-3 wow fadeInDown" data-wow-delay="0.3s">
            <h3 class="countfect" data-num="1435"></h3>
            <p>Khách hàng hài lòng</p>
        </div>
        
    </div>
</div>

<div class="page-section" id="about">
    <div class="row align-items-center custom-about-section">
        <div class="wow fadeInUp about-content" style="text-align: justify;">
            <h1>CORGEAR</h1>
            <h2 class="title-section">Công ty phân phối sản phẩm Corsair hàng đầu Việt Nam</h2>
        </div>
        <!-- <div class="col-lg-6 py-3 wow fadeInRight">
                <div class="img-fluid py-3 text-center">
                    <img src="./public/img/about_frame.png" alt="">
                </div>
            </div> -->
    </div>

</div> <!-- .page-section -->

<div class="page-section bg-light">
    <div class="container">
        <!-- <div class="text-center wow fadeInUp">
            <div class="subhead">Dịch vụ</div>
            <h2 class="title-section">Dịch vụ</h2>
            <div class="divider mx-auto"></div>
        </div> -->

        <!-- <div class="row">
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"></span>
                    </div>
                    <h5>OnSite SEO</h5>
                    <p>We analyse your website's structure, internal architecture & other key</p>
                </div>
            </div>
        </div> -->

    </div> <!-- .container -->
</div> <!-- .page-section -->

<!-- <div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../../public/img/bg_pattern.svg);">
        <div class="container text-center">
            <div class="row justify-content-center wow fadeInUp">
                <div class="col-lg-8">
                    <h2 class="mb-4">Check your Website SEO</h2>
                    <form action="#">
                        <input type="text" class="form-control" placeholder="E.g google.com">
                        <button type="submit" class="btn btn-success">Check Now</button>
                    </form>
                </div>
            </div>
        </div> 
    </div> 
</div> -->

<!-- <div class="page-section">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">Pricing Plan</div>
            <h2 class="title-section">Choose plan the right for you</h2>
            <div class="divider mx-auto"></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing">
                    <div class="header">
                        <div class="pricing-type">Basic</div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>39<span class="suffix">.99</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>25 Analytics <span class="suffix">Campaign</span></p>
                        <p>1,300 Change <span class="suffix">Keywords</span></p>
                        <p>Social Media <span class="suffix">Reviews</span></p>
                        <p>1 Free <span class="suffix">Optimization</span></p>
                        <p>24/7 <span class="suffix">Support</span></p>
                    </div>
                    <div class="footer">
                        <a href="#" class="btn btn-pricing btn-block">Subscribe</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing marked">
                    <div class="header">
                        <div class="pricing-type">Standar</div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>59<span class="suffix">.99</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>25 Analytics <span class="suffix">Campaign</span></p>
                        <p>1,300 Change <span class="suffix">Keywords</span></p>
                        <p>Social Media <span class="suffix">Reviews</span></p>
                        <p>1 Free <span class="suffix">Optimization</span></p>
                        <p>24/7 <span class="suffix">Support</span></p>
                    </div>
                    <div class="footer">
                        <a href="#" class="btn btn-pricing btn-block">Subscribe</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing">
                    <div class="header">
                        <div class="pricing-type">Professional</div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>99<span class="suffix">.99</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>25 Analytics <span class="suffix">Campaign</span></p>
                        <p>1,300 Change <span class="suffix">Keywords</span></p>
                        <p>Social Media <span class="suffix">Reviews</span></p>
                        <p>1 Free <span class="suffix">Optimization</span></p>
                        <p>24/7 <span class="suffix">Support</span></p>
                    </div>
                    <div class="footer">
                        <a href="#" class="btn btn-pricing btn-block">Subscribe</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>  -->

<!-- Banner info -->
<div class="page-section banner-info">
    <div class="wrap bg-image wow fadeInUp" data-wow-delay="0.6s">
    </div> <!-- .wrap -->
</div> <!-- .page-section -->

<!-- Blog -->
<!-- <div class="page-section">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">Our Blog</div>
            <h2 class="title-section">Read Latest News</h2>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../../public/img/blog/blog-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../../public/img/blog/blog-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../../public/img/blog/blog-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="blog.html" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>
</div> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./public/js/slick.js"></script>