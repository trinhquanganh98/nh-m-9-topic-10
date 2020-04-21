
<form role="form" action="{{route('book_store')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	tên sách
	<input type="" name="book_name" class="W100">
	<br>
	danh mục
	<input type="" name="book_category" class="W100">
	<br>
	tác giả
	<input type="" name="book_writer" class="W100">
	<br>
	mô tả
	<input type="" name="book_detail" class="W100">
	
	<button type="submit">Thêm</button>
</form>