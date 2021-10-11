
<!doctype html>
<html class="no-js" lang="en">
<body>
    @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)
    @include('components.1navbar')
        <div class="wrapper fixed__footer">
            <div class="container">
                <div class="col-md-12" style="padding: 0px 0px 10px 0px;">
                    <h2>รายการสินค้า</h2>
                    <a href="/product/create" class="btn btn-primary my-2">เพิ่มสินค้า</a>
                </div>
                <div class="row" style="padding: 10px 0;">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">รายการสินค้า</th>
                                            <th class="product-thumbnail">ภาพสินค้า</th>
                                            <th class="product-name">&emsp;&emsp;ชื่อสินค้า &emsp;&emsp;</th>
                                            <th class="product-name">รายละเอียดสินค้า</th>
                                            <th class="product-quantity">เหลือ</th>
                                            <th class="product-price">ราคา</th>
                                            <th class="product-remove">แก้ไข</th>
                                            <th class="product-remove">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                        ?>
                                        @foreach ($data as $row)
                                        <tr>
                                            <td class="product-thumbnail">
                                                {{$i}}
                                            </td>
                                            <td class="product-thumbnail"><a href="{{route('viewall.show', $row)}}"><img src="{{asset('/')}}/{{$row->product_image}}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="{{route('viewall.show', $row)}}">{{$row->product_name}}</a></td>
                                            <td class="product-name"><a href="{{route('viewall.show', $row)}}">{{Str::limit($row->detail, 60)}}</a></td>

                                            <td class="product-quantity">{{$row->itemquantity}}</td>
                                            <td class="product-price"><span class="amount">{{$row->price}}</span></td>
                                            <td class="product-subtotal"><a href="{{route('product.edit',$row->id)}}" class="btn btn-warning">แก้ไข</a></td>
                                            <td class="product-subtotal">
                                                <form action="{{route('product.destroy',$row->id)}}" method="post">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="Del" data-customer_name="{{$row->customer_name}}" class="btn btn-danger deleteForm">
                                                </form>
                                            </td>
                                        </tr>
                                            <?php
                                                $i ++;
                                            ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            {{-- @include('components.footerbar') --}}
        </div>
    @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
    @endif
</body>

</html>
