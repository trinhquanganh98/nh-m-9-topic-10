@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Cập Nhật Trạng Thái
					</div>
					<input type="hidden" name="id" value="<?php echo $borrow->id ?>">
					<input type="hidden" name="book_id" value="<?php echo $borrow->book_id ?>">
					<input type="hidden" name="user_id" value="<?php echo $borrow->user_id ?>">
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Người Đọc
							</div>
							<div class="input_form">
								<input type="text" name="username" value="<?php echo $borrow->username ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Số Điện Thoại
							</div>
							<div class="input_form">
								<input type="text" name="userphone" value="<?php echo $borrow->userphone ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sách
							</div>
							<div class="input_form">
								<input type="text" name="book_name" value="<?php echo $borrow->book_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Ngày Đặt
							</div>
							<div class="input_form">
								<input type="text" name="created_at" value="<?php echo substr($borrow->created_at, 0, 10) ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Trạng Thái
							</div>
							<div class="input_form">
								<select name="status_borrow">
									<option value="1" selected="">Đang Chờ</option>
									<option value="2">Xác Nhận</option>
									<option value="0">Hủy</option>
								</select>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button type="submit" class="bg_success text_light">Cập Nhật</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
				
@endsection()