<?php
// session_start();
include_once('Components/Head/head.php');

?>


<body>
  <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-11 col-md-6 col-xl-4 p-5 card forms d-flex flex-column justify-content-center align-items-cente">
          <h2 class="text-center mb-4">Sign Up</h2>
          <div class="alert alert-danger" style="display: none;"></div>
          <form action="/Pages/signup/signup_processing.php" class="d-flex flex-column justify-content-center align-items-center needs-validation" method="POST" novalidate>
            <div class="form-group mb-3 w-75">
              <label for="username" class="form-lable">username</label>
              <input 
              type="username"
              class="form-control
              <?php 
              // Check if the username is already used or not then set valid and invalid
              if (isset($_SESSION['usernamereinput'])) {
                echo $_SESSION['usernamereinput'] ? 'is-invalid ' : 'is-valid ';
              }
              ?>" 
              name="username" 
              autocomplete="on" 
              id="username"
              value="<?php echo @$_SESSION['username']; ?>" 
              required
              >
              <div class="invalid-feedback">Username must have more than one character and no speacial character</div>
            </div>
            <div class="form-group mb-3 w-75">
              <label for="password" class="form-lable">Password</label>
              <input 
              type="password" 
              class="form-control"
              name="password" 
              autocomplete="on" 
              id="password" 
              required
              >
              <div class="invalid-feedback">Password must have at least eight characters, at least one letter and one number and no speacial character</div>
            </div>
            <div class="form-group mb-3 w-75">
              <label for="provinceSelect" class="form-lable">Thành phố/Tỉnh</label>
              <select 
              class="form-select
              <?php 
              // Check if the username is already used or not then set valid and invalid
              if (isset($_SESSION['province'])) {
                echo $_SESSION['province'] ? 'is-valid' : 'is-invalid';
              }
              ?>" 
              name="province" 
              id="provinceSelect" 
              required>
            </select>
            </div>
            <div class="form-group mb-3 w-75">
              <label for="districtSelect" class="form-lable" >Quận/Huyện</label>
             <select 
             class="form-select
              <?php 
              // Check if the username is already used or not then set valid and invalid
              if (isset($_SESSION['district'])) {
                echo $_SESSION['district'] ? 'is-valid' : 'is-invalid';
              }
              ?>" 
             name="district" 
             id="districtSelect" 
             required>
            </select>
            </div>

            <div class="form-group mb-3 w-75">
              <label for="wardSelect" class="form-lable">Phường/Xã</label>
            <select 
            class="form-select
            <?php 
              // Check if the username is already used or not then set valid and invalid
              if (isset($_SESSION['ward'])) {
                echo $_SESSION['ward'] ? 'is-valid' : 'is-invalid';
              }
              ?>" 
            name="ward" 
            id="wardSelect"
            required>
            </select>
            </div>

            <?php
            // Check if the username is already used or not then set valid and invalid
            if (isset($_SESSION['usernameused']) && $_SESSION['usernameused']) {
              echo '<div class="text-center mt-2 text-danger mb-3">Username is already used</div>';
            }
            ?>
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
          </form>
          <div class="text-center mt-2">
            Already have an account? <a href="/signup">Log In</a>
          </div>
        </div>

      </div>
    </div>
  <script src="/Pages/signup/form_validate.js"></script>
  <script src="/Pages/signup/multilevelDropDownList.js"></script>
  <script type="text/javascript">
    <?php
    $province = isset($_SESSION['province']) ? $_SESSION['province'] : null;
    $district = isset($_SESSION['district']) ? $_SESSION['district'] : null;
    $ward = isset($_SESSION['ward']) ? $_SESSION['ward'] : null;
    ?>

    var province = '<?php echo $province !== null ? $province : "" ?>';
    var district = '<?php echo $district !== null ? $district : "" ?>';
    var ward = '<?php echo $ward !== null ? $ward : "" ?>';

    const provinceSelect = document.getElementById('provinceSelect');
    const districtSelect = document.getElementById('districtSelect');
    const wardSelect = document.getElementById('wardSelect');
    
    provinceSelect.addEventListener('change', () => {
      loadDistrict();
      loadWard();
    });

    districtSelect.addEventListener('change', () => {
      loadWard();
    });
  </script>
  <script type="text/javascript">
    async function loadSelectForm(){

      await loadProvince();
      await loadDistrict();
      await loadWard();

      return 1;
    }

    loadSelectForm();
  </script>
  </script>
</body>


<?php
  unset($_SESSION['usernamereinput']);
  unset($_SESSION['passwordreinput']);
  unset($_SESSION['provincereinput']);
  unset($_SESSION['districtreinput']);
  unset($_SESSION['wardreinput']);
  unset($_SESSION['usernameused']);
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['province']);
  unset($_SESSION['district']);
  unset($_SESSION['ward']);
?>