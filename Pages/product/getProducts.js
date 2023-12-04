// function getProducts(strRequest) {
//   var xhr = new XMLHttpRequest();
//   xhr.open('GET', 'Pages/product/getProducts.php', true);
//   const productList = document.getElementById('productList');
//   productList.innerHTML = "";
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       // The request was successful, and the response is available in xhr.responseText
//       var xmlDoc = xhr.responseXML;
//       console.log(xmlDoc);
//       // Get all product elements
//       const productElements = xmlDoc.getElementsByTagName("product");

//       let productIndex = 0;

//       while (productIndex < productElements.length) {
//         const currentProductElement = productElements[productIndex];

//         // Extract the product name
//         const productName = currentProductElement.getElementsByTagName("name")[0].textContent;
//         const productDescription = currentProductElement.getElementsByTagName("productdescription")[0].textContent;
//         const productPrice = currentProductElement.getElementsByTagName("price")[0].textContent;

//         if (productName.includes(strRequest) || productDescription.includes(strRequest) || productPrice.includes(strRequest)) {
//           productList.innerHTML += `<div class="col-lg-4 col-sm-6">
//           <div class="card h-100">
//             <div class="card-header">
//               <h3>
//                 ${productName}
//               </h3>
//             </div>
//             <div class="card-body d-flex flex-column">
//               <h5 class="card-title">Description</h5>
//               <p class="card-text flex-grow-1">
//                 ${productDescription}
//               </p>
//               <div>
//                 <form class="product-form">
//                   <button class = "btn btn-primary" type="submit" >${productPrice} đồng </button>
//                 </form>
//               </div>
//             </div>
//           </div>
//         </div>`
//         }



//         // Increment the loop counter
//         productIndex++;
//       }
//       return xmlDoc;
//     }
//   };

//   xhr.send();
// }


function getProducts(strRequest) {
  // ajax request for get products  
  // FOR the page index you must get it from the pagination in cart.php
  const pageIndex = 1;
  const formData = {
    page: pageIndex,
    search: strRequest
  };
  console.log($.param(formData));
  $.ajax({
    url: 'Pages/product/getProducts.php',
    method: 'GET',
    data: $.param(formData),
    success: function (response) {
      const productList = $('#productList');
      productList.empty();
      console.log(response);
      const productElements = $(response).find('product');
      console.log(productElements);
      productElements.each(function () {
        const productName = $(this).find('name').text();
        const productDescription = $(this).find('productdescription').text();
        const productPrice = $(this).find('price').text();
        if (productName.includes(strRequest) || productDescription.includes(strRequest) || productPrice.includes(strRequest)) {
          productList.append(`<div class="col-lg-4 col-sm-6">
            <div class="card h-100">
              <div class="card-header">
                <h3>
                  ${productName}
                </h3>
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Description</h5>
                <p class="card-text flex-grow-1">
                  ${productDescription}
                </p>
                <div>
                  <form class="product-form">
                    <button class="btn btn-primary" type="submit">${productPrice} đồng</button>
                  </form>
                </div>
              </div>
            </div>
          </div>`);
        }
      });
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
}

var debounceTimer;

function debounce(fn, delay) {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(fn, delay);
}

function getProductsDelayed(strRequest) {
  debounce(function () {
    getProducts(strRequest);
  }, 250);
}



