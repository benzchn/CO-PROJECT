@extends('layouts.app-admin')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">จัดการบัญชีผู้ใช้</h3>
            </div>
            <div class="panel-body">


                <div class="containner">
                    <div class="row">

                        <div class="form-group col-md-6"
                            style="display: flex;justify-content: center;align-items: center;padding-left:200px;">
                            <a href="/manage-personal" class="card education">
                                <div class="overlay"></div>

                                <div class="circle">
                                    <img src="https://i.ya-webdesign.com/images/transparent-teacher-flat-design-5.png"
                                        style="  z-index: 10000;transform: translateZ(0);" alt="image" width="100px" />


                                </div>
                                <p style="font-size:30px;">บุคลากร</p>
                            </a>
                        </div>

                        <div class="form-group col-md-6"
                            style="display: flex;justify-content: center;align-items: center;padding-right:200px;">

                            <a href="/manage-student" class="card credentialing">
                                <div class="overlay"></div>
                                <div class="circle">
                                    <img src="https://itservice.forest.go.th/download/img/jitasa.png" style="  z-index: 10000;transform: translateZ(0);" alt="image" width="100px" />


                                </div>
                                <p style="font-size:30px;">นักศึกษา</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->
@endsection
