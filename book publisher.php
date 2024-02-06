<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
</head>
<body>
    <h1>Search Books</h1>

    <form action="" method="post">
        <label for="keyword">Enter a keyword:</label>
        <input type="text" name="keyword" required><br>

        <input type="submit" name="search" value="Search">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publishers";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];

    $sql = "SELECT * FROM books WHERE 
            book_name LIKE '%$keyword%' OR
            author_name LIKE '%$keyword%' OR
            publisher LIKE '%$keyword%' OR
            isbn_no LIKE '%$keyword%' OR
            price LIKE '%$keyword%'";

    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Book Name</th><th>Author Name</th><th>Publisher</th><th>ISBN Number</th><th>Price</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['book_name'] . "</td>";
            echo "<td>" . $row['author_name'] . "</td>";
            echo "<td>" . $row['publisher'] . "</td>";
            echo "<td>" . $row['isbn_no'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>