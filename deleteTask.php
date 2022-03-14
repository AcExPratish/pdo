<?php
include "connection.php";

$todo_id = $_GET['todo_id'];

$query = "DELETE FROM todoList WHERE todo_id = '$todo_id'";

$statement = $connection->query($query);

if ($statement) {
    header("Location:index.php");
} else {
    echo "Error in query: $query. " . die($connection);
    exit;
}
?>