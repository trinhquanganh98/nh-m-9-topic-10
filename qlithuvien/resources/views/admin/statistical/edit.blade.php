@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Danh Mục
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Danh Mục
							</div>
							<div class="input_form">
								<input type="text" name="category_name" value="{{ $category->category_name }}">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Select
							</div>
							<div class="select_form">
								<div class="select_wrapper">
									<input type="hidden" name="select_index" class="select_index" value="<?php echo $category->category_status ?>">
									<input type="hidden" name="select_value" class="select_value">
									<div class="select_item">
										<?php if ($category->category_status == 1): ?>
											Hiển Thị
										<?php elseif ($category->category_status == 0): ?>
											Tạm Ẩn
										<?php endif ?>
									</div>
									<div class="select_icon">
										<i class="fas fa-caret-down"></i>
									</div>
									<div class="option_wrapper"> </div>
								</div>
								<select>
									<option>Tạm Ẩn</option>
									<option>Hiển Thị</option>
								</select>
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