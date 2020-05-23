@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Cấp Bậc
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Cấp Bậc
							</div>
							<div class="input_form">
								<input type="text" name="classification_name" value="<?php echo $user_class->classification_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Số Lượng Có Thể Mượn
							</div>
							<div class="input_form">
								<input type="text" name="classification_borrow" value="<?php echo $user_class->can_borrow ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Cập Nhật</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
				
@endsection()