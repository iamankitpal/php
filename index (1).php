<?php
$con = mysqli_connect("127.0.0.1:3308", "root", "", "students");
$query = "select * from register";
$res = mysqli_query($con, $query);
$data;
if ($res->num_rows != 0) {
    $data = $res;
}
echo "<pre>";

if (isset($_POST["submit"])) {
    $user_id = $_POST["delete_user"];
    $del_qry = "delete from register where id=$user_id";
    mysqli_query($con, $del_qry);
    echo "<script>alert('One user deleted'); window.location.href = 'index.php';</script>";
}
?>


<style>
    td,
    table,
    tr {
        border: 1px solid #000;
    }
</style>

<table>
    <tr>
        <td>id</td>
        <td>username</td>
        <td>password</td>
        <td>name</td>
        <td>email</td>
        <td>Delete</td>
    </tr>
    <?php if ($res->num_rows != 0){ while ($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["username"] ?></td>
            <td><?php echo $row["password"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" value="<?php echo $row["id"] ?>" name="delete_user" />
                    <button type="submit" name="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php }}else{echo"table is empty";} ?>
</table>