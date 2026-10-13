<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hospital_name = $_POST["hospital_name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $sql = "INSERT INTO hospitals
            (hospital_name, mobile, email, address)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $hospital_name,
        $mobile,
        $email,
        $address
    );

    if ($stmt->execute()) {
        echo "<script>alert('Hospital Registered Successfully!');</script>";
    } else {
        echo "<script>alert('Hospital Registration Failed!');</script>";
    }

    $stmt->close();
}

$result = $conn->query("SELECT * FROM hospitals");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Hospitals</title>

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
            width: 800px;
            max-width: 90%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #c62828;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 20px;
            background: #c62828;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 35px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #c62828;
            color: white;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #c62828;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>🏥 Blood Donation Management System</h1>
</div>

<div class="container">

    <h2>Hospital Registration</h2>

    <form method="POST">

        <label>Hospital Name</label>
        <input type="text" name="hospital_name"
               placeholder="Enter hospital name" required>

        <label>Mobile Number</label>
        <input type="tel" name="mobile"
               placeholder="Enter mobile number" required>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="Enter email address" required>

        <label>Address</label>
        <textarea name="address"
                  placeholder="Enter hospital address"
                  required></textarea>

        <button type="submit">Register Hospital</button>

    </form>

    <h2>Registered Hospitals</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Hospital Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['hospital_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
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