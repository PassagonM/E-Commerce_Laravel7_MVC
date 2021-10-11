<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="single-portfolio-area bg__white ">
            <div class="container">
                @foreach ($data as $row)
                    @if ($data->id = Auth::user()->id)
                    @php
                        $row->id = $data->id = Auth::user()->id;
                    @endphp
                    @endif
                @endforeach
                <div class="single-profile-card">
                    <div class="row">
                        <div class="col-md-4" align="center">
                            <div class="single-portfolio-img" style="padding: 30px 0;">
                                <img src="{{asset('/')}}/{{Auth::user()->user_image_path}}" alt="">

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="portfolio-description mrg-sm">
                                <div>
                                    <a class="col-md-10"></a>
                                    <a href="{{route('profile.edit',$row->id)}}" class="col-md-2" align="right" title="Edit Profile"><i class="ti-pencil"></i></a>
                                </div>
                                <h2>บัญชีของฉัน</h2>
                                <div class="portfolio-info">
                                    <ul>
                                        <li><span>คุณ : </span>{{Auth::user()->name}} {{Auth::user()->lastname}}</li>
                                        <li><span>อีเมล : </span>{{Auth::user()->email}}</li>
                                        <li><span>เบอร์โทร : </span>{{Auth::user()->tel}}</li>
                                        @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)
                                            <li><span>สถานะ : </span>Admin</li>
                                        @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
                                            <li><span>สถานะ : </span>สมาชิก</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="profile-address">
                                    <ul>
                                        <li><span>ที่อยู่ : </span>
                                            @if ($addboolean==false && $addboolean!=true)
                                                <a href="{{route('profile.show',$row->id)}}" align="right" title="Edit Profile">เพิ่มที่อยู่ของคุณ <i class="ti-pencil"></i></a>
                                            @elseif ($addboolean==true && $addboolean!=false)
                                                {{$addressstring->textaddress}}
                                                <br><a href="{{route('profile.show',$row->id)}}" align="center" title="Edit Profile">เพิ่มที่อยู่ของคุณ <i class="ti-pencil"></i></a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                @if ($usermenubar = 1041 && $usermenubar != 1042)
                                    <div class="wc-proceed-to-checkout" style="padding: 5px 0;">
                                        <a href="{{route('product.index')}}" class="btn">จัดการสินค้า</a>
                                        <a href="{{route('order.index')}}" class="btn">รายการสั่งซื้อจากลูกค้า ({{$toadmin}})</a>
                                        <a href="{{route('reviews.index')}}" class="btn">รีวิวจากลูกค้า</a>
                                    </div>
                                @elseif($usermenubar = 1042 && $usermenubar != 1041)
                                    <div class="portfolio-social">
                                        <ul>
                                            <li>Share: </li>
                                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
                                        </ul>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120 pt--40">
            <div class="container">
                <div class="tap-menu-detail">
                    @if ($usermenubarbut = 1041 && $usermenubarbut != 1042)
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <ul class="profile__tab mb--30" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#waitforcustomer" role="tab" data-toggle="tab">รอการยืนยันการรับสินค้าจากลูกค้า</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Order" role="tab" data-toggle="tab">ประวัติการสั่งซื้อทั้งหมด</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product__details__tab__content">
                                    <!-- ประสัติการสั่ง -->
                                    <div role="tabpanel" id="waitforcustomer" class="product__tab__content fade in active">
                                        <div class="product__description__wrap">
                                            <div class="product__desc">
                                                @include('profilemenubar.waitforcustomer')
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End ประสัติการสั่ง -->
                                    <!-- รอการยืนยันการรับสินค้า -->
                                    <div role="tabpanel" id="Order" class="product__tab__content fade">
                                        @include('profilemenubar.history_for_admin')
                                    </div>
                                    <!-- End รอการยืนยันการรับสินค้า -->
                                </div>
                            </div>
                        </div>
                    @elseif($usermenubarbut = 1042 && $usermenubarbut != 1041)
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <ul class="profile__tab mb--30" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#Order" role="tab" data-toggle="tab">ที่ต้องชำระ ({{$myorder}})</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Ordercheck" role="tab" data-toggle="tab">กำลังตรวจสอบ ({{$myordercheck}})</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Shipping" role="tab" data-toggle="tab">สิ่งที่ต้องได้รับ ({{$myshipping}})</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#History" role="tab" data-toggle="tab">ประวัติการสั่งซื้อ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product__details__tab__content">
                                    <!-- ที่ต้องชำระ -->
                                    <div role="tabpanel" id="Order" class="product__tab__content fade in active">
                                        <div class="product__description__wrap">
                                            <div class="product__desc">
                                                @include('profilemenubar.my_order')
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End ที่ต้องชำระ -->
                                    <!-- กำลังจัดส่ง -->
                                    <div role="tabpanel" id="Ordercheck" class="product__tab__content fade">
                                        @include('profilemenubar.ordercheck')
                                    </div>
                                    <!-- End กำลังจัดส่ง -->
                                    <!-- กำลังจัดส่ง -->
                                    <div role="tabpanel" id="Shipping" class="product__tab__content fade">
                                        @include('profilemenubar.shipping')
                                    </div>
                                    <!-- End กำลังจัดส่ง -->
                                    <!-- ประวัติการสั่งซื้อ -->
                                    <div role="tabpanel" id="History" class="product__tab__content fade">
                                        @include('profilemenubar.history')
                                    </div>
                                    <!-- End ประวัติการสั่งซื้อ -->
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @include('components.footerbar')
    </div>
</body>

</html>
