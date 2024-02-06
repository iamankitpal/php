<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="test1";
$con = new mysqli($servername, $username, $password,$dbname);
if ($con->connect_error) {
    echo"not connect";
    exit();
}
if(isset($_POST['submit']) and $_POST['submit']=='Submit'){
    $name = $_POST['name'];
    //$roll = $_REQUEST['day']."/".$_REQUEST['month']."/".$_REQUEST['year'];
    $roll = $_POST['roll'];
    $marks = $_POST['marks'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    //if($name!='' and $roll!='' and $marks!='' and $age!='' and $class!=''){//
    $sql = "INSERT INTO student(name, roll, marks, age, class) VALUES('".$name."', '".$roll."', '".$marks."', '".$age."', '".$class."') ";
    mysqli_query($con,$sql);
    echo  "Successfully Inseted";
    
$sqlview = "select * from users where marks > 40 or age < 20";
$rab = mysqli_query($con, $sqlview);
echo "<pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
<tr>
<td>Name</td>
<input type="text" id="name"  name="name"/>
<td rowspan="4">
</td>
</tr>
<tr>
<td>roll</td>
<input type="text" id="roll"  name="roll"/>
<td rowspan="4">
</td>
</tr>
<tr>
<td>marks</td>
<input type="text" id="marks"  name="marks"/>
<td rowspan="4">
</td>
</tr>
<tr>
<td>age</td>
<input type="text" id="age"  name="age"/>
<td rowspan="4">
</td>
</tr>
<tr>
<td>class</td>
<input type="text" id="class"  name="class"/>
<td rowspan="4">
</td>
</tr>
<tr>
<td>
<input type="Submit" id="submit"  name="submit" value="Submit" />
 <td colspan=""> </td>
</tr>
<table>
        <tr>
            <td>name</td>
            <td>roll</td>
            <td>marks</td>
            <td>age</td>
            <td>class</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($rab)) { ?>
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
</body>
</html>