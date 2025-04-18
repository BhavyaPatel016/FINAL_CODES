<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Your DB username
$password = "";     // Your DB password
$dbname = "project1"; // Your DB name

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query: Fetch all records from commity1 table ordered by ID
$sql = "SELECT * FROM commity1 ORDER BY id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Committee History Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f3;
            color: #333;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #6793AC;
            color: white;
            height: 100vh;
            padding: 10px;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            margin-top:25px;
        }
        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s ease;
        }
        .sidebar a:hover {
            background: #5a7a87;
            transform: scale(1.05);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #6793AC;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .logout {
            background: #e74c3c;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .header .logout:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>👥 Committee History Dashboard</h2>
    <a href="residency_details.php">👤Profile</a>
    <a href="message.php">📩Messages</a>
    <a href="report.php">🏠Resident</a>
    <a href="#">🔧Maintenances</a>
    <a href="#">🗝️Aminities Booking</a>
    <a href="selectcommitymember.php">👥Create Community</a>
    <a href="community_history.php">📜 Community History</a>    
    <a href="loginpage.php">⬅️Logout</a>
</div>

<div class="main-content">
    <div class="header">
        <h1>Committee History</h1>
        <a href="loginpage.php"><button class="logout">Logout</button></a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Flat</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Created At</th>
                <th>Ended At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($user = $result->fetch_assoc()) {
                    $createdAt = new DateTime($user['created_at']);
                    $endedAt = new DateTime($user['ended_at']);
                    $createdDate = $createdAt->format('d-F-Y');
                    $endedDate = $endedAt->format('d-F-Y');
                    echo "<tr>
                            <td>" . htmlspecialchars($user['flat']) . "</td>
                            <td>" . htmlspecialchars($user['name']) . "</td>
                            <td>" . htmlspecialchars($user['email']) . "</td>
                             <td>" . htmlspecialchars($user['number']) . "</td>
                            <td>" . $createdDate . "</td>
                            <td>" . $endedDate . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
