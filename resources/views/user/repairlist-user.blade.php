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
    border-color: #ddd;padding: 7px 15px;
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
                                <th>พัสดุ</th>
                                <th>วันที่แจ้ง</th>
                                <th>ผู้ปฏิบัติงาน</th>
                                <th>สถานะการซ่อม</th>
                                <th>ตัวเลือก</th>
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

                                    @php
                                $status = "";
                                if($list->repair_status == 0) {
                                    $status = "<span style='font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>";
                                } elseif ($list->repair_status == 1) {
                                    $status = "<span style='font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>";
                                } elseif ($list->repair_status == 2) {
                                   $status = "<span style='font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>";
                               } elseif ($list->repair_status == 3) {
                                   $status = "<span style='font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>";
                               } elseif ($list->repair_status == 4) {
                                    $status = "<span style='font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>";
                                } elseif ($list->repair_status == 5) {
                                    $status = "<span style='font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>";
                                } elseif ($list->repair_status == 6) {
                                    $status = "<span style='font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>";
                                }

                                echo $status;
                                    @endphp

                                </td>
                                <td>
                                    <a href="#removeRepairModal{{ $list->id }}" data-toggle="modal"
                                        class="btn btn-danger"><i class="fa fa-trash-alt"></i>ลบ</a>
                                    <a href="#showdetail{{ $list->id }}" data-toggle="modal" class='btn btn-info' data-target="#showdetail{{$list->id}}">รายละเอียด</a>
                                </td>
                            </tr>

                            <div id="showdetail{{$list->id}}" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h5 class='modal-title' id='myModalLabel'>รายละเอียดเพิ่มเติม</h5> --}}
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                     
                                        <div class='well form-horizontal'>
                                            <fieldset>
                                                <legend>รายละเอียดของ ผู้แจ้งซ่อม</legend>
                                                <div class="card card-body bg-light">
                                                <div class="container">
                                                <div class="row">

                                                <div class="col-6 col-md-4">
                                                        <span style='color:black;font-weight:bold;'>&nbsp; ชื่อ - นามสกุล :</span>
                                                </div>

                                                <div class="col-6 col-md-4">
                                                        <span style='color:black;'>{{ $list->user->name }}</span>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <span style='color:black;font-weight:bold;'> &nbsp; โทรศัพท์ :</span>
                                                </div>

                                                <div class="col-6 col-md-4">
                                                    <span style='color:black;'>{{ $list->user->phone }}</span>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                            </fieldset>
                        
                                        </div>
                                        
                                        <div class=''>
                                            <fieldset>
                                                <legend>รายละเอียดการซ่อม</legend>
                                                <div class="card card-body bg-light">
                                                <div class="container">

                                                <div class="row">
                                                <div class="col-6">
                                                    <span style='color:black;font-weight:bold;'> &nbsp; ลักษณะ/ยี่ห้อ :</span>
                                                </div>
                                                <div class="col-6">
                                                    <span style='color:black;'>{{ $list->equipment->equipment_name }}</span>
                                                </div>
                                                </div>
                                                    

                                                <div class="row">
                                                <div class="col-6">
                                                    <span style='color:black;font-weight:bold;'>&nbsp; รหัสครุภัณฑ์/เลขทะเบียน :</span>
                                                </div>
                                                <div class="col-6">
                                                    <span style='color:black;'>{{ $list->equipment->equipment_code }}</span>
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-6">
                                                    <span style='color:black;font-weight:bold;'>&nbsp; วันที่แจ้ง :</span>
                                                </div>
                                                <div class="col-6">
                                                <span style='color:black;'>{{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}</span>
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-6">
                                                    <span style='color:black;font-weight:bold;'>&nbsp; รายละเอียดการซ่อม/ปัญหา :</span>
                                                </div>
                                                <div class="col-6">
                                                    <span style='color:black;'>{{ $list->repair_detail}}</span>
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-6">
                                                    <span style='color:black;font-weight:bold;'>&nbsp; หมายเหตุ :</span>
                                                </div>
                                                <div class="col-6">
                                                    <span style='color:black;'>{{ $list->repair_etc}}</span>
                                                </div>
                                                </div>
                                                
                                                @foreach (json_decode($list->filenames) as $image)
                                                
                                                <div class="zoom">
                                                    <img src="{{ asset('images/repair/' . $image) }}" 
                                                    style='height:100px; width:100px;'/>
                                                </div>
                                                   
                                                @endforeach
                                            

                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <legend>ประวัติการทำรายการ</legend>
                                       
{{-- <div class="container">
    <div class="row"> --}}
                                        <div class='col'>
                                            <fieldset>
                                                
                                                    <div class='row'>
                                                        <div style='background:#000000;padding: 2px;display: inline;border-radius: 2em;color: #ffffff; text-align:center;' class="col">ผู้ปฏิบัติงาน</div>
                                                        <div style='background:#000000;padding: 2px;display: inline;border-radius: 2em;color: #ffffff; text-align:center;' class="col">สถานะการซ่อม</div>
                                                        <div style='background:#000000;padding: 2px;display: inline;border-radius: 2em;color: #ffffff; text-align:center;' class="col">วันที่ทำรายการ</div>
                                                        <div style='background:#000000;padding: 2px;display: inline;border-radius: 2em;color: #ffffff; text-align:center;' class="col">หมายเหตุ</div>
                                                    </div>



                                                    <div style='color:black;' class='row'>
                                                        <div style='color:black; text-align:center;' class="col">".$Operater3."</div>
                                                        <div style='color:black; text-align:center;' class="col">@php echo $status; @endphp</div>
                                                        <div style='color:black; text-align:center;' class="col">{{ \Carbon\Carbon::parse($list->updated_at)->format('d/m/Y') }}</div>
                                                        <div style='color:black; text-align:center;' class="col">".$comment."</div>
                                                    </div>
                                            </fieldset>
                                        </div>
    {{-- </div></div> --}}

                                    </div> {{--modal-body--}}

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div>



                            <!-- del repair -->
                            <div class="modal fade" id="removeRepairModal{{ $list->id }}" aria-labelledby="myModalLabel"
                                tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="card-header">

                                            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>
                                                ยกเลิกรายการซ่อม</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('repair.destroy',$list->id) }}"
                                            method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                            <div class="modal-body">
                                                <p>คุณแน่ใจว่าจะยกเลิกรายการแจ้งซ่อม ?</p>
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


<script>

    </script>
@endsection
