@extends('layouts.app-admin')

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">จัดการบัญชีผู้ใช้</h3>
            </div>


            <div class="panel-body">
                <div class="remove-messages"></div>

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

                @if(is_null($student))

                <h2 class="text-center">** ไม่มีข้อมูลผู้ใช้ **</h2>

                @else

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable" align="center">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:20%;">ชื่อผู้ใช้งาน</th>
                                <th>ชื่อ - สกุล</th>
                                <th>สิทธิ์การใช้งาน</th>
                                <th>สถานะ</th>
                                <th style="width:30%;">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $list)
                            <tr>
                                <td>{{ $list->user_id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>
                                    <h5><label class='label label-info'>นักศึกษา</label></h5>
                                </td>
                                <td>
                                    @if ($list->user_status == 0)
                                    <h5><label class="label label-danger">บัญชียังไม่เปิดการใช้งาน</label></h5>
                                    @elseif ($list->user_status == 1)
                                    <h5><label class="label label-success">บัญชีเปิดใช้งานแล้ว</label></h5>
                                    @endif
                                </td>
                                <td>
                                <a href="#editStdUserModal{{ $list->id }}" data-toggle="modal" class="btn btn-warning"><i
                                        class="glyphicon glyphicon-edit"></i>แก้ไข</a>
                                <a href="#removeUserModal{{ $list->id }}" data-toggle="modal" class="btn btn-danger"><i
                                        class="glyphicon glyphicon-remove"></i> ปิดใช้งาน</a>
                                <a href="#viewModal{{ $list->id }}" data-toggle="modal" class="btn btn-default"><i
                                        class="glyphicon glyphicon-list"></i> รายละเอียด</a>
                                </td>
                            </tr>
                            <!-- view user -->
                            <div class="modal fade" id="viewModal{{ $list->id }}" aria-labelledby="myModalLabel"
                                tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><i class="fa fa-edit"></i>ข้อมูลผู้ใช้</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class='well form-horizontal'>
                                                <div><label style="font-size: 16px">ชื่อ-นามสกุล : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->name }}</b> </label></div>
                                                <div><label style="font-size: 16px">ชื่อผู้ใช้ : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->user_id }}</b> </label></div>
                                                <div><label style="font-size: 16px">อีเมล : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->email }}</b> </label></div>
                                                <div><label style="font-size: 16px">เบอร์ : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->phone }}</b> </label></div>
                                                <div><label style="font-size: 16px">ชั้นปี : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->col_year }}</b> </label></div>
                                                <div><label style="font-size: 16px">หลักสูตร : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->department }}</b> </label></div>
                                                <div><label style="font-size: 16px">ระดับปริญญา : &nbsp;&nbsp;&nbsp;
                                                        <b>{{ $list->degree }}</b> </label></div>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="clostEditModal" class="btn btn-default"
                                                data-dismiss="modal">
                                                <i class="glyphicon glyphicon-remove-sign"></i>
                                                ปิด</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /view user -->
                            <!-- edit User  -->
                            <div class="modal fade" id="editStdUserModal{{ $list->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form class="form-horizontal" id="editStdForm"
                                            action="{{ route('manage-student.update',$list->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('patch') }}
                                            <input type="hidden" id="form" name="form" value="edit">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"><i
                                                        class="fa fa-edit"></i>แก้ไขข้อมูลส่วนตัวผู้ใช้งาน</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div id="edit-Std-messages"></div>

                                                <div class="modal-loading div-hide"
                                                    style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                                    <span class="sr-only">Loading...</span>
                                                </div>

                                                <div class="edit-Std-result">
                                                    <div style="padding:30px;">

                                                        <div class="form-group">
                                                            <label for="user_id">รหัสนักศึกษา *</label>&nbsp;<span
                                                                class="label label-info"
                                                                style="font-weight:normal;">(ตัวอย่าง:
                                                                60302xxxx-x *ใส่ขีดด้วย*)</span>
                                                            <!-- <input type="text" name="user_id" id="user_id" class="form-control" autocomplete="off" required> -->
                                                            <input type="text" class="form-control" id="user_id"
                                                                name="user_id" required OnInput="add_hyphen()"
                                                                placeholder="60302xxxx-x" maxlength="11"
                                                                OnKeyPress="return chkNumber(this)" autocomplete="off"
                                                                pattern="[0-9]{8,8}.[-].[0-9]{0,0}" value="{{ $list->user_id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">รหัสผ่าน *</label>&nbsp;<span
                                                                class="label label-info"
                                                                style="font-weight:normal;">(กรอกอักษร a-z,A-z และตัวเลข
                                                                0-9 จำนวน 6-10
                                                                ตัวเท่านั้น)</span>
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" pattern="[A-Za-z0-9]{6,10}"
                                                                placeholder="Password" autocomplete="off" required value="{{ $list->password }}">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">ชื่อ - นามสกุล *</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Full Name" autocomplete="off"
                                                                required value="{{ $list->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">อีเมล *</label>&nbsp;<span
                                                                class="label label-info"
                                                                style="font-weight:normal;">(ใช้ @kkumail.com
                                                                เท่านั้น)</span>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="user@kkumail.com"
                                                                autocomplete="off" required value="{{ $list->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">เบอร์โทรศัพท์ *</label>&nbsp;<span
                                                                class="label label-info"
                                                                style="font-weight:normal;">(ไม่ต้องใส่ขีด)</span>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" placeholder="Phone" autocomplete="off"
                                                                required OnKeyPress="return chkNumber(this)" value="{{ $list->phone }}">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">Password incorrect.</small> -->
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="form-group col-md-4">
                                                                <label for="inputCity">ระดับปริญญา *</label>
                                                                <select name="degree" id="degree" class="form-control"
                                                                    required>
                                                                    <option value="ปริญญาตรี" {{ $list->degree == 'ปริญญาตรี' ? 'selected' : '' }}>ปริญญาตรี</option>
                                                                    <option value="ปริญญาโท" {{ $list->degree == 'ปริญญาโท' ? 'selected' : '' }}>ปริญญาโท</option>
                                                                    <option value="ปริญญาเอก" {{ $list->degree == 'ปริญญาเอก' ? 'selected' : '' }}>ปริญญาเอก</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="department">หลักสูตร *</label>
                                                                <select name="department" id="department"
                                                                    class="form-control" required>
                                                                    <option value="วิทยาการคอมพิวเตอร์"  {{ $list->department == 'วิทยาการคอมพิวเตอร์' ? 'selected' : '' }}>
                                                                        วิทยาการคอมพิวเตอร์</option>
                                                                    <option value="เทคโนยีสารสนเทศ" {{ $list->department == 'เทคโนยีสารสนเทศ' ? 'selected' : '' }}>เทคโนยีสารสนเทศ
                                                                    </option>
                                                                    <option value="ภูมิศาสตร์สารสนเทศ" {{ $list->department == 'ภูมิศาสตร์สารสนเทศ' ? 'selected' : '' }}>
                                                                        ภูมิศาสตร์สารสนเทศ</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="col_year">&nbsp;</label>
                                                                <input type="text" class="form-control" id="col_year"
                                                                    name="col_year" placeholder="ชั้นปีที่" required
                                                                    autocomplete="off" maxlength="1"
                                                                    OnKeyPress="return chkNumber1(this)" value="{{ $list->col_year }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /edit brand result -->

                                            </div> <!-- /modal-body -->

                                            <div class="modal-footer editStdFooter">
                                                <button type="button" id="clostEditModal" class="btn btn-default"
                                                    data-dismiss="modal"> <i
                                                        class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                                                <button type="submit" class="btn btn-success" id="editStdBtn"
                                                    name="editStdBtn" data-loading-text="Loading..." autocomplete="off">
                                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                                    บันทึก</button>
                                            </div>
                                            <!-- /modal-footer -->
                                        </form>
                                        <!-- /.form -->
                                    </div>
                                    <!-- /modal-content -->
                                </div>
                                <!-- /modal-dailog -->
                            </div>
                            <!-- /User  -->

                            <!-- DeleteUser -->
                            <div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" role="dialog"
                                id="removeUserModal{{ $list->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>
                                                ปิดใช้งานบัญชีผู้ใช้</h4>
                                        </div>
                                        <form action="{{ route('manage-student.update',$list->id) }}" method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input type="hidden" id="form" name="form" value="del">
                                            <div class="modal-body">
                                                <p>คุณแน่ใจว่าจะปิดใช้งานบัญชีผู้ใช้ ..."{{ $list->name }}"... นี้ ?</p>
                                            </div>
                                            <div class="modal-footer removeCategoriesFooter">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                                                        class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                                                <button type="submit" class="btn btn-primary" id="removeCategoriesBtn"
                                                    data-loading-text="Loading...">
                                                    <i class="glyphicon glyphicon-ok-sign"></i> ยืนยัน</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            @endforeach

                        </tbody>
                    </table>
                    <!-- /table -->

                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->


    <!-- /DeleteUser -->

    @endif

    {{-- <script>
        $('#editStdUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_id = button.data('user')
            var password = button.data('pass')
            var name = button.data('name')
            var phone = button.data('phone')
            var degree = button.data('degree')
            var department = button.data('department')
            var col_year = button.data('year')
            var email = button.data('email')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #password').val(password);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #degree').val(degree);
            modal.find('.modal-body #department').val(department);
            modal.find('.modal-body #col_year').val(col_year);
            modal.find('.modal-body #email').val(email);

        })
        $('#removeUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

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

    </script> --}}

    @endsection
