<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <h2>ตะกร้า : {{ Auth::user()->name }}</h2><br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">เลือก</th>
                                            <th class="product-thumbnail">รูปภาพ</th>
                                            <th class="product-name">สินค้า</th>
                                            <th class="product-price">ราคา</th>
                                            <th class="product-quantity">จำนวน</th>
                                            <th class="product-subtotal">รวม</th>
                                            <th class="product-remove">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <form id="selectitem" action="{{route('order.store')}}" method="POST">
                                            @csrf --}}
                                        {!! Form::open(['id'=>"selectitem",'action' => 'OrderController@store','method'=>'POST']) !!}
                                        @foreach ($data as $data)
                                            @foreach ($data->user_productitem as $user_productitem)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <input type="checkbox" name="basketvalue[]" value="{{$data->id}}"><br/>
                                                </td>
                                                <td class="product-thumbnail"><a href="#"><img src="{{asset('/')}}/{{$user_productitem->product_image}}" alt="product img" /></a></td>
                                                <td class="product-name"><a href="#">{{$user_productitem->product_name}}</a></td>
                                                <td class="product-price"><span class="amount"><?php echo number_format($user_productitem->price);?></span></td>
                                                <td class="product-quantity"><input type="number" value="1" /></td>
                                                <td class="product-subtotal"><?php echo number_format($user_productitem->price);?></td>
                                                <td>
                                                    {{-- <form id="deleteitem" action="{{route('basket.destroy',$data->id)}}" method="post">
                                                             @csrf @method('DELETE')
                                                        <input type="submit" value="Del" data-customer_name="{{$data->user_basket->name}}" class="btn btn-danger deleteForm" form="deleteitem">
                                                    </form> --}}
                                                    <a href="javascript::void(0)" onclick="deleteitembasket({{$data->id}})" class="btn btn-danger">ลบ</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                        {{-- </form> --}}
                                        {!! Form::close() !!}
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <table>
                                            <tbody>
                                                <tr class="shipping">
                                                    <th></th>
                                                    <td>
                                                        {{-- <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p> --}}
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    {{-- <th>Total</th> --}}
                                                    <td>
                                                        {{-- <strong><span class="amount">£215.00</span></strong> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <button type="submit" form="selectitem" value="Submit" class="btn">สั่งซื้อสินค้า</button>
                                        </div>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('components.footerbar') --}}
    </div>
</body>

<script>
    function deleteitembasket(id)
    {
        $.ajax({
            url:'/basketitem/' +id,
            type : 'DELETE',
            data:{
                _token:$("input[name=_token]").val()
            },
        })
        window.location.reload();
    }
</script>

</html>
