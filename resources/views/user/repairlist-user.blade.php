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
                        <i class="glyphicon glyphicon-edit"></i>ติดตามรายการแจ้งซ่อม</div>
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

                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                    @endif

                    <table id='myTable' class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th id="th_css">พัสดุ</th>
                                <th id="th_css">วันที่แจ้ง</th>
                                <th id="th_css">ผู้ปฏิบัติงาน</th>
                                <th id="th_css">สถานะการซ่อม</th>
                                <th id="th_css">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_null($repair))
                                <h2 class="text-center">** ไม่มีรายการแจ้งซ่อม **</h2>
                            @else
                            @foreach ($repair as $list)
                            <tr>
                                <td>{{ $list->equipment->equipment_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}</td>
                                <td>-</td>
                                <td>
                                    @if ($list->repair_status == 0)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>
                                    @endif
                                    @if ($list->rent_status == 1)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>
                                    @endif
                                    @if ($list->rent_status == 2)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>
                                    @endif
                                    @if ($list->rent_status == 3)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>
                                    @endif
                                    @if ($list->rent_status == 4)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>
                                    @endif
                                    @if ($list->rent_status == 5)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>
                                    @endif
                                    @if ($list->rent_status == 6)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>
                                    @endif
                                </td>
                                <td>
                                    <a href='#' class='btn btn-danger' title='ยกเลิก' name='actionRentCancel'
                                        data-toggle='modal'>
                                        <i class='fa fa-times-circle' title='ยกเลิก'></i></a>
                                    <a href='#' class='btn btn-info' title='รายละเอียด' name='actionRepairFollow'
                                        data-toggle='modal'>
                                        <i class='fa fa-th-list' title='รายละเอียด'></i></a>
                                </td>
                            </tr>

                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
