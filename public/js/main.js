/* Cart */
$('body').on('click', '.add-to-cart-link', function(event) {
    event.preventDefault();
    console.log(path + '/cart/add');
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

function showCart(cart) {
    console.log(cart);
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