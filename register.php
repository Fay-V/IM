<?php    
    include 'connect.php';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: External CSS file -->
    <link href="registerStyles.css" rel="stylesheet" />
</head>
<body>

<header>
    <h1>User Registration</h1>
</header>

<div class="container">
    <div class="title-section">
        <h2>Register New User</h2>
    </div>

    <!-- Registration Form -->
    <form method="post">
        <label for="txtfirstname">Firstname:</label>
        <input type="text" id="txtfirstname" name="txtfirstname" placeholder="Enter Firstname" required>

        <label for="txtlastname">Lastname:</label>
        <input type="text" id="txtlastname" name="txtlastname" placeholder="Enter Lastname" required>

        <label for="txtgender">Gender:</label>
        <select name="txtgender" id="txtgender" required>
            <option value="">----</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="txtusertype">User Type:</label>
        <select name="txtusertype" id="txtusertype" required>
            <option value="">----</option>
            <option value="visitor">Visitor</option>
            <option value="librarian">Librarian</option>
        </select>

        <label for="txtusername">Username:</label>
        <input type="text" id="txtusername" name="txtusername" placeholder="Enter Username" required>

        <label for="txtpassword">Password:</label>
        <input type="password" id="txtpassword" name="txtpassword" placeholder="Enter Password" required>

        <input type="submit" name="btnRegister" value="Register">
    </form>
</div>

<?php   
    if(isset($_POST['btnRegister'])){       
      
        $fname = $_POST['txtfirstname'];      
        $lname = $_POST['txtlastname'];
        $gender = $_POST['txtgender'];
        $utype = $_POST['txtusertype'];  
        $uname = $_POST['txtusername'];       
        $pword = $_POST['txtpassword'];   
  
        // Check if user is a librarian
        $isLibrarian = ($utype == 'librarian') ? 1 : 0;

        // Save data to tbluser  
        $sql = "INSERT INTO tbluser( pass, isLibrarian, username, first_name, last_name, gender) 
                VALUES( '".$pword."', '".$isLibrarian."', '".$uname."', '".$fname."', '".$lname."', '".$gender."')";
        
        if(mysqli_query($connection, $sql)) {
            echo "<script>
                    alert('New record saved.');
                    window.location.href = 'dashboard.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error saving record: " . mysqli_error($connection) . "');
                  </script>";
        }
    }
?>

</body>
</html>
