<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="single-portfolio-area bg__white ">
            <div class="container">
                <div class="single-profile-card">
                    <div class="row">
                        <div class="col-md-4" align="center">
                            <div class="single-portfolio-img" style="padding: 110px 0;">
                                <img id="outputoutput" src="{{asset('/')}}/{{Auth::user()->user_image_path}}" alt="">
                                {{-- <img id="outputoutput"/> --}}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="portfolio-description mrg-sm" style="margin: 30px 0px 0px 0px">
                                <div>
                                    <a class="col-md-12"></a>
                                </div>
                                <h2>บัญชีของฉัน</h2>
                                <div class="portfolio-info">
                                    {!! Form::open(['action' => ['ProfileController@update',$data->id],'method'=>'PUT' ,'files' => true]) !!}
                                        <div class="col-md-6" style="margin: 0px 0px 30px 0px">

                                            <div class="form-group" aria-readonly="true">
                                                {!! Form::hidden('username', $data->username, ["class"=>"form-control"]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('ชื่อ') !!}
                                                {!! Form::text('name', $data->name, ["class"=>"form-control"]) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('นามสกุล') !!}
                                                {!! Form::text('lastname', $data->lastname, ["class"=>"form-control"]) !!}
                                            </div>

                                            <div class="form-group" aria-readonly="true">
                                                {!! Form::label('เบอร์โทร') !!}
                                                {!! Form::text('tel', $data->tel, ["class"=>"form-control"]) !!}
                                            </div>

                                            <div class="form-group" aria-readonly="true">
                                                {!! Form::label('อีเมล') !!}
                                                {!! Form::text('email', $data->email, ["class"=>"form-control"]) !!}
                                            </div>

                                            <div class="form-group" aria-readonly="true">
                                                {!! Form::label('รูป') !!}
                                                {!! Form::file('file',  ["class"=>"form-control",'onchange'=>"loadFile(event)"]) !!}
                                            </div>

                                            <input type="submit" value="อัปเดต" class="btn btn-primary">
                                            <a href="/profile" class="btn btn-success">กลับ</a>
                                        </div>
                                    {!! Form::close() !!}
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
    function loadFile(event){
        var output = document.getElementById('outputoutput');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

</html>
