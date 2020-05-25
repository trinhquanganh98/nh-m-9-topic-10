@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Lịch Sử Nhập Kho
					</div>
					<div class="title_side">
						<a href="{{ route('warehouse.add') }}" class="I-button bg_primary text_light">Nhập Kho</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Tên Người Nhập Kho</th>
					        <th onclick="sortListDir(2, 1)">Tên sách </th>
					        <th onclick="sortListDir(3, 1)">Số Lượng Sản Phẩm</th>
					        <th onclick="sortListDir(4, 1)">Thời Gian</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($warehouse as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->username }}</td>
					        <td>{{ $value->book_name }}</td>
					        <td>{{ $value->qty_item }}</td>
					        <td>{{ $value->updated_at  }}</td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/warehouse.js') }}"></script>
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()