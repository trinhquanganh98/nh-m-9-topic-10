
	<a href="/book_create" class="W100">Thêm Sản Phẩm</a>
	<table class="table">
	    <thead>
	      	<tr>
		        <th> Tên </th>
		        <th> Hình Ảnh </th>
		        <th> Danh Mục </th>
		        <th> Lượt Xem </th>
		        <th> Tác Giả </th>
		        <th> Trạng Thái </th>
		        <th> Chi Tiết </th>
		        <!-- <th> Sửa </th> -->
		        <th> Xóa </th>
	      	</tr>
	    </thead>
	    <tbody>
	    	<?php foreach ($book as $key => $value): ?>
	      		<tr>
	      			<td><?php echo $value->book_name ?></td>
	      			<td><?php echo $value->book_image ?></td>
	      			<td><?php echo $value->book_category ?></td>
	      			<td><?php echo $value->book_view ?></td>
	      			<td><?php echo $value->book_writer ?></td>
	      			<td><?php echo $value->book_status ?></td>
	      			<td><?php echo $value->book_detail ?></td>
		            <!-- <td> <a class="btn btn-primary" href="/AdminEditItem/<?php echo $value->id; ?>">Sửa</a></td> -->
		            <td> <a class="btn btn-danger" href="/book_delete/<?php echo $value->id; ?>">Xóa</a></td>
	      		</tr>
	      	<?php endforeach ?>
	    </tbody>
	</table>