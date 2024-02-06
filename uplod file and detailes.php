<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Display</title>
</head>
<body>
    <h1>Image Upload and Display</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Choose an image (jpg, jpeg, gif, or png):</label>
        <input type="file" name="image" id="image"  required><br>

        <label for="description">File Description:</label>
        <input type="text" name="description" id="description" required><br>

        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>
<?php
if (isset($_POST['upload'])) {
    $targetDirectory = 'photos/';
    $description = $_POST['description'];
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    // Check if the file is a valid image type
    $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($imageFileType, $allowedExtensions)) {
        $targetFile = $targetDirectory . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo "Uploaded file name: " . basename($_FILES['image']['name']) . "<br>";
            echo "File type: " . $imageFileType . "<br>";
            echo "File size: " . $_FILES['image']['size'] . " bytes<br>";
            echo "File description: " . $description . "<br>";
            echo "Stored in: " . $targetDirectory . "<br>";
            echo "Uploaded file: <br>";
            echo '<img src="' . $targetFile . '" alt="Uploaded Image">';
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Only .jpg, .jpeg, .gif, or .png files are allowed.";
    }
}
?>
