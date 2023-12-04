
function readFile() {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the file to be loaded and the request type
  var fileUrl = 'Pages/product/helloworld.txt';
  xhr.open('GET', fileUrl, true);

  // Set up a callback function to handle the response
  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // The request was successful, and the response is available in xhr.responseText
          var fileContent = xhr.responseText;

          // Display the content on the page
          document.getElementById('fileContent').innerText = fileContent;
      }
  };

  // Send the request
  xhr.send();
}
readFile();