
// JavaScript to handle the form submission
document.getElementById("addBatchBtn").addEventListener("click", function() {
    const year = document.getElementById("year").value;
    const feedbackMessage = document.getElementById("feedbackMessage");

    if (!year) {
        feedbackMessage.textContent = "Please enter a batch year.";
        feedbackMessage.style.color = "red";
        return;
    }

    const formData = new FormData();
    formData.append("year", year);

    fetch("../crud/batch.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response Data:", data); // Debugging log to check data received
        feedbackMessage.textContent = data.message;
        feedbackMessage.style.color = data.status === "success" ? "green" : "red";
        if (data.status === "success") document.getElementById("batchForm").reset();
    })
    .catch(error => {
        console.error("Error:", error); // Console log for network error debugging
        feedbackMessage.textContent = "An error occurred. Please try again.";
        feedbackMessage.style.color = "red";
    });
});

