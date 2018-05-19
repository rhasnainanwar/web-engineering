$(document).ready(function(){

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        $('.add-row').click(function() {
            var row = '<tr><td><input type="checkbox" name="record"></td>';
            // get all the inputs into an array.
            var $inputs = $('#dataForm input');

            if($($inputs[0]).val() != "" && $($inputs[1]).val() != "" && emailReg.test($($inputs[1]).val())){
                
                row += '<td>'+ $($inputs[0]).val() +'</td>';
                row += '<td>'+ $($inputs[1]).val() +'</td>';
                row += '</tr>';

                $('tbody').append(row);

                $('#error').fadeOut();
            }
            else {
                $('#error').fadeIn();   
            }
            $('#dataForm')[0].reset();
        });

        $('.delete-row').click(function() {
            $('input:checked').each(function() {
                $(this).parents('tr').remove();
            });
        });
    });
