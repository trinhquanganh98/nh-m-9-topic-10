
$('.search_button').on('click', function(){
    console.log($(this).hasClass('borrow_back'))
    var URL = "";
    if ($(this).hasClass('borrow')) {
        URL = "/borrow/getBorrow"
    }else if ($(this).hasClass('borrow_back')) {
        URL = "/borrow_back/getBorrow"
    }else if ($(this).hasClass('borrow_all')) {
        URL = "/borrow_all/getBorrow"
    }
	rows = $('.search_table').find('.input')
	col = []
	for (i = 0; i < rows.length; i++) {
		col[i] = rows.eq(i).find('input').val()
	}
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: URL,
        type: "GET",
        data: {
            value: col,
        },
        success:function(data){ //dữ liệu nhận về
            console.log(data)
            $('.item_borrow').remove();
            for (var i = 0; i < data.length; i++) {
                $('.list_borrow').append( 
                    '<tr class="item_borrow">'						+
				    '    <td>'+ (i - -1) +'</td>'					+
				    '    <td>'+ data[i].username +'</td>'			+
				    '    <td>'+ data[i].userphone +'</td>'			+
				    '    <td>'+ data[i].book_name +'</td>'			+
				    '    <td>'+ data[i].created_at +'</td>'			+
			      	'</tr> '                              
                );
            }          
            // $('.list_image_library').append(component);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
})
