<?php include("include/conn.php"); ?>
<?php include("include/header.php"); ?>
<?php if(!isset($_SESSION['username'])) { header("location: index.php");} ?>
  <script>
    function AutoRefresh(t) {
      setTimeout("location.reload(true)", t);
    }
  </script>

</head>
<body class="container" onload="Javascript:AutoRefresh(5000)">
    <?php include("include/navs.php"); ?>
  <div class="d-flex justify-content-center">
    <div class="card mt-1" style="width: 100%; height: 200px; border-radius: 20px;">
      <div class="card-body py-0 h6">
        <h2 class="card-title lead m-0 py-3 border-bottom" style="font-family: 'Cooper Black', sans-serif;">
          Soil Moisture Value
          <?= $_SESSION['username']; ?>
        </h2>
        <div class="pane py-3">
          <div>
            <div class="card-title my-0 mb-2 h2" style="font-family: 'Cooper Black', sans-serif;">
              <p class="font-weight-bold" id="moisture-state"></p>
              <p class="font-weight-bold" id="moisture-data"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center">
    <div class="card mt-1" style="width: 100%; height: 200px; border-radius: 20px;">
      <div class="card-body py-0 h6">
        <h2 class="card-title lead m-0 py-3 border-bottom" style="font-family: 'Cooper Black', sans-serif;">
          Water Level
        </h2>
        <div class="pane py-3">
          <div>
            <div class="card-title my-0 mb-2 h2" style="font-family: 'Cooper Black', sans-serif;">
              <p class="font-weight-bold" id="water-level"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
    // Make an HTTP GET request to the API endpoint
        fetch('https://ny3.blynk.cloud/external/api/get?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v2')
        .then(response => response.text()) // Parse the response as plain text
        .then(data => {
          // Access the data from the API response
          const apiData = data;
          
          // Display the data on the HTML page
          const dataContainer = document.getElementById('moisture-state');
          dataContainer.textContent = apiData;
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

        fetch('https://ny3.blynk.cloud/external/api/get?token=eGqSuhkt5ZFVesgTByAyveJQOzqBd8kQ&v6')
        .then(response => response.text()) // Parse the response as plain text
        .then(data => {
          // Access the data from the API response
          const apiData = data;
          
          // Display the data on the HTML page
          const dataContainer = document.getElementById('water-level');
          dataContainer.textContent = apiData;
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        });

</script>

<?php include("include/footer.php"); ?>
