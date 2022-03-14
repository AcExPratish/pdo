<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $todo_title = $_POST['todo_title'];

    $query = "INSERT INTO todoList(todo_title, todo_status) VALUES('$todo_title', 0)";

    $statement = $connection->query($query);

    header("Location:index.php");
}
?>  