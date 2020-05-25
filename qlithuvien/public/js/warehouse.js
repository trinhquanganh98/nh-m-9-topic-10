$('.add_new_warehouse').on('click', function(){
	var id = $(this).parent().parent().parent().find('.select_index').val()
	var name = $(this).parent().parent().parent().find('.select_value').val()
	var amount = $(this).parent().parent().parent().find('.item_amount_input').val()
	console.log(amount)
    var component =   	
    	'<tr>'
    +  		'<input type="hidden" name="item_id[]" value="'+id+'">'
	+       '<td>'+name+'</td>'
	+       '<td><input type="hidden" name="item_amount[]" value="'+amount+'">'+amount+'</td>'
	+       '<td>'
	+       	'<a class="action_table">'
	+        		'<i class="far fa-trash-alt"></i>'
	+        	'</a>'
	+       '</td>'
    +  	'</tr>'
    if (id != '' && name != '' && amount != '') {
		$('.warehouse_wrapper').append(component);
		$(this).parent().parent().parent().find('.select_index').val(null)
		$(this).parent().parent().parent().find('.select_value').val(null)
		$(this).parent().parent().parent().find('.item_amount_input').val(null)
		$(this).parent().parent().parent().find('.select_item').html(null)
	}
	$('.action_table').on('click', function(){
		$(this).parent().parent().remove()
	})
})



