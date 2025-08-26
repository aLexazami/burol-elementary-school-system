document.addEventListener('DOMContentLoaded', function () {
  function safeUpdate(id, value) {
    const el = document.getElementById(id);
    if (el) el.textContent = value;
  }

  function updateCustomerTypeCounts() {
    fetch('/controllers/get-counts.php')
      .then(response => {
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        return response.json();
      })
      .then(data => {
        safeUpdate('count-business', data.Business || 0);
        safeUpdate('count-citizen', data.Citizen || 0);
        safeUpdate('count-government', data.Government || 0);
      })
      .catch(error => {
        console.error('Customer type counts fetch failed:', error);
      });
  }

  updateCustomerTypeCounts();
  setInterval(updateCustomerTypeCounts, 10000);
});