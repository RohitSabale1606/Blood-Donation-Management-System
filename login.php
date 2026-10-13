<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();
        $_SESSION["user_email"] = $user["email"];

        echo "<script>
                alert('Login Successful!');
                window.location.href='index.php';
              </script>";

    } else {

        echo "<script>
                alert('Invalid Email or Password!');
              </script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blood Donation Management System</title>

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
            width: 400px;
            max-width: 90%;
            margin: 60px auto;
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

        input {
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

        button:hover {
            background: #a91f1f;
        }

        .signup {
            text-align: center;
            margin-top: 20px;
        }

        .signup a,
        .back {
            color: #c62828;
            text-decoration: none;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🩸 Blood Donation Management System</h1>
    </div>

    <div class="container">

        <h2>Login</h2>

        <form method="POST">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password"required>

            <button type="submit">Login</button>

        </form>

        <div class="signup">
            Don't have an account?
            <a href="register.php">Register as Donor</a>
        </div>

        <a href="index.php" class="back">← Back to Home</a>

    </div>

</body>
</html>