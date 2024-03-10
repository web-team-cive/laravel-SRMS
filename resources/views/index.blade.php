<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enock.com - Login Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* Form Styles */
        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .login-form h2 {
            margin-top: 0;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .login-message {
            margin-top: 20px;
            font-weight: bold;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Enock.com</h1>
        </div>
    </header>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form id="login-form">
                <input type="text" id="username" name="username" placeholder="Username">
                <input type="password" id="pwd" name="pwd" placeholder="Password">
                <button type="submit">Login</button>
            </form>
            <div id="login-message"></div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 Enock.com. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Function to handle form submission
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(this); // Get form data
            const loginMessage = document.getElementById('login-message'); // Get login message element
            
            fetch('/login', { // Make POST request to login endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Include CSRF token in headers
                },
                body: formData // Pass form data in request body
            })
            .then(response => response.json()) // Parse response as JSON
            .then(data => {
                // Display login message based on response
                loginMessage.innerHTML = `<p class="${data.status === 'success' ? 'success' : 'error'}">${data.message}</p>`;
                if (data.status === 'success') {
                    // Save login data to cookies
                    document.cookie = `username=${data.data.username}; expires=Fri, 31 Dec 9999 23:59:59 GMT`;
                    document.cookie = `grade=${data.data.grade}; expires=Fri, 31 Dec 9999 23:59:59 GMT`;
                    document.cookie = `parent_id=${data.data.parent_id}; expires=Fri, 31 Dec 9999 23:59:59 GMT`;
                    // Redirect or perform additional actions upon successful login
                    setTimeout(() => {
                        window.location.href = '/dashboard'; // Redirect to dashboard page
                    }, 2000); // Wait for 2 seconds before redirecting
                }
            })
            .catch(error => {
                console.error('Error:', error);
                loginMessage.innerHTML = `<p class="error">An error occurred. Please try again later.</p>`;
            });
        });
    </script>
</body>
</html>
