$(document).ready(function() {

    $('.img_add').hide();
    $('#img_add').click(function()
    {
        if ( $("#img_add").prop("checked"))
            $('.img_add').show();
        else
            $('.img_add').hide();
    });

    if ( $("#img_add").prop("checked"))
        $('.img_add').show();



    $('#page_click').click(function() {
        var link_id = document.getElementById("news_list");
        link_id.innerHTML = "Loading...";


    });

    $('#add_news').click(function() {
        var link_id = document.getElementById("news_list");
        link_id.innerHTML = "Loading...";

        $("#add_news_now")[0].click();

    });

    $('#add_slider').click(function() {
        var link_id = document.getElementById("news_list");
        link_id.innerHTML = "Loading...";

        $("#add_slider_now")[0].click();

    });



	$('form').submit(function(event) {
		var json;
        var type = $(this).attr("data");
        var id_news = $(this).attr("id-news");
        var id_img = $(this).attr("id-img");

		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
                $('#clear_title').val("");
                $('#clear_desc').val("");

				if(type == "pages_news") {
                    $('#news_list').html(result);
                }else if(type == "add_news"){
                    $("#add_news_now")[0].click();
                    //$('.popup').css({"display": "none"});
                    $('#news_list').html(result);
				}else if(type == "edit_news"){

                    $('#news_list').html("Новость сохранена!");
                }else if(type == "edit_slider"){
                    $('#news_list').html("Слайдер обновлен!");
                }else if(type == "delete_news"){
                    $('#id_news_'+id_news).css({"display":"none"});
                }else if(type == "delete_img"){
                    $('#id_img_'+id_img).css({"display":"none"});
                }else if(type == "add_slider"){
                    $("#add_slider_now")[0].click();
                    //$('.popup').css({"display": "none"});
                    $('#news_list').html(result);
                }

			},
		});
	});
});