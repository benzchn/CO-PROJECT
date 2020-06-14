@extends('layouts.app-register')

@section('body')
<div class="content">
    <!-- Nav pills -->
    <div style="display: flex;justify-content: center;align-items: center;margin-top:20px;">
        <img class="logo" src="{{ asset('images/cs_logo.png') }}" width="400px" alt="AVATAR">
    </div>
    <div class="form">
        <h2 class="title" style="text-align:center;color:white;">{{ isset($url) ? ucwords($url) : ""}}
            <!-- <img src="https://image.flaticon.com/icons/svg/1597/1597110.svg" width="10%"> -->
            สมัครสมาชิก
            <!-- <img src="https://image.flaticon.com/icons/svg/1651/1651586.svg" width="10%"></i> -->
        </h2>
        <!-- <label style="display: flex;justify-content: center;align-items: center; color:#ffffff;">
                    ------------------------ </label> -->
    </div>
    <br>
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#regisTeach">สำหรับบุคลากร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#regisStd">สำหรับนักศึกษา</a>
        </li>
    </ul>


    <!-- Tab panes -->
    <div class="tab-content">

        <div id="regisTeach" class="container tab-pane active">

            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- @method('PUT') --}}

                <div class="form-group">
                    <label for="email">{{ __('อีเมล *') }}</label>&nbsp;<span class="badge badge-info"
                        style="font-weight:normal;">(ใช้ @kku.ac.th เท่านั้น)</span>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="user@kku.ac.th" required
                            autocomplete="email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                        <div class="input-group-append">
                            <span class="input-group-text">@kku.ac.th</span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('รหัสผ่าน *') }}</label>
                    &nbsp;<span class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9
                        จำนวน 6-10 ตัวเท่านั้น)</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" pattern="[A-Za-z0-9]{6,10}" name="password" required maxlength="10"
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('ยืนยันรหัสผ่าน *') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Password Confirm" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="name">{{ __('ชื่อ - นามสกุล *') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required placeholder="Full Name" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('เบอร์โทรศัพท์ *') }}</label>
                    &nbsp;<span class="badge badge-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone') }}" placeholder="091xxxxxxx" required autocomplete="phone" maxlength="10"
                        OnKeyPress="return chkNumber(this)">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <input type="hidden" name="role" id="role" value="personal">
                <input type="hidden" name="user_status" id="user_status" value="0">

                <a href="/home" class="btn btn-warning" role="button" aria-pressed="true"><img
                        src="https://image.flaticon.com/icons/svg/709/709606.svg" width="15px">&nbsp;ไปเข้าสู่ระบบ</a>

                <button type="submit" class="btn btn-primary">
                    {{ __('ลงทะเบียน') }}
                </button>


            </form>
        </div>

        <div id="regisStd" class="container tab-pane fade">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="user_id">{{ __('รหัสนักศึกษา *') }}</label>
                    &nbsp;<span class="badge badge-info" style="font-weight:normal;">(ตัวอย่าง: 60302xxxx-x
                        *ใส่ขีดด้วย*)</span>
                    <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                        name="user_id" value="{{ old('user_id') }}" OnInput="add_hyphen()" maxlength="11"
                        OnKeyPress="return chkNumber(this)" pattern="[0-9]{8,8}.[-].[0-9]{0,0}"
                        placeholder="60302xxxx-x" required autocomplete="user_id" autofocus>

                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('รหัสผ่าน *') }}</label>
                    &nbsp;<span class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9
                        จำนวน 6-10 ตัวเท่านั้น)</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" pattern="[A-Za-z0-9]{6,10}" name="password" required maxlength="10"
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('ยืนยันรหัสผ่าน *') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Password Confirm" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="name">{{ __('ชื่อ - นามสกุล *') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required placeholder="Full Name" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('อีเมล *') }}</label>&nbsp;<span class="badge badge-info"
                        style="font-weight:normal;">(ใช้ @kkumail.com เท่านั้น)</span>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="user@kkumail.com" required
                            autocomplete="email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                        <div class="input-group-append">
                            <span class="input-group-text">@kkumail.com</span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="phone">{{ __('เบอร์โทรศัพท์ *') }}</label>
                    &nbsp;<span class="badge badge-info" style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone') }}" placeholder="091xxxxxxx" required autocomplete="phone"
                        OnKeyPress="return chkNumber(this)" maxlength="10">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="degree">{{ __('ระดับปริญญา *') }}</label>
                        {{-- <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}"
                        placeholder="091xxxxxxx" required autocomplete="degree"> --}}
                        <select name="degree" id="degree" class="form-control @error('degree') is-invalid @enderror"
                            required>
                            <option value="" disabled="disabled" selected>..กรุณาเลือก..
                            </option>
                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                            <option value="ปริญญาโท">ปริญญาโท</option>
                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                        </select>

                        @error('degree')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="department">{{ __('หลักสูตร *') }}</label>
                        {{-- <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"
                        placeholder="091xxxxxxx" required autocomplete="department"> --}}
                        <select name="department" id="department"
                            class="form-control @error('department') is-invalid @enderror" required>
                            <option value="" disabled="disabled" selected>..กรุณาเลือก..
                            </option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนยีสารสนเทศ">เทคโนยีสารสนเทศ</option>
                            <option value="ภูมิศาสตร์สารสนเทศ">ภูมิศาสตร์สารสนเทศ</option>
                        </select>

                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="col_year">{{ __('ชั้นปีที่ *') }}</label>
                        <input id="col_year" type="text" class="form-control @error('col_year') is-invalid @enderror"
                            name="col_year" value="{{ old('col_year') }}" placeholder="ชั้นปีที่" required
                            OnKeyPress="return chkNumber1(this)" autocomplete="col_year">

                        @error('col_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="hidden" name="role" id="role" value="student">
                    <input type="hidden" name="user_status" id="user_status" value="0">
                </div>

                <a href="/home" class="btn btn-warning" role="button" aria-pressed="true"><img
                        src="https://image.flaticon.com/icons/svg/709/709606.svg" width="15px">&nbsp;ไปเข้าสู่ระบบ</a>

                <button type="submit" class="btn btn-primary">
                    {{ __('ลงทะเบียน') }}
                </button>


            </form>
        </div>
    </div>
</div>





<script language="JavaScript">
    function add_hyphen() {
        var input = document.getElementById("user_id");
        var str = input.value;
        str = str.replace("-", "");
        if (str.length > 9) {
            str = str.substring(0, 9) + "-" + str.substring(9);
        }
        input.value = str
    }

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }

    function chkNumber1(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '1' || vchar > '4') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }

</script>
@endsection
