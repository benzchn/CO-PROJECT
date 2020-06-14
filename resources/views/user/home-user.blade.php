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

                            <h2 class="text-center">** ไม่มีข่าวประชาสัมพันธ์ **</h2>

                            @else
                            {{-- {{ dd($news) }} --}}
                            @foreach ($news as $list)
                            <article id='featured'>
                                <div style="width: 264px;height: 250px;">

                                    @if (is_null($list->news_image))

                                    @else
                                    <div style='display: flex; justify-content: center; align-items: center;'>
                                        <a href=''><img src="{{ asset('images/' . $list->news_image) }}"
                                                style='width:100px;'></a>
                                    </div>
                                    @endif
                                    <h3 style='color:black;'>{{ $list->news_title }}&nbsp;<img
                                            src='http://oxygen.readyplanet.com/images/column_1303576852/icon0002.gif'
                                            width='25px' /></h3>
                                    <p>ประกาศเมื่อ : {{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}
                                    </p>
                                    <p>โดย : {{ $list->news_create }}</p>
                                    <a class='btn btn-outline-primary' data-title="{{ $list->news_title }}"
                                    data-detail="{{ $list->news_detail }}" data-toggle='modal'
                                    data-target="#NewsModal">อ่านเพิ่มเติม-></a>
                                    {{-- <button class='btn btn-outline-primary' onclick="myFunction()">อ่านเพิ่มเติม-></button> --}}
                                    {{-- <a href="#" id="mybtn" data-toggle='modal' data-target="#NewsModal" onclick="myFunction({{ $list->news_title }})">อ่านเพิ่มเติม-></a> --}}
                                </div>


                            </article>
                            @endforeach
                            @endif
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
  <div class="modal fade" id="NewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class='glyphicon glyphicon-edit'></i> ข่าวประชาสัมพันธ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span onclick="document.getElementById('NewsModal').style.display='none'"
                        class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <legend></legend>
                <div class="form-row">
                    <h3><label for="news_title">หัวข้อ : </label>
                        <span for="news_title" id="news_title">{{ $list->news_title }}</span></h3>
                </div>

                <div class="form-row">
                    <img src="{{ asset('images/' . $list->news_image) }}" style='width:250px;'>
                </div>

                <div class="form-row">
                    <h3><label for="news_detail">รายละเอียด :</label>
                        <span>{{ $list->news_detail }}</span></h3>
                </div>
                <div class="form-row">
                    <h3><label for="create_at">ประกาศเมื่อ :</label>
                        <span>{{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }} </span></h3>
                </div>
                <div class="form-row">
                    <h3><label for="news_create">ประกาศเมื่อ :</label>
                        <span>{{ $list->news_create }}</span></h3>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}

<script type="text/javascript">


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

</script>

@endsection
