<!-- <div class="container">
<h1>Login page</h1>
</div> -->
<?php
// session_start();
include_once('./Components/Head/head.php');
?>


<body>
  <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-11 col-md-6 col-xl-4 p-5 m-2 card forms d-flex flex-column justify-content-center align-items-cente">
          <h2 class="text-center mb-4">Log In</h2>
          <div class="alert alert-danger" style="display: none;"></div>
          <form action="/Pages/login/login_processing.php" class="d-flex flex-column justify-content-center align-items-center needs-validation" method="POST" novalidate>
            <div class="form-group mb-3 w-75">
              <label for="username" class="form-lable">username</label>
              <input 
              type="username"
              class="form-control
              <?php if(isset($_SESSION['usernamereinput']) && $_SESSION['usernamereinput']) echo'is-invalid'?>" 
              name="username" 
              autocomplete="on" 
              id="username"
              value="<?php echo @$_SESSION['username']; ?>" 
              required
              >
              <div class="invalid-feedback">Username must have more than one character</div>
            </div>
            <div class="form-group mb-3 w-75">
              <label for="password" class="form-lable">Password</label>
              <input 
              type="password" 
              class="form-control 
              <?php if(isset($_SESSION['passwordreinput']) && $_SESSION['passwordreinput']) echo 'is-invalid'?>" 
              name="password" 
              autocomplete="on" 
              id="password" 
              required
              >
              <div class="invalid-feedback">Password must have at least eight characters, at least one letter and one number</div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
          </form>
          <div class="text-center mt-3 ">
            <a href="/forgot-password">Forgot Password?</a>
          </div>
          <div class="text-center mt-2">
            Need an account? <a href="/signup">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  <script src="/Pages/login/form_validate.js"></script>
</body>

<?php
  
  unset($_SESSION['usernamereinput']);
  unset($_SESSION['passwordreinput']);
?>