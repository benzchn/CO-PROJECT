@extends('layouts.app-admin')

@section('body')

<div class="row">
    <div class="col-md-12">

        <!-- <ol class="breadcrumb">
            <li><a href="dashboard.php">หน้าแรก</a></li>
            <li class="active">ประกาศข่าวสาร</li>
        </ol> -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ประกาศข่าวสาร</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">

                <!-- <div class="remove-messages"></div> -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                <form action="{{ route('news.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <legend></legend>
                    <div class="form-group">
                        <label for="news_title">หัวข้อ</label>
                        <textarea type="text" class="form-control" id="news_title" name="news_title"
                            placeholder="ใส่หัวข้อ" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="news_detail">รายละเอียด</label>
                        <textarea type="text" class="form-control" id="news_detail" name="news_detail"
                            placeholder="ใส่รายละเอียด" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="news_image">เลือกรูปภาพ</label>
                        <input type="file" class="form-control" id="news_image" name="news_image">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">เลือกวันที่ประกาศ</label>
                        <input type="date" class="form-control" id="newsDate" name="newsDate" required></textarea>
                    </div> -->
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">ประกาศ</button>
                </form>

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ข่าวสารที่กำลังประกาศ</div>
            </div> <!-- /panel-heading -->
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

                @if(is_null($news))
                <h2 class="text-center">** ไม่มีรายการข่าว **</h2>
                @else

                @foreach ($news as $list)
                @if($list->news_status == 1)
                <p><a href="#viewModal{{ $list->id }}" data-toggle="modal"> หัวข้อ : {{ $list->news_title }} ...
                        ประกาศเมื่อ : {{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}</a>&nbsp;<img
                        src='http://oxygen.readyplanet.com/images/column_1303576852/icon0002.gif' width='25px' /></p>


                @endif

                <div class="modal fade" id="viewModal{{ $list->id }}" aria-labelledby="myModalLabel" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-edit"></i>ข่าวประชาสัมพันธ์</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <center><img src="{{ asset('images/news/' .  $list->news_image ) }}"
                                            style='height:150px; width:150px;'></center>
                                </p>

                                <div class='well form-horizontal'>
                                    <div><label  style="font-size: 16px">หัวข้อ : &nbsp;&nbsp;&nbsp; <b>{{ $list->news_title }}</b> </label></div>
                                    <div><label  style="font-size: 16px">รายละเอียด : &nbsp;&nbsp;&nbsp; <b>{{ $list->news_detail }}</b> </label></div>
                                    <div><label  style="font-size: 16px">ผู้ประกาศ : &nbsp;&nbsp;&nbsp; <b>{{ $list->news_create }}</b> </label></div>
                                    <div><label  style="font-size: 16px">วันที่ประกาศ : &nbsp;&nbsp;&nbsp; <b>{{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}</b> </label></div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="clostEditModal" class="btn btn-default" data-dismiss="modal">
                                    <i class="glyphicon glyphicon-remove-sign"></i>
                                    ปิด</button>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                @endif



            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script>
    $('#editNewsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var title = button.data('title')
        var detail = button.data('detail')
        // var name = button.data('name')
        // var location = button.data('location')
        // var role = button.data('role')
        // var etc = button.data('etc')
        // var list = button.data('list')
        // var status = button.data('status')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #news_title').val(title);
        modal.find('.modal-body #news_detail').val(detail);
        // modal.find('.modal-body #equipment_name').val(name);
        // modal.find('.modal-body #equipment_location').val(location);
        // modal.find('.modal-body #equipment_role').val(role);
        // modal.find('.modal-body #equipment_etc').val(etc);
        // modal.find('.modal-body #list_id').val(list);
        // modal.find('.modal-body #equipment_status').val(status);

    })
    $('#removeNewsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })

</script>

@endsection
