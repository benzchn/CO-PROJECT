@extends('layouts.app-user')

@section('body')

<div class="container" style="padding-top:20px;">
    <div id="demo" class="carousel slide" data-ride="carousel">

        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>


        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 400px; width: 1100px;">
                <img src="https://app.gs.kku.ac.th/eoffice/files/admissionsetup/06bff-untitled-1.jpg">
            </div>
            <div class="carousel-item" style="height: 400px; width: 1100px;">
                <img src="https://www.cs.kku.ac.th/images/news/2563/08_nsc_r2/nscr21.jpg">
            </div>
            <div class="carousel-item" style="height: 400px; width: 1100px;">
                <img src="https://cs.kku.ac.th/images/news/2562/tcas63.jpg">
            </div>
        </div>


        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>


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
                        <i class="glyphicon glyphicon-edit"></i> CSS@KKU NEWS</div>
                </div>
                <div style="padding: 15px;">

                    <div style="padding-top: 20px;">
                        <section style='width: 1000px;margin: auto;'>
                            @if(is_null($news))
                            <h2 class="text-center">** ไม่มีรายการข่าว **</h2>
                            @else

                            @foreach ($news as $list)
                            @if($list->news_status == 1)
                            <p><a href="#viewModal{{ $list->id }}" data-toggle="modal" class="text"> หัวข้อ : {{ $list->news_title }}
                                    ...ประกาศเมื่อ :
                                    {{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}</a>&nbsp;<img
                                    src='http://oxygen.readyplanet.com/images/column_1303576852/icon0002.gif'
                                    width='25px' /></p>


                            @endif
                            <div class="modal fade" id="viewModal{{ $list->id }}" aria-labelledby="myModalLabel" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title"><i class="fa fa-edit"></i>ข่าวประชาสัมพันธ์</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
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
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script type="text/javascript">
    $('#NewsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var title = button.data('title')
        var detail = button.data('detail')

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #news_title').val(title);
        modal.find('.modal-body #news_detail').val(detail);
    })

</script> --}}

@endsection
