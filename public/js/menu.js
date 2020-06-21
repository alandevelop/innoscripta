function cl (val) {
    console.log(val);
}

$(document).ready(function()  {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add_to_cart').click(function() {
        let prod_id = $(this).attr('data-id');
        let prod_price = parseInt($(this).attr('data-price'));

        let totalDom = $('.cart_total');
        let total = parseInt(totalDom.text() || 0);
        totalDom.text(total + prod_price);

        $('.cart_value').show();

        $(this).closest('.card-btns-container').find('.remove_from_cart').show();
        $(this).hide();

        $.ajax({
            type:'POST',
            url:'/cart/add-to-cart',
            dataType: 'json',
            data: {productId : prod_id,}
        });

    });

    $('.remove_from_cart').click(function() {
        let prod_id = $(this).attr('data-id');
        let prod_price = parseInt($(this).attr('data-price'));

        let totalDom = $('.cart_total');
        let total = parseInt(totalDom.text() || 0);
        totalDom.text(total - prod_price);

        if(total - prod_price <= 0) {
            $('.cart_value').hide();
        }

        $(this).closest('.card-btns-container').find('.add_to_cart').show();
        $(this).hide();

        $.ajax({
            type:'POST',
            url:'/cart/remove-by-id',
            dataType: 'json',
            data: {productId : prod_id}
        });
    });
})
