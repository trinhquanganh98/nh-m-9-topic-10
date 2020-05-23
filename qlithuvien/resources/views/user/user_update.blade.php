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
		<form method="post" action="{{ route('customer.update') }}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="<?php echo $user->id ?>">
		  	<div class="form-group">
		    	<label for="username">Họ Và Tên</label>
		    	<input type="text" class="form-control" id="username" name="name" required value="<?php echo $user->name ?>">
		  	</div>
		  	<div class="form-group">
		    	<label for="email">Email :</label>
		    	<input type="email" class="form-control" id="email" name="email" required value="<?php echo $user->email ?>" disabled>
		  	</div>
		  	<div class="form-group">
		    	<label for="phone">Số Điện Thoại</label>
		    	<input type="text" class="form-control" id="phone" name="phone" required value="<?php echo $user->phone ?>">
		  	</div>
		  	<div class="form-group">
		    	<label for="address">Địa Chỉ</label>
		    	<input type="text" class="form-control" id="address" name="address" required value="<?php echo $user->address ?>">
		  	</div>
		  	<button type="submit" class="btn btn-default">Cập Nhật</button>
		  	<a href="/changePassword" class="btn btn-default">Đổi Mật Khẩu</a>
		</form> 
	</div>

@endsection()