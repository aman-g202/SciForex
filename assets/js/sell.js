function sell_calc_total(){
    var sum = 0;
    $('.input-amount').each(function(){
        sum += parseFloat($(this).text());
    });
    $(".preview-total").text(sum);    
}
$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
        tr.remove();
        calc_total()
    });
});


$(function(){
    $('.preview-add-button-sell').click(function(){
        var form_data = {};
        form_data["concept"] = $('.payment-form #sellcities option:selected').text();
        form_data["description"] = $('.payment-form #sellcurrency option:selected').text();
        form_data["amount"] = parseFloat($('.payment-form input[name="sellamount"]').val()).toFixed(2);
        form_data["status"] = $('.payment-form #sellstatus option:selected').text();
        form_data["option"] = $('.payment-form #selloption option:selected').text();
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function( type, value ) {
            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.sell-preview-table > tbody:last').append(row); 
        sell_calc_total();
    });  
});