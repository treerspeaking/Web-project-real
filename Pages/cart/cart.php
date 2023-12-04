<?php
include_once('Components/Head/head.php');
include('Components/Navbar/nav.php');
include_once('Includes/Authenticate.php');
?>

<div class="container">
  <div class="d-flex flex-row mt-5">
    <div id="map"></div>
    <div class="cart w-100">
      <h2>Address</h2>
      <p>Address: 268 Lý Thường Kiệt, Phường 14, Quận 10, TP. HCM </p>
      <?php if(isset($_SESSION['cart'])) { ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
            <tr class="cart-item">
              <th scope="row">
                <?php echo $key ?>
              </th>
              <td class="product-name">
                <?php echo $value['PRODUCTNAME'] ?>
              </td>
              <td class="product-price">
                <?php echo $value['PRICE'] ?>
              </td>
              <td><input type="number" class="quantity-input" min="0" value="<?php echo $value['quantity'] ?>"></td>
              <input type="hidden" class="productID" value="<?php echo $value['PRODUCTID'] ?>">
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php } else { ?>
        <h3>Cart is empty</h3>
      <?php } ?>
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="p-0 m-0 text-center total price">Total: </h4>
        <button class="btn btn-primary" type="button" href='checkout'>Checkout</button>
      </div>
      <script src="/Pages/cart/priceCalculator.js"></script>
      <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyAegCF_xRU9S9N2El0D3A1R9Gxsesw2Zrg", v: "weekly"});</script>
      </script>
      <script src="/Pages/cart/googlemap.js"></script>
    </div>