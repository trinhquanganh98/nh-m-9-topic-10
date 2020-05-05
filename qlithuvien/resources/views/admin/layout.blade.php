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
								<div class="dropdown">
									<a href="#" class="sub_item">
										Trang chủ
									</a>
									<a href="#" class="sub_item">
										Trang Cá Nhân
									</a>
									<a href="/category" class="sub_item">
										Danh mục
									</a>
									<a href="/resource" class="sub_item">
										Nhà Cung Cấp
									</a>
									<a href="/trademark" class="sub_item">
										Thương Hiệu
									</a>
									<a href="/item" class="sub_item">
										Sản Phẩm
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-archive"></i>
								</div>
								<div class="dropdown">
									<a href="#" class="sub_item">
										
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-book"></i>
								</div>
								<div class="dropdown">
									<a href="#" class="sub_item">
										
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-bookmark"></i>
								</div>
								<div class="dropdown">
									<a href="#" class="sub_item">
										
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-clone"></i>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-comment"></i>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-file"></i>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-images"></i>
								</div>
								<div class="dropdown">
									<a href="/gallery" class="sub_item">
										Thư Viện Ảnh
									</a>
								</div>
							</div>
							<div class="item_nav">
								<div class="link_nav">
									<i class="fas fa-users"></i>
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


