<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Login</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            text-align: left;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .toggle-link {
            margin-top: 15px;
            font-size: 0.9em;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }
        .toggle-link:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 id="login-heading">Visitor Login</h2>
        <form action="process_login_Vis.php" method="POST" id="login-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <p id="username-error" class="error-message" style="display: none;">Please enter your username.</p>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <p id="password-error" class="error-message" style="display: none;">Please enter your password.</p>
            </div>
            <button type="submit" id="login-button">Login</button>
        </form>
        <a href="#" id="toggle-librarian" class="toggle-link">Librarian Login</a>
        <a href="#" id="toggle-visitor" class="toggle-link" style="display: none;">Visitor Login</a>
    </div>

    <script>
        const loginHeading = document.getElementById('login-heading');
        const toggleLibrarianLink = document.getElementById('toggle-librarian');
        const toggleVisitorLink = document.getElementById('toggle-visitor');
        const loginForm = document.getElementById('login-form');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const usernameError = document.getElementById('username-error');
        const passwordError = document.getElementById('password-error');
        const loginButton = document.getElementById('login-button');

        let isLibrarianLogin = false;

        toggleLibrarianLink.addEventListener('click', function(event) {
            event.preventDefault();
            loginHeading.textContent = 'Librarian Login';
            toggleLibrarianLink.style.display = 'none';
            toggleVisitorLink.style.display = 'block';
            isLibrarianLogin = true;
            loginForm.action = 'process_login_Lib.php'; // You might adjust this
        });

        toggleVisitorLink.addEventListener('click', function(event) {
            event.preventDefault();
            loginHeading.textContent = 'Visitor Login';
            toggleVisitorLink.style.display = 'none';
            toggleLibrarianLink.style.display = 'block';
            isLibrarianLogin = false;
            loginForm.action = 'process_login_Vis.php';
        });

        loginForm.addEventListener('submit', function(event) {
            let isValid = true;

            // Check if username is empty
            if (usernameInput.value.trim() === '') {
                usernameError.style.display = 'block';
                isValid = false;
            } else {
                usernameError.style.display = 'none';
            }

            // Check if password is empty
            if (passwordInput.value.trim() === '') {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Prevent the form from submitting if validation fails
            if (!isValid) {
                event.preventDefault();
            }
            // If isValid is true, the form will submit to the 'action' specified in the form
        });

        console.log("Initial login mode (false for visitor):", isLibrarianLogin);
    </script>
</body>
</html>