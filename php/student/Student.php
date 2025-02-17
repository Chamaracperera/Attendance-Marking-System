<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attentance Marking System</title>
    <link rel="shortcut icon" href="../../img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="../../img/logo.png" alt="logo">
                <h2>Attendance Marking System</h2>
            </a>
        </nav>
    </header>
    <div class="container">
        <div class="content">
            <div id="form-message" class="form-message"></div>
            <form id="login-form" action="Student_login.php" method="POST">
                <div class="text">Login</div>
                <div class="field">
                    <input type="text" name="reg_no" required>
                    <label>Registration Number</label>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <span class="error-message"></span>
                </div>
                <div class="show-password">
                    <input type="checkbox" id="login-show-password">
                    <label for="login-show-password">Show Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="#" id="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
                <div class="sign-up">
                    Not a member? <a href="#" id="show-signup">Signup now</a>
                </div>
                <div class="sign-up">
                    <a href="../../index.html">Back to Selection</a>
                </div>
            </form>
            <form id="signup-form" action="Student_Signup.php" method="POST" style="display: none;">
                <div class="text">Sign up</div>
                <div class="field">
                    <input type="text" name="user_name" required>
                    <label>Name With Initials</label>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="text" name="reg_no" required>
                    <label>Registration Number</label>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <select name="department" required>
                        <option value="" disabled selected>Select Department</option>
                        <option value="1">IAT</option>
                        <option value="2">ICT</option>
                        <option value="3">AT</option>
                        <option value="4">ET</option>
                    </select>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <select name="batch_year" required>
                        <option value="" disabled selected>Select Batch Year</option>
                        <?php
                        // Database connection
                        require_once '../db.php';
        
                        // Fetch batch years
                        $sql = "SELECT batch_id, year FROM batch ";
                        $result = $conn->query($sql);
        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                            }
                        } else {
                            echo "<option value='' disabled>No batch years available</option>";
                        }
        
                        $conn->close();
                        ?>
                    </select>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <span class="error-message"></span>
                </div>
                <div class="show-password">
                    <input type="checkbox" id="signup-show-password">
                    <label for="signup-show-password">Show Password</label>
                </div>
                <button type="submit">Sign up</button>
                <div class="sign-up">
                    Already a member? <a href="#" id="show-login">Login now</a>
                </div>
                <div class="sign-up back-to-selection">
                    <a href="../../index.html">Back to Selection</a>
                </div>
            </form>
            
            <!-- Password Reset Form -->
            <form id="password-reset-form" action="send_pass_reset.php" method="post" class="modal" style="display: none;">
                <div class="modal-content">
                    <span id="cancel-reset" class="close">&times;</span>
                    <h2>Reset Password</h2><br>
                    <div id="reset-form-message" class="form-message"></div>
                    <div class="field">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <button type="submit">Send Verification</button>
                </div>
            </form>

        </div>
    </div>

    <script src="../../js/script.js"></script>
</body>
</html>
