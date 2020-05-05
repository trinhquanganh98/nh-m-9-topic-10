@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('role.store') }}">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Quyền
					</div>
					<div class="body_form">
						<div class="input_wrapper">
						<!-- 	<div class="input_title flexY">
								Tên Chức Vụ
							</div>
							<div class="input_form">
								<input type="text" name="name">
							</div>
						</div> -->
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Chức Vụ
							</div>
							<div class="input_form">
								<input type="text" name="display_name">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="checkbox_item_wrapper">
				                @foreach($permissions as $key => $permission)
			                	<?php if ($key == 0): ?>
									<div class="checkbox_item layout_wrapper_02" style="display: none;">
										<div class="I-checkbox checkbox">
											<label>
												<div class="rect">
													<i class="fas fa-check"></i>
												</div>
												<div class="text">
													{{ $permission->display_name }}
												</div>
											</label>
											<input type="checkbox" name="permission[]" value="{{ $permission->id }}" checked>
										</div>
									</div>
			                	<?php else: ?>
			                		<div class="checkbox_item layout_wrapper_02">
										<div class="I-checkbox checkbox">
											<label>
												<div class="rect">
													<i class="fas fa-check"></i>
												</div>
												<div class="text">
													{{ $permission->display_name }}
												</div>
											</label>
											<input type="checkbox" name="permission[]" value="{{ $permission->id }}">
										</div>
									</div>
			                	<?php endif ?>
									
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