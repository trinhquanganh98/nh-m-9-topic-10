@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('user_class.store') }}">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Cấp Bậc
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Cấp Bậc
							</div>
							<div class="input_form">
								<input type="text" name="classification_name">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Số Lượng Có Thể Mượn
							</div>
							<div class="input_form">
								<input type="text" name="classification_borrow">
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