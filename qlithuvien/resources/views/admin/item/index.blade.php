@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Kho Sách
					</div>
					<div class="title_side">
						<a href="{{ route('item.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Tên</th>
					        <th>Danh mục</th>
					        <th>Tác Giả</th>
					        <th>Trạng Thái</th>
					        <th>Lượt Xem</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($items as $item)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->book_name }}</td>
					        <td>{{ $item->category_name }}</td>
					        <td>{{ $item->book_writer  }}</td>
					        <td>{{ $item->book_status }}</td>
					        <td>{{ $item->book_view }}</td>
					        <td>
					        	<a href="{{ route('item.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.delete', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
				
@endsection()