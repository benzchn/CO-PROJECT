@extends('layouts.app-personnal')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Personnnel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('body')

    <section role="main" class="content-body">
    <!-- <section role="main" class="content-body"> -->
    <header class="page-header">
        <h2>หน้าแรก</h2>
    </header>
    <!-- end: page -->
    <!-- </section> -->

    <section class="panel">



        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> ข่าวประชาสัมพันธ์</div>
                    </div> <!-- /panel-heading -->
                    <div class="panel-body">

                        <div id="secwrapper">
						<section style='width: 1000px;margin: auto;'>
						   </section>
                        </div>

                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->

    </section>


    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>

                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>

@endsection
