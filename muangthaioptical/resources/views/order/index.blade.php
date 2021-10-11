<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)
        <div class="wrapper fixed__footer">
            <div class="cart-main-area ptb--120 bg__white">
                <div class="container">
                    <div style="margin: 10px 0px 30px 20px">
                        <h2>ตรวจสอบหลักฐานการชำระเงินจากลูกค้า</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-subtotal">ลำดับ</th>
                                                <th class="product-name">ลูกค้า : ชื่อ-เบอร์โทร</th>
                                                <th class="product-name-toadmin">ที่อยู่ปลายทาง</th>
                                                <th class="product-name-toadmin">รายการสินค้า</th>
                                                <th class="product-quantity">จำนวน</th>
                                                <th class="product-price">ราคารวม</th>
                                                <th class="product-thumbnail">หลักฐานการชำระเงิน</th>
                                                <th class="product-confirm-orderadmin">ยืนยันการชำระเงิน</th>
                                                <th class="product-confirm-orderadmin">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $n = 1;?>
                                            @foreach ($orderlist as $orderlist)
                                            <?php
                                                $listnamecount = count($orderlist->view_transaction);
                                                $savedata = $orderlist->view_transaction;
                                                $totalprice = 0;
                                                $iddel =$orderlist->id;
                                            ?>
                                                <tr>
                                                    <td class="product-subtotal">{{$n}}</td>
                                                    <td class="product-name">{{$orderlist->data_user->name}} - {{$orderlist->data_user->tel}}</td>
                                                    <td class="product-name-toadmin">{{$orderlist->order_to_address->textaddress}}</td>
                                                    <td class="product-name-toadmin">
                                                        <?php
                                                            for ($i=0;$i<$listnamecount;$i++){
                                                        ?>
                                                        <img src="{{asset('/')}}/{{$savedata[$i]->data_product->product_image}}" alt="product img" height="50px" width="50px"/>

                                                        <a href="{{route('viewall.show', $savedata[$i]->product_id)}}">
                                                            {{Str::limit($savedata[$i]->data_product->product_name, 15)}}({{$savedata[$i]->quantity}}) ({{$savedata[$i]->price}}฿)
                                                        </a><br>
                                                        <?php
                                                        $totalprice = $totalprice+$savedata[$i]->price;
                                                            }
                                                        ?>
                                                    </td>

                                                    <td class="product-quantity">{{$listnamecount}}</td>
                                                    <td class="product-price"><span class="amount"> {{$totalprice}}</span></td>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            {{-- <img src="{{asset('/')}}/{{$orderlist->slip_image_path}}" alt="product img" /> --}}
                                                            <img id="myImg" src="{{asset('/')}}/{{$orderlist->slip_image_path}}" alt="" style="width:60%;max-width:300px">
                                                            <div id="myModal" class="modal">
                                                                <span class="close">&times;</span>
                                                                <img class="modal-content" id="img01">
                                                                <div id="caption"></div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class="product-confirm-orderadmin">
                                                        <a href="{{route('makeorder.edit',$orderlist->id)}}" class="btn btn-danger" onclick="return confirm('กรุณาตรวจสอบความถูกต้องก่อนกดยืนยัน')">ยืนยันการชำระเงิน</a>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <form action="{{route('order.destroy',$orderlist->id)}}" method="post">
                                                            @csrf @method('DELETE')
                                                            <input type="submit" value="Del" data-customer_name="{{$orderlist->data_user->name}}" class="btn btn-danger deleteorder">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php $n++?>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
    @endif

</body>
<script>
    var modal = document.getElementById("myModal");

    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
      modal.style.display = "none";
    }
</script>
</html>
