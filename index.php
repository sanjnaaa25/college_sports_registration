<?php include 'db/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sports Event Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Modern clean color palette */
    :root {
      --primary-color: #0d6efd; /* Bootstrap primary blue */
      --secondary-color: #6c757d; /* Bootstrap secondary gray */
      --accent-color: #20c997; /* teal accent */
      --background-gradient-start: #e9f1f7;
      --background-gradient-end: #f9fafb;
      --input-border: #ced4da;
      --input-focus-shadow: rgba(32, 201, 151, 0.5);
      --button-hover-color: #198754; /* bootstrap success dark */
    }

    body {
      background: linear-gradient(135deg, var(--background-gradient-start), var(--background-gradient-end));
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 15px;
    }

    .registration-container {
      max-width: 600px;
      background: #fff;
      padding: 35px 45px;
      border-radius: 14px;
      box-shadow: 0 12px 35px rgba(32, 201, 151, 0.15);
      transition: box-shadow 0.3s ease-in-out;
      width: 100%;
    }

    .registration-container:hover {
      box-shadow: 0 18px 50px rgba(32, 201, 151, 0.25);
    }

    h2 {
      font-weight: 800;
      text-align: center;
      margin-bottom: 35px;
      font-size: 2.5rem;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 2px;
    }

    label {
      font-weight: 600;
      color: #444b57;
      letter-spacing: 0.4px;
    }

    input.form-control,
    select.form-control {
      border-radius: 10px;
      border: 1.8px solid var(--input-border);
      padding: 12px 15px;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input.form-control:focus,
    select.form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 10px var(--input-focus-shadow);
      outline: none;
      background: #f0fcf9;
    }

    button.btn-primary {
      width: 100%;
      padding: 14px;
      font-size: 1.15rem;
      border-radius: 12px;
      background: var(--primary-color);
      border: none;
      font-weight: 700;
      transition: background-color 0.3s ease;
      box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    button.btn-primary:hover {
      background-color: var(--accent-color);
      box-shadow: 0 8px 25px rgba(32, 201, 151, 0.6);
    }

    .btn-success {
      display: block;
      width: 100%;
      padding: 14px;
      font-weight: 700;
      border-radius: 12px;
      text-align: center;
      font-size: 1.1rem;
      margin-top: 25px;
      letter-spacing: 0.9px;
      background-color: var(--accent-color);
      border: none;
      box-shadow: 0 5px 15px rgba(32, 201, 151, 0.4);
      color: white;
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: var(--button-hover-color);
      box-shadow: 0 8px 25px rgba(25, 135, 84, 0.8);
      color: white;
    }

    @media (max-width: 576px) {
      .registration-container {
        padding: 30px 25px;
      }

      button.btn-primary,
      .btn-success {
        font-size: 1rem;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="registration-container shadow-sm">
    <h2>College Sports Event Registration</h2>
    <form action="form/register.php" method="post" novalidate>
      <div class="mb-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name" />
      </div>
      <div class="mb-4">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" id="dob" name="dob" class="form-control" required />
      </div>
      <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required placeholder="example@mail.com" />
      </div>
      <div class="mb-4">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="tel" id="mobile" name="mobile" class="form-control" required placeholder="e.g. +91 9876543210" pattern="[0-9+\-\s]{7,15}" />
      </div>
      <div class="mb-4">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Optional" pattern="[0-9+\-\s]{7,15}" />
      </div>
      <div class="mb-4">
        <label for="college_id" class="form-label">College ID</label>
        <input type="text" id="college_id" name="college_id" class="form-control" required placeholder="Enter your college ID" />
      </div>
      <div class="mb-4">
        <label for="sport" class="form-label">Sport</label>
        <select id="sport" name="sport" class="form-select" required>
          <option value="" selected disabled>-- Select your sport --</option>
          <option value="Cricket">Cricket</option>
          <option value="Football">Football</option>
          <option value="Basketball">Basketball</option>
          <option value="Badminton">Badminton</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="team_name" class="form-label">Team Name (if applicable)</label>
        <input type="text" id="team_name" name="team_name" class="form-control" placeholder="Enter your team name" />
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="form/view.php" class="btn btn-success mt-3">View Submissions</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
    // Get values trimmed
    const name = form.name.value.trim();
    const dob = form.dob.value.trim();
    const email = form.email.value.trim();
    const mobile = form.mobile.value.trim();
    const phone = form.phone.value.trim();
    const college_id = form.college_id.value.trim();
    const sport = form.sport.value;
    const team_name = form.team_name.value.trim();

    // Name validation - required, at least 2 chars, no numbers allowed
    if (name.length < 2) {
      alert('Please enter a valid name (at least 2 characters).');
      form.name.focus();
      event.preventDefault();
      return;
    }
    if (/\d/.test(name)) {
      alert('Name should not contain numbers.');
      form.name.focus();
      event.preventDefault();
      return;
    }

    // DOB validation - required, check if date is in the past
    if (!dob) {
      alert('Please select your date of birth.');
      form.dob.focus();
      event.preventDefault();
      return;
    }
    if (new Date(dob) >= new Date()) {
      alert('Date of birth must be in the past.');
      form.dob.focus();
      event.preventDefault();
      return;
    }

    // Email validation - simple regex check
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      form.email.focus();
      event.preventDefault();
      return;
    }

    // Mobile validation - exactly 10 digits only
    const mobilePattern = /^\d{10}$/;
    if (!mobilePattern.test(mobile)) {
      alert('Mobile number must be exactly 10 digits.');
      form.mobile.focus();
      event.preventDefault();
      return;
    }

    // Phone validation - optional, if filled must be digits only and not start with zero
    if (phone.length > 0) {
      const phonePattern = /^[1-9]\d*$/; // digits only, first digit not zero
      if (!phonePattern.test(phone)) {
        alert('Phone number must contain digits only and not start with zero.');
        form.phone.focus();
        event.preventDefault();
        return;
      }
    }

    // College ID validation - required, minimum length 3
    if (college_id.length < 3) {
      alert('Please enter a valid college ID (at least 3 characters).');
      form.college_id.focus();
      event.preventDefault();
      return;
    }

    // Sport validation - required (select box)
    if (!sport) {
      alert('Please select a sport.');
      form.sport.focus();
      event.preventDefault();
      return;
    }

    // Team Name validation - optional, max 50 characters if filled
    if (team_name.length > 50) {
      alert('Team name should be less than 50 characters.');
      form.team_name.focus();
      event.preventDefault();
      return;
    }
  });
</script>


</body>
</html>
