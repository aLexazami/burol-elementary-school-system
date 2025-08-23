
function updateCounts() {
  fetch('/controllers/get-respondent-counts.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('new-count').textContent = data.new;
      document.getElementById('weekly-count').textContent = data.weekly;
      document.getElementById('annual-count').textContent = data.annual;
    });
}

// Refresh every 30 seconds
setInterval(updateCounts, 10000);
updateCounts(); // initial load
