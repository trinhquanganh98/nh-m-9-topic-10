@extends('user.layout')
@section('body')

	<div class="I-form">
		<div class="title">
			Đăng Nhập
		</div>
		<?php //Hiển thị thông báo lỗi?>
		@if ( Session::has('error') )
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>{{ Session::get('error') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
		<form method="post" action="{{ route('customer.postLogin') }}" enctype="multipart/form-data">
			@csrf
		  	<div class="form-group">
		    	<label for="email">Email :</label>
		    	<input type="email" class="form-control" id="email" name="email" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="pwd">Mật Khẩu :</label>
		    	<input type="password" class="form-control" id="pwd" name="password" required>
		  	</div>
		  	<button type="submit" class="btn btn-default">Đăng Nhập</button>
		  	<a href="/customer_register" class="btn btn-default">Đăng kí</a>
		</form> 
	</div>

@endsection()


