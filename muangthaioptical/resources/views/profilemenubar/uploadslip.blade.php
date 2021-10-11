<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="single-portfolio-area bg__white ">
            <div class="container">
                <div class="single-profile-card">
                    <div class="row">
                        <div class="col-md-6" align="center">
                            <div class="slip-upload-img" style="padding: 70px 0;">
                                <img id="outputoutput" src="{{asset('istemplate/images/upload.jpg')}}" alt="">
                                {!! Form::open(['id'=>"uploadslip", 'action' => ['OrderController@update',$order->id],'method'=>'PUT' ,'files' => true]) !!}
                                    {!! Form::label('อัพโหลดหลักฐานการชำระเงิน') !!}
                                        <div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="form-group col-md-6" aria-readonly="true">
                                                {!! Form::file('file',  ["class"=>"form-control",'onchange'=>"loadFile(event)"]) !!}
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-description mrg-sm">
                                <h2>รายละเอียด</h2>
                                <div class="portfolio-info">
                                    <h5>Muengthai Shop</h5><br>
                                    <div class="col-md-12">
                                        <?php
                                            $orderprolist = $order->view_transaction;
                                            $totalprice = 0;
                                            for($product_array=0;$product_array<count($orderprolist);$product_array++){
                                        ?>
                                                <div class="col-md-2">
                                                    <a href="#"><img src="{{asset('/')}}/{{$orderprolist[$product_array]->data_product->product_image}}" alt="product img" /></a>
                                                    <br>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul>
                                                        <li><span>สินค้า : </span>{{Str::limit($orderprolist[$product_array]->data_product->product_name, 48)}}</li>
                                                        <li><span>ราคา : </span><?php echo number_format($orderprolist[$product_array]->price);?> ฿</li>
                                                    </ul>
                                                    <br>
                                                </div>
                                        <?php
                                            $totalprice = $totalprice+$orderprolist[$product_array]->price;
                                                    }
                                        ?>
                                    </div>
                                    <div class="portfolio-info">
                                        <h4>ข้อมูลการชำระเงิน</h4>
                                        <ul>
                                            <li><span>ไทยพาณิชย์ (SCB)</span></li>
                                            <li><span>ชื่อบัญชี: ร้านขายแว่นตาเมืองไทยการแว่นเชียงราย</span></li>
                                            <li><span>เลขที่บัญชี: 596 4323 469</span></li>
                                        </ul>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slip-submit">
                        <h3>ยอดรวม <?php echo number_format($totalprice);?> ฿</h3><br>
                        <input type="submit" value="ยืนยันการชำระเงิน" class="btn btn-primary" form="uploadslip">&nbsp;
                        <a href="/profile" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('components.footerbar') --}}
    </div>
</body>

<script>
    function loadFile(event){
        // alert('ok');
        // window.location.reload();
        var output = document.getElementById('outputoutput');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

</html>
