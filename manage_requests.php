<?php
require_once "db.php";

$result = $conn->query("SELECT * FROM blood_requests");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blood Requests</title>

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
            width: 90%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
            overflow-x: auto;
        }

        h2 {
            color: #c62828;
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #c62828;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .status {
            background: #fff3cd;
            color: #856404;
            padding: 6px 10px;
            border-radius: 5px;
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

        <h2>Manage Blood Requests</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Blood Group</th>
                <th>Units</th>
                <th>Hospital</th>
                <th>Mobile</th>
                <th>Required Date</th>
                <th>Status</th>
            </tr>

           <?php
while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['patient_name']; ?></td>
    <td><?php echo $row['blood_group']; ?></td>
    <td><?php echo $row['units']; ?></td>
    <td><?php echo $row['hospital']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['required_date']; ?></td>
    <td><span class="status">Pending</span></td>
</tr>
<?php
}
?>
        </table>

        <a href="admin_dashboard.php" class="back">
            ← Back to Dashboard
        </a>

    </div>

</body>
</html>