@extends('user.layout')
@section('body')
<div class="I-user_borrow">
	<div class="wrapper">
		@if ( Session::has('success') )
			<div class="alert alert-success alert-dismissible" role="alert">
				<strong>{{ Session::get('success') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
		@if ( Session::has('error') )
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>{{ Session::get('error') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
		<div class="user_borrow_wrapper">
			<div class="book_borrow">
				<div class="borrow_title">
					<div class="text">
						Sách Đang Đặt Mượn
					</div>
					<div class="action">
						<a href="">Xem Tất Cả</a>
					</div>
				</div>
				<div class="borrowing">
					<div class="borrowing_wrapper">
						<div class="borrowing_header">
							<div class="book_id">
								ID
							</div>
							<div class="book_title">
								Tên Sách
							</div>
							<div class="book_time">
								Ngày Đặt
							</div>
							<div class="book_time">
								Ngày Trả
							</div>
							<div class="book_status">
								Trạng Thái
							</div>
						</div>
						<div class="borrowing_body">
							<?php foreach ($book_borrow as $key => $value): ?>
								<div class="borrowing_item">
									<div class="book_id">
										{{ $key + 1 }}
									</div>
									<div class="book_title">
										{{ $value->book_name }}
									</div>
									<div class="book_time">
										{{ substr($value->created_at, 0, 10) }}
									</div>
									<div class="book_time">
										{{ substr($value->date_back, 0, 10) }}
									</div>
									<div class="book_status">
										@if($value->status == -1)
											<span class="outdate">Đã Quá Hạn</span>
										@elseif($value->status == 1)
											<span class="waiting">Đang Chờ</span>
										@elseif($value->status == 2)
											<span class="success">Đang Mượn</span>
										@endif
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<div class="borrow_title">
					<div class="text">
						Lịch Sử Đã Mượn
					</div>
					<div class="action">
						<a href="">Xem Tất Cả</a>
					</div>
				</div>
				<div class="borrowed">
					<div class="borrowing_wrapper">
						<div class="borrowing_header">
							<div class="book_id">
								ID
							</div>
							<div class="book_title">
								Tên Sách
							</div>
							<div class="book_time">
								Ngày Đặt
							</div>
							<div class="book_time">
								Ngày Trả
							</div>
							<div class="book_status">
								Trạng Thái
							</div>
						</div>
						<div class="borrowing_body">
							<?php foreach ($book_borrowed as $key => $value): ?>
								<div class="borrowing_item">
									<div class="book_id">
										{{ $key + 1 }}
									</div>
									<div class="book_title">
										{{ $value->book_name }}
									</div>
									<div class="book_time">
										{{ substr($value->created_at, 0, 10) }}
									</div>
									<div class="book_time">
										{{ substr($value->date_back, 0, 10) }}
									</div>
									<div class="book_status">
										@if($value->status == 0)
											<span class="done">Đã Trả</span>
										@endif
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<div class="user_detail">
				<div class="user_title">
					<div class="text">
						Thông Tin Cá Nhân
					</div>
				</div>
				<div class="user_content">
					<div class="item">
						<div class="title">
							Họ Và Tên :
						</div>
						<div class="data">
							<?php echo $user->name ?>
						</div>
					</div>
					<div class="item">
						<div class="title">
							Email :
						</div>
						<div class="data">
							<?php echo $user->email ?>
						</div>
					</div>
					<div class="item">
						<div class="title">
							Số Điện Thoại :
						</div>
						<div class="data">
							<?php echo $user->phone ?>
						</div>
					</div>
					<div class="item">
						<div class="title">
							Địa Chỉ :
						</div>
						<div class="data">
							<?php echo $user->address ?>
						</div>
					</div>
					@if ( $user_book != null )
					<div class="item">
						<div class="title">
							Tài Khoản :
						</div>
						<div class="data">
							<?php echo $user_book->classification_name ?>
						</div>
					</div>
					<div class="item">
						<div class="title">
							Đang Mượn :
						</div>
						<div class="data">
							<?php echo $user_book->user_borrow ?>
						</div>
					</div>
					<div class="item">
						<div class="title">
							Mượn Tối Đa :
						</div>
						<div class="data">
							<?php echo $user_book->can_borrow ?>
						</div>
					</div>
					@else
					<div class="item">
						<div class="title">
							Trạng Thái :
						</div>
						<div class="data">
							Vui Lòng Đến Thư Viện Để Kích Hoạt Tài Khoản
						</div>
					</div>
					@endif
					<div class="action">
						<a href="{{ route('customer.edit') }}">Sửa Thông Tin Cá Nhân</a>
					</div>
					<div class="action">
						<a href="{{ route('customer.changePassword') }}">Đổi Mật Khẩu</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()