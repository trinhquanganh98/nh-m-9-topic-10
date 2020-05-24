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
					<input type="hidden" name="id" value="<?php echo $user->user_id ?>">
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Người Dùng
							</div>
							<div class="input_form">
								<input type="text" name="reader_name" value="<?php echo $user->name ?>">
							</div>
						</div>
						
						<div class="input_wrapper">
							<div class="checkbox_item_wrapper">
			                @foreach($reader as $key => $value)
								<div class="checkbox_item layout_wrapper_02">
									<div class="I-checkbox radio">
										<label class="{{ $user->user_classification == $value->id ? 'is-select' : '' }}">
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												{{ $value->classification_name }}
											</div>
										</label>
										<input type="checkbox"  name="reader" value="{{ $value->id }}" {{ $user->user_classification == $value->id ? 'is-select' : '' }}>
									</div>
								</div>
			                @endforeach
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