@extends('layouts.app-admin')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">รายการแจ้งซ่อม</h3>
            </div>
            <div class="panel-body">


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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable" align="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>รหัสครุภัณฑ์</th>
                                <th>ลักษณะ/ยี่ห้อ</th>
                                <th>ชื่อผู้แจ้งซ่อม</th>
                                <th>คำอธิบาย</th>
                                <th>สถานะการซ่อม</th>
                                <th style="width:20%;">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_null($repair))
                            <h2 class="text-center">** ไม่มีรายการแจ้งซ่อม **</h2>
                            @else
                            @foreach ($repair as $list)
                            <tr>
                                <td>{{ $list->equipment->equipment_code }}</td>
                                <td>{{ $list->equipment->equipment_name }}</td>
                                <td>{{ $list->user->name }}</td>
                                <td>{{ $list->repair_detail }}</td>
                                <td>
                                    @if ($list->repair_status == 0)
                                    <span
                                        style='font-size:16px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>
                                    @endif
                                    @if ($list->repair_status == 1)
                                    <span
                                        style='font-size:16px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>
                                        @endif
                                        @if ($list->repair_status == 2)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>
                                            @endif
                                            @if ($list->repair_status == 3)
                                            <span
                                                style='font-size:16px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>
                                                @endif
                                                @if ($list->repair_status == 4)
                                                <span
                                                    style='font-size:16px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>
                                                    @endif
                                                    @if ($list->repair_status == 5)
                                                    <span
                                                        style='font-size:16px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>
                                                        @endif
                                                        @if ($list->repair_status == 6)
                                                        <span
                                                            style='font-size:16px;font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>
                                                            @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            id="editCategoriesModalBtn" data-target="#editRepairModal"
                                            data-equipment="{{ $list->equipment->equipment_code }}"
                                            data-equipment_id="{{ $list->equipment->id}}"
                                            data-user="{{ $list->user->name }}" data-user_id="{{ $list->user->id }}"
                                            data-detail="{{ $list->repair_detail }}" data-etc="{{ $list->repair_etc }}"
                                            data-create="{{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}"
                                            data-status="{{ $list->repair_status }}"> <i
                                                class="glyphicon glyphicon-edit"></i> แก้ไข</button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#removeRepairModal" data-id="{{ $list->id}}"> <i
                                                class="glyphicon glyphicon-trash"></i> ยกเลิกการซ่อม</button>
                                    </div>
                                </td>
                            </tr>


                        </tbody>

                        <!-- edit repair -->
                        <div class="modal fade" id="editRepairModal" aria-labelledby="myModalLabel" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <form class="form-horizontal" action="{{ route('repair.update',$list->id) }}"
                                        method="POST">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><i class="fa fa-edit"></i>แก้ไขยกเลิกรายการซ่อม</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="modal-body">

                                                <div id="edit-categories-messages"></div>

                                                <div class="modal-loading div-hide"
                                                    style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                                    <span class="sr-only">Loading...</span>
                                                </div>

                                                <div class="edit-categories-result">

                                                    <div class="form-group">
                                                        <label for="equipment_code"
                                                            class="col-sm-3 control-label">รหัสครุภัณฑ์</label>
                                                        <label class="col-sm-1 control-label">: </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="equipment_code"
                                                                placeholder="รหัสครุภัณฑ์" name="equipment_code"
                                                                autocomplete="off" readonly>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group">
                                <label for="" class="col-sm-3 control-label">รูปครุภัณฑ์ :</label>
                                <div class="col-sm-8">
                                    <img src="{{ asset('images/' . $image) }}"
                                                    style='height:150px; width:150px;'>
                                                </div>
                                            </div> --}}

                                            <div class="form-group">
                                                <label for="user" class="col-sm-3 control-label">
                                                    ชื่อผู้แจ้งซ่อม</label>
                                                <label class="col-sm-1 control-label">: </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="user"
                                                        placeholder="ชื่อผู้แจ้งซ่อม" name="user" autocomplete="off"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="created_at" class="col-sm-3 control-label">
                                                    วันที่แจ้งซ่อม</label>
                                                <label class="col-sm-1 control-label">: </label>
                                                <div class="col-sm-7">
                                                    <input type="datetime" class="form-control" id="created_at"
                                                        placeholder="วันที่ยืม" name="created_at" autocomplete="off"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="repair_status"
                                                    class="col-sm-3 control-label">สถานะการซ่อม</label>
                                                <label class="col-sm-1 control-label">: </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="repair_status"
                                                        name="repair_status">
                                                        <option value="0">แจ้งซ่อม (รออนุมัติ)</option>
                                                        <option value="1">รอดำเนินการ</option>
                                                        <option value="2">รออะไหล่</option>
                                                        <option value="3">ซ่อมสำเร็จ</option>
                                                        <option value="4">ซ่อมไม่สำเร็จ</option>
                                                        <option value="5">ยกเลิกการซ่อม</option>
                                                        <option value="6">ส่งมอบเรียบร้อย</option>
                                                        <option value="7">ส่งซ่อมศูนย์</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="repair_detail" class="col-sm-3 control-label">
                                                    รายละเอียด</label>
                                                <label class="col-sm-1 control-label">: </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="repair_detail"
                                                        placeholder="รายละเอียดเพิ่มเติม.." name="repair_detail"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="repair_etc" class="col-sm-3 control-label">
                                                    หมายเหตุ</label>
                                                <label class="col-sm-1 control-label">: </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="repair_etc"
                                                        placeholder="รายละเอียดเพิ่มเติม.." name="repair_etc"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <input type="hidden" name="equipment_id" id="equipment_id">
                                        </div>
                                        <!-- /edit brand result -->

                                </div> <!-- /modal-body -->

                                <div class="modal-footer editCategoriesFooter">
                                    <button type="button" id="clostEditModal" class="btn btn-default"
                                        data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>
                                        ปิด</button>

                                    <button type="submit" class="btn btn-success" id="editCategoriesBtn"
                                        data-loading-text="Loading..." autocomplete="off"> <i
                                            class="glyphicon glyphicon-ok-sign"></i> บันทึก</button>
                                </div>
                                <!-- /modal-footer -->
                                </form>
                                <!-- /.form -->
                            </div>
                            <!-- /modal-content -->
                        </div>
                        <!-- /modal-dailog -->
                </div>
                <!-- /edit repair -->

                <!-- del repair -->
                <div class="modal fade" id="removeRepairModal" aria-labelledby="myModalLabel" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>
                                    ยกเลิกรายการซ่อม</h4>
                            </div>
                            <form action="{{ route('repair.destroy',$list->id) }}" method="POST">
                                @csrf
                                {{method_field('delete')}}
                                <div class="modal-body">
                                    <p>คุณแน่ใจว่าจะยกเลิกรายการซ่อม ?</p>
                                </div>
                                <div class="modal-footer removeCategoriesFooter">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                                            class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                                    <button type="submit" class="btn btn-primary" data-loading-text="Loading...">
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
            </table>

        </div>
    </div> <!-- /panel-body -->
</div> <!-- /panel -->
</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script>
    $('#editRepairModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var equipment = button.data('equipment')
        var equipment_id = button.data('equipment_id')
        var user = button.data('user')
        // var user_id = button.data('user_id')
        var status = button.data('status')
        var detail = button.data('detail')
        var etc = button.data('etc')
        var create = button.data('create')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #equipment_code').val(equipment);
        modal.find('.modal-body #equipment_id').val(equipment_id);
        modal.find('.modal-body #user').val(user);
        modal.find('.modal-body #repair_status').val(status);
        modal.find('.modal-body #repair_detail').val(detail);
        modal.find('.modal-body #repair_etc').val(etc);
        modal.find('.modal-body #created_at').val(create);
    })
    $('#removeRepairModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })

</script>


@endsection
