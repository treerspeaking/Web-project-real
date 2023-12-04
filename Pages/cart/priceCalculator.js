$('.quantity-input').on('change', function() {
  calculateTotal();
  // find the colosed proudct ID as we need it to find the correct item to update
  const productIdInput = $(this).closest('tr').find('.productID');
  const quantity = $(this).val();
  // get the value of the productID input field
  const productId = productIdInput.val();
  const formData = {
    productID: productId,
    quantity: quantity
  };

  const serializedFormData = $.param(formData);
  $.ajax({
    type: "POST",
    url: "Pages/cart/updateCart.php",
    data: serializedFormData,
    error: function (data) {
      console.log(data);
    }
  });

});

jQuery(document).ready(calculateTotal);

function calculateTotal() {
  var total = 0;
  var cartitems = $('.cart-item');
  
  cartitems.each((index, value) => {
    const quantity = $(value).find('.quantity-input').val();
    const price = $(value).find('.product-price').text();
    total += quantity * price;
  });
  $('.total').text('Total: ' + total);
}

