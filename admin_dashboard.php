<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .header {
            background: #c62828;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
        }

        .logout {
            color: white;
            text-decoration: none;
            background: #a91f1f;
            padding: 10px 18px;
            border-radius: 5px;
        }

        .container {
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #c62828;
            margin-bottom: 35px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 230px;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.12);
        }

        .card h3 {
            color: #c62828;
            margin-bottom: 15px;
        }

        .card p {
            color: #555;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #c62828;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #a91f1f;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🩸 Admin Dashboard</h1>
        <a href="index.php" class="logout">Logout</a>
    </div>

    <div class="container">

        <h2>Welcome to Admin Panel</h2>

        <div class="cards">

            <div class="card">
                <h3>👥 Manage Donors</h3>
                <p>View and manage registered blood donors.</p>
                <a href="manage_donors.php" class="btn">View Donors</a>
            </div>

            <div class="card">
                <h3>🩸 Blood Requests</h3>
                <p>View and manage blood requests.</p>
                <a href="manage_requests.php" class="btn">View Requests</a>
            </div>

            <div class="card">
                <h3>🩸 Blood Stock</h3>
                <p>Check available blood group stock.</p>
                <a href="blood_stock.php" class="btn">View Stock</a>
            </div>

            <div class="card">
                <h3>🏥 Hospitals</h3>
                <p>Manage registered hospitals.</p>
                <a href="hospitals.php" class="btn">View Hospitals</a>
            </div>

        </div>

    </div>

</body>
</html>