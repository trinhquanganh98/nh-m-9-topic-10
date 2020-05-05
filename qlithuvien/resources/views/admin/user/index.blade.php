@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Nhân Viên
					</div>
					<div class="title_side">
						<a href="{{ route('user.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Tên Nhân Viên</th>
					        <th>Email</th>
					        <th>Chức Vụ</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($listUser as $user)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $user->name }}</td>
					        <td>{{ $user->email }}</td>
					        <td>{{ $user->display_name }}</td>
					        <td>
					        	<a href="{{ route('user.edit', ['id' => $user->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="action_table">
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