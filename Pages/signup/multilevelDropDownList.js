let jsonData; // Declare a variable to store the fetched data

async function fetchJson() {
  const response = await fetch('/Data/dvhcvn.json');
  const data = await response.json();
  jsonData = data; // Store the fetched data in the variable
}

async function loadProvince() {
  if (!jsonData) {
    await fetchJson(); // Fetch data if it hasn't been fetched yet
    console.log('load province');
  }

  const provinceSelect = document.getElementById('provinceSelect');
  provinceSelect.innerHTML = "";
  provinceSelect.innerHTML += `<option value="0" disabled selected>Chọn Thành phố/Tỉnh</option>`
  jsonData.data.forEach((province, index) => {
    provinceSelect.innerHTML += `<option value="${(province.name)}">${province.name}</option>`;
  });
  if(province != null && province != ''){
    provinceSelect.value = province;
    province = null;
  }

  return 1;
}

async function loadDistrict() {
  if (!jsonData) {
    await fetchJson(); // Fetch data if it hasn't been fetched yet
  }

  const districtSelect = document.getElementById('districtSelect');
  districtSelect.innerHTML = "";
  districtSelect.innerHTML += `<option value="0" disabled selected>Chọn Quận/Huyện</option>`
  const provinceSelect = document.getElementById('provinceSelect');
  if (provinceSelect.selectedIndex != 0) {
    jsonData.data[provinceSelect.selectedIndex - 1].level2s.forEach((district, index) => {
      districtSelect.innerHTML += `<option value="${district.name}">${district.name}</option>`;
    });
  }
  if(district != null && province != ''){
    districtSelect.value = district;
    district = null;
  }
  return 1;
}

async function loadWard() {
  if (!jsonData) {
    await fetchJson(); // Fetch data if it hasn't been fetched yet
  }
  const districtSelect = document.getElementById('districtSelect');
  const wardSelect = document.getElementById('wardSelect');
  wardSelect.innerHTML = "";
  wardSelect.innerHTML += `<option value="0" disabled selected>Chọn Phường/Xã</option>`
  const provinceSelect = document.getElementById('provinceSelect');
  if (provinceSelect.selectedIndex != 0 && districtSelect.selectedIndex != 0) {
    jsonData.data[provinceSelect.selectedIndex - 1].level2s[districtSelect.selectedIndex - 1].level3s.forEach((ward, index) => {
      wardSelect.innerHTML += `<option value="${ward.name}">${ward.name}</option>`;
    });
  }

  if(ward != null && ward != ''){
    wardSelect.value = ward;
    ward = null;
  }
  return 1;
}

// Load data only once when the script is executed
fetchJson();
