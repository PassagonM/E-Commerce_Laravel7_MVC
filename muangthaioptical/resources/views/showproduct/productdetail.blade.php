<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <div class="body__overlay"></div>
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist">

                            </ul>
                            <!-- End Small images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                        <img src="{{asset('/')}}/{{$thisproduct->product_image}}" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-2">
                                        <img src="{{asset('istemplate/images/product-details/big-img/200.png')}}" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-3">
                                        <img src="{{asset('istemplate/images/product-details/big-img/300.png')}}" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-4">
                                        <img src="{{asset('istemplate/images/product-details/big-img/400.png')}}" alt="full-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>{{ $thisproduct->product_name }}</h2>
                            </div>
                            <div class="pro__dtl__rating">

                            </div>
                            <div class="pro__details">
                            </div>
                            <ul class="pro__dtl__prize">
                                <li class="old__prize"></li>
                                <li>฿ <?php echo number_format($thisproduct->price);?></li>
                            </ul>

                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>มีสินค้าทั้งหมด : </span></div>
                                <div class="product-quantity">
                                    {{ $thisproduct->itemquantity}}
                                </div>
                                <div class="prodict-statas"><span>&nbsp;&nbsp;ชิ้น</span></div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn"><a href="{{route('basket.show', $thisproduct)}}">ซื้อเลย</a></li>
                                <li><a href="#"><span class="ti-heart"></span></a></li>
                                <li><a href="#"><span class="ti-email"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">รายละเอียดสินค้า</a>
                            </li>
                            <li role="presentation">
                                <a href="#reviews" role="tab" data-toggle="tab">ความคิดเห็น</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">

                            <!-- Start Single Details -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">รายละเอียดสินค้า</h2>
                                        <p>{{$thisproduct->detail}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Details -->

                            <!-- Start Review -->
                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner" style="border-bottom: 1px solid #e5e5e5; ">

                                    <!-- Start Customer Review -->
                                    <?php
                                        for($i=0; $i<$cont_datareview; $i++){
                                            // dd($datareview[$i]->reply_byadmin);
                                    ?>
                                        <div class="pro__review">
                                            <div class="ctm_pro__review">
                                                <div class="review__thumb">
                                                    <img src="{{asset('/')}}/{{$datareview[$i]->reviews_to_user->user_image_path}}" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <div class="review__info">
                                                        <h4><a>{{$datareview[$i]->reviews_to_user->name}} {{$datareview[$i]->reviews_to_user->lastname}}</a></h4>
                                                    </div>
                                                    <div class="review__date">
                                                        <span>{{$datareview[$i]->created_at->format('d-m-Y H:i')}}</span>
                                                    </div>
                                                    <p>
                                                        {{$datareview[$i]->message_Reviews}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Start Reply Review -->
                                        <?php
                                            $checkreply[$i] = $datareview[$i]->ansbyadmin;
                                            if($checkreply[$i] == 0 && $checkreply[$i] != 10){
                                                // dd($checkreply[$i]);
                                            } elseif ($checkreply[$i] == 10 && $checkreply[$i] != 0) {
                                                $datauser[$i] = $datareview[$i]->reply_byadmin;
                                        ?>
                                        <div style="border-bottom: 1px solid #e5e5e5;">
                                            <div class="pro__review ans" style="margin: 0px 0px 10px 160px;">

                                                <div class="review__thumb">
                                                    <img src="{{asset('/')}}/{{$datauser[$i]->replyreviews_to_user->user_image_path}}" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <div class="review__info">

                                                        <h4><a>{{$datauser[$i]->replyreviews_to_user->name}} {{$datauser[$i]->replyreviews_to_user->lastname}}</a></h4>
                                                        <ul class="rating">

                                                        </ul>

                                                    </div>
                                                    <div class="review__date">
                                                        <span>{{$datareview[$i]->reply_byadmin->created_at->format('d-m-Y H:i')}}</span>
                                                    </div>
                                                    <p>{{$datareview[$i]->reply_byadmin->reply_reviews_message}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            }
                                        ?>

                                        <!-- End Reply Review -->

                                    <?php
                                        }
                                    ?>
                                    <!-- End Customer Review -->


                                </div>
                                @guest
                                    <div class="review__box">
                                        <div class="reviewforadmin__wrap">
                                            <h2 class="rating-title">แสดงความคิดเห็น</h2>
                                        </div>
                                        <form id="reviewsubmit" action="{{route('reviews.show',$thisproduct->id)}}" method="GET">
                                            @csrf
                                            <div class="single-review-form">
                                                <div class="review-box message">
                                                    <textarea name="reviewtext" placeholder="แสดงความคิดเห็นของคุณ"></textarea>
                                                </div>
                                            </div>
                                            <div class="review-btn">
                                                <button type="submit" form="reviewsubmit" value="Submit" class="fv-btn">ส่งรีวิวของคุณ</button>
                                            </div>

                                        </form>
                                    </div>
                                @else
                                    @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)
                                        {{-- ไม่แสดงในadmin --}}
                                    @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
                                        <div class="review__box">
                                            <div class="reviewforadmin__wrap">
                                                <h2 class="rating-title">แสดงความคิดเห็น</h2>
                                            </div>
                                            <form id="reviewsubmit" action="{{route('reviews.show',$thisproduct->id)}}" method="GET">
                                                @csrf
                                                <div class="single-review-form">
                                                    <div class="review-box message">
                                                        <textarea name="reviewtext" placeholder="แสดงความคิดเห็นของคุณ"></textarea>
                                                    </div>
                                                </div>
                                                <div class="review-btn">
                                                    <button type="submit" form="reviewsubmit" value="Submit" class="fv-btn">ส่งรีวิวของคุณ</button>
                                                </div>

                                            </form>
                                        </div>
                                    @endif
                                @endguest

                            </div>
                            <!-- End Review -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product tab -->
        @include('components.footerbar')
    </div>
    <!-- Body main wrapper end -->
</body>

</html>
