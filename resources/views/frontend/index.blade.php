@extends('frontend.master')
@section('home')



@include('frontend.home.hero_area')

<!--================================
        END HERO AREA
=================================-->

<!--======================================
        START FEATURE AREA
 ======================================-->

@include('frontend.home.feature_area')

<!--======================================
       END FEATURE AREA
======================================-->

<!--======================================
        START CATEGORY AREA
======================================-->

@include('frontend.home.category_area')
<!--======================================
        END CATEGORY AREA
======================================-->

<!--======================================
        START COURSE AREA
======================================-->

@include('frontend.home.courses_area')
<!--======================================
        END COURSE AREA
======================================-->

<!--======================================
        START COURSE AREA
======================================-->

@include('frontend.home.courses_area_tow')
<!--======================================
        END COURSE AREA
======================================-->

<!-- ================================
       START FUNFACT AREA
================================= -->

@include('frontend.home.funfact')
<!-- ================================
       START FUNFACT AREA
================================= -->

<!--======================================
        START CTA AREA
======================================-->

@include('frontend.home.cta_area')
<!--======================================
        END CTA AREA
======================================-->

<!--================================
         START TESTIMONIAL AREA
=================================-->

@include('frontend.home.testimonial_area')
<!--================================
        END TESTIMONIAL AREA
=================================-->

<div class="section-block"></div>

<!--======================================
        START ABOUT AREA
======================================-->

@include('frontend.home.about_area')
<!--======================================
        END ABOUT AREA
======================================-->

<div class="section-block"></div>

<!--======================================
        START REGISTER AREA
======================================-->


@include('frontend.home.register_area')
<!--======================================
        END REGISTER AREA
======================================-->

<div class="section-block"></div>

<!-- ================================
       START CLIENT-LOGO AREA
================================= -->


@include('frontend.home.client-logo-area')
<!-- ================================
       START CLIENT-LOGO AREA
================================= -->

<!-- ================================
       START BLOG AREA@in
================================= -->

@include('frontend.home.blog_area')
<!-- ================================
       START BLOG AREA
================================= -->

<!--======================================
        START GET STARTED AREA
======================================-->

<!-- ================================
       START GET STARTED AREA
================================= -->
@include('frontend.home.get_started_rea')

<!--======================================
        START SUBSCRIBER AREA
======================================-->
<section class="subscriber-area pt-60px pb-60px bg-gray position-relative overflow-hidden">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-heading py-4">
                    <h5 class="ribbon ribbon-lg mb-2">Newsletter</h5>
                    <h2 class="section__title mb-1">Subscribe to newsletter</h2>
                    <p class="section__desc">Stay in the know on new free e-book</p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
            <div class="col-lg-5 ml-auto">
                <form method="post" class="subscriber-form">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control form--control pl-3" placeholder="Enter email address">
                        <div class="input-group-append">
                            <button class="btn theme-btn" type="button">Subscribe <i class="la la-arrow-right icon ml-1"></i></button>
                        </div>
                    </div>
                    <p class="fs-14 mt-1">
                        <i class="la la-lock mr-1"></i>Your information is safe with us! unsubscribe anytime.
                    </p>
                </form>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end subscriber-area -->

<!--======================================


        END SUBSCRIBER AREA
======================================-->
@endsection
