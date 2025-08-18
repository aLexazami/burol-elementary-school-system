function updateServiceOptions() {
  const customerType = document.getElementById('customer_type').value;
  const serviceAvailed = document.getElementById('service_availed');
  serviceAvailed.innerHTML = '<option value="" disabled selected>Service Availed</option>'; // Reset options

  const services = {
    Business: [' Request for Personnel Records for Teaching/Non-Teaching Personnel'],
    Citizen: ['Acceptance of Employment Application for Teacher I Position (Walk-in)','Acceptance of Employment Application for Teacher I Position (Online)','Borrowing of Learning Materials from the School Library/Learning Resource Center','Distribution of Printed Self Learning Modules in Distance Learning Modality','Enrollment (Walk-in)','Enrollment (Online)','Issuance of Requested Documents in Certified True Copy (CTC) and Photocopy (Walk-in)','Issuance of Requested Documents in Certified True Copy (CTC) and Photocopy (Online)','Issuance of School Clearance for different purposes','Issuance of School Forms, Certifications, and other School Permanent Records','Public Assistance (walk-in/phone call)','Public Assistance (email/social media)','Laboratory and School Inventory','School Learning and Development'],
    Government: ['Receiving and releasing of communications and other documents','Reservation Process for the Use of School Facilities','Issuance of Special Order for Service Credits and Certification of Compensatory Time Credits']
  };

  // Populate service options based on customer type
  // Check if the customer type exists in the services object
  if (services[customerType]) {
    services[customerType].forEach(service => {
      const option = document.createElement('option');
      option.value = service; // Use the service name as the value
      option.textContent = service;
      serviceAvailed.appendChild(option);
    });
  }
}