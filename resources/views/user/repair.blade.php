@extends('layouts.app-user')

@section('body')

<div class="container" style="padding-top:20px;">
    <div class="row" style="padding-top:20px;">
        <div class="col-md-12">

            <div style="box-shadow: 0 1px 2px rgba(0,0,0,.05);border-color: #ddd;margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;">

                <div style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;">
                    <div style="box-sizing: border-box;">
                        <i class="glyphicon glyphicon-edit"></i> รายละเอียดการซ่อม</div>
                </div>

                <div style="padding: 15px;">


@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form class="well form-horizontal" action="{{ route('repair.store') }}" method="post"
                         enctype="multipart/form-data" >
                        @csrf

                        <!--Body-->
                        <div class="form-group row">

                            <div class="input-group mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">พัสดุ</label>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/745/745437.svg' width="21px"
                                            height="21px"></div>
                                </div>

                                <select class="form-control" title="เลือกพัสดุ" id="picker" name="equipment_id"
                                    data-live-search="true">
                                @if(is_null($equipment))
                                <option value="">** ไม่มีข้อมูลครุภัณฑ์ **</option>
                                @else
                                @foreach ($equipment as $list)
                                <option class="form-control" value="{{ $list->id }}">{{ $list->equipment_name }}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group mb-2">
                                <label for="repair_detail" class="col-sm-2 col-form-label">รายละเอียดการซ่อม/ปัญหา</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/1102/1102457.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <textarea class="form-control" name="repair_detail" id="repair_detail" placeholder="กรอกรายละเอียด"
                                    required></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="input-group mb-2">

                                <label for="repair_etc" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/2615/2615067.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <textarea class="form-control" name="repair_etc" id="repair_etc"></textarea>
                            </div>
                            <label style="color:#60e160;padding-left:20px;">คำอธิบายหรือหมายเหตุเพิ่มเติม
                                (สถานที่/เลขห้อง)</label>

                        </div>


                        <div class="form-group row">
                            <div class="input-group mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">เพิ่มไฟล์ภาพ</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/685/685686.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <input name="filenames[]" class="form-control" type="file" multiple>
                            </div>

                            <label style="color:#60e160;padding-left:20px;">เลือกรูปภาพอัปโหลด
                                (สามารถเลือกได้หลายไฟล์)</label>
                        </div>

                        <div class="text-center">
                            <button type="submit"  class="btn btn-info btn-block rounded-0 py-2">บันทึก</button>
                        </div>
                </div>

                </form>



            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('#pname').change(function () {
            $.POST("my-ajax-call-code.php", {
                    pid: $("#pname").val()
                },
                function (data) {
                    $('input[name="pcode"]').val(data.description);
                }, "json");
        });
    });

</script>

<script>
    $(document).ready(function () {
        $('#picker').select2();
    });

</script>

@endsection
