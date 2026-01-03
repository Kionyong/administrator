<?php
define('hosst', 'localhost');
define('userr', 'root');
define('passs', '');
define('dbnam', 'dbstudents');

$conn = mysqli_connect(hosst, userr, passs, dbnam);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tbmanager";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="../styles/db.css" />
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#users">User Management</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#logs">System Logs</a></li>
            </ul>
        </div>
        <div class="right">
            <h2>Welcome, Admin!</h2>
            <h2>Pages Manager</h2>
            <table border="1">
                <tr>
                    <th>Manager ID</th>
                    <th>Manager Name</th>
                    <th>Manager Gender</th>
                    <th>Phones</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
<?php
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>";
                echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No managers found</td></tr>";
            }
            mysqli_close($conn);
?>
            </table>
        </div>
    </div>
</body>
</html>