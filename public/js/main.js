/* Cart */
$('body').on('click', '.add-to-cart-link', function(event) {
    event.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('.available select').val();
    $.ajax({
        url: path + '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET', 
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert("Error! Try again later");
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function() {
    var id = $(this).data('id');
    $.ajax({
        url: path + '/cart/delete',
        data: {id: id},
        type: 'GET', 
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert("Error!");
        } 
    })
});

function showCart(cart) {
    if($.trim(cart) == '<h3>Cart is empty</h3>') {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()) {
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    } else {
        $('.simpleCart_total').text('Empty Cart');
    }
}

function getCart() {
    $.ajax({
        url: path + '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error! Try again later');
        }
    });
}

function clearCart() {
    $.ajax({
        url: path + '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error! Try again later');
        }
    });
}

/* Cart */


$('#currency').change(function() {
    window.location = 'currency/change?curr=' + $(this).val();
})

$('.available select').on('change', function() {
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title');
        price = $(this).find('option').filter(':selected').data('price'),
        base_price = $('#base-price').data('base');
    if(price) {
        $('#base-price').text(price);
    } else {
        $('#base-price').text(base_price);
    }
})