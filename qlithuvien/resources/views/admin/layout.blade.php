<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="{{ asset('css/bootstrap3.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/style-overview.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('js/Chart.js') }}"></script>
		<script src="{{ asset('js/utils.js') }}"></script>
		<script src="{{ asset('js/analyser.js') }}"></script>
		<script src="{{ asset('js/analytics.js') }}"></script>
	</head>
	<body> 
		<header>
			<div class="I-user_header">
				<div class="wrapper">
					<a href="#" class="logo_wrapper">
						Logo
					</a>
					<div class="user_wrapper">
						<a href="#" class="message">
							<i class="far fa-envelope"></i>
						</a>
						<a href="#" class="notification">
							<i class="far fa-bell"></i>
						</a>
							@if(Session::has('customer'))
								<?php echo Session::get('customer')->customer['username'] ?>
							@endif 
						<a href="#" class="user">
							<i class="far fa-user"></i>
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</div>
			</div>
			<div class="I-user_nav">
				<div class="wrapper">
					<div class="user_nav_wrapper">
						<div class="list_nav">
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-home"></i>
								</div>
							</div>
							<div class="item_nav">
								<a href="/category" class="link_nav">
									<i class="fas fa-bookmark"></i>
								</a>
							</div>
							<div class="item_nav">
								<a href="/warehouse" class="link_nav">
									<i class="fas fa-download"></i>
								</a>
							</div>
							<div class="item_nav">
								<a href="/item" class="link_nav">
									<i class="fas fa-book"></i>
								</a>
							</div>
							<div class="item_nav">
								<a href="/gallery" class="link_nav">
									<i class="fas fa-images"></i>
								</a>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-clone"></i>
								</div>
								<div class="dropdown">
									<a href="/borrow" class="sub_item">
										Đặt Mượn
									</a>
									<a href="/borrow_back" class="sub_item">
										Hoàn Trả
									</a>
									<a href="/borrow_all" class="sub_item">
										Lịch Sử
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-users"></i>
								</div>
								<div class="dropdown">
									<a href="/reader" class="sub_item">
										Thông Tin Người Dùng
									</a>
									<a href="/user_class" class="sub_item">
										Phân Loại Người Dùng
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-user"></i>
								</div>
								<div class="dropdown">
									<a href="/roles" class="sub_item">
										Quản Lí Chức Vụ
									</a>
									<a href="/users" class="sub_item">
										Quản Lí Nhân Viên
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="wrapper">
				@yield('body')
			</div>
		</main>
		<footer>
			
		</footer>
	</body>
	<script src="{{ asset('js/bootstrap3.js') }}"></script>
	<script src="{{ asset('js/effect_custom.js') }}"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</html>


