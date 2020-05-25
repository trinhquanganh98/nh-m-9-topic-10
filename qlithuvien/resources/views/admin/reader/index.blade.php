@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_02">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Người Dùng Mới
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Họ Và Tên</th>
					        <th>Email</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($user_new as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->name }}</td>
					        <td>{{ $value->email }}</td>
					        <td>
					        	<a href="{{ route('reader.edit', ['id' => $value->user_id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('reader.delete', ['id' => $value->id]) }}" class="action_table">
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
	<div class="layout_wrapper_02">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Tất Cả Người Dùng
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Họ Và Tên</th>
					        <th onclick="sortListDir(2, 1)">Email</th>
					        <th onclick="sortListDir(3, 1)">Cấp Bậc Khách Hàng</th>
					        <th>Sửa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($user as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->name }}</td>
					        <td>{{ $value->email }}</td>
					        <td>{{ $value->classification_name }}</td>
					        <td>
					        	<a href="{{ route('reader.edit', ['id' => $value->user_id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
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
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()