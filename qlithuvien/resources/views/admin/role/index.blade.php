@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Phân Quyền Chức Vụ
					</div>
					<div class="title_side">
						<a href="{{ route('role.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <!-- <th>Tên Role</th> -->
					        <th>Chức Vụ</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($listRole as $role)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <!-- <td>{{ $role->name }}</td> -->
					        <td>{{ $role->display_name }}</td>
					        <td>
					        	<a href="{{ route('role.edit', ['id' => $role->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('role.delete', ['id' => $role->id]) }}" class="action_table">
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