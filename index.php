<?php
include 'connection.php';
include 'header.php';
echo '
    <h1 class="text-center text-white">To-Do</h1>
    <div class="row justify-content-center">
        <div class="col-7 mt-5">
            ';
include 'insertForm.php';
echo '
        </div>
    <div class="col-8 p-5">
        <table class="table table-striped table-hover text-center text-white border p-5">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">To-Do</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';



$query = 'select * from todoList where todo_status = 0';
$statement = $connection->query($query);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($result) {
    $count = 1;
    foreach ($result as $result1) {
        echo '
                <tr>
                     <th scope="row" class="text-white">' . $count . '</th>
                     <td class="text-white align-items-center">' . $result1['todo_title'] . '</td>
                     <td> 
                        <a class="btn text-white border border-success bg-transparent" href="amendTask.php?todo_id=' . $result1['todo_id'] . '">Edit</a>
                        <a class="btn text-white border border-danger bg-transparent ms-3" href="deleteTask.php?todo_id=' . $result1['todo_id'] . '">Delete</a>
                     </td>
                     </tr>
                 ';
        $count = $count + 1;
    }
    echo '
            </tbody>
            </table>
            </div>  
        </div>
           ';
} else {
    echo 'Error : Connection / Query';
}
include 'footer.php';
?>