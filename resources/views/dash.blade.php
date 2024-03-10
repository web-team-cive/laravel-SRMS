<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enock.com - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
        }
        header h1 {
            margin: 0;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        footer p {
            margin: 0;
        }

        /* Dashboard Styles */
        .dashboard-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: left;
        }
        .dashboard-content h2 {
            margin-top: 0;
        }
        .user-details {
            margin-top: 20px;
        }
        .user-details p {
            margin: 5px 0;
            font-size: 18px;
            color: #444;
        }
        .user-details strong {
            font-weight: bold;
            color: #007bff;
        }
        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Enock.com Dashboard</h1>
        </div>
    </header>
    <div class="container">
        <div class="dashboard-content">
            <h2>User Details</h2>
            <div class="user-details">
                <p><strong>Username:</strong> <span id="username"></span></p>
                <p><strong>Grade:</strong> <span id="grade"></span></p>
                <p><strong>Parent ID:</strong> <span id="parent-id"></span></p>
            </div>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 Enock.com. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Function to retrieve value from cookie
        function getCookieValue(name) {
            const cookies = document.cookie.split(';');
            for (let cookie of cookies) {
                const [cookieName, cookieValue] = cookie.split('=');
                if (cookieName.trim() === name) {
                    return decodeURIComponent(cookieValue);
                }
            }
            return null;
        }

        // Get user details from cookies
        const username = getCookieValue('username');
        const grade = getCookieValue('grade');
        const parentId = getCookieValue('parent_id');

        // Display user details on the dashboard
        document.getElementById('username').textContent = username ? username : 'Not available';
        document.getElementById('grade').textContent = grade ? grade : 'Not available';
        document.getElementById('parent-id').textContent = parentId ? parentId : 'Not available';

        // Function to logout and clear cookies
        function logout() {
            document.cookie = 'username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'grade=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'parent_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            window.location.href = '/'; // Redirect to login page after logout
        }
    </script>
</body>
</html>
