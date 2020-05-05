@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Thông Tin
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Nhân Viên
							</div>
							<div class="input_form">
								<input type="text" name="name" value="{{ $user->name }}">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Email
							</div>
							<div class="input_form">
								<input type="text" name="email" value="{{ $user->email }}">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="checkbox_item_wrapper">
			                @foreach($roles as $role)
								<div class="checkbox_item layout_wrapper_02">
									<div class="I-checkbox radio">
										<label class="{{ $listRoleOfUser->contains($role->id) ? 'is-select' : '' }}">
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												{{ $role->display_name }}
											</div>
										</label>
										<input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $listRoleOfUser->contains($role->id) ? 'checked' : '' }}>
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