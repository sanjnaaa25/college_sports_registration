<?php
include '../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $name = clean_input($_POST['name'] ?? '');
    $dob = clean_input($_POST['dob'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $mobile = clean_input($_POST['mobile'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $college_id = clean_input($_POST['college_id'] ?? '');
    $sport = clean_input($_POST['sport'] ?? '');
    $team_name = clean_input($_POST['team_name'] ?? '');

    $errors = [];

    // Name validation: required, min 2 chars, no digits
    if (strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters.";
    }
    if (preg_match('/\d/', $name)) {
        $errors[] = "Name must not contain numbers.";
    }

    // DOB validation: required, date in past
    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    } elseif (strtotime($dob) === false || strtotime($dob) >= time()) {
        $errors[] = "Date of Birth must be a valid date in the past.";
    }

    // Email validation: required, valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Mobile validation: required, exactly 10 digits
    if (!preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = "Mobile number must be exactly 10 digits.";
    }

    // Phone validation: optional, if present digits only and not starting with 0
    if (!empty($phone)) {
        if (!preg_match('/^[1-9]\d*$/', $phone)) {
            $errors[] = "Phone number must contain digits only and not start with zero.";
        }
    }

    // College ID validation: required, min 3 chars
    if (strlen($college_id) < 3) {
        $errors[] = "College ID must be at least 3 characters.";
    }

    // Sport validation: required, must be one of allowed values
    $allowed_sports = ['Cricket', 'Football', 'Basketball', 'Badminton'];
    if (!in_array($sport, $allowed_sports)) {
        $errors[] = "Please select a valid sport.";
    }

    // Team name validation: optional, max 50 chars
    if (!empty($team_name) && strlen($team_name) > 50) {
        $errors[] = "Team name must be less than 50 characters.";
    }

    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO registrations (name, dob, email, mobile, phone, college_id, sport, team_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $dob, $email, $mobile, $phone, $college_id, $sport, $team_name);

        if ($stmt->execute()) {
            echo "Registration successful. <a href='view.php'>View Registrations</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Show validation errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='javascript:history.back()'>Go Back and fix errors</a></p>";
    }
}
$conn->close();
?>
