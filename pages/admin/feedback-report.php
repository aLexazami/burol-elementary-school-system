<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once  __DIR__ . '/../../auth/session.php';
require_once  __DIR__ . '/../../config/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <title>Feedback Report</title>
</head>

<body class="bg-gray-200  min-h-screen flex flex-col">

  <!-- Header Section -->
  <?php include('../../includes/header.php'); ?>


  <!-- Feedback Respondents Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] min-h-screen">
    <!-- Left Side Navigation Section -->
    <?php include '../../includes/side-nav-admin.php' ?>

    <!-- Right Side Context Section -->
    <section class="m-4">
      <div class="space-y-4">
        <div class="mb-6">
          <select id="serviceSelect" class="mt-1 block w-full p-2 border rounded-lg bg-white shadow-sm">
            <option value="" disabled selected>Select a service</option>
            <?php
            // Fetch services grouped by category
            $stmt = $pdo->query("
    SELECT s.id, s.name, sc.name AS category
    FROM services s
    JOIN service_categories sc ON s.category_id = sc.id
    ORDER BY sc.name, s.name
  ");
            $grouped = [];
            while ($row = $stmt->fetch()) {
              $grouped[$row['category']][] = $row;
            }

            foreach ($grouped as $category => $services) {
              echo "<optgroup label=\"" . htmlspecialchars($category) . "\">";
              foreach ($services as $service) {
                echo "<option value=\"{$service['id']}\">" . htmlspecialchars($service['name']) . "</option>";
              }
              echo "</optgroup>";
            }
            ?>
          </select>
        </div>
      </div>
      <div id="service-report-container" class="mt-6 p-4 bg-white rounded-lg shadow space-y-4">
        <p class="text-gray-500">Select a service to view its report.</p>
      </div>

    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>

  <script>
document.getElementById('serviceSelect').addEventListener('change', function () {
  const serviceId = this.value;
  const serviceName = this.options[this.selectedIndex].text;

  fetch(`/controllers/service-report.php?service_id=${serviceId}&year=2025`)
    .then(res => res.json())
    .then(data => {
      const container = document.getElementById('service-report-container');
      container.innerHTML = `
        <h2 class="text-xl font-bold text-emerald-700">${serviceName}</h2>
        <div class="">
          <div class="bg-white p-3 rounded-lg shadow mb-3">
            <h1><strong>I. Total number of clients who completed the survey for FY 2024:</strong></h1>
            <span class="text-red-500 font-bold ">${data.respondents}</span>
            <br>
            <br>
            <h1><strong>Brief Analysis</strong></h1>
            <p>Offices shall briefly discuss their response rate results and provide reason/s why certain services were not offered or why certain services have no/low responses, as applicable.</p>
            <span class="text-red-500 font-bold">Type here..</span>
          </div>
          <div class="bg-white p-3 rounded-lg shadow mb-3">
            <h1><strong>II. Total number of transactions for FY 2024:</strong></h1>
            <span class="text-red-500 font-bold">0</span>
          </div>
          <div class="bg-white p-3 rounded-lg shadow mb-3">
            <h1><strong>III. Demographic profile</strong></h1>
            <br>
            <div class="grid grid-cols-3 gap-4 mb-4">
              <div class="bg-white p-4 rounded-lg shadow">
                <h1 class="font-medium">A. Age</h1>
                <div class="pl-2 pt-2">
                  <p>● 19 or Lower</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● 20 - 34</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● 35 - 49</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● 50 - 64</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● 65 or Higher</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● Did not specify</p>
                  <span class="text-red-500 font-bold">Type here..</span>
                </div>
              </div>
              <div class="bg-white p-4 rounded-lg shadow">
                <h1 class="font-medium">B. Sex</h1>
                <div class="pl-2 pt-2">
                  <p>● Female</p>
                  <span class="text-red-500 font-bold">${data.female}</span>
                  <br>
                  <br>
                  <p>● Male</p>
                  <span class="text-red-500 font-bold">${data.male}</span>
                  <br>
                  <br>
                  <p>● Did not specify</p>
                  <span class="text-red-500 font-bold">Type here..</span>
                </div>
              </div>
              <div class="bg-white p-4 rounded-lg shadow">
                <h1 class="font-medium">C. Customer Type</h1>
                <div class="pl-2 pt-2">
                  <p>● Citizen</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● Business</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● Government</p>
                  <span class="text-red-500 font-bold">0</span>
                  <br>
                  <br>
                  <p>● Did not specify</p>
                  <span class="text-red-500 font-bold">Type here..</span>
                </div>
              </div>
            </div>
            <h1><strong>Brief Analysis</strong></h1>
            <p>Offices shall briefly discuss the results of the client demographic profile.</p>
            <span class="text-red-500 font-bold">Type here..</span>
          </div>
          <div class="bg-white p-3 rounded-lg shadow mb-3">
            <h1><strong>IV. Count of Citizen’s Charter Responses</strong></h1>
            <br>
              <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow ">
                  <h1 class="font-medium">A. Citizen's Charter Awareness (CC1)</h1>
                    <div class="pl-2 pt-2">
                      <p>● 1</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 2</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 3</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 4</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● Did not specify</p>
                      <span class="text-red-500 font-bold">Type here..</span>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow ">
                  <h1 class="font-medium">B. Citizen’s Charter Visibility (CC2)</h1>
                    <div class="pl-2 pt-2">
                      <p>● 1</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 2</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 3</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 4</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 5</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● Did not specify</p>
                      <span class="text-red-500 font-bold">Type here..</span>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow ">
                  <h1 class="font-medium">C. Citizen’s Charter Helpfulness (CC3)</h1>
                    <div class="pl-2 pt-2">
                      <p>● 1</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 2</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 3</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● 4</p>
                      <span class="text-red-500 font-bold">0</span>
                      <br>
                      <br>
                      <p>● Did not specify</p>
                      <span class="text-red-500 font-bold">Type here..</span>
                    </div>
                </div>
              </div>
            <br>
            <br>
            <h1><strong>Brief Analysis</strong></h1>
            <p>Offices shall briefly discuss the results of the Citizen's Charter responses.</p>
            <span class="text-red-500 font-bold">Type here..</span>
          </div>
        </div>
        <canvas id="chart-sqd-${serviceId}" class="w-full h-64 mt-6"></canvas>
      `;
      renderSQDChart(serviceId, data.sqd);
    });
});

function renderSQDChart(serviceId, sqdData) {
  new Chart(document.getElementById(`chart-sqd-${serviceId}`), {
    type: 'bar',
    data: {
      labels: ['SQD1','SQD2','SQD3','SQD4','SQD5','SQD6','SQD7','SQD8'],
      datasets: [{
        label: 'Satisfaction Scores',
        data: sqdData,
        backgroundColor: '#34D399'
      }]
    }
  });
}
</script>

</body>

</html>