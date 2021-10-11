<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="single-portfolio-area bg__white ">
            <div class="container">
                    <div class="single-profile-card">
                        <div class="row" style="margin:50px 0px 50px 0px;">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio-description mrg-sm">
                                    <h2>ทำการสั่งซื้อ</h2>
                                    <div class="portfolio-info">
                                        <h5>ที่อยู่สำหรับจัดส่ง</h5>
                                        <?php $addressinorder = null?>
                                        <ul>
                                            <li><span>คุณ </span>{{Auth::user()->name}} {{Auth::user()->lastname}}</li>
                                            <li><span>หมายเลขโทรศัพท์ : </span>{{Auth::user()->tel}}</li>
                                            <li><span>ที่อยู่จัดส่ง : </span>
                                                {{-- {{$useraddre[0]->textaddress}} --}}
                                                @if ($addbooleanhas==false && $addbooleanhas!=true)
                                                <a href="{{route('profile.show',Auth::user()->id)}}" align="right" title="Edit Profile">เพิ่มที่อยู่ของคุณ <i class="ti-pencil"></i></a>
                                                @elseif ($addbooleanhas==true && $addbooleanhas!=false)
                                                {{$useraddre->textaddress}}
                                                <?php $addressinorder = $useraddre->id?>
                                                <br><a href="{{route('profile.show',Auth::user()->id)}}" align="center" title="Edit Profile">ต้องการเปลี่ยนที่อยู่ <i class="ti-pencil"></i></a>
                                            @endif
                                            </li>
                                        </ul>
                                        <br>
                                        <h5>Muengthai Shop</h5><br>
                                        <?php
                                            $totalprice = 0;
                                            for($i=0;$i<$count;$i++){
                                        ?>
                                            @foreach ($testarray[$i]->user_productitem as $data_product)
                                                <div class="col-md-3">

                                                    <a href="#"><img src="{{asset('/')}}/{{$data_product->product_image}}" alt="product img" /></a>
                                                    <br>
                                                </div>
                                                <div class="col-md-9">
                                                    <ul>
                                                        <li><span>สินค้า : </span>{{Str::limit($data_product->product_name, 45)}}</li>
                                                        <li><span>รายละเอียด : </span>{{Str::limit($data_product->detail, 40)}}</li>
                                                        <li><span>ราคา : </span><?php echo number_format($data_product->price);?> ฿</li>
                                                    </ul>
                                                    <br>
                                                </div>
                                            @endforeach
                                        <?php
                                                $totalprice = $totalprice+$data_product->price;
                                            }
                                        ?>
                                    </div>
                                    <div align="right">
                                        <form id="makeorder" action="{{route('makeorder.store')}}" method="POST">
                                            @csrf
                                            <?php for($i=0;$i<$count;$i++){?>
                                                <input type="hidden"  name="basketidvalue[]" value="{{$basketid[$i]}}">
                                            <?php }?>
                                                <input type="hidden"  name="totalprice" value="{{$totalprice}}">
                                                <input type="hidden"  name="addressinorder" value="{{$addressinorder}}">
                                            <p>ยอดรวม : <?php echo number_format($totalprice);?> ฿</p>
                                            <div class="wc-proceed-to-checkout">
                                                {{-- <a href="{{route('makeorder.show',$basketid)}}" class="btn btn-success">ทำการสั่งซื้อ</a> --}}
                                                @if($addressinorder == null)
                                                    <button type="submit" class="btn checkaddressForm">ยืนยันการสั่งซื้อ</button>
                                                @elseif($addressinorder != null)
                                                    <button type="submit" form="makeorder" value="Submit" class="btn">ยืนยันการสั่งซื้อ</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @include('components.footerbar')
    </div>
</body>

</html>

