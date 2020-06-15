@extends('layouts.app-user')

@section('body')

<div class="container" style="padding-top:20px;">
<div class="row" style="padding-top:20px;">
            <div class="col-md-12">

                <div style="box-shadow: 0 1px 2px rgba(0,0,0,.05);border-color: #ddd;margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;">
                    <!-- <div style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;">
                        <div style="box-sizing: border-box;">
                        <i class="glyphicon glyphicon-edit"></i> รายละเอียดการซ่อม</div>
                    </div> -->

                    <div style="padding: 15px;">

                        <div id='cssmenu'>
                            <ul>
                                <li class='active'><a href='/profile'>ข้อมูลส่วนตัว</a></li>
                                <li><a href='/editprofile'>แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href='/changpassword'>เปลี่ยนรหัสผ่าน</a></li>
                            </ul>
                        </div>

                        <div class="containner">
                            @if ( Auth::user()->role == 'personal' )
                            <div class="bio-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bio-image">
                                                    <img src="https://i.ya-webdesign.com/images/transparent-teacher-flat-design-5.png"
                                                        alt="image" width="200px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="bio-content">
                                            <div class="form-row">
                                                <h2>{{ Auth::user()->name }}</h2>
                                            </div>
                                            <div class="form-row">
                                                <label>---------------------------------</label>
                                            </div>
                                            <div class="form-row">
                                                <h4>อีเมล : <span style="color:blue;"></span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>เบอร์โทรศัพท์ : <span
                                                        style="color:blue;"></span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Auth::user()->role == 'student')
                            <div class="bio-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bio-image">
                                                    <img src="https://itservice.forest.go.th/download/img/jitasa.png"
                                                        alt="image" width="200px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="bio-content">
                                            <div class="form-row">
                                                <h2>{{ Auth::user()->name }}</h2>
                                            </div>
                                            <div class="form-row">
                                                <label>---------------------------------</label>
                                            </div>
                                            <div class="form-row">
                                                <h4>รหัสนักศึกษา : <span
                                                        style="color:blue;">{{ Auth::user()->user_id }}</span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>อีเมล : <span style="color:blue;">{{ Auth::user()->email }}</span></h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>เบอร์โทรศัพท์ : <span
                                                        style="color:blue;">{{ Auth::user()->phone }}</span> </h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>นักศึกษาชั้นปีที่ : <span
                                                        style="color:blue;">{{ Auth::user()->col_year }}</span></h4>
                                            </div><br>
                                            <div class="form-row">
                                                <h4>ระดับ{{ Auth::user()->degree }} หลักสูตรวิชา{{ Auth::user()->department }}</h4>
                                            </div>
                                            <div class="form-row">
                                                <h4>มหาวิทยาลัยขอนแก่น</h4>
                                            </div>
                                        </div>
                                    </div>
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
