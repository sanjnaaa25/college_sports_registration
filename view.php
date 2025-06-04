<?php
include '../db/config.php';
$result = $conn->query("SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submissions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-4">
    <h2>All Registrations</h2>
    <table class="table table-bordered">
      <thead><tr>
        <th>Name</th><th>Email</th><th>Sport</th><th>Actions</th>
      </tr></thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['sport'] ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="generate_pdf.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">PDF</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>