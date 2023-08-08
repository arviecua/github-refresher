document.addEventListener("DOMContentLoaded", function () {
    const dobInput = document.getElementById("dob");
    const ageInput = document.getElementById("age");
  
    dobInput.addEventListener("change", calculateAge);
  
    function calculateAge() {
      // Age calculation logic, similar to previous example
    }
  
    const userForm = document.getElementById("userForm");
    userForm.addEventListener("submit", function (event) {
      event.preventDefault();
  
      const formData = new FormData(userForm);
  
      if (validateForm(formData)) {
        submitFormData(formData);
      }
    });
  
    function validateForm(formData) {
      // Validate form fields, check for missing inputs
      // Implement your own validation logic
      return true; // Return true if validation passes
    }
  
    function submitFormData(formData) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "process_form.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            alert("Form submitted successfully!");
          } else {
            alert("Form submission failed.");
          }
        }
      };
      xhr.send(formData);
    }
  });
  