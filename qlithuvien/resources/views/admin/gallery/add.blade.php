@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Ảnh
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								FILE
							</div>
							<div class="input_form image_loader">
								<label class="W100" for="LoadImage">
									<i class="fas fa-upload"></i>
								</label>
								<input type="file" name="image[]" id="LoadImage" multiple="">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="upload-image">
								
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