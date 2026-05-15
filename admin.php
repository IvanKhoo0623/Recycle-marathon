<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recycle Marathon</title>
  <link href="admin2.css" rel="stylesheet" type="text/css">
</head>
<body>

  <ul class="navbar-main">
  <li><a href="index.html">Home</a></li>
  <li><a href="my-data.html">My Data</a></li>
  <li><a href="donation.html">Donation</a></li>
  <li><a href="ways-to-help.html">Ways to Help</a></li>
  <li><a href="admin.php" class="active">Admin</a></li>
</ul>
  <div class="container">
    <section id="user-data">
    <h1>User Data</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Points</th>
            <th>Times Donated</th>
        </tr>
        
        <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "recycle_marathon"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query user data table
    $sql = "SELECT id, Name AS name, Email AS email, Points AS points, Times_Donate AS times_donated FROM userdata";
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    // Counter for serial numbers
    $serialNumber = 1;

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$serialNumber."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["points"]."</td>";
            echo "<td>".$row["times_donated"]."</td>";
            echo "</tr>";
            $serialNumber++; // Increment serial number for next row
        }
    } else {
            echo "<tr><td colspan='8'>No user data found</td></tr>";
    }
    $conn->close();
?>

    </table>
  </section>
  </div>
<p class="website__rights">© 2026 Recycle marathon. All rights reserved</p>
</body>
</html> 
