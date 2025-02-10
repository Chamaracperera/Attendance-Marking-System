# QR-Based Attendance Marking System
<br />
<div align="center">
  <a href="https://github.com/Chamaracperera/Attendance-Marking-System.git">
    <img src="img/logo.png" alt="Logo" width="80" height="80">
  </a>

  <p align="center">
    🚀 This web application simplifies attendance tracking using QR codes, ensuring accurate records and seamless reporting for universities and institutions.
    <br />
    <a href="https://github.com/Chamaracperera/Attendance-Marking-System.git"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/Chamaracperera/Attendance-Marking-System.git">View Demo</a>
    ·
    <a href="https://github.com/Chamaracperera/Attendance-Marking-System/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    ·
    <a href="https://github.com/Chamaracperera/Attendance-Marking-System/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>



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
   https://github.com/Chamaracperera/Attendance-Marking-System.git
   ```
2. Navigate to the project folder:
   ```bash
   cd Attendance-Marking-System
   ```
3. Set up a local server (e.g., XAMPP, WAMP, or LAMP).
4. Import the provided **SQL database** (`attendance_system.sql`) into MySQL.
5. Start your server and access the project in your browser:
   ```
   http://localhost/Attendance-Marking-System
   ```

## 📥 Additional Dependencies

🚨 **Note:** The following files are not included in the repository. You need to download and place them in the relevant directories:

- **PHPMailer**: Download from [GitHub](https://github.com/PHPMailer/PHPMailer) and place it inside the `php/` folder.
- **Report Converters**:
  - **Excel Export**: Download the required library from [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) and place the files inside the `reports/vendor/` folder.
  - **PDF Export**: Download TCPDF from [TCPDF GitHub](https://github.com/tecnickcom/TCPDF) and place the files inside the `reports/vendor/` folder.

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
Attendance-Marking-System/
│── css/       
│── img/
|── database/ # SQL scripts
│── js/     
│── php/      # PHP functions 
  │── admin/        # admin features
  │── chanuli/      # 
  │── lecturer/     # 
  │── message/  # Backend logic for reports
  │── PHPmailer    # you must download and plce in this path
  │── reports/     # manage reports
  │── students/    # 
  │── db.php       # database connection
  │── logout.php   # Push notification logic
  │── mailer.php   # manage mail
│── README.md      # Project documentation
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


This project is made possible through the collaboration of the following team members:

* **Feature 1 – Login and User Registration**
  * [Chamara Perera ](https://github.com/Chamaracperera)
* **Feature 2 – Books Registration**
  * [Chanuli Sandanayake](https://github.com/Chanuli-Sandanayake)
  * [Sathsarani Geethamali](https://github.com/Sathsarani2002)
* **Feature 3 – Library Member Registration (by library staff)**
  * [Avindi Navodya ](https://github.com/AvindiNavodya)
  * [Chamathya Sepiyumi](https://github.com/Du2002)
* **Feature 4 – Book Borrow Details**
  * [Imansa Gayathmi](https://github.com/Imansa2002)
  * [Prageeth Dissanayake](https://github.com/PrageethDisanayaka)

## 🤝 Contributing

Pull requests are welcome! Feel free to **fork** the repository and submit improvements. 😃

## 📄 License

This project is **open-source** under the MIT License.

---

🎉 **Happy Coding & Keep Innovating!** 🚀

