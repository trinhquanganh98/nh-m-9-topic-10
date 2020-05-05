@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('user.store') }}">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Nhân Viên
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Nhân Viên
							</div>
							<div class="input_form">
								<input type="text" name="name">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Email
							</div>
							<div class="input_form">
								<input type="email" name="email">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mật Khẩu
							</div>
							<div class="input_form">
								<input type="password" name="password">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Nhập Lại Mật Khẩu
							</div>
							<div class="input_form">
								<input type="password" name="confirm_password">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="checkbox_item_wrapper">
			                @foreach($roles as $role)
								<div class="checkbox_item layout_wrapper_02">
									<div class="I-checkbox radio">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												{{ $role->display_name }}
											</div>
										</label>
										<input type="checkbox" name="roles[]" value="{{ $role->id }}">
									</div>
								</div>
			                @endforeach
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Thêm</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
				
@endsection()