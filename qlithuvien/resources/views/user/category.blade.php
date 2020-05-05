@extends('user.layout')
@section('body')

	<div class="I-wrapper_book">
		<div class="wrapper">
			<div class="sidebar">
				<div class="sidebar_wrapper">
					<div class="title">
						Thể Loại Sách
					</div>
					<ul>
						<li>
							<a href="/danh-muc">
								<div class="icon">
									<i class="fas fa-bookmark"></i>
								</div>
								<div class="text">
									Tất Cả
								</div>
							</a>
						</li>
						<?php foreach ($categories as $key => $value): ?>
						<li>
							<a href="/danh-muc/<?php echo $value->id ?>">
								<div class="icon">
									<i class="fas fa-bookmark"></i>
								</div>
								<div class="text">
									<?php echo $value->category_name ?>
								</div>
							</a>
						</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<div class="content">
				<div class="content_wrapper">
					<div class="title">
						<?php echo $category_title ?>
					</div>
					<div class="list_book_wrapper">
						<div class="list_book">
							<?php foreach ($books as $key => $value): ?>
								<div class="book_wrapper">
									<a href="{{ route('customer.book', ['id' => $value->id]) }}" class="I-book">
										<div class="book_image">
											<img src="{{ asset($value->book_image) }}">
										</div>
										<div class="book_title">
											<?php echo $value->book_name ?>
										</div>
									</a>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection()


