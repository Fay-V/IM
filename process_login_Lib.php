<?php
// Start a session to store user data upon successful login
session_start();

// Include the database connection file
require_once('connect.php'); // Adjust the path if needed

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Input validation: Check for empty fields
    if (empty($username) || empty($password)) {
        // Redirect to the login page with an error
        header("Location: index.php?error=emptyfields"); // Assuming index.php is your login page
        exit();
    }

    // Query the database to retrieve user data, including the isLibrarian status
    $sql = "SELECT uid, username, pass, isLibrarian FROM tbluser WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful and a user was found
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $stored_password = $user_data['pass'];
       

        // Verify the password
        //  THIS IS INSECURE:  DO NOT USE THIS IN PRODUCTION
        if ($password == $stored_password) {
            // Password is correct
            
            // Store user data in session
            $_SESSION['uid'] = $user_data['uid'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['isLibrarian'] = $user_data['isLibrarian']; // Store the isLibrarian status

            //check if isLibrarian is true
            if($_SESSION['isLibrarian'] == 1){
                 header("Location: dashboard.php");
                 exit();
            }
            else{
                 // Redirect to the login page with an error
                 header("Location: index.php?error=notLibrarian"); // Assuming index.php is your login page
                 exit();
            }

        } else {
            // Invalid password
            header("Location: index.php?error=invalidpassword"); // Redirect to login page with error
            exit();
        }
    } else {
        // User not found
        header("Location: index.php?error=usernotfound"); // Redirect to login page with error
        exit();
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: index.php");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>
