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
	$('.warehouse_wrapper').append(component);
	$('.action_table').on('click', function(){
		$(this).parent().parent().remove()
	})
	$(this).parent().parent().parent().find('.select_index').val(null)
	$(this).parent().parent().parent().find('.select_value').val(null)
	$(this).parent().parent().parent().find('.item_amount_input').val(null)
	$(this).parent().parent().parent().find('.select_item').html(null)
})


function sortListDir(n) {
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.getElementById("myTable");
	switching = true;
	dir = "asc";
	while (switching) {
	    switching = false;
	    rows = table.rows;
	    for (i = 1; i < (rows.length - 1); i++) {
	        shouldSwitch = false;
	        x = rows[i].getElementsByTagName("TD")[n];
	        y = rows[i + 1].getElementsByTagName("TD")[n];
	        if (dir == "asc") {
	            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
	                shouldSwitch = true;
	                break;
	            }
	        } else if (dir == "desc") {
	            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
	                shouldSwitch = true;
	                break;
	            }
	        }
	    }
	    if (shouldSwitch) {
	        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
	        switching = true;
	        switchcount++;
	    } else {
	        if (switchcount == 0 && dir == "asc") {
	            dir = "desc";
	            switching = true;
	        }
	    }
	}
}



