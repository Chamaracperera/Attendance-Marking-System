document.getElementById("addLectureBtn").onclick = function() {
    resetForm();
    document.getElementById("lectureForm").classList.remove("hidden");
    document.getElementById("step1").classList.add("active");
    document.getElementById("eventForm").classList.add("hidden"); // Hide event form
}

document.getElementById("addEventBtn").onclick = function() {
    resetForm();
    document.getElementById("eventForm").classList.remove("hidden");
    document.getElementById("lectureForm").classList.add("hidden"); // Hide lecture form
}


function closeForm(formId) {
    document.getElementById(formId).classList.add("hidden");
    resetForm();
}

document.getElementById("event_number").addEventListener("input", function () {
    let eventInput = this.value;
    let errorMessage = document.getElementById("eventError");
    let submitBtn = document.getElementById("submitBtn");

    if (!/^\d{5}$/.test(eventInput)) {
        errorMessage.style.display = "block";
        submitBtn.disabled = true;
    } else {
        errorMessage.style.display = "none";
        submitBtn.disabled = false;
    }
});

function nextSlide(step) {
    const currentStep = document.querySelector('.step.active');
    if (!validateStep(currentStep)) {
        return; // Prevent proceeding if validation fails
    }
    currentStep.classList.remove('active');
    document.getElementById(`step${step}`).classList.add('active');
}

function prevSlide(step) {
    const currentStep = document.querySelector('.step.active');
    currentStep.classList.remove('active');
    document.getElementById(`step${step}`).classList.add('active');
}

function validateStep(step) {
    const select = step.querySelector('select');
    if (select && !select.value) {
        alert("Please select an option.");
        return false;
    }
    return true;
}

function validateLectureForm() {
    const steps = document.querySelectorAll('.step');
    for (let step of steps) {
        if (step.classList.contains('active') && !validateStep(step)) {
            return false; // Prevent submission if validation fails
        }
    }
    return true; // Allow submission if all steps are valid
}

function fetchDepartments() {
    const batchId = document.getElementById("batch").value;
    fetch(`fetch_departments.php?batch_id=${batchId}`)
        .then(response => response.json())
        .then(data => {
            const departmentSelect = document.getElementById("department");
            departmentSelect.innerHTML = `<option value="" disabled selected>Select Department</option>`;
            data.forEach(department => {
                departmentSelect.innerHTML += `<option value="${department.department_id}">${department.department_name}</option>`;
            });
        });
}

function fetchSubjects() {
    const batchId = document.getElementById("batch").value;
    const departmentId = document.getElementById("department").value;
    fetch(`fetch_subjects.php?batch_id=${batchId}&department_id=${departmentId}`)
        .then(response => response.json())
        .then(data => {
            const subjectSelect = document.getElementById("subject");
            subjectSelect.innerHTML = `<option value="" disabled selected>Select Subject</option>`;
            data.forEach(subject => {
                subjectSelect.innerHTML += `<option value="${subject.subject_id}">${subject.subject_name}</option>`;
            });
        });
}

function resetForm() {
    document.getElementById("batch").selectedIndex = 0;
    document.getElementById("department").innerHTML = `<option value="" disabled selected>Select Department</option>`;
    document.getElementById("subject").innerHTML = `<option value="" disabled selected>Select Subject</option>`;
    const steps = document.querySelectorAll('.step');
    steps.forEach(step => step.classList.remove('active'));
    document.getElementById("step1").classList.add('active');
}
