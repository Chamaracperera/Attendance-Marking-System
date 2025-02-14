function filterByUserType(userType) {
    const lecturerTable = document.getElementById('lecturerTable');
    const studentTable = document.getElementById('studentTable');

    if (userType === 'Lecturers') {
        lecturerTable.style.display = 'block';
        studentTable.style.display = 'none';
    } else if (userType === 'Students') {
        studentTable.style.display = 'block';
        lecturerTable.style.display = 'none';
    }
}

function searchTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const filter = input.value.toUpperCase();
    const table = document.getElementById(tableId);
    const trs = table.getElementsByTagName("tr");

    for (let i = 1; i < trs.length; i++) { // Starting from 1 to skip table header
        const tds = trs[i].getElementsByTagName("td");
        let showRow = false;
        
        // Check all table cells in the row
        for (let j = 0; j < tds.length; j++) {
            if (tds[j] && tds[j].innerText.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }
        trs[i].style.display = showRow ? "" : "none";
    }
}

// Logout Function
document.getElementById("logoutBtn").addEventListener("click", function () {
    alert("You have been logged out!");
    window.location.href = "../../php/logout.php";
});

// Search Function
function searchTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const filter = input.value.toUpperCase();
    const table = document.getElementById(tableId).getElementsByTagName('tbody')[0];
    const trs = table.getElementsByTagName("tr");

    for (let i = 0; i < trs.length; i++) {
        const tds = trs[i].getElementsByTagName("td");
        let showRow = false;

        // Check all table cells in the row
        for (let j = 0; j < tds.length; j++) {
            if (tds[j] && tds[j].innerText.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }
        trs[i].style.display = showRow ? "" : "none";
    }
}

// Clear search input and reset table
function clearSearch(inputId, tableId) {
    document.getElementById(inputId).value = '';
    searchTable(inputId, tableId);
}

function deleteLecturer(lecturerId) {
    if (confirm('Are you sure you want to delete this lecturer?')) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_lecturer.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                // Refresh the lecturer table
                filterByDepartment('ICT'); // Update the department as necessary
            }
        };
        xhr.send('lecturer_id=' + lecturerId);
    }
}

function editLecturer(lecturerId) {
    const row = document.querySelector(`button[onclick='editLecturer(${lecturerId})']`).closest('tr');
    const cells = row.getElementsByTagName('td');

    // Convert the lecturer details into editable input fields
    for (let i = 1; i < 3; i++) { // Assume columns 1 (name) and 2 (email) are editable
        const cell = cells[i];
        const value = cell.innerText;
        cell.innerHTML = `<input type="text" value="${value}" />`;
    }

    // Change the "Edit" button to "Save"
    cells[3].innerHTML = `<button onclick="saveLecturer(${lecturerId})" class="save-btn">Save</button>`;
}

function saveLecturer(lecturerId) {
    const row = document.querySelector(`button[onclick='saveLecturer(${lecturerId})']`).closest('tr');
    const cells = row.getElementsByTagName('td');
    const name = cells[1].querySelector('input').value;
    const email = cells[2].querySelector('input').value;

    // Send the updated data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_lecturer.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);

            // Reload the lecturer table
            filterByDepartment('ICT'); // Adjust department as needed
        }
    };
    xhr.send('lecturer_id=' + lecturerId + '&name=' + encodeURIComponent(name) + '&email=' + encodeURIComponent(email));
}

function filterByDepartment(department) {
    fetchLecturers(department);
}

function fetchLecturers(department) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_lecturers.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.querySelector('#lecturerTable tbody').innerHTML = xhr.responseText;
            document.getElementById('lecturerTable').style.display = 'block';  // Show the table
        }
    };
    xhr.send('department=' + department);
}

function filterByUserType(userType) {
    if (userType === 'Lecturers') {
        document.getElementById('lecturerTable').style.display = 'block';
        document.getElementById('studentTable').style.display = 'none';
    } else if (userType === 'Students') {
        document.getElementById('lecturerTable').style.display = 'none';
        document.getElementById('studentTable').style.display = 'block';
    }
}

function searchTable(searchInputId, tableId) {
    const input = document.getElementById(searchInputId);
    const filter = input.value.toUpperCase();
    const table = document.getElementById(tableId);
    const tr = table.getElementsByTagName('tr');
    
    for (let i = 0; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName('td');
        if (td.length > 0) {
            const textValue = td[0].textContent || td[0].innerText;
            const nameValue = td[1].textContent || td[1].innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1 || nameValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}

function clearSearch(searchInputId, tableId) {
    const input = document.getElementById(searchInputId);
    input.value = '';
    searchTable(searchInputId, tableId);
}

// Add event listener for the "Add New Lecturer" button
document.getElementById('addLecturerBtn').addEventListener('click', function() {
    window.location.href = '../lecturer/Lecturer_Signup.php';  // Adjust the path as necessary
});

document.getElementById('addStudentBtn').addEventListener('click', function() {
    window.location.href = '../student/Student.php';  // Adjust the path as necessary
});

// Function to handle user type selection (Lecturers or Students)
function filterByUserType(userType) {
    const lecturerTable = document.getElementById('lecturerTable');
    const studentTable = document.getElementById('studentTable');

    if (userType === 'Lecturers') {
        lecturerTable.style.display = 'block';
        studentTable.style.display = 'none';
        disableDepartmentButtons(false); // Enable department buttons for lecturers
    } else if (userType === 'Students') {
        lecturerTable.style.display = 'none';
        studentTable.style.display = 'block';
        disableDepartmentButtons(false); // Enable department buttons for students
        clearStudentTable(); // Clear the student table until a department is selected
    }
}

// Function to disable/enable department buttons
function disableDepartmentButtons(disable) {
    const departmentButtons = document.querySelectorAll('.department-selection button');
    departmentButtons.forEach(button => {
        button.disabled = disable; // Disable or enable based on the passed flag
        button.style.cursor = disable ? 'not-allowed' : 'pointer'; // Change cursor for visual feedback
    });
}

// Modify filterByDepartment to work for both lecturers and students
function filterByDepartment(department) {
    const lecturerTable = document.getElementById('lecturerTable');
    const studentTable = document.getElementById('studentTable');

    if (lecturerTable.style.display === 'block') {
        fetchLecturers(department); // Fetch lecturer data for the selected department
    } else if (studentTable.style.display === 'block') {
        fetchStudents(department); // Fetch student data for the selected department
    }
}

// Function to fetch and display lecturers for the selected department
function fetchLecturers(department) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_lecturers.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.querySelector('#lecturerTable tbody').innerHTML = xhr.responseText;
        }
    };
    xhr.send('department=' + department);
}

// Function to fetch and display student for the selected year and  department
function fetchStudents(department) {
    const year = document.getElementById('batchSelect').value; // Assuming the year is selected from a dropdown
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_students.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.querySelector('#studentTable tbody').innerHTML = xhr.responseText;
        }
    };
    xhr.send('department=' + department + '&year=' + year);
}

function editStudent(studentId, year) {
    const row = document.querySelector(`button[onclick='editStudent(${studentId}, "${year}")']`).closest('tr');
    const cells = row.getElementsByTagName('td');

    // Convert the student details into editable input fields
    for (let i = 1; i < 3; i++) { // Assuming columns 1 (name) and 2 (email) are editable
        const cell = cells[i];
        const value = cell.innerText;
        cell.innerHTML = `<input type="text" value="${value}" />`;
    }

    // Change the "Edit" button to "Save"
    cells[3].innerHTML = `<button onclick="saveStudent(${studentId}, '${year}')" class="save-btn">Save</button>`;
}

function saveStudent(studentId, year) {
    const row = document.querySelector(`button[onclick='saveStudent(${studentId}, "${year}")']`).closest('tr');
    const cells = row.getElementsByTagName('td');
    const name = cells[1].querySelector('input').value;
    const email = cells[2].querySelector('input').value;

    // Send the updated data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_student.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            fetchStudents(document.getElementById('batchSelect').value);
        }
    };
    xhr.send(`student_id=${studentId}&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&year=${year}`);
}

function deleteStudent(studentId, year) {
    if (confirm('Are you sure you want to delete this student?')) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_student.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                fetchStudents(document.getElementById('batchSelect').value);
            }
        };
        xhr.send(`student_id=${studentId}&year=${year}`);
    }
}
