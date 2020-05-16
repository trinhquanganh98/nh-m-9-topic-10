@extends('admin.layout')
@section('body')

<div class="I-layout flexX overflow-visible">
	<div class="layout_wrapper_01">
		<div class="I-form_input">
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Nhập Sản Phẩm
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Sản Phẩm - Số Lượng
							</div>
						</div>
						<div class="input_wrapper">
							<div class="row">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="category_index" class="select_index">
											<input type="hidden" name="category_value" class="select_value">
											<div class="select_item"> </div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper"> </div>
										</div>
										<select>
				                			@foreach($items as $item)
												<option value="<?php echo $item->id ?>">{{ $item->book_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
									<div class="input_form">
										<input type="text" name="amount" required="" class="item_amount_input">
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
									<div class="input_button">
										<button class="bg_primary text_light add_new_warehouse" type="button">Thêm Đối Tượng</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form method="post" action="{{ route('warehouse.store') }}" id="warehouse_form">
	@csrf
	<div class="I-layout">
		<div class="layout_wrapper_01">
			<div class="I-table">
				<div class="table_wrapper">
					<div class="title_table">
						<div class="title_name">
							Các Sản Phẩm
						</div>
						<div class="title_side">
							<button class="I-button btn-success text_light" data-toggle="modal" data-target="#input_warehouse" type="button">Nhập Kho</button>
						</div>
					</div>
					<table class="table table-bordered" id="myTable">
				    	<thead>
				      		<tr>
						        <th onclick="sortListDir(0)">Tên Sản Phẩm</th>
						        <th onclick="sortListDir(1)">Số Lượng</th>
						        <th>Xóa</th>
					      	</tr>
				    	</thead>
				    	<tbody class="warehouse_wrapper">

				    	</tbody>
				  	</table>
				</div>
			</div>
		</div>
	</div>
</form>
<div id="input_warehouse" class="modal fade" role="dialog">
  	<div class="modal-dialog">
   		<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Xác Nhận Nhập Kho Dữ Liệu</h4>
	      	</div>
	      	<div class="modal-footer">
	        	<a onclick="event.preventDefault(); document.getElementById('warehouse_form').submit();" type="button" class="btn btn-success" data-dismiss="modal">Nhập Kho</a>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	      	</div>
    	</div>
  	</div>
</div>
<script src="{{ asset('js/warehouse.js') }}"></script>
				
@endsection()