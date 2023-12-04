

// Get the form element
const form = document.querySelector('form');

// Add an event listener for the form submission
form.addEventListener('submit', validateForm);

function validateForm(event) {
  event.preventDefault();
  const validUsername = validateUsername();
  const validPassword = validatePassword();
  const validProvince = validateProvince();
  const validDistrict = validateDistrict();
  const validWard = validateWard();

  if(
    validUsername == 1 &&
    validPassword == 1 &&
    validProvince == 1 &&
    validDistrict == 1 &&
    validWard == 1
  ){
    form.submit();
  }
}

function validateUsername() {
  // Validate the username field
  // Submit the form if the field is valid
  const usernameinput = document.getElementById('username');
  var usernameRegex = /^[a-zA-Z0-9]{1,}$/;
  if(!usernameRegex.test(usernameinput.value)){
    usernameinput.classList.remove('is-valid');
    usernameinput.classList.add('is-invalid');
    return 0;
  }
  else{
    usernameinput.classList.remove('is-invalid');
    usernameinput.classList.add('is-valid');
    return 1;
  }
  return 1;
}

function validatePassword() {
  // Validate the password field
  // Submit the form if the field is valid
  const passwordinput = document.getElementById('password');
  var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  if(!passwordRegex.test(passwordinput.value)){
    passwordinput.classList.remove('is-valid');
    passwordinput.classList.add('is-invalid');
    return 0;
  }
  else{
    passwordinput.classList.remove('is-invalid');
    passwordinput.classList.add('is-valid');
    return 1;
  }
  return 1;
}

function validateProvince() {
  const provinceSelect = document.getElementById('provinceSelect');
  if(provinceSelect.value == 0){
    provinceSelect.classList.remove('is-valid');
    provinceSelect.classList.add('is-invalid');
    return 0;
  }
  else{
    provinceSelect.classList.remove('is-invalid');
    provinceSelect.classList.add('is-valid');
    return 1;
  }
  return 1;
}

function validateDistrict() {
  // Validate the district field
  // Submit the form if the field is valid
  const districtSelect = document.getElementById('districtSelect');
  if(districtSelect.value == 0){
    districtSelect.classList.remove('is-valid');
    districtSelect.classList.add('is-invalid');
    return 0;
  }
  else{
    districtSelect.classList.remove('is-invalid');
    districtSelect.classList.add('is-valid');
    return 1;
  }
  return 1;
}

function validateWard() {
  // Validate the ward field
  // Submit the form if the field is valid
  const wardSelect = document.getElementById('wardSelect');
  if(wardSelect.value == 0){
    wardSelect.classList.remove('is-valid');
    wardSelect.classList.add('is-invalid');
    return 0;
  }
  else{
    wardSelect.classList.remove('is-invalid');
    wardSelect.classList.add('is-valid');
    return 1;
  }
  return 1;
}