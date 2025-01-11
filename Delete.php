<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connectionb
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
  echo  $user_id = $_GET['id'];   

    // Delete the user with the given ID
    $sql = "DELETE FROM formdata WHERE id = '$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "No user ID specified.";
}


?>