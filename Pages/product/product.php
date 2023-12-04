<?php
include_once('Components/Head/head.php');
include('Components/Navbar/nav.php');
include_once('Includes/Authenticate.php');
?>

<?php
require_once('Includes/db.inc.php');
if (isset($_SERVER['REQUEST_METHOD']) == 'GET' && isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT PRODUCTNAME, PRICE, PRODUCTDESCRIPTION, PRODUCTID FROM HCMUT_BOOKSTORE.PRODUCT WHERE PRODUCTNAME LIKE '%$search%'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $sql = "SELECT PRODUCTNAME, PRICE, PRODUCTDESCRIPTION, PRODUCTID FROM HCMUT_BOOKSTORE.PRODUCT";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center dropdown">
    <form class="w-25" action="product" id="searchForm">
      <div class="input-group">
        <input type="search" id="searchInput" class="form-control" name="search" id="searchInput"
          onkeyup="getProductsDelayed(this.value)" />
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </form>
    <?php if (isset($_SESSION['useraccesslevel']) && $_SESSION['useraccesslevel'] == 'ADMIN') { ?>
      <button type="button" class="btn btn-primary mt-3 mb-3" style="font-size: 24px;" data-bs-toggle="modal"
        data-bs-target="#exampleModal"><i class="bi bi-plus-square"></i> Add</button>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/Pages/product/productCreate.php" method="POST">
              <div class="row">
                <div class="col">
                  <label for="bookName" class="form-label">Book Name</label>
                  <input type="text" class="form-control" id="bookName" name="bookName">
                </div>
                <div class="col">
                  <label for="bookPrice" class="form-label">Book Price</label>
                  <input type="text" class="form-control" id="bookPrice" name="bookPrice">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="bookDescription" class="form-label">Book Description</label>
                  <textarea type="text" class="form-control" id="bookDescription" name="bookDescription"
                    style="height: 150px;"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="row gy-5 mt-1" id="productList">
    <?php
    if (!empty($result)) {
      foreach ($result as $row) { ?>
        <div class="col-lg-4 col-sm-6">
          <div class="card h-100">
            <div class="card-header">
              <h3>
                <?php echo $row['PRODUCTNAME']; ?>
              </h3>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Description</h5>
              <p class="card-text flex-grow-1">
                <?php echo $row['PRODUCTDESCRIPTION']; ?>
              </p>
              <div>
                <form class="product-form">
                  <input type="hidden" name="productID" value="<?php echo $row['PRODUCTID']; ?>">
                  <button class="btn btn-primary" type="submit">
                    <?php echo $row['PRICE']; ?> đồng
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo '<h1>No result found</h1>';
    }
    ?>
    <!-- <p id="fileContent"></p> -->
    <!-- <p id="productData"></p> -->
    <div class="row gy-5" id="productList">
      <!-- Product list will be displayed here -->
    </div>
  

  <!-- Pagination tab -->
  <!-- There are still no javascript code to change the active onclick yet so help me out with that too -->
  </div>
  <nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination justify-content-center" id="paginationLinks">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item active"><a class="page-link" href="">1</a></li>
      <li class="page-item"><a class="page-link" href="">2</a></li>
      <li class="page-item"><a class="page-link" href="">3</a></li>
      <li class="page-item">
        <a class="page-link " href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
</div>
<script type="text/javascript" src="Pages/product/getProducts.js"></script>
<script type="text/javascript" src="Pages/product/addToCart.js"></script>