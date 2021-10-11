<?php
    $my_id = \Illuminate\Support\Facades\Auth::id();
    $myorder = \App\orderlist::where('user_id', $my_id)
    ->where('orderstatus', 8829)
    ->get();
    if(count($myorder)!=0){
        for($n=0;$n<count($myorder);$n++){
            $countsaction[$n] = count($myorder[$n]->view_transaction);
            $test[$n] = $myorder[$n]->view_transaction;
        }
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<body>
    <div class="container">
        <h2 class="title__6">ประวัติการสั่งซื้อ</h2>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-subtotal">ลำดับ</th>
                                    <th class="product-name">สินค้า</th>
                                    <th class="product-price">จำนวน</th>
                                    <th class="product-price">ที่อยู่</th>
                                    <th class="product-subtotal">สถานะ</th>
                                    <th class="product-quantity">วันเวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; $numcheck=0;?>
                                @foreach ($myorder as $myorder)
                                    <tr>
                                        <td class="product-subtotal">{{$i}}</td>
                                        <td class="product-name">
                                            <?php
                                                for($product_array=0;$product_array<$countsaction[$numcheck];$product_array++){
                                            ?>
                                                    <img src="{{asset('/')}}/{{$test[$numcheck][$product_array]->data_product->product_image}}" alt="product img" height="50px" width="50px"/>
                                                    <a>
                                                        {{Str::limit($test[$numcheck][$product_array]->data_product->product_name, 24)}}
                                                    </a><br>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="product-price"><span class="amount"> {{$countsaction[$numcheck]}} </span></td>
                                        <td class="product-address"><a>{{$myorder->order_to_address->textaddress}}</a></td>
                                        <td class="product-subtotal">เสร็จสิ้น</td>
                                        <td class="product-quantity">{{$myorder->updated_at->format('d-m-Y H:i')}}</td>
                                    </tr>
                                    <?php $i++; $numcheck++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

