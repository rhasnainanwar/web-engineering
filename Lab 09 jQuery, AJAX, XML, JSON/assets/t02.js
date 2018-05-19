$(function(){
	$('#submitButton').on('click', function(){
		if( $('#filename').val() == "" ){
			alert("Please enter a filename");
			return;
		}

		$.ajax({ 
	        type: 'GET', 
	        url: $('#filename').val()+'.xml', 
	        dataType:'XML', 

	        success: function (data) {
	        	$('#filename').val("")


	            $(data).find("CD").each(function() {
	            	if( $(this).find("PRICE").attr('currency') == null){
	            		var prepend = '';
	            	}
	            	else {
	            		var prepend = $(this).find("PRICE").attr('currency');
	            	}
	            	var data = '<td>'+ $(this).find("TITLE").text() +'</td>';
	            	data += '<td>'+ $(this).find("ARTIST").text() +'</td>';
	            	data += '<td>'+ $(this).find("COUNTRY").text() +'</td>';
	            	data += '<td>'+ $(this).find("COMPANY").text() +'</td>';
	            	data += '<td>'+ prepend + $(this).find("PRICE").text() +'</td>';
	            	data += '<td>'+ $(this).find("YEAR").text() +'</td>';
	            	$('#datat tbody').append('<tr>'+ data +'</tr>');
	            });

		        $('#datat').slideDown(3000);
		        $('#submitButton').attr("disabled", "disabled");
		        $('#filename').attr("disabled", "disabled");
	        },

	        error: function(){
	        	alert("Unable to open file, check file name");
	        }
	    });
	});
});

