document.getElementById('addBatchBtn').addEventListener('click', function () {
    const year = document.getElementById('year').value;
    const feedbackMessage = document.getElementById('feedbackMessage');

    // Simple validation before sending
    if (!/^\d{4}_\d{2}$/.test(year)) {
        feedbackMessage.innerHTML = "<span style='color: red;'>Invalid format. Use YYYY_YY (e.g., 2024_25).</span>";
        return;
    }

    // Send AJAX request
    const formData = new FormData();
    formData.append('year', year);

    fetch('batch_process.php', { // <-- Calls the processing script
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                feedbackMessage.innerHTML = "<span style='color: green;'>" + data.message + "</span>";
            } else {
                feedbackMessage.innerHTML = "<span style='color: red;'>" + data.message + "</span>";
            }
        })
        .catch(error => {
            feedbackMessage.innerHTML = "<span style='color: red;'>An error occurred: " + error.message + "</span>";
        });
});
