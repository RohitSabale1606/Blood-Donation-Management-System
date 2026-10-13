<?php
require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $blood_group = $_POST["blood_group"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $sql = "INSERT INTO donors 
            (name, age, gender, blood_group, mobile, email, address)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sisssss",
        $name,
        $age,
        $gender,
        $blood_group,
        $mobile,
        $email,
        $address
    );

    if ($stmt->execute()) {
        echo "<script>alert('Donor Registered Successfully!');</script>";
    } else {
        echo "Registration Failed: " . $stmt->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>

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

        <h2>Donor Registration</h2>

        <form method="POST">

            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name">

            <label>Age</label>
            <input type="number" name="age" placeholder="Enter your age">

            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

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

            <label>Mobile Number</label>
            <input type="tel" name="mobile" placeholder="Enter mobile number">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email address">

            <label>Address</label>
            <textarea name="address" placeholder="Enter your address"></textarea>

            <button type="submit">Register as Donor</button>

        </form>

        <a href="index.php" class="back">← Back to Home</a>

    </div>

</body>
</html>