<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_name = $_POST["patient_name"];
    $blood_group = $_POST["blood_group"];
    $units = $_POST["units"];
    $hospital = $_POST["hospital"];
    $mobile = $_POST["mobile"];
    $required_date = $_POST["required_date"];
    $address = $_POST["address"];

    $sql = "INSERT INTO blood_requests
            (patient_name, blood_group, units, hospital, mobile, required_date, address)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssissss",
        $patient_name,
        $blood_group,
        $units,
        $hospital,
        $mobile,
        $required_date,
        $address
    );

    if ($stmt->execute()) {
        echo "<script>alert('Blood Request Submitted Successfully!');</script>";
    } else {
        echo "<script>alert('Request Failed!');</script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
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
            margin: 40px auto;
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

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
            resize: none;
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

        button:hover {
            background: #a91f1f;
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

        <h2>Blood Request</h2>

        <form method="POST">

            <label>Patient Name</label>
            <input type="text" name="patient_name"
                   placeholder="Enter patient name">

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

            <label>Required Blood Units</label>
            <input type="number" name="units"
                   placeholder="Enter required units">

            <label>Hospital Name</label>
            <input type="text" name="hospital"
                   placeholder="Enter hospital name">

            <label>Mobile Number</label>
            <input type="tel" name="mobile"
                   placeholder="Enter mobile number">

            <label>Required Date</label>
            <input type="date" name="required_date">

            <label>Address</label>
            <textarea name="address"
                      placeholder="Enter address"></textarea>

            <button type="submit">Submit Blood Request</button>

        </form>

        <a href="index.php" class="back">← Back to Home</a>

    </div>

</body>
</html>