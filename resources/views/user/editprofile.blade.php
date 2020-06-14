@extends('layouts.app-user')

@section('body')

<div class="container" style="padding-top:20px;">
<div class="row" style="padding-top:20px;">
            <div class="col-md-12">

                <div style="box-shadow: 0 1px 2px rgba(0,0,0,.05);border-color: #ddd;margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;">


                    <div style="padding: 15px;">

                        <div id='cssmenu'>
                            <ul>
                                <li><a href='/profile'>ข้อมูลส่วนตัว</a></li>
                                <li class='active'><a href='/editprofile'>แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href='/changpassword'>เปลี่ยนรหัสผ่าน</a></li>
                            </ul>
                        </div>

                        <div class="containner">
                            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
                @endif
                            @if ( Auth::user()->role == 'personal' )
                            <div class="bio-info">

                                <div class="row">

                                    <form method="POST" action="{{ route('user.update',Auth::user()->id) }}">
                                        @csrf
                                    {{ method_field('patch') }}
                                    <input type="hidden" id="form" name="form" value="profile">
                                    <input type="hidden" id="role" name="role" value="per">
                                        <div class="form-group">
                                            <label for="user_id">อีเมล *</label>&nbsp;<span class="badge badge-info"
                                                style="font-weight:normal;">(ใช้ @kku.ac.th เท่านั้น)</span>
                                            <input type="email" class="form-control" id="user_id" name="user_id"
                                                placeholder="user@kku.ac.th" autocomplete="off" required
                                                value="{{ Auth::user()->user_id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">ชื่อ - นามสกุล *</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name" autocomplete="off" required
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์ *</label>&nbsp;<span
                                                class="badge badge-info"
                                                style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Phone" autocomplete="off" required
                                                value="{{ Auth::user()->phone }}" OnKeyPress="return chkNumber(this)">
                                        </div>
                                        <br>
                                        <button type="submit" id="btnTeachSubmit" name="btnTeachSubmit"
                                            class="btn btn-primary">อัพเดท</button>
                                    </form>
                                </div>
                            </div>
                            @elseif(Auth::user()->role == 'student')
                            <div class="bio-info">
                                <div class="row">
                                    <form method="POST" action="{{ route('user.update',Auth::user()->id) }}">
                                        @csrf
                                    {{ method_field('patch') }}
                                    <input type="hidden" id="form" name="form" value="profile">
                                    <input type="hidden" id="role" name="role" value="std">
                                        <div class="form-group">
                                            <label for="user_id">รหัสนักศึกษา *</label>&nbsp;<span
                                                class="badge badge-info" style="font-weight:normal;">(ตัวอย่าง:
                                                60302xxxx-x *ใส่ขีดด้วย*)</span>
                                            <input type="text" class="form-control" id="user_id" name="user_id"
                                                placeholder="60302xxxx-x" autocomplete="off" required
                                                OnInput="add_hyphen()" maxlength="11"
                                                OnKeyPress="return chkNumber(this)" readonly
                                                value="{{ Auth::user()->user_id }}" pattern="[0-9]{8,8}.[-].[0-9]{0,0}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">ชื่อ - นามสกุล *</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name" autocomplete="off" required
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">อีเมล *</label>&nbsp;<span class="badge badge-info"
                                                style="font-weight:normal;">(ใช้ @kkumail.com เท่านั้น)</span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="user@kkumail.com" autocomplete="off" required
                                                value="{{ Auth::user()->email }}">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                                        else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์ *</label>&nbsp;<span
                                                class="badge badge-info"
                                                style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Phone" autocomplete="off" required
                                                value="{{ Auth::user()->phone }}" OnKeyPress="return chkNumber(this)">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="col_year">ชั้นปีที่ *</label>&nbsp;<span
                                                class="badge badge-info" style="font-weight:normal;">(1,2,3,4)</span>
                                            <input type="text" class="form-control" id="col_year" name="col_year"
                                                placeholder="ชั้นปี" autocomplete="off" required
                                                value="{{ Auth::user()->col_year }}" maxlength="1" OnKeyPress="return chkNumber1(this)">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2" style="padding-top:50px;">
                                                <button type="submit" class="btn btn-primary">อัพเดท</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif










                        </div><!-- containner -->
                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
   </div>

   <script>

    function chkNumber1(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'1' || vchar>'4') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}

    </script>
@endsection
