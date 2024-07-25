// Fetch and display the list of patients
document.addEventListener('DOMContentLoaded', function() {
    fetch('../public/admin.php')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error fetching patient data:', data.error);
            return;
        }

        const patientList = document.getElementById('patientList');
        patientList.innerHTML = '<h2>Patient List</h2><ul>';

        data.forEach(patient => {
            patientList.innerHTML += `<li>Name: ${patient.name}, Code: ${patient.code}, Wait Time: ${patient.wait_time} minutes</li>`;
        });

        patientList.innerHTML += '</ul>';
    })
    .catch(error => console.error('Error fetching patient data:', error));
});
