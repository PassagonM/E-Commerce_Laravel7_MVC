<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.welcomenavbar')
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-container">
                                        <form action="{{ url('/search')}}">
                                            <ul class="menu-extra">
                                                <li><input type="text" placeholder="ค้นหาสินค้า ... " name="search"></li>
                                                <li><button type="submit"><span class="ti-search"></span></button></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url({{asset('istemplate/images/slider/bg/test1.png')}}) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>New Product <span class="text--theme">Collection</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="cart.html">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url({{asset('istemplate/images/slider/bg/2.png')}}) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>New Product <span class="text--theme">Collection</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="cart.html">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                            </div>
                        </div>
                        <!-- Start Slider Area -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                        <div class="categories-menu mrg-xs">
                            <div class="category-heading">
                                <h3> Browse Categories</h3>
                            </div>
                            <div class="category-menu-list">
                                <ul>
                                    <li>
                                        <a href="#"><img alt="" src="{{asset('istemplate/images/icons/thum2.png')}}"> Women’s Fashion <i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src="{{asset('istemplate/images/icons/thum3.png')}}"> Man Fashion <i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src="{{asset('istemplate/images/icons/thum4.png')}}"> Computer & Office<i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Sunglasses <i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Eyeglasses <i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Brand <i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Plastic Frame</a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Metal Frame</a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Aluminum Frame</a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Lens & Glass</a>
                                    </li>
                                    <li>
                                        <a href="#"><img alt="" src=""> Lens Blue Block</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Left Feature -->
                </div>
            </div>
        </section>
        <!-- End Feature Product -->

        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product__menu">
                                    <button data-filter="*"  class="is-checked">All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product MEnu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            @foreach ($productshow->take(4) as $data)
                                <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <a href="{{route('viewall.show', $data)}}">
                                                    <img src="{{asset('/')}}/{{$data->product_image}}" alt="product images">
                                                </a>
                                            </div>
                                            <div class="product__hover__info">
                                                <ul class="product__action">
                                                    <li><a title="Quick View" href="{{route('viewall.show', $data)}}"><span class="ti-plus"></span></a></li>
                                                    <li><a title="Add TO Cart" href="{{route('basket.show', $data)}}"><span class="ti-shopping-cart"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="{{route('viewall.show', $data)}}">{{Str::limit($data->product_name, 30)}}</a></h2>
                                            <ul class="product__price">
                                                {{-- <li class="old__price">$16.00</li> --}}
                                                <li class="new__price">฿ <?php echo number_format($data->price);?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Start Load More BTn -->
                    <div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                <a href="{{route('viewall.index')}}">load more</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Load More BTn -->
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <!-- Start Blog Area -->
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">ข่าวสารล่าสุด</h2>
                            <p>ข่าวสารเกี่ยวกับโปรโมชั่นเพิ่มเติม <br> ข้อมูลรายละเอียดเกี่ยวกับแว่นตารวมถึงชนิดของเลนส์แว่นตา</p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('istemplate/images/blog/blog-img/news.jpg')}}" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('istemplate/images/blog/blog-img/news.jpg')}}" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('istemplate/images/blog/blog-img/news.jpg')}}" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->
        @include('components.footerbar')
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->
</body>

