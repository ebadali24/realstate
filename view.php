<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details using mysqli_query
    // SELECT `id`, `name`, `email`, `subject`, `message` FROM `formdata` WHERE 1   
    $sql = "SELECT * FROM formdata WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        ?>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
         
            </tr>
            <tr>
            <td><?php echo $user['id']; ?></td>      
                <td><?php echo $user['name']; ?></td>      
                <td><?php echo $user['email']; ?></td>      
                <td><?php echo $user['subject']; ?></td>      
                <td><?php echo $usersz['message']; ?></td> 
                 </tr>
        </table>
        <?php
    } else {
        echo "No user found with the specified ID.";
    }
} else {
    echo "No user ID specified.";
}

// Close the database connection
mysqli_close($conn);
?>