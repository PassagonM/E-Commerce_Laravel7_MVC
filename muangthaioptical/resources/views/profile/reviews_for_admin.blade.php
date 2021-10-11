<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)
        <div class="wrapper fixed__footer">
            <div class="cart-main-area ptb--90 bg__white">
                <div class="container">
                    <div class="reviewscard">
                        <div style="margin: 10px 0px 30px 20px">
                            <h2 style="margin: 0px 20px 0px 0px">รีวิวจากลูกค้า</h2>
                        </div>
                            <section class="htc__product__details__tab bg__white pb--120 pt--40">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <ul class="profile__tab mb--30" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#reviewsbycustomer" role="tab" data-toggle="tab">ความเห็นจากลูกค้า</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#replyreviwesbyadmin" role="tab" data-toggle="tab">ตอบกลับแล้ว</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product__details__tab__content">
                                                    <!-- ประสัติการสั่ง -->
                                                    <div role="tabpanel" id="reviewsbycustomer" class="product__tab__content fade in active">
                                                        <div class="product__description__wrap">
                                                            <div class="product__desc">
                                                                @foreach ($datareviews as $dataforreviews)
                                                                    <!-- Start Customer Review -->
                                                                    <div class="foradminreview">
                                                                        <div class="ctm_foradminreview">
                                                                            <div class="review__thumb">
                                                                                <img src="{{asset('/')}}/{{$dataforreviews->reviews_to_user->user_image_path}}" alt="review images">
                                                                            </div>
                                                                            <div class="review__details">
                                                                                <div class="review__info">
                                                                                    <h4><a href="#">{{$dataforreviews->reviews_to_user->name}}</a></h4>
                                                                                </div>
                                                                                <div class="review__date">
                                                                                    <span>{{$dataforreviews->created_at->format('d-m-Y H:i')}}</span>
                                                                                </div>
                                                                                <p>
                                                                                    {{$dataforreviews->message_Reviews}}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End Customer Review -->
                                                                    <div class="reviewforadmin__box">
                                                                        <div class="reviewforadmin__wrap">
                                                                            <h2 class="rating-title">ตอบกลับ</h2>
                                                                        </div>
                                                                        <form action="{{route('reviews.edit',$dataforreviews->id)}}" method="GET">
                                                                            @csrf
                                                                                <div class="reviewforadmin-box message">
                                                                                    {{-- <input type="hidden"  name="reply_reviews" value="{{$datareviews->id}}"> --}}
                                                                                    <textarea name="replyreviewtext" placeholder="พิมพ์ข้อความตอบกลับ"></textarea>
                                                                                </div>
                                                                                <div class="reviewforadmin-btn">
                                                                                    <button type="submit" value="Submit" class="fv-btn">ตอบกลับ</button>
                                                                                </div>

                                                                        </form>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End ประสัติการสั่ง -->
                                                    <!-- รอการยืนยันการรับสินค้า -->
                                                    <div role="tabpanel" id="replyreviwesbyadmin" class="product__tab__content fade">
                                                        <div class="product__desc">
                                                            @foreach ($datareply as $dataforreply)
                                                                <!-- Start Customer Review -->
                                                                <div class="replyforadminreview">
                                                                    <div class="ctm_replyforadminreview">
                                                                        <div class="review__thumb">
                                                                            <img src="{{asset('/')}}/{{$dataforreply->reviews_to_user->user_image_path}}" alt="review images">
                                                                        </div>
                                                                        <div class="review__details">
                                                                            <div class="review__info">
                                                                                <h4><a href="#">{{$dataforreply->reviews_to_user->name}}</a></h4>
                                                                            </div>
                                                                            <div class="review__date">
                                                                                <span>{{$dataforreply->created_at->format('d-m-Y H:i')}}</span>
                                                                            </div>
                                                                            <p>
                                                                                {{$dataforreply->message_Reviews}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End Customer Review -->
                                                                <!-- Start Reply Review -->
                                                                <div class="pro__review ans">
                                                                    <?php
                                                                        $datauser = $dataforreply->reply_byadmin;
                                                                    ?>
                                                                    <div class="review__thumb">
                                                                        <img src="{{asset('/')}}/{{$datauser->replyreviews_to_user->user_image_path}}" alt="review images">
                                                                    </div>
                                                                    <div class="review__details">
                                                                        <div class="review__info">

                                                                            <h4><a href="#">{{$datauser->replyreviews_to_user->name}} {{$datauser->replyreviews_to_user->lastname}}</a></h4>
                                                                            <ul class="rating">
                                                                            </ul>

                                                                        </div>
                                                                        <div class="review__date">
                                                                            <span>{{$dataforreply->reply_byadmin->created_at}}</span>
                                                                        </div>
                                                                        <p>{{$dataforreply->reply_byadmin->reply_reviews_message}}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- End Reply Review -->
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                    <!-- End รอการยืนยันการรับสินค้า -->
                                                </div>
                                            </div>
                                        </div>
                            </section>
                    </div>
                </div>
            </div>
            @include('components.footerbar')
        </div>
    @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
    @endif

</body>

</html>

