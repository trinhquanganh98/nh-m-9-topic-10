@extends('user.layout')
@section('body')

	<div class="I-body_list_category">
		<div class="wrapper">
			<div class="title">
				Các Danh Mục Sách Hiện Có
			</div>
			<div class="content">
				<ul>
					<?php foreach ($categories as $key => $category): ?>
						<li><a href="/danh-muc/<?php echo $category->id ?>"><?php echo $category->category_name ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="I-body_list_book">
		<div class="wrapper">
			<div class="title">
				Sách Mới
			</div>
			<div class="content">
				<?php foreach ($new_item as $key => $value): ?>
					<div class="book_wrapper">
						<a href="sach/<?php echo $value->id ?>" class="I-book">
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
	<div class="I-body_list_book">
		<div class="wrapper">
			<div class="title">
				Được xem nhiều nhất
			</div>
			<div class="content">
				<?php foreach ($most_view_item as $key => $value): ?>
					<div class="book_wrapper">
						<a href="sach/<?php echo $value->id ?>" class="I-book">
							<div class="book_image">
								<img src="{{ asset($value->book_image) }}">
							</div>
							<div class="book_title">
								<?php echo $value->book_name ?>
							</div>
							<?php echo $value->book_view .' lượt xem' ?>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div class="I-body_list_book">
		<div class="wrapper">
			<div class="title">
				Được xem nhiều nhất
			</div>
			<div class="content">
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_01.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_02.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_02.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="I-body_list_book">
		<div class="wrapper">
			<div class="title">
				Được xem nhiều nhất
			</div>
			<div class="content">
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_01.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_02.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_02.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
				<div class="book_wrapper">
					<a href="#" class="I-book">
						<div class="book_image">
							<img src="images/book_03.png">
						</div>
						<div class="book_title">
							Khi Người Ta Tư Duy
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

@endsection()


