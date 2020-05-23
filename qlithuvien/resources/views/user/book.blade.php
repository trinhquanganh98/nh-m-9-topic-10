@extends('user.layout')
@section('body')

	
	
	<div class="I-wrapper_book">
		<div class="wrapper">
			@if ( Session::has('error') )
				<div class="alert alert-danger alert-dismissible" role="alert">
					<strong>{{ Session::get('error') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
			@endif
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
					<div class="book_detail">
						<div class="title_book">
							<div class="image_book">
								<img src="{{ asset($book->book_image) }}">
							</div>
							<div class="infor_book">
								<div class="infor_wrapper">
									<div class="name">
										<?php echo $book->book_name ?>
									</div>
									<div class="writer">
										Tác giả : <span><?php echo $book->book_writer ?></span>
									</div>
									<div class="category">
										Thể Loại : <span><?php echo $book->category_name ?></span>
									</div>
									<div class="view">
										Lượt Xem : <span><?php echo $book->book_view ?></span>
									</div>
									<div class="status is-open">
										Trạng Thái: <span>Còn Sách</span>
									</div>
									<div class="order">
										<a data-toggle="modal" data-target="#order_book" > Đặt Sách </a>
									</div>
								</div>
							</div>
						</div>
						<div class="content_book">
							<?php echo $book->book_detail ?>
						</div>
					</div>
				</div>
				<div class="book_related">
					<div class="related_wrapper">
						<div class="title">
							Sách có liên quan
						</div>
						<div class="content">
							<?php foreach ($book_related as $key => $value): ?>
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
<div id="order_book" class="modal fade" role="dialog">
  	<div class="modal-dialog">
   		<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Xác Nhận Đăng Kí Mượn Sách</h4>
	      	</div>
	      	<div class="modal-footer">
                <form id="order-form" action="{{ route('customer.bookorder') }}" method="post" style="display: none;" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="book_id" value="<?php echo $book->id ?>">
                </form>
	        	<a onclick="event.preventDefault(); document.getElementById('order-form').submit();" class="btn btn-success" data-dismiss="modal">Đăng Kí Mượn</a>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	      	</div>
    	</div>
  	</div>
</div>

@endsection()


