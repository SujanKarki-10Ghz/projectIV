$(document).ready(function ()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.esewa_pay_btn').click( function (e){
        e.preventDefault();
        var data = {
            '_token':$('input[name=_token]').val(),
            'first_name':$('input[name=first_name]').val(),
            'last_name':$('input[name=last_name]').val(),
            'phone':$('input[name=phone]').val(),
            'alternate_phone':$('input[name=alternate_phone]').val(),
            'address1':$('input[name=address1]').val(),
            'address2':$('input[name=address2]').val(),
            'city':$('input[name=city]').val(),
            'state':$('input[name=state]').val(),
            'pincode':$('input[name=pincode]').val(),
        }
        $.ajax({
            type:"POST",
            url: '/confirm-esewa-payment',
            data: data,
            success: function (response){
                if(response.status_code =="no_data_in_cart")
                {
                    window.location.href ="\cart";

                } else
                {
                    console.log(response.total_price);
                }

            }
        });
        });

});
