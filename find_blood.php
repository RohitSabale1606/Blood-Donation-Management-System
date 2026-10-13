<?php
require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $blood_group = $_POST["blood_group"];

    $result = $conn->query(
        "SELECT * FROM donors WHERE blood_group = '$blood_group'"
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Blood</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
        }

        .header {
            background: #c62828;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .container {
            width: 500px;
            max-width: 90%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #c62828;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 25px;
            background: #c62828;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 17px;
            cursor: pointer;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #c62828;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🩸 Blood Donation Management System</h1>
    </div>

    <div class="container">

        <h2>Find Blood</h2>

        <form method="POST">

            <label>Blood Group</label>

            <select name="blood_group">
                <option value="">Select Blood Group</option>
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>O+</option>
                <option>O-</option>
            </select>

            <button type="submit">Search Blood</button>

        </form>
       
     <?php
if (isset($result)) {

    if ($result->num_rows > 0) {

        echo "<h3>Available Donors:</h3>";

        while ($row = $result->fetch_assoc()) {
            echo "<p>";
            echo "Name: " . $row['name'] . "<br>";
            echo "Blood Group: " . $row['blood_group'] . "<br>";
            echo "Mobile: " . $row['mobile'] . "<br>";
            echo "Address: " . $row['address'];
            echo "</p><hr>";
        }

    } else {

        echo "<h3>No Donor Found</h3>";
        echo "<p>No donor is available for this blood group.</p>";

    }
}
?> 

        <a href="index.php" class="back">← Back to Home</a>

    </div>

</body>
</html>