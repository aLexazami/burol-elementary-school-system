document.addEventListener('DOMContentLoaded', function () {
  function safeUpdate(id, value) {
    const el = document.getElementById(id);
    if (el) el.textContent = value;
  }

  function updateCounts() {
    fetch('/controllers/get-counts.php')
      .then(response => {
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        return response.json();
      })
      .then(data => {
        // Customer Type Counts
        safeUpdate('count-business', data.Business || 0);
        safeUpdate('count-citizen', data.Citizen || 0);
        safeUpdate('count-government', data.Government || 0);

        // Age Group Counts
        safeUpdate('age-under-19', data['under-19'] || 0);
        safeUpdate('age-20-34', data['20-34'] || 0);
        safeUpdate('age-35-49', data['35-49'] || 0);
        safeUpdate('age-50-64', data['50-64'] || 0);
        safeUpdate('age-65-up', data['65-up'] || 0);

        //Citizen Charter Awareness Counts
        safeUpdate('awareness-yes', data.yes || 0);
        safeUpdate('awareness-no', data.no || 0);

        // CC1
        safeUpdate('cc1-1', data['cc1-1'] || 0);
        safeUpdate('cc1-2', data['cc1-2'] || 0);
        safeUpdate('cc1-3', data['cc1-3'] || 0);
        safeUpdate('cc1-4', data['cc1-4'] || 0);

        // CC2
        safeUpdate('cc2-1', data['cc2-1'] || 0);
        safeUpdate('cc2-2', data['cc2-2'] || 0);
        safeUpdate('cc2-3', data['cc2-3'] || 0);
        safeUpdate('cc2-4', data['cc2-4'] || 0);
        safeUpdate('cc2-5', data['cc2-5'] || 0);

        // CC3
        safeUpdate('cc3-1', data['cc3-1'] || 0);
        safeUpdate('cc3-2', data['cc3-2'] || 0);
        safeUpdate('cc3-3', data['cc3-3'] || 0);
        safeUpdate('cc3-4', data['cc3-4'] || 0);

      })
      .catch(error => {
        console.error('Counts fetch failed:', error);
      });
  }

  updateCounts(); // initial load
  setInterval(updateCounts, 10000); // refresh every 10 seconds
});