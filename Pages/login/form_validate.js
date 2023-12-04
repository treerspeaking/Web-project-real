// Get the form element
const form = document.querySelector('form');

// Add an event listener for the form submission
form.addEventListener('submit', validateForm);

function validateForm(event) {
  event.preventDefault();

  if(validateUsername() && validatePassword()){
    form.submit();
  }
}

function validateUsername() {
  // Validate the username field
  // Submit the form if the field is valid
  const usernameinput = document.getElementById('username');
  var usernameRegex = /.+/;
  if(!usernameRegex.test(usernameinput.value)){
    usernameinput.classList.add('is-invalid');
    return 0;
  }
  return 1;
}

function validatePassword() {
  // Validate the password field
  // Submit the form if the field is valid
  const passwordinput = document.getElementById('password');
  var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  if(!passwordRegex.test(passwordinput.value)){
    passwordinput.classList.add('is-invalid');
    return 0;
  }
  return 1;
}