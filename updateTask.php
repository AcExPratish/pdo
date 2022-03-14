<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $todo_id = $_POST['todo_id'];
    $todo_title = $_POST['todo_title'];

    $query = "UPDATE todoList SET todo_title='$todo_title' WHERE todo_id = '$todo_id'";

    $statement = $connection->query($query);

    header('Location:index.php');
}
?>