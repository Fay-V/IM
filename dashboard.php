<?php    
    include 'connect.php';
    include 'readrecords.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <div class="container">

        <div class="btn-container">
            <a href="register.php">Add New User</a>
            <a href="logout.php">Logout</a>
        </div>

        <!-- Cat-Themed User Counts Section in Boxes with Different Shades -->
        <div class="user-counts">
            <div class="user-count-box total-users">
                <h4>Total Users</h4>
                <p><?php echo $totalUsers; ?></p>
            </div>
            <div class="user-count-box total-visitors">
                <h4>Total Visitors</h4>
                <p><?php echo $totalVisitors; ?></p>
            </div>
            <div class="user-count-box total-librarians">
                <h4>Total Librarians</h4>
                <p><?php echo $totalLibrarians; ?></p>
            </div>
        </div>

        <!-- Header Section -->
        <div class="header">
            <h2>List of Users</h2>
        </div>

        <!-- Users Table -->
        <div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr> 
                        <th>ID Number</th> 
                        <th>Password</th> 
                        <th>isLibrarian</th>
                        <th>Username</th>                     
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php
                        while($row = $resultset->fetch_assoc()):
                            $id = $row['uid'];
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo str_repeat('*', strlen($row['pass'])); ?></td>
                        <td><?php echo $row['isLibrarian']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['gender']; ?></td> 
                        <td class="action-btns">
                            <a href="update.php?id=<?php echo $id; ?>" class="update-btn">UPDATE</a> | 
                            <a href="delete.php?id=<?php echo $id; ?>" class="delete-btn">DELETE</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>         
            </table>
        </div>

        <div class="user-counts">
            <div class="user-count-box total-books">
                <h4>Total Books</h4>
                <p><?php echo $totalBooks; ?></p>
            </div>
            <div class="user-count-box total-genres">
                <h4>Total Genres</h4>
                <p><?php echo $totalGenres; ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
