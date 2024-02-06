<?php
$con = mysqli_connect("127.0.0.1:3308", "root", "", "students");
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $insQry = "insert into register(username, name, email, password) values('$username','$name','$email','$password')";

    mysqli_query($con, $insQry);

    echo "Registration successfull";
    header("location: /form_using_php/form_7/login.php");
}

?>

<div>
    <h2>Register Page</h2>
    <br>
    <form method="post">
        username:
        <input type="text" name="username"> <br> <br>
        name:
        <input type="text" name="name"> <br> <br>
        email
        <input type="email" name="email"> <br> <br>
        password:
        <input type="password" name="password"> <br> <br>

        <input type="submit" name="submit">
    </form>
</div>