<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Library Management System</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h1>Library Management System</h1>
        </div>
    </header>

    <main class="aaa">

        <div class="content-container">

            <div class="welcome-section">
                <h2>Welcome to the Library System</h2>
                <p>Search for books by Author, Genre, etc.</p>

                <form action="#" method="GET">
                    <div>
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" placeholder="Enter author name">
                    </div>

                    <div>
                        <label for="genre">Genre:</label>
                        <input type="text" id="genre" name="genre" placeholder="Enter genre">
                    </div>

                    <div>
                        <label for="title">Book Title:</label>
                        <input type="text" id="title" name="title" placeholder="Enter book title">
                    </div>


                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>

 
            <div class="nav-section">
                <nav>
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">About Us</a></li>
                         <li><a href="register.php">Register</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <footer>
        <h1 id="foot">Joshua D. Arco | BSCS - 2</h1>
    </footer>
</body>
</html>
