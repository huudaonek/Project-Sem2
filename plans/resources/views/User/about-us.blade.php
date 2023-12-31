@extends('layout.master')
@section('body')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>About Us</h3>
                        <li>about us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--about section area -->
<section class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure>
                    <div class="about_thumb">
                        <img src="https://images.pexels.com/photos/7070/space-desk-workspace-coworking.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1
" alt="">
                    </div>
                    <figcaption class="about_content">
                        <h1>We are a digital agency focused on delivering content and utility user-experiences.</h1>
                        <p>Adipiscing lacus ut elementum, nec duis, tempor litora turpis dapibus. Imperdiet cursus
                            odio tortor in elementum. Egestas nunc eleifend feugiat lectus laoreet, vel nunc taciti
                            integer cras. Hac pede dis, praesent nibh ac dui mauris sit. Pellentesque mi, facilisi
                            mauris, elit sociis leo sodales accumsan. Iaculis ac fringilla torquent lorem
                            consectetuer, sociosqu phasellus risus urna aliquam, ornare.</p>
                        <div class="about_signature">
                            <img src="front/assets/img/about/about-us-signature.png" alt="">
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
<!--about section end-->

<!--chose us area start-->
<div class="choseus_area" data-bgimg="front/assets/img/about/about-us-policy-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="front/assets/img/about/About_icon1.png" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>Creative Design</h3>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                            velit amet</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="front/assets/img/about/About_icon2.png" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>100% Money Back Guarantee</h3>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                            velit amet</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single_chose">
                    <div class="chose_icone">
                        <img src="front/assets/img/about/About_icon3.png" alt="">
                    </div>
                    <div class="chose_content">
                        <h3>Online Support 24/7</h3>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                            velit amet</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--chose us area end-->

<!--services img area-->
<div class="about_gallery_section">
    <div class="container">
        <div class="about_gallery_container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="front/assets/img/about/about2.jpg" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>What do we do?</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="front/assets/img/about/about3.jpg" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>Our Mission</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="front/assets/img/about/about4.jpg" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>History Of Us</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<!--services img end-->

<!--brand area start-->
@endsection
