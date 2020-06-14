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
                            <li><a href='/editprofile'>แก้ไขข้อมูลส่วนตัว</a></li>
                            <li class='active'><a href='/changpassword'>เปลี่ยนรหัสผ่าน</a></li>
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
                                    <input type="hidden" id="form" name="form" value="password">
                                    <div class="form-group">
                                        <label for="email">อีเมล *</label>&nbsp;<span class="badge badge-info"
                                            style="font-weight:normal;">(ใช้ @kku.ac.th เท่านั้น)</span>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="user@kku.ac.th" autocomplete="off" required
                                            value="{{ Auth::user()->user_id }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="oldpassword">รหัสผ่านเดิม *</label>&nbsp;<span class="badge badge-info"
                                            style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                                            pattern="[A-Za-z0-9]{6,10}" placeholder="Old Password" autocomplete="off"
                                            required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword">รหัสผ่านใหม่ *</label>&nbsp;<span
                                            class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z
                                            และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword"
                                            pattern="[A-Za-z0-9]{6,10}" placeholder="Password" autocomplete="off"
                                            required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordconfirm">ยืนยันรหัสผ่าน *</label>&nbsp;<span
                                            class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z
                                            และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="passwordconfirm"
                                            name="passwordconfirm" pattern="[A-Za-z0-9]{6,10}"
                                            placeholder="Confirm Password" autocomplete="off" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
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
                                    <input type="hidden" id="form" name="form" value="password">
                                    <div class="form-group">
                                        <label for="user_id">รหัสนักศึกษา *</label>&nbsp;<span class="badge badge-info"
                                            style="font-weight:normal;">(ตัวอย่าง:
                                            60302xxxx-x *ใส่ขีดด้วย*)</span>
                                        <input type="text" class="form-control" id="user_id" name="user_id"
                                            placeholder="60302xxxx-x" autocomplete="off" required OnInput="add_hyphen()"
                                            maxlength="11" OnKeyPress="return chkNumber(this)" disabled
                                            value="{{ Auth::user()->user_id }}" pattern="[0-9]{8,8}.[-].[0-9]{0,0}">
                                    </div>
                                    <div class="form-group">
                                        <label for="oldpassword">รหัสผ่านเดิม *</label>&nbsp;<span class="badge badge-info"
                                            style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                                            pattern="[A-Za-z0-9]{6,10}" placeholder="Old Password" autocomplete="off"
                                            required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword">รหัสผ่านใหม่ *</label>&nbsp;<span
                                            class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z
                                            และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword"
                                            pattern="[A-Za-z0-9]{6,10}" placeholder="New password" autocomplete="off"
                                            required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordconfirm">ยืนยันรหัสผ่านใหม่ *</label>&nbsp;<span
                                            class="badge badge-info" style="font-weight:normal;">(กรอกอักษร a-z,A-z
                                            และตัวเลข 0-9 จำนวน 6-10
                                            ตัวเท่านั้น)</span>
                                        <input type="password" class="form-control" id="passwordconfirm"
                                            name="passwordconfirm" pattern="[A-Za-z0-9]{6,10}"
                                            placeholder="Confirm Password" autocomplete="off" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2" style="padding-top:50px;">
                                            <button type="submit" id="btnStdSubmit" name="btnStdSubmit"
                                                class="btn btn-primary">อัพเดท</button>
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
@endsection
