<?php include("include/conn.php"); ?>
<?php include("include/header.php"); ?>
<?php
$value = 0;
// API URL
$url = 'https://ny3.blynk.cloud/external/api/get?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v3';

// Initialize cURL
$curl = curl_init();

// Set the cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FAILONERROR, true);

// Execute the cURL request
$response = curl_exec($curl);

// Check if the request was successful
if ($response !== false) {
  // Print the response for debugging
  //echo 'API Response: ' . $response . '<br>';

  // Remove any whitespace or line breaks from the response
  $response = trim($response);

  // Display the value directly
  //echo 'Value: ' . $response;
  $value = $response;
} else {
  // Handle any errors that occurred during the request
  echo 'Failed to fetch the value: ' . curl_error($curl);
}

// Close the cURL session
curl_close($curl);
?>
<script>
    function AutoRefresh(t) {
      setTimeout("location.reload(true)", t);
    }
  </script>

</head>
<body class="container" onload="Javascript:AutoRefresh(5000)">
<?php include("include/navs.php"); ?>
  <div class="d-flex justify-content-center">
    <div class="card mt-1" style="width: 100%; border-radius: 20px;">
      <div class="card-body py-0 h6">
        <h2 class="card-title lead m-0 py-3 border-bottom" style="font-family: 'Cooper Black', sans-serif;">
          Pump Control
        </h2>
        <div class="pane py-3">
          <div>
            <div class="card-title my-0 mb-2 h2" style="font-family: 'Lucida Bright', sans-serif;">
              <div><span>System state:</span> <span id="system-state"></span></div>
              <p class="text-success" id="change"></p>
              <button id="manual" class="btn btn-info border border-dark" onclick="updateButtonValueS1()" style="border-radius: 20px;">Manual</button>
              <button id="auto" class="btn btn-info border border-dark" onclick="updateButtonValueS0()" style="border-radius: 20px;">Automatic</button>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  
  <div class="d-flex justify-content-center">
    <div class="card mt-1" style="width: 100%; border-radius: 20px;">
      <div class="card-body py-0 h6">
        <h2 class="card-title lead m-0 py-3 border-bottom" style="font-family: 'Cooper Black', sans-serif;">
          Pump Control
        </h2>
        <div class="pane py-3">
          <div>
            <div class="card-title my-0 mb-2 h2" style="font-family: 'Lucida Bright', sans-serif;">
                <div><span>Pump state:</span> <span id="state"></span></div>
                <p class="text-success" id="btnchange"></p>
                <?php if ($value == 1): ?>
                    <button id="device-on" class="btn btn-success border border-dark" onclick="updateButtonValue1()" style="border-radius: 20px;">Turn On</button>
                    <button id="device-off" class="btn btn-danger border border-dark" onclick="updateButtonValue0()" style="border-radius: 20px;">Turn Off</button>
                <?php else: ?>
                <p>Automatic Mode</p>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>

  <div id="result"></div>
  <div id="resul"></div>

<script>
    function updateButtonValue1() {
      // Make an HTTP GET request to the API endpoint
      fetch('https://ny3.blynk.cloud/external/api/update?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v1=1')
        .then(response => {
          // Check if the request was successful
          if (response.ok) {
            // Update the button text content
            const button = document.getElementById('device-on');
            //button.textContent = 'Turn Off';
          } else {
            // Handle the error if the request was not successful
            throw new Error('Failed to update the button value');
          }
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });
        // This for sending sms
        fetch("sendSms.php")
          .then(function(response) {
            if (response.ok) {
              return response.text();
            } else {
              throw new Error("Error: " + response.status);
            }
          })
          .then(function(responseText) {
            // Update the result div with the PHP script's output
            document.getElementById("result").innerHTML = responseText;
          })
          .catch(function(error) {
            console.error(error);
          });

        // This for sending data to the database
        fetch("manual_insert.php")
          .then(function(response) {
            if (response.ok) {
              return response.text();
            } else {
              throw new Error("Error: " + response.status);
            }
          })
          .then(function(responseText) {
            // Update the result div with the PHP script's output
            document.getElementById("resul").innerHTML = responseText;
          })
          .catch(function(error) {
            console.error(error);
          });

          const paragraph = document.getElementById("btnchange");
          // Set the text content of the paragraph
          paragraph.textContent = "Turn Onn";

    }

    function updateButtonValue0() {
      // Make an HTTP GET request to the API endpoint
      fetch('https://ny3.blynk.cloud/external/api/update?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v1=0')
        .then(response => {
          // Check if the request was successful
          if (response.ok) {
            // Update the button text content
            const button = document.getElementById('device-off');
            //button.textContent = 'Turn Off';
          } else {
            // Handle the error if the request was not successful
            throw new Error('Failed to update the button value');
          }
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

        const paragraph = document.getElementById("btnchange");
          // Set the text content of the paragraph
          paragraph.textContent = "Turn Off";

    }
    //Pump state
    fetch('https://ny3.blynk.cloud/external/api/get?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v5')
        .then(response => response.text()) // Parse the response as plain text
        .then(data => {
          // Access the data from the API response
          const apiData = data;
          
          // Display the data on the HTML page
          const dataContainer = document.getElementById('state');
          dataContainer.textContent = apiData;
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });
        //System state
    fetch('https://ny3.blynk.cloud/external/api/get?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v4')
        .then(response => response.text()) // Parse the response as plain text
        .then(data => {
          // Access the data from the API response
          const apiData = data;
          
          // Display the data on the HTML page
          const dataContainer = document.getElementById('system-state');
          dataContainer.textContent = apiData;
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

    function updateButtonValueS0() {
      // Make an HTTP GET request to the API endpoint
      fetch('https://ny3.blynk.cloud/external/api/update?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v3=0')
        .then(response => {
          // Check if the request was successful
          if (response.ok) {
            // Update the button text content
            const button = document.getElementById('auto');
            //button.textContent = 'Turn Off';
          } else {
            // Handle the error if the request was not successful
            throw new Error('Failed to update the button value');
          }
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

        const paragraph = document.getElementById("change");
        // Set the text content of the paragraph
        paragraph.textContent = "Automatic";
    }

    function updateButtonValueS1() {
      // Make an HTTP GET request to the API endpoint
      fetch('https://ny3.blynk.cloud/external/api/update?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v3=1')
        .then(response => {
          // Check if the request was successful
          if (response.ok) {
            // Update the button text content
            const button = document.getElementById('manual');
            //button.textContent = 'Turn Off';
          } else {
            // Handle the error if the request was not successful
            throw new Error('Failed to update the button value');
          }
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

        const paragraph = document.getElementById("change");
        // Set the text content of the paragraph
        paragraph.textContent = "Manual";
    }   


  </script>

<?php include("include/footer.php"); ?>



