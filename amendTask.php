<?php
include "connection.php";
include 'header.php';

if (isset($_GET['todo_id'])) {
    $todo_id = $_GET['todo_id'];

    echo '
    <h1 class="text-center text-white">Manage To-Do</h1>
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


    $query = "SELECT * FROM todoList WHERE todo_id = $todo_id and todo_status = 0";
    $statement = $connection->query($query);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $count = 1;
        foreach ($result as $result1) {
            echo '
                <form method="POST" action="updateTask.php" enctype="multipart/form-data">
                            <tr>
                                 <th scope="row" class="text-white">' . $count . '</th>
                                 <td>
                                    <input type="text" class="form-control text-center bg-transparent text-white" id="todo_title" name="todo_title" value="' . $result1['todo_title'] . '" required>
                                     <input type="hidden" name="todo_id" value="' . $result1['todo_id'] . '" required/>
                                </td>
                                 <td>
                                     <button type="submit" name="submit" class="btn text-white border border-success bg-transparent">Submit</button>
                                     <button type="reset" class="btn text-white border border-danger bg-transparent">Clear</button>
                                 </td>
                             </tr>
                </form>';
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
}

include 'footer.php';
?>