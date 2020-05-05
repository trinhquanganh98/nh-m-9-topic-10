@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					Table Name
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
				        <th>Firstname</th>
				        <th>Lastname</th>
				        <th>Email</th>
				        <th>Status</th>
				        <th>edit</th>
				        <th>delete</th>
			      	</tr>
			    	</thead>
			    	<tbody>
				      	<tr>
					        <td>John</td>
					        <td>Doe</td>
					        <td>john@example.com</td>
					        <td>
					        	<div class="status_table bg_success text_light">
					        		Process
					        	</div>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
				      	</tr>
			      		<tr>
					        <td>Mary</td>
					        <td>Moe</td>
					        <td>mary@example.com</td>
					        <td>
					        	<div class="status_table bg_warning text_light">
					        		Pending
					        	</div>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
			      		</tr>
			      		<tr>
					        <td>July</td>
					        <td>Dooley</td>
					        <td>july@example.com</td>
					        <td>
					        	<div class="status_table bg_danger text_light">
					        		Close
					        	</div>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="#" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
			      		</tr>
			    	</tbody>
			  	</table>
			  	<div class="table_pagination">
			  		<ul class="pagination">
					  	<li><a href="#">1</a></li>
					  	<li><a href="#">2</a></li>
					  	<li><a href="#">3</a></li>
					  	<li><a href="#">4</a></li>
					  	<li><a href="#">5</a></li>
					</ul> 
			  	</div>
			</div>
		</div>
	</div>
</div>
				
@endsection()