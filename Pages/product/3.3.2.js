function getProducts() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'Pages/product/getProducts.php', true);

  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // The request was successful, and the response is available in xhr.responseText
          var xmlDoc = xhr.responseXML;
          var productDataDiv = document.getElementById('productData');

          // Display the XML data on the page
          // console.log(xmlDoc);
          productDataDiv.innerText = new XMLSerializer().serializeToString(xmlDoc);
      }
  };

  xhr.send();
}

// Call the function to get product data when the page loads
getProducts();