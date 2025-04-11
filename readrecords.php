<?php
    include 'connect.php'; // Make sure your connection is defined here

    // Check if the connection was successful
    if (!$connection) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    // Query to select all records from tbluser
    $query = 'SELECT * from tbluser';
    
    // Execute the query and store the result
    $resultset = mysqli_query($connection, $query);

    // Check if the query was successful
    if (!$resultset) {
        die('Query failed: ' . mysqli_error($connection));
    }

    // Example: $row = mysqli_fetch_assoc($resultset);

    if (mysqli_num_rows($resultset) == 0) {
        echo 'No records found in the tbluser table.';
    }
    



    // Query to get the count of total users, visitors, and librarians
    $countQuery = 'SELECT COUNT(*) as total_users, 
                          SUM(isLibrarian) as total_librarians, 
                          COUNT(*) - SUM(isLibrarian) as total_visitors
                  FROM tbluser';
    $countResult = mysqli_query($connection, $countQuery);
    if ($countResult) {
        $countData = mysqli_fetch_assoc($countResult);
        $totalUsers = $countData['total_users'];
        $totalLibrarians = $countData['total_librarians'];
        $totalVisitors = $countData['total_visitors'];
    } else {
        $totalUsers = $totalLibrarians = $totalVisitors = 0;
    }

    if (mysqli_num_rows($resultset) == 0) {
        echo "No users found.";
    }

    // Query to get the total number of books
    $totalBooksQuery = "SELECT COUNT(*) AS totalBooks FROM tblbook";
    $resultBooks = mysqli_query($connection, $totalBooksQuery); // Use $connection instead of $conn
    $totalBooks = mysqli_fetch_assoc($resultBooks)['totalBooks'];

    // Query to get the total number of genres (count of active genre flags)
    $totalGenresQuery = "SELECT 
                            (
                                isDrama + 
                                isAction + 
                                isEduational + 
                                isScienceFiction + 
                                isFantasy + 
                                isMystery + 
                                isHorror + 
                                isRomance + 
                                isHistoricalFiction + 
                                isAdventure
                            ) AS totalGenres 
                        FROM tblGenre LIMIT 1";  // LIMIT 1 to get a single result
    $resultGenres = mysqli_query($connection, $totalGenresQuery); // Use $connection instead of $conn
    $totalGenres = mysqli_fetch_assoc($resultGenres)['totalGenres'];

?>
