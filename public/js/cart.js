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
        let prod_id = $(this).attr('data-product-id');
        let prod_price = parseInt($(this).attr('data-price'));

        let totalDom = $('.cart_total');
        let total = parseInt(totalDom.text() || 0);
        let valTotal = total + prod_price;
        totalDom.text(valTotal);
        $('.total_btm').text(valTotal);
        $('.total_btmDel').text(valTotal + 30);
        $('.total-price-hidden').val(valTotal + 30);

        $('.cart_value').show();

        $(this).closest('.product-cart-item')
            .find('.product-cart-input')
            .val(function(i, oldval) {
                return ++oldval;
            });

        $.ajax({
            type:'POST',
            url:'/cart/add-to-cart',
            dataType: 'json',
            data: {productId : prod_id,}
        });

        let usdTotalDom = $('.usd-total');
        let usdRate = usdTotalDom.attr('data-rate');
        let val = usdRate * (total + prod_price + 30);
        usdTotalDom.text(val.toFixed(2));
    });

    $('.decrease_in_cart').click(function() {
        let prod_id = $(this).attr('data-product-id');
        let prod_price = parseInt($(this).attr('data-price'));

        let totalDom = $('.cart_total');
        let total = parseInt(totalDom.text() || 0);
        let totalVal = total - prod_price;
        totalDom.text(total - prod_price);
        $('.total_btm').text(totalVal);
        $('.total_btmDel').text(totalVal + 30);
        $('.total-price-hidden').val(totalVal + 30);

        $(this).closest('.product-cart-item')
            .find('.product-cart-input')
            .val( function(i, oldval) {
                return --oldval;
            });

        $.ajax({
            type:'POST',
            url:'/cart/decrease-by-id',
            dataType: 'json',
            data: {productId : prod_id}
        });

        if(total - prod_price <= 0) {
            $('.cart_value').hide();
            $('.empty-cart').show();
            $('.cart-form').remove();
        } else {
            let usdTotalDom = $('.usd-total');
            let usdRate = usdTotalDom.attr('data-rate');
            let val = usdRate * ((total - prod_price) + 30);
            usdTotalDom.text(val.toFixed(2));
        }
    });

    $('.remove_from_cart').click(function() {
        let prod_id = $(this).attr('data-product-id');
        let prod_price = parseInt($(this).attr('data-price'));

        let quantity = $(this).closest('.product-cart-item')
            .find('.product-cart-input')
            .val();

        let totalDom = $('.cart_total');
        let total = parseInt(totalDom.text() || 0);
        let val = total - (prod_price*quantity);
        totalDom.text(val);
        $('.total_btm').text(val);
        $('.total_btmDel').text(val + 30);
        $('.total-price-hidden').val(val + 30);

        $(this).closest('.product-cart-item').remove();

        $.ajax({
            type:'POST',
            url:'/cart/remove-by-id',
            dataType: 'json',
            data: {productId : prod_id}
        });

        if(val <= 0) {
            $('.cart_value').hide();
            $('.empty-cart').show();
            $('.cart-form').remove();
            return
        }

        let usdTotalDom = $('.usd-total');
        let usdRate = usdTotalDom.attr('data-rate');
        let valUsd = usdRate * (val + 30);
        usdTotalDom.text(valUsd.toFixed(2));
    });
})
