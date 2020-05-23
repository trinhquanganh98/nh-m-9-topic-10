@extends('user.layout')
@section('body')

	<div class="I-form">
		<div class="title">
			Thông Tin Cá Nhân
		</div>
		@if ( Session::has('error') )
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>{{ Session::get('error') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
		@if ( Session::has('success') )
			<div class="alert alert-success alert-dismissible" role="alert">
				<strong>{{ Session::get('success') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
		<form method="post" action="{{ route('customer.changePassword') }}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="<?php echo $user->id ?>">
		  	<div class="form-group">
		    	<label for="oldPass">Mật Khẩu Cũ :</label>
		    	<input type="password" class="form-control" id="oldPass" name="current-password" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="newPass">Mật Khẩu Mới :</label>
		    	<input type="password" class="form-control" id="newPass" name="password" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="password_confirmation">Nhập Lại Mật Khẩu :</label>
		    	<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
		  	</div>
		  	<button type="submit" class="btn btn-default">Cập Nhật</button>
		</form> 
	</div>

@endsection()