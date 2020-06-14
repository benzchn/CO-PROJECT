@extends('layouts.app-admin')

@section('body')
<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <!-- <li><a href="dashboard.php">หน้าแรก</a></li> -->
            <li class="active">คลัง</li>
        </ol>

        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> จัดการประเภทครุภัณฑ์</div>
            </div>  -->
            <!-- /panel-heading -->
            <div class="div-action pull" style="padding-bottom:5px;" align="right">
                {{-- <button class="btn btn-success button1" data-toggle="modal" id="#addCategoriesModalBtn"
                        data-target="addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i>
                        เพิ่มประเภทครุภัณฑ์ </button> --}}
                <button class="btn btn-success button1" data-toggle="modal" data-target="#addCategoriesModal"><i
                        class="glyphicon glyphicon-plus-sign"></i> เพิ่มประเภทครุภัณฑ์</button>
            </div> <!-- /div-action -->
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



                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable" align="center">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:20%;">รหัสประเภทครุภัณฑ์</th>
                                <th>ประเภทครุภัณฑ์</th>
                                <th style="width:20%;">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody class="table table-active">
                             {{-- @if(is_null($categories))

                            @else --}}

                            @foreach ($categories as $list)
                            <tr>
                                <td>{{ $list->categories_code }}</td>
                                <td><a href="/categorieslist/{{ $list->id }}"><label
                                            style="Font-weight:normal;font-size:15px;">{{ $list->categories_name }}</label></a>
                                </td>
                                <td>
                                    <a href="#editCategoriesModal{{$list->id}}" data-toggle="modal" class="btn btn-info btn-mini">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        แก้ไข</a>
                                    <button type="button" class="btn btn-danger" data-catid="{{ $list->id }}"
                                        data-toggle="modal" data-target="#removeCategoriesModal"> <i
                                            class="glyphicon glyphicon-trash"></i> ลบ</button>
                                </td>
                            </tr>

                        </tbody>

                        <!-- edit categories brand -->
                        <div class="modal fade" id="editCategoriesModal{{$list->id}}" aria-labelledby="myModalLabel" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <form class="form-horizontal"
                                        action="{{ route('categories.update',$list->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><i class="fa fa-edit"></i>แก้ไขประเภทครุภัณฑ์</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div id="edit-categories-messages"></div>

                                            <div class="modal-loading div-hide"
                                                style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <div class="edit-categories-result">
                                                {{-- <input type="hidden" name="id" id="id" value=""> --}}
                                                <input type="hidden" name="categories_status" id="categories_status"
                                                    value="">

                                                <div class="form-group">
                                                    <label for="categories_code"
                                                        class="col-sm-4 control-label">รหัสประเภทครุภัณฑ์</label>
                                                    <label class="col-sm-1 control-label">: </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="categories_code"
                                                            placeholder="รหัสประเภท" name="categories_code"
                                                            autocomplete="off" value="{{$list->categories_code}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="categories_name"
                                                        class="col-sm-4 control-label">ชื่อประเภทครุภัณฑ์</label>
                                                    <label class="col-sm-1 control-label">: </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="categories_name"
                                                            placeholder="ชื่อประเภท" name="categories_name"
                                                            autocomplete="off" value="{{$list->categories_name}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /edit brand result -->

                                        </div> <!-- /modal-body -->
                                        <input type="hidden" value="1" id="categories_status" name="categories_status">
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
                        <!-- /categories brand -->

                        <!-- categories brand -->
                        <div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" role="dialog"
                            id="removeCategoriesModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>
                                            ลบประเภทครุภัณฑ์</h4>
                                    </div>
                                    <form action="{{ route('categories.destroy',$list->id) }}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <div class="modal-body">
                                            <p>คุณแน่ใจว่าจะลบ ?</p>
                                        </div>
                                        <div class="modal-footer removeCategoriesFooter">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <i
                                                    class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
                                            <button type="submit" class="btn btn-primary" id="removeCategoriesBtn"
                                                data-loading-text="Loading...">
                                                <i class="glyphicon glyphicon-ok-sign"></i> ยืนยัน</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- /categories brand -->

                        @endforeach
                    </table>
                    <!-- /table -->
                </div>

            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" aria-labelledby="myModalLabel" id="addCategoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form class="form-horizontal" id="submitCategoriesForm" action="{{ route('categories.store') }}"
                method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> เพิ่มประเภทครุภัณฑ์</h4>
                </div>
                <div class="modal-body">

                    <div id="add-categories-messages"></div>

                    <div class="form-group">
                        <label for="categories_code" class="col-sm-4 control-label">รหัสประเภทครุภัณฑ์ </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="categories_code" id="categories_code"
                                placeholder="รหัสประเภท" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->
                    <div class="form-group">
                        <label for="categories_name" class="col-sm-4 control-label">ชื่อประเภทครุภัณฑ์ </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="categories_name" placeholder="ชื่อประเภท"
                                name="categories_name" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->
                    <input type="hidden" name="categories_status" id="categories_status" value="1">
                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" id="clostAddCate" class="btn btn-default" data-dismiss="modal"> <i
                            class="glyphicon glyphicon-remove-sign"></i> ปิด</button>

                    <button type="submit" class="btn btn-primary" autocomplete="off"> <i
                            class="glyphicon glyphicon-ok-sign"></i>
                        บันทึก</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->

{{-- @endif --}}

<script>
    $('#editCategoriesModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var code = button.data('code')
        var name = button.data('name')
        var status = button.data('status')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #categories_code').val(code);
        modal.find('.modal-body #categories_name').val(name);
        modal.find('.modal-body #categories_status').val(status);

    })
    $('#removeCategoriesModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })

</script>


@endsection
