@extends('admin.layout')
@section('body')


<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('item.edit', ['id' => $item->id]) }}" enctype="multipart/form-data">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Thông Tin Sách
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sách
							</div>
							<div class="input_form">
								<input type="text" name="book_name" required="" value="<?php echo $item->book_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tác Giả
							</div>
							<div class="input_form">
								<input type="text" name="book_writer" required="" value="<?php echo $item->book_writer ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Thể Loại
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="category_index" class="select_index" value="<?php echo $item->book_category ?>">
											<input type="hidden" name="category_value" class="select_value" value="<?php echo $item->category_name ?>">
											<div class="select_item"> 
												<?php echo $item->category_name ?>
											</div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($categories as $category)
												<option value="<?php echo $category->id ?>">{{ $category->category_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Hình Ảnh
							</div>
							<div class="input_form image_loader">
								<label class="W100" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-upload"></i>
								</label>
								<div class="image_loading">
									<img src="{{ asset($item->book_image) }}" >
								</div>
								<input type="text" name="book_image" value="<?php echo $item->book_image ?>" style="display: none;">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả
							</div>
							<div class="input_form">

								<textarea class="summernote" name="book_detail" style="min-height: 300px;"><?php echo $item->book_detail ?></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
									$('#LoadImage').on('change', function(e){
									    var img = new Image;
									    img.src = URL.createObjectURL(e.target.files[0]);
									    img.onload = function() {
								        	$('.image_loading').find('img').attr('src', URL.createObjectURL(e.target.files[0]))
								    	}
									})
								</script>
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
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		    <!-- Modal content-->
			    <div class="modal-content">
			      	<div class="modal-body" style="overflow: hidden;">
						<?php foreach ($gallery as $key => $value): ?>
							<div class="I-image">
								<div class="image_wrapper">
									<img src="{{asset($value->image_url)}}">
								</div>
								<div class="image_url">
									{{asset($value->image_url)}}
								</div>
								<div class="image_title">
									<?php echo $value->image_name ?>
								</div>
							</div>
						<?php endforeach ?>
			      	</div>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$('.I-image').on('click', function(e){
				var image = $(this).find('.image_url').text()
		        $('.image_loading').find('img').attr('src', image)
		        $('.image_loader').find('input').attr('value', image)
			})
		</script>
	</div>
</div>
				
@endsection()