@extends('layouts.app-admin')

@section('body')

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="/categories">คลัง</a></li>
            <li><a href="/categorieslist/{{ $categories->id }}">{{ $categories->categories_name }}</a>
            </li>
            <li class="active">{{ $list1->list_title }}</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="text-align:center;">{{ $list1->list_title }}</h3>
            </div>
            <!-- /panel-heading -->

            <div class="panel-body">

                <div class="remove-messages"></div>

                <div class="div-action pull" style="padding-bottom:5px;" align="right">
                    {{-- <button class="btn btn-success button1" data-toggle="modal" id="#addCategoriesModalBtn"
                        data-target="addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i>
                        เพิ่มประเภทครุภัณฑ์ </button> --}}
                    <button class="btn btn-success button1" data-toggle="modal" data-target="#addEquipmentModal"><i
                            class="glyphicon glyphicon-plus-sign"></i> เพิ่มครุภัณฑ์</button>
                </div> <!-- /div-action -->
                <div class="panel-body">
                    <!-- /div-action -->
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

                    {{-- @if(is_null($equipments)) --}}


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="myTable" align="center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>รหัสครุภัณฑ์</th>
                                    <th style="width:10%;">รูปภาพ</th>
                                    <th>ลักษณะ/ยี่ห้อ</th>
                                    <th>สิทธิการยืม</th>
                                    <th>ตำแหน่งที่ตั้ง</th>
                                    <th>สถานะ</th>
                                    <th>หมายเหตุ</th>
                                    <th style="width:15%;">ตัวเลือก</th>
                                </tr>
                            </thead>
                            @if(empty ( $equipments ))

                            @else
                            @foreach ($equipments as $list)
                            <tbody>
                                <tr>
                                    {{-- <td>{{ $equipment->pluck('equipment_code') }}</td> --}}
                                    <td>{{ $list->equipment_code }}</td>
                                    <td><img src="{{ asset('images/equipment/' . $list->equipment_image) }}"
                                            style='height:50px; width:50px;'></td>
                                    <td>{{ $list->equipment_name }}</td>
                                    <td>
                                        @if ($list->equipment_role == 1)
                                        {{ 'ผู้ดูแลระบบ/บุคลากร/อาจารย์' }}
                                        @else
                                        {{ 'ทุกคน' }}
                                        @endif
                                    </td>
                                    <td>{{ $list->equipment_location }}</td>
                                    <td>
                                        @if ($list->equipment_status == 1)
                                        <label class='label label-success'>{{ 'ว่าง' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 2)
                                        <label class='label label-danger'>{{ 'ไม่ว่าง' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 3)
                                        <label class='label label-warning'>{{ 'ซ่อม/รอซ่อม' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 4)
                                        <label class='label label-default'>{{ 'ชำรุด' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 5)
                                        <label class='label label-default'>{{ 'บริจาค' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 6)
                                        <label class='label label-default'>{{ 'รอบริจาค' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 7)
                                        <label class='label label-default'>{{ 'ขายทอดตลาด' }}</label>
                                        @endif
                                        @if ($list->equipment_status == 8)
                                        <label class='label label-default'>{{ 'โอนย้าย' }}</label>
                                        @endif
                                    </td>
                                    <td>{{ $list->equipment_etc }}</td>
                                    <td>
                                        <a href="#editEquipmentModal{{ $list->id }}" data-toggle="modal"
                                            class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i>แก้ไข</a>
                                        <a href="#removeEquipmentModal{{ $list->id }}" data-toggle="modal"
                                            class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>ลบ</a>
                                    </td>

                    </tr>
                    <!-- edit equipment brand -->
                                    <div class="modal fade" id="editEquipmentModal{{ $list->id }}"
                                        aria-labelledby="myModalLabel" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขครุภัณฑ์
                                                    </h4>
                                                </div>

                                                <form class="form-horizontal"
                                                    action="{{ route('equipment.update',$list->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('patch') }}
                                                    <div class="modal-body">

                                                        <input type="hidden" name="equipment_active"
                                                            id="equipment_active" value="1">

                                                        <div id="edit-productPhoto-messages"></div>

                                                        {{-- <div class="form-group">
                                                            <label for="" class="col-sm-3 control-label">รูปครุภัณฑ์ :</label>
                                                            <div class="col-sm-8">
                                                                <img src="{{ asset('images/' . $image) }}"
                                                        style='height:150px; width:150px;'>
                                                    </div>
                                            </div> --}}

                                            <div class="form-group">
                                                <label for="equipment_image" class="col-sm-3 control-label">เลือกรูปภาพ
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="equipment_code" class="col-sm-3 control-label">รหัสครุภัณฑ์
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="equipment_code"
                                                        name="equipment_code" value="{{ $list->equipment_code }}"
                                                        readonly>
                                                </div>
                                            </div> <!-- /form-group-->

                                            <div class="form-group">
                                                <label for="equipment_name" class="col-sm-3 control-label">ลักษณะ/ยี่ห้อ
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="equipment_name"
                                                        name="equipment_name" value="{{ $list->equipment_name }}">
                                                </div>
                                            </div> <!-- /form-group-->
                                            <div class="form-group">
                                                <label for="equipment_location"
                                                    class="col-sm-3 control-label">ตำแหน่งที่ตั้ง
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="equipment_location"
                                                        placeholder="เช่น 6602C, นักศึกษายืมไป"
                                                        name="equipment_location"
                                                        value="{{ $list->equipment_location }}">
                                                </div>
                                            </div> <!-- /form-group-->
                                            <div class="form-group">
                                                <label for="equipment_role"
                                                    class="col-sm-3 control-label">ตำแหน่งที่ตั้ง
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="equipment_role"
                                                        id="equipment_role">
                                                        <option value="1"
                                                            {{ $list->equipment_role == 1 ? 'selected' : '' }}>
                                                            ผู้ดูแลระบบ/บุคลากร/อาจารย์</option>
                                                        <option value="2"
                                                            {{ $list->equipment_role == 2 ? 'selected' : '' }}>ทุกคน
                                                        </option>
                                                    </select>
                                                </div>
                                            </div> <!-- /form-group-->

                                            <div class="form-group">
                                                <label for="equipment_status" class="col-sm-3 control-label">สถานะ :
                                                </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="equipment_status"
                                                        name="equipment_status">
                                                        <option value="1"
                                                            {{ $list->equipment_status == 1 ? 'selected' : '' }}>ว่าง
                                                        </option>
                                                        <option value="2"
                                                            {{ $list->equipment_status == 2 ? 'selected' : '' }}>ไม่ว่าง
                                                        </option>
                                                        <option value="3"
                                                            {{ $list->equipment_status == 3 ? 'selected' : '' }}>
                                                            ซ่อม/รอซ่อม</option>
                                                        <option value="4"
                                                            {{ $list->equipment_status == 4 ? 'selected' : '' }}>ชำรุด
                                                        </option>
                                                        <option value="5"
                                                            {{ $list->equipment_status == 5 ? 'selected' : '' }}>บริจาค
                                                        </option>
                                                        <option value="6"
                                                            {{ $list->equipment_status == 6 ? 'selected' : '' }}>
                                                            รอบริจาค</option>
                                                        <option value="7"
                                                            {{ $list->equipment_status == 7 ? 'selected' : '' }}>
                                                            ขายทอดตลาด</option>
                                                        <option value="8"
                                                            {{ $list->equipment_status == 8 ? 'selected' : '' }}>โอน
                                                        </option>
                                                    </select>
                                                </div>
                                            </div> <!-- /form-group-->

                                            <div class="form-group">
                                                <label for="equipment_etc" class="col-sm-3 control-label">หมายเหตุ :
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="equipment_etc"
                                                        placeholder="เช่น ส่งซ่อมบริษัท Acer, CPU ใช้งานไม่ได้"
                                                        name="equipment_etc" autocomplete="off"
                                                        value="{{ $list->equipment_etc }}">
                                                </div>
                                            </div> <!-- /form-group-->
                                            <input type="hidden" name="list_id" id="list_id"
                                                value="{{ $list->list->id }}">

                                            <div class="modal-footer editProductFooter">
                                                <button type="button" id="clostProductModal" class="btn btn-default"
                                                    data-dismiss="modal">
                                                    <i class="glyphicon glyphicon-remove-sign"></i>
                                                    ปิด</button>

                                                <button type="submit" class="btn btn-success" id="editProductBtn"
                                                    data-loading-text="Loading..."> <i
                                                        class="glyphicon glyphicon-ok-sign"></i>
                                                    บันทึก</button>
                                            </div> <!-- /modal-footer -->

                                            </form>

                                        </div>
                                        <!-- /modal-content -->
                                    </div>
                                    <!-- /modal-dailog -->
                    </div>
                    <!-- /equipment brand -->

                    <!-- categories brand -->
                    <div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" role="dialog"
                        id="removeEquipmentModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> ลบครุภัณฑ์</h4>
                                </div>
                                <form action="{{ route('categorieslist.destroy',$list->id) }}" method="POST">
                                    @csrf
                                    {{method_field('delete')}}
                                    <div class="modal-body">
                                        <p>คุณแน่ใจว่าจะลบ ?</p>
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
                    </div>
                    <!-- /.modal -->
                    <!-- /categories brand -->
                    @endforeach
                    @endif
                    </tbody>


                    </table>

                    <!-- /table -->
                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->

    <!-- add equipment -->
    <div class="modal fade" id="addEquipmentModal" aria-labelledby="myModalLabel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form class="form-horizontal" id="submitEquipmentForm" action="{{ route('equipment.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มครุภัณฑ์</h4>
                    </div>

                    <div class="modal-body" style="max-height:450px; overflow:auto;">

                        <div id="add-product-messages"></div>

                        <div class="form-group">
                            <label for="equipment_image" class="col-sm-3 control-label">รูปครุภัณฑ์: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <!-- the avatar markup -->
                                <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                <div class="kv-avatar center-block">
                                    <input type="file" class="form-control" id="equipment_image"
                                        placeholder="รูปครุภัณฑ์" name="equipment_image" class="file-loading"
                                        style="width:auto;" />
                                </div>

                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_code" class="col-sm-3 control-label">รหัสครุภัณฑ์: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="equipment_code" placeholder="รหัสครุภัณฑ์"
                                    name="equipment_code" autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_name" class="col-sm-3 control-label">ลักษณะ/ยี่ห้อ: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="equipment_name"
                                    placeholder="ตัวอย่าง Acer YX250" name="equipment_name" autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_location" class="col-sm-3 control-label">ตำแหน่งที่ตั้ง: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="equipment_location"
                                    placeholder="เช่น 6602C, นักศึกษายืมไป" name="equipment_location"
                                    autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_role" class="col-sm-3 control-label">สิทธิการยืม: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="equipment_role" name="equipment_role">
                                    <option value="">~~เลือก~~</option>
                                    <option value="1">ผู้ดูแลระบบ/บุคลากร/อาจารย์</option>
                                    <option value="2">ทุกคน</option>
                                </select>
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_status" class="col-sm-3 control-label">สถานะ: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="equipment_status" name="equipment_status">
                                    <option value="">~~เลือก~~</option>
                                    <option value="1">ว่าง</option>
                                    <option value="2">ไม่ว่าง</option>
                                    <option value="3">ซ่อม/รอซ่อม</option>
                                    <option value="4">ชำรุด</option>
                                    <option value="5">บริจาค</option>
                                    <option value="6">รอบริจาค</option>
                                    <option value="7">ขายทอดตลาด</option>
                                    <option value="8">โอนย้าย</option>
                                </select>
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="equipment_etc" class="col-sm-3 control-label">หมายเหตุ: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="equipment_etc"
                                    placeholder="เช่น ส่งซ่อมบริษัท Acer, CPU ใช้งานไม่ได้" name="equipment_etc"
                                    autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                    </div> <!-- /modal-body -->

                    <input type="hidden" name="list_id" id="list_id" value="{{ $list1->id }}">
                    <input type="hidden" name="equipment_active" id="equipment_active" value="1">

                    <div class="modal-footer">
                        <button type="button" id="clostAddCate" class="btn btn-default" data-dismiss="modal"> <i
                                class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                        <button type="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                            บันทึก</button>
                    </div> <!-- /modal-footer -->
                </form> <!-- /.form -->
            </div> <!-- /modal-content -->
        </div> <!-- /modal-dailog -->
    </div>
    <!-- /add equipment -->


    {{-- <script>
    $('#editEquipmentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var code = button.data('code')
        var image = button.data('image')
        var name = button.data('name')
        var location = button.data('location')
        var role = button.data('role')
        var etc = button.data('etc')
        var list = button.data('list')
        var status = button.data('status')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #equipment_code').val(code);
        modal.find('.modal-body #equipment_image').val(image);
        modal.find('.modal-body #equipment_name').val(name);
        modal.find('.modal-body #equipment_location').val(location);
        modal.find('.modal-body #equipment_role').val(role);
        modal.find('.modal-body #equipment_etc').val(etc);
        modal.find('.modal-body #list_id').val(list);
        modal.find('.modal-body #equipment_status').val(status);

    })
    $('#removeEquipmentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })

</script> --}}

    @endsection
