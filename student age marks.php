<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

</head>

<body>

<form method="post" name="myform"  onsubmit="return validateForm()">
    name:-
    <input type="text" name="name" id="name"> <br><br>
    roll no:-
    <input type="text" name="rollno" id="rollno"><br><br>
    marks:-
    <input type="text" name="marks" id="marks"><br><br>
    age:-
    <input type="text" name="age" id="age"><br><br>
    class:-
    <input type="text" name="classs" id="classs"><br><br>
    <input type="submit" name="submit">
</form>


<script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var rollno = document.getElementById("rollno").value;
        var marks = document.getElementById("marks").value;
        var age = document.getElementById("age").value;
        var classs = document.getElementById("classs").value;

        if (name == "") {
            alert("Enter name")
            return false;
        } else if (rollno == "") {
            alert("Enter roll no")
            return false;
        } else if (marks == "") {
            alert("Enter Marks")
            return false;
        } else if (age == "") {
            alert("Enter age")
            return false;
        } else if (classs == "") {
            alert("Enter class")
            return false;
        }
    }
</script>
</body>

</html>

<?php
$con = mysqli_connect("localhost", "root", "", "students");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $roll = $_POST["rollno"];
    $marks = $_POST["marks"];
    $age = $_POST["age"];
    $class = $_POST["classs"];

    $qryIns = "insert into users(name, rollno, marks, age, class) values('$name', '$roll', '$marks', '$age', '$class')";

    mysqli_query($con, $qryIns);
    echo "value inserted";
}
$qryView = "select * from users where marks > 40 or age < 20";
$res = mysqli_query($con, $qryView);
echo "<pre>";
?>



