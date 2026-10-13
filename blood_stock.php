<?php
require_once "db.php";

$result = $conn->query("SELECT * FROM blood_stock");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Stock</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        .header {
            background: #c62828;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
        }

        h2 {
            color: #c62828;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #c62828;
            color: white;
            padding: 14px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .available {
            color: green;
            font-weight: bold;
        }

        .low {
            color: #e65100;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #c62828;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🩸 Blood Donation Management System</h1>
    </div>

    <div class="container">

        <h2>Blood Stock</h2>

        <table>
            <tr>
                <th>Blood Group</th>
                <th>Available Units</th>
                <th>Status</th>
            </tr>

           <?php
while ($row = $result->fetch_assoc()) {

    if ($row['units'] <= 4) {
        $status = "Low Stock";
        $class = "low";
    } else {
        $status = "Available";
        $class = "available";
    }
?>

<tr>
    <td><?php echo $row['blood_group']; ?></td>
    <td><?php echo $row['units']; ?></td>
    <td class="<?php echo $class; ?>">
        <?php echo $status; ?>
    </td>
</tr>

<?php
}
?>
            <tr>
                <td>A-</td>
                <td>5</td>
                <td class="available">Available</td>
            </tr>

            <tr>
                <td>B+</td>
                <td>10</td>
                <td class="available">Available</td>
            </tr>

            <tr>
                <td>B-</td>
                <td>3</td>
                <td class="low">Low Stock</td>
            </tr>

            <tr>
                <td>AB+</td>
                <td>7</td>
                <td class="available">Available</td>
            </tr>

            <tr>
                <td>AB-</td>
                <td>2</td>
                <td class="low">Low Stock</td>
            </tr>

            <tr>
                <td>O+</td>
                <td>15</td>
                <td class="available">Available</td>
            </tr>

            <tr>
                <td>O-</td>
                <td>4</td>
                <td class="low">Low Stock</td>
            </tr>
        </table>

        <a href="admin_dashboard.php" class="back">
            ← Back to Dashboard
        </a>

    </div>

</body>
</html>