<?php
$con = mysqli_connect("localhosts", "root", "", "students");
$userID = $_GET["id"];
$userUName = $_GET["uname"];
$userName = $_GET["name"];
$userPass = $_GET["pass"];
$userEmail = $_GET["email"];
// Now you can use $userID and $userName safely
echo $userID;
echo $userName;



if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "update register set username='$username', name='$name', email='$email', password='$password' where id='$userID'  ";
    mysqli_query($con, $query);
    header("location: /form_using_php/form_9/");
}
?>

<h2>Edit</h2>
<form method="post">
    username:
    <input type="text" name="username" value="<?php echo $userUName; ?>"> <br> <br>
    name:
    <input type="text" name="name" value="<?php echo $userName; ?>"> <br> <br>
    email
    <input type="email" name="email" value="<?php echo $userEmail; ?>"> <br> <br>
    password:
    <input type="password" name="password" value="<?php echo $userPass; ?>"> <br> <br>

    <input type="submit" name="submit">
</form>