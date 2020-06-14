@extends('layouts.app-admin')

@section('body')

    <div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="/admin">หน้าแรก</a></li>
		  <li class="active">Setting</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Setting</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">
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
                <form action="{{ route('user.update',$user->id) }}" method="post" class="form-horizontal">
                    @csrf
                    {{ method_field('patch') }}
					<fieldset>
						<legend>Change Username</legend>

						<div class="changeUsenrameMessages"></div>

						<div class="form-group">
					    <label for="user_id" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Username" value="{{ $user->user_id }}"/>
					    </div>
                      </div>
                      <input type="hidden" id="form" name="form" value="username">

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." > <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

                <form action="{{ route('user.update',$user->id) }}" method="post" class="form-horizontal" >
                    @csrf
                    {{ method_field('patch') }}
					<fieldset>
						<legend>Change Password</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="oldpassword" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Current Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="newpassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="passwordconfirm" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" placeholder="Confirm Password">
					    </div>
                      </div>

                      <input type="hidden" id="form" name="form" value="password">

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->

		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row-->

@endsection
