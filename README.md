# college_sports_registration
Project Overview:
This web application allows college students to register for sports events via a form. Data is
stored in a MySQL database, and the form includes both client-side and server-side
validation.
Technology Stack:
- Frontend: HTML, CSS, Bootstrap 5
- Backend: PHP
- Database: MySQL
- Server: XAMPP (Apache + MySQL)
Setup Instructions:
Step 1: Install Required Tools
1. Download and install XAMPP
→ XAMPP Download Link
2. Launch XAMPP Control Panel
3. Start the following services:
o Apache
o MySQL
Step 2: Set Up the Project Files
1. Extract the zip file college_sports_registration.zip
2. Move the extracted folder college_sports_registration to the following directory:
C:/xampp/htdocs/
Step 3: Create the Database
1. Open your browser and go to: http://localhost/phpmyadmin
2. Click the Import tab.
3. Choose the file: college_sports_registration/sql/sports_event.sql
4. Click Go.
This will create a database named college_sports with the required registrations
table.
Step 4: Configure Database Connection
1. Open the file: college_sports_registration/db/config.php
2. Ensure the following configuration (default XAMPP setup):
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "college_sports";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>
Step 5: Run the Application in Your Browser
1. Go to: http://localhost/college_sports_registration/
2. You will see the Sports Registration Form:
o Fill out and submit the form
o View all registered entries
o Edit and Download registrations as PDF
Features:
- Responsive Bootstrap UI
- JavaScript validations for form fields (e.g., name, email, mobile)
- Server-side validations in PHP for security
- View submitted registrations
