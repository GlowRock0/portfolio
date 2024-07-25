document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const code = document.getElementById('code').value;
    
    fetch('/public/patient.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, code })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('waitTime').innerText = `Approximate wait time: ${data.wait_time} minutes`;
    })
    .catch(error => console.error('Error:', error));
});

document.getElementById('dbConfigForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const dbname = document.getElementById('dbname').value;
    const dbuser = document.getElementById('dbuser').value;
    const dbpass = document.getElementById('dbpass').value;

    fetch('/public/set_db_config.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ dbname, dbuser, dbpass })
    })
    .then(response => response.json())
    .then(data => {
        const configStatus = document.getElementById('configStatus');
        if (data.success) {
            configStatus.innerText = 'Database configuration saved successfully.';
        } else {
            configStatus.innerText = 'Failed to save database configuration.';
        }
    })
    .catch(error => console.error('Error saving database configuration:', error));
});
