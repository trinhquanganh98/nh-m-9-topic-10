$('.I-checkbox').each(function(index){
    if($(this).find('input').prop("checked")){
		$(this).parent().find('label').addClass('is-select')
	}
});
$('.I-checkbox.checkbox').find('label').on('click', function(){
	if($(this).parent().find('input').prop("checked") == false){
		$(this).addClass('is-select')
		$(this).parent().find('input').prop("checked", true)
	}else{
		$(this).parent().find('input').prop("checked", false)
		$(this).removeClass('is-select')
	}
})
$('.I-checkbox.radio').find('label').on('click', function(){
	$(this).parent().parent().parent().find('input').prop("checked", false);
	$(this).parent().parent().parent().find('label').removeClass('is-select')
	
	if($(this).parent().find('input').prop("checked") == false){
		console.log($(this))
		$(this).parent().find('input').prop("checked", true)
		$(this).addClass('is-select')
	}else{
		console.log(2)
		$(this).parent().find('input').prop("checked", false)
		$(this).removeClass('is-select')
	}
})

$('body').on('click', function(){
	if (!$('.select_form').hasClass('focus')) {
		$('.select_form').removeClass('is-open')
	}
})
// $('.I-checkbox').find('label').on('click', function(){
// 	$(this).toggleClass('is-select')
// })
$('.select_form').on('click', function(){
	if ($(this).hasClass('is-open')) {
		$(this).removeClass('is-open')
	}else{
		$('.select_form').removeClass('is-open')
		$(this).addClass('is-open')
	}
})
$('.select_form').on('mouseenter', function() {
    $(this).addClass('focus');
})
$('.select_form').on('mouseleave', function() {
    $(this).removeClass('focus');
})
$( ".select_form" ).each(function( index ) {
  	var option = []; 
  	var id_option =[];
  	$(this).find('option').each(function(i, selected){ 
  		id_option[i] = $(this).val();
        option[i] = $(selected).text(); 
    });
  	for (var i = 0; i < option.length; i++) {
  		$(this).parent().find('.option_wrapper').append(
			'<div class="option_item">'
			+	'<div class="option_text" id_option=\"'+id_option[i]+'\">'
			+ 		option[i]
			+ 	'</div>'
			+ '</div>'
  		)
  	}
	$('.option_item').on('click', function(){
		var value = $(this).find('.option_text').text()
		var index = $(this).find('.option_text').attr('id_option')
		$(this).parent().parent().find('.select_item').text(value)
		$(this).parent().parent().find('.select_value').val(value)
		$(this).parent().parent().find('.select_index').val(index)
	})
});

// copy clipboard multi
$('.I-image').click(function(event){
	// console.log(this)
	// console.log($(this).find(".image_url")[0])
	var item = $(this).find(".image_url")[0];
    var range = document.createRange();
    range.selectNode(item);
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
});


$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
        	    	$('.upload-image').append(
						'<div class="I-image">' +
						'	<div class="image_wrapper">' +
								'<img src="'+ event.target.result +'">'	+
						'	</div>' +
						'</div>'					
			    		); 
                    }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#LoadImage').on('change', function() {
        imagesPreview(this, '.upload-image');
    });
});

