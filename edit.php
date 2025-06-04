<?php
include '../db/config.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE registrations SET name=?, dob=?, email=?, mobile=?, phone=?, college_id=?, sport=?, team_name=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $_POST['name'], $_POST['dob'], $_POST['email'], $_POST['mobile'], $_POST['phone'], $_POST['college_id'], $_POST['sport'], $_POST['team_name'], $id);
    $stmt->execute();
    header("Location: view.php");
} else {
    $result = $conn->query("SELECT * FROM registrations WHERE id=$id");
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>Edit Registration</h2>
    <form method="post">
      <input type="text" name="name" class="form-control mb-2" value="<?= $data['name'] ?>" required>
      <input type="date" name="dob" class="form-control mb-2" value="<?= $data['dob'] ?>" required>
      <input type="email" name="email" class="form-control mb-2" value="<?= $data['email'] ?>" required>
      <input type="text" name="mobile" class="form-control mb-2" value="<?= $data['mobile'] ?>" required>
      <input type="text" name="phone" class="form-control mb-2" value="<?= $data['phone'] ?>">
      <input type="text" name="college_id" class="form-control mb-2" value="<?= $data['college_id'] ?>" required>
      <input type="text" name="sport" class="form-control mb-2" value="<?= $data['sport'] ?>" required>
      <input type="text" name="team_name" class="form-control mb-2" value="<?= $data['team_name'] ?>">
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>