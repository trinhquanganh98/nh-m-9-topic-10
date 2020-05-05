<!DOCTYPE html>
<html>
	<head>
		<title>Thư Viện Trực Tuyến</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="{{ asset('user/css/bootstrap3.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style-overview.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/item.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<script src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
	</head>
	<body> 
		<div class="main">
			<div class="header">
				<div class="wrapper">
					<div class="I-header">
						<a href="{{ route('customer.index') }}" class="logo">
							Thuvien.org
						</a>
						<form class="search" id="search-form" action="/book_finded" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="" name="book_find">
							<a href="#" onclick="event.preventDefault(); document.getElementById('search-form').submit();">
                                <i class="fas fa-search"></i>
                            </a>
						</form>
						<div class="login">
                        	@guest
								<a href="/customer_login">Đăng Nhập</a>
								<a href="/customer_register">Đăng Kí</a>
                        	@else
								@if(Session::has('customer'))
									<?php echo Session::get('customer')->customer['username'] ?>
								@endif 
								<a href="#">Trang Cá Nhân</a>
								<a href="{{ route('customer.postLogout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Đăng Xuất
                                </a>
                                <form id="logout-form" action="{{ route('customer.postLogout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        	@endguest
						</div>
					</div>
				</div>
			</div>
			<div class="body">
				@yield('body')
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
	<script src="{{ asset('user/js/bootstrap3.js') }}"></script>
	<script src="{{ asset('user/js/effect_custom.js') }}"></script>
</html>


