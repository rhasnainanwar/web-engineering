$(function(){
	$('#submitButton').on('click', function(){
		if( $('#filename').val() == "" ){
			alert("Please enter a filename");
			return;
		}

		$.ajax({
	        type: 'GET',
	        url: $('#filename').val()+'.json',
	        dataType:'json',

	        success: function (data) {
	        	$('#filename').val("")
	            $.each(data.employees, function(i, employee) {
	            	var data = '<td>'+ employee.name +'</td>';
	            	data += '<td>'+ employee.designation +'</td>';
	            	data += '<td>'+ employee.salary +'</td>';
	            	data += '<td>'+ employee.joining_date +'</td>';
	            	data += '<td>'+ employee.office +'</td>';
	            	data += '<td>'+ employee.extension +'</td>';
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
