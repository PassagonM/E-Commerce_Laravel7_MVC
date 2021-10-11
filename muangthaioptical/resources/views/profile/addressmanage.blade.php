<!doctype html>
<html class="no-js" lang="en">
<body>
    @include('components.1navbar')
    <div class="wrapper fixed__footer">
        <div class="single-portfolio-area bg__white ">
            <div class="container">
                <div class="single-profile-card">
                    <div class="row">
                        <div class="col-md-3" align="center">
                        </div>
                        <div class="col-md-6" align="center">
                            <div class="portfolio-description mrg-sm" style="margin: 30px 0px 0px 0px">
                                <h2>ที่อยู่ของฉัน</h2>
                                <?php
                                    $dataaddress = $useraddress->user_address;
                                    for($i=0; $i<count($dataaddress);$i++){
                                ?>
                                    <div class="portfolio-info edit-address-card">
                                        <div align="left">
                                            @if ($dataaddress[$i]->active==Auth::user()->address)
                                                {{-- <a href="{{route('del.address',$dataaddress[$i]->id)}}" class="col-md-12" align="right" title="Edit Profile"><i class="ti-trash"></i></a> --}}
                                                <p>{{Auth::user()->name}} {{Auth::user()->lastname}}</p>
                                                <p>{{Auth::user()->tel}}</p>
                                                <p>{{$dataaddress[$i]->textaddress}}</p>
                                                <a href="" class="col-md-12" align="right" title="Edit Profile">[เลือกใช้อยู่] <i class="ti-check"></i></a><br>
                                            @elseif ($dataaddress[$i]->active!=Auth::user()->address)
                                                <a href="{{route('del.address',$dataaddress[$i]->id)}}" class="col-md-12" align="right" title="Edit Profile"><i class="ti-trash"></i></a>
                                                <p>{{Auth::user()->name}} {{Auth::user()->lastname}}</p>
                                                <p>{{Auth::user()->tel}}</p>
                                                <p>{{$dataaddress[$i]->textaddress}}</p>
                                                <a href="{{route('check.address',$dataaddress[$i]->id)}}" class="col-md-12" align="right" title="Edit Profile"><i class="ti-check"></i></a><br>
                                            @endif
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                                <div class="review__box" style="margin: 0px 0px 30px 0px">
                                    <h2>เพิ่มที่อยู่ของฉัน</h2>
                                    <form id="addresssubmit" action="{{route('profile.store')}}" method="POST">
                                        @csrf
                                        <div class="single-review-form">
                                            <div class="review-box message">
                                                <textarea name="address" placeholder="ที่อยู่ของคุณ เช่น บ้านเลขที่, หมู่ที่, ตำบล, อำเภอ, จังหวัด, รหัสไปรษณีย์"></textarea>
                                            </div>
                                        </div>
                                            <button type="submit" form="addresssubmit" value="Submit" class="btn">บันทึกที่อยู่</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3" align="center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('components.footerbar') --}}
    </div>
</body>
</html>
