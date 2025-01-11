<?php
$connection = mysqli_connect("localhost", "root", "", "assignment1");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the record
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE `formdata` SET `name` = '$name', `email` = '$email' WHERE `id` = $id";
    if (mysqli_query($connection, $query)) {
        header("Location: table.php");
        exit();
    } else {
        die("Error: " . mysqli_error($connection));
    }
}

// Fetch the current data to pre-fill the form
$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT `id`, `name`, `email` FROM `formdata` WHERE `id` = $id");
$row = mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Update Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
