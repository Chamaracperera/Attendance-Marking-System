document.getElementById('batchSubjectForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Stop form submission

    // Get values from the batch and subject form
    const batch = document.getElementById('batch').value;
    const subject = document.getElementById('subject').value;

    // Populate the absence form fields with batch and subject
    document.getElementById('batchDisplay').value = batch;
    document.getElementById('subjectDisplay').value = subject;

    // Hide the batch/subject form and show the absence form
    document.getElementById('batchSubjectForm').style.display = 'none';
    document.getElementById('absenceForm').style.display = 'block';
});

// Validate the absence form on submission
document.getElementById('attendanceForm').addEventListener('submit', function(event) {
    const studentID = document.getElementById('studentID').value;
    const proofFile = document.getElementById('proofFile').files[0];
    const validFileTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

    // Check Student ID format (YYYYTXXXXX)
    const studentIDPattern = /^[0-9]{4}T[0-9]{5}$/;
    if (!studentIDPattern.test(studentID)) {
        alert('Invalid Student ID format. It should be in the format: YYYYTXXXXX (e.g., 2021T02345).');
        event.preventDefault(); // Stop form submission
    }

    // Check file type and size
    if (!validFileTypes.includes(proofFile.type)) {
        alert('Only PDF, DOC, or DOCX files are allowed!');
        event.preventDefault(); // Stop form submission
    }

    if (proofFile.size > 5000000) {
        alert('File size should not exceed 5MB!');
        event.preventDefault(); // Stop form submission
    }
});

