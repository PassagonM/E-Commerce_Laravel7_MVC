<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <div class="body__overlay"></div>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('istemplate/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Muangthai Optical</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product__menu">
                                    <button class="is-checked">สินค้าที่เกี่ยวข้องกับ " {{$search_text}}"</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product MEnu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            @foreach ($productdata as $productdata)
                                <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <a href="{{route('viewall.show', $productdata)}}">
                                                    <img src="{{asset('/')}}/{{$productdata->product_image}}" alt="product images">
                                                </a>
                                            </div>
                                            <div class="product__hover__info">
                                                <ul class="product__action">
                                                    <li><a title="Quick View" href="{{route('viewall.show', $productdata)}}"><span class="ti-plus"></span></a></li>
                                                    <li><a title="Add TO Cart" href="{{route('basket.show', $productdata)}}"><span class="ti-shopping-cart"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="{{route('viewall.show', $productdata)}}">{{Str::limit($productdata->product_name, 30)}}</a></h2>
                                            <ul class="product__price">
                                                {{-- <li class="old__price">$16.00</li> --}}
                                                <li class="new__price">฿ {{ $productdata->price }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        {{-- @include('components.footerbar') --}}
    </div>
    <!-- Body main wrapper end -->
</body>

</html>
