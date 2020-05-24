
$('.image_loader').on('click', function(){
    $('.list_image_library').find('.I-image').remove();                                   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/gallery/getLibrary",
        type: "GET",
        success:function(data){ //dữ liệu nhận về
            // console.log(data)
            for (var i = 0; i < data.length; i++) {
                 console.log(data[i].image_url)
                $('.list_image_library').append( 
                    '<div class="I-image">'                     +
                    '    <div class="image_wrapper">'           +
                    '        <img src="http://' + window.location.host + '/' + data[i].image_url + '">' +
                    '    </div>'                                +
                    '    <div class="image_url">'               +
                    '       http://' + window.location.host + '/' + data[i].image_url                   +
                    '    </div>'                                +
                    '    <div class="image_title">'             +
                            data[i].image_name                  +
                    '    </div>'                                
                );
            }                
            $('.I-image').on('click', function(e){
                var image = $(this).find('.image_url').text()
                $('.image_loading').find('img').attr('src', image)
                $('.image_loader').find('input').attr('value', image)
                
                var item = $(this).find(".image_url")[0];
                var range = document.createRange();
                range.selectNode(item);
                window.getSelection().removeAllRanges(); // clear current selection
                window.getSelection().addRange(range); // to select text
                document.execCommand("copy");
                window.getSelection().removeAllRanges();// to deselect
            })
            // $('.list_image_library').append(component);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })

})    


