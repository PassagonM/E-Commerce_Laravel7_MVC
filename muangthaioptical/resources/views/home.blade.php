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
                            <div class="single-portfolio-img" style="padding: 30px 0;">
                            </div>
                        </div>
                        <div class="col-md-4" align="center">
                            <div class="portfolio-description-welcome mrg-sm">
                                <h2 style="margin: 60px 0px 0px 0px">เมืองไทยการแว่น</h2>
                                <h3>ยินดีต้อนรับ</h3>
                                <div class="portfolio-info" style="margin: 15px 0px 0px 0px">
                                    <ul>
                                        <li><span>คุณ : </span>{{Auth::user()->name}} {{Auth::user()->lastname}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div style="margin: 15px 0px 60px 0px">
                                <a href="{{url('/')}}" class="btn btn-success">เลือกชมสินค้า</a>
                                <a href="{{route('profile.index')}}" class="btn btn-warning">จัดการข้อมูลส่วนตัว</a>
                            </div>
                        </div>
                        <div class="col-md-4" align="center">
                            <div class="single-portfolio-img" style="padding: 30px 0;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footerbar')
    </div>
</body>

</html>
