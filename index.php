<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        nav {
            background: #c62828;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 16px;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            background: white;
        }

        .hero h1 {
            color: #c62828;
            font-size: 45px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background: #c62828;
            color: white;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 17px;
        }

        .section {
            text-align: center;
            padding: 50px 20px;
        }

        .section h2 {
            color: #c62828;
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 250px;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: #c62828;
            margin-bottom: 15px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">🩸 Blood Donation</div>

        <div>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Blood Donation Management System</h1>

        <p>
            Donate Blood, Save Lives ❤️
        </p>

        <a href="register.php" class="btn">Become a Donor</a>
    </section>

    <section class="section">
        <h2>How Can You Help?</h2>

        <div class="cards">

            <a href="register.php" class="card">
                <h3>🩸 Donate Blood</h3>
                <p>
                    Register as a blood donor and help someone in need.
                </p>
            </a>

            <a href="find_blood.php" class="card">
                <h3>🔎 Find Blood</h3>
                <p>
                    Search for available blood groups quickly and easily.
                </p>
           </a>

            <a href="request_blood.php" class="card">
                <h3>📝 Request Blood</h3>
                <p>
                     Submit a blood request when blood is needed.
                </p>
            </a>
        </div>
    </section>

    <footer>
        <p>© 2026 Blood Donation Management System</p>
    </footer>

</body>
</html>