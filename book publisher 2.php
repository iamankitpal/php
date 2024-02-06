<!DOCTYPE html>
<html>
<head>
    <title>Insert Book</title>
</head>
<body>
    <h1>Insert Book</h1>

    <form action="" method="post">
        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br>

        <label for="author_name">Author Name:</label>
        <input type="text" name="author_name" required><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" required><br>

        <label for="ISBN_number">ISBN Number:</label>
        <input type="text" name="isbn_no" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <input type="submit" name="insert" value="insert">
    </form>
    <a href="search.php">Search Books
    </a>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publishers";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection


if (isset($_POST['insert'])) {
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $publisher = $_POST['publisher'];
    $ISBN_no = $_POST['isbn_no'];
    $price = $_POST['price'];

    $sql = "INSERT INTO books (book_name, author_name, publisher, isbn_no, price)
            VALUES ('$book_name', '$author_name', '$publisher', '$ISBN_no', $price)";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
