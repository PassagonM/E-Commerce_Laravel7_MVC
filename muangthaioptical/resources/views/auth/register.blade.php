<!doctype html>
<html class="no-js" lang="en">
<body>
    <div class="single-profile-card">
        <form class="login" method="POST" action="{{ route('register') }}">
            @csrf
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ชื่อ">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="นามสกุล">

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required pattern="[0]{1}[0-9]{9}" autocomplete="tel" placeholder="เบอร์โทรศัพท์ เช่น 0899999999">

                @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} เบอร์โทรศัพท์นี้ใช้ไปแล้ว</strong>
                    </span>
                @enderror

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="อีเมล เช่น Muangthai@gmail.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} อีเมลนี้ใช้ไปแล้ว</strong>
                    </span>
                @enderror

                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="new-username" placeholder="ชื่อผู้ใช้">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} ชื่อผู้ใช้ซ้ำกรุณาเปลี่ยนชื่อผู้ใช้ใหม่</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="รหัสผ่าน">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="ยืนยันรหัสผ่าน">


                <div class="htc__login__btn mt--30">
                    <button type="submit" class="btn btn-default btn-lg">
                        {{ __('Register') }}
                    </button>
                </div>
        </form>
    </div>
</body>

</html>
