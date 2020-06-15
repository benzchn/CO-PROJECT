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
                        <i class="glyphicon glyphicon-edit"></i>ติดตามรายการยืม - คืน</div>
                </div>
                <div style="padding: 15px;">

                    <table id='myTable' class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ชื่อผู้ยืม</th>
                                <th>รูปภาพ</th>
                                <th>รหัสครุภัณฑ์</th>
                                <th>ลักษณะ/ยี่ห้อ</th>
                                <th>สถานะการยืม</th>
                                <th>หมายเหตุ</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_null($rent))
                            <h2 class="text-center">** ไม่มีรายการยืม **</h2>
                            @else
                            @foreach ($rent as $list)
                            <tr>
                                <td>{{ $list->user->name }}</td>
                                <td><img src="{{ asset('images/equipment/' . $list->equipment->equipment_image) }}"
                                        style='height:100px; width:100px;'></td>
                                <td>{{ $list->equipment->equipment_code }}</td>
                                <td>{{ $list->equipment->equipment_name }}</td>
                                <td>
                                    @if ($list->rent_status == 0)
                                    <span
                                        style='font-size:16px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งยืม
                                        (รออนุมัติ)</span>
                                    @endif
                                    @if ($list->rent_status == 1)
                                    <span
                                        style='font-size:16px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>อนุมัติแล้ว</label>
                                        @endif
                                        @if ($list->rent_status == 2)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ไม่อนุมัติ</label>
                                            @endif
                                            @if ($list->rent_status == 3)
                                            <span
                                                style='font-size:16px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังยืม</label>
                                                @endif
                                                @if ($list->rent_status == 4)
                                                <span
                                                    style='font-size:16px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งคืนแล้ว</label>
                                                    @endif
                                                    @if ($list->rent_status == 5)
                                                    <span
                                                        style='font-size:16px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการยืม</label>
                                                        @endif
                                </td>
                                <td>{{ $list->rent_etc }}</td>
                                <td>
                                    <a href="#removeRentModal{{ $list->id }}" data-toggle="modal"
                                        class="btn btn-danger"><i class="fa fa-trash-alt"></i>ลบ</a>
                            </tr>
                            <!-- del repair -->
                            <div class="modal fade" id="removeRentModal{{ $list->id }}" aria-labelledby="myModalLabel"
                                tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>
                                                ยกเลิกรายการยืม</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('rent.destroy',$list->id) }}"
                                            method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                            <div class="modal-body">
                                                <p>คุณแน่ใจว่าจะยกเลิกรายการยืม ?</p>
                                                <input type="hidden" name="equipment" id="equipment" value="{{ $list->equipment->id }}">
                                            </div>
                                            <div class="modal-footer removeCategoriesFooter">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
                                                <button type="submit" class="btn btn-danger"
                                                    data-loading-text="Loading..."> ยืนยัน</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
