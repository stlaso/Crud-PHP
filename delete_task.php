<?php

    include("db.php");

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM Tareas WHERE id=$id";
        $result=mysqli_query($conn, $query);
        if(!$result)
        {
            die("Query Failed");
        }
        $_SESSION['message']='Tarea borrada satisfactoriamente';
        $_SESSION['message_type']= 'danger';
        header("Location: index.php");
    }

?>