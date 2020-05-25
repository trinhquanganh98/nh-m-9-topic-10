@extends('admin.layout')
@section('body')


<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Đăng Kí Mượn Sách
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead class="search_table">
			      		<tr>
					        <th></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="date" name=""></th>
					        <th ><button class="search_button borrow">Search</button></th>
				      	</tr>
			    	</thead>
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 2)">ID</th>
					        <th onclick="sortListDir(1, 2)">Tên Người Mượn</th>
					        <th onclick="sortListDir(2, 2)">SDT</th>
					        <th onclick="sortListDir(3, 2)">Tên Sách</th>
					        <th onclick="sortListDir(4, 2)">Ngày Đặt</th>
					        <th>Cập Nhật</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_borrow">
               			@foreach($borrow as $key => $value)
				      	<tr class="item_borrow">
					        <td>{{ $key + 1 }}</td>
					        <td>{{ $value->username }}</td>
					        <td>{{ $value->userphone }}</td>
					        <td>{{ $value->book_name  }}</td>
					        <td>{{ substr($value->created_at, 0, 10) }}</td>
					        <td>
					        	<a href="{{ route('borrow.edit', ['id' => $value->id]) }}" class="action_table">
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
<script src="{{ asset('js/table.js') }}"></script>		
<script src="{{ asset('js/sort_table.js') }}"></script>
@endsection()