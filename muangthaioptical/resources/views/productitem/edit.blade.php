<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    @if (Auth::user()->status_user = 1041 && Auth::user()->status_user != 1042)

        <div class="container">
            @if ($errors->all())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>

                    @endforeach
                </ul>
            @endif
            <div class="wrapper fixed__footer">
                <div class="single-portfolio-area bg__white ">
                    <div class="container">
                        <div class="single-profile-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="portfolio-description mrg-sm">
                                        <div align="center">
                                            <a class="col-md-12"><h2>เพิ่มสินค้า</h2></a>
                                        </div>
                                        <div class="portfolio-info" align="right">
                                            {!! Form::open(['action' => ['ProductitemController@update',$data->id],'method'=>'PUT' ,'files' => true]) !!}
                                                <div class="col-md-12">

                                                    <div class="form-group" aria-readonly="true">
                                                        {!! Form::label('รูปภาพประกอบสินค้า') !!}
                                                        {!! Form::file('file',  ["class"=>"form-control",'onchange'=>"loadFile(event)"]) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('Product_Name') !!}
                                                        {!! Form::text('product_name', $data->product_name, ["class"=>"form-control"]) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('Detail') !!}
                                                        {!! Form::text('detail', $data->detail, ["class"=>"form-control"]) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('Quantity') !!}
                                                        {!! Form::text('itemquantity', $data->itemquantity, ["class"=>"form-control"]) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('Price') !!}
                                                        {!! Form::text('price', $data->price, ["class"=>"form-control"]) !!}
                                                    </div>

                                                    <input type="submit" value="อัปเดต" class="btn btn-primary">
                                                    <a href="/product" class="btn btn-success">กลับ</a>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" align="center">
                                    <div class="product-upload-img" style="padding: 70px 0;">
                                        <img id="outputoutput" src="{{asset('/')}}/{{$data->product_image}}" alt="">
                                        {{-- <img id="outputoutput"/> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif(Auth::user()->status_user = 1042 && Auth::user()->status_user != 1041)
        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
    @endif
        @include('components.footerbar')
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
