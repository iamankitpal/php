<?php
$con = mysqli_connect("localhost", "root", "", "student");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $marks = $_POST["marks"];
    $age = $_POST["age"];
    $class = $_POST["class"];

    $qryIns = "insert into users(name, roll, marks, age, class) values('$name', '$roll', '$marks', '$age', '$class')";

    mysqli_query($con, $qryIns);
    echo "value inserted";
}
$qryView = "select * from users where marks > 40 or age < 20";
$res = mysqli_query($con, $qryView);
echo "<pre>";
// print_r($res);
?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<form method="post">
    name:-
    <input type="text" name="name"> <br><br>
    roll no:-
    <input type="text" name="roll"><br><br>
    marks:-
    <input type="text" name="marks"><br><br>
    age:-
    <input type="text" name="age"><br><br>
    class:-
    <input type="text" name="class"><br><br>
    <input type="submit" name="submit">

    <br><br><br><br>

    <table>
        <tr>
            <td>name</td>
            <td>roll</td>
            <td>marks</td>
            <td>age</td>
            <td>class</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["roll"] ?></td>
                <td><?php echo $row["marks"] ?></td>
                <td><?php echo $row["age"] ?></td>
                <td><?php echo $row["class"] ?></td>
            </tr>
        <?php } ?>
    </table>
</form>