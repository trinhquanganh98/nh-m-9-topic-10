@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Danh Mục
					</div>
					<div class="title_side">
						<a href="{{ route('resource.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Nơi Cung Cấp</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($resources as $resource)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $resource->resource_name }}</td>
					        <td>
					        	<a href="{{ route('resource.edit', ['id' => $resource->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('resource.delete', ['id' => $resource->id]) }}" class="action_table">
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