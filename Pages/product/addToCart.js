$(".product-form").on("submit", function (event) {
  const formData = $(this).serialize();
  // console.log($(this));
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "Pages/product/addToCart.php",
    data: formData,
    success: function (data) {
      // could use this to update the cart
      // echo will return the number of product currently in the cart
      console.log(data);
      // Parse the JSON data received from PHP
      const jsonData = JSON.parse(data);

      // Now you can use jsonData as a regular JavaScript object
      console.log(jsonData.length);

    },
    error: function (data) {
      console.log(data);
    }
  });
  console.log("submit");
  event.preventDefault();
});

