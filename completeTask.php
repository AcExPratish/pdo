<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $todo_id = $_POST['todo_id'];

    $query = "UPDATE todoList SET todo_status=0 WHERE todo_id = '$todo_id'";

    $result = mysqli_query($connection, $query);

    header('Location:index.php');
}
?>