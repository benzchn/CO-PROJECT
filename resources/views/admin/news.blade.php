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

                @foreach ($news as $news)
                    @if($news->news_status == 1)
                        <article id='featured'>
                            <div>

                                @if ($news->news_image =='')

                                @else
                                    <div style='display: flex; justify-content: center; align-items: center;'>
                                        <img src="{{ asset('images/' . $news->news_image) }}" style='width:50px;'>
                                    </div>
                                    <h3 style='color:black;'>หัวข้อ : {{ $news->news_title }}</h3>
                                    <p>ประกาศเมื่อ : {{ \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') }} </p>
                                    <p>โดย : {{ $news->news_create }} </p>
                                    <a href='#' class='btn btn-danger' role='button' alt='ลบ' style='color:white;'
                                        data-toggle='modal' data-target="#removeNewsModal"><i
                                            class='glyphicon glyphicon-remove'></i></a>
                                    <a  class='btn btn-warning' role='button' alt='แก้ไข' style='color:white;'><i
                                            class='glyphicon glyphicon-edit'
                                            data-title="{{ $news->news_title }}"
                                            data-detail="{{ $news->news_detail }}" data-toggle='modal'
                                            data-target="#editNewsModal"></i></a>
                                @endif
                            </div>

                        </article>
                    @endif
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
