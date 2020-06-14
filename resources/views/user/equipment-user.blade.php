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
                        <i class="glyphicon glyphicon-edit"></i> รายการครุภัณฑ์</div>
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
                                <th id='th_css'>รหัสครุภัณฑ์</th>
                                <th id='th_css' style='width:10%;'>รูปภาพ</th>
                                <th id='th_css'>ลักษณะ/ยี่ห้อ</th>
                                <th id='th_css'>ตำแหน่งที่ตั้ง</th>
                                <th id='th_css'>สถานะ</th>
                                <th id='th_css' style='width:15%;'>ตัวเลือก</th>
                            </tr>
                        </thead>

{{-- SHOW DURABLE ARTICLE FOR PERSONAL --}}

                        @if (Auth::user()->role == 'personal')
                        <tbody>
                            @if(is_null($equipment2))

                            <h2 class="text-center">** ไม่มีข้อมูลครุภัณฑ์ **</h2>

                            @else
                            @foreach ($equipment2 as $list)
                            <tr>
                                <td>{{ $list->equipment_code }}</td>
                                <td><img src="{{ asset('images/equipment/' . $list->equipment_image) }}"
                                        style='height:100px; width:100px;'></td>
                                <td>{{ $list->equipment_name }}</td>
                                <td>{{ $list->equipment_location }}</td>
                                <td>
                                    @php
                                    $status = '';

                                    if ($list->equipment_status == 1) {
                                    $status = '<h4><label class="badge badge-success">ว่าง</label></h4>'; }
                                    elseif ($list->equipment_status == 2){
                                    $status = '<h4><label class="badge badge-danger">ไม่ว่าง</label></h4>'; }
                                    elseif ($list->equipment_status == 3){
                                    $status = '<h4><label class="badge badge-warning">ซ่อม/รอซ่อม</label></h4>'; }
                                    elseif ($list->equipment_status == 4){
                                    $status = '<h4><label class="badge badge-default">ชำรุด</label></h4>'; }
                                    elseif ($list->equipment_status == 5){
                                    $status = '<h4><label class="badge badge-default">บริจาค</label></h4>'; }
                                    elseif ($list->equipment_status == 6){
                                    $status = '<h4><label class="badge badge-default">รอบริจาค</label></h4>'; }
                                    elseif ($list->equipment_status == 7){
                                    $status = '<h4><label class="badge badge-default">ขายทอดตลาด</label></h4>'; }
                                    elseif ($list->equipment_status == 8){
                                    $status = '<h4><label class="badge badge-default">โอนย้าย</label></h4>'; }

                                    echo $status;
                                    @endphp
                                </td>
                                <td>
                                    <div class='btn-group' role='group'>

                                       @if($list->equipment_status == 1)
                                            <a href="#rent{{$list->id}}" data-toggle="modal" class='btn btn-success' data-target="#rent{{$list->id}}">ยืม</a>
                                        <a href="#showdetail{{$list->id}}" data-toggle="modal" class='btn btn-info' data-target="#showdetail{{$list->id}}">รายละเอียด</a>
                                        @else()
                                        <a href="#rent{{$list->id}}" data-toggle="modal" class='btn btn-success disabled' data-target="#rent{{$list->id}}">ยืม</a>
                                        <a href="#showdetail{{$list->id}}" data-toggle="modal" class='btn btn-info' data-target="#showdetail{{$list->id}}">รายละเอียด</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            
                            <div id="showdetail{{$list->id}}" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header"><h5 class='modal-title' id='myModalLabel'>รายละเอียดเพิ่มเติม</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="magnify5">
                                        <div class="large5"></div>
                                        
                                        <div>
                                            <span style='color:black;font-weight:bold;'>รหัสครุภัณฑ์ : </span>
                                            <span style='color:black;'>{{$list->equipment_code}}</span>
                                        </div>
                                        
                                        <div>
                                            <img src="{{ asset('images/equipment/' . $list->equipment_image) }}"
                                                    style='height:100px; width:100px;'>
                                        </div>

                                        <div>
                                            <span style='color:black;font-weight:bold;'>ลักษณะ : </span>
                                            <span style='color:black;'> {{$list->equipment_name}} </span>
                                        </div>

                                        <div>
                                            <span style='color:black;font-weight:bold;'>ตำแหน่งที่ตั้ง : </span>
                                            <span style='color:black;'> {{ $list->equipment_location }} </span>
                                        </div>

                                        <div>
                                            <span style='color:black;font-weight:bold;'>สถานะ : </span>
                                            <span style='color:black;'>  @php echo $status; @endphp </span>
                                        </div>
                                    
                                      </div> {{--magnify5--}}
                                    </div> {{--modal-body--}}

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        

                        <div class='modal fade' id='rent{{$list->id}}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
                            aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>

                                        <h5 class='modal-title' id='myModalLabel'>ยืนยันการยืมครุภัณฑ์</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('rent.store') }}" method="post">
                                        @csrf

                                        <div class='modal-body'>
                                            <div>
                                                <label style="color:black;font-size:15px;">คุณแน่ใจว่าจะยืมครุภัณฑ์
                                                    ?</label>
                                                
                                            </div>
                                            <div>
                                                <h4><label class="badge badge-warning">{{$list->equipment_name}}</label></h4>
                                            </div>

                                            <div class="form-group">
                                                <label for="id" style="color:black;font-size:15px;">
                                                    วัตถุประสงค์ในการยืม</label>
                                                <input type="text" class="form-control" id="rent_detail"
                                                    placeholder="รายละเอียดเพิ่มเติม.." name="rent_detail" autocomplete="off"
                                                    required>
                                            </div>
                                            <input type="hidden" id="user_id" name="user_id"
                                                value="{{ Auth::user()->id }}" />
                                            <input type="hidden" id="equipment_id" name="equipment_id" value="{{$list->id}}"/>
                                             <div
                                                class='modal-footer'>
                                            <button type='button' class='btn btn-secondary'
                                                data-dismiss='modal'>ยกเลิก</button>
                                            <button type='submit' class='btn btn-primary'>ยืนยัน</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endif
{{-- END SHOW DURABLE ARTICLE FOR PERSONAL --}}

@endif

<script>
    $('#addrent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #equipment_id').val(id);
        modal.find('.modal-body #name').val(name);
    })

</script>


@endsection
