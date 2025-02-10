# QR-Based Attendance Marking System

Welcome to the **QR-Based Attendance Marking System**! 🚀 This web application simplifies attendance tracking using QR codes, ensuring accurate records and seamless reporting for universities and institutions.

## ✨ Features

✅ **QR Code Scanning** – Mark attendance instantly with a QR scan.  
✅ **Batch-wise Student Management** – Attendance data is linked to batch-specific student tables.  
✅ **Admin Interface** – Assign lecturers to subjects and batches, and manage student enrollment.  
✅ **Attendance Reports** – Generate reports based on:
   - 📊 **Semester-wise** (Batch, department, and subject analysis)
   - 📅 **Lecture-wise** (Filtered by specific dates)
   - 🎓 **Selected Student** (Attendance report for a specific student)
   - ⏳ **Selected Time Period** (Start & end date filtering)
   - 🎟 **Event-wise** (Filtered by event number)
✅ **Graphical Representation** – Visualize attendance trends with **Chart.js**.
✅ **Excel & PDF Export** – Generate and store reports in **Excel** (saved in the `report` folder) and **PDF** (via TCPDF).  
✅ **Push Notifications** – Notify lecturers when a student is absent. 🔔
✅ **Mobile Responsive** – Optimized views for **desktop & mobile**, displaying summarized data smartly.

## 🛠 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/qr-attendance.git
   ```
2. Navigate to the project folder:
   ```bash
   cd qr-attendance
   ```
3. Set up a local server (e.g., XAMPP, WAMP, or LAMP).
4. Import the provided **SQL database** (`database.sql`) into MySQL.
5. Configure the database connection in `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', 'yourpassword');
   define('DB_NAME', 'attendance_db');
   ```
6. Start your server and access the project in your browser:
   ```
   http://localhost/qr-attendance
   ```

## 📥 Additional Dependencies

🚨 **Note:** The following files are not included in the repository. You need to download and place them in the relevant directories:

- **PHPMailer**: Download and place it inside the `vendor/` folder.
- **Report Converters**:
  - **Excel Export**: Place the required files inside the `export/excel/` folder.
  - **PDF Export**: Place the required files inside the `export/pdf/` folder.

You can get these dependencies from their official sources or package repositories.

## 🚀 Usage

1. **Admin Panel** – Manage students, lecturers, subjects, and batches.
2. **Scan QR Code** – Students scan their QR codes to mark attendance.
3. **View Reports** – Generate attendance reports with filtering options.
4. **Export Data** – Download reports as **Excel/PDF** for analysis.
5. **Receive Notifications** – Lecturers get notified of absences.

## 🖥 Technologies & Languages Used

- **Languages:** PHP, HTML, JavaScript, CSS
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP, MySQL
- **Libraries:** TCPDF (PDF export), Chart.js (Graphs), AJAX (Dynamic Data Fetching)

## 📂 Project Structure
```
qr-attendance/
│── assets/       # CSS, JS, Images
│── database/     # SQL scripts
│── includes/     # PHP functions
│── reports/      # Exported reports (Excel/PDF)
│── export/       # Report converters (Excel/PDF)
│── vendor/       # External libraries (PHPMailer, etc.)
│── view_reports.php   # Report generation page
│── generate_report.php  # Backend logic for reports
│── config.php    # Database configuration
│── index.php     # Login page
│── dashboard.php # Main dashboard
│── scan_qr.php   # QR scanning functionality
│── notifications.php # Push notification logic
│── README.md     # Project documentation
```

## 🛡 Security Considerations

🔐 **User Authentication** – Secure login for admins & lecturers.  
🔒 **SQL Injection Protection** – Using **prepared statements**.  
⚡ **Session Management** – Secure session handling for user authentication.  

## 📌 To-Do List

- [ ] Implement a **student dashboard** for self-checking attendance.
- [ ] Add **email notifications** for prolonged absences.
- [ ] Enhance the **AI-powered attendance trends** with machine learning.

## 🤝 Collaborations

Each team member is responsible for implementing specific features:

- **[Your Name]** – Attendance Reports & Export (Excel/PDF)
- **[Collaborator 1]** – QR Code Scanning & Student Management
- **[Collaborator 2]** – Admin Panel & Lecturer Assignments
- **[Collaborator 3]** – Push Notifications & User Authentication
- **[Collaborator 4]** – Graphical Reports & Chart.js Integration
- **[Collaborator 5]** – Mobile Responsive Design & UI Enhancements

## 🤝 Contributing

Pull requests are welcome! Feel free to **fork** the repository and submit improvements. 😃

## 📄 License

This project is **open-source** under the MIT License.

---

🎉 **Happy Coding & Keep Innovating!** 🚀
