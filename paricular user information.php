<?php
$con = mysqli_connect("127.0.0.1:3308", "root", "", "students");
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $marks = $_POST["marks"];

    $insQry = "insert into name(username, name, email, password, address, marks) values('$username','$name','$email','$password','$address','$marks')";

    mysqli_query($con, $insQry);

    echo "Registration successfull";
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
        address:
        <input type="text" name="address"> <br> <br>
        marks:
        <input type="text" name="marks"> <br> <br>

        <input type="submit" name="submit">
    </form> <br><br>
    <a href="/form_using_php/form_10/show.php">
        <button>Show Data</button>
    </a>
</div>